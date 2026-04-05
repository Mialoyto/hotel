import {
  getUbigeoData,
  validateUbigeo,
  parseUbigeo,
} from "../../../../node_modules/ubigeo-fns/dist/index.js";

document.addEventListener("DOMContentLoaded", function () {
  const btnBuscarDni = document.getElementById("btnBuscarDni");
  const formPersona = document.getElementById("formPersona");
  // datos de la persona
  const inputDni = document.getElementById("dni");
  const inputName = document.getElementById("nombre");
  const inputAppPat = document.getElementById("apellidoPaterno");
  const inputAppMat = document.getElementById("apellidoMaterno");
  const inputDireccion = document.getElementById("direccion");
  const inputTelefono = document.getElementById("telefono");
  const inputEmail = document.getElementById("correo");
  const inputFechaNacimiento = document.getElementById("fechaNacimiento");

  if (!btnBuscarDni || !inputDni) {
    console.warn("No se encontró el botón o el input de DNI.");
    return;
  }

  btnBuscarDni.addEventListener("click", async (e) => {
    e.preventDefault();
    const dni = inputDni.value.trim();
    const selectDepartamento = document.getElementById("departamento");
    const selectProvincia = document.getElementById("provincia");
    const selectDistrito = document.getElementById("distrito");

    if (!dni) {
      showAlert("Ingresa un DNI antes de buscarlo.", "error");
      return;
    }

    try {
      const response = await fetch(
        `${BASE_URL}/persona/dni?dni=${encodeURIComponent(dni)}`,
        {
          method: "GET",
          credentials: "include",
        }
      );

      const data = await response.json();

      if (data.success !== false) {
        const ubigeo = String(data.data.ubigeo_sunat ?? "").trim();

        if (ubigeo && validateUbigeo(ubigeo)) {
          const responseApi = getUbigeoData(ubigeo);
          const responseParseUbigeo = parseUbigeo(ubigeo);
          showAlert(
            "Información del DNI obtenida correctamente.",
            "success",
            5000
          );
          inputName.value = data.data.nombres;
          inputAppPat.value = data.data.apellido_paterno;
          inputAppMat.value = data.data.apellido_materno;
          inputDireccion.value = data.data.direccion;
          console.log("Ubigeo:", ubigeo);
          console.log("Datos de ubigeo:", responseApi);
          console.log("datos del api DNI :", data);
          console.log("datos parseados del api DNI :", responseParseUbigeo);

          let optionDepartamento = `
          <option value="${
            responseParseUbigeo.departmentCode
          }" selected>${responseApi.department.toUpperCase()}</option>`;
          let optionProvincia = `
          <option value="${
            responseParseUbigeo.provinceCode
          }" selected>${responseApi.province.toUpperCase()}</option>`;
          let optionDistrito = `
          <option value="${
            responseParseUbigeo.districtCode
          }" selected>${responseApi.district.toUpperCase()}</option>`;

          selectDepartamento.innerHTML = optionDepartamento;
          selectProvincia.innerHTML = optionProvincia;
          selectDistrito.innerHTML = optionDistrito;
        } else if (ubigeo) {
          console.warn("Ubigeo no valido recibido desde RENIEC:", ubigeo);
        }
      } else {
        showAlert(data.message, "error");
      }
    } catch (error) {
      console.error("Error en la solicitud de DNI:", error);
      showAlert("Error al consultar el DNI. Revisa la consola.", "error");
    }
  });

  async function addPersona() {
    const dni = inputDni.value.trim();
    const nombres = inputName.value.trim();
    const apellidoPaterno = inputAppPat.value.trim();
    const apellidoMaterno = inputAppMat.value.trim();
    const telefono = inputTelefono.value.trim();
    const email = inputEmail.value.trim();

    if (!dni || !nombres || !apellidoPaterno || !apellidoMaterno) {
      showAlert(
        "Primero completa el DNI y consulta los datos para llenar nombres y apellidos.",
        "error"
      );
      return;
    }

    try {
      const response = await fetch(`/hotel/public/persona/registrar`, {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        credentials: "include",
        body: JSON.stringify({
          dni,
          nombres,
          apellido_paterno: apellidoPaterno,
          apellido_materno: apellidoMaterno,
          telefono,
          email,
        }),
      });

      console.log(
        "Respuesta del servidor al registrar persona (raw):",
        response
      );

      const data = await response.json();
      console.log("Respuesta del servidor al registrar persona:", data);
      if (data.status) {
        showAlert(
          data.message || "Persona registrada correctamente.",
          "success"
        );
        // Limpiar el formulario después de registrar
        inputDni.value = "";
        inputName.value = "";
        inputAppPat.value = "";
        inputAppMat.value = "";
        inputDireccion.value = "";
        inputTelefono.value = "";
        inputEmail.value = "";
      } else {
        showAlert(data.message || "No se pudo registrar la persona.", "error");
      }
    } catch (error) {
      showAlert("No se realizó el registro de la persona.", "error");
      console.error("Error al registrar la persona:", error);
    }
  }

  formPersona.addEventListener("submit", function (e) {
    e.preventDefault();
    addPersona();
  });
});
