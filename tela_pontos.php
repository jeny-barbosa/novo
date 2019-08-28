<?php
require 'conexao.php';
require 'funcoes.php';
require 'estilos.php';
require 'menu.php';
?>
<!DOCTYPE html>
<html>
 <head>
  <title>TangDesk - PONTOS</title>
 </head>
 <body>
  <br>
  <form action="processa.php" method="post" name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
   <div class="container-fluid">
    <div class="row">
     <div class="col" >
      <h3>Importar Excel Tangerino</h3>
      <div class="input-group mb-3">
       <div class="custom-file">
        <label class="custom-file-label-hover" for="file">
         <input type="file" name="tangerino" id="tangerino" accept=".xls,.xlsx" class="form-control-file " >
        </label>
       </div>
      </div>
     </div>
     <div class="col">
      <h3>Importar Excel MoviDesk</h3>
      <div class="input-group mb-3">
       <div class="custom-file-hover">
        <label class="custom-file-label-hover" for="file">
         <input type="file" name="movidesk" id="movidesk" accept=".xls,.xlsx"  class="form-control-file ">
        </label>
       </div>
      </div>
     </div>

     <div class="col">
      <div class="form-group">
       <h3>Selecione o colaborador:</h3>
       <?php
       $sQuery = mysqli_query($conn, "
                    SELECT ID, NOME
                     FROM COLABORADOR
                     ORDER BY NOME
                    ");
       ?>
       <select id="func_nome_incluir" name="func_nome_incluir" class="form-control" >
        <option >Selecione...</option>
        <?php while ($aColaborador = mysqli_fetch_array($sQuery)) { ?>
          <option value="<?php echo $aColaborador['ID'] ?>" name="idFunc"><?php echo $aColaborador['NOME'] ?></option>
        <?php } ?>
       </select>
      </div>
     </div>
     <div class="col">
      <br>
      <button type="submit" id="submit" name="import" class="btn btn-success btn-lg">Importar <i class="fas fa-file-import"></i></button>
      <button type="reset" class="btn btn-outline-danger btn-lg" value="Limpar">Limpar <i class="fas fa-broom"></i></button>
     </div>
    </div>
   </diV>
  </form>

  <div>
   <fieldset>
    <legend>Buscar Registros do Colaborador</legend>
    <form>
     <div class="form-group" style="font-size:14pt;">
         <?php
         $sQuery = mysqli_query($conn, "
              SELECT ID, NOME
               FROM COLABORADOR
               ORDER BY NOME
              ");
         ?>
      Colaborador: <select id="func_nome_incluir" name="func_nome_incluir" >
       <option >Selecione...</option>
       <?php while ($aColaborador = mysqli_fetch_array($sQuery)) { ?>
         <option value="<?php echo $aColaborador['ID'] ?>" name="idFunc"><?php echo $aColaborador['NOME'] ?></option>
       <?php } ?>
      </select>
      <button type="button" value="Buscar" class="btn btn-primary"/><i class="fas fa-search"></i></button>
     </div>
    </form>
   </fieldset>

   <form class="shadowbox6" action="" method="post">
    <strong><label for="Estado Encomenda">Estado Encomenda</label></strong>
    <select name="pesquisar"> 
     <option></option> 
     <?php
     $sql = "SELECT * FROM centrodb.EstadoEncomendas";
     $qr = mysqli_query($conn, $sql);
     while ($ln = mysqli_fetch_assoc($qr)) {
       echo '<option value="' . $ln['Estado'] . '"> ' . $ln['Estado'] . '</option>';
     }
     ?> 
    </select>
    <strong><label for="Valência">Valência</label></strong>
    <select name="pesquisar"> 
     <option></option> 
     <?php
     $sql = "SELECT * FROM centrodb.Destinos WHERE Id IN (1,2,3)";
     $qr = mysqli_query($conn, $sql);
     while ($ln = mysqli_fetch_assoc($qr)) {
       echo '<option value="' . $ln['Destino'] . '"> ' . $ln['Destino'] . '</option>';
     }
     ?> 
    </select>
    <strong><label for="Requerente">Requerente</label></strong>
    <select name="pesquisar"> 
     <option></option> 
     <?php
     $sql = "SELECT * FROM centrodb.Requerentes WHERE Id IN (1,2,4,5,8)";
     $qr = mysqli_query($conn, $sql);
     while ($ln = mysqli_fetch_assoc($qr)) {
       echo '<option value="' . $ln['Requerente'] . '"> ' . $ln['Requerente'] . '</option>';
     }
     ?> 
    </select>
    <button class="botao" type="submit">Consultar</button>
   </form>
   <?php
   if (isset($_POST['pesquisar'])) {
     $pesquisar = $_POST['pesquisar'];

     $result_cursos = "SELECT id, nome, 
                    
FROM colaborador 

on centrodb.EstadoEncomendas.Id = centrodb.EncomendasGerais.Estado

WHERE centrodb.EstadoEncomendas.Estado LIKE '%$pesquisar%' AND IdDestino LIKE '%$pesquisar%' AND IdRequerente LIKE '%$pesquisar%'";
   }
   ?>
   <!--
       <div style="float:left" width="50%">
         <table class="table table-hover">
           <thead>
             <tr>
               <th>Colaborador</th>
               <th title="Total de pontos batidos">Total de Hora/Ponto Tangerino</th>
               <th title="Total de horas apontadas no Movidesk">Total de Horas Apontadas</th>
               <th title="Tempo de horas trabalhadas no Movidesk">Total de Horas Trabalhadas</th>
               <th title="Diferença entre Horas Apontadas X Horas Trabalhadas">Inatividade</th>
             </tr>
           </thead>
           <tbody>
   <?php
   while ($aColaborador = mysqli_fetch_array($sListColaborador)) {
     ?>
                                         <tr>
                                           <td>
     <?php
     echo '<a href="pagina.php?colaborador=' . $aColaborador['ID'] . '">' . $aColaborador['NOME'] . '</a>';
   }
   ?>
                 </td>
                 <td>
                   $aColaborador['CODIGO']
                 </td>
                 <td>
   <?php
   //$sListHoraApontada = mysqli_query($conn, sprintf($sSomaHoraApontada['TOTAL_HORAS']), $aColaborador['ID']);
   //echo $sSomaHoraApontada['TOTAL_HORAS'];
   ?>
                 </td>
                 <td>
                   $aColaborador['CODIGO']
                 </td>
                 <td>
                   $aColaborador['CODIGO']
                 </td>
             </tr>
           </tbody>
         </table>
       </div>
   -->
 </body>
</html>