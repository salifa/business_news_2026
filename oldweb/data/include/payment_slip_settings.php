<?php
$tdatapayment_slip = array();
$tdatapayment_slip[".searchableFields"] = array();
$tdatapayment_slip[".ShortName"] = "payment_slip";
$tdatapayment_slip[".OwnerID"] = "owner_id";
$tdatapayment_slip[".OriginalTable"] = "payment";


$tdatapayment_slip[".pagesByType"] = my_json_decode( "{\"edit\":[\"edit\"],\"list\":[\"list\"],\"search\":[\"search\"]}" );
$tdatapayment_slip[".originalPagesByType"] = $tdatapayment_slip[".pagesByType"];
$tdatapayment_slip[".pages"] = types2pages( my_json_decode( "{\"edit\":[\"edit\"],\"list\":[\"list\"],\"search\":[\"search\"]}" ) );
$tdatapayment_slip[".originalPages"] = $tdatapayment_slip[".pages"];
$tdatapayment_slip[".defaultPages"] = my_json_decode( "{\"edit\":\"edit\",\"list\":\"list\",\"search\":\"search\"}" );
$tdatapayment_slip[".originalDefaultPages"] = $tdatapayment_slip[".defaultPages"];

//	field labels
$fieldLabelspayment_slip = array();
$fieldToolTipspayment_slip = array();
$pageTitlespayment_slip = array();
$placeHolderspayment_slip = array();

if(mlang_getcurrentlang()=="English")
{
	$fieldLabelspayment_slip["English"] = array();
	$fieldToolTipspayment_slip["English"] = array();
	$placeHolderspayment_slip["English"] = array();
	$pageTitlespayment_slip["English"] = array();
	$fieldLabelspayment_slip["English"]["id"] = "Id";
	$fieldToolTipspayment_slip["English"]["id"] = "";
	$placeHolderspayment_slip["English"]["id"] = "";
	$fieldLabelspayment_slip["English"]["owner_id"] = "Owner Id";
	$fieldToolTipspayment_slip["English"]["owner_id"] = "";
	$placeHolderspayment_slip["English"]["owner_id"] = "";
	$fieldLabelspayment_slip["English"]["paydate"] = "Paydate";
	$fieldToolTipspayment_slip["English"]["paydate"] = "";
	$placeHolderspayment_slip["English"]["paydate"] = "";
	$fieldLabelspayment_slip["English"]["paytime"] = "Paytime";
	$fieldToolTipspayment_slip["English"]["paytime"] = "";
	$placeHolderspayment_slip["English"]["paytime"] = "";
	$fieldLabelspayment_slip["English"]["amount"] = "Amount";
	$fieldToolTipspayment_slip["English"]["amount"] = "";
	$placeHolderspayment_slip["English"]["amount"] = "";
	$fieldLabelspayment_slip["English"]["slip_upload"] = "Slip Upload";
	$fieldToolTipspayment_slip["English"]["slip_upload"] = "";
	$placeHolderspayment_slip["English"]["slip_upload"] = "";
	$fieldLabelspayment_slip["English"]["remark"] = "Remark";
	$fieldToolTipspayment_slip["English"]["remark"] = "";
	$placeHolderspayment_slip["English"]["remark"] = "";
	$fieldLabelspayment_slip["English"]["admin_confirm"] = "Admin Confirm";
	$fieldToolTipspayment_slip["English"]["admin_confirm"] = "";
	$placeHolderspayment_slip["English"]["admin_confirm"] = "";
	if (count($fieldToolTipspayment_slip["English"]))
		$tdatapayment_slip[".isUseToolTips"] = true;
}
if(mlang_getcurrentlang()=="Thai")
{
	$fieldLabelspayment_slip["Thai"] = array();
	$fieldToolTipspayment_slip["Thai"] = array();
	$placeHolderspayment_slip["Thai"] = array();
	$pageTitlespayment_slip["Thai"] = array();
	$fieldLabelspayment_slip["Thai"]["id"] = "Id";
	$fieldToolTipspayment_slip["Thai"]["id"] = "";
	$placeHolderspayment_slip["Thai"]["id"] = "";
	$fieldLabelspayment_slip["Thai"]["owner_id"] = "Owner Id";
	$fieldToolTipspayment_slip["Thai"]["owner_id"] = "";
	$placeHolderspayment_slip["Thai"]["owner_id"] = "";
	$fieldLabelspayment_slip["Thai"]["paydate"] = "Paydate";
	$fieldToolTipspayment_slip["Thai"]["paydate"] = "";
	$placeHolderspayment_slip["Thai"]["paydate"] = "";
	$fieldLabelspayment_slip["Thai"]["paytime"] = "Paytime";
	$fieldToolTipspayment_slip["Thai"]["paytime"] = "";
	$placeHolderspayment_slip["Thai"]["paytime"] = "";
	$fieldLabelspayment_slip["Thai"]["amount"] = "Amount";
	$fieldToolTipspayment_slip["Thai"]["amount"] = "";
	$placeHolderspayment_slip["Thai"]["amount"] = "";
	$fieldLabelspayment_slip["Thai"]["slip_upload"] = "Slip Upload";
	$fieldToolTipspayment_slip["Thai"]["slip_upload"] = "";
	$placeHolderspayment_slip["Thai"]["slip_upload"] = "";
	$fieldLabelspayment_slip["Thai"]["remark"] = "Remark";
	$fieldToolTipspayment_slip["Thai"]["remark"] = "";
	$placeHolderspayment_slip["Thai"]["remark"] = "";
	$fieldLabelspayment_slip["Thai"]["admin_confirm"] = "Admin Confirm";
	$fieldToolTipspayment_slip["Thai"]["admin_confirm"] = "";
	$placeHolderspayment_slip["Thai"]["admin_confirm"] = "";
	if (count($fieldToolTipspayment_slip["Thai"]))
		$tdatapayment_slip[".isUseToolTips"] = true;
}


	$tdatapayment_slip[".NCSearch"] = true;



$tdatapayment_slip[".shortTableName"] = "payment_slip";
$tdatapayment_slip[".nSecOptions"] = 1;

$tdatapayment_slip[".mainTableOwnerID"] = "owner_id";
$tdatapayment_slip[".entityType"] = 1;
$tdatapayment_slip[".connId"] = "vnnsbiz_at_192_168_1_111";


$tdatapayment_slip[".strOriginalTableName"] = "payment";

	



$tdatapayment_slip[".showAddInPopup"] = false;

$tdatapayment_slip[".showEditInPopup"] = false;

$tdatapayment_slip[".showViewInPopup"] = false;

$tdatapayment_slip[".listAjax"] = false;
//	temporary
//$tdatapayment_slip[".listAjax"] = false;

	$tdatapayment_slip[".audit"] = false;

	$tdatapayment_slip[".locking"] = false;


$pages = $tdatapayment_slip[".defaultPages"];

if( $pages[PAGE_EDIT] ) {
	$tdatapayment_slip[".edit"] = true;
	$tdatapayment_slip[".afterEditAction"] = 0;
	$tdatapayment_slip[".closePopupAfterEdit"] = 1;
	$tdatapayment_slip[".afterEditActionDetTable"] = "Detail tables not found!";
}

if( $pages[PAGE_ADD] ) {
$tdatapayment_slip[".add"] = true;
$tdatapayment_slip[".afterAddAction"] = 0;
$tdatapayment_slip[".closePopupAfterAdd"] = 1;
$tdatapayment_slip[".afterAddActionDetTable"] = "";
}

if( $pages[PAGE_LIST] ) {
	$tdatapayment_slip[".list"] = true;
}



$tdatapayment_slip[".strSortControlSettingsJSON"] = "";




if( $pages[PAGE_VIEW] ) {
$tdatapayment_slip[".view"] = true;
}

if( $pages[PAGE_IMPORT] ) {
$tdatapayment_slip[".import"] = true;
}

if( $pages[PAGE_EXPORT] ) {
$tdatapayment_slip[".exportTo"] = true;
}

if( $pages[PAGE_PRINT] ) {
$tdatapayment_slip[".printFriendly"] = true;
}



$tdatapayment_slip[".showSimpleSearchOptions"] = true; // temp fix #13449

// Allow Show/Hide Fields in GRID
$tdatapayment_slip[".allowShowHideFields"] = true; // temp fix #13449
//

// Allow Fields Reordering in GRID
$tdatapayment_slip[".allowFieldsReordering"] = true; // temp fix #13449
//

$tdatapayment_slip[".isUseAjaxSuggest"] = true;

$tdatapayment_slip[".rowHighlite"] = true;



																		

$tdatapayment_slip[".ajaxCodeSnippetAdded"] = false;

$tdatapayment_slip[".buttonsAdded"] = false;

$tdatapayment_slip[".addPageEvents"] = false;

// use timepicker for search panel
$tdatapayment_slip[".isUseTimeForSearch"] = false;


$tdatapayment_slip[".badgeColor"] = "00C2C5";


$tdatapayment_slip[".allSearchFields"] = array();
$tdatapayment_slip[".filterFields"] = array();
$tdatapayment_slip[".requiredSearchFields"] = array();

$tdatapayment_slip[".googleLikeFields"] = array();
$tdatapayment_slip[".googleLikeFields"][] = "id";
$tdatapayment_slip[".googleLikeFields"][] = "owner_id";
$tdatapayment_slip[".googleLikeFields"][] = "paydate";
$tdatapayment_slip[".googleLikeFields"][] = "paytime";
$tdatapayment_slip[".googleLikeFields"][] = "amount";
$tdatapayment_slip[".googleLikeFields"][] = "slip_upload";
$tdatapayment_slip[".googleLikeFields"][] = "remark";
$tdatapayment_slip[".googleLikeFields"][] = "admin_confirm";



$tdatapayment_slip[".tableType"] = "list";

$tdatapayment_slip[".printerPageOrientation"] = 0;
$tdatapayment_slip[".nPrinterPageScale"] = 100;

$tdatapayment_slip[".nPrinterSplitRecords"] = 40;

$tdatapayment_slip[".geocodingEnabled"] = false;










$tdatapayment_slip[".pageSize"] = 20;

$tdatapayment_slip[".warnLeavingPages"] = true;



$tstrOrderBy = "ORDER BY id DESC";
$tdatapayment_slip[".strOrderBy"] = $tstrOrderBy;

$tdatapayment_slip[".orderindexes"] = array();
	$tdatapayment_slip[".orderindexes"][] = array(1, (0 ? "ASC" : "DESC"), "id");



$tdatapayment_slip[".sqlHead"] = "SELECT id,  owner_id,  paydate,  paytime,  amount,  slip_upload,  remark,  admin_confirm";
$tdatapayment_slip[".sqlFrom"] = "FROM payment";
$tdatapayment_slip[".sqlWhereExpr"] = "";
$tdatapayment_slip[".sqlTail"] = "";










//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatapayment_slip[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatapayment_slip[".arrGroupsPerPage"] = $arrGPP;

$tdatapayment_slip[".highlightSearchResults"] = true;

$tableKeyspayment_slip = array();
$tableKeyspayment_slip[] = "id";
$tdatapayment_slip[".Keys"] = $tableKeyspayment_slip;


$tdatapayment_slip[".hideMobileList"] = array();




//	id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "id";
	$fdata["GoodName"] = "id";
	$fdata["ownerTable"] = "payment";
	$fdata["Label"] = GetFieldLabel("payment_slip","id");
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


	$tdatapayment_slip["id"] = $fdata;
		$tdatapayment_slip[".searchableFields"][] = "id";
//	owner_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "owner_id";
	$fdata["GoodName"] = "owner_id";
	$fdata["ownerTable"] = "payment";
	$fdata["Label"] = GetFieldLabel("payment_slip","owner_id");
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


	$tdatapayment_slip["owner_id"] = $fdata;
		$tdatapayment_slip[".searchableFields"][] = "owner_id";
//	paydate
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "paydate";
	$fdata["GoodName"] = "paydate";
	$fdata["ownerTable"] = "payment";
	$fdata["Label"] = GetFieldLabel("payment_slip","paydate");
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


	$tdatapayment_slip["paydate"] = $fdata;
		$tdatapayment_slip[".searchableFields"][] = "paydate";
//	paytime
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "paytime";
	$fdata["GoodName"] = "paytime";
	$fdata["ownerTable"] = "payment";
	$fdata["Label"] = GetFieldLabel("payment_slip","paytime");
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


	$tdatapayment_slip["paytime"] = $fdata;
		$tdatapayment_slip[".searchableFields"][] = "paytime";
//	amount
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "amount";
	$fdata["GoodName"] = "amount";
	$fdata["ownerTable"] = "payment";
	$fdata["Label"] = GetFieldLabel("payment_slip","amount");
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


	$tdatapayment_slip["amount"] = $fdata;
		$tdatapayment_slip[".searchableFields"][] = "amount";
//	slip_upload
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
	$fdata["strName"] = "slip_upload";
	$fdata["GoodName"] = "slip_upload";
	$fdata["ownerTable"] = "payment";
	$fdata["Label"] = GetFieldLabel("payment_slip","slip_upload");
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


	$tdatapayment_slip["slip_upload"] = $fdata;
		$tdatapayment_slip[".searchableFields"][] = "slip_upload";
//	remark
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 7;
	$fdata["strName"] = "remark";
	$fdata["GoodName"] = "remark";
	$fdata["ownerTable"] = "payment";
	$fdata["Label"] = GetFieldLabel("payment_slip","remark");
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


	$tdatapayment_slip["remark"] = $fdata;
		$tdatapayment_slip[".searchableFields"][] = "remark";
//	admin_confirm
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 8;
	$fdata["strName"] = "admin_confirm";
	$fdata["GoodName"] = "admin_confirm";
	$fdata["ownerTable"] = "payment";
	$fdata["Label"] = GetFieldLabel("payment_slip","admin_confirm");
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


	$tdatapayment_slip["admin_confirm"] = $fdata;
		$tdatapayment_slip[".searchableFields"][] = "admin_confirm";


$tables_data["payment slip"]=&$tdatapayment_slip;
$field_labels["payment_slip"] = &$fieldLabelspayment_slip;
$fieldToolTips["payment_slip"] = &$fieldToolTipspayment_slip;
$placeHolders["payment_slip"] = &$placeHolderspayment_slip;
$page_titles["payment_slip"] = &$pageTitlespayment_slip;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)

//if !@TABLE.bReportCrossTab

$detailsTablesData["payment slip"] = array();
//endif

// tables which are master tables for current table (detail)
$masterTablesData["payment slip"] = array();



// -----------------end  prepare master-details data arrays ------------------------------//



require_once(getabspath("classes/sql.php"));











function createSqlQuery_payment_slip()
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
	"m_srcTableName" => "payment slip"
));

$proto6["m_sql"] = "id";
$proto6["m_srcTableName"] = "payment slip";
$proto6["m_expr"]=$obj;
$proto6["m_alias"] = "";
$obj = new SQLFieldListItem($proto6);

$proto0["m_fieldlist"][]=$obj;
						$proto8=array();
			$obj = new SQLField(array(
	"m_strName" => "owner_id",
	"m_strTable" => "payment",
	"m_srcTableName" => "payment slip"
));

$proto8["m_sql"] = "owner_id";
$proto8["m_srcTableName"] = "payment slip";
$proto8["m_expr"]=$obj;
$proto8["m_alias"] = "";
$obj = new SQLFieldListItem($proto8);

$proto0["m_fieldlist"][]=$obj;
						$proto10=array();
			$obj = new SQLField(array(
	"m_strName" => "paydate",
	"m_strTable" => "payment",
	"m_srcTableName" => "payment slip"
));

$proto10["m_sql"] = "paydate";
$proto10["m_srcTableName"] = "payment slip";
$proto10["m_expr"]=$obj;
$proto10["m_alias"] = "";
$obj = new SQLFieldListItem($proto10);

$proto0["m_fieldlist"][]=$obj;
						$proto12=array();
			$obj = new SQLField(array(
	"m_strName" => "paytime",
	"m_strTable" => "payment",
	"m_srcTableName" => "payment slip"
));

$proto12["m_sql"] = "paytime";
$proto12["m_srcTableName"] = "payment slip";
$proto12["m_expr"]=$obj;
$proto12["m_alias"] = "";
$obj = new SQLFieldListItem($proto12);

$proto0["m_fieldlist"][]=$obj;
						$proto14=array();
			$obj = new SQLField(array(
	"m_strName" => "amount",
	"m_strTable" => "payment",
	"m_srcTableName" => "payment slip"
));

$proto14["m_sql"] = "amount";
$proto14["m_srcTableName"] = "payment slip";
$proto14["m_expr"]=$obj;
$proto14["m_alias"] = "";
$obj = new SQLFieldListItem($proto14);

$proto0["m_fieldlist"][]=$obj;
						$proto16=array();
			$obj = new SQLField(array(
	"m_strName" => "slip_upload",
	"m_strTable" => "payment",
	"m_srcTableName" => "payment slip"
));

$proto16["m_sql"] = "slip_upload";
$proto16["m_srcTableName"] = "payment slip";
$proto16["m_expr"]=$obj;
$proto16["m_alias"] = "";
$obj = new SQLFieldListItem($proto16);

$proto0["m_fieldlist"][]=$obj;
						$proto18=array();
			$obj = new SQLField(array(
	"m_strName" => "remark",
	"m_strTable" => "payment",
	"m_srcTableName" => "payment slip"
));

$proto18["m_sql"] = "remark";
$proto18["m_srcTableName"] = "payment slip";
$proto18["m_expr"]=$obj;
$proto18["m_alias"] = "";
$obj = new SQLFieldListItem($proto18);

$proto0["m_fieldlist"][]=$obj;
						$proto20=array();
			$obj = new SQLField(array(
	"m_strName" => "admin_confirm",
	"m_strTable" => "payment",
	"m_srcTableName" => "payment slip"
));

$proto20["m_sql"] = "admin_confirm";
$proto20["m_srcTableName"] = "payment slip";
$proto20["m_expr"]=$obj;
$proto20["m_alias"] = "";
$obj = new SQLFieldListItem($proto20);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto22=array();
$proto22["m_link"] = "SQLL_MAIN";
			$proto23=array();
$proto23["m_strName"] = "payment";
$proto23["m_srcTableName"] = "payment slip";
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
$proto22["m_srcTableName"] = "payment slip";
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
	"m_srcTableName" => "payment slip"
));

$proto26["m_column"]=$obj;
$proto26["m_bAsc"] = 0;
$proto26["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto26);

$proto0["m_orderby"][]=$obj;					
$proto0["m_srcTableName"]="payment slip";		
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_payment_slip = createSqlQuery_payment_slip();


	
		;

								

$tdatapayment_slip[".sqlquery"] = $queryData_payment_slip;



$tableEvents["payment slip"] = new eventsBase;
$tdatapayment_slip[".hasEvents"] = false;

?>