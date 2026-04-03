function displaySubmenu($btn, $submenu, $icon) {

    $btn.addEventListener('click', function() {
        if($submenu.classList.contains('max-h-0')) {
            $submenu.classList.remove('max-h-0');
            $submenu.classList.add('h-fit');
            $icon.classList.add('rotate-180');
            console.log("Submenú abierto");
        } else {
            $submenu.classList.add('max-h-0');
            $submenu.classList.remove('h-fit');
            $icon.classList.remove('rotate-180');
            console.log("Submenú cerrado");
        }
    });
}