const cards = document.querySelectorAll('.cards');
const contents = document.querySelectorAll('.content');

cards.forEach((card, index) => {
    card.addEventListener('click', () => {
        // Eliminar la clase "active" de todas las cards
        cards.forEach(c => {
            c.classList.remove('active');
        });

        // Agregar la clase "active" a la tarjeta clicada
        card.classList.add('active');

        // Ocultar todos los contenidos
        contents.forEach(content => {
            content.style.display = 'none';
        });

        // Mostrar el contenido correspondiente al hacer clic en la tarjeta
        contents[index].style.display = 'block';
    });
});
