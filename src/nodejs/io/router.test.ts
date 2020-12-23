const http = require('http');

let Router = {
  initialize: (callback: any) => http.createServer((request: any, response: any) => callback(request, response)).listen(4000),
  group: function(requestUri: string, controller: any){
    this.initialize((req: any, res: any) => {
      res.writeHead(200,{
        'Content-Type': 'text/html'
      });
      console.log(req);
      
      res.end('okay');
    });
  }
};

module.exports = Router;