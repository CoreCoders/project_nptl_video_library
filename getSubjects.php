<?php

	$subject = array (
		"computer" => array("JAVA","CN","DAA","AP"),
		"mechanical" => array("sf","gf","gf","er","cj","kk"),
		"civil" => array("uy","et","dtgfr","st"),
		"electrical" => array("tgf","ghf","fg","gr")
);

//echo "hello";

if(isset($_GET['branch']))
{
	$c = $_GET['branch'];
	if(isset($subject[$c]))
	{
		for($i = count($subject[$c]) -1; $i>=0; $i--)
		{
			echo "<option value='".$subject[$c][$i]."'>".$subject[$c][$i]."</option>";
		}
	}
}

?>