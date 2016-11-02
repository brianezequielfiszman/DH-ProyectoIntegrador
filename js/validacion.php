window.onload = function() {
  <?php use Configuration\Config; ?>
  <?php use Configuration\ValidationConfig; ?>

  <?php require_once $_SERVER['DOCUMENT_ROOT'].'/controller/Configuration/Config.php'; ?>
  <?php require_once $_SERVER['DOCUMENT_ROOT'].'/controller/Configuration/ValidationConfig.php'; ?>

    const MAIL_REGEXP      = new RegExp(<?=ValidationConfig::$regExp['mailRegExp']?>);

    const USER_FIELD_EMPTY = '<?=ValidationConfig::$errors['userFieldEmpty']?>';
    const MAIL_FIELD_EMPTY = '<?=ValidationConfig::$errors['mailFieldEmpty']?>';
    const PASS_FIELD_EMPTY = '<?=ValidationConfig::$errors['passFieldEmpty']?>';
    const INVALID_MAIL     = '<?=ValidationConfig::$errors['invalidMail']?>';
    const SHORT_PASSWORD   = '<?=ValidationConfig::$errors['shortPassword']?>';
    const UNEQUAL_PASSWORD = '<?=ValidationConfig::$errors['unequalPassword']?>';
    const USER_EXISTS      = '<?=ValidationConfig::$errors['userExists']?>';

    const USER_FIELD_TOO_LONG = '<?=ValidationConfig::$errors['userFieldTooLong']?>';
    const PASS_FIELD_TOO_LONG = '<?=ValidationConfig::$errors['passFieldTooLong']?>';

    const OK    = false;
    const ERROR = true;

    const NAME             = '<?=ValidationConfig::$inputs['name']?>';
    const EMAIL            = '<?=ValidationConfig::$inputs['email']?>';
    const PASSWORD         = '<?=ValidationConfig::$inputs['password']?>';
    const PASSWORD_CONFIRM = '<?=ValidationConfig::$inputs['passwordConfirm']?>';
    const MAIN_FORM        = '<?=ValidationConfig::$inputs['main-form']?>';
    const SUBMIT           = '<?=ValidationConfig::$inputs['submit']?>';
    'use strict';

    <?php include Config::$view['URL']['ajax']; ?>

    /**
     * [validate: validacion de formulario]
     * @param  {[string]}   elemHTML         [description]
     * @return {[Object]}                   [description]
     */
    function validate(elemHTML) {
        var isValid;

        switch (elemHTML.id) {
            case NAME:
                isValid = ((elemHTML.value.length > 0) ?
                    ((elemHTML.value.length < 50) ?
                        aproveField(elemHTML) :
                        generateError(elemHTML, USER_FIELD_TOO_LONG)) :
                    (generateError(elemHTML, USER_FIELD_EMPTY)));
                break;
            case EMAIL:
                isValid = ((elemHTML.value.length > 0) ?
                    ((MAIL_REGEXP.test(elemHTML.value)) ?
                        aproveField(elemHTML) :
                        generateError(elemHTML, INVALID_MAIL)) :
                    generateError(elemHTML, MAIL_FIELD_EMPTY));
                break;
            case PASSWORD:
                isValid = ((elemHTML.value.length > 0) ?
                    ((elemHTML.value.length >= 8) ?
                        ((elemHTML.value.length < 50) ?
                            aproveField(elemHTML) :
                            generateError(elemHTML, PASS_FIELD_TOO_LONG)) :
                        generateError(elemHTML, SHORT_PASSWORD)) :
                    generateError(elemHTML, PASS_FIELD_EMPTY));
                break;
            case PASSWORD_CONFIRM:
                isValid = ((elemHTML.value === document.querySelector('form').password.value) ?
                    ((elemHTML.value.length > 0) ?
                        ((elemHTML.value.length >= 8) ?
                            ((elemHTML.value.length < 50) ?
                                aproveField(elemHTML) :
                                generateError(elemHTML, PASS_FIELD_TOO_LONG)) :
                            generateError(elemHTML, SHORT_PASSWORD)) :
                        (generateError(elemHTML, PASS_FIELD_EMPTY))) :
                    generateError(elemHTML, UNEQUAL_PASSWORD));
                break;
            case MAIN_FORM:
                isValid = (function() {
                    var errorFlag;
                    for (var j = 0; j < elemHTML.length; j++) {
                        if (validate(elemHTML[j]) === ERROR)
                            errorFlag = ERROR;
                        if (elemHTML[j].className === SUBMIT)
                            if (errorFlag !== ERROR) {
                                errorFlag = OK;
                                break;
                            }
                    }
                    return errorFlag;
                })();
                break;
        }

        elemHTML.style.borderStyle = 'solid';
        return isValid;
    }


    // EN CASO DE QUE UN CAMPO SEA INVALIDO SE LE GENERA EL TEXTO DE ERROR
    function generateError(elemHTML, elementError) {
        var bodyErrorMsg = document.getElementById(elemHTML.id + '-error');
        elemHTML.style.borderColor = 'red';

        if (bodyErrorMsg.firstChild) {
            bodyErrorMsg.removeChild(bodyErrorMsg.firstChild);
            bodyErrorMsg.appendChild(document.createTextNode(elementError));
        } else
            bodyErrorMsg.appendChild(document.createTextNode(elementError));

        return ERROR;
    }

    // ESTA FUNCION APRUEBA UN CAMPO VALIDO!
    function aproveField(elemHTML) {
        var bodyErrorMsg = document.getElementById(elemHTML.id + '-error');
        if (bodyErrorMsg.firstChild)
            bodyErrorMsg.removeChild(bodyErrorMsg.firstChild);
        elemHTML.style.borderColor = 'green';
        return OK;
    }

    // ESTA FUNCION VALIDA UN ELEMENTO
    function elementsValidate(elementId) {
        if (document.querySelector(elementId))
            document.querySelector(elementId).onblur = function() {
                validate(this);
            };
        // ESTO SOLO SE ACTIVA CUANDO SE HACE EL SUBMIT
        if (document.querySelector('form'))
            document.querySelector('form').onsubmit = function(evt) {
                if (validate(this))
                    ajaxCall('https://sprint.digitalhouse.com/nuevoUsuario', function(response) {
                        ajaxCall('https://sprint.digitalhouse.com/getUsuarios', function(response) {
                            window.alert('Te has registrado! La cantidad de usuarios es: ' + response.cantidad);
                        }, 'GET', null);
                    }, 'GET', null);
                //else
                    //evt.preventDefault();
            };
    }

    // LAS SIGUIENTES LINEAS VALIDAN TODOS LOS ELEMENTOS DEL AREA DE REGISTRO
    elementsValidate('#name');
    elementsValidate('#password');
    elementsValidate('#passwordConfirm');
    elementsValidate('#email');
    elementsValidate('#main-form');
};
