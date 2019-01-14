var info = [];
var firstname,lastname,email,address,phone,homesqft,id;
jQuery('#homes-firstname').on('blur', function() {
	if(jQuery('#homes-firstname').val() != ""){
		firstname = jQuery('#homes-firstname').val();
		posting(1);
	}
});
jQuery('#homes-lastname').on('blur', function() {
	id = jQuery('#idval').val();
	lastname = jQuery('#homes-lastname').val();
	posting(2);
});
jQuery('#homes-email').on('blur', function() {
	id = jQuery('#idval').val();
	email = jQuery('#homes-email').val();
	posting(3);
});
jQuery('#homes-phone').on('blur', function() {
	id = jQuery('#idval').val();
	phone = jQuery('#homes-phone').val();
	posting(4);
});
jQuery('#homes-address').on('blur', function() {
	id = jQuery('#idval').val();
	address = jQuery('#homes-address').val();
	posting(5);
});
jQuery('#homes-home_sqft').on('blur', function() {
	id = jQuery('#idval').val();
	homesqft = jQuery('#homes-home_sqft').val();
	posting(6);
});

function posting(i){
	var data = { 'firstname': firstname, 'lastname': lastname, 'email' : email, 'phone' : phone, 'homesqft' : homesqft, 'address' : address, 'id' : id };
	jQuery.ajax({
		   type: "POST",
           url: ajaxurl,
           data: {info: JSON.stringify(data)},
           success: function(data) {
           	   console.log(data);
               jQuery('#idval').val(data)
           }
    });
}