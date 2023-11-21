<?php
   include 'conexao.php';
   session_start();
   
   if(!$_SESSION['login']) {
       header('Location: index.php');
       exit();
   }
   ?>
<!DOCTYPE html>
<html>
   <head>
      <title>Lista de chamados</title>
      <script src="https://kit.fontawesome.com/9f30e32661.js" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
      <link href="https://fonts.googleapis.com/css?family=Anton|Libre+Baskerville&display=swap" rel="stylesheet">
      <style type="text/css">
         #tamanhoContainer{
         width: 500px;
         }
         #formTitulo{
         margin-top: 0px;
         background-color: #008B00;
         color: #ffffff;
         align-items: center;
         justify-content: center;
         border-radius: 0px;
         font-weight: bold;
         font-family: 'Libre Baskerville', serif;
         height: 100px;
         display: flex;
         }
         #buttonAbrir{
         font-family: 'Libre Baskerville', serif;
         margin-bottom: 40px;
         background-color: #80B3FF;
         border-radius: 5px;
         font-weight: bold;
         color: #ffffff;
         }
         .descricao-cell {
         max-height: 100px;
         overflow-y: auto;
         white-space: pre-wrap;
         }
         .table {
         border: 2px solid #000;
         border-collapse: collapse;
         width: 100%;
         }
         .table tbody tr {
         border-bottom: 3px solid #000;
         }
         .table td {
         border-left: 1px solid #ccc;
         padding: 8px;
         }
         .table thead tr {
         border-bottom: 2px solid #008B00;
         font-weight: bold;
         }
         .table td {
         text-align: center;
         vertical-align: middle;
         }
         .table-header {
         background-color: #008B00;
         font-weight: bold;
         text-align: center;
         vertical-align: middle;
         position: sticky;
         top: 0;
         z-index: 1;
         }
         .descricao-center {
         text-align: center;
         vertical-align: middle;
         }
      </style>
   </head>
   <body>
      <div class="container">
         <h4><?php echo $_SESSION['login']; ?></h4>
         <a style="color: black;" id="formLogin" href="logout.php">Sair</a>
      </div>
      <h1 id="formTitulo">Lista de Chamados</h1>
      <div class="container" style="margin-top: 40px;">
         <div style="text-align: left;">
            <a href="menu.php" role="button" class="btn btn-secondary" style="border-radius: 5px;">Voltar</a>
            <a href="gerar_planilha.php" class="btn btn-primary" style="border-radius: 5px; margin-left: 10px;">Gerar Planilha Excel</a>
         </div>
         <br>
         <table class="table">
            <thead style="background-color: #008B00;">
               <tr>
                  <th class="table-header" scope="col">BLOCO</th>
                  <th class="table-header" scope="col">DESCRIÇÃO</th>
                  <th class="table-header" scope="col">DISPOSITIVO</th>
                  <th class="table-header" scope="col">ENVIO</th>
                  <th class="table-header" scope="col">STATUS</th>
                  <th class="table-header" scope="col">USUÁRIO</th>
                  <th class="table-header" scope="col">TÉCNICO</th>
                  <th class="table-header" scope="col">ADM</th>
                  <th class="table-header table-cell-action" scope="col">AÇÃO</th>
               </tr>
            </thead>
            <tbody>
               <?php
                  include 'conexao.php';
                  $sql1 = "SELECT * FROM `tb_item`";
                  $busca1 = mysqli_query($conexao,$sql1);
                  $sql = "SELECT * FROM `tb_chamados` ORDER BY tipo_problema ASC";
                  $busca = mysqli_query($conexao,$sql);
                  while ($array = mysqli_fetch_array($busca)) {
                      $id             = $array['id_chamado'];
                      $tipo_problema  = $array['tipo_problema'];
                      
                      $sala           = $array['sala'];
                      $descricao      = $array['descricao'];
                      $iditem         = $array['iditem'];
                      $data_envio     = $array['data_envio'];
                      $status         = $array['status'];
                      $iduser         = $array['iduser'];
                      $idtec          = $array['idtec'];
                      $iduser_adm     = $array['iduser_adm'];
                  ?>
               <tr>
                  <td style="background-color: #F0F8FF;"><?php echo $sala ?></td>
                  <td style="background-color: #F0F8FF;" class="descricao-center" data-toggle="popover" data-content="<?php echo htmlspecialchars($descricao) ?>">
                     <?php
                        $maxCharsPerLine = 20;
                        $linesToShow = 1;
                        $truncated = wordwrap($descricao, $maxCharsPerLine * $linesToShow, "\n", true);
                        $lines = explode("\n", $truncated);
                        echo htmlspecialchars($lines[0]) . "<br>";
                        if (count($lines) > 1) {
                            echo htmlspecialchars($lines[1]);
                        }
                        if (count($lines) > 2) {
                            echo '<span class="text-muted">... <i>(mais conteúdo)</i></span>';
                        }
                        ?>
                  </td>
                  <td style="background-color: #F0F8FF;"><?php echo $iditem ?></td>
                  <td style="background-color: #F0F8FF;"><?php echo $data_envio ?></td>
                  <td style="background-color: #F0F8FF;"><?php echo $status ?></td>
                  <td style="background-color: #F0F8FF;"><?php echo $iduser ?></td>
                  <td style="background-color: #F0F8FF;"><?php echo $idtec ?></td>
                  <td style="background-color: #F0F8FF;"><?php echo $iduser_adm ?></td>
                  <?php if ($status == 'pendente'){ ?>
                  <td style="background-color: #F0F8FF;">
                     <center style="width: 100px;">
                        <a class="btn btn-warning btn-sm" href="editar_solicitacao.php?id=<?php echo $id ?>" role="button"><i class="far fa-edit"></i>&nbsp;Editar</a>
                        <a class="btn btn-danger btn-sm" style="color:#fff" href="_deletar_solicitacao.php?id=<?php echo $id ?>" role="button"><i class="far fa-trash-alt"></i>&nbsp;Excluir</a>
                     </center>
                  </td>
                  <?php } ?>
                  <?php if ($status == 'atendido'){ ?>
                  <td style="background-color: #F0F8FF;">
                     <center style="width: 100px;"><a class="btn btn-warning btn-sm" href="editar_solicitacao.php?id=<?php echo $id ?>" role="button"><i class="far fa-edit"></i>&nbsp;Editar</a>
                        <a class="btn btn-danger btn-sm" style="color:#fff" href="_deletar_solicitacao.php?id=<?php echo $id ?>" role="button"><i class="far fa-trash-alt"></i>&nbsp;Excluir</a>
                     </center>
                  </td>
                  <?php } ?>
                  <?php if ($status == 'recusado'){ ?>
                  <td style="background-color: #F0F8FF;">
                     <center style="width: 100px;"><a class="btn btn-warning btn-sm" href="editar_solicitacao.php?id=<?php echo $id ?>" role="button"><i class="far fa-edit"></i>&nbsp;Editar</a>
                        <a class="btn btn-danger btn-sm" style="color:#fff" href="_deletar_solicitacao.php?id=<?php echo $id ?>" role="button"><i class="far fa-trash-alt"></i>&nbsp;Excluir</a>
                     </center>
                  </td>
                  <?php } ?>
               </tr>
               <?php } ?>
            </tbody>
         </table>
      </div>
      <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
      <script>
         $(document).ready(function () {
             $('[data-toggle="popover"]').popover({
                 trigger: "hover",
                 placement: "top",
                 html: true
             });
         });
      </script>
   </body>
</html>