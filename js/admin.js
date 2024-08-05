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
      const checkbox = document.getElementById('activado');
      checkbox.checked = false;
        inputs.forEach(input => {
        input.value = '';

        });

    })
    .catch(error => {
      console.error('Error:', error);
    });
  }

  function borrar(){
    const inputs = document.querySelectorAll('input');
    const checkbox = document.getElementById('activado');
    checkbox.checked = false;
      inputs.forEach(input => {
      input.value = ''; 
      });
    }


    function actualizarProductos() {
        $.ajax({
          url: 'consulta.php',
          success: function(data) {
            $('#productos').html(data);
          }
        });
      }
  
      // Ejecutar la función inicialmente y luego cada 5 segundos
      actualizarProductos();
      setInterval(actualizarProductos, 2000);