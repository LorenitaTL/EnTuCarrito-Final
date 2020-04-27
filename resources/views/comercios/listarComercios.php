<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>En Tu Carrito Jerez - Comercios</title>
  <link rel="stylesheet" href="<?= URL::to("assets/bootstrap/css/bootstrap.css") ?>" type="text/css" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

  <style>
    .bg-nav {
      background-color: rgb(255, 190, 0) !important;
    }

    .nav-item-pers:hover .nav-item-link {
      background-color: rgb(255, 154, 117) !important;
    }

    .bg-input {
      margin-bottom: auto;
      margin-top: auto;
      background-color: white;
      border-radius: 30px;
    }

    .inpt {
      background: none;
      border: 0;
      outline: 0;
    }

    .focused-input {
      border-color: white;
      outline: 0;
      outline: thin dotted \9;
      -moz-box-shadow: 0 0 8px white;
      box-shadow: 0 0 2px white !important;
    }
  </style>
</head>

<body data-urlbase="<?= URL::base() ?>">
<div class="container-fluid bg-nav">
    <div class="container pt-1">
      <div class="row">
        <div class="col-2 ">
          <img src="https://image.freepik.com/vector-gratis/fondo-plantilla-logo_1390-55.jpg" height="50" alt="">
        </div>
        <div class="col-10  bg-input">
          <form action="">
            <div class="row">
              <input class="form-control focused-input inpt col-11" id="search" type="text" placeholder="Buscar...">
              <button class="btn focused-input" type="submit"><i class="fas fa-search"></i></button>
            </div>
          </form>
        </div>
      </div>

    </div>

    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-light bg-nav sticky-top">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link small text-uppercase" href="#">Todos <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item ">
              <a class="nav-link small text-uppercase" href="#">Categoría 1 <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link small text-uppercase" href="#">Categoría 2</a>
            </li>
            <li class="nav-item">
              <a class="nav-link small text-uppercase" href="#">Categoría 3</a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
  </div>
  <div class="container">
  <div class="row">
        <div class="col-md-4">
            <!--<input type="text" id="search" class="form-control" placeholder="Search product by name or sku">-->
        </div>
        <div class="col-md-8">
            <div class="btn-group" role="group" aria-label="Basic example">
                <button type="button" id="all" class="btn btn-success">All</button>
                <button type="button" id="drink" class="btn btn-success">Drink</button>
                <button type="button" id="food" class="btn btn-success">Food</button>
                <button type="button" id="c" class="btn btn-success">C</button>
            </div>
        </div>
    </div>
    <hr>
    <div class="row" id="parent">
        <div class="col-md-2 box drink">
            <center>
                <img src="http://via.placeholder.com/80x80" class="" alt="">
                <p class="name">Pepsi </p>
                <p class="sku">D-1251</p>
                <p>$ 2,410</p>
            </center>
        </div>
        <div class="col-md-2 box drink">
            <center>
                <img src="http://via.placeholder.com/80x80" class="" alt="">
                <p class="name">Cocacola </p>
                <p class="sku">D-1314</p>
                <p>$ 2,410</p>
            </center>
        </div>

        <div class="col-md-2 box drink">
            <center>
                <img src="http://via.placeholder.com/80x80" class="" alt="">
                <p class="name">Mountien Dwe </p>
                <p class="sku">D-458</p>
                <p>$ 2,410</p>
            </center>
        </div>


        <div class="col-md-2 box food">
            <center>
                <img src="http://via.placeholder.com/80x80" class="" alt="">
                <p class="name">Burger </p>
                <p class="sku">F-125</p>
                <p>$ 2,410</p>
            </center>
        </div>

        <div class="col-md-2 box food">
                <center>
                    <img src="http://via.placeholder.com/80x80" class="" alt="">
                    <p class="name">Hot Dog </p>
                    <p class="sku">F-7412</p>
                    <p>$ 2,410</p>
                </center>
            </div>



    </div>
    <section id="comercios" class="mt-4 mb-4">
      <div class="container align-items-center">
        <div class="row">
          <div class="col text-center ">
            <h3 class="text-uppercase">
              Lista de comercios
            </h3>
            <small class="font-italic">*Estamos trabajando en mejorar la visualización de los comercios</small>
          </div>
        </div>
        <a href="<?= URL::to("comercios/form/crear") ?>" class="btn btn-primary">Crear comercio</a>
        <div class="row pb-4 pt-4" id="prueba">
        </div>

      </div>
    </section>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    var $btns = $('.btn').click(function() {
        if (this.id == 'all') {
          $('#parent > div').fadeIn(450);
        } else {
          var $el = $('.' + this.id).fadeIn(450);
          $('#parent > div').not($el).hide();
        }
        $btns.removeClass('active');
        $(this).addClass('active');
      })
    
    var $search = $("#search").on('input',function(){
        $btns.removeClass('active');
        var matcher = new RegExp($(this).val(), 'gi');
        $('.box').show().not(function(){
            return matcher.test($(this).find('.name, .sku').text())
        }).hide();
    })
})
</script>
  <script src="<?= URL::to("assets/plugins/jquery.js") ?>" type="text/javascript"></script>
  <script src="<?= URL::to("assets/bootstrap/js/bootstrap.min.js") ?>" type="text/javascript"></script>
  <script src="<?= URL::to("assets/js/global/helperForm.js") ?>" type="text/javascript"></script>
  <script src="<?= URL::to("assets/js/global/rutas.api.js") ?>" type="text/javascript"></script>
  <script src="<?= URL::to("assets/js/global/app.global.js") ?>" type="text/javascript"></script>
  <script src="<?= URL::to("assets/js/modulos/lista.comercios.js") ?>" type="text/javascript"></script>
</body>

</html>