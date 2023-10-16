document.addEventListener("DOMContentLoaded", function () {

    //Filtrado por nombre
    const filterNombreSelect = document.getElementById("filter");
    const aplicarFiltroButton = document.getElementById("aplicarFiltro");
    const tablaResultado = document.getElementById("Tabla").getElementsByTagName('tbody')[0];

    //funcion a la hora de hacer click se crea un evento
    aplicarFiltroButton.addEventListener("click", function () {
        const nombre = filterNombreSelect.value.toLowerCase();
        filtrarTabla(nombre);
    });
    //funcion de filtrado mediante una recorrigo por la tabla coincidiendo con la columna propuesta
    function filtrarTabla( nombre) {
        const filas = tablaResultado.getElementsByTagName("tr");

        for (let i = 0; i < filas.length; i++) {
            const fila = filas[i];
            const columnas = fila.getElementsByTagName("td");

            const nombreColumna = columnas[1].textContent.toLowerCase(); // Columna de matricula
            //parametros si se cumple la funcion
            if ((nombreColumna .includes(nombre) || nombre === "")) {
                fila.style.display = "table-row";
            } else {
                fila.style.display = "none";
            }
        }
    }
});