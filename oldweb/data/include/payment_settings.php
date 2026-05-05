<?php
$tdatapayment = array();
$tdatapayment[".searchableFields"] = array();
$tdatapayment[".ShortName"] = "payment";
$tdatapayment[".OwnerID"] = "owner_id";
$tdatapayment[".OriginalTable"] = "payment";


$tdatapayment[".pagesByType"] = my_json_decode( "{\"add\":[\"add\"],\"list\":[\"list\"],\"search\":[\"search\"],\"view\":[\"view\"]}" );
$tdatapayment[".originalPagesByType"] = $tdatapayment[".pagesByType"];
$tdatapayment[".pages"] = types2pages( my_json_decode( "{\"add\":[\"add\"],\"list\":[\"list\"],\"search\":[\"search\"],\"view\":[\"view\"]}" ) );
$tdatapayment[".originalPages"] = $tdatapayment[".pages"];
$tdatapayment[".defaultPages"] = my_json_decode( "{\"add\":\"add\",\"list\":\"list\",\"search\":\"search\",\"view\":\"view\"}" );
$tdatapayment[".originalDefaultPages"] = $tdatapayment[".defaultPages"];

//	field labels
$fieldLabelspayment = array();
$fieldToolTipspayment = array();
$pageTitlespayment = array();
$placeHolderspayment = array();

if(mlang_getcurrentlang()=="English")
{
	$fieldLabelspayment["English"] = array();
	$fieldToolTipspayment["English"] = array();
	$placeHolderspayment["English"] = array();
	$pageTitlespayment["English"] = array();
	$fieldLabelspayment["English"]["id"] = "Id";
	$fieldToolTipspayment["English"]["id"] = "";
	$placeHolderspayment["English"]["id"] = "";
	$fieldLabelspayment["English"]["owner_id"] = "Owner Id";
	$fieldToolTipspayment["English"]["owner_id"] = "";
	$placeHolderspayment["English"]["owner_id"] = "";
	$fieldLabelspayment["English"]["paydate"] = "Paydate";
	$fieldToolTipspayment["English"]["paydate"] = "";
	$placeHolderspayment["English"]["paydate"] = "";
	$fieldLabelspayment["English"]["paytime"] = "Paytime";
	$fieldToolTipspayment["English"]["paytime"] = "";
	$placeHolderspayment["English"]["paytime"] = "";
	$fieldLabelspayment["English"]["amount"] = "Amount";
	$fieldToolTipspayment["English"]["amount"] = "";
	$placeHolderspayment["English"]["amount"] = "";
	$fieldLabelspayment["English"]["slip_upload"] = "Slip Upload";
	$fieldToolTipspayment["English"]["slip_upload"] = "";
	$placeHolderspayment["English"]["slip_upload"] = "";
	$fieldLabelspayment["English"]["remark"] = "Remark";
	$fieldToolTipspayment["English"]["remark"] = "";
	$placeHolderspayment["English"]["remark"] = "";
	$fieldLabelspayment["English"]["admin_confirm"] = "Admin Confirm";
	$fieldToolTipspayment["English"]["admin_confirm"] = "";
	$placeHolderspayment["English"]["admin_confirm"] = "";
	if (count($fieldToolTipspayment["English"]))
		$tdatapayment[".isUseToolTips"] = true;
}
if(mlang_getcurrentlang()=="Thai")
{
	$fieldLabelspayment["Thai"] = array();
	$fieldToolTipspayment["Thai"] = array();
	$placeHolderspayment["Thai"] = array();
	$pageTitlespayment["Thai"] = array();
	$fieldLabelspayment["Thai"]["id"] = "Id";
	$fieldToolTipspayment["Thai"]["id"] = "";
	$placeHolderspayment["Thai"]["id"] = "";
	$fieldLabelspayment["Thai"]["owner_id"] = "Owner Id";
	$fieldToolTipspayment["Thai"]["owner_id"] = "";
	$placeHolderspayment["Thai"]["owner_id"] = "";
	$fieldLabelspayment["Thai"]["paydate"] = "Paydate";
	$fieldToolTipspayment["Thai"]["paydate"] = "";
	$placeHolderspayment["Thai"]["paydate"] = "";
	$fieldLabelspayment["Thai"]["paytime"] = "Paytime";
	$fieldToolTipspayment["Thai"]["paytime"] = "";
	$placeHolderspayment["Thai"]["paytime"] = "";
	$fieldLabelspayment["Thai"]["amount"] = "Amount";
	$fieldToolTipspayment["Thai"]["amount"] = "";
	$placeHolderspayment["Thai"]["amount"] = "";
	$fieldLabelspayment["Thai"]["slip_upload"] = "Slip Upload";
	$fieldToolTipspayment["Thai"]["slip_upload"] = "";
	$placeHolderspayment["Thai"]["slip_upload"] = "";
	$fieldLabelspayment["Thai"]["remark"] = "Remark";
	$fieldToolTipspayment["Thai"]["remark"] = "";
	$placeHolderspayment["Thai"]["remark"] = "";
	$fieldLabelspayment["Thai"]["admin_confirm"] = "Admin Confirm";
	$fieldToolTipspayment["Thai"]["admin_confirm"] = "";
	$placeHolderspayment["Thai"]["admin_confirm"] = "";
	if (count($fieldToolTipspayment["Thai"]))
		$tdatapayment[".isUseToolTips"] = true;
}


	$tdatapayment[".NCSearch"] = true;



$tdatapayment[".shortTableName"] = "payment";
$tdatapayment[".nSecOptions"] = 1;

$tdatapayment[".mainTableOwnerID"] = "owner_id";
$tdatapayment[".entityType"] = 0;
$tdatapayment[".connId"] = "vnnsbiz_at_192_168_1_111";


$tdatapayment[".strOriginalTableName"] = "payment";

	



$tdatapayment[".showAddInPopup"] = false;

$tdatapayment[".showEditInPopup"] = false;

$tdatapayment[".showViewInPopup"] = false;

$tdatapayment[".listAjax"] = false;
//	temporary
//$tdatapayment[".listAjax"] = false;

	$tdatapayment[".audit"] = false;

	$tdatapayment[".locking"] = false;


$pages = $tdatapayment[".defaultPages"];

if( $pages[PAGE_EDIT] ) {
	$tdatapayment[".edit"] = true;
	$tdatapayment[".afterEditAction"] = 0;
	$tdatapayment[".closePopupAfterEdit"] = 1;
	$tdatapayment[".afterEditActionDetTable"] = "";
}

if( $pages[PAGE_ADD] ) {
$tdatapayment[".add"] = true;
$tdatapayment[".afterAddAction"] = 0;
$tdatapayment[".closePopupAfterAdd"] = 1;
$tdatapayment[".afterAddActionDetTable"] = "Detail tables not found!";
}

if( $pages[PAGE_LIST] ) {
	$tdatapayment[".list"] = true;
}



$tdatapayment[".strSortControlSettingsJSON"] = "";




if( $pages[PAGE_VIEW] ) {
$tdatapayment[".view"] = true;
}

if( $pages[PAGE_IMPORT] ) {
$tdatapayment[".import"] = true;
}

if( $pages[PAGE_EXPORT] ) {
$tdatapayment[".exportTo"] = true;
}

if( $pages[PAGE_PRINT] ) {
$tdatapayment[".printFriendly"] = true;
}



$tdatapayment[".showSimpleSearchOptions"] = true; // temp fix #13449

// Allow Show/Hide Fields in GRID
$tdatapayment[".allowShowHideFields"] = true; // temp fix #13449
//

// Allow Fields Reordering in GRID
$tdatapayment[".allowFieldsReordering"] = true; // temp fix #13449
//

$tdatapayment[".isUseAjaxSuggest"] = true;

$tdatapayment[".rowHighlite"] = true;



																		

$tdatapayment[".ajaxCodeSnippetAdded"] = false;

$tdatapayment[".buttonsAdded"] = false;

$tdatapayment[".addPageEvents"] = false;

// use timepicker for search panel
$tdatapayment[".isUseTimeForSearch"] = true;


$tdatapayment[".badgeColor"] = "e07878";


$tdatapayment[".allSearchFields"] = array();
$tdatapayment[".filterFields"] = array();
$tdatapayment[".requiredSearchFields"] = array();

$tdatapayment[".googleLikeFields"] = array();
$tdatapayment[".googleLikeFields"][] = "id";
$tdatapayment[".googleLikeFields"][] = "owner_id";
$tdatapayment[".googleLikeFields"][] = "paydate";
$tdatapayment[".googleLikeFields"][] = "paytime";
$tdatapayment[".googleLikeFields"][] = "amount";
$tdatapayment[".googleLikeFields"][] = "slip_upload";
$tdatapayment[".googleLikeFields"][] = "remark";
$tdatapayment[".googleLikeFields"][] = "admin_confirm";



$tdatapayment[".tableType"] = "list";

$tdatapayment[".printerPageOrientation"] = 0;
$tdatapayment[".nPrinterPageScale"] = 100;

$tdatapayment[".nPrinterSplitRecords"] = 40;

$tdatapayment[".geocodingEnabled"] = false;










$tdatapayment[".pageSize"] = 20;

$tdatapayment[".warnLeavingPages"] = true;



$tstrOrderBy = "ORDER BY id DESC";
$tdatapayment[".strOrderBy"] = $tstrOrderBy;

$tdatapayment[".orderindexes"] = array();
	$tdatapayment[".orderindexes"][] = array(1, (0 ? "ASC" : "DESC"), "id");



$tdatapayment[".sqlHead"] = "SELECT id,  owner_id,  paydate,  paytime,  amount,  slip_upload,  remark,  admin_confirm";
$tdatapayment[".sqlFrom"] = "FROM payment";
$tdatapayment[".sqlWhereExpr"] = "";
$tdatapayment[".sqlTail"] = "";










//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatapayment[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatapayment[".arrGroupsPerPage"] = $arrGPP;

$tdatapayment[".highlightSearchResults"] = true;

$tableKeyspayment = array();
$tableKeyspayment[] = "id";
$tdatapayment[".Keys"] = $tableKeyspayment;


$tdatapayment[".hideMobileList"] = array();




//	id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "id";
	$fdata["GoodName"] = "id";
	$fdata["ownerTable"] = "payment";
	$fdata["Label"] = GetFieldLabel("payment","id");
	$fdata["FieldType"] = 3;


		$fdata["AutoInc"] = true;

	
			

		$fdata["strField"] = "id";

	
		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "id";

	
	
				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "Custom");

	
	
	
	
	
	
	
	
	
	
	
		
	
	
	
		$vdata["truncateText"] = true;
	$vdata["NumberOfChars"] = 80;

	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
		$edata["weekdayMessage"] = array("message" => "", "messageType" => "Text");
	$edata["weekdays"] = "[]";


	
	



		$edata["IsRequired"] = true;

	
	
	
			$edata["acceptFileTypes"] = ".+$";
		$edata["acceptFileTypesHtml"] = "";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
		
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
				$edata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");
						$edata["validateAs"]["basicValidate"][] = "IsRequired";
		
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings


//Filters settings
	$fdata["filterTotals"] = 0;
		$fdata["filterMultiSelect"] = 0;
			$fdata["filterFormat"] = "Values list";
		$fdata["showCollapsed"] = false;

		$fdata["sortValueType"] = 0;
		$fdata["numberOfVisibleItems"] = 10;

		$fdata["filterBy"] = 0;

	

	
	
//end of Filters settings


	$tdatapayment["id"] = $fdata;
		$tdatapayment[".searchableFields"][] = "id";
//	owner_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "owner_id";
	$fdata["GoodName"] = "owner_id";
	$fdata["ownerTable"] = "payment";
	$fdata["Label"] = GetFieldLabel("payment","owner_id");
	$fdata["FieldType"] = 200;


	
	
			

		$fdata["strField"] = "owner_id";

	
		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "owner_id";

	
	
				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
		
	
		$vdata["NeedEncode"] = true;

	
		$vdata["truncateText"] = true;
	$vdata["NumberOfChars"] = 80;

	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Readonly");

	
		$edata["weekdayMessage"] = array("message" => "", "messageType" => "Text");
	$edata["weekdays"] = "[]";


	
	



	
	
	
	
			$edata["acceptFileTypes"] = ".+$";
		$edata["acceptFileTypesHtml"] = "";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
	
	
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
							
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings


//Filters settings
	$fdata["filterTotals"] = 0;
		$fdata["filterMultiSelect"] = 0;
		$fdata["filterTotalFields"] = "id";
		$fdata["filterFormat"] = "Values list";
		$fdata["showCollapsed"] = false;

		$fdata["sortValueType"] = 0;
		$fdata["numberOfVisibleItems"] = 10;

		$fdata["filterBy"] = 0;

	

	
	
//end of Filters settings


	$tdatapayment["owner_id"] = $fdata;
		$tdatapayment[".searchableFields"][] = "owner_id";
//	paydate
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "paydate";
	$fdata["GoodName"] = "paydate";
	$fdata["ownerTable"] = "payment";
	$fdata["Label"] = GetFieldLabel("payment","paydate");
	$fdata["FieldType"] = 7;


	
	
			

		$fdata["strField"] = "paydate";

	
		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "paydate";

	
	
				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "Short Date");

	
	
	
	
	
	
	
	
	
	
	
		
	
		$vdata["NeedEncode"] = true;

	
		$vdata["truncateText"] = true;
	$vdata["NumberOfChars"] = 80;

	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Date");

	
		$edata["weekdayMessage"] = array("message" => "Invalid week day", "messageType" => "Text");
	$edata["weekdays"] = "[]";


	
	



	
	
	
	
			$edata["acceptFileTypes"] = ".+$";
		$edata["acceptFileTypesHtml"] = "";

		$edata["maxNumberOfFiles"] = 1;

	
	
		$edata["DateEditType"] = 2;
	$edata["InitialYearFactor"] = 0;
	$edata["LastYearFactor"] = 10;

	
	
	
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Equals";

			// the default search options list
				$fdata["searchOptionsList"] = array("Equals", "More than", "Less than", "Between", EMPTY_SEARCH, NOT_EMPTY );
// the end of search options settings


//Filters settings
	$fdata["filterTotals"] = 0;
		$fdata["filterMultiSelect"] = 0;
		$fdata["filterTotalFields"] = "id";
		$fdata["filterFormat"] = "Values list";
		$fdata["showCollapsed"] = false;

		$fdata["sortValueType"] = 0;
		$fdata["numberOfVisibleItems"] = 10;

		$fdata["filterBy"] = 0;

	

	
	
//end of Filters settings


	$tdatapayment["paydate"] = $fdata;
		$tdatapayment[".searchableFields"][] = "paydate";
//	paytime
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "paytime";
	$fdata["GoodName"] = "paytime";
	$fdata["ownerTable"] = "payment";
	$fdata["Label"] = GetFieldLabel("payment","paytime");
	$fdata["FieldType"] = 134;


	
	
			

		$fdata["strField"] = "paytime";

	
		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "paytime";

	
	
				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "Time");

	
	
	
	
	
	
	
	
	
	
	
		
		$vdata["timeFormatData"] = array(
		"showSeconds" => false,
		"showDaysInTotals" => false,
		"timeFormat" => 0
	);
	$vdata["timeFormatData"]["showSeconds"] = true;
	$vdata["timeFormatData"]["showDaysInTotals"] = true;

		$vdata["NeedEncode"] = true;

	
		$vdata["truncateText"] = true;
	$vdata["NumberOfChars"] = 80;

	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Time");

	
		$edata["weekdayMessage"] = array("message" => "", "messageType" => "Text");
	$edata["weekdays"] = "[]";


	
	



	
	
	
	
			$edata["acceptFileTypes"] = ".+$";
		$edata["acceptFileTypesHtml"] = "";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
	
		$edata["EditParams"] = "";
		
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
				$edata["validateAs"]["basicValidate"][] = getJsValidatorName("Time");
							
	
	//	End validation

	
			
				$hours = 24;
	$edata["FormatTimeAttrs"] = array("useTimePicker" => 1,
									  "hours" => $hours,
									  "minutes" => 1,
									  "showSeconds" => 0);

	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Equals";

			// the default search options list
				$fdata["searchOptionsList"] = array("Equals", "More than", "Less than", "Between", EMPTY_SEARCH, NOT_EMPTY );
// the end of search options settings


//Filters settings
	$fdata["filterTotals"] = 0;
		$fdata["filterMultiSelect"] = 0;
			$fdata["filterFormat"] = "Values list";
		$fdata["showCollapsed"] = false;

		$fdata["sortValueType"] = 0;
		$fdata["numberOfVisibleItems"] = 10;

		$fdata["filterBy"] = 0;

	

	
	
//end of Filters settings


	$tdatapayment["paytime"] = $fdata;
		$tdatapayment[".searchableFields"][] = "paytime";
//	amount
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "amount";
	$fdata["GoodName"] = "amount";
	$fdata["ownerTable"] = "payment";
	$fdata["Label"] = GetFieldLabel("payment","amount");
	$fdata["FieldType"] = 3;


	
	
			

		$fdata["strField"] = "amount";

	
		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "amount";

	
	
				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
		
	
		$vdata["NeedEncode"] = true;

	
		$vdata["truncateText"] = true;
	$vdata["NumberOfChars"] = 80;

	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
		$edata["weekdayMessage"] = array("message" => "", "messageType" => "Text");
	$edata["weekdays"] = "[]";


	
	



	
	
	
	
			$edata["acceptFileTypes"] = ".+$";
		$edata["acceptFileTypesHtml"] = "";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "number";

		$edata["EditParams"] = "";
		
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
				$edata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");
							
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings


//Filters settings
	$fdata["filterTotals"] = 0;
		$fdata["filterMultiSelect"] = 0;
		$fdata["filterTotalFields"] = "id";
		$fdata["filterFormat"] = "Values list";
		$fdata["showCollapsed"] = false;

		$fdata["sortValueType"] = 0;
		$fdata["numberOfVisibleItems"] = 10;

	
	
	
//end of Filters settings


	$tdatapayment["amount"] = $fdata;
		$tdatapayment[".searchableFields"][] = "amount";
//	slip_upload
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
	$fdata["strName"] = "slip_upload";
	$fdata["GoodName"] = "slip_upload";
	$fdata["ownerTable"] = "payment";
	$fdata["Label"] = GetFieldLabel("payment","slip_upload");
	$fdata["FieldType"] = 200;


	
	
			

		$fdata["strField"] = "slip_upload";

	
		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "slip_upload";

	
	
				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "Document Download");

	
	
	
								$vdata["ShowIcon"] = true;
		
	
	
	
	
	
	
	
		
	
	
	
		$vdata["truncateText"] = true;
	$vdata["NumberOfChars"] = 80;

	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Document upload");

	
		$edata["weekdayMessage"] = array("message" => "", "messageType" => "Text");
	$edata["weekdays"] = "[]";


	
	



	
	
	
	
			$edata["acceptFileTypes"] = ".+$";
		$edata["acceptFileTypesHtml"] = "";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
	
	
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings


//Filters settings
	$fdata["filterTotals"] = 0;
		$fdata["filterMultiSelect"] = 0;
			$fdata["filterFormat"] = "Values list";
		$fdata["showCollapsed"] = false;

		$fdata["sortValueType"] = 0;
		$fdata["numberOfVisibleItems"] = 10;

		$fdata["filterBy"] = 0;

	

	
	
//end of Filters settings


	$tdatapayment["slip_upload"] = $fdata;
		$tdatapayment[".searchableFields"][] = "slip_upload";
//	remark
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 7;
	$fdata["strName"] = "remark";
	$fdata["GoodName"] = "remark";
	$fdata["ownerTable"] = "payment";
	$fdata["Label"] = GetFieldLabel("payment","remark");
	$fdata["FieldType"] = 200;


	
	
			

		$fdata["strField"] = "remark";

	
		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "remark";

	
	
				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
		
	
		$vdata["NeedEncode"] = true;

	
		$vdata["truncateText"] = true;
	$vdata["NumberOfChars"] = 80;

	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text area");

	
		$edata["weekdayMessage"] = array("message" => "", "messageType" => "Text");
	$edata["weekdays"] = "[]";


	
	



	
	
	
	
			$edata["acceptFileTypes"] = ".+$";
		$edata["acceptFileTypesHtml"] = "";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
				$edata["nRows"] = 100;
			$edata["nCols"] = 200;

	
	
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings


//Filters settings
	$fdata["filterTotals"] = 0;
		$fdata["filterMultiSelect"] = 0;
			$fdata["filterFormat"] = "Values list";
		$fdata["showCollapsed"] = false;

		$fdata["sortValueType"] = 0;
		$fdata["numberOfVisibleItems"] = 10;

		$fdata["filterBy"] = 0;

	

	
	
//end of Filters settings


	$tdatapayment["remark"] = $fdata;
		$tdatapayment[".searchableFields"][] = "remark";
//	admin_confirm
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 8;
	$fdata["strName"] = "admin_confirm";
	$fdata["GoodName"] = "admin_confirm";
	$fdata["ownerTable"] = "payment";
	$fdata["Label"] = GetFieldLabel("payment","admin_confirm");
	$fdata["FieldType"] = 200;


	
	
			

		$fdata["strField"] = "admin_confirm";

	
		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "admin_confirm";

	
	
				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
		
	
		$vdata["NeedEncode"] = true;

	
		$vdata["truncateText"] = true;
	$vdata["NumberOfChars"] = 80;

	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Readonly");

	
		$edata["weekdayMessage"] = array("message" => "", "messageType" => "Text");
	$edata["weekdays"] = "[]";


	
	



	
	
	
	
			$edata["acceptFileTypes"] = ".+$";
		$edata["acceptFileTypesHtml"] = "";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
	
	
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings


//Filters settings
	$fdata["filterTotals"] = 0;
		$fdata["filterMultiSelect"] = 0;
			$fdata["filterFormat"] = "Values list";
		$fdata["showCollapsed"] = false;

		$fdata["sortValueType"] = 0;
		$fdata["numberOfVisibleItems"] = 10;

		$fdata["filterBy"] = 0;

	

	
	
//end of Filters settings


	$tdatapayment["admin_confirm"] = $fdata;
		$tdatapayment[".searchableFields"][] = "admin_confirm";


$tables_data["payment"]=&$tdatapayment;
$field_labels["payment"] = &$fieldLabelspayment;
$fieldToolTips["payment"] = &$fieldToolTipspayment;
$placeHolders["payment"] = &$placeHolderspayment;
$page_titles["payment"] = &$pageTitlespayment;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)

//if !@TABLE.bReportCrossTab

$detailsTablesData["payment"] = array();
//endif

// tables which are master tables for current table (detail)
$masterTablesData["payment"] = array();



// -----------------end  prepare master-details data arrays ------------------------------//



require_once(getabspath("classes/sql.php"));











function createSqlQuery_payment()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "id,  owner_id,  paydate,  paytime,  amount,  slip_upload,  remark,  admin_confirm";
$proto0["m_strFrom"] = "FROM payment";
$proto0["m_strWhere"] = "";
$proto0["m_strOrderBy"] = "ORDER BY id DESC";
	
		;
			$proto0["cipherer"] = null;
$proto2=array();
$proto2["m_sql"] = "";
$proto2["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto2["m_column"]=$obj;
$proto2["m_contained"] = array();
$proto2["m_strCase"] = "";
$proto2["m_havingmode"] = false;
$proto2["m_inBrackets"] = false;
$proto2["m_useAlias"] = false;
$obj = new SQLLogicalExpr($proto2);

$proto0["m_where"] = $obj;
$proto4=array();
$proto4["m_sql"] = "";
$proto4["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto4["m_column"]=$obj;
$proto4["m_contained"] = array();
$proto4["m_strCase"] = "";
$proto4["m_havingmode"] = false;
$proto4["m_inBrackets"] = false;
$proto4["m_useAlias"] = false;
$obj = new SQLLogicalExpr($proto4);

$proto0["m_having"] = $obj;
$proto0["m_fieldlist"] = array();
						$proto6=array();
			$obj = new SQLField(array(
	"m_strName" => "id",
	"m_strTable" => "payment",
	"m_srcTableName" => "payment"
));

$proto6["m_sql"] = "id";
$proto6["m_srcTableName"] = "payment";
$proto6["m_expr"]=$obj;
$proto6["m_alias"] = "";
$obj = new SQLFieldListItem($proto6);

$proto0["m_fieldlist"][]=$obj;
						$proto8=array();
			$obj = new SQLField(array(
	"m_strName" => "owner_id",
	"m_strTable" => "payment",
	"m_srcTableName" => "payment"
));

$proto8["m_sql"] = "owner_id";
$proto8["m_srcTableName"] = "payment";
$proto8["m_expr"]=$obj;
$proto8["m_alias"] = "";
$obj = new SQLFieldListItem($proto8);

$proto0["m_fieldlist"][]=$obj;
						$proto10=array();
			$obj = new SQLField(array(
	"m_strName" => "paydate",
	"m_strTable" => "payment",
	"m_srcTableName" => "payment"
));

$proto10["m_sql"] = "paydate";
$proto10["m_srcTableName"] = "payment";
$proto10["m_expr"]=$obj;
$proto10["m_alias"] = "";
$obj = new SQLFieldListItem($proto10);

$proto0["m_fieldlist"][]=$obj;
						$proto12=array();
			$obj = new SQLField(array(
	"m_strName" => "paytime",
	"m_strTable" => "payment",
	"m_srcTableName" => "payment"
));

$proto12["m_sql"] = "paytime";
$proto12["m_srcTableName"] = "payment";
$proto12["m_expr"]=$obj;
$proto12["m_alias"] = "";
$obj = new SQLFieldListItem($proto12);

$proto0["m_fieldlist"][]=$obj;
						$proto14=array();
			$obj = new SQLField(array(
	"m_strName" => "amount",
	"m_strTable" => "payment",
	"m_srcTableName" => "payment"
));

$proto14["m_sql"] = "amount";
$proto14["m_srcTableName"] = "payment";
$proto14["m_expr"]=$obj;
$proto14["m_alias"] = "";
$obj = new SQLFieldListItem($proto14);

$proto0["m_fieldlist"][]=$obj;
						$proto16=array();
			$obj = new SQLField(array(
	"m_strName" => "slip_upload",
	"m_strTable" => "payment",
	"m_srcTableName" => "payment"
));

$proto16["m_sql"] = "slip_upload";
$proto16["m_srcTableName"] = "payment";
$proto16["m_expr"]=$obj;
$proto16["m_alias"] = "";
$obj = new SQLFieldListItem($proto16);

$proto0["m_fieldlist"][]=$obj;
						$proto18=array();
			$obj = new SQLField(array(
	"m_strName" => "remark",
	"m_strTable" => "payment",
	"m_srcTableName" => "payment"
));

$proto18["m_sql"] = "remark";
$proto18["m_srcTableName"] = "payment";
$proto18["m_expr"]=$obj;
$proto18["m_alias"] = "";
$obj = new SQLFieldListItem($proto18);

$proto0["m_fieldlist"][]=$obj;
						$proto20=array();
			$obj = new SQLField(array(
	"m_strName" => "admin_confirm",
	"m_strTable" => "payment",
	"m_srcTableName" => "payment"
));

$proto20["m_sql"] = "admin_confirm";
$proto20["m_srcTableName"] = "payment";
$proto20["m_expr"]=$obj;
$proto20["m_alias"] = "";
$obj = new SQLFieldListItem($proto20);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto22=array();
$proto22["m_link"] = "SQLL_MAIN";
			$proto23=array();
$proto23["m_strName"] = "payment";
$proto23["m_srcTableName"] = "payment";
$proto23["m_columns"] = array();
$proto23["m_columns"][] = "id";
$proto23["m_columns"][] = "owner_id";
$proto23["m_columns"][] = "paydate";
$proto23["m_columns"][] = "paytime";
$proto23["m_columns"][] = "amount";
$proto23["m_columns"][] = "slip_upload";
$proto23["m_columns"][] = "remark";
$proto23["m_columns"][] = "admin_confirm";
$obj = new SQLTable($proto23);

$proto22["m_table"] = $obj;
$proto22["m_sql"] = "payment";
$proto22["m_alias"] = "";
$proto22["m_srcTableName"] = "payment";
$proto24=array();
$proto24["m_sql"] = "";
$proto24["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto24["m_column"]=$obj;
$proto24["m_contained"] = array();
$proto24["m_strCase"] = "";
$proto24["m_havingmode"] = false;
$proto24["m_inBrackets"] = false;
$proto24["m_useAlias"] = false;
$obj = new SQLLogicalExpr($proto24);

$proto22["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto22);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
												$proto26=array();
						$obj = new SQLField(array(
	"m_strName" => "id",
	"m_strTable" => "payment",
	"m_srcTableName" => "payment"
));

$proto26["m_column"]=$obj;
$proto26["m_bAsc"] = 0;
$proto26["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto26);

$proto0["m_orderby"][]=$obj;					
$proto0["m_srcTableName"]="payment";		
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_payment = createSqlQuery_payment();


	
		;

								

$tdatapayment[".sqlquery"] = $queryData_payment;



$tableEvents["payment"] = new eventsBase;
$tdatapayment[".hasEvents"] = false;

?>