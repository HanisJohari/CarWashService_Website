
// Ensure the script waits until the page is fully loaded
window.addEventListener('load', function () {
  var loader = document.getElementById("preloader");

  // Wait for 3.5 seconds before hiding the preloader
  setTimeout(function () {
      loader.style.display = 'none';
  }, 2000);
});
