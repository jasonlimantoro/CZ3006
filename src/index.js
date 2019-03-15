function getValue() {
  let banana = document.querySelector('input[name="banana"]').value;
  let apple = document.querySelector('input[name="apple"]').value;
  let orange = document.querySelector('input[name="orange"]').value;
  return { banana, apple, orange }
}

function computeTotal() {
  let total = document.querySelector('input[name="total"]');
  const { banana, apple, orange } = getValue();
  if (!validateForm(banana, apple, orange)) {
    total.value = 'NaN';
    return;
  }
  const computed = 69 * apple + 59 * orange + 39 * banana;
  total.value = computed;
}

function validateForm(banana, apple, orange) {
  banana = parseInt(banana);
  apple = parseInt(apple);
  orange = parseInt(orange);

  if(
    !Number.isInteger(banana) ||
    !Number.isInteger(apple) ||
    !Number.isInteger(orange)
   ){
    return false;
  }
  return { apple, orange, banana };
}

function mySubmit() {
  const { banana, apple, orange } = getValue();
  const valid = validateForm(banana, apple, orange);
  if(!valid){
    alert('Not valid input!');
    event.preventDefault();
    return;
  }
}

function blurTotal() {
  let total = document.querySelector('input[name="total"]'); 
  total.blur();
}