const cards = document.querySelectorAll('.cards');

cards.forEach(card => {
    card.addEventListener('click', () => {
        // Eliminar la clase "active" de todos los elementos
        cards.forEach(c => {
            c.classList.remove('active');
        });

        // Agregar la clase "active" al elemento clicado
        card.classList.add('active');
    });
});

const content = document.getElementById('container');

// Ocultar todos los contenidos excepto el primero
content.children[0].style.display = 'block';

cards.forEach((card, index) => {
    card.addEventListener('click', () => {
        // Ocultar todos los contenidos
        for (let i = 0; i < content.children.length; i++) {
            content.children[i].style.display = 'none';
        }

        // Mostrar el contenido PHP correspondiente al hacer clic en la card
        content.children[index].style.display = 'block';
    });
});
