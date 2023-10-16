document.addEventListener("DOMContentLoaded", function () {

    const btnform = document.getElementById("verformulario");
    const formulario = document.querySelector(".formulario");

    formulario.style.left="500%";

    btnform.addEventListener("click", function () {
        if (formulario.style.left === "500%") {
            formulario.style.left = "60%";
        } else {
            formulario.style.left = "500%";
        }
    });

});