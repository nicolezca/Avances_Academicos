document.addEventListener("DOMContentLoaded", function () {
    //Filtrado por nombre
    const filterNombreSelect = document.querySelector("input[name='filter']");
    const aplicarFiltroButton = document.getElementById("aplicarFiltro");
    const tablaResultado = document.querySelector(".tabla tbody");

    aplicarFiltroButton.addEventListener("click", function () {
        const nombre = filterNombreSelect.value.toLowerCase();
        filtrarTabla(nombre);
    });
    function filtrarTabla(nombre) {
        const filas = tablaResultado.getElementsByTagName("tr");

        for (let i = 0; i < filas.length; i++) {
            const fila = filas[i];
            const columnas = fila.getElementsByTagName("td");
            const nombreColumna = columnas[1].textContent.toLowerCase(); // Columna de nombre
            if (nombreColumna.includes(nombre) || nombre === "") {
                fila.style.display = "table-row";
            } else {
                fila.style.display = "none";
            }
        }
    }
});