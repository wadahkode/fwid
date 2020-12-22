/**
 * Router
 * 
 * @author wadahkode <mvp.dedefilaras@gmail.com>
 * @since version 1.2.1
 */
class Router {
  constructor(prop=null) {
    this.request = new Request(prop);
  }
  
  get(...args) {
    let [requestUri, controller] = args,
      oReq = new XMLHttpRequest();
    
    this.request = new Request(requestUri);
    oReq.open(this.request.method, this.request.url);
    oReq.onreadystatechange = () => {
      if (oReq.readyState == XMLHttpRequest.DONE) {
        let status = oReq.status;
        
        if (status === 0 || (status >= 200 && status < 400)) {
          // The request has been completed successfully
          return this.getController(controller, this.request);
        } else {
          // Oh no! There has been an error with the request!
        }
      }
    };
    oReq.send();
  }
  
  getController(controller, request) {
    if (typeof controller == 'function') {
      return controller(request);
    }
  }
}

module.exports = Router;