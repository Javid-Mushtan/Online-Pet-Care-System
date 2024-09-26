/* Credit: w3schools website :- https://www.w3schools.com/howto/howto_js_accordion.asp*/


var acc = document.getElementsByClassName("accordion")
let i;

for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function () {
        this.classList.toggle("active")

        var panel = this.nextElementSibling;
        if (panel.style.display === "block") {
            panel.style.display = "none"
        } else {
            panel.style.display = "block"
        }
    })
}

function getSavedCardInfo(userid) {
    fetch("process/payment_portal/process_payment.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        },
        body: "method=getcard&userid="+userid
    })
    .then(response => response.json())
    .then(data => {
        if (data.status == "success") {
            let choice = confirm("Saved Credit Card Found. Do you want to use it?")
            if (choice) {
                document.getElementById("card-number").value = data.cardnum
                document.getElementById("exp-date").value = data.expdate
                document.getElementById("cvc").value = data.cvc
                document.getElementById("name").value = data.name
            }
            document.getElementById("card").style.display = "block"
        }
    })
    .catch(error => console.error(error))
}
