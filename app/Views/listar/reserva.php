<div class="container">
    <table class="striped responsive-table centered">
        <thead>
          <tr>
              <th>Reservar</th>
              <th>ID</th>
              <th>Titulo</th>
              <th>Subtitulo</th>
              <th>Autor</th>
          </tr>
        </thead>
        
        <tbody>
             <?php foreach ($livros as $livro){ ?>
                  <tr>
                    <td><a href="/reservas/reservar/<?php echo $livro->id ?>" class="btn">Reservar</a></td>
                    <td><?php echo $livro->id ?></td>
                    <td><?php echo $livro->titulo ?></td>
                    <td><?php echo $livro->subtitulo ?></td>
                    <td><?php echo $livro->autor ?></td>
                  </tr>
              <?php } ?>
        </tbody>
    </table>
        
</div>