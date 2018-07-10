$(document).ready(function() {

    // Event click submit button
    $(".submitBtn").on('click', function() {

        $("#successMsg").children('p').remove();
        $("#errorsMsg").children('p').remove();

        formId = $(this).parent().parent('form').attr('id');
        $('input[name="formId"]').val(formId);

        if(formId != "updateAvatarForm") {
            ajaxUpdate(formId);
        }

        // Reset input after submit
        if(formId == "updatePasswordForm") {
            $('#old_password, #password, #password_confirmation').val('');
        }
    });

    // Update user information using Ajax
    function ajaxUpdate(formId) {
        $.ajax({
            method: "POST",
            url: "/admin/user/update",
            data: $("#" + formId).serialize(),
            success: function(data) {
                executeMessage(data);
            }
        });
    }

    // Update user avatar using Ajax
    $("form#updateAvatarForm").submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: formData,
            success: function (data) {
                executeMessage(data);

                data = JSON.parse(data);

                if(data.avatar) {
                    $('#userAvatar').attr('src', "/images/users/" + data.avatar);
                    $('#userThumbnailAvatar').attr('src', "/images/users/" + data.avatar);
                }

            },
            cache: false,
            contentType: false,
            processData: false
        });
    });

    // Function execute messages
    function executeMessage(data) {
        data = JSON.parse(data);

        $('html, body').animate({
            scrollTop: $('h1.page-title').offset().top
        }, 50);

        if(data.message != null) {
            $(".reportMsg").hide();
            $("#successMsg").show();
            $("#successMsg").append(`<p><strong>Success! </strong> `+ data.message +`</p>`);
        }
        else {
            $(".reportMsg").hide();
            $("#errorsMsg").show();

            for(i = 0; i < data.errors.length; i++) {
                $("#errorsMsg").append(`<p>`+ data.errors[i] +`</p>`);
            }
        }
    }

    // Change active status of user
    $(".btn-status").not(".disabled").on('click', function() {
        //alert($(this).text());

        $("#basic").modal("show");
        text = $("#modal_status").text();
        text = text.replace('_message', $(this).text().toLowerCase());
        $("#modal_status").text(text);

        $("#btnYes").on("click", function() {
            $('#basic').modal('hide');
            userId = $('#btnYes').attr('data-id');
            //alert(userId);

            $.get("/admin/user/change-status", { id: userId })
                .done(function( data ) {
                    window.location.reload();
                });
        });
    });

});