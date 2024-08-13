
localStorage.setItem('pageTitle', document.title);
function handleSubmit(event) {
  event.preventDefault();

  // Obtener los datos del formulario
  const formData = new FormData(event.target);
  const data = Object.fromEntries(formData.entries());

  // Enviar los datos al servidor (ajusta la URL del endpoint)
  fetch('./adminendpoint.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify(data)
  })
    .then(response => response.json())
    .then(data => {

      // Procesar la respuesta del servidor
      console.log(data); // Por ejemplo, mostrar un mensaje al usuario
      // Aquí puedes actualizar la interfaz, mostrar un modal, etc.
      const inputs = document.querySelectorAll('input');
      inputs.forEach(input => {
        input.value = '';
      });

    })
    .catch(error => {
      console.error('Error:', error);
    });

}

function borrar() {
  const inputs = document.querySelectorAll('input');
  inputs.forEach(input => {
    input.value = '';
  });
}



function actualizarProductos() {
  $.ajax({
    url: 'consulta.php',
    success: function (data) {
      $('#productos').html(data);
    }
  });
}

function actualizarProductos1() {
  $.ajax({
    url: 'checkboxendpoint.php',
    success: function (data) {
      $('#seccion-a-recargar').html(data);
    }
  });
}
actualizarProductos();
actualizarProductos1();

//setInterval(actualizarProductos1, 5000);
//setInterval(actualizarProductos, 5000);

document.addEventListener('change', function (event) {
  if (event.target.type === 'checkbox') {
    let checkboxId = event.target.id;
    // Aquí tendrás el ID del checkbox en la variable checkboxId
    // Para verificar el valor obtenido
    let numeroProducto = checkboxId.split('-')[1];
    nuevoValor = 1;
    // Resto del código para extraer el número y actualizar la base de datos
    actualizarBaseDatos(numeroProducto, nuevoValor);

  }
});

function actualizarBaseDatos(numeroProducto, nuevoValor) {
  // Crear el objeto que se enviará como JSON
  const data = {
    numeroProducto: numeroProducto,
    nuevoValor: nuevoValor
  };

  // Convertir el objeto a una cadena JSON
  const jsonData = JSON.stringify(data);

  // Mostrar el JSON formateado en la consola (opcional)
  console.log('JSON enviado:', JSON.stringify(data, null, 2)); // El tercer argumento (2) agrega sangría para mejor legibilidad

  // Enviar la solicitud POST al servidor
  fetch('changeendpoint.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: jsonData
  })
    .then(response => {
      if (!response.ok) {
        throw new Error('Error en la solicitud');
      }
      return response.json();
    })
    .then(data => {
      console.log('Respuesta del servidor:', data);

      // Aquí puedes mostrar un mensaje al usuario indicando que se ha actualizado correctamente
    })
    .catch(error => {
      console.error('Error al actualizar:', error);
      // Aquí puedes mostrar un mensaje de error al usuario
    });
}

const tablasConectadas = document.querySelectorAll('.tabla-conectada');

tablasConectadas.forEach(tabla => {
  tabla.addEventListener('mouseover', () => {
    tablasConectadas.forEach(tabla => tabla.classList.add('hover'));
  });
  tabla.addEventListener('mouseout', () => {
    tablasConectadas.forEach(tabla => tabla.classList.remove('hover'));
  });
});
