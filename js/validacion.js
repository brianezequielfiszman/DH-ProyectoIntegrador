window.onload = function() {
    var patt = new RegExp(/^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i);

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
        var persona = {
            nombre: null,
            apellido: null,
            email: null,
            password: null,
            error: false,
        };

        var condiciones = [
            (elemHTML.name === 'nombre') ? ((elemHTML.value.length > 0 && elemHTML.value.length < 50) ? persona.nombre = elemHTML.value : (persona.error = true) && false) : false,
            (elemHTML.name === 'apellido') ? ((elemHTML.value.length > 0 && elemHTML.value.length < 50) ? persona.apellido = elemHTML.value : (persona.error = true) && false) : false,
            (elemHTML.name === 'email') ? ((elemHTML.value.length > 0 && patt.test(email.value)) ? persona.email = elemHTML.value : (persona.error = true) && false) : false,
            (elemHTML.name === 'password') ? ((password.value.length >= 8 && password.value.length < 50) ? persona.password = elemHTML.value : (persona.error = true) && false) : false,
            (elemHTML.name === 'passwordConfirm') ? (((passwordConfirm.value.length >= 8 && passwordConfirm.value.length < 50) && passwordConfirm.value === document.querySelector('form').password.value) ? true : (persona.error = true) && false) : false,
            (elemHTML.className === 'main-form') ? (function() {
                var errorFlag;
                for (var j = 0; j < elemHTML.length; j++)
                    if (validate(elemHTML[j]).error)
                        errorFlag = true;
                return errorFlag;
            })() : false
        ];

        for (var i = 0; i <= condiciones.length; i++) {
            if (condiciones[i]) {
                elemHTML.style.borderColor = 'green';
                break;
            }
        }

        if (persona.error)
            elemHTML.style.borderColor = 'red';
        elemHTML.style.borderStyle = 'solid';
        return persona;
    }

    if (document.querySelector('form'))
        document.querySelector('form').onsubmit = function(evt) {
            var validateForm = validate(this);

            var bodyRegisteredUsers = document.querySelector('#registered-users');
            if (!validateForm.error) {
                ajaxCall('GET', 'https://sprint.digitalhouse.com/nuevoUsuario', function(response) {
                    ajaxCall('GET', 'https://sprint.digitalhouse.com/getUsuarios', function(response) {
                        bodyRegisteredUsers.appendChild(document.createTextNode(response.cantidad));
                    });
                });
            }
            evt.preventDefault();
        };

    function generateError(elementId, elementValue) {
        var error;
        if (elementId === 'name') {
            if (elementValue.length === 0 || elementValue.value === undefined) {
                error = 'El campo de usuario esta vacio.';
            }
        } else if (elementId === 'email') {
            if (elementValue.length === 0) {
                error = 'El campo de correo esta vacio';
            } else {
                error = 'El formato de correo ingresado no es valido';
            }
        } else if (elementId === 'password') {
            if (elementValue.length === 0) {
                error = 'El campo de clave esta vacio';
            }
            if (elementValue.length < 8 && elementValue.length > 0) {
                error = 'El password debe ser de minimo 8 caracteres';
            }
            if (document.querySelector('#passwordConfirm')) {
                if (document.querySelector('#passwordConfirm').value !== document.querySelector('#password').value) {
                    error = 'Los campos de password no coinciden.';
                }
            }
        } else if (elementId === 'passwordConfirm') {
            if (elementValue.length === 0) {
                error = 'El campo de clave esta vacio';
            }
            if (elementValue.length < 8 && elementValue.length > 0) {
                error = 'El password debe ser de minimo 8 caracteres';
            }
            if (document.querySelector('#passwordConfirm')) {
                if (document.querySelector('#passwordConfirm').value !== document.querySelector('#password').value) {
                    error = 'Los campos de password no coinciden.';
                }
            }
        }
        return error;
    }

    function elementsValidate(elementId) {
        if (document.querySelector(elementId))
            document.querySelector(elementId).onblur = function() {
                var validateForm = validate(this);
                var bodyErrorMsg = document.querySelector(elementId + '-error');
                if (!validateForm.error && bodyErrorMsg.firstChild) {
                    bodyErrorMsg.removeChild(bodyErrorMsg.firstChild);
                } else if (validateForm.error && !bodyErrorMsg.firstChild) {
                    bodyErrorMsg.appendChild(document.createTextNode(generateError(this.id, this.value)));
                }
            };
    }

    elementsValidate('#name');
    elementsValidate('#password');
    elementsValidate('#passwordConfirm');
    elementsValidate('#email');
};