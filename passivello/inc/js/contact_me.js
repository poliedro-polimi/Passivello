// Contact Form Scripts

jQuery(function() {

    jQuery("#contactForm input,#contactForm textarea").jqBootstrapValidation({
        preventSubmit: true,
        submitError: function($form, event, errors) {
            // additional error messages or events
        },
        submitSuccess: function($form, event) {
            event.preventDefault(); // prevent default submit behaviour
            grecaptcha.execute();
        },
        filter: function() {
            return jQuery(this).is(":visible");
        },
    });

    jQuery("a[data-toggle=\"tab\"]").click(function(e) {
        e.preventDefault();
        jQuery(this).tab("show");
    });
});

window.sendMail = function(token) {
    // get values from FORM
    var name = jQuery("input#name").val();
    var email = jQuery("input#email").val();
    var phone = jQuery("input#phone").val();
    var message = jQuery("textarea#message").val();
    var accoglienza = document.getElementById('accoglienza').checked;
    var firstName = name; // For Success/Failure Message
    // Check for white space in name for Success/Fail message
    if (firstName.indexOf(' ') >= 0) {
        firstName = name.split(' ').slice(0, -1).join(' ');
    }
    jQuery.ajax({
        url: "/sendmail.php",
        type: "POST",
        data: {
            name: name,
            phone: phone,
            email: email,
            message: message,
            token: token,
            accoglienza: accoglienza ? 1 : 0
        },
        cache: false,
        success: function() {
            // Success message
            jQuery('#success').html("<br><div class='alert alert-success'>");
            jQuery('#success > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                .append("</button>");
            jQuery('#success > .alert-success')
                .append("<strong>Messaggio inviato.</strong>");
            jQuery('#success > .alert-success')
                .append('</div>');

            //clear all fields
            jQuery('#contactForm').trigger("reset");
        },
        error: function(xhr, status, error) {
            // Fail message
            if (xhr.responseText == "invalid captcha") {
                jQuery('#success').html("<br><div class='alert alert-warning'>");
                jQuery('#success > .alert-warning').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                    .append("</button>");
                jQuery('#success > .alert-warning').append("<strong>I nostri controlli indicano che tu sei un robot.</strong> Se sei sicuro di essere un umano, prova a ricaricare la pagina e provare di nuovo. Se il problema persiste, scrivici su Facebook.");
                jQuery('#success > .alert-warning').append('</div>');
            } else if (xhr.responseText == "captcha error") {
                jQuery('#success').html("<br><div class='alert alert-danger'>");
                jQuery('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                    .append("</button>");
                jQuery('#success > .alert-danger').append("<strong>Sembra che il server non stia funzionando correttamente.</strong> Prova a ricaricare la pagina e provare di nuovo. Se il problema persiste, contattaci su Facebook. Gi&agrave; che ci sei, segnalaci anche il problema; il messaggio d'errore &egrave; \"invalid captcha\". Grazie.");
                jQuery('#success > .alert-danger').append('</div>');
            } else if (xhr.responseText == "invalid data") {
                jQuery('#success').html("<br><div class='alert alert-danger'>");
                jQuery('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                    .append("</button>");
                jQuery('#success > .alert-danger').append("<strong>I dati forniti non sono validi.</strong> Verifica la correttezza dei dati forniti e prova di nuovo.");
                jQuery('#success > .alert-danger').append('</div>');
            } else {
                jQuery('#success').html("<br><div class='alert alert-danger'>");
                jQuery('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                    .append("</button>");
                jQuery('#success > .alert-danger').append("<strong>Sembra che il server non stia funzionando correttamente.</strong> Puoi inviare una email a <a href=\"mailto:info@poliedro-polimi.it\">info@poliedro-polimi.it</a> oppure ad <a href=\"mailto:accoglienza@poliedro-polimi.it\">accoglienza@poliedro-polimi.it</a> se hai bisogno di parlarci di argomenti sensibili. Gi&agrave; che ci sei, segnala anche il seguente errore: \"" + xhr.responseText + "\". Grazie.");
                jQuery('#success > .alert-danger').append('</div>');
            }
            //clear all fields
            jQuery('#contactForm').trigger("reset");
        },
    });
}

/*When clicking on Full hide fail/success boxes */
jQuery('#name').focus(function() {
    jQuery('#success').html('');
});
