const Controller = require('./Controller');

class LoginController extends Controller {
  constructor(prop) {
    super(prop);
    if (localStorage.getItem('_spsc')) {
      localStorage.removeItem('_spsc');
    }
  }
  
  index() {
    this.view('login');
  }
}

module.exports = LoginController;