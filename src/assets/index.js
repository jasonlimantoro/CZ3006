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
      // bypass
      return true;
    case /[^\d]+/.test(input):
      return false;
    case !Number.isInteger(Number(input)) || Number(input) < 0:
      return false;
    default:
      return input;
  }
}

function validateForm({ apple, banana, orange }) {
  switch (true) {
    case !validateInput(banana):
      alert(`Input banana: ${banana} is invalid`);
      return false;
    case !validateInput(apple):
      alert(`Input apple: ${apple} is invalid`);
      return false;
    case !validateInput(orange):
      alert(`Input orange: ${orange} is invalid`);
      return false;
    default:
      return { banana, apple, orange };
  }
}

function mySubmit() {
  const valid = validateForm({ ...getValue()});
  if(!valid){
    event.preventDefault();
    return;
  }
}

function blurTotal() {
  let total = document.querySelector('input[name="total"]'); 
  total.blur();
}