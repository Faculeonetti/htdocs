document.querySelectorAll('.Button-behavior').forEach(button => {
  button.addEventListener('click', function () {
    document.getElementById('idshowoption').textContent = this.textContent;
    // Obtener la URL de destino del atributo data-url
    const redirectUrl = this.dataset.url;
    // Modificar el atributo action del formulario
    document.getElementById('login').action = redirectUrl;
    const inputs = document.querySelectorAll('.Input-info');
      inputs.forEach(input => {
        input.value = '';
      });;
    document.getElementsByClassName('Input-info').value = '';
      const elemento = document.getElementById('login');
      elemento.style.display = 'flex';
      elemento.style.opacity = '1';
    const elemento1 = document.getElementById('div1');
    document.getElementsByClassName('container-buttons').value = '';
      elemento1.style.display = 'flex';
      elemento1.style.opacity = '1'
  });
});


