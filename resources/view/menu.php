<div class="container">
    <h1 class="titulo">MENU</h1>
    <main class="main-section">
        <h1 class="titulo-interno">MENU</h1>
        <section class="inner-section">
            <table id='userTable'>
              <tbody>

                  <?php foreach ($usuarioLogueado as $key => $dato): ?>
                    <?php if ($key != 'password'):  ?>
                    <tr>
                      <td id='tableData'>
                    <?=$key?>
                      </td>
                      <td id='tableData'>
                    <?=$dato?>
                      </td>
                    </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
              </td>

              <td id='tableData'>
                <img src="/resources/img/generic-avatar.jpg" alt="" />
              </td>

              </tbody>
            </table>
        </section>
    </main>
</div>
