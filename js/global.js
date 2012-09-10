function setVenue(id) {
    loc = locations['' + id];
    $('#venue_info').html('<h2>' + loc['city'].toUpperCase() + ', ' + loc['state'] + '</h2>'
            + '<div>' + loc['venue'] + '</div>'
            + '<div>' + loc['street'] + '</div>'
            + '<div>' + loc['display_city'] + ', ' + loc['state'] + ' ' + loc['loc_zip'] + '</div>'
            + '<h2>' + loc['event_date'] + '</h2>'
            + '<div>' + loc['event_time'] + '</div>'
            
            );
    $('#venue_details').html('<h2>EVENT DETAILS</h2>'
            + '<div>' + loc['details'] + '</div>'
            );
    $('#reserve').html('<a href="register.php?location='+ id.substr(2) +'"></a>');
}

function getVenueHtml(id) {
    loc = locations['' + id];
    rtn = '<h2>' + loc['city'].toUpperCase() + ', ' + loc['state'] + '</h2>'
            + '<div>' + loc['venue'] + '</div>'
            + '<div>' + loc['street'] + '</div>'
            + '<div>' + loc['display_city'] + ', ' + loc['state'] + ' ' + loc['loc_zip'] + '</div>'
            + '<h2>' + loc['event_date'] + '</h2>'
            + '<div>' + loc['event_time'] + '</div>'
    		+ '<h2>EVENT DETAILS</h2>'
            + '<div>' + loc['details'] + '</div>';
    return rtn;
}

function sthoverIn() {
    $('#loc_hover_img').hide();
    $('#state_hover_img').hide();
    $('#state_hover_tag').hide();
    el =  $('#loc_hover_img').hide();
    st = $('#state_hover_img').hide();
    tg = $('#state_hover_tag').hide();
    el.attr('src', 'images/yellow_dot.png');
    id = this.id;
    tp = "0px";
    lt = "0px";
    stp = "0px";
    slt = "0px";
    ttp = "0px";
    tlt = "0px";
    switch(id) {
        case 'stcarlsbad' : 
            st.attr('src', 'images/red_cali.png');
            tg.attr('src', 'images/loc_tag_carl.png');
            tp = '-690px'; lt = '324px'; 
            stp = '-693px'; slt = '266.5px'; 
            ttp = '-706px'; tlt = '64px'; 
            break;
        case 'stphoenix' : 
            st.attr('src', 'images/red_az.png');
            tg.attr('src', 'images/loc_tag_phoe.png');
            tp = '-642px'; lt = '363px'; 
            stp = '-639px'; slt = '317px'; 
            ttp = '-657px'; tlt = '110px'; 
            break;
        case 'stdallas' : 
            st.attr('src', 'images/red_tx.png');
            tg.attr('src', 'images/loc_tag_dall.png');
            tp = '-665px'; lt = '467px'; 
            stp = '-619.5px'; slt = '375px'; 
            ttp = '-683px'; tlt = '160px'; 
            break;
        case 'stsacramento' : 
            st.attr('src', 'images/red_cali.png');
            tg.attr('src', 'images/loc_tag_sacr.png');
            tp = '-740px'; lt = '303px'; 
            stp = '-693px'; slt = '266.5px'; 
            ttp = '-755px'; tlt = '46px'; 
            break;
        case 'stdetroit' : 
            st.attr('src', 'images/red_mi.png');
            tg.attr('src', 'images/loc_tag_detr.png');
            tp = '-710px'; lt = '555px'; 
            stp = '-720px'; slt = '487.5px'; 
            ttp = '-726px'; tlt = '295px'; 
            break;
        case 'statlanta' : 
            st.attr('src', 'images/red_ga.png');
            tg.attr('src', 'images/loc_tag_atla.png');
            tp = '-625px'; lt = '565px'; 
            stp = '-613.5px'; slt = '530.5px'; 
            ttp = '-641px'; tlt = '317px'; 
            break;
        case 'stcromwell' : 
            st.attr('src', 'images/red_ct.png');
            tg.attr('src', 'images/loc_tag_crom.png');
            tp = '-700px'; lt = '630px'
            stp = '-718px'; slt = '601px';
            ttp = '-716px'; tlt = '411px';
            break;
    }
    el.css('top',tp);
    el.css('left',lt);
    st.css('top',stp);
    st.css('left',slt);
    tg.css('top',ttp);
    tg.css('left',tlt);
    setVenue(id);
    st.fadeIn(400);
    el.fadeIn(400);
    tg.fadeIn(400);
 }

function sthoverOut() {
    el =  $('#loc_hover_img');
    st = $('#state_hover_img');
    tag = $('#state_hover_tag');
    el.hide();
    st.hide();
    tag.hide();
 }

function setLocationInfo(loc) {
    el = $('#reg_event_info');
    img_path = "images/";
    switch(loc) {
        case 'carlsbad': img_path += "event_carl.jpg"; break;
        case 'phoenix': img_path += "event_phoe.jpg"; break;
        case 'dallas': img_path += "event_dall.jpg"; break;
        case 'sacramento': img_path += "event_sacr.jpg"; break;
        case 'detroit': img_path += "event_detr.jpg"; break;
        case 'atlanta': img_path += "event_atla.jpg"; break;
        case 'cromwell': img_path += "event_crom.jpg"; break;
        default: img_path += "event_carl.jpg";
    }

    el.attr('src', img_path);
}

function loadGMap(map) {
	$(map).insertAfter('#venue_details');
}

function setShareLinks(loc) {
	$('#share_twit').attr('href','http://www.condenastdigital.com/go/golf_hotlist_2012/event_' + loc +'/twitter');
	$('#share_fb').attr('href','http://www.condenastdigital.com/go/golf_hotlist_2012/event_' + loc + '/facebook');
    $('#share_email').attr('href','http://www.condenastdigital.com/go/golf_hotlist_2012/event_' + loc + '/email');
}

function setSlide(num) {
	slidesrc = 'images/slide_' + num + '.jpg?';
	ctlsrc = 'images/slide_ctl_' + num + '.jpg?';
	sl = document.getElementById('slide') 
	ctl = document.getElementById('slide_ctl');
    sl.src = slidesrc;
    ctl.src = ctlsrc;
}
