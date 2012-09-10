<?php

$names = array('carlsbad','phoenix','dallas','sacramento','detroit','atlanta','cromwell');
/*
foreach( $names as $name) {
	$url = ("https://hotlisttour/register.php?location=$name");
	echo ('http://twitter.com/intent/tweet?text='. urlencode('check out the golf hot list tour' . '&url=') . urlencode($url). "\n");		
}
*/

$url = ("http://ads.thestudio.condenast.com/hotlisttour/index.php");
echo ('http://twitter.com/intent/tweet?text='. rawurlencode('I signed up to demo top golf equipment at the 2012 @GolfDigestMag #HotListTour. Join me there: '). '&url=' . rawurlencode($url));
