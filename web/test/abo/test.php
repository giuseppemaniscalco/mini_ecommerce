<?php
		// === cURL Coding === 																		//
		//	Coding-Erweiterung zur Steuerung der Orderpositionen jeder Abobestellung				//
		//																							//		
		// Steuerungparameter/-variablen setzen
			$operation 	  = "";				// POST[operation]
			$companyCode  = "";				// POST[company]
			$source 	  = "";				// POST[source]
			$xmlStr		  = "";				// POST[data]
	       	$om_login_lcl = "test:test";	// Login OM
		//																							//

		// === cURL Einstellungen für die Übertragung von Abo-Orders === 							//
		// === cURL Bedingungen === 																//		
		// CURLOPT_RETURNTRANSFER => um den Tranfer als String zurückzuliefern, 					//
		//                           anstatt ihn direkt auszugeben. 								//
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);	
		
		// CURLOPT_POST => um einen HTTP-POST-Request abzusetzen. Dabei handelt 					//
		//                 es sich um das übliche application/x-www-form-urlencoded, 				//
		//				   wie es im Allgemeinen von HTML-Formularen erzeugt wird. 					//
        curl_setopt($ch, CURLOPT_POST, true);													
        
        // CURLOPT_POSTFIELDS => Die in einem HTTP-POST-Request zu nutzenden Daten. 				//
        //					     Um eine Datei zu posten stellen Sie dem Dateinamen @ voran;		//
        //						 bitte geben Sie den vollen Pfad zur Datei an. Als Wert kann 		//
        //						 entweder ein URL-kodierter String übergeben werden wie z.B. 		//
        //						 'para1=val1&para2=val2&...' oder ein Array, wobei die 				//
        //						 Feldnamen als Schlüssel und die Felddaten als Wert verwendet		// 
        //						 werden. Wird ein Array für value dann wird der						//
        //						 Content-Type-Header auf multipart/form-data gesetzt. 				//
        curl_setopt($ch, CURLOPT_POSTFIELDS, "operation=" . urlencode($operation) . "&company=" . urlencode(trim($companyCode)) . "&source=" . urlencode(trim($source)) . "&data=" . urlencode(trim($xmlStr)));
        
        // CURLOPT_CONNECTTIMEOUT => Die Anzahl Sekunden, die der Verbindungsaufbau maximal 		//
        //							 dauern darf; 0 hebt die Begrenzung auf. 						//
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
		
		// CURLOPT_TIMEOUT => Die maximale Ausführungszeit in Sekunden für cURL-Funktionen. 		//
		curl_setopt($ch, CURLOPT_TIMEOUT, 600);
		
		// CURLOPT_HTTPHEADER => Ein Array von HTTP-Headern, im Format 								//
		//						 array('Content-type: text/plain', 'Content-length: 100') 			//
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect: '));	// Lighty kennt kein Expect: 100-continue Header
	
	
		// Anmeldung am OM
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY); 
       	//curl_setopt($ch, CURLOPT_USERPWD, Settings::OM_USER . ":" . Settings::OM_PWD);
		curl_setopt($ch, CURLOPT_USERPWD, $om_login_lcl = "test:test";);
        
        
        $returnVal = curl_exec($ch);       
        curl_close($ch);

        if ($returnVal === false) {	// konnte Daten nicht uebertragen
        	return false;
        	//Fehler in Logdatei schreiben
        }
        else {
        	$returnVal = trim($returnVal);
        	if ($returnVal == null) {	// leere Antwort -> Fehler bei der Verarbeitung
        		return null;
        	}
        }
        //Erfolgreiche Verarbeitung wegschreiben
        return $returnVal;
 	}
 	
 	
?> 	