const buttons = document.querySelectorAll('#button_list button');

const forms = document.querySelectorAll('form');

let jindex = 0;
forms.forEach((form) => {
  form.setAttribute('data_form', jindex);

  console.log(form.attributes.data_form.value);
  jindex++;
});

let index = 0;
buttons.forEach((button) => {
  button.setAttribute('data_button', index);

  button.addEventListener('click', () => {
    console.log(button.attributes.data_button.value);

    forms[button.attributes.data_button.value].classList.add('form-visable');
  });

  index++;
});
