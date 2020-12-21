/**
 * Router
 * 
 * @author wadahkode <mvp.dedefilaras@gmail.com>
 * @since version 1.2.1
 */
let router = {
  "parentPath": null,
  "groupFunc": ""
};

/**
 * Router add
 * 
 * @param string path
 * @param string|function controller
 */
router.add = function(...param){
  const container = document.getElementById('root');
  container.innerHTML = "Selamat datang di Framework Javascript Indonesia";
  
  [url,controller] = param;
  
  console.log(url,controller);
};

module.exports = router;

