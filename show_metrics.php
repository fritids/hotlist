<?php include 'head.php' ?>

<?php
include 'db.php';

$metrics = getSummaryInfo();
$last_mon  = date('Y-m-d',strtotime('last Monday'));
echo('<h2> Total Registrations To Date:  ' . $metrics['total'] );
echo('<h2> Total Registrations Since Monday ' .$last_mon . ':  ' . $metrics['week_total'] );
foreach( $metrics['summary'] as $key=>$value) {
    echo('<h2>' .  $value['city'] . '<br/>Total registrations: ' . $value['total'] . 
            '<br/>Registrations since Monday '. $last_mon . ': ' . $metrics['week_summary'][$key]['total'] . '</h2>');               
}

?>


<?php include 'foot.php' ?>
