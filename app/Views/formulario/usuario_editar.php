<form method="post" action="" class="container center-align">
  <label>Nome
    <input type="text" placeholder="Nome" name="nome" required maxlength="255" value="<?php echo $nome; ?>">
  </label>
  <label>Email
    <input type="text" name="email" required maxlength="255" value="<?php echo $email; ?>" readonly disabled>
    <small>Endereço de email não pode ser alterado</small>
  </label>
  <br>
  <label>Senha
    <input type="password" placeholder="*** (Sem alteração)" name="senha" maxlength="45">
  </label>
  <button class="btn waves-effect waves-light green" type="submit">
    <i class="material-icons right">send</i>
  </button>
</form>
