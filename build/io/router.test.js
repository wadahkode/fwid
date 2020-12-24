var http = require('http'), url = require('url'), path = require('path'), fs = require('fs'), port = process.env.PORT || 4000, publicPath = path.join(path.resolve(), 'public/'), templatePath = path.join(path.resolve(), 'src/Templates/');
var loader = function (dirname, filename) { return path.join(path.resolve(), dirname + "/" + filename); };
var Router = {
    initialize: function (callback) { return http.createServer(function (request, response) { return callback(request, response); }).listen(port, '127.0.0.1', function () {
        console.log("Server berjalan di http://127.0.0.1:" + port);
    }); },
    group: function (requestUri, routeGroup) {
        var _this = this;
        this.initialize(function (req, res) {
            console.log("[\uD83D\uDCE6] %s %s %s %s", req.method, res.statusCode, new Date(), req.url);
            if (req.url == '/' && req.url == requestUri) {
                if (typeof routeGroup == 'function') {
                    _this.request = req;
                    _this.response = res;
                    routeGroup(_this);
                }
            }
            else {
                res.end("Router untuk " + req.url + " tidak dapat ditemukan!");
            }
        });
    },
    get: function () {
        var _this = this;
        var args = [];
        for (var _i = 0; _i < arguments.length; _i++) {
            args[_i] = arguments[_i];
        }
        var requestUri = args[0], controller = args[1];
        if (requestUri == '' || requestUri == null) {
            requestUri = 'index.html';
        }
        var uri = url.parse(requestUri), pathname = loader('public', uri.pathname), stream = fs.createReadStream(pathname), extname = String(path.extname(pathname)).toLowerCase(), mimeTypes = {
            '.html': 'text/html',
            '.js': 'text/javascript',
            '.css': 'text/css',
            '.ico': 'image/x-icon',
            '.json': 'application/json',
            '.png': 'image/png',
            '.jpg': 'image/jpg',
            '.gif': 'image/gif',
            '.svg': 'image/svg+xml',
            '.wav': 'audio/wav',
            '.mp4': 'video/mp4',
            '.woff': 'application/font-woff',
            '.ttf': 'application/font-ttf',
            '.eot': 'application/vnd.ms-fontobject',
            '.otf': 'application/font-otf',
            '.wasm': 'application/wasm'
        }, contentTypes = mimeTypes[extname] || 'application/octect-stream', pageError = loader('public', '404.html');
        stream.on('open', function () { return stream.pipe(_this.response); });
        stream.on('data', function (chunk) {
            _this.response.writeHead(200, { 'Content-Type': contentTypes });
            _this.response.end(chunk);
        });
        stream.on('error', function (error) {
            if (error.code == 'ENOENT') {
                _this.response.writeHead(404, { 'Content-Type': contentTypes });
                _this.response.end(fs.readFileSync(pageError, 'utf-8'));
            }
            else {
                _this.response.writeHead(500);
                _this.response.end('Sorry, check with the site admin for error: ' + error.code + ' ..\n');
            }
        });
        stream.on('end', function () { return _this.response.end(); });
    },
    request: [] || {},
    response: [] || {},
    error: [] || {}
};
module.exports = Router;
//# sourceMappingURL=router.test.js.map