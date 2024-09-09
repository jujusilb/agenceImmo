<?php 
session_start();
$link=@mysqli_connect('localhost', "root", "", "agenceimmo");
 if($link==false){
    $link=mysqli_connect("localhost", "root", "");
 } 
 //else echo "connecté à la BDD !";

 mysqli_set_charset($link,"UTF8");

 function debug($array, $titre="demande"){?>
   <details>
      <style>
         summary{
            border:1px solid green;
         }
      </style>
      <summary>
         contenu du tableau <?=$titre?>
      </summary>
      <pre>
         <?php print_r($array); ?>
      </pre>
   </details>
<?php } 
