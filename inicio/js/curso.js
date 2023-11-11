document.addEventListener("DOMContentLoaded", function () {

    function toggleFormVisibility(form, button) {
        form.style.right = form.style.right === '-50%' ? '0' : '-50%';
    }

    function hideOtherForms(currentFormId) {
        const formIds = ['SubirPersonal', 'SubirAlumnos'];
        formIds.forEach(formId => {
            if (formId !== currentFormId) {
                const form = document.getElementById(formId);
                form.style.right = '-50%';
            }
        });
    }

    function setupFormToggle(formId, buttonId) {
        const form = document.getElementById(formId);
        const button = document.getElementById(buttonId);

        form.style.right = '-50%';

        button.addEventListener('click', () => {
            hideOtherForms(formId);
            toggleFormVisibility(form, button);
        });
    }

    // Setup for Personal form
    setupFormToggle('SubirPersonal', 'VerFormPersonal');

    // Setup for Alumnos form
    setupFormToggle('SubirAlumnos', 'VerFormAlumno');

});
