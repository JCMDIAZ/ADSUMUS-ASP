<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Login Adsumus</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/estilos.css">
    <style>
        body{
          display: -ms-flexbox;
          display: -webkit-box;
          display: flex;
          -ms-flex-align: center;
          -ms-flex-pack: center;
          -webkit-box-align: center;
          align-items: center;
          -webkit-box-pack: center;
          justify-content: center;
          padding-top: 40px;
          padding-bottom: 40px;
          background-color: #f5f5f5;
        }
    </style>
  </head>
  <body class="text-center">
    <form class="form-signin" action="Login" method="POST">
      <img class="mb-4" src="https://getbootstrap.com/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Inicio de Sesión</h1>
      <label for="Correo" class="sr-only">Correo</label>
      <input type="email" id="Correo" class="form-control" placeholder="Correo" name="correo" required autofocus>
      <label for="Contraseña" class="sr-only">Contraseña</label>
      <input type="password" id="Contraseña" class="form-control" placeholder="Contraseña" name="contraseña" required>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Iniciar Sesión</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2018</p>
    </form>
  </body>
</html>
