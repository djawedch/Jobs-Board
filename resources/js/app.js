import './bootstrap';

import.meta.glob([
    '../images/**'
]);

// Handles role selection UI: shows employer-specific input fields only when the "employer" radio button is selected, and keeps the form state correct on page load and when the user switches roles.

document.addEventListener("DOMContentLoaded", function () {
    const candidateRadio = document.getElementById("candidate");
    const employerRadio = document.getElementById("employer");
    const employerFields = document.getElementById("employerFields");

    function toggleEmployerFields() {
        if (employerRadio.checked) {
            employerFields.classList.remove('hidden');
            employerFields.classList.add('block');
        } else {
            employerFields.classList.add('hidden');
            employerFields.classList.remove('block');
        }
    }

    toggleEmployerFields();

    candidateRadio.addEventListener("change", toggleEmployerFields);
    employerRadio.addEventListener("change", toggleEmployerFields);
});

// Controls flash message lifecycle: automatically fades out notification banners after 5 seconds and removes them from the DOM to avoid persistent clutter.

document.addEventListener('DOMContentLoaded', function () {
    const flashMessages = document.querySelectorAll('.fixed.top-4');

    flashMessages.forEach(message => {
        setTimeout(() => {
            message.style.opacity = '0';
            message.style.transition = 'opacity 0.5s ease-out';
            setTimeout(() => message.remove(), 500);
        }, 5000);
    });
});