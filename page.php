<?php include('header.php');?>

<?php
$csv = array_map('str_getcsv', file('https://raw.githubusercontent.com/graciacov/clase_10/gh-pages/series.csv'));
      array_walk($csv, function(&$a) use ($csv) {
      $a = array_combine($csv[0], $a);
      });
      array_shift($csv);
?>

<main role="main" class="container">
<h1 class="mb-4">Top 20 Series</h1>
<div class="row">

<?php for($t = 0; $t < count($csv); $t++){?> <!--consulta linea por linea -->
    <div class="col-sm-4 py-3">
    <h3 class="border-top pt-3"> <?php print($csv[$t]['nombre'])?></h3>

    
    <figure style="height:170px; overflow:hidden;">
    
    <img src="
    <?php if ($csv[$t]['img'] == NULL){
        print ("img/gris.png");
    } else {
        print ($csv[$t]['img']);
    };?>" 

    class="img-fluid">
    </figure>

    <?php if ($csv[$t]['creador'] == NULL){
        print '<h5><a href="'.($csv[$t]['url']).'">'.($csv[$t]['network']).'</a></h5>';
    } else {
        print '<h5><a href="'.($csv[$t]['url']).'">'.($csv[$t]['creador']).'</a></h5>';
    }?>

    <h5><?php print($csv[$t]['network'])?></h5>
    
        <table class="table">
        <tbody>
            <tr>
              <th scope="row">Año</th>
              <td><?php print($csv[$t]['year'])?></td>
            </tr>
            <tr>
              <th scope="row">Temporadas</th>
              <td><?php print($csv[$t]['temporadas'])?></td>
            </tr>
            <tr>
              <th scope="row">Capítulos</th>
              <td><?php print($csv[$t]['capitulos'])?></td>
            </tr>
            <tr>
              <th scope="row">Duración</th>
              <td><?php print($csv[$t]['duracion'])?></td>
            </tr>
            
        </tbody>
        </table>
<!--
    <p class="border-top pt-3"><?php print($csv[$t]['year'])?></p>
    <p>Temporadas: <?php print($csv[$t]['temporadas'])?></p>
    <p>Capítulos: <?php print($csv[$t]['capitulos'])?></p>
    <p>Duración: <?php print($csv[$t]['duracion'])?></p>
    <h5><?php print($csv[$t]['network'])?></h5>
-->   

    </div>
<?php };?>
</div>

</main>
<?php include('footer.php');?>