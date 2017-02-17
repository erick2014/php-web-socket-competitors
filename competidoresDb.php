<?php
  //get competitors from file
  if( $_SERVER['REQUEST_METHOD']=="GET" ){
    //db connection
    $conn = mysqli_connect("127.0.0.1", "root", "123456", "xpartano");

    if (!$conn) {
      echo "we could not find any record";
      exit;
    }
    mysqli_query($conn,"SET NAMES 'utf8'");

    //get all recors from db
    $sql= "SELECT * FROM competitors";
    $result=mysqli_query($conn,$sql);
    $records=[];

    while($row=mysqli_fetch_assoc($result)){
      $records[]=$row;
    }

    echo json_encode($records, JSON_UNESCAPED_UNICODE);
    exit;

    // $competidoresList=array(
    //   array("name"=>"Ronald Andrés","lastName"=>"Púlido Gutierrez","score"=>0),
    //   array("name"=>"Reymer","lastName"=>"Ramírez","score"=>0),
    //   array("name"=>"Andrés Felipe","lastName"=>"Fandiño","score"=>0),
    //   array("name"=>"Camilo","lastName"=>"Roa","score"=>0),
    //   array("name"=>"José Alfredo","lastName"=>"Rueda Benítez","score"=>0),
    //   array("name"=>"Camilo","lastName"=>"Orozco","score"=>0),
    //   array("name"=>"Óscar","lastName"=>"Arana Correa","score"=>0),
    //   array("name"=>"Juan Esteban","lastName"=>"Quíntero","score"=>0),
    //   array("name"=>"Juan Felipe","lastName"=>"Ortega Mejía","score"=>0),
    //   array("name"=>"Juan David","lastName"=>"Arroyave","score"=>0)
    // );
    // //print_r($competidoresList);
    // echo json_encode($competidoresList);
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
