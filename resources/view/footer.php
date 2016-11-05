
<nav class="main-nav">
  <div class="user-nav">
    <div class="links-holder">
        <a href='index.php?id=<?=HOME?>' class="link">HOME</a>
        <a href='index.php?id=<?=FAQS?>' class="link">FAQS</a>
        <?php if (!$auth->isLogged()): ?>
        <a href='index.php?id=<?=LOGIN?>' class="link">Login</a>
        <a href='index.php?id=<?=SIGNUP?>' class="link">Registrarse</a>
      <?php else: ?>
        <a href='index.php?id=<?=MENU?>' class="link">Menu</a>
        <a href='index.php?id=<?=LOGOUT?>' class="link">Logout</a>
      <?php endif; ?>
    </div>
    <div class="welcome">
    <?php if ($auth->isLogged()): ?>
      Bienvenido <?=$usuarioLogueado['nombre']?>
    <?php else: ?>
      Bienvenido invitado
    <?php endif; ?>
    </div>
  </div>
</nav>
