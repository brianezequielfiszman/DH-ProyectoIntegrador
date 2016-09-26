window.onload = function() {

  var preguntas = document.querySelectorAll(".faq");

    preguntas.forEach(function(pregunta) {
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
