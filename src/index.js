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
    alert('not valid');
    total.value = 'NaN';
    return;
  }
  const computed = 69 * apple + 59 * orange + 39 * banana;
  total.value = computed;
}

function validateForm(banana, apple, orange) {
  // digit validation
  switch (true) {
    case /[^\d]+/.test(banana):
      return false;
    case /[^\d]+/.test(apple):
      return false;
    case /[^\d]+/.test(orange):
      return false;
  }

  banana = Number(banana);
  apple = Number(apple);
  orange = Number(orange);

  // Integer validation
  switch (true) {
    case !Number.isInteger(apple) || apple < 0:
      return false;
    case !Number.isInteger(banana) || banana < 0:
      return false;
    case !Number.isInteger(orange) || orange < 0:
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