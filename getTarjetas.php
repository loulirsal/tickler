<?php
header('Content-type: text/plain; charset=utf-8');

	if($_SERVER['REQUEST_METHOD']=='GET'){

		$id  = $_GET['id'];

		require_once('../dbConnect.php');

  			$sql = "SELECT * FROM tarjetas WHERE id_ref ='".$id."'";
				$r = mysqli_query($con,$sql);


				$result = array();
        while($row = mysqli_fetch_assoc($r)){
				  array_push($result,array(
					  "id_tarjeta"=>$row['id_tarjeta'],
				  	"nombre"=>$row['nombre'],
            "descripcion"=>$row['descripcion'],
				 	  "photo_id"=>$row['photo_id'],
            "tick"=>$row['tick']
            "autor"=>$row['autor']
					  )
				  );
			  }

		echo json_encode(array("result"=>$result),JSON_UNESCAPED_UNICODE);

		mysqli_close($con);

	}
