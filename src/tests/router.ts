let request = require('./request');
require('jsdom-global')();

let router = {
  parentPath: Array,
  routeGroup: Array,
  group: Object.create({}),
  get: Object.create({}),
  middleware: Object.create({})
};

router.group = function(path: string, routeGroup: object){
  if (typeof routeGroup != 'function' || path == '' || path == null) return false;
  
  this.parentPath = [path];
  this.routeGroup = [routeGroup];
  
  this.middleware((location.pathname == path) ? path : '');
};
  
router.get = function(path: string, func: object|string){
  if (typeof path == 'undefined') return false;
  if (typeof func == 'undefined') return false;
  if (path == 'index.html') {
    path = '/';
  }
  let req = request(path);
  
  if (location.href == req.url && req.method == 'GET') {
    if (typeof func == 'function') func(req);
  }
};

router.middleware = function(path: string){
  if (typeof this.routeGroup != 'object') return false;
  
  if (this.parentPath.includes(path)) {
    return this.parentPath.forEach((item: any, key: number) => this.routeGroup[key](this));
  } else {
    return false;
  }
};

module.exports = router;