(function () { //ES PARA VER Q PRIMERO SE CARGUE TODO EL HTML
  "use strict";



  document.addEventListener("DOMContentLoaded", function () {

    //Campos datos usuarios

    var nombre = document.getElementById("nombre");
    var apellido = document.getElementById("apellido");
    var email = document.getElementById("email");

    console.log("ESTOY CARGANDO");

    //Campos pases

    var pase_dia = document.getElementById("pase_dia");
    var pase_completo = document.getElementById("pase_completo");
    var pase_dosdias = document.getElementById("pase_dosdias");

    //Botones y divs

    var calcular = document.getElementById("calcular");
    var errorDiv = document.getElementById("error");
    var botonRegistro = document.getElementById("btnRegistro");
    var lista_productos = document.getElementById("lista-productos");
    var suma = document.getElementById("suma-total");

    //Extras
    var regalo = document.getElementById("regalo");
    var etiquetas = document.getElementById("etiquetas");
    var camisas = document.getElementById("camisa_evento");

    botonRegistro.disabled = true;
    botonRegistro.classList.add("opacarBoton");


    if (calcular) { //SI EXISTE LO CREO
      calcular.addEventListener("click", calcularMontos);
    }

    if (pase_dia) {
      pase_dia.addEventListener("blur", mostrarDias);
    }

    if (pase_completo) {
      pase_completo.addEventListener("blur", mostrarDias);
    }

    if (pase_dosdias) {
      pase_dosdias.addEventListener("blur", mostrarDias);
    }

    if (nombre) {
      nombre.addEventListener("blur", validarCampos);
    }

    if (apellido) {
      apellido.addEventListener("blur", validarCampos);
    }

    if (email) {
      email.addEventListener("blur", validarCampos);
    }

    if (email) {
      email.addEventListener("blur", validarMail);
    }

    function validarCampos() {
      if (this.value == "") {
        errorDiv.style.display = "block";
        errorDiv.innerHTML = "Este campo es obligatorio";
        this.style.border = '1px solid red';
        errorDiv.style.border = "1px solid red";
      } else {
        errorDiv.style.display = "none";
        this.style.border = "1px solid #cccccc";
      }
    }

    function validarMail() {
      if (this.value.indexOf("@") > -1) { //SI NO ENCUENTRA @ ENTONCES DEVUELVE -1
        errorDiv.style.display = "none";
        this.style.border = "1px solid #cccccc";
      } else {
        errorDiv.style.display = "block";
        errorDiv.innerHTML = "Debe tener al menos una @";
        this.style.border = '1px solid red';
        errorDiv.style.border = "1px solid red";
      }
    }


    function calcularMontos(event) {
      event.preventDefault();
      if (regalo.value == '') {
        alert("Debes elegir un regalo");
        regalo.focus();
      } else {
        var boletosDia = parseInt(pase_dia.value, 10) || 0, //el 10 ES SISTEMA DECIMAL
          boletos2Dias = parseInt(pase_dosdias.value, 10) || 0,
          boletoCompleto = parseInt(pase_completo.value, 10) || 0,
          cantCamisas = parseInt(camisas.value, 10) || 0,
          cantEtiquetas = parseInt(etiquetas.value, 10) || 0;

        var totalPagar = (boletosDia * 30) + (boletos2Dias * 45) + (boletoCompleto * 50) + ((cantCamisas * 10) * .93) + (cantEtiquetas * 2);

        var listadoProductos = [];

        if (boletosDia >= 1) {
          listadoProductos.push(boletosDia + ' Pases por día');
        }

        if (boletos2Dias >= 1) {
          listadoProductos.push(boletos2Dias + ' Pases por 2 días');
        }

        if (boletoCompleto >= 1) {
          listadoProductos.push(boletoCompleto + ' Pases completos');
        }

        if (cantCamisas >= 1) {
          listadoProductos.push(cantCamisas + ' Camisas');
        }

        if (cantEtiquetas >= 1) {
          listadoProductos.push(cantEtiquetas + " Etiquetas");
        }

        lista_productos.style.display = "block";
        lista_productos.innerHTML = " "; //es para que no vuelva a escribir lo anterior
        for (var i = 0; i < listadoProductos.length; i++) {
          lista_productos.innerHTML += listadoProductos[i] + "<br/>";
        }

        suma.innerHTML = "$ " + totalPagar.toFixed(2); //2 decimales

        document.getElementById("btnRegistro").disabled = false;
        botonRegistro.classList.remove("opacarBoton");
        document.getElementById('total_pedido').value = totalPagar;
      }
    }

    function mostrarDias() { //HECHO POR MI

      console.log("LLEGO ACA");

      var boletosDia = parseInt(pase_dia.value, 10) || 0, //el 10 ES SISTEMA DECIMAL
        boletos2Dias = parseInt(pase_dosdias.value, 10) || 0,
        boletoCompleto = parseInt(pase_completo.value, 10) || 0;

      if (boletosDia > 0) {
        document.getElementById("viernes").style.display = "block";
      }

      if (boletos2Dias > 0) {
        document.getElementById("viernes").style.display = "block";
        document.getElementById("sabado").style.display = "block";
      }

      if (boletoCompleto > 0) {
        document.getElementById("viernes").style.display = "block";
        document.getElementById("sabado").style.display = "block";
        document.getElementById("domingo").style.display = "block";
      }

      if (boletoCompleto == 0 && boletosDia > 0 && boletos2Dias == 0) {
        document.getElementById("sabado").style.display = "none";
        document.getElementById("domingo").style.display = "none";
      }

      if (boletoCompleto == 0 && boletosDia == 0 && boletos2Dias > 0) {
        document.getElementById("domingo").style.display = "none";
      }

      if (boletosDia == 0 && boletos2Dias == 0 && boletoCompleto == 0) {
        document.getElementById("viernes").style.display = "none";
        document.getElementById("sabado").style.display = "none";
        document.getElementById("domingo").style.display = "none";
      }

      /*

            var diasElegidos = [];

            if (boletosDia > 0) {
              diasElegidos.push("viernes");
            }
            if (boletos2Dias > 0) {
              diasElegidos.push("viernes", "sabado");
            }
            if (boletoCompleto > 0) {
              diasElegidos.push("viernes", "sabado", "domingo");
              console.log(diasElegidos);
            }
            for (var i = 0; i < diasElegidos.length; i++) {
              document.getElementById(diasElegidos[i]).style.display = "block";
            }

            if (diasElegidos.length == 0) {
              var noElegidos = document.getElementsByClassName("contenido-dia");
              for (var i = 0; i < noElegidos.length; i++) {
                noElegidos[i].style.display = "none";
              }
            }
      */
    }

    console.log("lei todo el codigO");
  }); //DOM CONTENT LOADED
})();


$(function () {

  //Agregar clase a menú

  $('body.conferencia .navegacion a:contains("Conferencia")').addClass('activo2');
  $('body.calendario .navegacion a:contains("Calendario")').addClass('activo2');
  $('body.invitados .navegacion a:contains("Invitados")').addClass('activo2');
  $('body.registro .navegacion a:contains("Reservaciones")').addClass('activo2');

  //LETTERING SE PUEDE APLICAR A CUALQUIER TEXTO

  $(".nombre-sitio").lettering();

  //MENU FIJO

  var windowHeight = $(window).height(); //dice la altura de la ventana
  var barraAltura = $('.barra').innerHeight();

  $(window).scroll(function () {
    var scroll = $(window).scrollTop();
    if (scroll > windowHeight) {
      $('.barra').addClass("fixed");
      $('body').css({
        "margin-top": barraAltura + 'px'
      });
    } else {
      $('.barra').removeClass("fixed");
      $('body').css({
        "margin-top": "0px"
      });
    }
  });

  //MENU Responsive

  $('.menu-movil').on("click", function () {
    $('.navegacion').slideToggle();
  });



  //PROGRAMA DE CONFERENCIAS

  $('.programa-evento .info-curso:first').show();
  $(".menu-programa a:first").addClass("activo");

  $(".menu-programa a").on("click", function () {
    $('.ocultar').hide();
    $('.menu-programa a').removeClass("activo");
    var enlace = $(this).attr("href");
    $(enlace).fadeIn(1000);
    $(this).addClass("activo");

    return false;
  });

  //ANIMACIONES PARA LOS NUMEROS

  let scrollVertical = 0;
  let i = 0;

  $(window).scroll(function () {

    scrollVertical = window.scrollY;

    if (scrollVertical >= 2600 && i == 00) {

      $('.resumen-evento li:nth-child(1) p').animateNumber({
        number: 6
      }, 1500); //1500 es el tiempo q tarda la animación

      $('.resumen-evento li:nth-child(2) p').animateNumber({
        number: 15
      }, 1500); //1500 es el tiempo q tarda la animación

      $('.resumen-evento li:nth-child(3) p').animateNumber({
        number: 3
      }, 1500); //1500 es el tiempo q tarda la animación

      $('.resumen-evento li:nth-child(4) p').animateNumber({
        number: 9
      }, 1500); //1500 es el tiempo q tarda la animación

      i = 1;
      console.log(scrollVertical);
    }
  });

  //Cuenta Regresiva

  $('.cuenta').countdown('2020/11/10 10:00:00', function (event) {

    $('#dias').html(event.strftime('%D'));
    $('#horas').html(event.strftime('%H'));
    $('#minutos').html(event.strftime('%M'));
    $('#segundos').html(event.strftime('%S'));
  });

  // Colorbox

  $('.invitado-info').colorbox({
    inline: true,
    width: "50%"
  });



  var map = L.map('mapa').setView([-34.615745, -58.576097], 16);

  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
  }).addTo(map);

  L.marker([-34.615745, -58.576097]).addTo(map)
    .bindPopup('SE VENDE DE LA BUENA ACÁ NDEA')
    .openPopup();




});
