<?php
include 'config/db.php';

function connect() {
$db_conn = mysql_connect(SERVER,USER,PASS); 
mysql_select_db('hotlisttour');
}

function getLocationInfo($name) {
    connect();
    $name = ucfirst($name);
    $sql = "SELECT * FROM locations WHERE city = '$name'"; 
    $rslt = mysql_query($sql);
    $rtn = mysql_fetch_assoc($rslt);
    return $rtn;
}

function getLocations() {
    connect();
    $sql = "SELECT * FROM locations"; 
    $rslt = mysql_query($sql);
    while( $row = mysql_fetch_assoc($rslt) ) {
        $rtn[] = $row; 
    }
    return $rtn;
}

function getFormttedLocations($prefix) {
    connect();
    $sql = "SELECT * FROM locations"; 
    $rslt = mysql_query($sql);
    while( $row = mysql_fetch_assoc($rslt) ) {
        $row['venue'] = str_replace('&', 'And',$row['venue']);
        $idx = $prefix . strtolower($row['city']);
        $rtn[$idx] = $row; 
    }
    return $rtn;
}


function getSummaryInfo() {
    connect();
    $rtn = array();
    $rtn['total'] = 0;
    $rtn['week_total'] = 0;
    $sql = "SELECT l.city, l.state, count(r.id) as total  FROM locations l
        JOIN registrations r 
        on r.location_id = l.id
        group by l.id
        order by l.id";
    $rslt = mysql_query($sql);
    while( $row = mysql_fetch_assoc($rslt) ) {
        $rtn['summary'][] = $row;
        $rtn['total'] += $row['total'];
    }
   
    $last_mon  = date('Y-m-d',strtotime('last Monday'));
    $sql = "SELECT l.city, l.state, count(r.id) as total FROM locations l
        left JOIN registrations r 
        on r.location_id = l.id
        where r.date_created > '$last_mon'
        group by l.id
        order by l.id";
   
    $rslt = mysql_query($sql);
    while( $row = mysql_fetch_assoc($rslt) ) {
        $temp[] = $row;
    }

    foreach($rtn['summary'] as $key=>$row) {
        if( array_key_exists($key, $temp) && $rtn['summary'][$key]['city'] ==  $temp[$key]['city'] ) {
            $rtn['week_summary'][] = $row;
        } else {
            $rtn['week_summary'][$key] =  $rtn['summary'][$key];
            $rtn['week_summary'][$key]['total'] = 0;
            // 're-index' loop array--add 1 to each index from here
            array_unshift($temp,$rtn['summary']);
        }
        $rtn['week_total'] +=  $rtn['week_summary'][$key]['total'];

    }

    return $rtn;
}

function getRegistrations() {
    connect();
    $sql = "SELECT * FROM locations l
        JOIN registrations r 
        on r.location_id = l.id
        order by l.id asc";
    $rslt = mysql_query($sql);
    $rtn = array();
    while( $row = mysql_fetch_assoc($rslt) ) {
        unset($row['details']);
        $tmp[] = $row;
    }
    
    $header = array();

    // populate header array
    foreach( $tmp as $row ) {
        foreach( $row as $key=>$val ) {
            $header[] = $key;        
        }
        break;
    }
   
    $data = $tmp;
    return array('header'=>$header,'data'=>$data);
}
