	

Runner.pages.PageSettings.addPageEvent('placard_download', Runner.pages.constants.PAGE_ADD, "afterPageReady", function(pageObj, proxy, pageid, inlineRow, inlineObject, row ) {
	var myToday = new Date();
var myNextWeek = new Date();

var placardDatefield = Runner.getControl(pageid,'placard_date');
var meetDatefield = Runner.getControl(pageid,'meeting_date');

myNextWeek.setDate (myToday.getDate() + 8 );

placardDatefield.setValue(myToday);
meetDatefield.setValue(myNextWeek);



//SET PLACARD DATE TO SELECT RANGE TO DAY ON
var ctrl = Runner.getControl(pageid, 'placard_date');   // SET FIELD TO placard_date
var js_start = new Date(new Date().getTime());  // start today
//js_start.setHours (00,00,0);

var todaystring = js_start.getFullYear()+"-" + (js_start.getMonth()+1)+ "-" + js_start.getDate(); 

//alert (datestring);

//var js_start = new Date(new Date().getTime() + 24 * 60 * 60 * 1000);  // start tomorrow **sample**
ctrl.setAllowedInterval( todaystring, null, 'only now or future' );

//var ctrl = Runner.getControl(pageid, 'placard_date'); // get placard date
//var start_moment_date = js_start.add(7,'days'); // set begin date to next 7 day

var nextweekstr = js_start.getFullYear()+"-" + (js_start.getMonth()+1)+ "-" + (js_start.getDate()+ 8 ); 
//alert (nextweekstr) ; 

//var end_moment_date = moment().add(30,'days');  // set end date to 30 day
var ctrl2 = Runner.getControl(pageid, 'meeting_date');
ctrl2.setAllowedInterval( nextweekstr, null, 'start + 8 day ' ); // set begin and end date of field  *meeting_date*

// this is for add page only for edit page you has to keep the start date always
;
});

//	AJAX snippets

// fields events
/**
 * the context is to be edit control object
 * @param {object} pageObj
 * @param {string} pageid 	The page's or row's id
 */
Runner.pages.fieldsEvents["subject_event"] = function( pageObj, pageid, row ) {
	if ( row ) {
		row = new Runner.AjaxRow( pageObj, row );
	}
	var ret, reqParams,
		ctrl = this,
		fieldsData = {},
		params = {},
		ajax = new Runner.form.Button({ id: 'subject_event', btnName: 'subject_event' }),
		before = function() {
			var subjectCtrl = Runner.getControl(pageid,"subject");
var subjectStr = subjectCtrl.getValue();

params["choices_id"]=subjectStr ; // send this to server _ for PHP

//alert(params["choices_id"]);



//if (subjectStr = "เชิญประชุมปิดงบประจำปี" ) {
//	var contentCtrl = Runner.getControl(pageid,'content'); 
//	contentCtrl.setValue("hello this is me");

		},
		after = function( result ) {
				
//alert (result);
	var contentCtrl = Runner.getControl(pageid,'content'); 
//	contentCtrl.setValue(result["contents"]);
	var contentCtrlstr = contentCtrl.getValue();
//	var content_1 = '1.  \n';
//	content_1 = content_1 + '2. \n' ;

	if (contentCtrlstr.length == 0 ) 
		{
			contentCtrl.setValue(result["contents"]);
			alert (result["contents"]);
		}
		},
		submit = function() {
			params["table"] = "placard_download";
			params["field"] = ctrl.fieldName;
			
			( Runner.controls.ControlStorage.byId( pageid ) || [] ).forEach( function( ctrl ) {
				if ( !( ctrl instanceof  Runner.controls.MultiUploadField ) && !( ctrl instanceof Runner.controls.FileControl ) ) {
					fieldsData[ ctrl.fieldName ] = ctrl.getStringValue();
				}
			});
			
			reqParams = {
				params: JSON.stringify( params ), 
				event: "subject_event",
				pageType: pageObj.pageType,
				keys: JSON.stringify( pageObj.keys ? pageObj.keys : ( row && row.getKeys() ) ),
				fieldsData: JSON.stringify( fieldsData )
			};
			
			if ( pageObj.masterTable ) {
				reqParams.masterTable = pageObj.masterTable;
				reqParams = Runner.apply( reqParams, pageObj.masterKeys );
			}			
			
			$.post( Runner.getPageUrl("buttonhandler"), reqParams, function( result ) {
				var _result;
				try {
					_result = JSON.parse( result );
				} catch(e) {				
					Runner.displayGenericAjaxError( result );				
				}
				// execute EventAfter code
				after.call( ctrl, _result );				
			})
			.fail( function( jqXHR, textStatus, errorThrown ) {
				Runner.displayGenericAjaxError( jqXHR.responseText || textStatus + ' ' + errorThrown  );
			});			

			submit = function(){};
		};
	
	ajax.submitHandler = submit;
	ajax.submit = submit;
	// execute EventBefore code	
	ret = before.call( this );
	if ( ret === false ) {
		return;
	}

	submit();
};
