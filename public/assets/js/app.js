$(document).ready(function () {
    $(".customer-type").on("click", function () {
        var id = $(this).attr('id');

        // Hide all forms before loading selected form.
        $(".customer-form").each(function () {
            $(this).hide();
        });

        // Remove active from all customer type buttons
        $(".customer-type").each(function () {
            $(this).removeClass('active');
        });

        // Set active on the current selection
        $(this).addClass('active');

        // Decide what form to display (if any) and set the customer type hidden input
        if (id == 'btn_citizen') {
            $('#customer-type-store').val('citizen');
            $('#citizen-form').show();
        }
        else if (id == 'btn_organisation') {
            $('#customer-type-store').val('organisation');
            $('#organisation-form').show();
        }
        else {
            $('#customer-type-store').val('anonymous');
        }

    });
})