const mobileNumberInput = document.getElementById('mobileNumber');
const sendOTPButton = document.getElementById('sendOTPButton');
const countdownElement = document.getElementById('countdown');
let countdownInterval;

mobileNumberInput.addEventListener('input', () => {
  const value = mobileNumberInput.value;
  if (value.length === 10) {
    sendOTPButton.classList.remove('hidden');
  } else {
    sendOTPButton.classList.add('hidden');
    stopCountdown();
  }
});

sendOTPButton.addEventListener('click', () => {
  sendOTPButton.classList.add('hidden');
  countdownElement.textContent = 'OTP Sent';
  countdownElement.classList.remove('hidden');
  startCountdown();
});

function startCountdown() {
  let remainingTime = 60; // 60 seconds countdown

  countdownElement.textContent = `Resend OTP in ${remainingTime} seconds`;
  countdownElement.classList.remove('hidden');

  countdownInterval = setInterval(() => {
    remainingTime--;
    if (remainingTime === 0) {
      stopCountdown();
      countdownElement.classList.add('hidden');
      sendOTPButton.classList.remove('hidden');
    } else {
      countdownElement.textContent = `Resend OTP in ${remainingTime} seconds`;
    }
  }, 1000);
}

function stopCountdown() {
  clearInterval(countdownInterval);
}
