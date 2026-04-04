document.addEventListener("DOMContentLoaded", function () {
  const tbUsers = document.getElementById("tb-users");
  const isMobile = window.matchMedia("(max-width: 768px)").matches;

  if (!tbUsers) {
    console.error("No se encontró el elemento con id 'tb-users'");
    return;
  }

  const desktopColumns = [
    {
      title: "ID",
      field: "id_usuario",
      visible: false,
      download: false,
      responsive: 5
    },
    { title: "Usuario", field: "nombre_usuario", responsive: 4 },
    { title: "Nombres", field: "nombres", responsive: 0 },
    { title: "Apellido Paterno", field: "apellido_paterno", responsive: 0 },
    { title: "Apellido Materno", field: "apellido_materno", responsive: 0 },
    { title: "Hotel", field: "nombre_hotel", responsive: 4 },
    { title: "Rol", field: "roles", responsive: 4 },
    {
      title: "Acciones",
      responsive: 5,
      visible:true, 
      download:false,
      formatter: function () {
        return `
          <div class="flex justify-center py-px gap-2">
            <button title="Editar"
              class="btn-edit p-2 sm:p-px bg-gray-200 rounded-lg
                    hover:bg-blue-300 transition">
              <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e3e3e3" class="fill-blue-500">
              <path d="M200-200h57l391-391-57-57-391 391v57Zm-80 80v-170l528-527q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L290-120H120Zm640-584-56-56 56 56Zm-141 85-28-29 57 57-29-28Z"/>
              </svg>
            </button>

            <button title="Eliminar"
              class="btn-delete p-2 sm:p-px bg-gray-200 rounded-lg
              hover:bg-red-300  transition">
              <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e3e3e3" class="fill-red-600" >
                <path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z"/>
              </svg>
            </button>
          </div>
        `;
      },
      cellClick: function (e, cell) {
        const data = cell.getRow().getData();

        if (e.target.classList.contains("btn-delete")) {
          fetch(`${BASE_URL}/users/delete`, {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ id: data.id_usuario }),
          }).then(() => {
            cell.getRow().delete();
          });
        }
      },
    },
  ];

  let activeMobileRow = null;
  let mobileModal = null;

  const ensureMobileModal = function () {
    if (mobileModal) return mobileModal;

    mobileModal = document.createElement("div");
    mobileModal.id = "mobile-user-modal";
    mobileModal.className =
      "fixed inset-0 z-50 hidden items-center justify-center bg-black/50 p-4";

    mobileModal.innerHTML = `
      <div class="w-full max-w-md rounded-2xl bg-white shadow-2xl">
      
        <div class="flex items-center justify-between border-b border-slate-200 px-4 py-3">
          <h3 class="text-base font-bold text-slate-800">Detalle de Usuario</h3>
          <button class="btn-close-modal rounded-md px-2 py-1 text-slate-600 hover:bg-slate-100" aria-label="Cerrar">
          <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e3e3e3" class="fill-gray-500">
          <path d="m336-280-56-56 144-144-144-143 56-56 144 144 143-144 56 56-144 143 144 144-56 56-143-144-144 144Z"/>
          </svg>
          
          </button>
        </div>

        <div id="mobile-user-modal-content" class="space-y-2 px-4 py-4 text-sm"></div>

        <div class="flex justify-end gap-2 border-t border-slate-200 px-4 py-3">
          <button class="btn-delete-modal rounded-lg bg-red-100 px-3 py-2 text-red-700 hover:bg-red-500 hover:text-white transition">Eliminar</button>
          <button class="btn-close-modal rounded-lg bg-slate-200 px-3 py-2 text-slate-700 hover:bg-slate-300 transition">Cerrar</button>
        </div>

      </div>
    `;

    mobileModal.addEventListener("click", function (e) {
      if (e.target === mobileModal || e.target.closest(".btn-close-modal")) {
        mobileModal.classList.add("hidden");
        mobileModal.classList.remove("flex");
      }

      if (e.target.closest(".btn-delete-modal") && activeMobileRow) {
        const data = activeMobileRow.getData();
        fetch(`${BASE_URL}/users/delete`, {
          method: "POST",
          headers: { "Content-Type": "application/json" },
          body: JSON.stringify({ id: data.id_usuario }),
        }).then(() => {
          activeMobileRow.delete();
          mobileModal.classList.add("hidden");
          mobileModal.classList.remove("flex");
          activeMobileRow = null;
        });
      }
    });

    document.body.appendChild(mobileModal);
    return mobileModal;
  };

  const openMobileModal = function (row) {
    const modal = ensureMobileModal();
    const content = modal.querySelector("#mobile-user-modal-content");
    const data = row.getData();
    activeMobileRow = row;

    content.innerHTML = `
      <p><span class="font-semibold text-slate-600">Usuario:</span> ${
        data.nombre_usuario ?? "-"
      }</p>
      <p><span class="font-semibold text-slate-600">Nombres:</span> ${
        data.nombres ?? "-"
      }</p>
      <p><span class="font-semibold text-slate-600">Apellido Paterno:</span> ${
        data.apellido_paterno ?? "-"
      }</p>
      <p><span class="font-semibold text-slate-600">Apellido Materno:</span> ${
        data.apellido_materno ?? "-"
      }</p>
      <p><span class="font-semibold text-slate-600">Hotel:</span> ${
        data.nombre_hotel ?? "-"
      }</p>
      <p><span class="font-semibold text-slate-600">Rol:</span> ${
        data.roles ?? "-"
      }</p>
    `;

    modal.classList.remove("hidden");
    modal.classList.add("flex");
  };

  const mobileColumns = [
    {
      title: "Usuarios",
      field: "nombre_usuario",
      headerSort: false,
      formatter: function (cell) {
        const data = cell.getRow().getData();
        console.log("Datos de la fila para formato móvil:", data); // Verifica los datos disponibles para el formato móvil
        return `
          <button type="button" class="btn-open-card w-full rounded-xl border border-slate-200 bg-slate-50 p-2 shadow-sm text-left hover:bg-gray-300 transition">
            <div class="flex items-center justify-between">
              <h3 class="text-base font-bold text-slate-800">${data.nombres} ${data.apellido_paterno} ${data.apellido_materno}</h3>
            </div>
            <p class="text-xs text-slate-500">Toca para abrir tarjeta flotante</p>
          </button>
        `;
      },
      cellClick: function (e, cell) {
        if (e.target.closest(".btn-open-card")) {
          openMobileModal(cell.getRow());
        }
      },
    },
  ];

  const table = new Tabulator(tbUsers, {
    layout: isMobile ? "fitDataStretch" : "fitColumns",
    ajaxURL: `${BASE_URL}/users/getUser/data`,
    ajaxConfig: {
      method: "GET",
      credentials: "include",
      headers: {
        "Content-Type": "application/json",
      },
    },
    ajaxResponse: function (url, params, response) {
      console.log("Respuesta del servidor:", response); // Verifica la respuesta completa del servidor
      return response.data; // Devuelve solo el array de usuarios
    },
    // data: tableData, // CARGA INICIAL DE DATOS VACÍA
    pagination: true,
    pagination: "local",
    paginationSize: isMobile ? 5 : 15,
    responsiveLayout: isMobile ? false : "collapse",
    responsiveLayoutCollapseStartOpen: false,
    paginationSizeSelector: [25, 50, 75, 100],
    columns: isMobile ? mobileColumns : desktopColumns,
    rowFormatter: function (row) {
      const rowEl = row.getElement();
      if (isMobile) {
        rowEl.classList.add("-m-px");
      } else {
        rowEl.classList.add("hover:bg-pink-50", "transition", "duration-150");
      }
    },
     // Idioma
    locale: "es",

    langs: {
        "es": {
            "pagination": {
                "first": "Primero",
                "first_title": "Primera página",
                "last": "Último",
                "last_title": "Última página",
                "prev": "Anterior",
                "prev_title": "Página anterior",
                "next": "Siguiente",
                "next_title": "Página siguiente",
                "page_size": "Registros por página",
                "counter": {
                    "showing": "Mostrando",
                    "of": "de",
                    "rows": "registros",
                    "pages": "páginas"
                }
            }
        }
    },
    paginationCounter: "rows", // Muestra el número total de registros en lugar del número de páginas

    downloadConfig: {
      columnHeaders: true, //incluir encabezados de columna en la descarga
      columnGroups: false, //do not include column groups in column headers for download
      rowGroups: false, //do not include row groups in download
      columnCalcs: false, //do not include column calcs in download
    }
  });

  // DESCARGAR PDF
  const btnPdf = document.querySelector("#btn-pdf");
  btnPdf.addEventListener("click", function (e) {
    table.download("pdf", "usuarios.pdf", {
      orientation: "landscape", //ASIGNA ORIENTACIÓN VERTICAL
      //PORTRAIT: ORIENTACIÓN VERTICAL, LANDSCAPE: ORIENTACIÓN HORIZONTAL
      title: "Listado de Usuarios", //TITULO DEL PDF
      autoPrint: true, //ABRE UNA VENTANA DE PREVISUALIZACIÓN DE IMPRESIÓN CON EL PDF GENERADO
      //true: ABRE LA VENTANA DE PREVISUALIZACIÓN DE IMPRESIÓN, false: DESCARGA DIRECTAMENTE EL PDF SIN PREVISUALIZAR
      unit:"pt", //UNIDAD DE MEDIDA PARA LOS MÁRGENES Y EL TAMAÑO DE LA PÁGINA (PT = PUNTOS)
      // "pt" (puntos), "mm" (milímetros), "cm" (centímetros), "in" (pulgadas)
      format: "a4", //TAMAÑO DE PÁGINA (A4, LETTER, LEGAL, O UN ARRAY PERSONALIZADO [ANCHO, ALTO])
      // "letter" (carta), "legal" (oficio), "a4" (tamaño estándar), o un array personalizado [ancho, alto] en la unidad especificada
      // Ejemplo de formato personalizado: format: [210, 297] para tamaño A4 en mm, o format: [595.28, 841.89] para tamaño A4 en pt
      // Si se omite, se usará el tamaño de página predeterminado de jsPDF (generalmente A4 en pt)
      columns: [
        { title: "ID", field: "id_usuario", visible: false },
        { title: "Usuario", field: "nombre_usuario" },
        { title: "Nombres", field: "nombres" },
        { title: "Apellido Paterno", field: "apellido_paterno" },
        { title: "Apellido Materno", field: "apellido_materno" },
        { title: "Hotel", field: "nombre_hotel" },
        { title: "Rol", field: "roles" },
      ],

    });
  });

  // 🔍 BUSCADOR PRO
  document.getElementById("search").addEventListener("input", function (e) {
    table.setFilter("nombre_usuario", "like", e.target.value);
  });
  // table.setData(null, { fromServer: true }); // ✓ Con config correcta
  // table.setData();
});
