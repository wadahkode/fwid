const http = require('http'),
  url = require('url'),
  path = require('path'),
  fs = require('fs'),
  publicPath: string= path.join(path.resolve(), 'public'),
  templatePath: string = path.join(path.resolve(), 'src/Templates');

let Router = {
  initialize: (callback: any) => http.createServer((request: any, response: any) => callback(request, response)).listen(4000, '127.0.0.1', () => {
    console.log('Server berjalan di http://localhost:4000');
  }),
  group: function(requestUri: string, routeGroup: any) {
    this.initialize((req: any, res: any) => {
      console.log(
        `[📦] %s %s %s %s`,
        req.method,
        res.statusCode,
        new Date(),
        req.url
      );
      res.writeHead(200,{
        'Content-Type': 'text/html'
      });
      
      if (req.url == '/' && req.url == requestUri) {
        // cek controller apakah bertipe function atau bukan
        if (typeof routeGroup == 'function') {
          routeGroup(this);
        }
      } else if (req.url == '/favicon.ico') {
        // abaikan permintaan /favicon.ico
        console.log(``);
      }
      res.end('okay');
    });
  },
  get: function(...args: any) {
    console.log(args)
  },
};

module.exports = Router;