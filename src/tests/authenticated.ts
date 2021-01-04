class Authenticated {
  private firebase: any;
  
  constructor(firebase: any) {
    this.firebase = firebase;
  }
  
  has(id: string) {
    console.log(id)
  }
}

module.exports = () => new Authenticated(
  require('firebase/app').default
);