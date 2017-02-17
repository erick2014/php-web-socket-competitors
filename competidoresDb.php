<?php
  //get competitors from file
  if( $_SERVER['REQUEST_METHOD']=="GET" ){
    $competidoresList=array(
      array("name"=>"Ronald Andrés","lastName"=>"Púlido Gutierrez","score"=>0),
      array("name"=>"Reymer","lastName"=>"Ramírez","score"=>0),
      array("name"=>"Andrés Felipe","lastName"=>"Fandiño","score"=>0),
      array("name"=>"Camilo","lastName"=>"Roa","score"=>0),
      array("name"=>"José Alfredo","lastName"=>"Rueda Benítez","score"=>0),
      array("name"=>"Camilo","lastName"=>"Orozco","score"=>0),
      array("name"=>"Óscar","lastName"=>"Arana Correa","score"=>0),
      array("name"=>"Juan Esteban","lastName"=>"Quíntero","score"=>0),
      array("name"=>"Juan Felipe","lastName"=>"Ortega Mejía","score"=>0),
      array("name"=>"Juan David","lastName"=>"Arroyave","score"=>0)
    );
    echo json_encode($competidoresList);
  }
  //save in file competitors
  else if( $_SERVER['REQUEST_METHOD']=="POST" ){
    $myFile=fopen("competitors.txt","a");
    $postData=$_POST;
    $line=$postData["competitorName"].",".$postData["competitorLastName"].",".$postData["competitorScore"]."\n";
    fwrite($myFile,$line);
    fclose($myFile);
    echo json_encode($line);
  }

?>
