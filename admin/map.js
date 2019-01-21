window.onload = () =>{
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
        //Принимает массив адресов юзеров из БД, а возвращает массив координат
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

      // let arrayPoint = getArrayPoint(place);

      let addPoint = (arrayPoint) =>{
        //Формирование JSON для метода objectManager.add
        let arrData = {type: "FeatureCollection", features: []};
        for (i in arrayPoint){
          let obj = {type: "Feature", id: i, geometry: {type: "Point", coordinates: arrayPoint[i]}}
          arrData.features.push(obj);
        }
        console.log(arrData);
        return JSON.stringify(arrData);

      }

      addPoint(getArrayPoint(place));

      objectManager.add(addPoint(getArrayPoint(place)));

      myMap.geoObjects.add(objectManager);
      
  }
  
  ymaps.ready(init);
  
}