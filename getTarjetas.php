<?php
header('Content-type: text/plain; charset=utf-8');

	if($_SERVER['REQUEST_METHOD']=='GET'){

		$id  = $_GET['id'];

		require_once('../dbConnect.php');

  			$sql = "SELECT * FROM tarjetas WHERE id_ref ='".$id."'";
				$r = mysqli_query($con,$sql);

        rs.getInt("id_tarjeta"),rs.getString("nombre"),rs.getInt("photo_id"),rs.getString("descripcion"),rs.getInt("tick"));

				$result = array();
        while($row = mysqli_fetch_assoc($r)){
				  array_push($result,array(
					  "id_tarjeta"=>$row['id_tarjeta'],
				  	"nombre"=>$row['nombre'],
				 	  "photo_id"=>$row['photo_id'],
            "tick"=>$row['tick']
					  )
				  );
			  }

		echo json_encode(array("result"=>$result),JSON_UNESCAPED_UNICODE);

		mysqli_close($con);

	}
