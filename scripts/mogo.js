function bannerSwitcher() {
  // Get all the input elements with the class 'sec-1-input'
  const inputs = document.querySelectorAll('.sec-1-input');
  let next = null;

  // Find the checked input and determine the next input
  inputs.forEach((input, index) => {
    if (input.checked) {
      next = inputs[index + 1] || inputs[0]; // If no next input, use the first one
    }
  });

  if (next) next.checked = true;
}

let bannerTimer = setInterval(bannerSwitcher, 3000);

document.querySelectorAll('nav .controls label').forEach((label) => {
  label.addEventListener('click', function() {
    clearInterval(bannerTimer);
    bannerTimer = setInterval(bannerSwitcher, 3000);
  });
});


function openPopup() {
  document.getElementById('overlay').style.display = 'flex';
}

function openPopup2() {
  document.getElementById('overlay2').style.display = 'flex';
}

function closePopup() {
  document.getElementById('overlay').style.display = 'none';
}
function closePopup2() {
  document.getElementById('overlay2').style.display = 'none';
}

// Close the pop-up when clicking outside of it
window.onclick = function(event) {
  const overlay = document.getElementById('overlay');
  const overlay2 = document.getElementById('overlay2');
  if (event.target === overlay || event.target === overlay2) {
    closePopup();
    closePopup2();
  }
}