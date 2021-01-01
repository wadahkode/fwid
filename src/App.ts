const wadahkode = require('./tests/wadahkode.test'),
  app = new wadahkode();


function App() {
  app.name = 'Wadahkode';
  app.config = {
    mode: 'development',
    firebase: {
      use: true,
      fileConfig: "./config/firebase"
    },
    splashscreen: true
  };
  
  app.isConnected((status: boolean) => {
    if (!status) {
      return app.connectionLost();
    }
    
    app.firebaseSetup();
    app.getReady();
  });
}

module.exports = App;