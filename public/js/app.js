
console.log("app.js");
const closeButton = document.getElementById('flash-close');
const flashBody = document.getElementById('flash-body');
closeButton.addEventListener('click', () => {
  flashBody.style.display = 'none';
}, false)