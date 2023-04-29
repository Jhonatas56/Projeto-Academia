<?php
  include '../../essenciais/testasessao.php';
  include '../../essenciais/banco.php';
  include '../../alterar.php';
  $id = $_GET['id'];
  $sql = "select * from tbaluno where idaluno='$id'";
  $busca = $conexao -> query($sql);
  $linha = $busca -> fetch_array(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Monster Machine</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../assets/vendors/fontawesome-free/css/fontawesome.min.css"> 
    <link rel="stylesheet" href="../../assets/vendors/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../../assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="../../assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../../assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="../../assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../../assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
          <a class="sidebar-brand brand-logo" href="index.html"><img src="../../assets/images/logo.svg" alt="logo" /></a>
          <a class="sidebar-brand brand-logo-mini" href="index.html"><img src="../../assets/images/logo-mini.svg" alt="logo" /></a>
        </div>
        <ul class="nav">
          <li class="nav-item menu-items">
            <a class="nav-link" href="../../admin.php">
              <span class="menu-icon">
              <i class="fa-solid fa-house"></i>
              </span>
              <span class="menu-title">Início</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="../usuario/buscausu.php">
              <span class="menu-icon">
               <i class="fa-solid fa-user"></i>
              </span>
              <span class="menu-title">Usuários</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="buscaaluno.php">
              <span class="menu-icon">
                <i class="fa-solid fa-users"></i>
              </span>
              <span class="menu-title">Alunos</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="#">
              <span class="menu-icon">
                <i class="fa-solid fa-people-group"></i>
              </span>
              <span class="menu-title">Educadores</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="../../essenciais/sair.php">
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
          <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
            <a class="navbar-brand brand-logo-mini" href="index.html"><img src="../../assets/images/logo-mini.svg" alt="logo" /></a>
          </div>
          <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="mdi mdi-menu"></span>
            </button>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-format-line-spacing"></span>
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
                         <a href="principal.php" class="btn btn-md btn-primary"><i class="fa fa-reply"></i>&nbspVoltar</a>
                      </div>
                    <?php
                    if (isset($_GET['update'])){
                      if(($_GET['update'])=='ok'){
                        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Atenção</strong> Aluno alterado com sucesso!
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                      </div>';
                      }
                    }
                    if(isset($_GET['update'])) {
                      if(($_GET['update'])=='erro'){
                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Atenção</strong> Erro ao alterar aluno!
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                      </div>';
                      }
                    }
                ?>

                    <section class="content">
                        <div class="container-fluid">
                            <div class="card card-solid">
                            <div class="card-body">
                                <div class="row">
                                <div class="col-12">
                                    <form action="../../alterar.php?alt=aluno" method="POST">
                                    <h3>Alterar dados do Aluno</h3>
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $linha['idaluno']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Nome :</label>
                                        <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $linha['nome']; ?>" placeholder="Nome">
                                        
                                    </div>
                                    <div class="form-group">
                                        <label for="senha">Sexo :</label>
                                        <select name="sexo" id="sexo">
                                          <option value="M">Masculino</option>
                                          <option value="F">Feminino</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="nome">Data de Nascimento :</label>
                                        <input type="date" class="form-control" id="data_nasc" name="data_nasc" value="<?php echo $linha['data_nasc']; ?>" placeholder="Data">
                                    </div>
                                    <div class="form-group">
                                        <label for="nome">Bairro :</label>
                                        <input type="text" class="form-control" id="bairro" name="bairro" value="<?php echo $linha['bairro']; ?>" placeholder="Digite seu Bairro">
                                    </div>
                                    <div class="form-group">
                                        <label for="nome">Rua :</label>
                                        <input type="text" class="form-control" id="rua" name="rua" value="<?php echo $linha['rua']; ?>" placeholder="Rua">
                                    </div>
                                    <div class="form-group">
                                        <label for="nome">N° Casa :</label>
                                        <input type="text" class="form-control" id="numero_casa" name="numero_casa" value="<?php echo $linha['numero_casa']; ?>" placeholder="Número da Casa">
                                    </div>

                                    <center><button type="submit" class="btn btn-success">Alterar</button></center>
                                    </form>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </section> 
      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
         
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../../assets/vendors/chart.js/Chart.min.js"></script>
    <script src="../../assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="../../assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="../../assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="../../assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <script src="../../assets/js/settings.js"></script>
    <script src="../../assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="../../assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>