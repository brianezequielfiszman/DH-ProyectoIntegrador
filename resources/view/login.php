<?php use Configuration\Config; ?>
    <div class="form-container">
        <h1 class="titulo">Login</h1>
        <form id='main-form' class="main-form" name="main-form" action="<?=Config::getLogin(Config::URI)?>" method="post">
            <h1 class="titulo-interno">Login</h1>
            <article class="inner-form">
                <span class="error" id="name-error"><?=$nameError = (isset($_GET['nameError'])) ? $_GET['nameError'] : ''?></span>
                <input id="name" class="input-text" type="text" name="nombre" placeholder="Ingrese Usuario">
                <span class="error" id="password-error"><?=$passError = (isset($_GET['passError'])) ? $_GET['passError'] : ''?></span>
                <input id="password" class="input-text" name="password" type="password" placeholder="Ingrese Password">
                <div class="recordame-container">
                    <span><input type="checkbox" value="true" id="recordame" name="recordame"></span>
                    <label for="recordame">Recordame</label>
                </div>
                <input type="submit" class="submit-button" name="name" class="submit" value="Iniciar sesión">
                <div class="olvide-password">
                    <a href="#">Olvide mi contrasena</a>
                </div>
            </article>
        </form>
    </div>
