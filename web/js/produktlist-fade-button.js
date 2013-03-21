function DetailFadeIn(detailbutton) {
	detailbutton = "#DetailButton" + detailbutton;
	$(detailbutton).stop(true, true).fadeIn(800);
}

function DetailFadeOut(detailbutton) {
	detailbutton = "#DetailButton" + detailbutton;
	$(detailbutton).stop(true, true).fadeOut(10);
}
