document.addEventListener("DOMContentLoaded", function () {

    const btnform = document.getElementById("verformulario");
    const formulario = document.getElementById("form-alumno");
    const btnform2 = document.getElementById("verformulario2");
    const formularioDocente = document.getElementById("form-docente")
    formularioDocente.style.left="500%"    
    formulario.style.left="500%";
    
    btnform.addEventListener("click", function () {
        if (formulario.style.left === "500%") {
            formulario.style.left = "60%";
        } else {
            formulario.style.left = "500%";
        }
    });
    


    btnform2.addEventListener("click", function () {
        if (formularioDocente.style.left === "500%") {
            formularioDocente.style.left = "60%";
        } else {
            formularioDocente.style.left = "500%";
        }
    });

});