require(['jquery'], function ($) {
    $(document).ready(function () {
        $("a.section__link-ar.js-section__link-ar").on("click", function() {
            $(".popup-overlay, .section__content-hidden.js-section__content-hidden").addClass("is-visible");
        });

        // Removes the "active" class to .popup and .popup-content when the "Close" button is clicked
        $("#modal-close-btn, #mediapopup-viewer-modal").on("click", function() {
            $(".popup-overlay, .section__content-hidden.js-section__content-hidden").removeClass("is-visible");
        });

        // Attach an event listener to color swatches
        $(document).on('click', '.swatch-option.color', function () {
            // Get the selected color
            var selectedColor = $(this).attr('data-option-label').toLowerCase().replace(/\s+/g, '_');
            console.log('Selected Color:', selectedColor);
            
            // Hide all attribute values
            $('[id^="mediapopup_"]').not('#mediapopup-trigger').css("display", "none");

            // Show the attribute value corresponding to the selected color
            if (selectedColor === null) {
                $('#mediapopup_default').css("display", "block");
            } else {
                $('#mediapopup_link_' + selectedColor).css("display", "block");
            }
        });
    });
});