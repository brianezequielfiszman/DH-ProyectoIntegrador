    <div class="form-container">

        <h1 class="titulo">Registrate</h1>
        <form id="main-form" class="main-form" action="<?=$config['controller']['URI']['submit_user']?>" method="post">
            <h1 class="titulo-interno">Registrate</h1>
            <article class="inner-form">
                <span class="error" id="name-error"></span>
                <input id="name" class="input-text" type="text" name="nombre" placeholder="Ingrese Usuario">
                <span class="error" id="email-error"></span>
                <input id="email" class="input-text" name="email" type="email" placeholder="Ingrese Correo">
                <span class="error" id="password-error"></span>
                <input id="password" class="input-text" name="password" type="password" placeholder="Ingrese Password" >
                <span class="error" id="passwordConfirm-error"></span>
                <input id="passwordConfirm" class="input-text" name="passwordConfirm" type="password" placeholder="Confirme Password">
                <input type="submit" class="submit-button" class="submit" value="Registrarse">
            </article>
        </form>
    </div>
