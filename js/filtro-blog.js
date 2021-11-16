const newValBlog = document.getElementById('blogCat');
let blog = newValBlog.dataset.categoria;

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
    
    //Remover clase de enlace activo
    const enlaceAnterior = document.querySelector('.active');
    if (enlaceAnterior) {
        enlaceAnterior.classList.remove('active');
    }
    
    //Agregar clase active a enlace actual
    const enlaceActual = document.querySelector(`[data-blog="${blog}"]`);
    enlaceActual.classList.add('active');
}

function claseBlog() {
    const claseB = document.querySelectorAll(`[data-categoria="${blog}"]`);
    claseB.forEach(blogActual => {
        blogActual.classList.add('mostrar-blog');
    });
}

function cambiarBlog() {
    const enlaces = document.querySelectorAll('a.enlaces');
    enlaces.forEach(link => {
        link.addEventListener('click', e => {
            e.preventDefault();
            blog = parseInt(e.target.dataset.blog);
            mostrarBlog();
        });
    });
}