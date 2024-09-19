function decreaseItemCount(productId) {
    let count = document.getElementById("item-count-"+productId)
    if (parseInt(count.innerText) > 1) {
        fetch("process/update_cart.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: "action=decrease&product_id=" + productId
        })
        .then(response => {
            if (response.ok) {
                count.innerText = parseInt(count.innerText) - 1
                //calculateTotalCartValue()
            } else {
                alert("Error Updating Cart")
            }
        })
        .catch(error => console.error("Request Failed: ", error))
    }
}

function increaseItemCount(productId) {
    let count = document.getElementById("item-count-"+productId)
    
    fetch("process/update_cart.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        },
        body: "action=increase&product_id=" + productId
    })
    .then(response => {
        if (response.ok) {
            count.innerText = parseInt(count.innerText) + 1
            //calculateTotalCartValue()
        } else {
            alert("Error Updating Cart")
        }
    })
    .catch(error => console.error("Request failed:", error))
}

function calculateTotalCartValue() {
    fetch("process/update_cart.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        },
        body: "action=total&user_id=1"
    })
    .then(response => {
        if (response.ok) {
            return response.json()
        }
    })
    .then(data => {
        console.log(data)
    })
    .catch(error => console.error("Request Failed: ", error))
}

calculateTotalCartValue()