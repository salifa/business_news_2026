<?php
$tdatapayment_admin = array();
$tdatapayment_admin[".searchableFields"] = array();
$tdatapayment_admin[".ShortName"] = "payment_admin";
$tdatapayment_admin[".OwnerID"] = "";
$tdatapayment_admin[".OriginalTable"] = "payment";


$tdatapayment_admin[".pagesByType"] = my_json_decode( "{\"add\":[\"add\"],\"edit\":[\"edit\"],\"export\":[\"export\"],\"import\":[\"import\"],\"list\":[\"list\"],\"print\":[\"print\"],\"search\":[\"search\"],\"view\":[\"view\"]}" );
$tdatapayment_admin[".originalPagesByType"] = $tdatapayment_admin[".pagesByType"];
$tdatapayment_admin[".pages"] = types2pages( my_json_decode( "{\"add\":[\"add\"],\"edit\":[\"edit\"],\"export\":[\"export\"],\"import\":[\"import\"],\"list\":[\"list\"],\"print\":[\"print\"],\"search\":[\"search\"],\"view\":[\"view\"]}" ) );
$tdatapayment_admin[".originalPages"] = $tdatapayment_admin[".pages"];
$tdatapayment_admin[".defaultPages"] = my_json_decode( "{\"add\":\"add\",\"edit\":\"edit\",\"export\":\"export\",\"import\":\"import\",\"list\":\"list\",\"print\":\"print\",\"search\":\"search\",\"view\":\"view\"}" );
$tdatapayment_admin[".originalDefaultPages"] = $tdatapayment_admin[".defaultPages"];

//	field labels
$fieldLabelspayment_admin = array();
$fieldToolTipspayment_admin = array();
$pageTitlespayment_admin = array();
$placeHolderspayment_admin = array();

if(mlang_getcurrentlang()=="English")
{
	$fieldLabelspayment_admin["English"] = array();
	$fieldToolTipspayment_admin["English"] = array();
	$placeHolderspayment_admin["English"] = array();
	$pageTitlespayment_admin["English"] = array();
	$fieldLabelspayment_admin["English"]["email"] = "Email";
	$fieldToolTipspayment_admin["English"]["email"] = "";
	$placeHolderspayment_admin["English"]["email"] = "";
	$fieldLabelspayment_admin["English"]["groupid"] = "Groupid";
	$fieldToolTipspayment_admin["English"]["groupid"] = "";
	$placeHolderspayment_admin["English"]["groupid"] = "";
	$fieldLabelspayment_admin["English"]["fullname"] = "Fullname";
	$fieldToolTipspayment_admin["English"]["fullname"] = "";
	$placeHolderspayment_admin["English"]["fullname"] = "";
	$fieldLabelspayment_admin["English"]["id"] = "Id";
	$fieldToolTipspayment_admin["English"]["id"] = "";
	$placeHolderspayment_admin["English"]["id"] = "";
	$fieldLabelspayment_admin["English"]["owner_id"] = "Owner Id";
	$fieldToolTipspayment_admin["English"]["owner_id"] = "";
	$placeHolderspayment_admin["English"]["owner_id"] = "";
	$fieldLabelspayment_admin["English"]["paydate"] = "Paydate";
	$fieldToolTipspayment_admin["English"]["paydate"] = "";
	$placeHolderspayment_admin["English"]["paydate"] = "";
	$fieldLabelspayment_admin["English"]["paytime"] = "Paytime";
	$fieldToolTipspayment_admin["English"]["paytime"] = "";
	$placeHolderspayment_admin["English"]["paytime"] = "";
	$fieldLabelspayment_admin["English"]["amount"] = "Amount";
	$fieldToolTipspayment_admin["English"]["amount"] = "";
	$placeHolderspayment_admin["English"]["amount"] = "";
	$fieldLabelspayment_admin["English"]["slip_upload"] = "Slip Upload";
	$fieldToolTipspayment_admin["English"]["slip_upload"] = "";
	$placeHolderspayment_admin["English"]["slip_upload"] = "";
	$fieldLabelspayment_admin["English"]["remark"] = "Remark";
	$fieldToolTipspayment_admin["English"]["remark"] = "";
	$placeHolderspayment_admin["English"]["remark"] = "";
	$fieldLabelspayment_admin["English"]["admin_confirm"] = "Admin Confirm";
	$fieldToolTipspayment_admin["English"]["admin_confirm"] = "";
	$placeHolderspayment_admin["English"]["admin_confirm"] = "";
	if (count($fieldToolTipspayment_admin["English"]))
		$tdatapayment_admin[".isUseToolTips"] = true;
}
if(mlang_getcurrentlang()=="Thai")
{
	$fieldLabelspayment_admin["Thai"] = array();
	$fieldToolTipspayment_admin["Thai"] = array();
	$placeHolderspayment_admin["Thai"] = array();
	$pageTitlespayment_admin["Thai"] = array();
	$fieldLabelspayment_admin["Thai"]["id"] = "Id";
	$fieldToolTipspayment_admin["Thai"]["id"] = "";
	$placeHolderspayment_admin["Thai"]["id"] = "";
	$fieldLabelspayment_admin["Thai"]["owner_id"] = "Owner Id";
	$fieldToolTipspayment_admin["Thai"]["owner_id"] = "";
	$placeHolderspayment_admin["Thai"]["owner_id"] = "";
	$fieldLabelspayment_admin["Thai"]["paydate"] = "Paydate";
	$fieldToolTipspayment_admin["Thai"]["paydate"] = "";
	$placeHolderspayment_admin["Thai"]["paydate"] = "";
	$fieldLabelspayment_admin["Thai"]["paytime"] = "Paytime";
	$fieldToolTipspayment_admin["Thai"]["paytime"] = "";
	$placeHolderspayment_admin["Thai"]["paytime"] = "";
	$fieldLabelspayment_admin["Thai"]["amount"] = "Amount";
	$fieldToolTipspayment_admin["Thai"]["amount"] = "";
	$placeHolderspayment_admin["Thai"]["amount"] = "";
	$fieldLabelspayment_admin["Thai"]["slip_upload"] = "Slip Upload";
	$fieldToolTipspayment_admin["Thai"]["slip_upload"] = "";
	$placeHolderspayment_admin["Thai"]["slip_upload"] = "";
	$fieldLabelspayment_admin["Thai"]["remark"] = "Remark";
	$fieldToolTipspayment_admin["Thai"]["remark"] = "";
	$placeHolderspayment_admin["Thai"]["remark"] = "";
	$fieldLabelspayment_admin["Thai"]["admin_confirm"] = "Admin Confirm";
	$fieldToolTipspayment_admin["Thai"]["admin_confirm"] = "";
	$placeHolderspayment_admin["Thai"]["admin_confirm"] = "";
	$fieldLabelspayment_admin["Thai"]["email"] = "Email";
	$fieldToolTipspayment_admin["Thai"]["email"] = "";
	$placeHolderspayment_admin["Thai"]["email"] = "";
	$fieldLabelspayment_admin["Thai"]["groupid"] = "Groupid";
	$fieldToolTipspayment_admin["Thai"]["groupid"] = "";
	$placeHolderspayment_admin["Thai"]["groupid"] = "";
	$fieldLabelspayment_admin["Thai"]["fullname"] = "Fullname";
	$fieldToolTipspayment_admin["Thai"]["fullname"] = "";
	$placeHolderspayment_admin["Thai"]["fullname"] = "";
	if (count($fieldToolTipspayment_admin["Thai"]))
		$tdatapayment_admin[".isUseToolTips"] = true;
}


	$tdatapayment_admin[".NCSearch"] = true;



$tdatapayment_admin[".shortTableName"] = "payment_admin";
$tdatapayment_admin[".nSecOptions"] = 0;

$tdatapayment_admin[".mainTableOwnerID"] = "";
$tdatapayment_admin[".entityType"] = 1;
$tdatapayment_admin[".connId"] = "vnnsbiz_at_192_168_1_111";


$tdatapayment_admin[".strOriginalTableName"] = "payment";

	



$tdatapayment_admin[".showAddInPopup"] = false;

$tdatapayment_admin[".showEditInPopup"] = false;

$tdatapayment_admin[".showViewInPopup"] = false;

$tdatapayment_admin[".listAjax"] = false;
//	temporary
//$tdatapayment_admin[".listAjax"] = false;

	$tdatapayment_admin[".audit"] = false;

	$tdatapayment_admin[".locking"] = false;


$pages = $tdatapayment_admin[".defaultPages"];

if( $pages[PAGE_EDIT] ) {
	$tdatapayment_admin[".edit"] = true;
	$tdatapayment_admin[".afterEditAction"] = 0;
	$tdatapayment_admin[".closePopupAfterEdit"] = 1;
	$tdatapayment_admin[".afterEditActionDetTable"] = "Detail tables not found!";
}

if( $pages[PAGE_ADD] ) {
$tdatapayment_admin[".add"] = true;
$tdatapayment_admin[".afterAddAction"] = 0;
$tdatapayment_admin[".closePopupAfterAdd"] = 1;
$tdatapayment_admin[".afterAddActionDetTable"] = "";
}

if( $pages[PAGE_LIST] ) {
	$tdatapayment_admin[".list"] = true;
}



$tdatapayment_admin[".strSortControlSettingsJSON"] = "";




if( $pages[PAGE_VIEW] ) {
$tdatapayment_admin[".view"] = true;
}

if( $pages[PAGE_IMPORT] ) {
$tdatapayment_admin[".import"] = true;
}

if( $pages[PAGE_EXPORT] ) {
$tdatapayment_admin[".exportTo"] = true;
}

if( $pages[PAGE_PRINT] ) {
$tdatapayment_admin[".printFriendly"] = true;
}



$tdatapayment_admin[".showSimpleSearchOptions"] = true; // temp fix #13449

// Allow Show/Hide Fields in GRID
$tdatapayment_admin[".allowShowHideFields"] = true; // temp fix #13449
//

// Allow Fields Reordering in GRID
$tdatapayment_admin[".allowFieldsReordering"] = true; // temp fix #13449
//

$tdatapayment_admin[".isUseAjaxSuggest"] = true;

$tdatapayment_admin[".rowHighlite"] = true;



																		

$tdatapayment_admin[".ajaxCodeSnippetAdded"] = false;

$tdatapayment_admin[".buttonsAdded"] = false;

$tdatapayment_admin[".addPageEvents"] = false;

// use timepicker for search panel
$tdatapayment_admin[".isUseTimeForSearch"] = true;


$tdatapayment_admin[".badgeColor"] = "CD5C5C";


$tdatapayment_admin[".allSearchFields"] = array();
$tdatapayment_admin[".filterFields"] = array();
$tdatapayment_admin[".requiredSearchFields"] = array();

$tdatapayment_admin[".googleLikeFields"] = array();
$tdatapayment_admin[".googleLikeFields"][] = "id";
$tdatapayment_admin[".googleLikeFields"][] = "owner_id";
$tdatapayment_admin[".googleLikeFields"][] = "paydate";
$tdatapayment_admin[".googleLikeFields"][] = "paytime";
$tdatapayment_admin[".googleLikeFields"][] = "amount";
$tdatapayment_admin[".googleLikeFields"][] = "slip_upload";
$tdatapayment_admin[".googleLikeFields"][] = "remark";
$tdatapayment_admin[".googleLikeFields"][] = "admin_confirm";
$tdatapayment_admin[".googleLikeFields"][] = "email";
$tdatapayment_admin[".googleLikeFields"][] = "groupid";
$tdatapayment_admin[".googleLikeFields"][] = "fullname";



$tdatapayment_admin[".tableType"] = "list";

$tdatapayment_admin[".printerPageOrientation"] = 0;
$tdatapayment_admin[".nPrinterPageScale"] = 100;

$tdatapayment_admin[".nPrinterSplitRecords"] = 40;

$tdatapayment_admin[".geocodingEnabled"] = false;










$tdatapayment_admin[".pageSize"] = 20;

$tdatapayment_admin[".warnLeavingPages"] = true;



$tstrOrderBy = "ORDER BY payment.id DESC";
$tdatapayment_admin[".strOrderBy"] = $tstrOrderBy;

$tdatapayment_admin[".orderindexes"] = array();
	$tdatapayment_admin[".orderindexes"][] = array(1, (0 ? "ASC" : "DESC"), "payment.id");



$tdatapayment_admin[".sqlHead"] = "SELECT payment.id,  payment.owner_id,  payment.paydate,  payment.paytime,  payment.amount,  payment.slip_upload,  payment.remark,  payment.admin_confirm,  online_placard_users.email,  online_placard_users.groupid,  online_placard_users.fullname";
$tdatapayment_admin[".sqlFrom"] = "FROM payment  INNER JOIN online_placard_users ON payment.owner_id = online_placard_users.ID";
$tdatapayment_admin[".sqlWhereExpr"] = "";
$tdatapayment_admin[".sqlTail"] = "";










//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatapayment_admin[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatapayment_admin[".arrGroupsPerPage"] = $arrGPP;

$tdatapayment_admin[".highlightSearchResults"] = true;

$tableKeyspayment_admin = array();
$tableKeyspayment_admin[] = "id";
$tdatapayment_admin[".Keys"] = $tableKeyspayment_admin;


$tdatapayment_admin[".hideMobileList"] = array();




//	id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "id";
	$fdata["GoodName"] = "id";
	$fdata["ownerTable"] = "payment";
	$fdata["Label"] = GetFieldLabel("payment_admin","id");
	$fdata["FieldType"] = 3;


		$fdata["AutoInc"] = true;

	
			

		$fdata["strField"] = "id";

	
		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "payment.id";

	
	
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


	$tdatapayment_admin["id"] = $fdata;
		$tdatapayment_admin[".searchableFields"][] = "id";
//	owner_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "owner_id";
	$fdata["GoodName"] = "owner_id";
	$fdata["ownerTable"] = "payment";
	$fdata["Label"] = GetFieldLabel("payment_admin","owner_id");
	$fdata["FieldType"] = 200;


	
	
			

		$fdata["strField"] = "owner_id";

	
		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "payment.owner_id";

	
	
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


	$tdatapayment_admin["owner_id"] = $fdata;
		$tdatapayment_admin[".searchableFields"][] = "owner_id";
//	paydate
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "paydate";
	$fdata["GoodName"] = "paydate";
	$fdata["ownerTable"] = "payment";
	$fdata["Label"] = GetFieldLabel("payment_admin","paydate");
	$fdata["FieldType"] = 7;


	
	
			

		$fdata["strField"] = "paydate";

	
		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "payment.paydate";

	
	
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
			$fdata["filterFormat"] = "Values list";
		$fdata["showCollapsed"] = false;

		$fdata["sortValueType"] = 0;
		$fdata["numberOfVisibleItems"] = 10;

		$fdata["filterBy"] = 0;

	

	
	
//end of Filters settings


	$tdatapayment_admin["paydate"] = $fdata;
		$tdatapayment_admin[".searchableFields"][] = "paydate";
//	paytime
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "paytime";
	$fdata["GoodName"] = "paytime";
	$fdata["ownerTable"] = "payment";
	$fdata["Label"] = GetFieldLabel("payment_admin","paytime");
	$fdata["FieldType"] = 134;


	
	
			

		$fdata["strField"] = "paytime";

	
		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "payment.paytime";

	
	
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


	$tdatapayment_admin["paytime"] = $fdata;
		$tdatapayment_admin[".searchableFields"][] = "paytime";
//	amount
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "amount";
	$fdata["GoodName"] = "amount";
	$fdata["ownerTable"] = "payment";
	$fdata["Label"] = GetFieldLabel("payment_admin","amount");
	$fdata["FieldType"] = 3;


	
	
			

		$fdata["strField"] = "amount";

	
		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "payment.amount";

	
	
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

	
	
	
	
			$edata["HTML5InuptType"] = "text";

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
			$fdata["filterFormat"] = "Values list";
		$fdata["showCollapsed"] = false;

		$fdata["sortValueType"] = 0;
		$fdata["numberOfVisibleItems"] = 10;

		$fdata["filterBy"] = 0;

	

	
	
//end of Filters settings


	$tdatapayment_admin["amount"] = $fdata;
		$tdatapayment_admin[".searchableFields"][] = "amount";
//	slip_upload
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
	$fdata["strName"] = "slip_upload";
	$fdata["GoodName"] = "slip_upload";
	$fdata["ownerTable"] = "payment";
	$fdata["Label"] = GetFieldLabel("payment_admin","slip_upload");
	$fdata["FieldType"] = 200;


	
	
			

		$fdata["strField"] = "slip_upload";

	
		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "payment.slip_upload";

	
	
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


	$tdatapayment_admin["slip_upload"] = $fdata;
		$tdatapayment_admin[".searchableFields"][] = "slip_upload";
//	remark
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 7;
	$fdata["strName"] = "remark";
	$fdata["GoodName"] = "remark";
	$fdata["ownerTable"] = "payment";
	$fdata["Label"] = GetFieldLabel("payment_admin","remark");
	$fdata["FieldType"] = 200;


	
	
			

		$fdata["strField"] = "remark";

	
		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "payment.remark";

	
	
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

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=255";

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


	$tdatapayment_admin["remark"] = $fdata;
		$tdatapayment_admin[".searchableFields"][] = "remark";
//	admin_confirm
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 8;
	$fdata["strName"] = "admin_confirm";
	$fdata["GoodName"] = "admin_confirm";
	$fdata["ownerTable"] = "payment";
	$fdata["Label"] = GetFieldLabel("payment_admin","admin_confirm");
	$fdata["FieldType"] = 200;


	
	
			

		$fdata["strField"] = "admin_confirm";

	
		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "payment.admin_confirm";

	
	
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

	$edata = array("EditFormat" => "Lookup wizard");

	
		$edata["weekdayMessage"] = array("message" => "", "messageType" => "Text");
	$edata["weekdays"] = "[]";


	
	

// Begin Lookup settings
		$edata["LookupType"] = 0;
			$edata["autoCompleteFieldsOnEdit"] = 0;
	$edata["autoCompleteFields"] = array();
		$edata["LCType"] = 0;

	
	
		$edata["LookupValues"] = array();
	$edata["LookupValues"][] = "yes";
	$edata["LookupValues"][] = "no";

	
		$edata["SelectSize"] = 1;

// End Lookup Settings


	
	
	
	
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
		$fdata["defaultSearchOption"] = "Equals";

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


	$tdatapayment_admin["admin_confirm"] = $fdata;
		$tdatapayment_admin[".searchableFields"][] = "admin_confirm";
//	email
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 9;
	$fdata["strName"] = "email";
	$fdata["GoodName"] = "email";
	$fdata["ownerTable"] = "online_placard_users";
	$fdata["Label"] = GetFieldLabel("payment_admin","email");
	$fdata["FieldType"] = 200;


	
	
			

		$fdata["strField"] = "email";

	
		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "online_placard_users.email";

	
	
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

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
		
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


	$tdatapayment_admin["email"] = $fdata;
		$tdatapayment_admin[".searchableFields"][] = "email";
//	groupid
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 10;
	$fdata["strName"] = "groupid";
	$fdata["GoodName"] = "groupid";
	$fdata["ownerTable"] = "online_placard_users";
	$fdata["Label"] = GetFieldLabel("payment_admin","groupid");
	$fdata["FieldType"] = 200;


	
	
			

		$fdata["strField"] = "groupid";

	
		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "online_placard_users.groupid";

	
	
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

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
		
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


	$tdatapayment_admin["groupid"] = $fdata;
		$tdatapayment_admin[".searchableFields"][] = "groupid";
//	fullname
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 11;
	$fdata["strName"] = "fullname";
	$fdata["GoodName"] = "fullname";
	$fdata["ownerTable"] = "online_placard_users";
	$fdata["Label"] = GetFieldLabel("payment_admin","fullname");
	$fdata["FieldType"] = 200;


	
	
			

		$fdata["strField"] = "fullname";

	
		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "online_placard_users.fullname";

	
	
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

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
		
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


	$tdatapayment_admin["fullname"] = $fdata;
		$tdatapayment_admin[".searchableFields"][] = "fullname";


$tables_data["payment admin"]=&$tdatapayment_admin;
$field_labels["payment_admin"] = &$fieldLabelspayment_admin;
$fieldToolTips["payment_admin"] = &$fieldToolTipspayment_admin;
$placeHolders["payment_admin"] = &$placeHolderspayment_admin;
$page_titles["payment_admin"] = &$pageTitlespayment_admin;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)

//if !@TABLE.bReportCrossTab

$detailsTablesData["payment admin"] = array();
//endif

// tables which are master tables for current table (detail)
$masterTablesData["payment admin"] = array();



// -----------------end  prepare master-details data arrays ------------------------------//



require_once(getabspath("classes/sql.php"));











function createSqlQuery_payment_admin()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "payment.id,  payment.owner_id,  payment.paydate,  payment.paytime,  payment.amount,  payment.slip_upload,  payment.remark,  payment.admin_confirm,  online_placard_users.email,  online_placard_users.groupid,  online_placard_users.fullname";
$proto0["m_strFrom"] = "FROM payment  INNER JOIN online_placard_users ON payment.owner_id = online_placard_users.ID";
$proto0["m_strWhere"] = "";
$proto0["m_strOrderBy"] = "ORDER BY payment.id DESC";
	
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
	"m_srcTableName" => "payment admin"
));

$proto6["m_sql"] = "payment.id";
$proto6["m_srcTableName"] = "payment admin";
$proto6["m_expr"]=$obj;
$proto6["m_alias"] = "";
$obj = new SQLFieldListItem($proto6);

$proto0["m_fieldlist"][]=$obj;
						$proto8=array();
			$obj = new SQLField(array(
	"m_strName" => "owner_id",
	"m_strTable" => "payment",
	"m_srcTableName" => "payment admin"
));

$proto8["m_sql"] = "payment.owner_id";
$proto8["m_srcTableName"] = "payment admin";
$proto8["m_expr"]=$obj;
$proto8["m_alias"] = "";
$obj = new SQLFieldListItem($proto8);

$proto0["m_fieldlist"][]=$obj;
						$proto10=array();
			$obj = new SQLField(array(
	"m_strName" => "paydate",
	"m_strTable" => "payment",
	"m_srcTableName" => "payment admin"
));

$proto10["m_sql"] = "payment.paydate";
$proto10["m_srcTableName"] = "payment admin";
$proto10["m_expr"]=$obj;
$proto10["m_alias"] = "";
$obj = new SQLFieldListItem($proto10);

$proto0["m_fieldlist"][]=$obj;
						$proto12=array();
			$obj = new SQLField(array(
	"m_strName" => "paytime",
	"m_strTable" => "payment",
	"m_srcTableName" => "payment admin"
));

$proto12["m_sql"] = "payment.paytime";
$proto12["m_srcTableName"] = "payment admin";
$proto12["m_expr"]=$obj;
$proto12["m_alias"] = "";
$obj = new SQLFieldListItem($proto12);

$proto0["m_fieldlist"][]=$obj;
						$proto14=array();
			$obj = new SQLField(array(
	"m_strName" => "amount",
	"m_strTable" => "payment",
	"m_srcTableName" => "payment admin"
));

$proto14["m_sql"] = "payment.amount";
$proto14["m_srcTableName"] = "payment admin";
$proto14["m_expr"]=$obj;
$proto14["m_alias"] = "";
$obj = new SQLFieldListItem($proto14);

$proto0["m_fieldlist"][]=$obj;
						$proto16=array();
			$obj = new SQLField(array(
	"m_strName" => "slip_upload",
	"m_strTable" => "payment",
	"m_srcTableName" => "payment admin"
));

$proto16["m_sql"] = "payment.slip_upload";
$proto16["m_srcTableName"] = "payment admin";
$proto16["m_expr"]=$obj;
$proto16["m_alias"] = "";
$obj = new SQLFieldListItem($proto16);

$proto0["m_fieldlist"][]=$obj;
						$proto18=array();
			$obj = new SQLField(array(
	"m_strName" => "remark",
	"m_strTable" => "payment",
	"m_srcTableName" => "payment admin"
));

$proto18["m_sql"] = "payment.remark";
$proto18["m_srcTableName"] = "payment admin";
$proto18["m_expr"]=$obj;
$proto18["m_alias"] = "";
$obj = new SQLFieldListItem($proto18);

$proto0["m_fieldlist"][]=$obj;
						$proto20=array();
			$obj = new SQLField(array(
	"m_strName" => "admin_confirm",
	"m_strTable" => "payment",
	"m_srcTableName" => "payment admin"
));

$proto20["m_sql"] = "payment.admin_confirm";
$proto20["m_srcTableName"] = "payment admin";
$proto20["m_expr"]=$obj;
$proto20["m_alias"] = "";
$obj = new SQLFieldListItem($proto20);

$proto0["m_fieldlist"][]=$obj;
						$proto22=array();
			$obj = new SQLField(array(
	"m_strName" => "email",
	"m_strTable" => "online_placard_users",
	"m_srcTableName" => "payment admin"
));

$proto22["m_sql"] = "online_placard_users.email";
$proto22["m_srcTableName"] = "payment admin";
$proto22["m_expr"]=$obj;
$proto22["m_alias"] = "";
$obj = new SQLFieldListItem($proto22);

$proto0["m_fieldlist"][]=$obj;
						$proto24=array();
			$obj = new SQLField(array(
	"m_strName" => "groupid",
	"m_strTable" => "online_placard_users",
	"m_srcTableName" => "payment admin"
));

$proto24["m_sql"] = "online_placard_users.groupid";
$proto24["m_srcTableName"] = "payment admin";
$proto24["m_expr"]=$obj;
$proto24["m_alias"] = "";
$obj = new SQLFieldListItem($proto24);

$proto0["m_fieldlist"][]=$obj;
						$proto26=array();
			$obj = new SQLField(array(
	"m_strName" => "fullname",
	"m_strTable" => "online_placard_users",
	"m_srcTableName" => "payment admin"
));

$proto26["m_sql"] = "online_placard_users.fullname";
$proto26["m_srcTableName"] = "payment admin";
$proto26["m_expr"]=$obj;
$proto26["m_alias"] = "";
$obj = new SQLFieldListItem($proto26);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto28=array();
$proto28["m_link"] = "SQLL_MAIN";
			$proto29=array();
$proto29["m_strName"] = "payment";
$proto29["m_srcTableName"] = "payment admin";
$proto29["m_columns"] = array();
$proto29["m_columns"][] = "id";
$proto29["m_columns"][] = "owner_id";
$proto29["m_columns"][] = "paydate";
$proto29["m_columns"][] = "paytime";
$proto29["m_columns"][] = "amount";
$proto29["m_columns"][] = "slip_upload";
$proto29["m_columns"][] = "remark";
$proto29["m_columns"][] = "admin_confirm";
$obj = new SQLTable($proto29);

$proto28["m_table"] = $obj;
$proto28["m_sql"] = "payment";
$proto28["m_alias"] = "";
$proto28["m_srcTableName"] = "payment admin";
$proto30=array();
$proto30["m_sql"] = "";
$proto30["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto30["m_column"]=$obj;
$proto30["m_contained"] = array();
$proto30["m_strCase"] = "";
$proto30["m_havingmode"] = false;
$proto30["m_inBrackets"] = false;
$proto30["m_useAlias"] = false;
$obj = new SQLLogicalExpr($proto30);

$proto28["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto28);

$proto0["m_fromlist"][]=$obj;
												$proto32=array();
$proto32["m_link"] = "SQLL_INNERJOIN";
			$proto33=array();
$proto33["m_strName"] = "online_placard_users";
$proto33["m_srcTableName"] = "payment admin";
$proto33["m_columns"] = array();
$proto33["m_columns"][] = "ID";
$proto33["m_columns"][] = "username";
$proto33["m_columns"][] = "password";
$proto33["m_columns"][] = "email";
$proto33["m_columns"][] = "fullname";
$proto33["m_columns"][] = "groupid";
$proto33["m_columns"][] = "active";
$proto33["m_columns"][] = "ext_security_id";
$proto33["m_columns"][] = "reset_token";
$proto33["m_columns"][] = "reset_date";
$proto33["m_columns"][] = "apikey";
$obj = new SQLTable($proto33);

$proto32["m_table"] = $obj;
$proto32["m_sql"] = "INNER JOIN online_placard_users ON payment.owner_id = online_placard_users.ID";
$proto32["m_alias"] = "";
$proto32["m_srcTableName"] = "payment admin";
$proto34=array();
$proto34["m_sql"] = "payment.owner_id = online_placard_users.ID";
$proto34["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "owner_id",
	"m_strTable" => "payment",
	"m_srcTableName" => "payment admin"
));

$proto34["m_column"]=$obj;
$proto34["m_contained"] = array();
$proto34["m_strCase"] = "= online_placard_users.ID";
$proto34["m_havingmode"] = false;
$proto34["m_inBrackets"] = false;
$proto34["m_useAlias"] = false;
$obj = new SQLLogicalExpr($proto34);

$proto32["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto32);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
												$proto36=array();
						$obj = new SQLField(array(
	"m_strName" => "id",
	"m_strTable" => "payment",
	"m_srcTableName" => "payment admin"
));

$proto36["m_column"]=$obj;
$proto36["m_bAsc"] = 0;
$proto36["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto36);

$proto0["m_orderby"][]=$obj;					
$proto0["m_srcTableName"]="payment admin";		
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_payment_admin = createSqlQuery_payment_admin();


	
		;

											

$tdatapayment_admin[".sqlquery"] = $queryData_payment_admin;



$tableEvents["payment admin"] = new eventsBase;
$tdatapayment_admin[".hasEvents"] = false;

?>