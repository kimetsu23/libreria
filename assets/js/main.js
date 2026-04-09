
document.addEventListener('DOMContentLoaded', () => {

    //Filtro de búsqueda en tiempo real
    const searchInput = document.getElementById('busqueda');

    if (searchInput) {
        searchInput.addEventListener('input', () => {
            const termino = searchInput.value.toLowerCase().trim();
            const tarjetas = document.querySelectorAll('[data-busqueda]');
            let visibles = 0;

            tarjetas.forEach(tarjeta => {
                const texto    = tarjeta.dataset.busqueda.toLowerCase();
                const coincide = texto.includes(termino);
                const contenedor = tarjeta.closest('.col') || tarjeta;
                contenedor.style.display = coincide ? '' : 'none';
                if (coincide) visibles++;
            });

            const sinResultados = document.getElementById('sin-resultados');
            if (sinResultados) {
                sinResultados.style.display = visibles === 0 ? 'block' : 'none';
            }
        });
    }

    const formContacto = document.getElementById('formContacto');

    if (formContacto) {
        formContacto.addEventListener('submit', (e) => {
            let valido = true;
            const campos = formContacto.querySelectorAll('[required]');

            campos.forEach(campo => {
                campo.classList.remove('is-invalid');

                if (!campo.value.trim()) {
                    campo.classList.add('is-invalid');
                    valido = false;
                }

                if (campo.type === 'email' && campo.value.trim()) {
                    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    if (!regex.test(campo.value.trim())) {
                        campo.classList.add('is-invalid');
                        valido = false;
                    }
                }
            });

            if (!valido) {
                e.preventDefault();
                mostrarAlerta('Por favor, completa todos los campos correctamente.', 'danger');
            }
        });

        formContacto.querySelectorAll('input, textarea').forEach(el => {
            el.addEventListener('input', () => el.classList.remove('is-invalid'));
        });
    }

    document.querySelectorAll('.alert-auto').forEach(alerta => {
        setTimeout(() => {
            alerta.style.transition = 'opacity 0.5s';
            alerta.style.opacity = '0';
            setTimeout(() => alerta.remove(), 500);
        }, 4000);
    });

});

function mostrarAlerta(mensaje, tipo = 'danger') {
    const contenedor = document.getElementById('alertas');
    if (!contenedor) return;

    const alerta = document.createElement('div');
    alerta.className = `alert alert-${tipo} alert-dismissible fade show`;
    alerta.innerHTML = `
        ${mensaje}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    `;
    contenedor.prepend(alerta);

    setTimeout(() => {
        alerta.style.transition = 'opacity 0.5s';
        alerta.style.opacity = '0';
        setTimeout(() => alerta.remove(), 500);
    }, 5000);
}