const firebase = require('firebase/app').default;
const Exception = require('./exception');
require('firebase/auth');
require('firebase/database');
require('firebase/storage');

class Wadahkode {
  constructor(config={}) {
    this.name = "Wadahkode";
    this.config = config;
    this.container = this.getContainer();
    this.splashscreen = config.splashscreen;
  }
  
  connectionLost() {
    return (this.container == null)
      ? false
      : this.container.innerHTML = `
        <div class="preloader position-fixed text-center w-100 h-100">
          <p>Koneksi jaringan terputus,
            <a href="#" onclick="location.reload()">muat ulang kembali</a>
          </p>
        </div>
      `;
  }
  
  exception(message=null, filename=null, line=0) {
    if (this.config.mode !== 'production') {
      return new Exception(message, filename, line);
    }
  }
  
  firebaseSetup() {
    const {use, collection, fileConfig} = this.config.firebase;
    
    try {
      if (use) {
        const firebaseConfig = require(`${fileConfig}`);
        firebase.initializeApp(firebaseConfig);
      } else {
        throw new Error('Firebase belum diaktifkan!');
      }
    } catch (e) {
      this.exception(e.message, e.fileName, e.lineNumber);
    }
  }
  
  getContainer() {
    if (typeof document == 'object') {
      return document.getElementById('root');
    }
  }
  
  getReady() {
    // Menampilkan splashscreen jika sudah diatur
    if (this.splashscreen) {
      this.getSplashScreen();
    }
    
    this.testFirebaseConnected(status => {
      try {
        if (!status)
          return this.exception('Layanan firebase tidak dapat terhubung, koneksi internet anda mungkin terlalu lambat!');
      
        require('./routes/web');
      } catch (e) {
        this.exception(e.message, e.fileName, e.lineNumber);
      }
    });
  }
  
  getSplashScreen() {
    this.container.style.background = "#fff";
    this.container.innerHTML = `
      <div class="splashscreen">
        <div class="brand text-light">Wadahkode</div>
        <div class="loading">
          <div class="dot"></div>
          <div class="dot"></div>
          <div class="dot"></div>
          <div class="dot"></div>
          <div class="dot"></div>
        </div>
      </div>
    `;
  }
  
  isConnected() {
    return navigator.onLine ? true : false;
  }
  
  testFirebaseConnected(callback) {
    return firebase.database().ref('/.info/connected')
      .on('value', snap => {
        setTimeout(function() {
          if (snap.val() === true) {
            callback(true);
          }
        }, 3000);
      });
  }
}

module.exports = Wadahkode;