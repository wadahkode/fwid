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
  
  /**
   * Warning (!)
   * 
   * Jika dalam masa pengembangan alahkah lebih baik,
   * atur mode kedalam "development", tetapi jika ingin
   * melanjutkan kedalam produksi, atur mode menjadi:
   * 
   * new wadahkode({mode: "production"})
   */
  app.debug();
  
})(new wadahkode({
  mode: "development"
}));