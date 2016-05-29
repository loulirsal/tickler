<?php
header('Content-type: text/plain; charset=utf-8');

	if($_SERVER['REQUEST_METHOD']=='GET'){

		$id  = $_GET['id'];

		require_once('../dbConnect.php');

  			$sql = "SELECT * FROM tableros WHERE nombre_equipo ='".$id."'";
				$r = mysqli_query($con,$sql);


				$result = array();
        while($row = mysqli_fetch_assoc($r)){
				  array_push($result,array(
					  "nombre"=>$row['nombre'],
				  	"nombre_equipo"=>$row['nombre_equipo'],
				 	  "id_tablero"=>$row['id_tablero']
					  )
				  );
			  }

		echo json_encode(array("result"=>$result),JSON_UNESCAPED_UNICODE);

		mysqli_close($con);

	}
