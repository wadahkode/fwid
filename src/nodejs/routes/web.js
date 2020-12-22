const router = require('../io/router'),
  Route = new router();
  
Route.get('/', function(){
  const container = document.getElementById('root');

  container.innerHTML = 'Selamat datang di Framework Javascript Indonesia';
});
