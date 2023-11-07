document.addEventListener("DOMContentLoaded", function () {

    const VerFormulario = document.getElementById('verformulario');
    const Formulario = document.getElementById('formSubir');

    Formulario.style.left = "500%";
    VerFormulario.addEventListener('click', () => {
        if (Formulario.style.left === "500%") {
            Formulario.style.left = "60%";
        } else {
            Formulario.style.left = "500%";
        }
    }
    )
}
);
