const internet = require('is-online');
const firebase = require('firebase/app').default;
const exception = require('./exception');
require('jsdom-global')();
require('firebase/auth');
require('firebase/database');
require('firebase/storage');

class WadahkodeTest {
  public name: string = 'Wadahkode';
  public config: any;
  private container: any;
  private splashscreen: boolean = false;
  
  constructor(prop: boolean = false) {
    this.container = document.getElementById('root');
    this.splashscreen = prop;
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
  
  exception(message: string = null, filename: string = null, line: number = 0) {
    if (this.config.mode !== 'production') {
      return new exception(message, filename, line);
    }
  }
  
  firebaseSetup() {
    const {
      use,
      fileConfig
    } = this.config.firebase;
    
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
  
  getReady() {
    this.splashscreen = this.config.splashscreen;
    
    if (this.splashscreen) {
      this.getSplashScreen();
    }
    
    this.testFirebaseConnected((status: boolean) => {
      try {
        if (!status) return this.exception('Layanan firebase tidak dapat terhubung, koneksi internet anda mungkin terlalu lambat!');
        
        require('./routes/web');
       
      } catch (e) {
        this.exception(e.message, e.fileName, e.lineNumber);
      }
    });
  }
  
  getSplashScreen() {
    if (!localStorage.getItem('_spsc')) {
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
      
      localStorage.setItem('_spsc', 'true');
    } else {
      let date = new Date(),
        seconds: number = date.getMilliseconds(),
        limit: number = 60 * 60 * 6,
        i: number = 0,
        refresh: any = setInterval(() => {
          if (i == limit) {
            localStorage.removeItem('_spsc');
            i = 0;
          }
          i++;
        }, seconds);
    }
  }
  
  isConnected(callback: any) {
    return internet({timeout: 3000})
      .then((onLine: any) => {
        if (!onLine) callback(false);
        else callback(true);
      });
  }
  
  testFirebaseConnected(callback: any) {
    return firebase.database().ref('/.info/connected')
      .on('value', (snap: any) => {
        setTimeout(function() {
          if (snap.val() === true) {
            callback(true);
          }
        }, 20);
      });
  }
}

module.exports = WadahkodeTest;