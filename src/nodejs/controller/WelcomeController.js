const Controller = require('./Controller');

class WelcomeController extends Controller {
  constructor(prop) {
    super(prop);
  }
  
  index() {
    this.view('welcome');
  }
}

module.exports = WelcomeController;