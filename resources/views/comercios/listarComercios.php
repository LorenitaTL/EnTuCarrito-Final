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

    .center-img {
      display: block;
      height: 150px;
      align-content: center;
      margin-left: auto;
      margin-right: auto;
    }

    .card-comercio {
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
      transition: 0.3s;
      width: 40%;
      border-radius: 5px;
    }

    .card-body h5 {
      color: grey;
    }

    .details {
      background-color: #ffbe00 !important;
    }

    .details h4 {
      color: antiquewhite;
    }

    .details h6 {
      color: #fae9bb;
    }

    .detalles h6 {
      color: #474747;
    }

    .details p {
      color: #474747;
    }

    .flip-box {
      background-color: transparent;
      width: 300px;
      height: 250px;

      perspective: 1000px;
    }

    .flip-box-inner {
      position: relative;
      width: 100%;
      height: 100%;
      text-align: center;
      transition: transform 0.8s;
      transform-style: preserve-3d;
    }

    .flip-box:hover .flip-box-inner {
      transform: rotateY(180deg);
    }

    .flip-box-front,
    .flip-box-back {
      position: absolute;
      width: 100%;
      /*height: 100%;*/
      -webkit-backface-visibility: hidden;
      backface-visibility: hidden;
    }

    .flip-box-front {
      background-color: #bbb;
      color: black;
    }

    .flip-box-back {
      background-color: #555;
      color: white;
      transform: rotateY(180deg);
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
  <div class="container-fluid">

    <section id="comercios" class="">
      <div class=" align-items-center">
        <div class="row">
          <div class="col text-center ">
            <h3 class="text-uppercase">
              Lista de comercios
            </h3>
            <small class="font-italic">*Estamos trabajando en mejorar la visualización de los comercios</small>
          </div>
        </div>
        <!--<a href="<?= URL::to("comercios/form/crear") ?>" class="btn btn-primary">Crear comercio</a>-->

        <div class="row  list-wrapper" id="">
          <div class="flip-box col-lg-3">
            <div class="flip-box-inner">
              <div class="flip-box-front">
                <img src="https://i.pinimg.com/originals/59/b6/ce/59b6cedf42ec3367caa5a14df7013496.jpg" alt="Paris" style="width:300px;height:200px">
                <h5>Nombre del comercio</h5>
              </div>
              <div class="flip-box-back">
                <h2>Paris</h2>
                <p>What an amazing city</p>
              </div>
            </div>
          </div>
          <div class="flip-box col-lg-3 ">
            <div class="flip-box-inner">
              <div class="flip-box-front">
                <div><img src="https://www.dondeir.com/wp-content/uploads/2017/03/buffet-de-pizzas-en-cdmx-como-todo-que-puedas-por-149-pesos-3.jpg" alt="Paris" style="width:300px;height:200px">
                  <h5>Nombre</h5>
                </div>
              </div>
              <div class="flip-box-back">
                <h2>Paris</h2>
                <p>What an amazing city</p>
              </div>
            </div>
          </div>

          <div class="flip-box col-lg-3 ">
            <div class="flip-box-inner">
              <div class="flip-box-front">
                <img src="https://e00-expansion.uecdn.es/assets/multimedia/imagenes/2019/06/25/15614775255199.jpg" alt="Paris" style="width:300px;height:200px">
                <h5>Nombre del comercio</h5>
              </div>
              <div class="flip-box-back">
                <h2>Paris</h2>
                <p>What an amazing city</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis quidem repellat fugiat itaque recusandae modi ex dolorum? Perferendis sapiente ipsam cupiditate? Unde, animi laboriosam. Animi debitis fugiat quos voluptate sunt? Lorem ipsum, dolor sit amet consectetur adipisicing elit. Excepturi consequuntur delectus cumque porro doloribus saepe harum libero iusto adipisci doloremque, cum at itaque ut quod eaque tempora reprehenderit numquam nisi?</p>
              </div>
            </div>
          </div>

          <div class="flip-box col-lg-3">
            <div class="flip-box-inner">
              <div class="flip-box-front">
                <img src="https://blog.monouso.es/wp-content/uploads/materiales-para-una-heladeria2-1024x536.jpg" alt="Paris" style="width:300px;height:200px">
                <h5>Nombre del comercio</h5>
              </div>
              <div class="flip-box-back">
                <h2>Paris</h2>
                <p>What an amazing city</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis quidem repellat fugiat itaque recusandae modi ex dolorum? Perferendis sapiente ipsam cupiditate? Unde, animi laboriosam. Animi debitis fugiat quos voluptate sunt? Lorem ipsum, dolor sit amet consectetur adipisicing elit. Excepturi consequuntur delectus cumque porro doloribus saepe harum libero iusto adipisci doloremque, cum at itaque ut quod eaque tempora reprehenderit numquam nisi?</p>
              </div>
            </div>
          </div>

          <!--<div class="flip-box col-lg">
            <div class="flip-box-inner">
              <div class="flip-box-front">
                <div class="card text-white bg-primary">
                  <img class="card-img-top" src="https://blog.monouso.es/wp-content/uploads/materiales-para-una-heladeria2-1024x536.jpg" alt="">
                  <div class="card-body">
                    <h4 class="card-title">Title</h4>
                    <p class="card-text">Text</p>
                  </div>
                </div>

              </div>
              <div class="flip-box-back">
                <div class="card text-white bg-info">
                  <img class="card-img-top" src="https://blog.monouso.es/wp-content/uploads/materiales-para-una-heladeria2-1024x536.jpg" alt="">
                  <div class="card-body">
                    <h4 class="card-title">Title</h4>
                    <p class="card-text">Text</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="flip-box col-lg">
            <div class="flip-box-inner">
              <div class="flip-box-front">
                <div class="card text-white bg-primary">
                  <img class="card-img-top" src="https://blog.monouso.es/wp-content/uploads/materiales-para-una-heladeria2-1024x536.jpg" alt="">
                  <div class="card-body">
                    <h4 class="card-title">Title</h4>
                    <p class="card-text">Text</p>
                  </div>
                </div>

              </div>
              <div class="flip-box-back">
                <div class="card text-white bg-info">
                  <img class="card-img-top" src="https://blog.monouso.es/wp-content/uploads/materiales-para-una-heladeria2-1024x536.jpg" alt="">
                  <div class="card-body">
                    <h4 class="card-title">Title</h4>
                    <p class="card-text">Text</p>
                  </div>
                </div>
              </div>
            </div>
          </div>-->

          <!--<div class="col-lg m-2 p-0 card shadow details">
            <img class="card-img-top" src="https://blog.monouso.es/wp-content/uploads/materiales-para-una-heladeria2-1024x536.jpg" alt="Card image" style="width:100%; object-fit: fit;">
            <div class="card-body ">
              <h4 class="card-title">John Doe</h4>
              <h6 class="text-muted"><span class="badge badge bg-light shadow-lg">Categoría: Tacos</span></h6>
              <h6 class="text-muted"><span class="badge badge bg-light shadow-lg">Horario: 5:00 - 8:00 p.m.</span></h6>
              <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
              <a href="" class="text-light" data-toggle="collapse" data-target="#detalles2">Mostrar/Ocultar detalles</a>
                <div id="detalles2" class="collapse detalles">
                <hr>
                <h6>Teléfono: <small>'+obj.telefono_1+'</small></h6>
                <h6>Teléfono 2: <small>'+obj.telefono_2+'</small></h6>
                <h6>Disponibilidad: <small>'+obj.disponibilidad+'</small></h6>
                <h6>Dirección: <small>'+obj.direccion+'</small></h6>
                </div>
            </div>
          </div>

          
          <div class="col-lg m-2 p-0 card shadow details">
            <img class="card-img-top" src="https://e00-expansion.uecdn.es/assets/multimedia/imagenes/2019/06/25/15614775255199.jpg" alt="Card image" style="width:100%; object-fit: fit;">
            <div class="card-body ">
              <h4 class="card-title">John Doe</h4>
              <h6 class="text-muted"><span class="badge badge bg-light shadow-lg">Categoría: Tacos</span></h6>
              <h6 class="text-muted"><span class="badge badge bg-light shadow-lg">Horario: 5:00 - 8:00 p.m.</span></h6>
              <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
            </div>
          </div>

          <div class="col-lg m-2 p-0 card shadow details">
            <img class="card-img-top" src="https://www.dondeir.com/wp-content/uploads/2017/03/buffet-de-pizzas-en-cdmx-como-todo-que-puedas-por-149-pesos-3.jpg" alt="Card image" style="width:100%; object-fit: fit;">
            <div class="card-body">
              <h4 class="card-title">John Doe</h4>
              <h6 class="text-muted"><span class="badge badge bg-light shadow-lg">Categoría: Tacos</span></h6>
              <h6 class="text-muted"><span class="badge badge bg-light shadow-lg">Horario: 5:00 - 8:00 p.m.</span></h6>
              <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
            </div>
          </div>

          <div class="col-lg m-2 p-0 card shadow details">
            <img class="card-img-top" src="https://blog.monouso.es/wp-content/uploads/materiales-para-una-heladeria2-1024x536.jpg" alt="Card image" style="width:100%; object-fit: fit;">
            <div class="card-body ">
              <h4 class="card-title">John Doe</h4>
              <h6 class="text-muted"><span class="badge badge bg-light shadow-lg">Categoría: Tacos</span></h6>
              <h6 class="text-muted"><span class="badge badge bg-light shadow-lg">Horario: 5:00 - 8:00 p.m.</span></h6>
              <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
              <a href="" class="text-light" data-toggle="collapse" data-target="#detalles2">Mostrar/Ocultar detalles</a>
                <div id="detalles2" class="collapse detalles">
                <hr>
                <h6>Teléfono: <small>'+obj.telefono_1+'</small></h6>
                <h6>Teléfono 2: <small>'+obj.telefono_2+'</small></h6>
                <h6>Disponibilidad: <small>'+obj.disponibilidad+'</small></h6>
                <h6>Dirección: <small>'+obj.direccion+'</small></h6>
                </div>
            </div>
          </div>

          <div class="col-sm m-2 p-0 card shadow details box list-item '+obj.categoria+'">
            <img class="card-img-top" src="http://www.entucarrito.com/assets/images/FOTOS/'+obj.nombre+'/1.jpg" alt="Card image" style="width:100%; object-fit: fit;">
            <div class="card-body">
              <h4 class="card-title">'+obj.nombre+'</h4>
              <h6 class="text-muted"><span class="badge badge bg-light shadow-lg">Categoría: '+obj.categoria+'</span></h6>
              <h6 class="text-muted"><span class="badge badge bg-light shadow-lg">Horario: '+obj.horario+'</span></h6>
              <p class="card-text">'+obj.descripcion+'</p>
              <a href="" class="text-light" data-toggle="collapse" data-target="#detalles">Mostrar/Ocultar detalles</a>
                <div id="detalles'+obj.id_comercio+'" class="collapse detalles">
                <hr>
                <h6>Teléfono: <small>'+obj.telefono_1+'</small></h6>
                <h6>Teléfono 2: <small>'+obj.telefono_2+'</small></h6>
                <h6>Disponibilidad: <small>'+obj.disponibilidad+'</small></h6>
                <h6>Dirección: <small>'+obj.direccion+'</small></h6>
                </div>
            </div>
          </div>-->
        </div>
        <div class="row pb-4 pt-4 list-wrapper d-flex justify-content-center" id="prueba">

        </div>

      </div>
    </section>
    <div class="container" id="page">

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