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
    } else {
        return false;
    }
}

function stripTag(str) {
    return str.replace(/<[^>]*>?/gm, "");
}

function checkPassword(str) {
    const decimal = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;
    if (str.match(decimal)) {
        return true;
    } else {
        return false;
    }
}

function checkPseudoValidity(input) {

    input.addEventListener("keyup", function (e) {
        if (this.value.length > 0 && this.value.length <= 20 && isAlphanumeric(this.value)) {
            this.setCustomValidity("");
            this.style.outline = "none";
        } else {
            this.setCustomValidity("Erreur: Votre pseudo ne peut contenir que des caractéres alphanumériques ([a-z], [A-Z], [0-9]) dans la limite de 1-20 caractéres.");
            this.style.outline = "2px solid red";
        }
    })
}

function setCustomValidityPassword(input) {
    input.addEventListener("keyup", function (e) {
        if (checkPassword(this.value)) {
            this.setCustomValidity("");
            this.style.outline = "none";
        } else {
            this.setCustomValidity("Error: should contain at least 1 lowercase, 1 uppercase, 1 number, 1 special char in the limit of 8-15 chars");
            this.style.outline = "2px solid red";
        }
    })
}


// Check the contact form
const contactForm = document.querySelector('#contact-form');

if (contactForm) {
// get all the usefull HTMLElements

    const contactFormBtn = document.querySelector('#contact-form-submit');
    const contactUsernameInput = document.querySelector('#id-username');
    const contactMessageInput = document.querySelector('#id-username');


    // Check the pseudo validity (should have only alphanumeric char in the limit of 0-20 chars)

    checkPseudoValidity(contactUsernameInput)

    // Check the message validity (should have only alphanumeric char in the limit of 0-20 chars)

    contactMessageInput.addEventListener("keyup", function (e) {
        if (this.value.length > 0 && this.value.length <= 255 && isAlphanumeric(this.value)) {
            this.setCustomValidity("");
            this.style.outline = "none";
        } else {
            this.setCustomValidity("Error : should have only alphanumeric char in the limit of 0-20 chars");
            this.style.outline = "2px solid red";
        }
    })

    // striptag all the items before sending to PHP

    contactFormBtn.addEventListener("click", (e) => {
        contactMessageInput.value = stripTag(contactMessageInput.value);
        contactUsernameInput.value = stripTag(contactUsernameInput.value);
    })
}

// check the login form
const loginForm = document.querySelector("#login");

// get the usefull HTML element
if (loginForm) {
    const loginUsernameInput = document.querySelector("#login-username");
    const loginPasswordInput = document.querySelector("#login-password");
    const loginFormBtn = document.querySelector("#login-submit");

    // Check the pseudo validity (should have only alphanumeric char in the limit of 0-20 chars)

    checkPseudoValidity(loginUsernameInput)

    // check the password validity (should contain at least 1 lowercase, 1 uppercase, 1 number, 1 special char in the limit of 8-15 chars

    setCustomValidityPassword(loginPasswordInput)

    // striptag all the items before sending to PHP

    loginFormBtn.addEventListener("click", (e) => {
        loginUsernameInput.value = stripTag(loginUsernameInput.value);
    })
}


// check the register form
const registerForm = document.querySelector("#register");

if (registerForm) {
    //get all the usefull HTML elements
    const registerUsernameInput = document.querySelector("#register-username");
    const registerPasswordInput = document.querySelector("#register-password");
    const passwordRepeatInput = document.querySelector("#password-repeat");
    const registerFormBtn = document.querySelector("#register-submit");

    // Check the pseudo validity (should have only alphanumeric char in the limit of 0-20 chars)
    checkPseudoValidity(registerUsernameInput);

    // check the password validity (should contain at least 1 lowercase, 1 uppercase, 1 number, 1 special char in the limit of 8-15 chars
    setCustomValidityPassword(registerPasswordInput);

    // check if the password repeat input value match with the password input value
    passwordRepeatInput.addEventListener("keyup", function (e) {
        if (this.value === registerPasswordInput.value) {
            this.setCustomValidity("");
            this.style.outline = "none"
            registerPasswordInput.style.outline = "none"
        } else {
            this.setCustomValidity("Les deux mots de passes ne sont pas identiques");
            this.style.outline = "2px solid red"
            registerPasswordInput.style.outline = "2px solid red"
        }
    })

    // striptag all the items before sending to PHP
    registerFormBtn.addEventListener("click", (e) => {
        registerUsernameInput.value = stripTag(registerUsernameInput.value);
    })
}



// display the register form
const toRegisterBtn = document.querySelector("#to-register");
if (toRegisterBtn) {
    toRegisterBtn.addEventListener("click", function (e) {
        document.querySelector("#register").style.display = "block";
        document.querySelector("#login").style.display = "none";
    })
}
