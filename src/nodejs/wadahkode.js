class Wadahkode {
  constructor(config={}) {
    this.name = "Wadahkode";
    this.config = config;
    this.container = this.getContainer();
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
  
  debug() {
    let debugEl = document.createElement('button'),
      debugModal = document.createElement('div');
    
    try {
      if (this.config.mode !== 'production') {
        throw new Error('Sedang dalam pengembangan!');
      }
      
    } catch (e) {
      
    debugEl.className = 'debug btn btn-primary';
      debugEl.setAttribute('data-toggle','modal');
      debugEl.setAttribute('data-target','#debuging');
      debugEl.innerHTML = 'debug';
      debugModal.className = 'modal fade';
      debugModal.id = 'debuging';
      debugModal.innerHTML = `
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Debugging</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>${e.message}</p>
            </div>
          </div>
        </div>
      `;
      
      if (this.container == null) {
        return false;
      }
      this.container.appendChild(debugEl);
      this.container.appendChild(debugModal);
    }
  }
  
  getContainer() {
    if (typeof document == 'object') {
      return document.getElementById('root');
    }
  }
  
  isConnected() {
    return navigator.onLine ? true : false;
  }
}

module.exports = Wadahkode;