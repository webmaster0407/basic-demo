$("#changePassword").on("click", function(e) {
    e.preventDefault();
    var oldPwd = $("#oldPwd").val();
    var newPwd = $("#newPwd").val();
    var newPwdConfirm = $("#verifyPwd").val();
    if (oldPwd == "" || newPwd == "" || newPwdConfirm == "") {
        $("#changePasswordError").show();
        $("#changePasswordErrorTxt").text("Your should  must fill all fields. If you do not input all fileds, you cannot change your password.");
        return;
    }
    if (newPwd !== newPwdConfirm) {
        $("#changePasswordError").show();
        $("#changePasswordErrorTxt").text("The value of  Password field and Verify Password filed must be same. Try input again!");
        return;
    }

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
        },
        type: "POST",
        url: 'admin/changepassword',
        data: {
            _token: $('meta[name="csrf_token"]').attr('content'),
            name: $("#s_name").text(),
            password: oldPwd,
            newPassword: newPwd,
        },
        beforeSend: function() {
            KTApp.blockPage({
                overlayColor: '#000000',
                state: 'primary',
                message: 'Processing...'
            });
        },
        success: function(data) {
            data = $.parseJSON(data);
            if (data.status == '1') {
                $("#changePasswordError").removeClass('alert-light-danger').addClass('alert-light-success');
                $("#changePasswordErrorTxt").text(data.message);
                $("#changePasswordError").show();
            } else if (data.status == "0") {
                $("#changePasswordError").removeClass('alert-light-success').addClass('alert-light-danger');
                $("#changePasswordErrorTxt").text(data.message);
                $("#changePasswordError").show();
            }
        },
        error: function(e) {
            console.log(e);
        }
    });
    $("#oldPwd").val("");
    $("#newPwd").val("");
    $("#verifyPwd").val("");
    KTApp.unblockPage();
});

$("#resetBtn").on('click', function() {
    $("#oldPwd").val("");
    $("#newPwd").val("");
    $("#verifyPwd").val("");
});