function getValue() {
  let banana = document.querySelector('input[name="banana"]').value;
  let apple = document.querySelector('input[name="apple"]').value;
  let orange = document.querySelector('input[name="orange"]').value;
  return { banana, apple, orange }
}

function computeTotal() {
  let total = document.querySelector('input[name="total"]');
  const { banana, apple, orange } = getValue();
  if (!validateForm({ banana, apple, orange })){
    total.value = 'NaN';
    return;
  }
  const computed = 69 * apple + 59 * orange + 39 * banana;
  total.value = computed;
}

function validateInput(input) {
  switch (true) {
    case input === '':
      return 'Input is required';
    case /[^-\d]+/.test(input):
      return 'Input must be a digit';
    case !Number.isInteger(Number(input)) || Number(input) < 0:
      return 'Input must be a positive integer';
    default:
      return '';
  }
}

function validateForm(inputs) {
  let valid = true;
  Object.keys(inputs).forEach(key => {
    const message = validateInput(inputs[key]);
    if (message) {
      valid = false;
      document.querySelector(`[name=${key}]`).classList.add('is-invalid');
      document.querySelector(`[data-error="${key}"]`).textContent = message;
    } else {
      document.querySelector(`[name=${key}]`).classList.remove('is-invalid');
      document.querySelector(`[data-error="${key}"]`).textContent = '';
    }
  });
  return valid;
}

function mySubmit() {
  const valid = validateForm({ ...getValue()});
  if(!valid){
    event.preventDefault();
    createAlert('Invalid form! Please fix the input', document.querySelector('[data-error="form"]'));
  }
}

function createAlert(message, target, className='danger'){
  const alert = document.createElement('div');
  const dismissButton = document.createElement('button');
  const icon = document.createElement('span');

  alert.classList.add('alert', `alert-${className}`, 'alert-dismissable', 'fade', 'show');
  alert.textContent = message;

  dismissButton.setAttribute('data-dismiss', 'alert');
  dismissButton.classList.add('close');

  icon.setAttribute('aria-hidden', 'true');
  icon.innerHTML = '&times;';

  dismissButton.appendChild(icon);
  alert.appendChild(dismissButton);
  target.appendChild(alert);
}

function blurTotal() {
  let total = document.querySelector('input[name="total"]'); 
  total.blur();
}