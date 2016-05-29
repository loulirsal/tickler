<?php
header('Content-type: text/plain; charset=utf-8');

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
$stmt = $mysqli->prepare("UPDATE tarjetas SET tick=?,
   photo_id=?
   WHERE id_tarjeta=?");
$stmt->bind_param('iii',
   $_POST['tick'],
   $_POST['color'],
   $_POST['id']);

	 $stmt->execute();

		mysqli_close($con);
