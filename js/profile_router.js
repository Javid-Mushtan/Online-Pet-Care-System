function getPage(page) {
    fetch('process/profile_router.php', {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        },
        body: "page="+page
    })
    .then(response => response.text())
    .then(html => {
        document.querySelector(".profile-content").innerHTML = html
    })
    .catch(error => console.error("Request Failed: ", error))
}