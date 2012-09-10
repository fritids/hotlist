<?php include 'db.php'; 
    include 'helpers.php'; 
    $loc = json_encode(getFormttedLocations(''));
    $map = getMap($_GET['loc']);
?>

<?php include 'head.php' ?>

<div id="reg_ver">
    <a id="select_diff_link" href="choose_location.php">&nbsp;</a>
    <div id="conf_loc"><?php if(array_key_exists('loc',$_GET)) {  echo $_GET['loc'] ;} ?></div>
    <a id="rewards_link" href="http://www.condenastdigital.com/go/golf_hotlist_2012/ty/rewards" target="blank">&nbsp;</a>
    <div id="deets_conf">
        <div id="venue_details" class="reg"></div>
    </div>
</div>

<script>
  map = '<?php echo $map ?>';
  $(document).ready(function(){
    loadGMap(map);
  });

</script>


<?php include 'foot.php' ?>
