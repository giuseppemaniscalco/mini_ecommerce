$(document).ready(function(){
    
	// accordion functions
	var accordion = $("#stepForm").accordion({
            autoHeight: false
        });

        //accordion.accordion( 'activate' , 4);
        
	var current = 0;

	$.validator.addMethod("pageRequired", function(value, element) {                
                if((current==4&&value=='ja')||(current!=4)){
                    //alert('true-test-' + current + ' - ' + value + '-' + $(element).parents("#sf1").length + '-' + $(element).parents("#sf2").length + '-' + $(element).parents("#sf3").length + '-' + $(element).parents("#sf4").length + '-' + $(element).parents("#sf5").length);
                    return true;
                }else{
                    //alert('false-test-' + current + ' - ' + value + '-' + $(element).parents("#sf1").length + '-' + $(element).parents("#sf2").length + '-' + $(element).parents("#sf3").length + '-' + $(element).parents("#sf4").length + '-' + $(element).parents("#sf5").length);
                    return false;
                }
	}, $.validator.messages.required);


        $.validator.addMethod("orderAddressRequired", function(value, element) {
                if(current==3&&$('#alt_adress').value=='ja'&&value!='') {
                    //alert('false-test-' + current + ' - ' + value + '-' + $(element).parents("#sf1").length + '-' + $(element).parents("#sf2").length + '-' + $(element).parents("#sf3").length + '-' + $(element).parents("#sf4").length + '-' + $(element).parents("#sf5").length);
                    return false;
                } else {
                    //alert('true-test-' + current + ' - ' + value + '-' + $(element).parents("#sf1").length + '-' + $(element).parents("#sf2").length + '-' + $(element).parents("#sf3").length + '-' + $(element).parents("#sf4").length + '-' + $(element).parents("#sf5").length);
                    return true;
                }
	}, $.validator.messages.required);

        $.validator.addMethod("addressRequired", function(value, element) {
                if(current==2) {
                    if(value=='') {
                        //alert('false-test-' + current + ' - ' + value + '-' + $(element).parents("#sf1").length + '-' + $(element).parents("#sf2").length + '-' + $(element).parents("#sf3").length + '-' + $(element).parents("#sf4").length + '-' + $(element).parents("#sf5").length);
                        return false;
                    } else {
                       //alert('.true-test-' + current + ' - ' + value + '-' + $(element).parents("#sf1").length + '-' + $(element).parents("#sf2").length + '-' + $(element).parents("#sf3").length + '-' + $(element).parents("#sf4").length + '-' + $(element).parents("#sf5").length);
                       return true;
                    }
                } else {
                    //alert('true-test-' + current + ' - ' + value + '-' + $(element).parents("#sf1").length + '-' + $(element).parents("#sf2").length + '-' + $(element).parents("#sf3").length + '-' + $(element).parents("#sf4").length + '-' + $(element).parents("#sf5").length);
                    return true;
                }
	}, $.validator.messages.required);

        $.validator.addMethod("addressEmailRequired", function(value, element) {
                            if(current!=2) {
                                return true;
                            } else {
                                return this.email(value, element);
                            }
                    }, $.validator.messages.required);


        var v = $("#lieferadresse").validate({
		errorClass: "warning",
                rules: {
                    LOGIN_NAME: {
                        addressRequired: true,
                        email: true
                    },
                    TERMSANDCONDITIONS: { pageRequired: true },

                    TITLE: { addressRequired: true },
                    LAST_NAME: { addressRequired: true },
                    FIRST_NAME: { addressRequired: true },
                    STREET: { addressRequired: true },
                    ZIP: { addressRequired: true },
                    CITY: { addressRequired: true },

                    DLV_TITLE: { orderAddressRequired: true },
                    DLV_LAST_NAME: { orderAddressRequired: true },
                    DLV_FIRST_NAME: { orderAddressRequired: true },
                    DLV_ADDITIONAL_ADDRESS: { orderAddressRequired: true },
                    DLVR_STREET: { orderAddressRequired: true },
                    DLVR_ZIP: { orderAddressRequired: true },
                    DLVR_CITY: { orderAddressRequired: true },
                    DLVR_COUNTRY: { orderAddressRequired: true }
                },
                //set messages to appear inline
                messages: {
                    LOGIN_NAME: "Bitte eine g&uuml;tige E-Mail Adresse angeben!",
                    TERMSANDCONDITIONS: "Bitte akzeptiere unsere Spielregeln (AGB)."
                },
		onkeyup: false,
		onblur: false,
		submitHandler: function() {
			//alert("Submitted, thanks!");
                        form.submit();
		}
	});

	// back buttons do not need to run validation
	$("#sf2 .prevbutton").click(function(){
		accordion.accordion("activate", 0);
		current = 0;
	});
	$("#sf3 .prevbutton").click(function(){
		accordion.accordion("activate", 1);
		current = 1;
	});
        $("#sf4 .prevbutton").click(function(){
		accordion.accordion("activate", 2);
		current = 2;
	});
        $("#sf5 .prevbutton").click(function(){
		accordion.accordion("activate", 3);
		current = 3;
	});
	// these buttons all run the validation, overridden by specific targets above
        $(".open5").click(function() {
	  //if (v.form()) {
          if(v.validate().element("#agb")) {
	    accordion.accordion("activate", 5);
	    current = 5;
	  }
	});
        $(".open4").click(function() {
	  if (v.form()) {
	    accordion.accordion("activate", 4);
	    current = 4;
	  }
	});
        $(".open3").click(function() {
	  if (v.form()) {
	    accordion.accordion("activate", 3);
	    current = 3;
	  }
	});
	$(".open2").click(function() {
	  //if (v.form()) {
	    accordion.accordion("activate", 2);
	    current = 2;
	  //}
	});
	$(".open1").click(function() {
	  //if (v.form()) {
	    accordion.accordion("activate", 1);
	    current = 1;
	  //}
	});
        $(".open0").click(function() {
	  //if (v.form()) {
	    accordion.accordion("activate", 0);
	    current = 0;
	  //}
	});

});