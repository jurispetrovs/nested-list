$(function () {
    $("form[name='register']").validate({
        // Specify validation rules
        highlight: function (element) {
            $(element)
                .addClass('border border-red-500');
        },
        unhighlight: function (element) {
            $(element)
                .removeClass('border border-red-500');
        },
        rules: {
            // The key name on the left side is the name attribute
            // of an input field. Validation rules are defined
            // on the right side
            firstname: "required",
            email: {
                required: true,
                email: true,
                remote: {
                  url: "/register/email",
                  type: "post"
                },
            },
            password: {
                required: true,
                minlength: 5
            },
            "password-confirm": {
                required: true,
                equalTo : "#password"
            },
        },
        // Specify validation error messages
        messages: {
            firstname: "Please fill in your name",
            email: {
                required: "Please fill in your email",
                email: "Please enter a valid email address",
                remote: $.validator.format("{0} already exists. " +
                    "<p style='display: inline; color: black'>Would you like to <a href='/login'>Login</a> ?</p>"),
            },
            password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long",
            },
            "password-confirm": {
                required: "Please provide a password",
                equalTo: "Passwords do not match",
            },
        },
        // Make sure the form is submitted to the destination defined
        // in the "action" attribute of the form when valid
        submitHandler: function (form) {
            form.submit();
        }
    });
});

$(function () {
    $("form[name='login']").validate({
        // Specify validation rules
        highlight: function (element) {
            $(element)
                .addClass('border border-red-500');
        },
        unhighlight: function (element) {
            $(element)
                .removeClass('border border-red-500');
        },
        rules: {
            // The key name on the left side is the name attribute
            // of an input field. Validation rules are defined
            // on the right side
            email: {
                required: true,
                email: true,
                remote: {
                    url: "/login/email",
                    type: "post"
                },
            },
            password: {
                required: true,
                remote: {
                    url: "/login/password",
                    type: "post",
                    data: {
                        email: function () {
                            return $( "#email" ).val();
                        }
                    }
                },
            },
        },
        // Specify validation error messages
        messages: {
            email: {
                required: "Please fill in your email",
                email: "Please enter a valid email address",
                remote: "Account with such email does not exist. " +
                    "<p style='display: inline; color: black'>Would you like to <a href='/register'>Sign Up</a> ?</p>",
            },
            password: {
                required: "Please provide a password",
                remote: "Invalid password",
            },
        },
        // Make sure the form is submitted to the destination defined
        // in the "action" attribute of the form when valid
        submitHandler: function (form) {
            form.submit();
        }
    });
});

$(function () {
    $("form[name='section-create']").validate({
        // Specify validation rules
        highlight: function (element) {
            $(element)
                .addClass('border border-red-500');
        },
        unhighlight: function (element) {
            $(element)
                .removeClass('border border-red-500');
        },
        rules: {
            // The key name on the left side is the name attribute
            // of an input field. Validation rules are defined
            // on the right side
            name: "required",
            description: "required",
        },
        // Specify validation error messages
        messages: {
            name: "Please fill in section name",
            description: "Please fill in section description",
        },
        // Make sure the form is submitted to the destination defined
        // in the "action" attribute of the form when valid
        submitHandler: function (form) {
            form.submit();
        }
    });
});
