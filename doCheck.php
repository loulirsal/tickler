<?php
header('Content-type: text/plain; charset=utf-8');

	if($_SERVER['REQUEST_METHOD']=='GET'){

    $id  = $_GET['id'];
    $tick = $_GET['tick'];
    $color = $_GET['color'];

		require_once('../dbConnect.php');

  		//	$sql = "SELECT * FROM tarjetas WHERE id_ref ='".$id."'";
        $sql = "UPDATE tarjetas SET tick=".$tick.", photo_id=".$color." where id_tarjeta=".$id.;

        if (mysqli_query($con, $sql)) {
          echo "Record updated successfully";
        } else {
          echo "Error updating record: " . mysqli_error($con);
        }


		mysqli_close($con);

	}
