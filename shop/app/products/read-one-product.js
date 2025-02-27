addEventListener(document, "click", async function () {
    // Получаем ID товара
    const id = this.getAttribute("data-id");

    const response = await fetch('http://mytravel-aristov-altunin/shop/api/product/read_one.php?id=' + id);
    const data = await response.json();
    
    // Начало HTML
    let read_one_product_html = `
        
    <!-- При нажатии будем отображать список товаров -->
    <div id="read-products" class="btn btn-primary pull-right m-b-15px read-products-button">
        <span class="glyphicon glyphicon-list"></span> Все товары
    </div>
    <!-- Полные данные о товаре будут показаны в этой таблице -->
    <table class="table table-bordered table-hover">

        <tr>
            <td class="w-30-pct">Название</td>
            <td class="w-70-pct">` + data.name + `</td>
        </tr>

        <tr>
            <td>Цена</td>
            <td>` + data.price + `</td>
        </tr>

        <tr>
            <td>Описание</td>
            <td>` + data.description + `</td>
        </tr>

        <tr>
            <td>Категория</td>
            <td>` + data.category_name + `</td>
        </tr>

    </table>`;

    // Вставка HTML в «page-content» нашего приложения
    document.querySelector("#page-content").innerHTML = read_one_product_html;

    // Изменяем заголовок страницы
    changePageTitle("Просмотр товара");

}, ".read-one-product-button")