document.addEventListener('DOMContentLoaded', () => {
    const formLogin = document.getElementById('formLogin');
    const formRegister = document.getElementById('formRegister');
    const btnLogin = document.getElementById('mostrarLogin');
    const btnRegister = document.getElementById('mostrarRegistro');
    const title = document.querySelector('.title h1');
    const description = document.querySelector('.title span');

    btnLogin.addEventListener('click', () => {
        formRegister.style.display = 'none';
        formLogin.style.display = 'block';
        title.textContent = 'INICIO DE SESION';
        description.textContent = 'Bienvenidos, directivos. Accede para gestionar el progreso académico de nuestra escuela';
    });

    btnRegister.addEventListener('click', () => {
        formLogin.style.display = 'none';
        formRegister.style.display = 'block';
        title.textContent = 'REGISTRO DE USUARIO';
        description.textContent = 'Regístrate como directivo para acceder a las herramientas de gestión académica de nuestra escuela';
    });
});
