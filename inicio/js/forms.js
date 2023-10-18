document.addEventListener("DOMContentLoaded", function () {
    function toggleFormulario(formulario, boton) {
        if (formulario.style.left === "500%") {
            formulario.style.left = "60%";
        } else {
            formulario.style.left = "500%";
        }
    }

    const formularios = [
        {
            botonId: "verformulario",
            formularioId: "form-alumno",
        },
        {
            botonId: "verformulario2",
            formularioId: "form-docente",
        },
        {
            botonId: "verformulario3",
            formularioId: "form-materias",
        },
        {
            botonId: "verformulario4",
            formularioId: "form-curso",
        },
    ];

    formularios.forEach((element) => {
        const formulario = document.getElementById(element.formularioId);
        const boton = document.getElementById(element.botonId);

        formulario.style.left = "500%";
        boton.addEventListener("click", () => toggleFormulario(formulario, boton));
    });
});
