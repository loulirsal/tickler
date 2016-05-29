<?php
header('Content-type: text/plain; charset=utf-8');

	if($_SERVER['REQUEST_METHOD']=='GET'){

    $id  = $_GET['id'];
    $tick = $_GET['tick'];
    $color = $_GET['color'];

		require_once('../dbConnect.php');

    $statement = $mysqli->prepare("UPDATE tarjetas SET tick=?, photo_id=? WHERE id_tarjeta=?");

    //bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)
    $statement->bind_param('ssi', $tick, $photo_id, $id);
    $results =  $statement->execute();
    if($results){
        print 'Success! record updated';
    }else{
        print 'Error : ('. $mysqli->errno .') '. $mysqli->error;
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
