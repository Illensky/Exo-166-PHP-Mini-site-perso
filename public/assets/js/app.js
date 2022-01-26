/*======================================= Animations =====================================================================*/


// Remove the feedback message

const errorMessage = document.querySelector('.feedback-message');
if (errorMessage) {
    setTimeout(() => errorMessage.remove(), 3000);
}

/*===================================== Form Validation ================================================================*/

// usefull fonction for form checking

function isAlphanumeric(str) {
    const decimal = /^[0-9a-zA-Z]+$/;
    if (str.match(decimal)) {
        return true;
    }
    else {
        return false;
    }
}

function stripTag(str) {
    return str.replace(/<[^>]*>?/gm, "");
}


// Check the contact form
const contactForm = document.querySelector('#contact-form');

if (contactForm) {
// get all the usefull HTMLElements

    const contactFormBtn = document.querySelector('#contact-form-submit');
    const usernameInput = document.querySelector('#id-username');
    const messageInput = document.querySelector('#id-username');


    // Check the pseudo validity (should have only alphanumeric char in the limit of 0-20 chars)

    usernameInput.addEventListener("keyup", function (e) {
        if (this.value.length > 0 && this.value.length <= 20 && isAlphanumeric(this.value)) {
            this.setCustomValidity("");
            this.style.outline = "none";
        } else {
            this.setCustomValidity("Erreur: Votre pseudo ne peut contenir que des caractéres alphanumériques ([a-z], [A-Z], [0-9]) dans la limite de 1-20 caractéres.");
            this.style.outline = "2px solid red";
        }
    })

    // Check the message validity (should have only alphanumeric char in the limit of 0-20 chars)

    messageInput.addEventListener("keyup", function (e) {
        if (this.value.length > 0 && this.value.length <= 20 && isAlphanumeric(this.value)) {
            this.setCustomValidity("");
            this.style.outline = "none";
        } else {
            this.setCustomValidity("Erreur: Votre message ne peut contenir que des caractéres alphanumériques ([a-z], [A-Z], [0-9]) dans la limite de 1-255 caractéres.");
            this.style.outline = "2px solid red";
        }
    })

    // striptag all the items before sending to PHP

    contactFormBtn.addEventListener("click", (e) => {
        messageInput.value = stripTag(messageInput.value);
        usernameInput.value = stripTag(usernameInput.value);
    })
}