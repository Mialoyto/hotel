addEventListener('DOMContentLoaded', () =>{
    // LOGIN
    const form = document.getElementById("loginForm");

    form.addEventListener("submit", async (e) => {
        e.preventDefault();

        const formData = new FormData(form);

        let username = formData.get("username");
        let password = formData.get("password");

        formData.append("username", username);
        formData.append("password", password);

        const response = await fetch(form.action, {
            method: "POST",
            body: formData
        });

        const data = await response.json();
        console.log('response data', data);
        
        if (data.status) {
            window.location.href = BASE_URL + data.redirect;
        } else {
            showAlert(data.message, 'error');
            // alert('error: ' + data.message);
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