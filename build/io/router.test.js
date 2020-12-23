var http = require('http');
var Router = {
    initialize: function (callback) { return http.createServer(function (request, response) { return callback(request, response); }).listen(4000); },
    group: function (requestUri, controller) {
        this.initialize(function (req, res) {
            res.writeHead(200, {
                'Content-Type': 'text/html'
            });
            console.log(req);
            res.end('okay');
        });
    }
};
module.exports = Router;
//# sourceMappingURL=router.test.js.map