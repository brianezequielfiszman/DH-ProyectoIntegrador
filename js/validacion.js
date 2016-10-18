window.onload = function() {
    var patt = new RegExp(/^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i);

    const USER_FIELD_EMPTY = 'El campo de usuario esta vacio.';
    const MAIL_FIELD_EMPTY = 'El campo de correo esta vacio.';
    const PASS_FIELD_EMPTY = 'El campo de clave esta vacio.';
    const INVALID_MAIL = 'El formato de correo ingresado no es valido.';
    const SHORT_PASSWORD = 'El password debe ser de minimo 8 caracteres.';
    const UNEQUAL_PASSWORD = 'Los campos de password no coinciden.';
    const USER_EXISTS = 'El usuario ingresado ya existe.';

    const USER_FIELD_TOO_LONG = 'El valor de usuario es demasiado largo.';
    const PASS_FIELD_TOO_LONG = 'La clave ingresada es demasiado larga.';

    const OK = true;
    const ERROR = false;

    const NAME = 'name';
    const EMAIL = 'email';
    const PASSWORD = 'password';
    const PASSWORD_CONFIRM = 'passwordConfirm';
    const MAIN_FORM = 'main-form';

    'use strict';

    /**
     * [ajaxCall: Llamada asincronica]
     * @param  {[string]} method ['GET' o 'POST']
     * @param  {[string]} url    [url de la api de donde se quiera consumir]
     * @param  {Function} cb     [callback]
     * @return {[type]}        [description]
     */
    function ajaxCall(method, url, cb) {
        // Primero: Crear el objeto para las llamadas asincronas
        var ajax = new XMLHttpRequest();
        //	Segundo: Atrapar cambios en el pedido
        ajax.onreadystatechange = function() {
            if (ajax.readyState === 4) {
                if (ajax.status === 200) {
                    if (testJSON(ajax.responseText)) {
                        var miRespuesta = JSON.parse(ajax.responseText);
                        cb(miRespuesta);
                    } else {
                        cb(Error('Not JSON'));
                    }
                } else {
                    cb(Error('Network Error'));
                }
            }
        };
        ajax.onerror = function() {
            cb(Error('Network Error'));
        };
        // Tercero: Indicar adonde va a ser el pedido
        ajax.open(method, url, true);
        // Cuarto: Lanzar el pedido
        ajax.send();
    }

    /**
     * [testJSON: comprobar si una cadena de JSON valida]
     * @param  {[string]} text [la cadena a ser validada]
     * @return {[type]}      [description]
     */
    function testJSON(text) {
        try {
            JSON.parse(text);
            return true;
        } catch (error) {
            return false;
        }
    }

    /**
     * [validate: validacion de formulario]
     * @param  {[string]}   elemHTML         [description]
     * @return {[Object]}                   [description]
     */
    function validate(elemHTML) {
        var isValid;

        switch (elemHTML.id) {
            case NAME:
                isValid = ((elemHTML.value.length > 0)
                    ? ((elemHTML.value.length < 50)
                        ? aproveField(elemHTML)
                        : generateError(elemHTML, USER_FIELD_TOO_LONG))
                    : (generateError(elemHTML, USER_FIELD_EMPTY)));
                break;
            case EMAIL:
                isValid = ((elemHTML.value.length > 0)
                    ? ((patt.test(elemHTML.value))
                        ? aproveField(elemHTML)
                        : generateError(elemHTML, INVALID_MAIL))
                    : generateError(elemHTML, MAIL_FIELD_EMPTY));
                break;
            case PASSWORD:
                isValid = ((elemHTML.value.length > 0)
                    ? ((elemHTML.value.length >= 8)
                        ? ((elemHTML.value.length < 50)
                            ? aproveField(elemHTML)
                            : generateError(elemHTML, PASS_FIELD_TOO_LONG))
                        : generateError(elemHTML, SHORT_PASSWORD))
                    : generateError(elemHTML, PASS_FIELD_EMPTY));
                break;
            case PASSWORD_CONFIRM:
                isValid = ((elemHTML.value === document.querySelector('form').password.value)
                    ? ((elemHTML.value.length > 0)
                        ? ((elemHTML.value.length >= 8)
                            ? ((elemHTML.value.length < 50)
                                ? isValid = aproveField(elemHTML)
                                : isValid = generateError(elemHTML, PASS_FIELD_TOO_LONG))
                            : isValid = generateError(elemHTML, SHORT_PASSWORD))
                        : isValid = (generateError(elemHTML, PASS_FIELD_EMPTY)))
                    : isValid = generateError(elemHTML, UNEQUAL_PASSWORD));
                break;
            case MAIN_FORM:
                isValid = (function() {
                    var errorFlag;
                    for (var j = 0; j < elemHTML.length; j++) {
                        if (validate(elemHTML[j]) === ERROR)
                            errorFlag = ERROR;
                        if (elemHTML[j].className === 'submit-button')
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

    // ESTO SOLO SE ACTIVA CUANDO SE HACE EL SUBMIT
    if (document.querySelector('form'))
        document.querySelector('form').onsubmit = function(evt) {
            if (validate(this)) {
                ajaxCall('GET', 'https://sprint.digitalhouse.com/nuevoUsuario', function(response) {
                    ajaxCall('GET', 'https://sprint.digitalhouse.com/getUsuarios', function(response) {
                        window.alert('Te has registrado! La cantidad de usuarios es: ' + response.cantidad);
                    });
                });
            }
            evt.preventDefault();
        };

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
    }

    // LAS SIGUIENTES LINEAS VALIDAN TODOS LOS ELEMENTOS DEL AREA DE REGISTRO
    elementsValidate('#name');
    elementsValidate('#password');
    elementsValidate('#passwordConfirm');
    elementsValidate('#email');
};
