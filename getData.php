<?php

	if($_SERVER['REQUEST_METHOD']=='GET'){

		$id  = $_GET['id'];

		require_once('../dbConnect.php');

    switch ($id) {
  	  case 1:
		  	$sql = "SELECT * FROM tableros";
				$r = mysqli_query($con,$sql);

				$res = mysqli_fetch_array($r);

				$result = array();

				array_push($result,array(
					"nombre"=>$res['nombre'],
					"nombre_equipo"=>$res['nombre_equipo']
					)
				);
  		 break;

  	  default:
  			$sql = "SELECT * FROM equipos";
				$r = mysqli_query($con,$sql);

				$res = mysqli_fetch_array($r);

				$result = array();

        while($row = $r->fetch_assoc()){
				  array_push($result,array(
				  	"nombre_equipo"=>$row['nombre_equipo'],
				 	  "nombre_usu"=>$row['nombre_usu']
					  )
				  );
			  }
  		  break;
    }




		echo json_encode(array("result"=>$result));

		mysqli_close($con);

	}
