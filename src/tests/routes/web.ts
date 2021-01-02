const Route = require('../router');
//require('jsdom-global')();

Route.group('/', function(){
  Route.get('index.html', function(){
    console.log(true)
  });
  
  Route.get('login', 'login');
});

Route.group('/home', function(){
  console.log(true)
});