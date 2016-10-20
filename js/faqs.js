window.onload = function() {

    var preguntas = document.querySelectorAll(".faq");
    var forEach = function(array, callback, scope) {
        for (var i = 0; i < array.length; i++) {
            callback.call(scope, i, array[i]); 
        }
    };

    forEach(preguntas, function(index, pregunta) {
        pregunta.onclick = function() {
            var respuesta = pregunta.childNodes[3];
            if (respuesta.style.display === '' || respuesta.style.display === 'block') {
                respuesta.style.display = 'none';
            } else {
                respuesta.style.display = 'block';
            }
        };
    });
};
