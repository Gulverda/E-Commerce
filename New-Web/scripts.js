document.addEventListener('DOMContentLoaded', function () {
    const registrationModal = document.getElementById('registrationModal');
    const loginModal = document.getElementById('loginModal');
    const signupModal = document.getElementById('signupModal');

    const showRegistrationBtn = document.getElementById('showRegistration');
    const showLoginInsideBtn = document.getElementById('showLoginInside');
    const showSignupInsideBtn = document.getElementById('showSignupInside');
    const createAccountBtnLogin = document.getElementById('createAccountBtnLogin');
    const iGotAccountBtn = document.getElementById('iGotAccountBtn');

    // Function to show modal
    function showModal(modal) {
        modal.style.display = 'flex';
    }

    // Function to hide modal
    function hideModal(modal) {
        modal.style.display = 'none';
    }

    // Event listener for showing registration modal
    showRegistrationBtn.addEventListener('click', function () {
        hideModal(registrationModal);
        showModal(loginModal); // Show sign-in modal by default when registration button is clicked
    });

    // Event listener for closing registration modal
    document.getElementById('closeRegistration').addEventListener('click', function () {
        hideModal(registrationModal);
    });

    // Event listener for closing login modal
    document.getElementById('closeLogin').addEventListener('click', function() {
        hideModal(loginModal);
    });

    // Event listener for closing signup modal
    document.getElementById('closeSignup').addEventListener('click', function() {
        hideModal(signupModal);
    });

    // Event listener for showing login modal inside registration modal
    showLoginInsideBtn.addEventListener('click', function () {
        hideModal(registrationModal);
        showModal(loginModal);
    });

    // Event listener for showing signup modal inside registration modal
    showSignupInsideBtn.addEventListener('click', function () {
        hideModal(registrationModal);
        showModal(signupModal);
    });

    // Event listener for "Create Account" button inside login modal
    createAccountBtnLogin.addEventListener('click', function () {
        hideModal(loginModal);
        showModal(signupModal);
    });

    // Event listener for "I got Account" button inside signup modal
    iGotAccountBtn.addEventListener('click', function () {
        hideModal(signupModal);
        showModal(loginModal);
    });

    // Close modal when clicking outside of it
    window.addEventListener('click', function(event) {
        if (event.target === loginModal) {
            hideModal(loginModal);
        }
        if (event.target === signupModal) {
            hideModal(signupModal);
        }
    });

    // Validation for signup form
    document.getElementById('signupForm').addEventListener('submit', function(event) {
        const password = event.target.password.value;
        if (password.length < 6) {
            alert('Password must be at least 6 characters long');
            event.preventDefault();
        }
    });

    // Validation for login form
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