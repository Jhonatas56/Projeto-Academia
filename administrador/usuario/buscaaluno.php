<?php
  include '../../essenciais/testasessao.php';
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
                <i class="mdi mdi-home"></i>
              </span>
              <span class="menu-title">Principal</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="buscausu.php" aria-expanded="false" aria-controls="ui-basic">
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
                <i class="fa-solid fa-clipboard"></i>
              </span>
              <span class="menu-title">Mátriculas</span>
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
            <?php 
              if(isset($_GET['delete'])) {
                if(($_GET['delete'])== 'ok'){
                  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                      <strong>Atenção</strong> Aluno excluido com sucesso!
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
                </div>';
                }
              }

              if(isset($_GET['delete'])) {
                if(($_GET['delete'])== 'erro'){
                  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <strong>Atenção</strong> Erro aluno não excluido!
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
                </div>';
                }
              }
            ?>
            <?php
                    if (isset($_GET['update'])){
                      if(($_GET['update'])=='ok'){
                        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Atenção</strong> UsuáriAluno alterado com sucesso!
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                      </div>';
                      }
                    }
                    if(isset($_GET['update'])) {
                      if(($_GET['update'])=='erro'){
                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Atenção</strong> Erro ao alterar usuárialuno!
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                      </div>';
                      }
                    }
                ?>
              <form action="buscaaluno.php" method="POST">
                 <label>Busca de alunos</label>
                 <div class="input-group">
                   <input class="form-control" type="text" name="texto" id="texto">
                   <div class = "input-group-append">
                   <button type="submit" class="btn btn-info"><i class="fa fa-search"></i> Buscar </button>
                </div>
                </div>
              </form>
              <hr>
              <table class="table table-bordered">
              
                  <p> <i class="nav-icon fa fa-table"></i> &nbspDados do Aluno  <a href="relat.php" target="_blank" title="Imprimir" class="btn btn-md btn-primary"> <i class="fa fa-print"></i></a></p> 
                 <tr>
                  <th>Nome</th>
                  <th>Sexo</th>
                  <th>Data de Nascimento</th>
                  <th>Bairro</th>
                  <th>Rua</th>
                  <th>N° da casa</th>
                </tr>

                
                <?php
                if (isset($_POST['texto'])){
                  include '../../banco.php';
                  
              //echo 'conexão ok!'
              //recebendo variáveis por post
            
              $texto = $_POST ['texto'];


              //criando uma consulta
              $sql = "select * from tbaluno where nome like '%$texto%' ";
              $consulta = $conexao -> query($sql);

           if($consulta){
              if ($consulta->num_rows > 0){
              while(  $linha=$consulta->fetch_array(MYSQLI_ASSOC)){

                    $data = implode("/", array_reverse(explode("-", $linha['data_nasc'])));

                    echo' <tr>
                    <td>'.$linha['nome'].'</td>
                    <td>'.$linha['sexo'].'</td>
                    <td>'.$data.'</td> 
                    <td>'.$linha['bairro'].'</td>
                    <td>'.$linha['rua'].'</td>
                    <td>'.$linha['numero_casa'].'</td>
                    <td>
                        <a href="altusu.php?id='.$linha['idusu'].'" title="Alterar Aluno" class="btn btn-md btn-primary"> <i class="fa fa-edit"></i></a>
                        <a class="btn btn-danger btn-md" > <i class="fa fa-trash"></i></a>
                    </td>
                  </tr>';
              }
              }else{
                 
              }
           }
       }
        
            ?>
              </table>
              
          </div> 
       </div>
       </div>
        </div>
        </div>
        <?php 
        if(isset($_GET['login'])) {
          if(($_GET['login'])== 'ok'){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                 <strong>Olá</strong> Seja bem-vindo(a) ao sistema!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
            </button>
          </div>';
          }
        }
        ?>
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