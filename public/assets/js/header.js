document.addEventListener('DOMContentLoaded', function() {

    const btnMenu = document.getElementById('btn-hamburger');
    const btnCloseMenu = document.getElementById('btn-close-menu');
    const Sidebar = document.getElementById('sidebar');

    btnMenu.addEventListener('click', function() {
        Sidebar.classList.toggle('left-[0%]');
        if(Sidebar.classList.contains('left-[0%]')) {
            Sidebar.classList.remove('left-[-100%]');
        } else {
            Sidebar.classList.add('left-[-100%]');
        }
    });

    btnCloseMenu.addEventListener('click', function() {
        Sidebar.classList.remove('left-[0%]');
        Sidebar.classList.add('left-[-100%]');
    });

    // desplegar submenú
    const btnUsers = document.getElementById('btn-users');
    const subMenuUsers = document.getElementById('menu-users');
    const iconUsers = document.getElementById('arrow-users');

    btnUsers.addEventListener('click', function() {
        if(subMenuUsers.classList.contains('max-h-0')) {
            subMenuUsers.classList.remove('max-h-0');
            subMenuUsers.classList.add('h-fit');
            iconUsers.classList.add('rotate-180');
            console.log("Submenú Usuarios abierto");
        } else {
            subMenuUsers.classList.add('max-h-0');
            subMenuUsers.classList.remove('max-h-40');
            iconUsers.classList.remove('rotate-180');
            console.log("Submenú Usuarios cerrado");
        }
    });

        // AÑO ACTUAL EN EL FOOTER
    let yearElement = document.getElementById('year');
    if (yearElement) {
        yearElement.textContent = new Date().getFullYear();
    }else {
        console.warn("Elemento con id 'year' no encontrado en el DOM.");
    }
});