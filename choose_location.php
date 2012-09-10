<?php include 'head.php' ?>

<ul id="location_links">
    <li id='clcarlsbad' ><a href="register.php?location=carlsbad">&nbsp;</a></li>
    <li id='clphoenix' ><a href="register.php?location=phoenix">&nbsp;</a></li>
    <li id='cldallas'><a href="register.php?location=dallas">&nbsp;</a></li>
    <li id='clsacramento'><a href="register.php?location=sacramento">&nbsp;</a></li>
    <li id='cldetroit'><a href="register.php?location=detroit">&nbsp;</a></li>
    <li id='clatlanta'><a href="register.php?location=atlanta">&nbsp;</a></li>
    <li id='clcromwell'><a href="register.php?location=cromwell">&nbsp;</a></li>
</ul>

<script>
$(document).ready( function() {
    var items =  $('#location_links').find('li');
    items.each( function(index, el) { 
        tmp = '#' + this.id;
        $(tmp).hover(clhoverIn,clhoverOut);
    });

    $('#nav_links').css('background','url("images/menu_reg.jpg")');
 });
 
function clhoverIn() {
    el =  $('#choose_hover_img');
    el_link = $('#dotlink');
    el.hide();
    id = this.id;
    tp = "0px";
    lt = "0px";
    switch(id) {
        case 'clcarlsbad' : tp = '-649px'; lt = '181px'; break;
        case 'clphoenix'  : tp = '-672px'; lt = '387px'; break;
        case 'cldallas' : tp = '-711px'; lt = '646px'; break;
        case 'clsacramento' : tp = '-735px'; lt = '801px'; break;
        case 'cldetroit' : tp = '-373px'; lt = '271px'; break;
        case 'clatlanta' : tp = '-413px'; lt = '479px'; break;
        case 'clcromwell' : tp = '-420px'; lt = '758px'; break;
    }
    href = 'register.php?location=' + id.substr(2);
    el_link.attr('href',href);
    el.css('top',tp);
    el.css('left',lt);
    el.fadeIn(200);
 }
 
function clhoverOut() {
    el =  $('#choose_hover_img');
    el.delay(400).fadeOut(50);
 }
</script>
<!-- OMNITURE TRACKING -->
<script language='JavaScript' type='text/javascript'>
//<![CDATA[
track_pageview('promo/golf_hotlist_2012','','golf_hotlist_2012','register_now');
//]]>
/*********** DO NOT ALTER ANYTHING BELOW THIS LINE ! ******/
var s_code=s.t();if(s_code)document.write(s_code)//--></script>
<script language=`JavaScript` type=`text/javascript`><!--
if(navigator.appVersion.indexOf('MSIE')>=0)document.write(unescape('%3C')+'\!-'+'-')
//--></script><noscript><a href=`http://www.omniture.com` title=`Web Analytics`><img
src=`http://condenast.112.2o7.net/b/ss/conde-minisites/1/H.15.1--NS/0` height=`1` width=`1` border=`0` alt=`` /></a></noscript><!--/DO NOT REMOVE/-->

<?php include 'foot.php' ?>
