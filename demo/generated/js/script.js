
$(window).ready(() => {
    document.querySelectorAll('.yellow').forEach((yellow) => {
        yellow.innerHTML += '{color} ';
    });
});
