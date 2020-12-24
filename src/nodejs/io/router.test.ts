const http = require('http'),
  url = require('url'),
  path = require('path'),
  fs = require('fs'),
  port = process.env.PORT || 4000,
  publicPath: string= path.join(path.resolve(), 'public/'),
  templatePath: string = path.join(path.resolve(), 'src/Templates/');

const loader = (dirname: string, filename: string) => path.join(path.resolve(), `${dirname}/${filename}`);

let Router = {
  initialize: (callback: any) => http.createServer((request: any, response: any) => callback(request, response)).listen(port, '127.0.0.1', () => {
    console.log(`Server berjalan di http://127.0.0.1:${port}`);
  }),
  group: function(requestUri: string, routeGroup: object) {
    this.initialize((req: any, res: any) => {
      console.log(
        `[📦] %s %s %s %s`,
        req.method,
        res.statusCode,
        new Date(),
        req.url
      );
      
      if (req.url == '/' && req.url == requestUri) {
        // cek controller apakah bertipe function atau bukan
        if (typeof routeGroup == 'function') {
          this.request = req;
          this.response = res;
          routeGroup(this);
        }
      } else {
        res.end(`Router untuk ${req.url} tidak dapat ditemukan!`);
      }
    });
  },
  get: function(...args: [requestUri: string, controller: any]) {
    let requestUri: string = args[0],
      controller: any = args[1];
    
    if (requestUri == '' || requestUri == null) {
      requestUri = 'index.html';
    }
    
    let uri: any = url.parse(requestUri),
      pathname: string = loader('public', uri.pathname),
      stream: any = fs.createReadStream(pathname),
      extname: string = String(path.extname(pathname)).toLowerCase(),
      mimeTypes: any = {
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
      },
      contentTypes: string = mimeTypes[extname] || 'application/octect-stream',
      pageError: string = loader('public', '404.html');
      
    stream.on('open', () => stream.pipe(this.response));
    stream.on('data', (chunk: any) => {
      this.response.writeHead(200, {'Content-Type': contentTypes});
      this.response.end(chunk);
    });
    
    stream.on('error', (error: any) => {
      if (error.code == 'ENOENT') {
        this.response.writeHead(404, {'Content-Type': contentTypes});
        this.response.end(
          fs.readFileSync(pageError, 'utf-8')
        );
      } else {
        this.response.writeHead(500);
        this.response.end(`Router untuk ${this.request.url} tidak dapat ditemukan!`);
      }
    });
    
    stream.on('end', () => this.response.end());
  },
  request: [] || {},
  response: [] || {},
  error: [] || {},
};

module.exports = Router;