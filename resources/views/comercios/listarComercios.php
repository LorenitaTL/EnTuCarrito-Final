<!DOCTYPE html>
<html lang="es">
<?php $categoriaModel = new Categorias();
$lista = $categoriaModel->get();
?>

<head>
  <meta charset="gb18030">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>En Tu Carrito Jerez - Comercios</title>
  <link rel="stylesheet" href="<?= URL::to("assets/bootstrap/css/bootstrap.css") ?>" type="text/css" />
  <!--<link rel="stylesheet" href="<?= URL::to("assets/styles/styles.css") ?>" type="text/css" />-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  <link rel="shortcut icon" type="image/x-icon" href="<?= URL::to("assets/images/EnTuCarritoLogo.jpg") ?>">

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
      border: 2px solid rgb(255, 190, 0);
      outline: 0;
      border-radius: 30px;
    }

    .inpt input {
      background: none;
      border: none;
      outline: 0;
    }

    .inpt span {
      background: none;
      border: none;
      outline: 0;
    }

    .focused-input {
      border-color: white;
      outline: 0;
      outline: thin dotted \9;
      -moz-box-shadow: 0 0 8px white;
      box-shadow: 0 0 2px white !important;
    }


    .simple-pagination ul {
      padding: 0 !important;
      list-style: none !important;
      text-align: center !important;
      margin-left: 10px !important;
    }

    .simple-pagination li {
      display: inline-block !important;
      margin: 2px !important;
    }

    .simple-pagination .current {
      color: #fff !important;
      background-color: #ffbe00 !important;
      /*border-color: rgb(255, 255, 255) !important;*/
      /*border: 1px solid !important;*/
      cursor: pointer !important;
    }

    .simple-pagination li a,
    .simple-pagination li span {
      display: block !important;
      width: 40px !important;
      /*height: 40px !important;*/
      line-height: 40px !important;
      background-color: #fff !important;
      text-align: center !important;

      text-decoration: none !important;
      color: #252525 !important;
      border-radius: 4px !important;
      margin: 5px !important;
      box-shadow: inset 0 5px 10px rgba(0, 0, 0, 0.1), 0 2px 5px rgba(0, 0, 0, 0.5) !important;
      transition: all 1s ease !important;
    }
  </style>
</head>

<body data-urlbase="<?= URL::base() ?>">


  <div class="container-fluid ">
    <div class="container">
      <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-12 align-items-center">
          <img src="<?= URL::to("assets/images/EnTuCarritoLogo.png") ?>" height="100" alt="">
        </div>
        <div class="col-lg-10 col-md-10 col-sm-12 align-items-center">
          <div class="input-group mb-3 mt-3 inpt">
            <input type="text" class="form-control " placeholder="Buscar comercio..." name="search" id="search">
            <div class="input-group-prepend">
              <span class="input-group-text inpt"><i class="fas fa-search"></i></span>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  <div class="container-fluid bg-nav">
    <nav class="navbar navbar-expand-lg navbar-light bg-nav sticky-top">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ">
          <li class="nav-item active">
            <a class="nav-link text-uppercase btns" href="#" id="all">Todos <span class="sr-only"></span></a>
          </li>
          <?php
          for ($i = 0; $i < 9; $i++) {
            echo '
              <li class="nav-item ">
              <a id="' . $lista[$i]->nombre_categoria . '" class="nav-link  btns" href="#">' . $lista[$i]->nombre_categoria . ' <span class="sr-only">(current)</span></a>
            </li>
              ';
          }
          ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Más...
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <?php
              for ($i = 9; $i < count($lista); $i++) {
                echo '
              <a id="' . $lista[$i]->nombre_categoria . '" class="nav-link  btns" href="#">' . $lista[$i]->nombre_categoria . ' <span class="sr-only">(current)</span></a>
            
              ';
              }
              ?>
            </div>
          </li>
        </ul>
      </div>
    </nav>
  </div>
  <div class="container">

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
        <!--<a href="<?= URL::to("comercios/form/crear") ?>" class="btn btn-primary">Crear comercio</a>-->
        <div class="row pb-4 pt-4 list-wrapper" id="prueba">

        </div>

      </div>
    </section>
    <div id="page">

    </div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script>
    $(document).ready(function() {
      var $btns = $('.btns').click(function() {
        if (this.id == 'all') {
          $('#prueba > div').fadeIn(450);
        } else {
          var $el = $('.' + this.id).fadeIn(450);
          $('#prueba > div').not($el).hide();
        }
        $btns.removeClass('active');
        $(this).addClass('active');
      })

      var $search = $("#search").on('input', function() {
        $btns.removeClass('active');
        var matcher = new RegExp($(this).val(), 'gi');
        $('.box').show().not(function() {
          return matcher.test($(this).find('.name, .sku').text())
        }).hide();
      })

      $("btn-hide").click(function() {
        $("p").toggle();
      });
    })
  </script>
  <script src="<?= URL::to("assets/plugins/jquery.js") ?>" type="text/javascript"></script>
  <script src="<?= URL::to("assets/bootstrap/js/bootstrap.min.js") ?>" type="text/javascript"></script>
  <script src="<?= URL::to("assets/js/global/helperForm.js") ?>" type="text/javascript"></script>
  <script src="<?= URL::to("assets/js/global/rutas.api.js") ?>" type="text/javascript"></script>
  <script src="<?= URL::to("assets/js/global/app.global.js") ?>" type="text/javascript"></script>
  <script src="<?= URL::to("assets/js/modulos/lista.comercios.js") ?>" type="text/javascript"></script>
  <script src="<?= URL::to("assets/plugins/simplePagination/jquery.simplePagination.js") ?>" type="text/javascript"></script>

</body>

</html>