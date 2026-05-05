<?php
$tdataonline_placard_users = array();
$tdataonline_placard_users[".searchableFields"] = array();
$tdataonline_placard_users[".ShortName"] = "online_placard_users";
$tdataonline_placard_users[".OwnerID"] = "";
$tdataonline_placard_users[".OriginalTable"] = "online_placard_users";


$tdataonline_placard_users[".pagesByType"] = my_json_decode( "{\"search\":[\"search\"]}" );
$tdataonline_placard_users[".originalPagesByType"] = $tdataonline_placard_users[".pagesByType"];
$tdataonline_placard_users[".pages"] = types2pages( my_json_decode( "{\"search\":[\"search\"]}" ) );
$tdataonline_placard_users[".originalPages"] = $tdataonline_placard_users[".pages"];
$tdataonline_placard_users[".defaultPages"] = my_json_decode( "{\"search\":\"search\"}" );
$tdataonline_placard_users[".originalDefaultPages"] = $tdataonline_placard_users[".defaultPages"];

//	field labels
$fieldLabelsonline_placard_users = array();
$fieldToolTipsonline_placard_users = array();
$pageTitlesonline_placard_users = array();
$placeHoldersonline_placard_users = array();

if(mlang_getcurrentlang()=="English")
{
	$fieldLabelsonline_placard_users["English"] = array();
	$fieldToolTipsonline_placard_users["English"] = array();
	$placeHoldersonline_placard_users["English"] = array();
	$pageTitlesonline_placard_users["English"] = array();
	$fieldLabelsonline_placard_users["English"]["ID"] = "ID";
	$fieldToolTipsonline_placard_users["English"]["ID"] = "";
	$placeHoldersonline_placard_users["English"]["ID"] = "";
	$fieldLabelsonline_placard_users["English"]["username"] = "Username";
	$fieldToolTipsonline_placard_users["English"]["username"] = "";
	$placeHoldersonline_placard_users["English"]["username"] = "";
	$fieldLabelsonline_placard_users["English"]["password"] = "Password";
	$fieldToolTipsonline_placard_users["English"]["password"] = "";
	$placeHoldersonline_placard_users["English"]["password"] = "";
	$fieldLabelsonline_placard_users["English"]["email"] = "Email";
	$fieldToolTipsonline_placard_users["English"]["email"] = "";
	$placeHoldersonline_placard_users["English"]["email"] = "";
	$fieldLabelsonline_placard_users["English"]["fullname"] = "Fullname";
	$fieldToolTipsonline_placard_users["English"]["fullname"] = "";
	$placeHoldersonline_placard_users["English"]["fullname"] = "";
	$fieldLabelsonline_placard_users["English"]["groupid"] = "Groupid";
	$fieldToolTipsonline_placard_users["English"]["groupid"] = "";
	$placeHoldersonline_placard_users["English"]["groupid"] = "";
	$fieldLabelsonline_placard_users["English"]["active"] = "Active";
	$fieldToolTipsonline_placard_users["English"]["active"] = "";
	$placeHoldersonline_placard_users["English"]["active"] = "";
	$fieldLabelsonline_placard_users["English"]["ext_security_id"] = "Ext Security Id";
	$fieldToolTipsonline_placard_users["English"]["ext_security_id"] = "";
	$placeHoldersonline_placard_users["English"]["ext_security_id"] = "";
	$fieldLabelsonline_placard_users["English"]["reset_token"] = "Reset Token";
	$fieldToolTipsonline_placard_users["English"]["reset_token"] = "";
	$placeHoldersonline_placard_users["English"]["reset_token"] = "";
	$fieldLabelsonline_placard_users["English"]["reset_date"] = "Reset Date";
	$fieldToolTipsonline_placard_users["English"]["reset_date"] = "";
	$placeHoldersonline_placard_users["English"]["reset_date"] = "";
	$fieldLabelsonline_placard_users["English"]["apikey"] = "Apikey";
	$fieldToolTipsonline_placard_users["English"]["apikey"] = "";
	$placeHoldersonline_placard_users["English"]["apikey"] = "";
	if (count($fieldToolTipsonline_placard_users["English"]))
		$tdataonline_placard_users[".isUseToolTips"] = true;
}
if(mlang_getcurrentlang()=="Thai")
{
	$fieldLabelsonline_placard_users["Thai"] = array();
	$fieldToolTipsonline_placard_users["Thai"] = array();
	$placeHoldersonline_placard_users["Thai"] = array();
	$pageTitlesonline_placard_users["Thai"] = array();
	$fieldLabelsonline_placard_users["Thai"]["ID"] = "ID";
	$fieldToolTipsonline_placard_users["Thai"]["ID"] = "";
	$placeHoldersonline_placard_users["Thai"]["ID"] = "";
	$fieldLabelsonline_placard_users["Thai"]["username"] = "Username";
	$fieldToolTipsonline_placard_users["Thai"]["username"] = "";
	$placeHoldersonline_placard_users["Thai"]["username"] = "";
	$fieldLabelsonline_placard_users["Thai"]["password"] = "Password";
	$fieldToolTipsonline_placard_users["Thai"]["password"] = "";
	$placeHoldersonline_placard_users["Thai"]["password"] = "";
	$fieldLabelsonline_placard_users["Thai"]["email"] = "Email";
	$fieldToolTipsonline_placard_users["Thai"]["email"] = "";
	$placeHoldersonline_placard_users["Thai"]["email"] = "";
	$fieldLabelsonline_placard_users["Thai"]["fullname"] = "Fullname";
	$fieldToolTipsonline_placard_users["Thai"]["fullname"] = "";
	$placeHoldersonline_placard_users["Thai"]["fullname"] = "";
	$fieldLabelsonline_placard_users["Thai"]["groupid"] = "Groupid";
	$fieldToolTipsonline_placard_users["Thai"]["groupid"] = "";
	$placeHoldersonline_placard_users["Thai"]["groupid"] = "";
	$fieldLabelsonline_placard_users["Thai"]["active"] = "Active";
	$fieldToolTipsonline_placard_users["Thai"]["active"] = "";
	$placeHoldersonline_placard_users["Thai"]["active"] = "";
	$fieldLabelsonline_placard_users["Thai"]["ext_security_id"] = "Ext Security Id";
	$fieldToolTipsonline_placard_users["Thai"]["ext_security_id"] = "";
	$placeHoldersonline_placard_users["Thai"]["ext_security_id"] = "";
	$fieldLabelsonline_placard_users["Thai"]["reset_token"] = "Reset Token";
	$fieldToolTipsonline_placard_users["Thai"]["reset_token"] = "";
	$placeHoldersonline_placard_users["Thai"]["reset_token"] = "";
	$fieldLabelsonline_placard_users["Thai"]["reset_date"] = "Reset Date";
	$fieldToolTipsonline_placard_users["Thai"]["reset_date"] = "";
	$placeHoldersonline_placard_users["Thai"]["reset_date"] = "";
	$fieldLabelsonline_placard_users["Thai"]["apikey"] = "Apikey";
	$fieldToolTipsonline_placard_users["Thai"]["apikey"] = "";
	$placeHoldersonline_placard_users["Thai"]["apikey"] = "";
	if (count($fieldToolTipsonline_placard_users["Thai"]))
		$tdataonline_placard_users[".isUseToolTips"] = true;
}


	$tdataonline_placard_users[".NCSearch"] = true;



$tdataonline_placard_users[".shortTableName"] = "online_placard_users";
$tdataonline_placard_users[".nSecOptions"] = 0;

$tdataonline_placard_users[".mainTableOwnerID"] = "";
$tdataonline_placard_users[".entityType"] = 0;
$tdataonline_placard_users[".connId"] = "vnnsbiz_at_192_168_1_111";


$tdataonline_placard_users[".strOriginalTableName"] = "online_placard_users";

	



$tdataonline_placard_users[".showAddInPopup"] = false;

$tdataonline_placard_users[".showEditInPopup"] = false;

$tdataonline_placard_users[".showViewInPopup"] = false;

$tdataonline_placard_users[".listAjax"] = false;
//	temporary
//$tdataonline_placard_users[".listAjax"] = false;

	$tdataonline_placard_users[".audit"] = false;

	$tdataonline_placard_users[".locking"] = false;


$pages = $tdataonline_placard_users[".defaultPages"];

if( $pages[PAGE_EDIT] ) {
	$tdataonline_placard_users[".edit"] = true;
	$tdataonline_placard_users[".afterEditAction"] = 1;
	$tdataonline_placard_users[".closePopupAfterEdit"] = 1;
	$tdataonline_placard_users[".afterEditActionDetTable"] = "";
}

if( $pages[PAGE_ADD] ) {
$tdataonline_placard_users[".add"] = true;
$tdataonline_placard_users[".afterAddAction"] = 1;
$tdataonline_placard_users[".closePopupAfterAdd"] = 1;
$tdataonline_placard_users[".afterAddActionDetTable"] = "";
}

if( $pages[PAGE_LIST] ) {
	$tdataonline_placard_users[".list"] = true;
}



$tdataonline_placard_users[".strSortControlSettingsJSON"] = "";




if( $pages[PAGE_VIEW] ) {
$tdataonline_placard_users[".view"] = true;
}

if( $pages[PAGE_IMPORT] ) {
$tdataonline_placard_users[".import"] = true;
}

if( $pages[PAGE_EXPORT] ) {
$tdataonline_placard_users[".exportTo"] = true;
}

if( $pages[PAGE_PRINT] ) {
$tdataonline_placard_users[".printFriendly"] = true;
}



$tdataonline_placard_users[".showSimpleSearchOptions"] = true; // temp fix #13449

// Allow Show/Hide Fields in GRID
$tdataonline_placard_users[".allowShowHideFields"] = true; // temp fix #13449
//

// Allow Fields Reordering in GRID
$tdataonline_placard_users[".allowFieldsReordering"] = true; // temp fix #13449
//

$tdataonline_placard_users[".isUseAjaxSuggest"] = true;

$tdataonline_placard_users[".rowHighlite"] = true;



																		

$tdataonline_placard_users[".ajaxCodeSnippetAdded"] = false;

$tdataonline_placard_users[".buttonsAdded"] = false;

$tdataonline_placard_users[".addPageEvents"] = false;

// use timepicker for search panel
$tdataonline_placard_users[".isUseTimeForSearch"] = false;


$tdataonline_placard_users[".badgeColor"] = "8FBC8B";


$tdataonline_placard_users[".allSearchFields"] = array();
$tdataonline_placard_users[".filterFields"] = array();
$tdataonline_placard_users[".requiredSearchFields"] = array();

$tdataonline_placard_users[".googleLikeFields"] = array();
$tdataonline_placard_users[".googleLikeFields"][] = "ID";
$tdataonline_placard_users[".googleLikeFields"][] = "username";
$tdataonline_placard_users[".googleLikeFields"][] = "password";
$tdataonline_placard_users[".googleLikeFields"][] = "email";
$tdataonline_placard_users[".googleLikeFields"][] = "fullname";
$tdataonline_placard_users[".googleLikeFields"][] = "groupid";
$tdataonline_placard_users[".googleLikeFields"][] = "active";
$tdataonline_placard_users[".googleLikeFields"][] = "ext_security_id";
$tdataonline_placard_users[".googleLikeFields"][] = "reset_token";
$tdataonline_placard_users[".googleLikeFields"][] = "reset_date";
$tdataonline_placard_users[".googleLikeFields"][] = "apikey";



$tdataonline_placard_users[".tableType"] = "list";

$tdataonline_placard_users[".printerPageOrientation"] = 0;
$tdataonline_placard_users[".nPrinterPageScale"] = 100;

$tdataonline_placard_users[".nPrinterSplitRecords"] = 40;

$tdataonline_placard_users[".geocodingEnabled"] = false;










$tdataonline_placard_users[".pageSize"] = 20;

$tdataonline_placard_users[".warnLeavingPages"] = true;



$tstrOrderBy = "";
$tdataonline_placard_users[".strOrderBy"] = $tstrOrderBy;

$tdataonline_placard_users[".orderindexes"] = array();


$tdataonline_placard_users[".sqlHead"] = "SELECT ID,  	username,  	password,  	email,  	fullname,  	groupid,  	active,  	ext_security_id,  	reset_token,  	reset_date,  	apikey";
$tdataonline_placard_users[".sqlFrom"] = "FROM online_placard_users";
$tdataonline_placard_users[".sqlWhereExpr"] = "";
$tdataonline_placard_users[".sqlTail"] = "";










//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdataonline_placard_users[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdataonline_placard_users[".arrGroupsPerPage"] = $arrGPP;

$tdataonline_placard_users[".highlightSearchResults"] = true;

$tableKeysonline_placard_users = array();
$tableKeysonline_placard_users[] = "ID";
$tdataonline_placard_users[".Keys"] = $tableKeysonline_placard_users;


$tdataonline_placard_users[".hideMobileList"] = array();




//	ID
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "ID";
	$fdata["GoodName"] = "ID";
	$fdata["ownerTable"] = "online_placard_users";
	$fdata["Label"] = GetFieldLabel("online_placard_users","ID");
	$fdata["FieldType"] = 3;


		$fdata["AutoInc"] = true;

	
			

		$fdata["strField"] = "ID";

		$fdata["sourceSingle"] = "ID";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "ID";

	
	
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


	$tdataonline_placard_users["ID"] = $fdata;
		$tdataonline_placard_users[".searchableFields"][] = "ID";
//	username
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "username";
	$fdata["GoodName"] = "username";
	$fdata["ownerTable"] = "online_placard_users";
	$fdata["Label"] = GetFieldLabel("online_placard_users","username");
	$fdata["FieldType"] = 200;


	
	
			

		$fdata["strField"] = "username";

		$fdata["sourceSingle"] = "username";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "username";

	
	
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


	$tdataonline_placard_users["username"] = $fdata;
		$tdataonline_placard_users[".searchableFields"][] = "username";
//	password
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "password";
	$fdata["GoodName"] = "password";
	$fdata["ownerTable"] = "online_placard_users";
	$fdata["Label"] = GetFieldLabel("online_placard_users","password");
	$fdata["FieldType"] = 200;


	
	
			

		$fdata["strField"] = "password";

		$fdata["sourceSingle"] = "password";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "password";

	
	
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

	$edata = array("EditFormat" => "Password");

	
		$edata["weekdayMessage"] = array("message" => "", "messageType" => "Text");
	$edata["weekdays"] = "[]";


	
	



	
	
	
	
			$edata["acceptFileTypes"] = ".+$";
		$edata["acceptFileTypesHtml"] = "";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
	
		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=255";

		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
				if(count($edata["validateAs"]) && !in_array('IsRequired', $edata["validateAs"]['basicValidate']))
		$edata["validateAs"]['basicValidate'][] = 'IsRequired';
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


	$tdataonline_placard_users["password"] = $fdata;
		$tdataonline_placard_users[".searchableFields"][] = "password";
//	email
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "email";
	$fdata["GoodName"] = "email";
	$fdata["ownerTable"] = "online_placard_users";
	$fdata["Label"] = GetFieldLabel("online_placard_users","email");
	$fdata["FieldType"] = 200;


	
	
			

		$fdata["strField"] = "email";

		$fdata["sourceSingle"] = "email";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "email";

	
	
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
	
	
				if(count($edata["validateAs"]) && !in_array('IsRequired', $edata["validateAs"]['basicValidate']))
		$edata["validateAs"]['basicValidate'][] = 'IsRequired';
			if(count($edata["validateAs"]) && !in_array('IsEmail', $edata["validateAs"]['basicValidate']))
		$edata["validateAs"]['basicValidate'][] = 'IsEmail';
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


	$tdataonline_placard_users["email"] = $fdata;
		$tdataonline_placard_users[".searchableFields"][] = "email";
//	fullname
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "fullname";
	$fdata["GoodName"] = "fullname";
	$fdata["ownerTable"] = "online_placard_users";
	$fdata["Label"] = GetFieldLabel("online_placard_users","fullname");
	$fdata["FieldType"] = 200;


	
	
			

		$fdata["strField"] = "fullname";

		$fdata["sourceSingle"] = "fullname";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "fullname";

	
	
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


	$tdataonline_placard_users["fullname"] = $fdata;
		$tdataonline_placard_users[".searchableFields"][] = "fullname";
//	groupid
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
	$fdata["strName"] = "groupid";
	$fdata["GoodName"] = "groupid";
	$fdata["ownerTable"] = "online_placard_users";
	$fdata["Label"] = GetFieldLabel("online_placard_users","groupid");
	$fdata["FieldType"] = 200;


	
	
			

		$fdata["strField"] = "groupid";

		$fdata["sourceSingle"] = "groupid";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "groupid";

	
	
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


	$tdataonline_placard_users["groupid"] = $fdata;
		$tdataonline_placard_users[".searchableFields"][] = "groupid";
//	active
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 7;
	$fdata["strName"] = "active";
	$fdata["GoodName"] = "active";
	$fdata["ownerTable"] = "online_placard_users";
	$fdata["Label"] = GetFieldLabel("online_placard_users","active");
	$fdata["FieldType"] = 3;


	
	
			

		$fdata["strField"] = "active";

		$fdata["sourceSingle"] = "active";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "active";

	
	
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


	$tdataonline_placard_users["active"] = $fdata;
		$tdataonline_placard_users[".searchableFields"][] = "active";
//	ext_security_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 8;
	$fdata["strName"] = "ext_security_id";
	$fdata["GoodName"] = "ext_security_id";
	$fdata["ownerTable"] = "online_placard_users";
	$fdata["Label"] = GetFieldLabel("online_placard_users","ext_security_id");
	$fdata["FieldType"] = 200;


	
	
			

		$fdata["strField"] = "ext_security_id";

		$fdata["sourceSingle"] = "ext_security_id";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "ext_security_id";

	
	
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
			$edata["EditParams"].= " maxlength=100";

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


	$tdataonline_placard_users["ext_security_id"] = $fdata;
		$tdataonline_placard_users[".searchableFields"][] = "ext_security_id";
//	reset_token
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 9;
	$fdata["strName"] = "reset_token";
	$fdata["GoodName"] = "reset_token";
	$fdata["ownerTable"] = "online_placard_users";
	$fdata["Label"] = GetFieldLabel("online_placard_users","reset_token");
	$fdata["FieldType"] = 200;


	
	
			

		$fdata["strField"] = "reset_token";

		$fdata["sourceSingle"] = "reset_token";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "reset_token";

	
	
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
			$edata["EditParams"].= " maxlength=50";

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


	$tdataonline_placard_users["reset_token"] = $fdata;
		$tdataonline_placard_users[".searchableFields"][] = "reset_token";
//	reset_date
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 10;
	$fdata["strName"] = "reset_date";
	$fdata["GoodName"] = "reset_date";
	$fdata["ownerTable"] = "online_placard_users";
	$fdata["Label"] = GetFieldLabel("online_placard_users","reset_date");
	$fdata["FieldType"] = 135;


	
	
			

		$fdata["strField"] = "reset_date";

		$fdata["sourceSingle"] = "reset_date";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "reset_date";

	
	
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

	
		$edata["weekdayMessage"] = array("message" => "", "messageType" => "Text");
	$edata["weekdays"] = "[]";


	
	



	
	
	
	
			$edata["acceptFileTypes"] = ".+$";
		$edata["acceptFileTypesHtml"] = "";

		$edata["maxNumberOfFiles"] = 1;

	
	
		$edata["DateEditType"] = 13;
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


	$tdataonline_placard_users["reset_date"] = $fdata;
		$tdataonline_placard_users[".searchableFields"][] = "reset_date";
//	apikey
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 11;
	$fdata["strName"] = "apikey";
	$fdata["GoodName"] = "apikey";
	$fdata["ownerTable"] = "online_placard_users";
	$fdata["Label"] = GetFieldLabel("online_placard_users","apikey");
	$fdata["FieldType"] = 200;


	
	
			

		$fdata["strField"] = "apikey";

		$fdata["sourceSingle"] = "apikey";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "apikey";

	
	
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
			$edata["EditParams"].= " maxlength=100";

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


	$tdataonline_placard_users["apikey"] = $fdata;
		$tdataonline_placard_users[".searchableFields"][] = "apikey";


$tables_data["online_placard_users"]=&$tdataonline_placard_users;
$field_labels["online_placard_users"] = &$fieldLabelsonline_placard_users;
$fieldToolTips["online_placard_users"] = &$fieldToolTipsonline_placard_users;
$placeHolders["online_placard_users"] = &$placeHoldersonline_placard_users;
$page_titles["online_placard_users"] = &$pageTitlesonline_placard_users;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)

//if !@TABLE.bReportCrossTab

$detailsTablesData["online_placard_users"] = array();
//endif

// tables which are master tables for current table (detail)
$masterTablesData["online_placard_users"] = array();



// -----------------end  prepare master-details data arrays ------------------------------//



require_once(getabspath("classes/sql.php"));











function createSqlQuery_online_placard_users()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "ID,  	username,  	password,  	email,  	fullname,  	groupid,  	active,  	ext_security_id,  	reset_token,  	reset_date,  	apikey";
$proto0["m_strFrom"] = "FROM online_placard_users";
$proto0["m_strWhere"] = "";
$proto0["m_strOrderBy"] = "";
	
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
	"m_strName" => "ID",
	"m_strTable" => "online_placard_users",
	"m_srcTableName" => "online_placard_users"
));

$proto6["m_sql"] = "ID";
$proto6["m_srcTableName"] = "online_placard_users";
$proto6["m_expr"]=$obj;
$proto6["m_alias"] = "";
$obj = new SQLFieldListItem($proto6);

$proto0["m_fieldlist"][]=$obj;
						$proto8=array();
			$obj = new SQLField(array(
	"m_strName" => "username",
	"m_strTable" => "online_placard_users",
	"m_srcTableName" => "online_placard_users"
));

$proto8["m_sql"] = "username";
$proto8["m_srcTableName"] = "online_placard_users";
$proto8["m_expr"]=$obj;
$proto8["m_alias"] = "";
$obj = new SQLFieldListItem($proto8);

$proto0["m_fieldlist"][]=$obj;
						$proto10=array();
			$obj = new SQLField(array(
	"m_strName" => "password",
	"m_strTable" => "online_placard_users",
	"m_srcTableName" => "online_placard_users"
));

$proto10["m_sql"] = "password";
$proto10["m_srcTableName"] = "online_placard_users";
$proto10["m_expr"]=$obj;
$proto10["m_alias"] = "";
$obj = new SQLFieldListItem($proto10);

$proto0["m_fieldlist"][]=$obj;
						$proto12=array();
			$obj = new SQLField(array(
	"m_strName" => "email",
	"m_strTable" => "online_placard_users",
	"m_srcTableName" => "online_placard_users"
));

$proto12["m_sql"] = "email";
$proto12["m_srcTableName"] = "online_placard_users";
$proto12["m_expr"]=$obj;
$proto12["m_alias"] = "";
$obj = new SQLFieldListItem($proto12);

$proto0["m_fieldlist"][]=$obj;
						$proto14=array();
			$obj = new SQLField(array(
	"m_strName" => "fullname",
	"m_strTable" => "online_placard_users",
	"m_srcTableName" => "online_placard_users"
));

$proto14["m_sql"] = "fullname";
$proto14["m_srcTableName"] = "online_placard_users";
$proto14["m_expr"]=$obj;
$proto14["m_alias"] = "";
$obj = new SQLFieldListItem($proto14);

$proto0["m_fieldlist"][]=$obj;
						$proto16=array();
			$obj = new SQLField(array(
	"m_strName" => "groupid",
	"m_strTable" => "online_placard_users",
	"m_srcTableName" => "online_placard_users"
));

$proto16["m_sql"] = "groupid";
$proto16["m_srcTableName"] = "online_placard_users";
$proto16["m_expr"]=$obj;
$proto16["m_alias"] = "";
$obj = new SQLFieldListItem($proto16);

$proto0["m_fieldlist"][]=$obj;
						$proto18=array();
			$obj = new SQLField(array(
	"m_strName" => "active",
	"m_strTable" => "online_placard_users",
	"m_srcTableName" => "online_placard_users"
));

$proto18["m_sql"] = "active";
$proto18["m_srcTableName"] = "online_placard_users";
$proto18["m_expr"]=$obj;
$proto18["m_alias"] = "";
$obj = new SQLFieldListItem($proto18);

$proto0["m_fieldlist"][]=$obj;
						$proto20=array();
			$obj = new SQLField(array(
	"m_strName" => "ext_security_id",
	"m_strTable" => "online_placard_users",
	"m_srcTableName" => "online_placard_users"
));

$proto20["m_sql"] = "ext_security_id";
$proto20["m_srcTableName"] = "online_placard_users";
$proto20["m_expr"]=$obj;
$proto20["m_alias"] = "";
$obj = new SQLFieldListItem($proto20);

$proto0["m_fieldlist"][]=$obj;
						$proto22=array();
			$obj = new SQLField(array(
	"m_strName" => "reset_token",
	"m_strTable" => "online_placard_users",
	"m_srcTableName" => "online_placard_users"
));

$proto22["m_sql"] = "reset_token";
$proto22["m_srcTableName"] = "online_placard_users";
$proto22["m_expr"]=$obj;
$proto22["m_alias"] = "";
$obj = new SQLFieldListItem($proto22);

$proto0["m_fieldlist"][]=$obj;
						$proto24=array();
			$obj = new SQLField(array(
	"m_strName" => "reset_date",
	"m_strTable" => "online_placard_users",
	"m_srcTableName" => "online_placard_users"
));

$proto24["m_sql"] = "reset_date";
$proto24["m_srcTableName"] = "online_placard_users";
$proto24["m_expr"]=$obj;
$proto24["m_alias"] = "";
$obj = new SQLFieldListItem($proto24);

$proto0["m_fieldlist"][]=$obj;
						$proto26=array();
			$obj = new SQLField(array(
	"m_strName" => "apikey",
	"m_strTable" => "online_placard_users",
	"m_srcTableName" => "online_placard_users"
));

$proto26["m_sql"] = "apikey";
$proto26["m_srcTableName"] = "online_placard_users";
$proto26["m_expr"]=$obj;
$proto26["m_alias"] = "";
$obj = new SQLFieldListItem($proto26);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto28=array();
$proto28["m_link"] = "SQLL_MAIN";
			$proto29=array();
$proto29["m_strName"] = "online_placard_users";
$proto29["m_srcTableName"] = "online_placard_users";
$proto29["m_columns"] = array();
$proto29["m_columns"][] = "ID";
$proto29["m_columns"][] = "username";
$proto29["m_columns"][] = "password";
$proto29["m_columns"][] = "email";
$proto29["m_columns"][] = "fullname";
$proto29["m_columns"][] = "groupid";
$proto29["m_columns"][] = "active";
$proto29["m_columns"][] = "ext_security_id";
$proto29["m_columns"][] = "reset_token";
$proto29["m_columns"][] = "reset_date";
$proto29["m_columns"][] = "apikey";
$obj = new SQLTable($proto29);

$proto28["m_table"] = $obj;
$proto28["m_sql"] = "online_placard_users";
$proto28["m_alias"] = "";
$proto28["m_srcTableName"] = "online_placard_users";
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
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
$proto0["m_srcTableName"]="online_placard_users";		
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_online_placard_users = createSqlQuery_online_placard_users();


	
		;

											

$tdataonline_placard_users[".sqlquery"] = $queryData_online_placard_users;



$tableEvents["online_placard_users"] = new eventsBase;
$tdataonline_placard_users[".hasEvents"] = false;

?>