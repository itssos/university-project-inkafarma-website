// Obtén la URL actual
const currentPage = window.location.href;

// Obtén todos los enlaces del navbar
const navbarLinks = document.getElementById("navbarLinks");
const links = navbarLinks.getElementsByClassName("nav-link");

// Recorre los enlaces y compara la URL actual con el atributo "href" de cada enlace
for (let i = 0; i < links.length; i++) {
    const link = links[i];

    // Si la URL actual coincide con el enlace, añade la clase "active"
    if (link.href === currentPage) {
        link.classList.add("active");
    }
}