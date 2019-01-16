window.onload = () =>{

  let city = document.getElementById("city");
  let street = document.getElementById("street");
  let home = document.getElementById("home");

  // Функция ymaps.ready() будет вызвана, когда
    // загрузятся все компоненты API, а также когда будет готово DOM-дерево.
    function init() {
      let myMap = new ymaps.Map('map', {
          center: [55.74, 37.58],
          zoom: 13,
          controls: []
      });
      
      // Создадим экземпляр элемента управления «поиск по карте»
      // с установленной опцией провайдера данных для поиска по организациям.
      let searchControl = new ymaps.control.SearchControl({
          options: {
              provider: 'yandex#search'
          }
      });
      
      myMap.controls.add(searchControl);
      
      // Программно выполним поиск определённых кафе в текущей
      // прямоугольной области карты.
      searchControl.search(city.innerText+" "+street.innerText+" "+home.innerText);
  }
  
  ymaps.ready(init);
  
}