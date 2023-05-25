<?php
  include 'testasessao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Monster Machine</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../assets/vendors/fontawesome-free/css/fontawesome.min.css"> 
    <link rel="stylesheet" href="../assets/vendors/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="../assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="../assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../assets/images/favicon.png" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
          <a class="sidebar-brand brand-logo" href="#"><img src="../assets/images/logo.svg" alt="logo" /></a>
          <a class="sidebar-brand brand-logo-mini" href="#"><img src="../assets/images/logo-mini.svg" alt="logo" /></a>
        </div>
        <ul class="nav">
          <li class="nav-item menu-items">
            <a class="nav-link" href="../aluno.php">
              <span class="menu-icon">
                <i class="fa-solid fa-house"></i>
              </span>
              <span class="menu-title">Início</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="minhaficha.php">
              <span class="menu-icon">
                <i class="fa-solid fa-clipboard-list"></i>
              </span>
              <span class="menu-title">Minha Ficha</span>
            </a>
          </li>
          <li class="nav-item menu-items active">
            <a class="nav-link" href="#">
              <span class="menu-icon">
                <i class="fa-solid fa-ruler"></i>
              </span>
              <span class="menu-title">Minha Avaliação</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="../essenciais/sair.php">
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
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-12">
                        <div class="d-sm-flex justify-content-between">
                          <?php include_once '../essenciais/voltar.php';?>
                        </div>
                        <h3 class="card-title text-center">MINHA AVALIAÇÃO</h3>
                        <form action="">
                          <h4 class="text-center mb-3">Informações iniciais</h4>
                          <div class="mb-3">
                            <div class="row">
                              <div class="col-6">
                                <div class="form-group">
                                  <label for="nomeAluno">Nome:</label>
                                  <input class="form-control" type="text" id="nomeAluno" name="nomeAluno" readonly>
                                </div>
                              </div>
                              <div class="col-6">
                                <div class="form-group">
                                  <label for="nomeEdu">Educador:</label>
                                  <input class="form-control" type="text" id="nomeEdu" name="nomeEdu" readonly>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="mb-3">
                            <div class="row">
                              <div class="col-4">
                                <div class="form-group">
                                  <label for="grupo">Foco (Grupo Muscular):</label>
                                  <input class="form-control" type="text" id="grupo" name="grupo" readonly>
                                </div>
                              </div>
                              <div class="col-4">
                                <div class="form-group">
                                  <label for="dataAva">Data da Avaliação:</label>
                                  <input class="form-control" type="date" id="dataAva" name="dataAva" readonly>
                                </div>
                              </div>
                              <div class="col-4">
                                <div class="form-group">
                                  <label for="horaAva">Hora da Avaliação:</label>
                                  <input class="form-control" type="date" id="horaAva" name="horaAva" readonly>
                                </div>
                              </div>
                            </div>
                          </div>
                          <h4 class="text-center mb-3">Medidas</h4>
                          <div class="mb-3">
                            <div class="row">
                              <div class="col-6">
                                <div class="form-group">
                                  <label for="medBraco">Braço:</label>
                                  <input type="text" class="form-control" id="medBraco" name="medBraco" readonly>
                                </div>
                              </div>
                              <div class="col-6">
                                <div class="form-group">
                                  <label for="medAntebraco">Antebraço:</label>
                                  <input type="text" class="form-control" id="medAntebraco" name="medAntebraco" readonly>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="mb-3">
                            <div class="row">
                              <div class="col-6">
                                <div class="form-group">
                                  <label for="medCoxa">Coxa:</label>
                                  <input type="text" class="form-control" id="medCoxa" name="medCoxa" readonly>
                                </div>
                              </div>
                              <div class="col-6">
                                <div class="form-group">
                                  <label for="medPanturrilha">Panturrilha:</label>
                                  <input type="text" class="form-control" id="medPanturrilha" name="medPanturrilha" readonly>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="mb-3">
                            <div class="row">
                              <div class="col-12">
                                <label for="objetivo">Objetivo:</label>
                                <textarea name="objetivo" id="objetivo" cols="30" rows="10" class="form-control" readonly></textarea>
                              </div>
                            </div>
                          </div>
                        </form>
                      </div> 
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
    <script src="../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../assets/js/off-canvas.js"></script>
    <script src="../assets/js/hoverable-collapse.js"></script>
    <script src="../assets/js/misc.js"></script>
    <script src="../assets/js/settings.js"></script>
    <script src="../assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="../assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>