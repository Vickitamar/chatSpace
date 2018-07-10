<?php 

function formatDate($date){
	$date = date("d/m/Y", strtotime($date));
	return $date;
}


?>