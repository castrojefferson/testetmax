<div class="container">
    <table class="striped responsive-table centered">
        <thead>
          <tr>
              <th>EMAIL</th>
          </tr>
        </thead>
        
        <tbody>
             <?php foreach ($usuarios as $usuario){ ?>
                  <tr>
                    <td><?php echo $usuario->email ?></td>
                  </tr>
              <?php } ?>
        </tbody>
    </table>
        
</div>