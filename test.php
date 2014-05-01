<?php

	$x="rutvik3107031";

	$x=preg_replace("/[A-Za-z]/", "", $x);

	//echo $x;
	
	$topic="hi,hello,hey";
	
	$topic=str_replace(",","%' or topic like '%",$topic);
	
	$topic="topic like '%".$topic."%'";
	
	echo $topic;

?>