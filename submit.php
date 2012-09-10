<?php
include 'db.php';
include 'Zend/Mail.php';
include 'mail_template.php';


$fields = array("first_name","last_name","email","zip","handicap","rounds","vacations","rcv_emails","rcv_offers","location_id");
$ints = array("rcv_emails","rcv_offers","location");

$sql = "INSERT INTO registrations (" . implode(',', $fields) . ") VALUES ( ";
$loc = getLocationInfo($_POST['location']);

foreach($fields as $field) {
  $val = null;
  if($field == 'location_id') {
        $val = $loc['id'];
    } else if(array_key_exists($field,$_POST)) {
        $val = mysql_real_escape_string($_POST[$field]);
    } else {
        $_POST[$field] = null;
    }
    
    if( !empty($val) ) {
        $sql .= in_array( $field, $ints) ? $val . ',' : "'" . $val . "',";
    } else {
        $sql .= 'null,';
    }
}

$sql = trim($sql,',');
$sql .= ")";
$result = mysql_query($sql);
$err = mysql_error();

if( empty($err) ){
$city = ucfirst($loc['city']);
$state = strtoupper($loc['state']);
$loc_string = $city . ',' . $state;
$subject = '2012 GOLF DIGEST HOT LIST TOUR registration confirmation';
$fromEmail = "scottrenick@dolphinmicro.com";
$fromName = 'Golf Digest';

$message= getEmailTemplate($loc);
$map_img = 'images/mail_map_' . $loc['city'] . '.jpg';
$mail = new Zend_Mail();

embedImg($mail, 'images/email_head.jpg', 'e_head');
embedImg($mail, $map_img, 'e_map');
embedImg($mail, 'images/email_foot.jpg', 'e_foot');

$mail->setSubject($subject);
$mail->setFrom($fromEmail, $fromName);
$mail->addTo($_POST['email']);

$mail->setBodyHtml($message);
$mail->send();
header( "Location: registration_verified.php?loc=$loc_string" );
} else {
    header( "Location: registration_verified.php?error=$err" );
}
