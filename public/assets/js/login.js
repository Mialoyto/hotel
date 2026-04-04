addEventListener("DOMContentLoaded", () => {
  // LOGIN
  const form = document.getElementById("loginForm");

  form.addEventListener("submit", async (e) => {
    e.preventDefault();

    const username = form.username.value;
    const password = form.password.value;
    // console.log("error" + form.action);


    try {
      const response = await fetch(`/hotel/public/login`, {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        credentials: "include",
        body: JSON.stringify({
          username: username,
          password: password,
        }),
      });

      const data = await response.json();

      if (data.status) {
        window.location.href = BASE_URL + data.redirect;
      } else {
        showAlert(data.message, "error");
        // console.error("Login error:", data.message);
        // alert('error: ' + data.message);
      }
    } catch (error) {
      console.error("Error en la solicitud de login:", error);
      showAlert(
        "Error en la solicitud de login. Por favor, inténtalo de nuevo.",
        "error"
      );
      // alert('Error en la solicitud de login. Por favor, inténtalo de nuevo.');
    }
  });

  // AÑO ACTUAL EN EL FOOTER
  let yearElement = document.getElementById("year");
  if (yearElement) {
    yearElement.textContent = new Date().getFullYear();
  } else {
    console.warn("Elemento con id 'year' no encontrado en el DOM.");
  }
});
