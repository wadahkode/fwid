require('jsdom-global')();

/**
 * Exception
 * 
 * @author wadahkode <mvp.dedefilaras@gmail.com>
 * @since version 1.0.0
 */
class Exception {
  constructor(message: string, filename: string, line: number) {
    let el = document.createElement('button'),
      modal = document.createElement('div');
      
    el.className = 'debug btn btn-primary';
    el.setAttribute('data-toggle','modal');
    el.setAttribute('data-target','#debuging');
    el.innerHTML = 'debug';
    modal.className = 'modal fade';
    modal.id = 'debuging';
    modal.innerHTML = `
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">WARNING <span class="text-danger">(!)</span></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>${line > 0 ? `[${line}]` : ""}
            ${message !== null ? message : "Sedang dalam pengembangan!"}
            ${filename !== null ? filename : ""}</p>
          </div>
        </div>
      </div>
    `;
    
    const containter = document.getElementById('root');
    
    containter.appendChild(el);
    containter.appendChild(modal);
  }
}

module.exports = Exception;