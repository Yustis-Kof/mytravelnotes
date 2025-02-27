addEventListener(document, "click", async function () {
    const product_id = this.getAttribute("data-id");
    
    let result = confirm("Вы уверены?")

    if (result == true) {
        await fetch("http://mytravel-aristov-altunin/shop/api/product/delete.php", {
            method: "POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ id: product_id })
        })
        showProducts();
    }

}, ".delete-product-button")