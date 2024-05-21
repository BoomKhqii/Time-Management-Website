<?php
    $b = $_REQUEST['b'];
	
	if($b){
		$delete_sql = "DELETE FROM todo WHERE id = '".$b."'";
		$delete_query = mysqli_query($conn, $delete_sql);
	}
?>