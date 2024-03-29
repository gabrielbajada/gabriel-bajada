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

//});

/* const btn = document.querySelector(".btn-toggle");
const prefersDarkScheme = window.matchMedia("(prefers-color-scheme: dark)");

const currentTheme = localStorage.getItem("theme");
if (currentTheme == "dark") {
  document.body.classList.toggle("theme--dark");
} else if (currentTheme == "light") {
  document.body.classList.toggle("theme--light");
} else {
  document.body.classList.toggle("theme--light");
  localStorage.setItem("theme", "light");
}

btn.addEventListener("click", function () {
  if (prefersDarkScheme.matches) {
    document.body.classList.toggle("theme--light");
    var theme = document.body.classList.contains("theme--light")
      ? "light"
      : "dark";
  } else {
    document.body.classList.toggle("theme--dark");
    var theme = document.body.classList.contains("theme--dark")
      ? "dark"
      : "light";
  }
  localStorage.setItem("theme", theme);
}); */


const btn = document.querySelector(".btn-toggle");
const prefersDarkScheme = window.matchMedia("(prefers-color-scheme: dark)");

const currentTheme = localStorage.getItem("theme");
if (currentTheme == "dark") {
  ourDarkModeSet("theme--dark");
} else if (currentTheme == "light") {
  ourDarkModeSet("theme--light");
} else {
  if (prefersDarkScheme.matches) {
    ourDarkModeSet("theme--dark");
  } else {
    ourDarkModeSet("theme--light");
  }
}
btn.addEventListener("click", function () {
  if (document.body.classList.contains('theme--dark')) {
    ourDarkModeSet("theme--light");
  } else {
    ourDarkModeSet("theme--dark");
  }
});
function ourDarkModeUnset() {
  document.body.classList.remove('theme--light');
  document.body.classList.remove('theme--dark');
}
function ourDarkModeSet(c) {
  ourDarkModeUnset();
  document.body.classList.add(c);
  localStorage.setItem("theme", c.replace("theme--",""));
}
