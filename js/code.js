
function login(){
    var login = document.getElementById("login").value;
    var password = document.getElementById("senha").value;
    if(login=="master" && password == "master"){
        alert("Login Efetuado");
        window.open("./rastreador.html");
    }else{
        window.location.reload();
    }
}
function inicializar() {
    var coordenadas = {lat: -22.899641, lng: -43.178328};

    var mapa = new google.maps.Map(document.getElementById('mapa'), {
      zoom: 15,
      center: coordenadas 
    });

    var marker = new google.maps.Marker({
      position: coordenadas,
      map: mapa,
      title: 'Rastreador'
    });
  }


  function dispositivo(a, b){
    var coordenadas = {lat:a , lng: b};

    var mapa = new google.maps.Map(document.getElementById('mapa'), {
      zoom: 15,
      center: coordenadas 
    });

    var marker = new google.maps.Marker({
      position: coordenadas,
      map: mapa,
      
    });

  }

  function dispositivo2(){
    var coordenadas = {lat:-22.824751 , lng: -43.013808};

    var mapa = new google.maps.Map(document.getElementById('mapa'), {
      zoom: 15,
      center: coordenadas 
    });

    var marker = new google.maps.Marker({
      position: coordenadas,
      map: mapa,
      title: 'Dispositivo 2'
    });

  }

  function dispositivo3(){
    var coordenadas = {lat:-22.804951 , lng: -43.011408};

    var mapa = new google.maps.Map(document.getElementById('mapa'), {
      zoom: 15,
      center: coordenadas 
    });

    var marker = new google.maps.Marker({
      position: coordenadas,
      map: mapa,
      title: 'Dispositivo 3'
    });

  }

