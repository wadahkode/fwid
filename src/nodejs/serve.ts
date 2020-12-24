const wadahkode = require('./wadahkode.test'),
  Route = wadahkode().router;

Route.group('/', function(this: void, route: typeof Route) {
  route.get('index.html', function(){
    
  });
});