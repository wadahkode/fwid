const wadahkode = require('./wadahkode.test'),
  Route = wadahkode().router;

Route.group('/', function(this: void, route: any) {
  route.get('index.html', () => {});
});