Runner.buttonEvents["pdf_button"] = function( pageObj, proxy, pageid ) {
	//register a new button
	pageObj.buttonNames[ pageObj.buttonNames.length ] = 'pdf_button';
	
	if ( !pageObj.buttonEventBefore['pdf_button'] ) {
		pageObj.buttonEventBefore['pdf_button'] = function( params, ctrl, pageObj, proxy, pageid, rowData, row, submit ) {		
			var ajax = ctrl;
// $value = "<a href=\"/data/files/" . $data["image1"];

$value = "/data/ampersand/pdf2jpg.php?pdf_name=" . $data["pdf_file1"] ;

// window.open(url1,"_blank","") ;

		}
	}
	
	if ( !pageObj.buttonEventAfter['pdf_button'] ) {
		pageObj.buttonEventAfter['pdf_button'] = function( result, ctrl, pageObj, proxy, pageid, rowData, row, params ) {
			var ajax = ctrl;
// Put your code here.
//var message = result["txt"] + " !!!";
//ajax.setMessage(message);

		}
	}
	
	$('a[id="pdf_button"]').each( function() {
		if ( $(this).closest('.gridRowAdd').length ) {
			return;
		}
		
		this.id = "pdf_button" + "_" + Runner.genId();
		
		// create object
		var button_pdf_button = new Runner.form.Button({
			id: this.id ,
			btnName: "pdf_button"
		});
		
		// init
		button_pdf_button.init( {args: [ pageObj, proxy, pageid ]} );
	});
};

