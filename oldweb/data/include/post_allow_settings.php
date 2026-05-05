<?php
$tdatapost_allow = array();
$tdatapost_allow[".searchableFields"] = array();
$tdatapost_allow[".ShortName"] = "post_allow";
$tdatapost_allow[".OwnerID"] = "";
$tdatapost_allow[".OriginalTable"] = "post_allow";


$tdatapost_allow[".pagesByType"] = my_json_decode( "{\"export\":[\"export\"],\"import\":[\"import\"],\"list\":[\"list\"],\"print\":[\"print\"],\"search\":[\"search\"]}" );
$tdatapost_allow[".originalPagesByType"] = $tdatapost_allow[".pagesByType"];
$tdatapost_allow[".pages"] = types2pages( my_json_decode( "{\"export\":[\"export\"],\"import\":[\"import\"],\"list\":[\"list\"],\"print\":[\"print\"],\"search\":[\"search\"]}" ) );
$tdatapost_allow[".originalPages"] = $tdatapost_allow[".pages"];
$tdatapost_allow[".defaultPages"] = my_json_decode( "{\"export\":\"export\",\"import\":\"import\",\"list\":\"list\",\"print\":\"print\",\"search\":\"search\"}" );
$tdatapost_allow[".originalDefaultPages"] = $tdatapost_allow[".defaultPages"];

//	field labels
$fieldLabelspost_allow = array();
$fieldToolTipspost_allow = array();
$pageTitlespost_allow = array();
$placeHolderspost_allow = array();

if(mlang_getcurrentlang()=="English")
{
	$fieldLabelspost_allow["English"] = array();
	$fieldToolTipspost_allow["English"] = array();
	$placeHolderspost_allow["English"] = array();
	$pageTitlespost_allow["English"] = array();
	$fieldLabelspost_allow["English"]["email"] = "Email";
	$fieldToolTipspost_allow["English"]["email"] = "";
	$placeHolderspost_allow["English"]["email"] = "";
	$fieldLabelspost_allow["English"]["total_coin"] = "Total Coin";
	$fieldToolTipspost_allow["English"]["total_coin"] = "";
	$placeHolderspost_allow["English"]["total_coin"] = "";
	$fieldLabelspost_allow["English"]["total_placard"] = "Total Placard";
	$fieldToolTipspost_allow["English"]["total_placard"] = "";
	$placeHolderspost_allow["English"]["total_placard"] = "";
	$fieldLabelspost_allow["English"]["coin_left"] = "Coin Left";
	$fieldToolTipspost_allow["English"]["coin_left"] = "";
	$placeHolderspost_allow["English"]["coin_left"] = "";
	$fieldLabelspost_allow["English"]["POST_ALLOW"] = "POST ALLOW";
	$fieldToolTipspost_allow["English"]["POST_ALLOW"] = "";
	$placeHolderspost_allow["English"]["POST_ALLOW"] = "";
	if (count($fieldToolTipspost_allow["English"]))
		$tdatapost_allow[".isUseToolTips"] = true;
}
if(mlang_getcurrentlang()=="Thai")
{
	$fieldLabelspost_allow["Thai"] = array();
	$fieldToolTipspost_allow["Thai"] = array();
	$placeHolderspost_allow["Thai"] = array();
	$pageTitlespost_allow["Thai"] = array();
	$fieldLabelspost_allow["Thai"]["email"] = "Email";
	$fieldToolTipspost_allow["Thai"]["email"] = "";
	$placeHolderspost_allow["Thai"]["email"] = "";
	$fieldLabelspost_allow["Thai"]["total_coin"] = "Total Coin";
	$fieldToolTipspost_allow["Thai"]["total_coin"] = "";
	$placeHolderspost_allow["Thai"]["total_coin"] = "";
	$fieldLabelspost_allow["Thai"]["total_placard"] = "Total Placard";
	$fieldToolTipspost_allow["Thai"]["total_placard"] = "";
	$placeHolderspost_allow["Thai"]["total_placard"] = "";
	$fieldLabelspost_allow["Thai"]["coin_left"] = "Coin Left";
	$fieldToolTipspost_allow["Thai"]["coin_left"] = "";
	$placeHolderspost_allow["Thai"]["coin_left"] = "";
	$fieldLabelspost_allow["Thai"]["POST_ALLOW"] = "POST ALLOW";
	$fieldToolTipspost_allow["Thai"]["POST_ALLOW"] = "";
	$placeHolderspost_allow["Thai"]["POST_ALLOW"] = "";
	if (count($fieldToolTipspost_allow["Thai"]))
		$tdatapost_allow[".isUseToolTips"] = true;
}


	$tdatapost_allow[".NCSearch"] = true;



$tdatapost_allow[".shortTableName"] = "post_allow";
$tdatapost_allow[".nSecOptions"] = 0;

$tdatapost_allow[".mainTableOwnerID"] = "";
$tdatapost_allow[".entityType"] = 0;
$tdatapost_allow[".connId"] = "vnnsbiz_at_192_168_1_111";


$tdatapost_allow[".strOriginalTableName"] = "post_allow";

	



$tdatapost_allow[".showAddInPopup"] = false;

$tdatapost_allow[".showEditInPopup"] = false;

$tdatapost_allow[".showViewInPopup"] = false;

$tdatapost_allow[".listAjax"] = false;
//	temporary
//$tdatapost_allow[".listAjax"] = false;

	$tdatapost_allow[".audit"] = false;

	$tdatapost_allow[".locking"] = false;


$pages = $tdatapost_allow[".defaultPages"];

if( $pages[PAGE_EDIT] ) {
	$tdatapost_allow[".edit"] = true;
	$tdatapost_allow[".afterEditAction"] = 1;
	$tdatapost_allow[".closePopupAfterEdit"] = 1;
	$tdatapost_allow[".afterEditActionDetTable"] = "";
}

if( $pages[PAGE_ADD] ) {
$tdatapost_allow[".add"] = true;
$tdatapost_allow[".afterAddAction"] = 1;
$tdatapost_allow[".closePopupAfterAdd"] = 1;
$tdatapost_allow[".afterAddActionDetTable"] = "";
}

if( $pages[PAGE_LIST] ) {
	$tdatapost_allow[".list"] = true;
}



$tdatapost_allow[".strSortControlSettingsJSON"] = "";




if( $pages[PAGE_VIEW] ) {
$tdatapost_allow[".view"] = true;
}

if( $pages[PAGE_IMPORT] ) {
$tdatapost_allow[".import"] = true;
}

if( $pages[PAGE_EXPORT] ) {
$tdatapost_allow[".exportTo"] = true;
}

if( $pages[PAGE_PRINT] ) {
$tdatapost_allow[".printFriendly"] = true;
}



$tdatapost_allow[".showSimpleSearchOptions"] = true; // temp fix #13449

// Allow Show/Hide Fields in GRID
$tdatapost_allow[".allowShowHideFields"] = true; // temp fix #13449
//

// Allow Fields Reordering in GRID
$tdatapost_allow[".allowFieldsReordering"] = true; // temp fix #13449
//

$tdatapost_allow[".isUseAjaxSuggest"] = true;

$tdatapost_allow[".rowHighlite"] = true;



																											

$tdatapost_allow[".ajaxCodeSnippetAdded"] = false;

$tdatapost_allow[".buttonsAdded"] = false;

$tdatapost_allow[".addPageEvents"] = false;

// use timepicker for search panel
$tdatapost_allow[".isUseTimeForSearch"] = false;


$tdatapost_allow[".badgeColor"] = "B22222";


$tdatapost_allow[".allSearchFields"] = array();
$tdatapost_allow[".filterFields"] = array();
$tdatapost_allow[".requiredSearchFields"] = array();

$tdatapost_allow[".googleLikeFields"] = array();
$tdatapost_allow[".googleLikeFields"][] = "email";
$tdatapost_allow[".googleLikeFields"][] = "total_coin";
$tdatapost_allow[".googleLikeFields"][] = "total_placard";
$tdatapost_allow[".googleLikeFields"][] = "coin_left";
$tdatapost_allow[".googleLikeFields"][] = "POST_ALLOW";



$tdatapost_allow[".tableType"] = "list";

$tdatapost_allow[".printerPageOrientation"] = 0;
$tdatapost_allow[".nPrinterPageScale"] = 100;

$tdatapost_allow[".nPrinterSplitRecords"] = 40;

$tdatapost_allow[".geocodingEnabled"] = false;










$tdatapost_allow[".pageSize"] = 20;

$tdatapost_allow[".warnLeavingPages"] = true;



$tstrOrderBy = "";
$tdatapost_allow[".strOrderBy"] = $tstrOrderBy;

$tdatapost_allow[".orderindexes"] = array();


$tdatapost_allow[".sqlHead"] = "SELECT email,  	total_coin,  	total_placard,  	coin_left,  	POST_ALLOW";
$tdatapost_allow[".sqlFrom"] = "FROM post_allow";
$tdatapost_allow[".sqlWhereExpr"] = "";
$tdatapost_allow[".sqlTail"] = "";










//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatapost_allow[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatapost_allow[".arrGroupsPerPage"] = $arrGPP;

$tdatapost_allow[".highlightSearchResults"] = true;

$tableKeyspost_allow = array();
$tdatapost_allow[".Keys"] = $tableKeyspost_allow;


$tdatapost_allow[".hideMobileList"] = array();




//	email
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "email";
	$fdata["GoodName"] = "email";
	$fdata["ownerTable"] = "post_allow";
	$fdata["Label"] = GetFieldLabel("post_allow","email");
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


	$tdatapost_allow["email"] = $fdata;
		$tdatapost_allow[".searchableFields"][] = "email";
//	total_coin
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "total_coin";
	$fdata["GoodName"] = "total_coin";
	$fdata["ownerTable"] = "post_allow";
	$fdata["Label"] = GetFieldLabel("post_allow","total_coin");
	$fdata["FieldType"] = 14;


	
	
			

		$fdata["strField"] = "total_coin";

		$fdata["sourceSingle"] = "total_coin";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "total_coin";

	
	
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


	$tdatapost_allow["total_coin"] = $fdata;
		$tdatapost_allow[".searchableFields"][] = "total_coin";
//	total_placard
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "total_placard";
	$fdata["GoodName"] = "total_placard";
	$fdata["ownerTable"] = "post_allow";
	$fdata["Label"] = GetFieldLabel("post_allow","total_placard");
	$fdata["FieldType"] = 20;


	
	
			

		$fdata["strField"] = "total_placard";

		$fdata["sourceSingle"] = "total_placard";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "total_placard";

	
	
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


	$tdatapost_allow["total_placard"] = $fdata;
		$tdatapost_allow[".searchableFields"][] = "total_placard";
//	coin_left
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "coin_left";
	$fdata["GoodName"] = "coin_left";
	$fdata["ownerTable"] = "post_allow";
	$fdata["Label"] = GetFieldLabel("post_allow","coin_left");
	$fdata["FieldType"] = 14;


	
	
			

		$fdata["strField"] = "coin_left";

		$fdata["sourceSingle"] = "coin_left";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "coin_left";

	
	
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


	$tdatapost_allow["coin_left"] = $fdata;
		$tdatapost_allow[".searchableFields"][] = "coin_left";
//	POST_ALLOW
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "POST_ALLOW";
	$fdata["GoodName"] = "POST_ALLOW";
	$fdata["ownerTable"] = "post_allow";
	$fdata["Label"] = GetFieldLabel("post_allow","POST_ALLOW");
	$fdata["FieldType"] = 200;


	
	
			

		$fdata["strField"] = "POST_ALLOW";

		$fdata["sourceSingle"] = "POST_ALLOW";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "POST_ALLOW";

	
	
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
			$edata["EditParams"].= " maxlength=3";

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


	$tdatapost_allow["POST_ALLOW"] = $fdata;
		$tdatapost_allow[".searchableFields"][] = "POST_ALLOW";


$tables_data["post_allow"]=&$tdatapost_allow;
$field_labels["post_allow"] = &$fieldLabelspost_allow;
$fieldToolTips["post_allow"] = &$fieldToolTipspost_allow;
$placeHolders["post_allow"] = &$placeHolderspost_allow;
$page_titles["post_allow"] = &$pageTitlespost_allow;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)

//if !@TABLE.bReportCrossTab

$detailsTablesData["post_allow"] = array();
//endif

// tables which are master tables for current table (detail)
$masterTablesData["post_allow"] = array();



// -----------------end  prepare master-details data arrays ------------------------------//



require_once(getabspath("classes/sql.php"));











function createSqlQuery_post_allow()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "email,  	total_coin,  	total_placard,  	coin_left,  	POST_ALLOW";
$proto0["m_strFrom"] = "FROM post_allow";
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
	"m_strName" => "email",
	"m_strTable" => "post_allow",
	"m_srcTableName" => "post_allow"
));

$proto6["m_sql"] = "email";
$proto6["m_srcTableName"] = "post_allow";
$proto6["m_expr"]=$obj;
$proto6["m_alias"] = "";
$obj = new SQLFieldListItem($proto6);

$proto0["m_fieldlist"][]=$obj;
						$proto8=array();
			$obj = new SQLField(array(
	"m_strName" => "total_coin",
	"m_strTable" => "post_allow",
	"m_srcTableName" => "post_allow"
));

$proto8["m_sql"] = "total_coin";
$proto8["m_srcTableName"] = "post_allow";
$proto8["m_expr"]=$obj;
$proto8["m_alias"] = "";
$obj = new SQLFieldListItem($proto8);

$proto0["m_fieldlist"][]=$obj;
						$proto10=array();
			$obj = new SQLField(array(
	"m_strName" => "total_placard",
	"m_strTable" => "post_allow",
	"m_srcTableName" => "post_allow"
));

$proto10["m_sql"] = "total_placard";
$proto10["m_srcTableName"] = "post_allow";
$proto10["m_expr"]=$obj;
$proto10["m_alias"] = "";
$obj = new SQLFieldListItem($proto10);

$proto0["m_fieldlist"][]=$obj;
						$proto12=array();
			$obj = new SQLField(array(
	"m_strName" => "coin_left",
	"m_strTable" => "post_allow",
	"m_srcTableName" => "post_allow"
));

$proto12["m_sql"] = "coin_left";
$proto12["m_srcTableName"] = "post_allow";
$proto12["m_expr"]=$obj;
$proto12["m_alias"] = "";
$obj = new SQLFieldListItem($proto12);

$proto0["m_fieldlist"][]=$obj;
						$proto14=array();
			$obj = new SQLField(array(
	"m_strName" => "POST_ALLOW",
	"m_strTable" => "post_allow",
	"m_srcTableName" => "post_allow"
));

$proto14["m_sql"] = "POST_ALLOW";
$proto14["m_srcTableName"] = "post_allow";
$proto14["m_expr"]=$obj;
$proto14["m_alias"] = "";
$obj = new SQLFieldListItem($proto14);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto16=array();
$proto16["m_link"] = "SQLL_MAIN";
			$proto17=array();
$proto17["m_strName"] = "post_allow";
$proto17["m_srcTableName"] = "post_allow";
$proto17["m_columns"] = array();
$proto17["m_columns"][] = "email";
$proto17["m_columns"][] = "total_coin";
$proto17["m_columns"][] = "total_placard";
$proto17["m_columns"][] = "coin_left";
$proto17["m_columns"][] = "POST_ALLOW";
$obj = new SQLTable($proto17);

$proto16["m_table"] = $obj;
$proto16["m_sql"] = "post_allow";
$proto16["m_alias"] = "";
$proto16["m_srcTableName"] = "post_allow";
$proto18=array();
$proto18["m_sql"] = "";
$proto18["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto18["m_column"]=$obj;
$proto18["m_contained"] = array();
$proto18["m_strCase"] = "";
$proto18["m_havingmode"] = false;
$proto18["m_inBrackets"] = false;
$proto18["m_useAlias"] = false;
$obj = new SQLLogicalExpr($proto18);

$proto16["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto16);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
$proto0["m_srcTableName"]="post_allow";		
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_post_allow = createSqlQuery_post_allow();


	
		;

					

$tdatapost_allow[".sqlquery"] = $queryData_post_allow;



$tableEvents["post_allow"] = new eventsBase;
$tdatapost_allow[".hasEvents"] = false;

?>