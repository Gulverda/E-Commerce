document.addEventListener('DOMContentLoaded', function () {
    const registrationModal = document.getElementById('registrationModal');
    const loginModal = document.getElementById('loginModal');
    const signupModal = document.getElementById('signupModal');

    const showRegistrationBtn = document.getElementById('showRegistration');
    const showLoginInsideBtn = document.getElementById('showLoginInside');
    const showSignupInsideBtn = document.getElementById('showSignupInside');
    const createAccountBtnLogin = document.getElementById('createAccountBtnLogin');
    const iGotAccountBtn = document.getElementById('iGotAccountBtn');

    function showModal(modal) {
        modal.style.display = 'flex';
    }

    function hideModal(modal) {
        modal.style.display = 'none';
    }

    showRegistrationBtn.addEventListener('click', function () {
        hideModal(registrationModal);
        showModal(loginModal); 
    });

    document.getElementById('closeRegistration').addEventListener('click', function () {
        hideModal(registrationModal);
    });

    document.getElementById('closeLogin').addEventListener('click', function() {
        hideModal(loginModal);
    });

    document.getElementById('closeSignup').addEventListener('click', function() {
        hideModal(signupModal);
    });

    showLoginInsideBtn.addEventListener('click', function () {
        hideModal(registrationModal);
        showModal(loginModal);
    });

    showSignupInsideBtn.addEventListener('click', function () {
        hideModal(registrationModal);
        showModal(signupModal);
    });

    createAccountBtnLogin.addEventListener('click', function () {
        hideModal(loginModal);
        showModal(signupModal);
    });

    iGotAccountBtn.addEventListener('click', function () {
        hideModal(signupModal);
        showModal(loginModal);
    });

    window.addEventListener('click', function(event) {
        if (event.target === loginModal) {
            hideModal(loginModal);
        }
        if (event.target === signupModal) {
            hideModal(signupModal);
        }
    });

    document.getElementById('signupForm').addEventListener('submit', function(event) {
        const password = event.target.password.value;
        if (password.length < 6) {
            alert('Password must be at least 6 characters long');
            event.preventDefault();
        }
    });

    document.getElementById('loginForm').addEventListener('submit', function(event) {
        const username = event.target.username.value;
        const password = event.target.password.value;
        if (username === '' || password === '') {
            alert('Both fields are required');
            event.preventDefault();
        }
    });
});


var closeButtons = document.querySelectorAll('.close');
closeButtons.forEach(function(button) {
    button.addEventListener('click', function() {
        var modal = button.parentElement.parentElement;
        modal.style.display = 'none';
    });
});


document.getElementById('profileInfo').onclick = function() {
    var dropdown = document.getElementById('dropdownContent');
    if (dropdown.style.display === 'block') {
        dropdown.style.display = 'none';
    } else {
        dropdown.style.display = 'block';
    }
};
document.getElementById('showRegistration').onclick = function() {
    document.getElementById('registrationModal').style.display = 'block';
};
document.getElementById('closeRegistration').onclick = function() {
    document.getElementById('registrationModal').style.display = 'none';
};
// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
    if (!event.target.matches('.profile-info')) {
        var dropdown = document.getElementById('dropdownContent');
        if (dropdown.style.display === 'block') {
            dropdown.style.display = 'none';
        }
    }
};


document.getElementById('profileInfo').onclick = function() {
    var dropdown = document.getElementById('dropdownContent');
    if (dropdown.style.display === 'block') {
        dropdown.style.display = 'none';
    } else {
        dropdown.style.display = 'block';
    }
};
document.getElementById('showRegistration').onclick = function() {
    document.getElementById('registrationModal').style.display = 'block';
};
document.getElementById('closeRegistration').onclick = function() {
    document.getElementById('registrationModal').style.display = 'none';
};
window.onclick = function(event) {
    if (!event.target.closest('.profile-info')) {
        var dropdown = document.getElementById('dropdownContent');
        if (dropdown.style.display === 'block') {
            dropdown.style.display = 'none';
        }
    }
};


window.onload = function() {
    // Hide the loading screen
    document.getElementById("loading-screen").style.display = "none";
};