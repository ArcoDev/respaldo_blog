let blog = 1;

window.addEventListener('DOMContentLoaded', function () {
    mostrarBlog();
    cambiarBlog();
});

function mostrarBlog() {
    const blogAnterior = document.querySelector('.mostrar-blog');
    if (blogAnterior) {
        blogAnterior.classList.remove('mostrar-blog');
    }
    const blogActual = document.querySelector(`#blog-${blog}`);
    blogActual.classList.add('mostrar-blog');

    const enlaceAnterior = document.querySelector('.active');
    if (enlaceAnterior) {
        enlaceAnterior.classList.remove('active');
    }
    const enlaceActual = document.querySelector(`[data-blog="${blog}"]`);
    enlaceActual.classList.add('active');
}

function cambiarBlog() {
    const enlaces = document.querySelectorAll('a');
    enlaces.forEach(link => {
        link.addEventListener('click', e => {
            e.preventDefault();
            blog = parseInt(e.target.dataset.blog);
            mostrarBlog();
        });
    });
}