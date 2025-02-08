// HTML приложения
let app_html = `
    <div class="container">
        <div class="page-header">
            <h1 id="page-title">Все товары</h1>
        </div>

        <!-- Здесь будет показано содержимое страницы -->
        <div id="page-content"></div>
    </div>`;

// Вставка кода на страницу
document.querySelector("#app").innerHTML = app_html;

// Изменение заголовка страницы
function changePageTitle(page_title) {

    // Изменение заголовка страницы
    document.querySelector("#page-title").textContent = page_title;

    // Изменение заголовка вкладки браузера
    document.title = page_title;
}

// Функция для создания значений формы в формате json
// пака отсутствует


function addEventListener(el, eventName, eventHandler, selector) {
    if (selector) {
      const wrappedHandler = (e) => {
        if (!e.target) return;
        const el = e.target.closest(selector);
        if (el) {
          eventHandler.call(el, e);
        }
      };
      el.addEventListener(eventName, wrappedHandler);
      return wrappedHandler;
    } else {
      const wrappedHandler = (e) => {
        eventHandler.call(el, e);
      };
      el.addEventListener(eventName, wrappedHandler);
      return wrappedHandler;
    }
}