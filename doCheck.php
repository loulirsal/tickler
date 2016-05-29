<?php
header('Content-type: text/plain; charset=utf-8');

if($_SERVER['REQUEST_METHOD']=='POST'){

	$id  = $_POST['id'];
	$tick = $_POST['tick'];
	$color = $_POST['color'];

//importing database connection script
 require_once('dbConnect.php');

 //Creating sql query
 $sql = "UPDATE tarjetas SET tick = $tick,  photo_id=$color WHERE id_tarjeta = $id";

 //Updating database table
 if (mysqli_query($con,$sql)) {
 echo 'Successfully';
 }
 else {
 echo 'Try Again';
 }

 //closing connection
 mysqli_close($con);
 }
	/*if($_SERVER['REQUEST_METHOD']=='POST'){

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
*/
