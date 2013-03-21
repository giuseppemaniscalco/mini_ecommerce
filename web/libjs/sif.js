/**
*	Copyright (c) exsys GbR Emden
*	Version 1.1.0
**/


/**
---------
Hinweise:
---------

Stellt eine Select-Box dar mit vordefinierten Werten.
Wenn andere Eingaben gewuenscht werden, kann man auf ein Input-Feld unschalten.

Anwendungsmoeglichkeiten: Immer wenn oefter die selben Eingaben gemacht werden, aber ab und zu andere.

---------------------

Einbinden mit:

<script src="../libjs/sif.js" language="javascript" type="text/javascript"></script>

---------------------

Aufruf mit:

<script type="text/javascript" language="javascript">
<!--
	//  Bitte die noscript Angaben nicht vergessen!
	var SIF_FieldName = "MeinFeld"; // Feldname
	var SIF_InitValue = ""; // Vorgabe, der IST Zustand
	var SIF_MyFavorites = new Array("Text#1","Text#2","Text#3"); // Auswahlmoeglichkeiten
	var SIF_MaxLength = 255; // Max. Eingabezeichen
	var SIF_Width = 400; // Angabe in Pixel
	var SIF_SelectRows = 1; // Anz der Zeilen der Select Box (min. 1)
	var SIF_cssClass = ""; // Klassen-Angabe z.B.: "class1" oder "class1 class2" bei mehreren Klassen
	var SIF_cssStyle = ""; // z.B.: SIF_cssStyle = "border:none; background-color:#A00000;"
	var SIF_SwitchText = "- andere Eingabe -";
	var SIF_Disabled = 0; // 1 wenn Eingabefeld gesperrt sein soll

	SIF_SelectInputField(SIF_FieldName,SIF_InitValue,SIF_MyFavorites,SIF_MaxLength,SIF_Width,SIF_SelectRows,SIF_cssClass,SIF_cssStyle,SIF_SwitchText,SIF_Disabled);
//-->
</script>
<noscript>
	<input type="text" name="MeinFeld" value="" maxlength="">
</noscript>

*/


function SIF_value_in_array(fromDB,results) {
	if (fromDB == "") { return true; }
	for (var i = 0; i < results.length; ++i) {
		if (results[i] == fromDB) { return true; }
	}
	return false;
}

function SIF_SelectInputField(fieldName,fromDB,results,maxLength,width,selectRows,cssClass,cssStyle,switchText,disabled) {
	var s = '';
	var css = '';
	var sDisabled = '';

	if (results.length == 0) { results[0] = "";	}
	if (maxLength < 1) { maxLength = 1; }
	if (maxLength > 255) { maxLength = 255; }
	if (width < 1) { width = 1; }
	if (selectRows < 1) { selectRows = 1; }
	if (cssClass != "") { cssClass = ' class="' + cssClass + '" '; }
	if (switchText == "") { switchText = "..."; }
	if (disabled == 1) { sDisabled = ' DISABLED'; }

	if (SIF_value_in_array(fromDB,results)) {
		css = ' style="'+cssStyle+' visibility:visible; height:auto; overflow:auto; width:'+width+'px;" ';
	} else {
		css = ' style="visibility:hidden; height:1px; width:1px; overflow:hidden;" ';
	}
	s = s + '<select name="Blind'+fieldName+'" id="Blind'+fieldName+'" size="'+selectRows+'" onChange="SIF_change_select(\''+fieldName+'\''+','+width+')" '+cssClass+css+sDisabled+'>';

	for (var i = 0; i < results.length; ++i) {
		if (fromDB == results[i]) {
			s = s + '<option value="' + results[i] + '" selected>' + results[i] + '</option>';
		} else {
			s = s + '<option value="' + results[i] + '">' + results[i] + '</option>';
		}
	}
	s = s + '<option value="'+fieldName+'SWITCH">'+switchText+'</option>';
	s = s + '</select>';
	if (SIF_value_in_array(fromDB,results)) {
		css = 'style="visibility:hidden; height:1px; width:1px; overflow:hidden;"';
	} else {
		css = 'style="'+cssStyle+' visibility:visible; height:auto; width:'+width+'px; overflow:auto;"';
	}
	s = s + '<input type="text" name="Blind'+fieldName+'2" id="Blind'+fieldName+'2" maxlength="'+maxLength+'" onblur="SIF_change_text(\''+fieldName+'\')" value="'+fromDB+'" '+cssClass+css+'>';

	document.write(s);

	if (fromDB == "") {
		document.write('<input type="hidden" name="'+fieldName+'" id="'+fieldName+'" value="' + results[0] + '">');
	} else {
		document.write('<input type="hidden" name="'+fieldName+'" id="'+fieldName+'" value="' + fromDB + '">');
	}

}

function SIF_change_select(fieldName,width) {
	var selectValue = document.getElementById("Blind"+fieldName).value;
	
	if (selectValue == fieldName+"SWITCH") {
		document.getElementById("Blind"+fieldName).style.visibility = "hidden";
		document.getElementById("Blind"+fieldName).style.width = "1px";
		document.getElementById("Blind"+fieldName).style.height = "1px";
		document.getElementById("Blind"+fieldName).style.overflow = "hidden";

		document.getElementById("Blind"+fieldName+"2").style.visibility = "visible";
		document.getElementById("Blind"+fieldName+"2").style.width = width;
		document.getElementById("Blind"+fieldName+"2").style.height = "auto";
		document.getElementById("Blind"+fieldName+"2").style.overflow = "auto";

		document.getElementById("Blind"+fieldName+"2").focus();
	} else {
		document.getElementById(fieldName).value = selectValue;
	}
}

function SIF_change_text(fieldName) {
	document.getElementById(fieldName).value = document.getElementById("Blind"+fieldName+"2").value;
}
