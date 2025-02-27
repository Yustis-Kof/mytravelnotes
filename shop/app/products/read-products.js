
// Показать список товаров
showProducts();

// При нажатии кнопки
addEventListener(document, "click", () => {
    showProducts();
}, ".read-products-button")

// Функция для показа списка товаров
async function showProducts() {
    const response = await fetch('http://mytravel-aristov-altunin/shop/api/product/read.php');
    const data = await response.json();
    
    // HTML для перечисления товаров
    readProductsTemplate(data, "");

    // Изменяем заголовок страницы
    changePageTitle("Все товары");
}