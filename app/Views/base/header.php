<head>
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>


<div class="navbar-fixed">
    <nav>
        <a class="brand-logo">TesteTMax</a>
        <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <?php if ( $e_administrador == '1' ) : ?>
                <li>(Administrador)</li>
                <li><a href='/livros/'>Livros</a></li>
                <li><a href='/reservas/reservados'>Reservas</a></li>
                <li><a href='/usuarios/'>Usuarios</a></li>
            <?php else : ?>
                <li><a href='/reservas/'>Reservar Livro</a></li>
            <?php endif; ?>
            <?php if ( !$esta_logado == '1' ) : ?>
                <li><a href='/usuario/cadastrar/'>Cadastrar</a></li>
                <li><a href='/usuario/login/'>Logar</a></li>
            <?php else : ?>
                <li><a href='/usuario/logout/'>Logout</a></li>
                <li><a href="/usuario/editar/">Editar Perfil</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</div>

<ul id="slide-out" class="sidenav">
            <?php if ( $e_administrador == '1' ) : ?>
                <li>(Administrador)</li>
                <li><a href='/livros/'>Livros</a></li>
                <li><a href='/reservas/reservados'>Reservas</a></li>
                <li><a href='/usuarios/'>Usuarios</a></li>
            <?php else : ?>
                <li><a href='/reservas/'>Reservar Livro</a></li>
            <?php endif; ?>
            <?php if ( !$esta_logado == '1' ) : ?>
                <li><a href='/usuario/cadastrar/'>Cadastrar</a></li>
                <li><a href='/usuario/login/'>Logar</a></li>
            <?php else : ?>
                <li><a href='/usuario/logout/'>Logout</a></li>
                <li><a href="/usuario/editar/">Editar Perfil</a></li>
            <?php endif; ?>
</ul>

<script>
    $(document).ready(function () {
        $('.sidenav').sidenav();
    });
</script>
