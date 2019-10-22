$(document).ready(function() {
    console.log('HELPER - READY');
});

var HELPER = (function() {
    var this_helper = {};

    this_helper.file_preview = function(input, src_id, path) {
        if (input != undefined && (input.files && input.files[0])) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $(`#${src_id}`).attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        } else {
            $(`#${src_id}`).attr('src', path);
        }
    };

    return this_helper;
})();
