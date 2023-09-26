<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Login</title>
</head>

<body>

  <form id="login-form">
    <h1>Login</h1>


    <label for="user">Nombre:</label>
    <input type="text" name="user" id="user" required>

    <label for="pass">Contraseña:</label>
    <input type="password" name="pass" id="pass" required>


    <input type="submit" value="Login">


  </form>

  <script>
    document.getElementById('login-form').addEventListener('submit', function(event) {
      event.preventDefault();

      var name = document.getElementById('user').value;
      var password = document.getElementById('pass').value;
      const checkbox = document.getElementById('redireccionar_checkbox');

      var xhr = new XMLHttpRequest();
      xhr.open('POST', 'http://localhost/quickCarry/API/login.php', true);
      xhr.setRequestHeader('Content-Type', 'application/json');
      xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);
            if (response.error === "Credenciales incorrectas") {
              console.log(xhr.responseText);
              alert('Credenciales incorrectas. No se puede ingresar a la página.');
            } else {

              token = JSON.parse(xhr.responseText);

            }
          } else {
            console.log(xhr.responseText);
            alert('Login fallido');
          }
        }
      };

      var data = JSON.stringify({
        user: user,
        pass: pass
      });
      xhr.send(data);
    });

    function guardarToken(token) {
      localStorage.setItem('token', token);
    }

    function redirigirConToken(token) {


      window.location.href = 'http://www.google.com' + encodeURIComponent(token);
      //alert(token);
    }




    checkbox.addEventListener('cambio', function() {

      if (checkbox.checked) {
        window.location.href = 'http://www.google.com';
      }
    });
  </script>
</body>

</html>