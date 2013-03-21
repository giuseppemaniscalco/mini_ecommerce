/**
*	cmmp admin javascript library
*
*	Copyright (c) exsys GbR Emden
*	ALL RIGHTS RESERVED
*/


$(document).ready(function () {	// DOM is ready and can be manipulated

/*	Accordion MenuNavi Vertical Beispiel:
	<div id="MenuNaviV">
		<h1>Menu 1</h1>
		<ul><li>Navi 1</li><li>Navi 2</li><li>Navi 3</li></ul>		
		<h1>Menu 2</h1>
		<ul><li>Navi 1</li><li>Navi 2</li><li>Navi 3</li></ul>		
	</div>
*/
//	Wenn immer erstes Menu geoeffnet sein soll:
//	$("#MenuNaviV h1:first").addClass("MenuSelected");
//	$("#MenuNaviV ul:not(:first)").hide();
//	sonst das <h1> Element was die class="MenuSelected" hat:
	$("#MenuNaviV ul").hide();
	$("#MenuNaviV h1.MenuSelected").next("ul").slideDown();

	$("#MenuNaviV h1").click(function(){
		$(this).next("ul").slideToggle(300).siblings("ul:visible").slideUp(0);
		$(this).toggleClass("MenuSelected").siblings("h1").removeClass("MenuSelected");
	});

//  nur bei voll web 2.0 (kein reload) funktionierend
//	$("#MenuNaviV a").click(function(){
//		$("#MenuNaviV a.NaviSelected").removeClass("NaviSelected");
//		$(this).addClass("NaviSelected");
//	});

	/* Kalender anzeigen */
	$(function() {
		$( "#datepicker" ).datepicker({ minDate: -20, maxDate: "+1M +10D" });
	});

	/* Hilfe Standardmaessig ausschalten */
	$('.ex_HelpColor').toggleClass('ex_Hidden');
});


/* Hilfe ein/ausschalten */
function HelpSwitch() {
	$('.ex_HelpColor').toggleClass('ex_Hidden');
}


/**
*	Visible count chars
*
*	Example:
*
*	<textarea id="myText" name="myText" onkeyup="vcChars(this,20)" onchange="vcChars(this,20)" onfocus="vcChars(this,20)"></textarea>
*	<div id="vcd_myText">20</div>
*	<div id="vcc_myText">0</div>
*
*/
function vcChars(e,maxc) {
	eID = e.id;				// Element
	vcdID = "vcd_"+e.id;	// View CountDown
	vccID = "vcc_"+e.id;	// View CountChar
	c = document.getElementById(eID).value.length;
//	if(c <= maxc) {
		if (document.getElementById(vcdID)) {
			document.getElementById(vcdID).firstChild.nodeValue = maxc - document.getElementById(eID).value.length;
		}
		if (document.getElementById(vccID)) {
			document.getElementById(vccID).firstChild.nodeValue = c;
		}
//	} else {
	//		Wenn Textfeld autom. begrenzt (abgeschnitten bei kopieren) werden soll.
	//		document.getElementById(eID).value = document.getElementById(eID).value.slice(0, maxc);
	//		alert('Der Text wurde am Ende gek&uuml;rzt.');

//		if (document.getElementById(vcdID)) {
//			document.getElementById(vcdID).firstChild.nodeValue = 0;
//		}
//		if (document.getElementById(vccID)) {
//			document.getElementById(vccID).firstChild.nodeValue = c;
//		}
//	}
}


/**
*	Create DialogBox by ID
*	@param { String } elementID
*/
$.extend({
createDialogBox: function(id) {
	$box = $('#' + id);
	if (!$box.length) {
		$box = $('<div id="' + id + '"><p></p></div>').hide().appendTo('body');
	}
	return $box;
	}
}); 


/**
*	Confirm alias
*/
function cjqConfirm(title, message, txtBtnOk, txtBtnCancel, callback) {
	var defaults = {
		modal		: true,
		resizable	: false,
		buttons : [
			{ text: txtBtnOk,
			  click: function() {
						$(this).dialog("close");
						return (typeof callback == 'string') ? window.location.href = callback : callback();
					 }
			},
			{ text: txtBtnCancel,
			  click: function() {
						$(this).dialog("close");
						return false;
					 }
			}
		],
		show		: 'fade',
		hide		: 'fade',
		minHeight	: 50,
		title       : title
	}
	options = '';
	$confirm = $.createDialogBox('cjqConfirm');	
	$("p", $confirm).html(message);
	$confirm.dialog($.extend({}, defaults, options));
}
