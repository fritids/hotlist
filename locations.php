
<?php 
include 'db.php';
$loc = json_encode(getFormttedLocations('st')); 
?>

<?php include 'head.php' ?>
<div id="location">
    <ul id="state_links">
        <li id='stcarlsbad' ><a href="register.php?location=carlsbad">&nbsp;</a></li>
        <li id='stphoenix' ><a href="register.php?location=phoenix">&nbsp;</a></li>
        <li id='stdallas'><a href="register.php?location=dallas">&nbsp;</a></li>
        <li id='stsacramento'><a href="register.php?location=sacramento">&nbsp;</a></li>
        <li id='stdetroit'><a href="register.php?location=detroit">&nbsp;</a></li>
        <li id='statlanta'><a href="register.php?location=atlanta">&nbsp;</a></li>
        <li id='stcromwell'><a href="register.php?location=cromwell">&nbsp;</a></li>
    </ul>
    <div id="deets_loc">
        <div id="reserve" ><a href="register.php?location=cromwell"></a></div>
        <div id="venue_info" ></div>
        <div id="venue_details" ></div>
    </div>
</div>
<script>
    locations = <?php echo $loc ?>;
$(document).ready( function() {
    var items =  $('#state_links').find('li');
    
    items.each( function(index, el) { 
        tmp = '#' + this.id;
        $(tmp).hover(sthoverIn,sthoverOut);
    });

    $('#nav_links').css('background','url("images/menu_loc.jpg")');
    setVenue('stcromwell');
 });

</script>
<!-- OMNITURE TRACKING -->
<script language='JavaScript' type='text/javascript'>
//<![CDATA[
track_pageview('promo/golf_hotlist_2012','','golf_hotlist_2012','locations');
//]]>
/*********** DO NOT ALTER ANYTHING BELOW THIS LINE ! ******/
var s_code=s.t();if(s_code)document.write(s_code)//--></script>
<script language=`JavaScript` type=`text/javascript`><!--
if(navigator.appVersion.indexOf('MSIE')>=0)document.write(unescape('%3C')+'\!-'+'-')
//--></script><noscript><a href=`http://www.omniture.com` title=`Web Analytics`><img
src=`http://condenast.112.2o7.net/b/ss/conde-minisites/1/H.15.1--NS/0` height=`1` width=`1` border=`0` alt=`` /></a></noscript><!--/DO NOT REMOVE/-->

<?php include 'foot.php' ?>
