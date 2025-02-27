addEventListener(document, "click", () => {
    createProduct();
}, ".create-product-button")

async function createProduct(){
    const response = await fetch('http://mytravel-aristov-altunin/shop/api/category/read.php');
    const data = await response.json();

    // Перебор возвращаемого списка данных и создание списка выбора
    let categories_options_html=`<select name="category_id" class="form-control">`;

    data.records.forEach(val => {
        categories_options_html+=`<option value="` + val.id + `">` + val.name + `</option>`;
    });

    categories_options_html += `</select>`;

    let create_product_html=`

        <!-- Кнопка для показа всех товаров -->
        <div id="read-products" class="btn btn-read pull-right m-b-15px read-products-button">
            <span class="glyphicon glyphicon-list"></span> Все товары
        </div>
        <!-- html форма «Создание товара» -->
        <form id="create-product-form" action="#" method="post" border="0">
            <table class="table table-hover table-responsive table-bordered">

                <tr>
                    <td>Название</td>
                    <td><input type="text" name="name" class="form-control" required /></td>
                </tr>

                <tr>
                    <td>Цена</td>
                    <td><input type="number" min="1" name="price" class="form-control" required /></td>
                </tr>

                <tr>
                    <td>Описание</td>
                    <td><textarea name="description" class="form-control" required></textarea></td>
                </tr>

                <!-- Список выбора категории -->
                <tr>
                    <td>Категория</td>
                    <td>` + categories_options_html + `</td>
                </tr>

                <!-- Кнопка отправки формы -->
                <tr>
                    <td></td>
                    <td>
                        <button type="submit" class="btn btn-read">
                            <span class="glyphicon glyphicon-plus"></span> Создать товар
                        </button>
                    </td>
                </tr>

            </table>
        </form>`;

    document.querySelector("#page-content").innerHTML = create_product_html;

    // Изменяем тайтл
    changePageTitle("Создание товара");
}

// Вместо $(document).on("submit", ...)
addEventListener(document, "submit", async function(event) {
    const formElement = event.target; // Получаем элемент формы
    const formData = new FormData(formElement); // Создаем объект FormData

    // Логируем данные формы
    for (let pair of formData.entries()) {
        console.log(`${pair[0]}: ${pair[1]}`);
    }
    // Преобразуем FormData в обычный объект
    const plainObject = Object.fromEntries(formData.entries());

    // Преобразуем объект в JSON
    const jsonData = JSON.stringify(plainObject);

    // Выводим JSON-данные в консоль
    console.log(jsonData);

    // Отправляем данные формы в API
    try {
        const response = await fetch('http://mytravel-aristov-altunin/shop/api/product/create.php', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json' // Важно изменить Content-Type!
            },
            body: jsonData
        });
        
        if (!response.ok) {
            const text = await response.text();
            console.log(text);
            throw new Error(`Network response was not ok: ${response.status}`);
        }

        const result = await response.json(); // Если ответ приходит в формате JSON
        console.log(result);
    } catch (error) {
        console.error('There has been a problem with your fetch operation:', error);
    }

    return false;
}, "#create-product-form");