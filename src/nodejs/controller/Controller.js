const firebase = require('firebase/app'),
  Session = require('../io/session');
  
class Controller {
  constructor(prop) {
    this.auth = prop;
    this.container = document.getElementById('root');
    this.firebase = firebase;
    this.session = new Session(firebase);
    this.viewDir = 'templates/';
  }
  
  view(...view) {
    let [fileName, dataView] = view,
      oReq = new XMLHttpRequest();
      
    fileName = `${this.viewDir}${fileName}.html`;
    console.log(fileName);
    oReq.open('GET', fileName);
    oReq.onreadystatechange = () => {
      if (oReq.readyState == XMLHttpRequest.DONE) {
        let status = oReq.status,
          textContext = oReq.responseText;
        
        if (status === 0 || (status >= 200 && status < 400)) {
          // The request has been completed successfully
          this.container.innerHTML = textContext;
        } else {
          console.log(status);
          // Oh no! There has been an error with the request!
        }
      }
    };
    oReq.send();
  }
}

module.exports = Controller;