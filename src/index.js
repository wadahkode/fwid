const wadahkode = require('./nodejs/wadahkode');

(app => {
  "use strict";
  
  /**
   * Warning (!)
   * 
   * Pada lingkungan nodejs ini tidak dapat berjalan,
   */
  if (!app.isConnected()) {
    return app.connectionLost();
  }
  
  // Pengaturan Firebase
  app.firebaseSetup();
  
  return app.getReady();
})(new wadahkode({
  mode: "development",
  firebase: {
    use: true,
    fileConfig: "./config/firebase"
  },
  splashscreen: true
}));