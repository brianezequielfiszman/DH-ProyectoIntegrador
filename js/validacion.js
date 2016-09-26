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
     * @param  {[string]}   nombre          [description]
     * @param  {[string]}   apellido        [description]
     * @param  {[string]}   email           [description]
     * @param  {[string]}   password        [description]
     * @param  {[string]}   passwordConfirm [description]
     * @return {[Object]}                   [description]
     */
    function validate(nombre, apellido, email, password, passwordConfirm) {
        var persona = {
            nombre: null,
            apellido: null,
            email: null,
            password: null,
            error: false,
        };

        if (nombre) {
            if (nombre.value.length > 0 && nombre.value.length < 50) {
                persona.nombre = nombre.value;
                nombre.style.borderColor = 'green';
                nombre.style.borderStyle = 'solid';
            } else {
                persona.error = true;
                // persona.nombre = null;
                nombre.style.borderColor = 'red';
                nombre.style.borderStyle = 'solid';
            }
        }

        if (apellido) {
            if (apellido.value.length > 0 && apellido.value.length < 50) {
                persona.apellido = apellido.value;
                apellido.style.borderColor = 'green';
                apellido.style.borderStyle = 'solid';
            } else {
                persona.error = true;
                // persona.apellido = null;
                apellido.style.borderColor = 'red';
                apellido.style.borderStyle = 'solid';
            }
        }

        if (email) {
            if (email.value.length > 0 && patt.test(email.value)) {
                persona.email = email.value;
                email.style.borderColor = 'green';
                email.style.borderStyle = 'solid';
            } else {
                persona.error = true;
                // persona.email = null;
                email.style.borderColor = 'red';
                email.style.borderStyle = 'solid';
            }
        }

        if (password) {
            if (password.value.length > 8 && password.value.length < 50) {
                persona.password = password.value;
                password.style.borderColor = 'green';
                password.style.borderStyle = 'solid';
            } else {
                persona.error = true;
                password.style.borderColor = 'red';
                password.style.borderStyle = 'solid';
            }
        }

        if (passwordConfirm) {
            if (passwordConfirm.value.length > 8 && passwordConfirm.value === document.querySelector('form').password.value) {
                passwordConfirm.style.borderColor = 'green';
                passwordConfirm.style.borderStyle = 'solid';
            } else {
                persona.error = true;
                passwordConfirm.style.borderColor = 'red';
                passwordConfirm.style.borderStyle = 'solid';
            }
        }
        return persona;
    }

    if(document.querySelector('form'))
    document.querySelector('form').onsubmit = function(evt) {
        var validateForm = validate(this.nombre, null, this.email, this.password, this.passwordConfirm);
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

    if(document.querySelector('#name'))
    document.querySelector('#name').onblur = function() {
        var validateForm = validate(this, null, null, null, null);
        var bodyErrorMsg = document.querySelector('#name-error');
        if (!validateForm.error && bodyErrorMsg.firstChild) {
            bodyErrorMsg.removeChild(bodyErrorMsg.firstChild);
        } else if (validateForm.error && !bodyErrorMsg.firstChild) {
            bodyErrorMsg.appendChild(document.createTextNode("Error"));
        }
    };

    // document.querySelector('#apellido').onblur = function () {
    //   var validateForm = validate(null, this, null, null, null);
    //   var bodyErrorMsg = document.querySelector('#apellido-error');
    //   if (!validateForm.error && bodyErrorMsg.firstChild) {
    //     bodyErrorMsg.removeChild(bodyErrorMsg.firstChild);
    //   } else if (validateForm.error && !bodyErrorMsg.firstChild) {
    //     bodyErrorMsg.appendChild(document.createTextNode("error"));
    //   }
    // };

    if(document.querySelector('#email'))
    document.querySelector('#email').onblur = function() {
        var validateForm = validate(null, null, this, null, null);
        var bodyErrorMsg = document.querySelector('#email-error');
        if (!validateForm.error && bodyErrorMsg.firstChild) {
            bodyErrorMsg.removeChild(bodyErrorMsg.firstChild);
        } else if (validateForm.error && !bodyErrorMsg.firstChild) {
            bodyErrorMsg.appendChild(document.createTextNode("error"));
        }
    };

    if(document.querySelector('#password'))
    document.querySelector('#password').onblur = function() {
        var validateForm = validate(null, null, null, this, null);
        var bodyErrorMsg = document.querySelector('#password-error');
        if (!validateForm.error && bodyErrorMsg.firstChild) {
            bodyErrorMsg.removeChild(bodyErrorMsg.firstChild);
        } else if (validateForm.error && !bodyErrorMsg.firstChild) {
            bodyErrorMsg.appendChild(document.createTextNode("error"));
        }
    };

    if(document.querySelector('#passwordConfirm'))
    document.querySelector('#passwordConfirm').onblur = function() {
        var validateForm = validate(null, null, null, null, this);
        var bodyErrorMsg = document.querySelector('#passwordConfirm-error');
        if (!validateForm.error && bodyErrorMsg.firstChild) {
            bodyErrorMsg.removeChild(bodyErrorMsg.firstChild);
        } else if (validateForm.error && !bodyErrorMsg.firstChild) {
            bodyErrorMsg.appendChild(document.createTextNode("error"));
        }
    };
};
