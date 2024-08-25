document.getElementById("menu-icon").addEventListener("click", () => {
    const menu = document.getElementById("side-menu")
    if (menu.style.display === 'none') {
        menu.style.display = 'flex'
    } else {
        menu.style.display = 'none'
    }
})
