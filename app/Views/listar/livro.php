<div class="container">
    <table class="striped responsive-table centered">
        <thead>
          <tr>
              <th></th>
              <th>ID</th>
              <th>Titulo</th>
              <th>Subtitulo</th>
              <th>Autor</th>
              <th>Reservado Por</th>
          </tr>
        </thead>
        
        <tbody>
             <?php foreach ($livros as $livro){ ?>
                  <tr>
                    <td><a href="/livros/editar/<?php echo $livro->id ?>"><i class="material-icons right blue-text">edit</i></a></td>
                    <td><?php echo $livro->id ?></td>
                    <td><?php echo $livro->titulo ?></td>
                    <td><?php echo $livro->subtitulo ?></td>
                    <td><?php echo $livro->autor ?></td>
                    <td><?php echo $livro->reservado_por ?></td>
                  </tr>
              <?php } ?>
        </tbody>
    </table>
        
</div>