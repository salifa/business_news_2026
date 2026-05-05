Runner.buttonEvents["________"] = function( pageObj, proxy, pageid ) {
	//register a new button
	pageObj.buttonNames[ pageObj.buttonNames.length ] = '________';
	
	if ( !pageObj.buttonEventBefore['________'] ) {
		pageObj.buttonEventBefore['________'] = function( params, ctrl, pageObj, proxy, pageid, rowData, row, submit ) {		
			var ajax = ctrl;
// Put your code here.
alert ("hello man");

params["txt"] = "Hello";
ctrl.setMessage("Sending request to server...");
 // Uncomment the following line to prevent execution of "Server" and "Client After" events.
 return false;
		}
	}
	
	if ( !pageObj.buttonEventAfter['________'] ) {
		pageObj.buttonEventAfter['________'] = function( result, ctrl, pageObj, proxy, pageid, rowData, row, params ) {
			var ajax = ctrl;
// Put your code here.
var message = result["txt"] + " !!!";
ctrl.setMessage(message);

		}
	}
	
	$('a[id="________"]').each( function() {
		if ( $(this).closest('.gridRowAdd').length ) {
			return;
		}
		
		this.id = "________" + "_" + Runner.genId();
		
		// create object
		var button_________ = new Runner.form.Button({
			id: this.id ,
			btnName: "________"
		});
		
		// init
		button_________.init( {args: [ pageObj, proxy, pageid ]} );
	});
};

