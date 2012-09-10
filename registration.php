<?php

class Registration {
	public $fields = null;
	public $ints = null;

	function __construct() {
		$fields = array("first_name","last_name","email","zip","handicap","rounds","vacations","rcv_emails","rcv_offers","location_id");
		$ints = array("zip","rcv_emails","rcv_offers","location");
	}

	function save($input) {
		include 'db.php';
		$loc = getLocationInfo($_POST['location']);
		foreach($this->fields as $field) {
			if($field == 'location_id') {
				$val = $loc['id'];
			} else {
				$val = $_POST[$field];
			}   
			
			if( !empty($val) ) { 
				$sql .= in_array($val, $this->ints) ? $val . ',' : "'" . $val . "',";
			} else {
				$sql .= 'null,';
			}   

		}

		$sql = trim($sql,',');
		$sql .= ")";

		$result = mysql_query($sql);
		$err = mysql_error();
		return array('rows'=>$result, 'err'=>$err);
	}

	static function getimage() {
	    echo json_encode(array("name"=>"John","time"=>"2pm"));
    }
}
