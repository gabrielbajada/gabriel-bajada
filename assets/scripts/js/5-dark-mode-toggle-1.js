// Dark Mode

/*
1. CSS Media query
2. HTML body class (main)
3. Cookie "theme"
*/

const btn = document.querySelector(".btn-toggle");
const prefersDarkScheme = window.matchMedia("(prefers-color-scheme: dark)");

function theme_is() {
   var theme = 'dark';
   if (document.body.classList.contains("light-mode")) {
      theme = 'light';
   }
   return theme;
}

function toggle_light_and_dark_theme() {

  var theme = theme_is()

  if (theme == 'light') {
    document.body.classList.toggle("dark-theme");
    localStorage.setItem("theme", "dark");
  } else {
    document.body.classList.toggle("light-theme");
    localStorage.setItem("theme", "light");
  }
}

if (prefersDarkScheme.matches && theme_is() == 'light') {

  toggle_light_and_dark_theme()

}

/*const currentTheme = localStorage.getItem("theme");
if (currentTheme == "dark") {
  document.body.classList.toggle("dark-theme");
} else if (currentTheme == "light") {
  document.body.classList.toggle("light-theme");
} else {
  document.body.classList.toggle("dark-theme");
  localStorage.setItem("theme", "dark");
} */

btn.addEventListener("click", function () {
  toggle_light_and_dark_theme()
});
