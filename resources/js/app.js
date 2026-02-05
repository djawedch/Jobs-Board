import './bootstrap';

import.meta.glob([
    '../images/**'
]);

document.addEventListener("DOMContentLoaded", function () {
    const candidateRadio = document.getElementById("candidate");
    const employerRadio = document.getElementById("employer");
    const employerFields = document.getElementById("employerFields");

    function toggleEmployerFields() {
        if (employerRadio.checked) {
            employerFields.style.display = "block";
        } else {
            employerFields.style.display = "none";
        }
    }

    toggleEmployerFields();

    candidateRadio.addEventListener("change", toggleEmployerFields);
    employerRadio.addEventListener("change", toggleEmployerFields);
});