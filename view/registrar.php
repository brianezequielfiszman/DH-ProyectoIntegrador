    <div class="form-container">

        <h1 class="titulo">Registrate</h1>
        <form id="main-form" class="main-form" action="<?=$config['controller']['URI']['submit_user']?>" method="post">
            <h1 class="titulo-interno">Registrate</h1>
            <article class="inner-form">
                <span class="error" id="name-error"><?=$nameError = (isset($_GET['nameError'])) ? $_GET['nameError'] : ''?></span>
                <input id="name" class="input-text" type="text" name="nombre" placeholder="Ingrese Usuario">
                <span class="error" id="email-error"><?=$emailError = (isset($_GET['emailError'])) ? $_GET['emailError'] : ''?></span>
                <input id="email" class="input-text" name="email" type="email" placeholder="Ingrese Correo">
                <span class="error" id="password-error"><?=$passError = (isset($_GET['passError'])) ? $_GET['passError'] : ''?></span>
                <input id="password" class="input-text" name="password" type="password" placeholder="Ingrese Password" >
                <span class="error" id="passwordConfirm-error"><?=$passConfirmError = (isset($_GET['passConfirmError'])) ? $_GET['passConfirmError'] : ''?></span>
                <input id="passwordConfirm" class="input-text" name="passwordConfirm" type="password" placeholder="Confirme Password">
                <input type="submit" class="submit-button" class="submit" value="Registrarse">
            </article>
        </form>
    </div>
