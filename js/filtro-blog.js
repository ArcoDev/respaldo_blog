let blog = 1;

window.addEventListener('DOMContentLoaded', function () {
    mostrarBlog();
    cambiarBlog();
});

function mostrarBlog() {
    const blogAnterior = document.querySelectorAll('.mostrar-blog');
    blogAnterior.forEach(blogAnt => {
        blogAnt.classList.remove('mostrar-blog');
    });
    claseBlog();

    const enlaceAnterior = document.querySelector('.active');
    if (enlaceAnterior) {
        enlaceAnterior.classList.remove('active');
    }
    const enlaceActual = document.querySelector(`[data-blog="${blog}"]`);
    enlaceActual.classList.add('active');
}

function claseBlog() {
    const claseB = document.querySelectorAll(`.numero-${blog}`);
    claseB.forEach(blogActual => {
        blogActual.classList.add('mostrar-blog');
    });
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