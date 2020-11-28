<head>
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<nav>
 <div class="navbar-fixed">
   <div class="nav-wrapper">
      <a href="#" class="brand-logo">TesteTMAx</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href='/livros/'>Livros</a></li>
        <li><a href='/reservas/'>Reservas</a></li>
        <li><a href='/usuarios/'>Usuarios</a></li>
        <?php if ( !$esta_logado == '1' ) : ?>
            <li><a href='/usuario/cadastrar/'>Cadastrar</a></li>
            <li><a href='/usuario/login/'>Logar</a></li>
        <?php else : ?>
            <li><a href='/usuario/logout/'>Logout</a></li>
        <?php endif; ?>
      </ul>
    </div>
  </nav>
<div>
