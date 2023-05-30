const d = document,
  w = window,
  ls = localStorage;

let themeSaved = ls.getItem("darkOrLight");

d.addEventListener("DOMContentLoaded", () => {
  console.log("Console de app.js");
  handledEvents();
});
darkMode(themeSaved);

//** Manejador de Eventos **//

function handledEvents() {
  //** Delegacion de Eventos **//

  //** Click **//
  d.addEventListener("click", (e) => {
    if (e.target.matches(".mobile-menu")) {
      mobileMenu(e);
    }

    if (e.target.matches(".dark-mode-boton")) {
      toChangeThemeColor(ls.getItem("darkOrLight"));
    }
  });

  //** Evento Submit **//
  d.addEventListener("submit", (e) => {
    if (e.target.matches(".delete-form")) {
      toSendDeleteForm(e);
    }
  });
}

//** FUNCTIONS **//

/****************************************************************************
Agrega o Elimina la Clase ".mostrar-menu" del elemento nav class=".navegacion"
*****************************************************************************/
function mobileMenu() {
  const $navMenu = d.querySelector(".navegacion");

  $navMenu.classList.toggle("mostrar-menu");
}

/**************************************************************************************
Agrega o Elimina la Clase "dark-mode" del Elemento body
@param {string} theme El valor actual de la varible "darkOrLight" del localStorage.
**************************************************************************************/

function darkMode(theme) {
  if (theme == "Dark") {
    d.body.classList.add("dark-mode");
  } else if (theme == "Light") {
    d.body.classList.remove("dark-mode");
  } else {
    ls.setItem("darkOrLight", "Ligth");
  }
}

/**************************************************************************************
Cambia el contenido de la variable "darkOrLight" del localStorage
@param {string} theme El valor actual de la varible "darkOrLight" del localStorage.
**************************************************************************************/

function toChangeThemeColor(theme) {
  theme == "Dark"
    ? ls.setItem("darkOrLight", "Light")
    : ls.setItem("darkOrLight", "Dark");

  darkMode(ls.getItem("darkOrLight"));
}

/**************************************************************************************
Procesa el formulario ".delete-form" y lo envia con un peticion Fecth() a la pagina 
index.php del administrados de propiedades.
@param {event} Evento "submit".
**************************************************************************************/

const toSendDeleteForm = (e) => {
  const $deleteForm = e.target,
    formData = new FormData($deleteForm);

  let confirmacionEliminarPropiedad = confirm(
    `¿Esta seguro desea Eliminar la propiedad con el id: ${formData.get(
      "id"
    )}?`.toUpperCase()
  );

  if (confirmacionEliminarPropiedad) {
    fetch("/ProyectosPHP/bienesraices_inicio/admin/index.php", {
      method: "POST",
      body: formData,
    });
  } else {
    e.preventDefault();
  }
};
