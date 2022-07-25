jQuery(document).ready(function() {

		var trUsers = new TRUSERS();

});

class TRUSERS {

	constructor(element) {
		// create self, an instance of 'this' accessible inside inline functions
		var self = this;

    this.users_table = 		jQuery( '#users_table');
    this.update_user = 		jQuery( '#updte_user_btn');
    
		this.init();
	}

	init() {
		// create self, an instance of 'this' accessible inside inline functions
		var self = this;
       	self.users_table.html( "test" );
		// prepare data to send
		var data = {
			'action':	'get_tr_users'
		};
		// make ajax call
		jQuery.ajax({
			type:		"POST",
			url:		js_variables.ajax_url,
			data:		data,
			dataType:	'JSON'
		}).done(function( response ) {
			// successful fetch of data, update html
			self.updateuserHtml( response.users );
		}).fail(function( response ) {
			// unsuccessful fetch of data, debug info
			console.log( response );
		}).always(function() {

		});
	}

	updateuserHtml( users ) {
		// create self, an instance of 'this' accessible inside inline functions
		var self = this,
			html = '';

		// // create html for each user
		jQuery( users ).each( function() {

			var user = this, // get the user object

		    //iterate through thr data to get users info
		});

		// update html of user table
		self.users_table.html( html );
    
	}
}
