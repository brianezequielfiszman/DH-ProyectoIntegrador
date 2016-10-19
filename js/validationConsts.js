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
const SUBMIT = 'submit-button';
