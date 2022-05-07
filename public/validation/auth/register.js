$('#register').validate({
    rules: {
        name: {
            required: true,
        },
        email: {
            required: true,
            email: true,
        },
        password: {
            required: true,
            minlength: 5
        },
        password_confirmation: {
            required: true,
            minlength: 5
        },
        terms: {
            required: true,
        }
    },
    messages: {
        name: {
            required: "Please enter a full name",
        },
        email: {
            required: "Please enter a email address",
            email: "Please enter a vaild email address"
        },
        password: {
            required: "Please provide a password",
            minlength: "Your password must be at least 5 characters long"
        },

        password_confirmation: {
            required: "Please provide a password confirmation",
            minlength: "Your password must be at least 5 characters long"
        },
        terms: "Please accept our terms"
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.input-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
    }
});