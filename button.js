/* function showPage(pageId, element) {
    // 1. Ocultar todas las secciones
    const sections = document.querySelectorAll('.content-section');
    sections.forEach(section => {
        section.classList.add('d-none');
    });

    // 2. Mostrar la sección seleccionada
    const target = document.getElementById(pageId);
    if (target) {
        target.classList.remove('d-none');
    }

    // 3. Gestionar clase activa en el menú
    const items = document.querySelectorAll('.nav-item');
    items.forEach(item => item.classList.remove('active'));
    element.classList.add('active');
} */

function showPage(pageId, element) {
    // 1. Ocultar todas las secciones
    const sections = document.querySelectorAll('.content-section');
    sections.forEach(section => {
        section.classList.add('d-none');
    });

    // 2. Mostrar la sección seleccionada
    const target = document.getElementById(pageId);
    if (target) {
        target.classList.remove('d-none');
    } else {
        console.error("No se encontró la sección con ID:", pageId);
    }

    // 3. Gestionar clase activa (con validación para que no de error)
    const items = document.querySelectorAll('.nav-item');
    items.forEach(item => item.classList.remove('active'));
    
    if (element) {
        element.classList.add('active');
    }
}