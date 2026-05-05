<?php
$tdatacredit_admin = array();
$tdatacredit_admin[".searchableFields"] = array();
$tdatacredit_admin[".ShortName"] = "credit_admin";
$tdatacredit_admin[".OwnerID"] = "";
$tdatacredit_admin[".OriginalTable"] = "credit_transactions";


$tdatacredit_admin[".pagesByType"] = my_json_decode( "{\"add\":[\"add\"],\"edit\":[\"edit\"],\"export\":[\"export\"],\"import\":[\"import\"],\"list\":[\"list\"],\"print\":[\"print\"],\"search\":[\"search\"],\"view\":[\"view\"]}" );
$tdatacredit_admin[".originalPagesByType"] = $tdatacredit_admin[".pagesByType"];
$tdatacredit_admin[".pages"] = types2pages( my_json_decode( "{\"add\":[\"add\"],\"edit\":[\"edit\"],\"export\":[\"export\"],\"import\":[\"import\"],\"list\":[\"list\"],\"print\":[\"print\"],\"search\":[\"search\"],\"view\":[\"view\"]}" ) );
$tdatacredit_admin[".originalPages"] = $tdatacredit_admin[".pages"];
$tdatacredit_admin[".defaultPages"] = my_json_decode( "{\"add\":\"add\",\"edit\":\"edit\",\"export\":\"export\",\"import\":\"import\",\"list\":\"list\",\"print\":\"print\",\"search\":\"search\",\"view\":\"view\"}" );
$tdatacredit_admin[".originalDefaultPages"] = $tdatacredit_admin[".defaultPages"];

//	field labels
$fieldLabelscredit_admin = array();
$fieldToolTipscredit_admin = array();
$pageTitlescredit_admin = array();
$placeHolderscredit_admin = array();

if(mlang_getcurrentlang()=="English")
{
	$fieldLabelscredit_admin["English"] = array();
	$fieldToolTipscredit_admin["English"] = array();
	$placeHolderscredit_admin["English"] = array();
	$pageTitlescredit_admin["English"] = array();
	$fieldLabelscredit_admin["English"]["id"] = "Id";
	$fieldToolTipscredit_admin["English"]["id"] = "";
	$placeHolderscredit_admin["English"]["id"] = "";
	$fieldLabelscredit_admin["English"]["owner_id"] = "Owner Id";
	$fieldToolTipscredit_admin["English"]["owner_id"] = "";
	$placeHolderscredit_admin["English"]["owner_id"] = "";
	$fieldLabelscredit_admin["English"]["amouth"] = "Amouth";
	$fieldToolTipscredit_admin["English"]["amouth"] = "";
	$placeHolderscredit_admin["English"]["amouth"] = "";
	$fieldLabelscredit_admin["English"]["buy_timestamp"] = "Buy Timestamp";
	$fieldToolTipscredit_admin["English"]["buy_timestamp"] = "";
	$placeHolderscredit_admin["English"]["buy_timestamp"] = "";
	$fieldLabelscredit_admin["English"]["approved"] = "Approved";
	$fieldToolTipscredit_admin["English"]["approved"] = "";
	$placeHolderscredit_admin["English"]["approved"] = "";
	$fieldLabelscredit_admin["English"]["slipup_upload"] = "Slipup Upload";
	$fieldToolTipscredit_admin["English"]["slipup_upload"] = "";
	$placeHolderscredit_admin["English"]["slipup_upload"] = "";
	$fieldLabelscredit_admin["English"]["coin"] = "Coin";
	$fieldToolTipscredit_admin["English"]["coin"] = "";
	$placeHolderscredit_admin["English"]["coin"] = "";
	$fieldLabelscredit_admin["English"]["package"] = "Package";
	$fieldToolTipscredit_admin["English"]["package"] = "";
	$placeHolderscredit_admin["English"]["package"] = "";
	$fieldLabelscredit_admin["English"]["approved_timestamp"] = "Approved Timestamp";
	$fieldToolTipscredit_admin["English"]["approved_timestamp"] = "";
	$placeHolderscredit_admin["English"]["approved_timestamp"] = "";
	if (count($fieldToolTipscredit_admin["English"]))
		$tdatacredit_admin[".isUseToolTips"] = true;
}
if(mlang_getcurrentlang()=="Thai")
{
	$fieldLabelscredit_admin["Thai"] = array();
	$fieldToolTipscredit_admin["Thai"] = array();
	$placeHolderscredit_admin["Thai"] = array();
	$pageTitlescredit_admin["Thai"] = array();
	$fieldLabelscredit_admin["Thai"]["id"] = "Id";
	$fieldToolTipscredit_admin["Thai"]["id"] = "";
	$placeHolderscredit_admin["Thai"]["id"] = "";
	$fieldLabelscredit_admin["Thai"]["owner_id"] = "Owner Id";
	$fieldToolTipscredit_admin["Thai"]["owner_id"] = "";
	$placeHolderscredit_admin["Thai"]["owner_id"] = "";
	$fieldLabelscredit_admin["Thai"]["amouth"] = "จำนวนเงิน";
	$fieldToolTipscredit_admin["Thai"]["amouth"] = "";
	$placeHolderscredit_admin["Thai"]["amouth"] = "";
	$fieldLabelscredit_admin["Thai"]["buy_timestamp"] = "วัน-เวลา ที่ทำรายการ";
	$fieldToolTipscredit_admin["Thai"]["buy_timestamp"] = "";
	$placeHolderscredit_admin["Thai"]["buy_timestamp"] = "";
	$fieldLabelscredit_admin["Thai"]["approved"] = "Approved";
	$fieldToolTipscredit_admin["Thai"]["approved"] = "";
	$placeHolderscredit_admin["Thai"]["approved"] = "";
	$fieldLabelscredit_admin["Thai"]["slipup_upload"] = "Slipup Upload";
	$fieldToolTipscredit_admin["Thai"]["slipup_upload"] = "";
	$placeHolderscredit_admin["Thai"]["slipup_upload"] = "";
	$fieldLabelscredit_admin["Thai"]["coin"] = "Coin";
	$fieldToolTipscredit_admin["Thai"]["coin"] = "";
	$placeHolderscredit_admin["Thai"]["coin"] = "";
	$fieldLabelscredit_admin["Thai"]["package"] = "Package";
	$fieldToolTipscredit_admin["Thai"]["package"] = "";
	$placeHolderscredit_admin["Thai"]["package"] = "";
	$fieldLabelscredit_admin["Thai"]["approved_timestamp"] = "วันเวลา Approve";
	$fieldToolTipscredit_admin["Thai"]["approved_timestamp"] = "";
	$placeHolderscredit_admin["Thai"]["approved_timestamp"] = "";
	if (count($fieldToolTipscredit_admin["Thai"]))
		$tdatacredit_admin[".isUseToolTips"] = true;
}


	$tdatacredit_admin[".NCSearch"] = true;



$tdatacredit_admin[".shortTableName"] = "credit_admin";
$tdatacredit_admin[".nSecOptions"] = 0;

$tdatacredit_admin[".mainTableOwnerID"] = "";
$tdatacredit_admin[".entityType"] = 1;
$tdatacredit_admin[".connId"] = "vnnsbiz_at_192_168_1_111";


$tdatacredit_admin[".strOriginalTableName"] = "credit_transactions";

	



$tdatacredit_admin[".showAddInPopup"] = false;

$tdatacredit_admin[".showEditInPopup"] = false;

$tdatacredit_admin[".showViewInPopup"] = false;

$tdatacredit_admin[".listAjax"] = false;
//	temporary
//$tdatacredit_admin[".listAjax"] = false;

	$tdatacredit_admin[".audit"] = false;

	$tdatacredit_admin[".locking"] = false;


$pages = $tdatacredit_admin[".defaultPages"];

if( $pages[PAGE_EDIT] ) {
	$tdatacredit_admin[".edit"] = true;
	$tdatacredit_admin[".afterEditAction"] = 0;
	$tdatacredit_admin[".closePopupAfterEdit"] = 1;
	$tdatacredit_admin[".afterEditActionDetTable"] = "";
}

if( $pages[PAGE_ADD] ) {
$tdatacredit_admin[".add"] = true;
$tdatacredit_admin[".afterAddAction"] = 0;
$tdatacredit_admin[".closePopupAfterAdd"] = 1;
$tdatacredit_admin[".afterAddActionDetTable"] = "Detail tables not found!";
}

if( $pages[PAGE_LIST] ) {
	$tdatacredit_admin[".list"] = true;
}



$tdatacredit_admin[".strSortControlSettingsJSON"] = "";




if( $pages[PAGE_VIEW] ) {
$tdatacredit_admin[".view"] = true;
}

if( $pages[PAGE_IMPORT] ) {
$tdatacredit_admin[".import"] = true;
}

if( $pages[PAGE_EXPORT] ) {
$tdatacredit_admin[".exportTo"] = true;
}

if( $pages[PAGE_PRINT] ) {
$tdatacredit_admin[".printFriendly"] = true;
}



$tdatacredit_admin[".showSimpleSearchOptions"] = true; // temp fix #13449

// Allow Show/Hide Fields in GRID
$tdatacredit_admin[".allowShowHideFields"] = true; // temp fix #13449
//

// Allow Fields Reordering in GRID
$tdatacredit_admin[".allowFieldsReordering"] = true; // temp fix #13449
//

$tdatacredit_admin[".isUseAjaxSuggest"] = true;

$tdatacredit_admin[".rowHighlite"] = true;



																		

$tdatacredit_admin[".ajaxCodeSnippetAdded"] = false;

$tdatacredit_admin[".buttonsAdded"] = false;

$tdatacredit_admin[".addPageEvents"] = false;

// use timepicker for search panel
$tdatacredit_admin[".isUseTimeForSearch"] = false;


$tdatacredit_admin[".badgeColor"] = "DC143C";


$tdatacredit_admin[".allSearchFields"] = array();
$tdatacredit_admin[".filterFields"] = array();
$tdatacredit_admin[".requiredSearchFields"] = array();

$tdatacredit_admin[".googleLikeFields"] = array();
$tdatacredit_admin[".googleLikeFields"][] = "id";
$tdatacredit_admin[".googleLikeFields"][] = "owner_id";
$tdatacredit_admin[".googleLikeFields"][] = "amouth";
$tdatacredit_admin[".googleLikeFields"][] = "buy_timestamp";
$tdatacredit_admin[".googleLikeFields"][] = "approved";
$tdatacredit_admin[".googleLikeFields"][] = "slipup_upload";
$tdatacredit_admin[".googleLikeFields"][] = "coin";
$tdatacredit_admin[".googleLikeFields"][] = "package";
$tdatacredit_admin[".googleLikeFields"][] = "approved_timestamp";



$tdatacredit_admin[".tableType"] = "list";

$tdatacredit_admin[".printerPageOrientation"] = 0;
$tdatacredit_admin[".nPrinterPageScale"] = 100;

$tdatacredit_admin[".nPrinterSplitRecords"] = 40;

$tdatacredit_admin[".geocodingEnabled"] = false;










$tdatacredit_admin[".pageSize"] = 20;

$tdatacredit_admin[".warnLeavingPages"] = true;



$tstrOrderBy = "ORDER BY id DESC";
$tdatacredit_admin[".strOrderBy"] = $tstrOrderBy;

$tdatacredit_admin[".orderindexes"] = array();
	$tdatacredit_admin[".orderindexes"][] = array(1, (0 ? "ASC" : "DESC"), "id");



$tdatacredit_admin[".sqlHead"] = "SELECT id,  owner_id,  amouth,  buy_timestamp,  approved,  slipup_upload,  coin,  `package`,  approved_timestamp";
$tdatacredit_admin[".sqlFrom"] = "FROM credit_transactions";
$tdatacredit_admin[".sqlWhereExpr"] = "";
$tdatacredit_admin[".sqlTail"] = "";










//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatacredit_admin[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatacredit_admin[".arrGroupsPerPage"] = $arrGPP;

$tdatacredit_admin[".highlightSearchResults"] = true;

$tableKeyscredit_admin = array();
$tableKeyscredit_admin[] = "id";
$tdatacredit_admin[".Keys"] = $tableKeyscredit_admin;


$tdatacredit_admin[".hideMobileList"] = array();




//	id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "id";
	$fdata["GoodName"] = "id";
	$fdata["ownerTable"] = "credit_transactions";
	$fdata["Label"] = GetFieldLabel("credit_admin","id");
	$fdata["FieldType"] = 3;


		$fdata["AutoInc"] = true;

	
			

		$fdata["strField"] = "id";

	
		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "id";

	
	
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


	$tdatacredit_admin["id"] = $fdata;
		$tdatacredit_admin[".searchableFields"][] = "id";
//	owner_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "owner_id";
	$fdata["GoodName"] = "owner_id";
	$fdata["ownerTable"] = "credit_transactions";
	$fdata["Label"] = GetFieldLabel("credit_admin","owner_id");
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


	$tdatacredit_admin["owner_id"] = $fdata;
		$tdatacredit_admin[".searchableFields"][] = "owner_id";
//	amouth
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "amouth";
	$fdata["GoodName"] = "amouth";
	$fdata["ownerTable"] = "credit_transactions";
	$fdata["Label"] = GetFieldLabel("credit_admin","amouth");
	$fdata["FieldType"] = 3;


	
	
			

		$fdata["strField"] = "amouth";

	
		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "amouth";

	
	
				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "Number");

	
	
	
	
	
	
		$vdata["DecimalDigits"] = 0;

	
	
	
	
		
	
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


	$tdatacredit_admin["amouth"] = $fdata;
		$tdatacredit_admin[".searchableFields"][] = "amouth";
//	buy_timestamp
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "buy_timestamp";
	$fdata["GoodName"] = "buy_timestamp";
	$fdata["ownerTable"] = "credit_transactions";
	$fdata["Label"] = GetFieldLabel("credit_admin","buy_timestamp");
	$fdata["FieldType"] = 135;


	
	
			

		$fdata["strField"] = "buy_timestamp";

	
		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "buy_timestamp";

	
	
				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "Datetime");

	
	
	
	
	
	
	
	
	
	
	
		
	
		$vdata["NeedEncode"] = true;

	
		$vdata["truncateText"] = true;
	$vdata["NumberOfChars"] = 80;

	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Readonly");

	
		$edata["weekdayMessage"] = array("message" => "Invalid week day", "messageType" => "Text");
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


	$tdatacredit_admin["buy_timestamp"] = $fdata;
		$tdatacredit_admin[".searchableFields"][] = "buy_timestamp";
//	approved
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "approved";
	$fdata["GoodName"] = "approved";
	$fdata["ownerTable"] = "credit_transactions";
	$fdata["Label"] = GetFieldLabel("credit_admin","approved");
	$fdata["FieldType"] = 200;


	
	
			

		$fdata["strField"] = "approved";

		$fdata["sourceSingle"] = "approved";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "approved";

	
	
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


	$tdatacredit_admin["approved"] = $fdata;
		$tdatacredit_admin[".searchableFields"][] = "approved";
//	slipup_upload
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
	$fdata["strName"] = "slipup_upload";
	$fdata["GoodName"] = "slipup_upload";
	$fdata["ownerTable"] = "credit_transactions";
	$fdata["Label"] = GetFieldLabel("credit_admin","slipup_upload");
	$fdata["FieldType"] = 200;


	
	
			

		$fdata["strField"] = "slipup_upload";

		$fdata["sourceSingle"] = "slipup_upload";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "slipup_upload";

	
	
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


	$tdatacredit_admin["slipup_upload"] = $fdata;
		$tdatacredit_admin[".searchableFields"][] = "slipup_upload";
//	coin
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 7;
	$fdata["strName"] = "coin";
	$fdata["GoodName"] = "coin";
	$fdata["ownerTable"] = "credit_transactions";
	$fdata["Label"] = GetFieldLabel("credit_admin","coin");
	$fdata["FieldType"] = 3;


	
	
			

		$fdata["strField"] = "coin";

		$fdata["sourceSingle"] = "coin";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "coin";

	
	
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


	$tdatacredit_admin["coin"] = $fdata;
		$tdatacredit_admin[".searchableFields"][] = "coin";
//	package
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 8;
	$fdata["strName"] = "package";
	$fdata["GoodName"] = "package";
	$fdata["ownerTable"] = "credit_transactions";
	$fdata["Label"] = GetFieldLabel("credit_admin","package");
	$fdata["FieldType"] = 200;


	
	
			

		$fdata["strField"] = "package";

		$fdata["sourceSingle"] = "package";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "`package`";

	
	
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


	$tdatacredit_admin["package"] = $fdata;
		$tdatacredit_admin[".searchableFields"][] = "package";
//	approved_timestamp
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 9;
	$fdata["strName"] = "approved_timestamp";
	$fdata["GoodName"] = "approved_timestamp";
	$fdata["ownerTable"] = "credit_transactions";
	$fdata["Label"] = GetFieldLabel("credit_admin","approved_timestamp");
	$fdata["FieldType"] = 135;


	
	
			

		$fdata["strField"] = "approved_timestamp";

		$fdata["sourceSingle"] = "approved_timestamp";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "approved_timestamp";

	
	
				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "Datetime");

	
	
	
	
	
	
	
	
	
	
	
		
	
		$vdata["NeedEncode"] = true;

	
		$vdata["truncateText"] = true;
	$vdata["NumberOfChars"] = 80;

	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Readonly");

	
		$edata["weekdayMessage"] = array("message" => "Invalid week day", "messageType" => "Text");
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


	$tdatacredit_admin["approved_timestamp"] = $fdata;
		$tdatacredit_admin[".searchableFields"][] = "approved_timestamp";


$tables_data["credit_admin"]=&$tdatacredit_admin;
$field_labels["credit_admin"] = &$fieldLabelscredit_admin;
$fieldToolTips["credit_admin"] = &$fieldToolTipscredit_admin;
$placeHolders["credit_admin"] = &$placeHolderscredit_admin;
$page_titles["credit_admin"] = &$pageTitlescredit_admin;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)

//if !@TABLE.bReportCrossTab

$detailsTablesData["credit_admin"] = array();
//endif

// tables which are master tables for current table (detail)
$masterTablesData["credit_admin"] = array();



// -----------------end  prepare master-details data arrays ------------------------------//



require_once(getabspath("classes/sql.php"));











function createSqlQuery_credit_admin()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "id,  owner_id,  amouth,  buy_timestamp,  approved,  slipup_upload,  coin,  `package`,  approved_timestamp";
$proto0["m_strFrom"] = "FROM credit_transactions";
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
	"m_strTable" => "credit_transactions",
	"m_srcTableName" => "credit_admin"
));

$proto6["m_sql"] = "id";
$proto6["m_srcTableName"] = "credit_admin";
$proto6["m_expr"]=$obj;
$proto6["m_alias"] = "";
$obj = new SQLFieldListItem($proto6);

$proto0["m_fieldlist"][]=$obj;
						$proto8=array();
			$obj = new SQLField(array(
	"m_strName" => "owner_id",
	"m_strTable" => "credit_transactions",
	"m_srcTableName" => "credit_admin"
));

$proto8["m_sql"] = "owner_id";
$proto8["m_srcTableName"] = "credit_admin";
$proto8["m_expr"]=$obj;
$proto8["m_alias"] = "";
$obj = new SQLFieldListItem($proto8);

$proto0["m_fieldlist"][]=$obj;
						$proto10=array();
			$obj = new SQLField(array(
	"m_strName" => "amouth",
	"m_strTable" => "credit_transactions",
	"m_srcTableName" => "credit_admin"
));

$proto10["m_sql"] = "amouth";
$proto10["m_srcTableName"] = "credit_admin";
$proto10["m_expr"]=$obj;
$proto10["m_alias"] = "";
$obj = new SQLFieldListItem($proto10);

$proto0["m_fieldlist"][]=$obj;
						$proto12=array();
			$obj = new SQLField(array(
	"m_strName" => "buy_timestamp",
	"m_strTable" => "credit_transactions",
	"m_srcTableName" => "credit_admin"
));

$proto12["m_sql"] = "buy_timestamp";
$proto12["m_srcTableName"] = "credit_admin";
$proto12["m_expr"]=$obj;
$proto12["m_alias"] = "";
$obj = new SQLFieldListItem($proto12);

$proto0["m_fieldlist"][]=$obj;
						$proto14=array();
			$obj = new SQLField(array(
	"m_strName" => "approved",
	"m_strTable" => "credit_transactions",
	"m_srcTableName" => "credit_admin"
));

$proto14["m_sql"] = "approved";
$proto14["m_srcTableName"] = "credit_admin";
$proto14["m_expr"]=$obj;
$proto14["m_alias"] = "";
$obj = new SQLFieldListItem($proto14);

$proto0["m_fieldlist"][]=$obj;
						$proto16=array();
			$obj = new SQLField(array(
	"m_strName" => "slipup_upload",
	"m_strTable" => "credit_transactions",
	"m_srcTableName" => "credit_admin"
));

$proto16["m_sql"] = "slipup_upload";
$proto16["m_srcTableName"] = "credit_admin";
$proto16["m_expr"]=$obj;
$proto16["m_alias"] = "";
$obj = new SQLFieldListItem($proto16);

$proto0["m_fieldlist"][]=$obj;
						$proto18=array();
			$obj = new SQLField(array(
	"m_strName" => "coin",
	"m_strTable" => "credit_transactions",
	"m_srcTableName" => "credit_admin"
));

$proto18["m_sql"] = "coin";
$proto18["m_srcTableName"] = "credit_admin";
$proto18["m_expr"]=$obj;
$proto18["m_alias"] = "";
$obj = new SQLFieldListItem($proto18);

$proto0["m_fieldlist"][]=$obj;
						$proto20=array();
			$obj = new SQLField(array(
	"m_strName" => "package",
	"m_strTable" => "credit_transactions",
	"m_srcTableName" => "credit_admin"
));

$proto20["m_sql"] = "`package`";
$proto20["m_srcTableName"] = "credit_admin";
$proto20["m_expr"]=$obj;
$proto20["m_alias"] = "";
$obj = new SQLFieldListItem($proto20);

$proto0["m_fieldlist"][]=$obj;
						$proto22=array();
			$obj = new SQLField(array(
	"m_strName" => "approved_timestamp",
	"m_strTable" => "credit_transactions",
	"m_srcTableName" => "credit_admin"
));

$proto22["m_sql"] = "approved_timestamp";
$proto22["m_srcTableName"] = "credit_admin";
$proto22["m_expr"]=$obj;
$proto22["m_alias"] = "";
$obj = new SQLFieldListItem($proto22);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto24=array();
$proto24["m_link"] = "SQLL_MAIN";
			$proto25=array();
$proto25["m_strName"] = "credit_transactions";
$proto25["m_srcTableName"] = "credit_admin";
$proto25["m_columns"] = array();
$proto25["m_columns"][] = "id";
$proto25["m_columns"][] = "owner_id";
$proto25["m_columns"][] = "package";
$proto25["m_columns"][] = "amouth";
$proto25["m_columns"][] = "buy_timestamp";
$proto25["m_columns"][] = "approved";
$proto25["m_columns"][] = "slipup_upload";
$proto25["m_columns"][] = "approved_timestamp";
$proto25["m_columns"][] = "coin";
$obj = new SQLTable($proto25);

$proto24["m_table"] = $obj;
$proto24["m_sql"] = "credit_transactions";
$proto24["m_alias"] = "";
$proto24["m_srcTableName"] = "credit_admin";
$proto26=array();
$proto26["m_sql"] = "";
$proto26["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto26["m_column"]=$obj;
$proto26["m_contained"] = array();
$proto26["m_strCase"] = "";
$proto26["m_havingmode"] = false;
$proto26["m_inBrackets"] = false;
$proto26["m_useAlias"] = false;
$obj = new SQLLogicalExpr($proto26);

$proto24["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto24);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
												$proto28=array();
						$obj = new SQLField(array(
	"m_strName" => "id",
	"m_strTable" => "credit_transactions",
	"m_srcTableName" => "credit_admin"
));

$proto28["m_column"]=$obj;
$proto28["m_bAsc"] = 0;
$proto28["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto28);

$proto0["m_orderby"][]=$obj;					
$proto0["m_srcTableName"]="credit_admin";		
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_credit_admin = createSqlQuery_credit_admin();


	
		;

									

$tdatacredit_admin[".sqlquery"] = $queryData_credit_admin;



$tableEvents["credit_admin"] = new eventsBase;
$tdatacredit_admin[".hasEvents"] = false;

?>