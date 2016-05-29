<?php
header('Content-type: text/plain; charset=utf-8');

	if($_SERVER['REQUEST_METHOD']=='POST'){

    $id  = $_POST['id'];
    $tick = $_POST['tick'];
    $color = $_POST['color'];

		require_once('../dbConnect.php');

    $statement = $mysqli->prepare("UPDATE tarjetas SET tick=?, photo_id=? WHERE id_tarjeta=?");
echo "hoola";
    //bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)
    $statement->bind_param('iii', $tick, $photo_id, $id);
    $results =  $statement->execute();
    if($results){
        echo 'Success! record updated';
    }else{
        echo 'Error : ('. $mysqli->errno .') '. $mysqli->error;
    }

/*
  		//	$sql = "SELECT * FROM tarjetas WHERE id_ref ='".$id."'";
        $sql = "UPDATE tarjetas SET tick=".$tick.", photo_id=".$color." where id_tarjeta=".$id.;

        if (mysqli_query($con, $sql)) {
          echo "Record updated successfully";
        } else {
          echo "Error updating record: " . mysqli_error($con);
        }
*/

		mysqli_close($con);

	}
