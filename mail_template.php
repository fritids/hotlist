<?php
include 'helpers.php';
function embedImg(&$mail, $filename,$id_name){
    $idata = file_get_contents($filename);
    $img = $mail->createAttachment($idata, 'image/jpeg', Zend_Mime::DISPOSITION_INLINE, Zend_Mime::ENCODING_BASE64);
    $img->id = $id_name;
}

function getEmailTemplate($location) {
$city = ucfirst($location['city']);
$state = strtoupper($location['state']);
$loc_string = $city . ',' . $state;
$town = strtoupper($location['display_city']);
$venue = $location['venue'];
$street = $location['street'];
$zip = $location['loc_zip'];
$event_date = $location['event_date'];
$event_time = $location['event_time'];
$map_link = getMap($loc_string,'link_only');

$str = <<<EOD
<html>
<head>
<style>

body td {
    font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
    font-size: 14px;
}
td { padding: 10px; }
a { 
	text-decoration: none;
	color: red; }
.red { color: red;}
.bold { font-weight: bold}
#coupon {
	padding: 10px;
	width: 440px;
	background: #FFFF00;
}

</style>
</head>
<body>

<table width="576">
<tr> <td colspan="2">
	<img src="cid:e_head" alt="Demo The Best Golf Equipment Of 2012">
</td> </tr>
<tr> <td colspan="2">
<div class="red bold">REGISTRATION CONFIRMED:</div>
<div>Thank you for reserving a spot a the <b>2012 GOLF DIGEST HOT LIST TOUR.</b></div>
<div> We have added you to the guest list in <b>$loc_string. SEE YOU THERE!</b></div>
<tr width=40%> <td>
    <!-- venue info goes here. maybe instead of img? -->
	<b>$loc_string</b><br><br>
	$venue<br>
	$street<br>
	$town, $state $zip<br><br>

	<b>$event_date<b><br>
	$event_time<br>
	
</td>
<td width="60%">
<a $map_link><img src="cid:e_map" alt="Get Directions"></a>
</td> </tr>
<tr> <td colspan="2">
<div>QUESTIONS?</div>
<div class="bold"><a href="mailto://laddie.sanford@golfdigest.com">CONTACT GOLF DIGEST</div>
</td> </tr>
<tr><td background-color="yellow" colspan="2">
<div id="coupon">
<br>
Can't wait until the Hot List Tour to shop the best golf equipment?
<div>
Shop now and earn up to 10% back at <b><a href="http://www.condenastdigital.com/go/golf_hotlist_2012/email/golf_hl">GOLFDIGESTREWARDS.COM</a></b></div>
</div>
</td> </tr>
<tr> <td colspan="2">
	<img src="cid:e_foot" alt="Sponsors">
</td> </tr>
</table>

</body></html>
EOD;

return $str;
}
