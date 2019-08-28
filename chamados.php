<?php
require 'fontes.php';
require 'menu.php';
require 'funcoes.php';
?>

<!DOCTYPE html>
<html>
 <head>
  <title>TangDesk - Chamados</title>
 </head>
 <body>
  <br>
  <table class="table table-hover">
   <thead>
    <tr>
     <th>Nº Chamado</th>
     <th>Descrição</th>
     <th>Data</th>
     <th>Hora Início</th>
     <th>Hora Fim</th>
     <th>Hora Apontada</th>
     <th>Hora Trabalhada</th>
     <th>Diferença</th>
    </tr>
   </thead>
   <tbody>
       <?php
       while ($count = mysqli_fetch_array($sResultado)) {
         ?>
      <tr>
       <td><?php echo $count['TICKET']; ?></td>
       <td><?php echo $count['CHAMADO']; ?></td>
       <td><?php echo $count['DATA_PONTO']; ?></td>
       <td><?php echo $count['HORA_INICIO']; ?></td>
       <td><?php echo $count['HORA_FIM']; ?></td>
       <td><?php echo $count['HORA_APONTADA']; ?></td>
       <td><?php echo $count['HORA_TRABALHADA']; ?></td>
       <td><?php echo $count['DIFERENCA']; ?></td>
     <?php } ?>
    </tr>
    <tr>
     <th></th>
     <th></th>
     <th></th>
     <th></th>
     <th>
         <?php
         $sSomaHoraApontada = "
                  SELECT ID_COLABORADOR,
                    SEC_TO_TIME(SUM(TIME_TO_SEC(HORA_APONTADA))) AS TOTAL_HORAS
                   FROM MOVIDESK";
         $sListHoraApontada = mysqli_query($conn, $sSomaHoraApontada);

         while ($aHoraApontada = mysqli_fetch_array($sListHoraApontada)) {
           echo $aHoraApontada['TOTAL_HORAS'];
         }
         ?>
     </th>
     <th>
         <?php
         $sSomaHoraTrabalhada = "
                  SELECT ID_COLABORADOR,
                    SEC_TO_TIME(SUM(TIME_TO_SEC(HORA_TRABALHADA))) AS TOTAL_HORAS
                   FROM MOVIDESK";
         $sListHoraTrabalhada = mysqli_query($conn, $sSomaHoraTrabalhada);

         while ($aHoraTrabalhada = mysqli_fetch_array($sListHoraTrabalhada)) {
           echo $aHoraTrabalhada['TOTAL_HORAS'];
         }
         ?>
     </th>

     <th>

      <?php
      /* $sDiferencaHora= "
        SELECT
        @tot1:= SEC_TO_TIME(SUM(TIME_TO_SEC(HORA_TRABALHADA))),
        @tot2:= SEC_TO_TIME(SUM(TIME_TO_SEC(HORA_APONTADA))),
        CONVERT((TIMEDIFF(@tot2,@tot1)), TIME) AS DIFERENCA
        FROM MOVIDESK";
        $sListHoraDiferenca = mysqli_query($conn, $sDiferencaHora);

        while ($aHoraDifererenca = mysqli_fetch_array($sListHoraDiferenca)) {
        echo $aHoraDifererenca['DIFERENCA'];
        } */
      ?>
     </th>

    </tr>
   </tbody>
  </table>


 </body>
</html>