<?php
  include 'banco.php';
  include 'testasessao.php';

  //Pegando o id da tabela de avaliação
  $sqlava = "SELECT idava AS idavaliacao, MAX(datava) AS dataava FROM tbavaliacao WHERE idaluno = ".$_SESSION['aluno'];

  $consultaava = $conexao -> query($sqlava);
  $linhaava = $consultaava -> fetch_array(MYSQLI_ASSOC);
  $_SESSION['idava'] = $linhaava['idavaliacao'];

  //Pegando o id da tabela de ficha
  $sqlficha = "SELECT idficha AS idficha FROM tbficha WHERE idava = ".$linhaava['idavaliacao'];

  $consultaficha = $conexao -> query($sqlficha);
  $linhaficha = $consultaficha -> fetch_array(MYSQLI_ASSOC);
  $_SESSION['idficha'] = $linhaficha['idficha'];
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Monster Machine</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/fontawesome-free/css/fontawesome.min.css"> 
    <link rel="stylesheet" href="assets/vendors/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
          <a class="sidebar-brand brand-logo" href="#"><img src="assets/images/logo.svg" alt="logo" /></a>
          <a class="sidebar-brand brand-logo-mini" href="#"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
        </div>
        <ul class="nav">
          <li class="nav-item menu-items active">
            <a class="nav-link" href="#">
              <span class="menu-icon">
                <i class="fa-solid fa-house"></i>
              </span>
              <span class="menu-title">Início</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="aluno/minhaficha.php">
              <span class="menu-icon">
                <i class="fa-solid fa-clipboard-list"></i>
              </span>
              <span class="menu-title">Minha Ficha</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="aluno/minhaava.php">
              <span class="menu-icon">
                <i class="fa-solid fa-ruler"></i>
              </span>
              <span class="menu-title">Minha Avaliação</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="essenciais/sair.php">
              <span class="menu-icon">
                <i class="fa-solid fa-right-from-bracket"></i>
              </span>
              <span class="menu-title">Sair</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar p-0 fixed-top d-flex flex-row">
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <i class="fa-solid fa-bars"></i>
          </button>
          <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <i class="fa-solid fa-bars"></i>
            </button>
          </div>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h3 class="card-title text-center">SEU TREINO DIÁRIO!</h3>
                    <div class="table-responsive">
                      <table class="table text-center">
                        <thead>
                          <tr>
                            <th>EXERCÍCIO</th>
                            <th>SÉRIES</th>
                            <th>REPETIÇÕES</th>
                            <th>TIPO DE TREINO</th>
                            <th>VISUALIZAR</th>
                          </tr>
                        </thead>
                        <tbody id="corpoTabela">
                          
                        </tbody>
                      </table>
                      <div class="text-center"><button class="btn btn-success" id="marcarConcluido">Marcar como concluído</button></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->

    <script>
      let controle = "pesquisa";
      $.post("aluno/treinodiario.php", {controle:controle}, function(retorno){
        $('#corpoTabela').html(retorno);
        $('#marcarConcluido').click(function(){
          controle = "concluido";
          $.post("aluno/treinodiario.php", {controle:controle}, function(retorno2){
            
          })
        })
      })
    </script>
  </body>
</html>