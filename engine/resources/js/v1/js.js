window._ = require('lodash');

try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
    require('owl.carousel');
} catch (e) {}

$(document).ready(function(){
    var owl = $('.owl-carousel');
    owl.owlCarousel({
        margin:30,
        dots: false,
        nav:false,
        responsive:{
            0:{
                margin:15,
                items:2,
                stagePadding: 30,
            },
            768:{
                items:4,
                nav:true,
            },
            992:{
                items:6,
                nav:true,
            }
        }
    });

    $(".down-list>li>span").click(function() {
        $('#modal-watch').modal({
            show: true,
            keyboard: false,
            backdrop: 'static'
        });
    })

    var signButtonNavbar = $(".sign-in"),
        signInContainer = $(".signin"),
        resetPassForm = $("#resetpassform"),
        signInOverlay = $(".sign-in-overlay"),
        signInForm = $("#signinfrom"),
        forgotPass = $('#forgotpass'),
        backToSignIn = $("#backToSignIn"),
        signInFormAlert = $(".sign-in-form-alert"),
        signInEmail = $("#signInEmail"),
        signPassword = $("#signPassword"),
        createAccountUrl = signInForm.find('a').attr("href"),
        signInSubmit = $('.sign-in-submit'),
        defaultMessage = 'Oops! No account was found with that email, please try again or <a href="' + createAccountUrl + '">Create an account</a>';

    signButtonNavbar.click(function() {
        signInOverlay.addClass('open').css('display', 'block');
        signInContainer.addClass('open');
        signInForm.css('display', 'block');
        resetPassForm.css('display', 'none');

        forgotPass.click(function(){
            resetPassForm.fadeIn('slow').css('display', 'block');
            signInForm.css('display', 'none');

            signInEmail.val('');
            signPassword.val('');
            $("#resetEmail").val('');
            showError(signInEmail, '');
        });

        backToSignIn.click(function() {
            resetPassForm.css('display', 'none');
            signInForm.fadeIn('slow').css('display', 'block');

            signInEmail.val('');
            signPassword.val('');
            $("#resetEmail").val('');
            showError(signInEmail, '');
        })

        $(".signin_close, .sign-in-overlay.open").click(function(){
            signInOverlay.removeClass('open').css('display', 'none');
            signInContainer.removeClass('open');
            resetPassForm.css('display', 'none');

            signInEmail.val('');
            signPassword.val('');
            $("#resetEmail").val('');
            showError(signInEmail, '');
        });

    });

    function showError($field, message) {
        signInFormAlert.html(message);
        $field.fadeIn('fast').css('display', 'block');
    }

    signInForm.submit(function(){
        var emailVal = signInEmail.val(),
            signPasswordVal = signPassword.val();

        if (!emailVal.trim()) {
            showError(signInEmail, 'Oops! You forgot to enter an email address');
            return false;
        } else if ( !(/^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i.test(emailVal)) ) {
            showError(signInEmail, 'Uh oh! The email address is invalid');
            return false;
        } else if (!signPasswordVal.trim()) {
            signInEmail.removeClass('invalid');
            showError(signPassword, 'Oops! You forgot to enter a password');
            return false;
        } else {
            signInFormAlert.addClass("d-none");
            $(".loading_signIn").removeClass("d-none");
            setTimeout( function() {
                $(".loading_signIn").addClass("d-none");
                signInFormAlert.removeClass("d-none");
                signInEmail.removeClass('invalid');
                signInFormAlert.html(defaultMessage).fadeIn('fast');
            }, 2000);
            return false;
        }
    })

    resetPassForm.submit(function() {
        var resetEmail = $("#resetEmail"),
            resetEmailVal = $("#resetEmail").val();

        if (!resetEmailVal.trim()) {
            showError(resetEmail, 'Oops! You forgot to enter an email address');
            return false;
        } else if ( !(/^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i.test(resetEmailVal)) ) {
            showError(resetEmail, 'Uh oh! The email address is invalid');
            return false;
        } else {
            signInFormAlert.addClass("d-none");
            $(".loading_signIn").removeClass("d-none");
            setTimeout( function() {
                $(".loading_signIn").addClass("d-none");
                signInFormAlert.removeClass("d-none");
                resetEmail.removeClass('invalid');
                signInFormAlert.html(defaultMessage).fadeIn('fast');
            }, 2000);
            return false;
        }
    })
});

