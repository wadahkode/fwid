export const register = () => {
  if ("serviceWorker" in navigator) {
    window.addEventListener("load", () => {
      navigator.serviceWorker.register("../dist/service-worker.js");
      // .then((registration) => {
      // console.log("Service Worker registered: ", registration);
      // })
      // .catch((registrationError) => {
      // console.error(
      //   "Service Worker registration failed: ",
      //   registrationError
      // );
      // });
    });
  }
};
