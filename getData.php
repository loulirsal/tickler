<?php

	if($_SERVER['REQUEST_METHOD']=='GET'){

		$id  = $_GET['id'];

		require_once('../dbConnect.php');

    switch ($id) {
  	  case 1:
		  	$sql = "SELECT * FROM equipos";

				$res = $conn->query($sql);
				$result = array();

				if ($res->num_rows > 0) {
					while($row = mysqli_fetch_assoc($r)){
						array_push($result,array(
							"nombre"=>$row['nombre'],
							)
						);
					}
				} else {
				     echo "0";
				}





			/*	$r = mysqli_query($con,$sql);

				$res = mysqli_fetch_array($r);

				$result = array();
				do{
				  array_push($result,array(
			            "nombre"=>$row['nombre'],
				    )
         			  );
				 }while($row = $r->fetch_assoc());*/
  		 break;

  	  default:
  			$sql = "SELECT * FROM equipos";
				$r = mysqli_query($con,$sql);


				$result = array();
        while($row = mysqli_fetch_assoc($r)){
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
