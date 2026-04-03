function showAlert(message, type = 'success') {
  const colors = {
    success: 'bg-green-500',
    error: 'bg-red-500',
    info: 'bg-blue-500'
  };

  const alert = document.createElement('div');

  alert.className = `
    ${colors[type]} text-white px-4 py-3 rounded shadow-lg
    transform transition-all duration-500 ease-out
    translate-x-full opacity-0
  `;

  alert.innerHTML = message;

  const container = document.getElementById('alert-container');
  container.appendChild(alert);

  // 🔹 Activar animación de entrada
  setTimeout(() => {
    alert.classList.remove('translate-x-full', 'opacity-0');
  }, 10);

  // 🔹 Salida después de 3 segundos
  setTimeout(() => {
    alert.classList.add('translate-x-full', 'opacity-0');

    // Eliminar del DOM después de la animación
    setTimeout(() => alert.remove(), 300);
  }, 1500);
}