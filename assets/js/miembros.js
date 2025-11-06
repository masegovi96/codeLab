// Funcionalidad de filtros para la sección de miembros
document.addEventListener('DOMContentLoaded', function() {
    const filtros = document.querySelectorAll('.filtro-btn');
    const tarjetas = document.querySelectorAll('.tarjeta-miembro');

    // Función para filtrar tarjetas
    function filtrarMiembros(categoria) {
        tarjetas.forEach(tarjeta => {
            const categoriaTarjeta = tarjeta.getAttribute('data-categoria');
            
            if (categoria === 'todos' || categoriaTarjeta === categoria) {
                tarjeta.style.display = 'flex';
                // Animación de entrada
                setTimeout(() => {
                    tarjeta.style.opacity = '1';
                    tarjeta.style.transform = 'scale(1)';
                }, 10);
            } else {
                tarjeta.style.opacity = '0';
                tarjeta.style.transform = 'scale(0.8)';
                setTimeout(() => {
                    tarjeta.style.display = 'none';
                }, 300);
            }
        });
    }

    // Event listeners para los botones de filtro
    filtros.forEach(filtro => {
        filtro.addEventListener('click', function() {
            // Remover clase active de todos los botones
            filtros.forEach(f => f.classList.remove('active'));
            
            // Agregar clase active al botón clickeado
            this.classList.add('active');
            
            // Obtener la categoría del filtro
            const categoria = this.getAttribute('data-filtro');
            
            // Filtrar las tarjetas
            filtrarMiembros(categoria);
        });
    });

    // Inicializar las tarjetas con transición suave
    tarjetas.forEach(tarjeta => {
        tarjeta.style.transition = 'all 0.3s ease';
    });
});
