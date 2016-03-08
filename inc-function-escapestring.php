<?php
if (!function_exists('escapestring')) {
	
	function escapestring($vconnection, $value, $datatype) { 
	
		require('inc-function-escapestring.php');
	
	  $value = function_exists('mysqli_real_escape_string') ? mysqli_real_escape_string($vconnection, $value) : mysqli_escape_string($vconnection, $value);
	
	  switch ($datatype) {
		  
		case 'text':
		
		  $value = ($value != '') ? "'" . $value . "'" : "'na'";
		  break;   
		   
		case 'int':
		
		  $value = ($value != '') ? intval($value) : "'na'";
		  break;
		  
		case 'float':
		
		  $value = ($value != '') ? floatval($value) : "'na'";
		  break;
		  
		case 'date':
		
		  $value = ($value != '') ? "'" . $value . "'" : "'na'";
		  break;
		  
	  }
	  
	  return $value;
	  
	}
	
}
?>