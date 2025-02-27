addEventListener(document, "click", async function () {
    
    // Получаем ID товара
    const id = this.getAttribute("data-id");

    response = await fetch('http://mytravel-aristov-altunin/shop/api/product/read_one.php?id=' + id);
    data = await response.json();

    // Значения будут использоваться для заполнения нашей формы
    const name = data.name;
    const price = data.price;
    const description = data.description;
    const category_id = data.category_id;
    const category_name = data.category_name;

    // Строим список выбора
    // Перебор полученного списка данных
    let categories_options_html = `<select name="category_id" class="form-control">`;

    response = await fetch('http://mytravel-aristov-altunin/shop/api/category/read.php');
    data = await response.json();

    
    console.log(data.records)

    data.records.forEach((key, val) => {
        if (key.id == category_id) {
            categories_options_html += `<option value="` + key.id + `" selected>` + key.name + `</option>`;
        } else {
            categories_options_html += `<option value="` + key.id + `">` + key.name + `</option>`; 
        }
        console.log(key, val)
    });

    categories_options_html += `</select>`;

    // Сохраним html в переменной «update product»
    let update_product_html = `
    <div id="read-products" class="btn btn-primary pull-right m-b-15px read-products-button">
        <span class="glyphicon glyphicon-list"></span> Все товары
    </div>

    <!-- Построение формы для изменения товара -->
    <!-- Мы используем свойство "required" html5 для предотвращения пустых полей -->
    <form id="update-product-form" action="#" method="post" border="0">
        <table class="table table-hover table-responsive table-bordered">

            <tr>
                <td>Название</td>
                <td><input value=\"` + name + `\" type="text" name="name" class="form-control" required /></td>
            </tr>

            <tr>
                <td>Цена</td>
                <td><input value=\"` + price + `\" type="number" min="1" name="price" class="form-control" required /></td>
            </tr>

            <tr>
                <td>Описание</td>
                <td><textarea name="description" class="form-control" required>` + description + `</textarea></td>
            </tr>

            <tr>
                <td>Категория</td>
                <td>` + categories_options_html + `</td>
            </tr>

            <tr>
                <!-- Скрытый «идентификатор товара, чтобы определить, какую запись удалить -->
                <td><input value=\"` + id + `\" name="id" type="hidden" /></td>

                <!-- Кнопка отправки формы -->
                <td>
                    <button type="submit" class="btn btn-info">
                        <span class="glyphicon glyphicon-edit"></span> Обновить товар
                    </button>
                </td>
            </tr>

        </table>
    </form>
    `;

    // Добавим в «page-content» нашего приложения
    document.querySelector("#page-content").innerHTML = update_product_html;

    // Изменим title страницы
    changePageTitle("Обновление товара");

}, ".update-product-button")

addEventListener(document, "submit", async function (event) {
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
    
    try {
        const response = await fetch('http://mytravel-aristov-altunin/shop/api/product/update.php', {
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
}, "#update-product-form")