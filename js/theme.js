;
const showMobileMenuBtn = document.getElementById('show-mobile-nav ');
showMobileMenuBtn.addEventListener('click', function () {
    let x = document.getElementById('menu-main-menu');
    if (x.style.display === 'block') {
        x.style.display = 'none';
    } else {
        x.style.display = 'block';
    }
})