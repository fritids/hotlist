<?php include 'db.php'; 
    include 'helpers.php'; 
    $loc = json_encode(getFormttedLocations(''));
    $map = getMap($_GET['location']);
    $page_loc = $_GET['location'];
?>
<?php include 'head.php'; ?>

<div id="registration_container">
    <div id="deets_reg">
        <div id="venue_info" class="reg"></div>
        <div id="venue_details" class="reg"></div>
    </div>

    <form id="registration_form" action="submit.php" method="post">
        <div id='reg_error'></div>
            <input id="reg_fname" type="text" name="first_name" class="required"/>
            <input id="reg_lname" type="text" name="last_name" class="required"/>
            <input id="reg_email" type="text" name="email" class="required email" />
            <input id="reg_zip" type="text" name="zip" class="required number"/>
        <br>
        <input id="reg_hcap" type="text" name="handicap"/>
        
        <div id="reg_rounds">
            <input id="r1" type="radio" name="rounds" value="2-3" />
            <input id="r2" type="radio" name="rounds" value="4-5" />
            <input id="r3" type="radio" name="rounds" value="6-7" />
            <input id="r4" type="radio" name="rounds" value="8 or more" />
        </div>

        <div id="reg_vaca">
            <input id="v1" type="radio" name="vacations" value="1" /> 
            <input id="v2" type="radio" name="vacations" value="2" />
            <input id="v3" type="radio" name="vacations" value="3" />
            <input id="v4" type="radio" name="vacations" value="4" />
            <input id="v5" type="radio" name="vacations" value="0" />
        </div>

        <input id="reg_rcv_email" type="checkbox" name="rcv_emails" value="1" />
        <input id="reg_rcv_offer" type="checkbox" name="rcv_offers" value="1"/>

        <input type="hidden" name="location" value="<?php echo $_GET['location'] ?>" />
        <input id="bttn_reg_submit" type="submit" value="" onclick="validateReg"/>
    </form>
</div>

<script>
  locations = <?php echo $loc ?>;
  loc = "<?php echo $page_loc ?>";
  map = '<?php echo $map ?>';
  $(document).ready(function(){
    $("#registration_form").validate({ errorPlacement: validateReg, 
        messages: {first_name: "First Name is required. &nbsp;",
        last_name: "Last Name is required. &nbsp;",
        email: "Please enter a valid email address.  &nbsp;",
        zip: "Zipcode is required, and must be a number.  &nbsp;"}});
    $('#nav_links').css('background','url("images/menu_reg.jpg")');
    setVenue(loc);
    loadGMap(map);
  });

function validateReg(error, element) {
    /*
        fld =  element.attr('name').replace('_',' '); 
        fld = fld.charAt(0).toUpperCase() + fld.slice(1).toLowerCase();
        err_mssg = error.html();
        err_mssg = err_mssg.replace('This field', fld);
        err_mssg = err_mssg.replace('number', fld);
        error.html(err_mssg + '&nbsp;&nbsp;&nbsp;');
        */
        error.appendTo($('#reg_error'));
}

</script>

<script language='JavaScript' type='text/javascript'>
  page_loc = "<?php echo $page_loc; ?>";
//<![CDATA[

function track_this_page (page_loc) {
    switch(page_loc) {
        case 'carlsbad': track_pageview('promo/golf_hotlist_2012','','golf_hotlist_2012_fe','event_register','carlsbad'); break;
        case 'phoenix': track_pageview('promo/golf_hotlist_2012','','golf_hotlist_2012_fe','event_register','phoenix'); break;
        case 'dallas': track_pageview('promo/golf_hotlist_2012','','golf_hotlist_2012_fe','event_register','dallas'); break;
        case 'sacramento': track_pageview('promo/golf_hotlist_2012','','golf_hotlist_2012_fe','event_register','sacramento'); break;
        case 'detroit': track_pageview('promo/golf_hotlist_2012','','golf_hotlist_2012_fe','event_register','detroit'); break;
        case 'atlanta': track_pageview('promo/golf_hotlist_2012','','golf_hotlist_2012_fe','event_register','atlanta'); break;
        case 'cromwell': track_pageview('promo/golf_hotlist_2012','','golf_hotlist_2012_fe','event_register','cromwell'); break;
    }   
}
track_this_page(page_loc);
//track_pageview('promo/golf_hotlist_2012','','golf_hotlist_2012','home');
//]]>
/*********** DO NOT ALTER ANYTHING BELOW THIS LINE ! ******/
var s_code=s.t();if(s_code)document.write(s_code)//--></script>
<script language=`JavaScript` type=`text/javascript`><!--
if(navigator.appVersion.indexOf('MSIE')>=0)document.write(unescape('%3C')+'\!-'+'-')
//--></script><noscript><a href=`http://www.omniture.com` title=`Web Analytics`><img
src=`http://condenast.112.2o7.net/b/ss/conde-minisites/1/H.15.1--NS/0` height=`1` width=`1` border=`0` alt=`` /></a></noscript><!--/DO NOT REMOVE/-->

<?php include 'foot.php' ?>
