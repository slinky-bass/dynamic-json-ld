<?php
function buildJsonLd($name, $title, $email, $telephone){
	
	//BUILD THE ASSOCIATIVE ARRAY
	$contactData = array(
	  '@context' => 'http://schema.org/',
	  '@type' => 'Person',
	  'name' => $name,
	  'jobTitle' => $title,
	  'url' => "http://tekiahfoundation.blogspot.co.za/",
	  'email' => $email,
	  'telephone' => $telephone,
	  'address' => array(
		  '@type' => 'PostalAddress',
		  'streetAddress' => 'No 2 Greyland Rd, Ferness Estate, Ottery',
		  'addressLocality' => 'Cape Town',
		  'addressRegion' => 'Western Cape',
		  'postalCode' => '7800',
		  'addressCountry' => 'South Africa',
		  )
	);
	
	//OPTIONAL PARAMETER FOR JSON_ENCODE THAT CAN BE USED WITH PHP5:
	//JSON_UNESCAPED_SLASHES(64) | JSON_UNESCAPED_UNICODE(128) | JSON_PRETTY_PRINT(256)
	$jsonLd = json_encode($contactData, 64 | 128 | 256);
	
	return $jsonLd;
}
?>
<?php 
/*require('inc-conncvnl.php');
require('inc-function-escapestring.php');

$sql_contact = sprintf("SELECT * FROM tblcontact");
$rs_contact = mysqli_query($vconncvnl, $sql_contact);
$rs_contactRows = mysqli_fetch_assoc($rs_contact);
 
$personName = $rs_contactRows['ContactName'];
$personJobTitle = $rs_contactRows['ContactJobTitle'];
$personEmail = $rs_contactRows['ContactEmail'];
$personTelephone = $rs_contactRows['ContactTelephone'];
$jsonLdstring = '{'.'"@context": "http://www.schema.org",';
$jsonLdstring .= '"@type": "person",';
$jsonLdstring .= '"name": "' . $personName . '",'; 
$jsonLdstring .= '"jobTitle": "' . $personJobTitle . '",';
$jsonLdstring .= '"url": "http://tekiahfoundation.blogspot.co.za/",';
$jsonLdstring .= '"address": {';
$jsonLdstring .= '"@type": "PostalAddress",';
$jsonLdstring .= '"streetAddress": "No 2 Greyland Rd, Ferness Estate, Ottery",';
$jsonLdstring .= '"addressLocality": "Cape Town",';
$jsonLdstring .= '"addressRegion": "Western Cape",';
$jsonLdstring .= '"postalCode": "7800",';
$jsonLdstring .= '"addressCountry": "South Africa"'.'},';
$jsonLdstring .= '"email": "' . $personEmail . '",';
$jsonLdstring .= '"telephone": "' . $personTelephone . '"'.'}';

$contactData = $jsonLdstring; */
?>