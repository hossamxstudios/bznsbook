/* Select2 Init*/
"use strict";
$(document).ready(function() {
    // $(".select2").select2();
    $(".select2").select2({
        theme: 'classic',
    });
    $(".select2.taging").select2({
        tags: true,
        tokenSeparators: [',', ' '],
        allowClear: true,
        theme: 'classic',

    });
    $("#input_tags").select2({
        theme: 'classic',
        tags: true,
        tokenSeparators: [',', ' ']
    });
});
