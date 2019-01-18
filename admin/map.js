window.onload = () =>{
  console.log(place);
  let city = document.getElementById("city");
  let street = document.getElementById("street");
  let home = document.getElementById("home");

  // Функция ymaps.ready() будет вызвана, когда
    // загрузятся все компоненты API, а также когда будет готово DOM-дерево.
    function init() {
      let myMap = new ymaps.Map('map', {
          center: [55.74, 37.58],
          zoom: 4,
          controls: []
      }),
      objectManager = new ymaps.ObjectManager({
        // Чтобы метки начали кластеризоваться, выставляем опцию.
        clusterize: true,
        // ObjectManager принимает те же опции, что и кластеризатор.
        gridSize: 32,
        clusterDisableClickZoom: true
    });

      

      let getArrayPoint = (arrPlace) => {
        let arrCoordinates = [];
        for(i in arrPlace){
          ymaps.geocode(arrPlace[i]).then(res => {
            let coordinates = res.geoObjects.get(0).geometry.getCoordinates();
            arrCoordinates.push(coordinates);
            localStorage.setItem("coordinates", JSON.stringify(arrCoordinates));
          });
        }
        return JSON.parse(localStorage.getItem("coordinates"));
      }
      // place = ["Москва", "Санкт-Петербург", "Нижний Новгород"];
      
      // console.log(getArrayPoint(place));

      let arrayPoint = getArrayPoint(place);

      // let geo = ymaps.geocode("Нижний Новгород");

      let addPoint = (arrayPoint) =>{
        let arrData = {type: "FeatureCollection", features: []};
        for (i in arrayPoint){
          let obj = {type: "Feature", id: i, geometry: {type: "Point", coordinates: arrayPoint[i]}}
          // console.log(JSON.stringify(obj));
          arrData.features.push(obj);
        }
        console.log(arrData);
        return JSON.stringify(arrData);

      }

      addPoint(getArrayPoint(place));

      objectManager.add(addPoint(getArrayPoint(place)));

      // geo.then(res => {
      //   console.log(res.geoObjects.get(0).geometry.getCoordinates());
      // });
      
      // Создадим экземпляр элемента управления «поиск по карте»
      // с установленной опцией провайдера данных для поиска по организациям.
      // let searchControl = new ymaps.control.SearchControl({
      //     options: {
      //         provider: 'yandex#map',
      //         noPopup: true,
      //         noSuggestPanel: true,
      //         noPlacemark: true
      //     }
      // });

      // let myPlacemark = new ymaps.GeoObject({
      //   geometry: {
      //       type: "Point",
      //       coordinates: [55.76, 37.56]
      //   }
      // });

      
      // myMap.controls.add(searchControl);
      // var myPlacemark = new ymaps.Placemark([55.8, 37.6], [50.8, 37.6]);
      // myMap.geoObjects.add(myPlacemark); 
      myMap.geoObjects.add(objectManager);
      
      
      // Программно выполним поиск определённых кафе в текущей
      // прямоугольной области карты.
      // searchControl.search(city.innerText+" "+street.innerText+" "+home.innerText);
      // searchControl.search("Нижний Новгород", 1);

      // // Подписка на событие выбора результата поиска.
      // searchControl.events.add('resultselect', function (e) {
      //   // Получает массив результатов.
      //   var results = searchControl.getResultsArray();
      //   // Индекс выбранного объекта.
      //   var selected = e.get('index');
      //   // Получает координаты выбранного объекта.
      //   var point = results[selected].geometry.getCoordinates();
      //   console.log(point);
      // });

  }
  
  ymaps.ready(init);
  
}