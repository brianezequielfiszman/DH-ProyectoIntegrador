// Traigo la informacion segun la URL usando AJAX
function ajaxCall(url, callBack, method, params) {
    var ajaxCall = new XMLHttpRequest();

    ajaxCall.onreadystatechange = function() {
        if (ajaxCall.readyState == 4 && ajaxCall.status == 200) {
            try {
                var respuesta = JSON.parse(ajaxCall.responseText);
                callBack(respuesta);
            } catch (e) {
                callBack(ajaxCall.responseText);
            }
        }
    };

    if (method.toUpperCase() === 'GET' || method.toUpperCase() === 'POST')
        ajaxCall.open(method, url, true);

    if (method.toUpperCase() === 'POST')
        ajaxCall.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    if (method === 'GET')
        ajaxCall.send();
    else if (method.toUpperCase() === 'POST' && (typeof params === 'object' || typeof params === 'undefined'))
        ajaxCall.send(serialize(params));
}

serialize = function(obj) {
    var str = [];
    for (var p in obj)
        if (obj.hasOwnProperty(p)) {
            str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
        }
    return str.join("&");
};
