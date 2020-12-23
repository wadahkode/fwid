var http = require('http'), url = require('url'), path = require('path'), fs = require('fs'), publicPath = path.join(path.resolve(), 'public'), templatePath = path.join(path.resolve(), 'src/Templates');
var Router = {
    initialize: function (callback) { return http.createServer(function (request, response) { return callback(request, response); }).listen(4000, '127.0.0.1', function () {
        console.log('Server berjalan di http://localhost:4000');
    }); },
    group: function (requestUri, routeGroup) {
        var _this = this;
        this.initialize(function (req, res) {
            console.log("[\uD83D\uDCE6] %s %s %s %s", req.method, res.statusCode, new Date(), req.url);
            res.writeHead(200, {
                'Content-Type': 'text/html'
            });
            if (req.url == '/' && req.url == requestUri) {
                if (typeof routeGroup == 'function') {
                    routeGroup(_this);
                }
            }
            else if (req.url == '/favicon.ico') {
                console.log("");
            }
            res.end('okay');
        });
    },
    get: function () {
        var args = [];
        for (var _i = 0; _i < arguments.length; _i++) {
            args[_i] = arguments[_i];
        }
        console.log(args);
    }
};
module.exports = Router;
//# sourceMappingURL=router.test.js.map