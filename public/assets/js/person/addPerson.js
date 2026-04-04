document.addEventListener('DOMContentLoaded', function () {
    const btnBuscarDni = document.getElementById('btnBuscarDni');
    const inputDni = document.getElementById('dni');
    // datos de la persona
    const inputName = document.getElementById("nombre");
    const inputAppPat = document.getElementById('apellidoPaterno');
    const inputAppMat = document.getElementById('apellidoMaterno');

    if (!btnBuscarDni || !inputDni) {
        console.warn('No se encontró el botón o el input de DNI.');
        return;
    }

    btnBuscarDni.addEventListener('click', async () => {
        const dni = inputDni.value.trim();

        if (!dni) {
            showAlert('Ingresa un DNI antes de buscarlo.', 'error');
            return;
        }

        try {
            const response = await fetch(`${BASE_URL}/persona/dni?dni=${encodeURIComponent(dni)}`, {
                method: 'GET',
                credentials: 'include'
            });

            const data = await response.json();

            if (data.success !== false) {
                showAlert('Información del DNI obtenida correctamente.', 'success', 15000);
                inputName.value = data.data.nombres;
                inputAppPat.value = data.data.apellido_paterno;
                inputAppMat.value = data.data.apellido_materno;
                console.log(data);
            } else {
                showAlert(data.message || 'No se pudo obtener la información del DNI.', 'error');
  
            }
        } catch (error) {
            console.error('Error en la solicitud de DNI:', error);
            showAlert('Error al consultar el DNI. Revisa la consola.', 'error');
        }
    });
});