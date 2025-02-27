addEventListener(document, "submit", async function(event){

    // Предотвращаем перезагрузку всей страницы
    event.preventDefault()

    // Получаем ключевые слова для поиска
    const keywords = val(document.querySelector("input[name='keywords']"));
    try {
        const response = await fetch('http://mytravel-aristov-altunin/shop/api/product/search.php?s=' + keywords);
        const data = await response.json();

        // Шаблон в products.js
        readProductsTemplate(data, keywords);

        // Изменяем title
        changePageTitle("Поиск товаров: " + keywords);
    } catch (error) {
        console.error('Ошибка при выполнении запроса:', error);
    }
    return false;

}, "#search-product-form")