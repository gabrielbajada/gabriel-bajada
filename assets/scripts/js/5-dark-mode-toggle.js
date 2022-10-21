//jQuery(document).ready(function() {

  /*const btn = document.querySelector(".btn-toggle");
  const prefersDarkScheme = window.matchMedia("(prefers-color-scheme: dark)");

  const currentTheme = localStorage.getItem("theme");
  if (currentTheme == "dark") {
    document.body.classList.toggle("theme--dark");
  } else if (currentTheme == "default") {
    document.body.classList.toggle("theme--default");
  }

  btn.addEventListener("click", function () {
    if (prefersDarkScheme.matches) {
      document.body.classList.toggle("theme--default");
      var theme = document.body.classList.contains("theme--default")
        ? "default"
        : "dark";
    } else {
      document.body.classList.toggle("theme--dark");
      var theme = document.body.classList.contains("theme--dark")
        ? "dark"
        : "default";
    }
    localStorage.setItem("theme", theme);
  }); */

  const btn = document.querySelector(".btn-toggle");
  const prefersDarkScheme = window.matchMedia("(prefers-color-scheme: dark)");

  const currentTheme = localStorage.getItem("theme");
  if (currentTheme == "dark") {
    document.body.classList.toggle("theme--dark");
  } else if (currentTheme == "default") {
    document.body.classList.toggle("theme--default");
  }

  btn.addEventListener("click", function () {
    if (prefersDarkScheme.matches) {
      document.body.classList.toggle("theme--default");
      var theme = document.body.classList.contains("theme--default")
        ? "default"
        : "dark";
    } else {
      document.body.classList.toggle("theme--dark");
      var theme = document.body.classList.contains("theme--dark")
        ? "dark"
        : "default";
    }
    localStorage.setItem("theme", theme);
  });


//});
