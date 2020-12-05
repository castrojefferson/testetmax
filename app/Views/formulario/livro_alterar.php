<form method="post" action="" class="container center-align">
  <label>Titulo
    <input type="text" placeholder="Titulo" name="titulo" required maxlength="45" value="<?php echo $livro['titulo'] ?>">
  </label>
  <label>Subtitulo
    <input type="text" placeholder="Subtitulo" name="subtitulo" required maxlength="45" value="<?php echo $livro['subtitulo'] ?>">
  </label>
  <label>Autor
    <input type="text" placeholder="Autor" name="autor" required maxlength="45" value="<?php echo $livro['autor'] ?>">
  </label>
  <label>Reservado Por
    <input type="text" placeholder="Não está reservado" name="reservado_por" maxlength="45" value="<?php echo $livro['reservado_por'] ?>">
  </label>
  <button class="btn waves-effect waves-light green" type="submit">
    <i class="material-icons right">send</i>
  </button>
</form>
