var path = "/autocomplete";
$('input.typeahead').typeahead({
    minLength: 0,
    source: function(query, process) {
        return $.get(path, {
            query: query
        }, function(data) {
            return process(data);
        });
    }
});
