/* global jQuery, catchMagazineCustomizerReset, ajaxurl, wp */

jQuery(function ($) {
    var $container = $('#customize-save-button-wrapper');


    var $button = $('<input type="submit" name="ct-reset" id="ct-reset" class="ct-reset button-secondary button">')
        .attr('value', catchMagazineCustomizerReset.reset)
        .css({
            'float': 'right',
            'margin-right': '10px',
            'margin-top': '9px'
        });

    $button.on('click', function (event) {
        event.preventDefault();

        var data = {
            wp_customize: 'on',
            action: 'customizer_reset',
            nonce: catchMagazineCustomizerReset.nonce.reset
        };

        var r = confirm(catchMagazineCustomizerReset.confirm);

        if (!r) return;

        $(".spinner").css('visibility', 'visible');

        $button.attr('disabled', 'disabled');

        $.post(ajaxurl, data, function () {
            wp.customize.state('saved').set(true);
            location.reload();
        });
    });

    $container.after($button);
});
