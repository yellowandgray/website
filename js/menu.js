function openNav() {
    var width = window.innerWidth;
    if (width > 991) {
        document.getElementById("myNav").style.width = "30%";
    } else {
        document.getElementById("myNav").style.width = "100%";
    }
}

function closeNav() {
    document.getElementById("myNav").style.width = "0%";
}