<?php
$tdatacredit_transactions_admin = array();
$tdatacredit_transactions_admin[".searchableFields"] = array();
$tdatacredit_transactions_admin[".ShortName"] = "credit_transactions_admin";
$tdatacredit_transactions_admin[".OwnerID"] = "";
$tdatacredit_transactions_admin[".OriginalTable"] = "credit_transactions";


$tdatacredit_transactions_admin[".pagesByType"] = my_json_decode( "{\"add\":[\"add\"],\"edit\":[\"edit\"],\"export\":[\"export\"],\"import\":[\"import\"],\"list\":[\"list\"],\"print\":[\"print\"],\"search\":[\"search\"],\"view\":[\"view\"]}" );
$tdatacredit_transactions_admin[".originalPagesByType"] = $tdatacredit_transactions_admin[".pagesByType"];
$tdatacredit_transactions_admin[".pages"] = types2pages( my_json_decode( "{\"add\":[\"add\"],\"edit\":[\"edit\"],\"export\":[\"export\"],\"import\":[\"import\"],\"list\":[\"list\"],\"print\":[\"print\"],\"search\":[\"search\"],\"view\":[\"view\"]}" ) );
$tdatacredit_transactions_admin[".originalPages"] = $tdatacredit_transactions_admin[".pages"];
$tdatacredit_transactions_admin[".defaultPages"] = my_json_decode( "{\"add\":\"add\",\"edit\":\"edit\",\"export\":\"export\",\"import\":\"import\",\"list\":\"list\",\"print\":\"print\",\"search\":\"search\",\"view\":\"view\"}" );
$tdatacredit_transactions_admin[".originalDefaultPages"] = $tdatacredit_transactions_admin[".defaultPages"];

//	field labels
$fieldLabelscredit_transactions_admin = array();
$fieldToolTipscredit_transactions_admin = array();
$pageTitlescredit_transactions_admin = array();
$placeHolderscredit_transactions_admin = array();

if(mlang_getcurrentlang()=="English")
{
	$fieldLabelscredit_transactions_admin["English"] = array();
	$fieldToolTipscredit_transactions_admin["English"] = array();
	$placeHolderscredit_transactions_admin["English"] = array();
	$pageTitlescredit_transactions_admin["English"] = array();
	$fieldLabelscredit_transactions_admin["English"]["id"] = "Id";
	$fieldToolTipscredit_transactions_admin["English"]["id"] = "";
	$placeHolderscredit_transactions_admin["English"]["id"] = "";
	$fieldLabelscredit_transactions_admin["English"]["owner_id"] = "Owner Id";
	$fieldToolTipscredit_transactions_admin["English"]["owner_id"] = "";
	$placeHolderscredit_transactions_admin["English"]["owner_id"] = "";
	$fieldLabelscredit_transactions_admin["English"]["amouth"] = "Amouth";
	$fieldToolTipscredit_transactions_admin["English"]["amouth"] = "";
	$placeHolderscredit_transactions_admin["English"]["amouth"] = "";
	$fieldLabelscredit_transactions_admin["English"]["buy_timestamp"] = "Buy Timestamp";
	$fieldToolTipscredit_transactions_admin["English"]["buy_timestamp"] = "";
	$placeHolderscredit_transactions_admin["English"]["buy_timestamp"] = "";
	if (count($fieldToolTipscredit_transactions_admin["English"]))
		$tdatacredit_transactions_admin[".isUseToolTips"] = true;
}
if(mlang_getcurrentlang()=="Thai")
{
	$fieldLabelscredit_transactions_admin["Thai"] = array();
	$fieldToolTipscredit_transactions_admin["Thai"] = array();
	$placeHolderscredit_transactions_admin["Thai"] = array();
	$pageTitlescredit_transactions_admin["Thai"] = array();
	$fieldLabelscredit_transactions_admin["Thai"]["id"] = "Id";
	$fieldToolTipscredit_transactions_admin["Thai"]["id"] = "";
	$placeHolderscredit_transactions_admin["Thai"]["id"] = "";
	$fieldLabelscredit_transactions_admin["Thai"]["owner_id"] = "Owner Id";
	$fieldToolTipscredit_transactions_admin["Thai"]["owner_id"] = "";
	$placeHolderscredit_transactions_admin["Thai"]["owner_id"] = "";
	$fieldLabelscredit_transactions_admin["Thai"]["amouth"] = "Amouth";
	$fieldToolTipscredit_transactions_admin["Thai"]["amouth"] = "";
	$placeHolderscredit_transactions_admin["Thai"]["amouth"] = "";
	$fieldLabelscredit_transactions_admin["Thai"]["buy_timestamp"] = "Buy Timestamp";
	$fieldToolTipscredit_transactions_admin["Thai"]["buy_timestamp"] = "";
	$placeHolderscredit_transactions_admin["Thai"]["buy_timestamp"] = "";
	if (count($fieldToolTipscredit_transactions_admin["Thai"]))
		$tdatacredit_transactions_admin[".isUseToolTips"] = true;
}


	$tdatacredit_transactions_admin[".NCSearch"] = true;



$tdatacredit_transactions_admin[".shortTableName"] = "credit_transactions_admin";
$tdatacredit_transactions_admin[".nSecOptions"] = 0;

$tdatacredit_transactions_admin[".mainTableOwnerID"] = "";
$tdatacredit_transactions_admin[".entityType"] = 1;
$tdatacredit_transactions_admin[".connId"] = "vnnsbiz_at_192_168_1_111";


$tdatacredit_transactions_admin[".strOriginalTableName"] = "credit_transactions";

	



$tdatacredit_transactions_admin[".showAddInPopup"] = false;

$tdatacredit_transactions_admin[".showEditInPopup"] = false;

$tdatacredit_transactions_admin[".showViewInPopup"] = false;

$tdatacredit_transactions_admin[".listAjax"] = false;
//	temporary
//$tdatacredit_transactions_admin[".listAjax"] = false;

	$tdatacredit_transactions_admin[".audit"] = false;

	$tdatacredit_transactions_admin[".locking"] = false;


$pages = $tdatacredit_transactions_admin[".defaultPages"];

if( $pages[PAGE_EDIT] ) {
	$tdatacredit_transactions_admin[".edit"] = true;
	$tdatacredit_transactions_admin[".afterEditAction"] = 0;
	$tdatacredit_transactions_admin[".closePopupAfterEdit"] = 1;
	$tdatacredit_transactions_admin[".afterEditActionDetTable"] = "";
}

if( $pages[PAGE_ADD] ) {
$tdatacredit_transactions_admin[".add"] = true;
$tdatacredit_transactions_admin[".afterAddAction"] = 0;
$tdatacredit_transactions_admin[".closePopupAfterAdd"] = 1;
$tdatacredit_transactions_admin[".afterAddActionDetTable"] = "";
}

if( $pages[PAGE_LIST] ) {
	$tdatacredit_transactions_admin[".list"] = true;
}



$tdatacredit_transactions_admin[".strSortControlSettingsJSON"] = "";




if( $pages[PAGE_VIEW] ) {
$tdatacredit_transactions_admin[".view"] = true;
}

if( $pages[PAGE_IMPORT] ) {
$tdatacredit_transactions_admin[".import"] = true;
}

if( $pages[PAGE_EXPORT] ) {
$tdatacredit_transactions_admin[".exportTo"] = true;
}

if( $pages[PAGE_PRINT] ) {
$tdatacredit_transactions_admin[".printFriendly"] = true;
}



$tdatacredit_transactions_admin[".showSimpleSearchOptions"] = true; // temp fix #13449

// Allow Show/Hide Fields in GRID
$tdatacredit_transactions_admin[".allowShowHideFields"] = true; // temp fix #13449
//

// Allow Fields Reordering in GRID
$tdatacredit_transactions_admin[".allowFieldsReordering"] = true; // temp fix #13449
//

$tdatacredit_transactions_admin[".isUseAjaxSuggest"] = true;

$tdatacredit_transactions_admin[".rowHighlite"] = true;



																		

$tdatacredit_transactions_admin[".ajaxCodeSnippetAdded"] = false;

$tdatacredit_transactions_admin[".buttonsAdded"] = false;

$tdatacredit_transactions_admin[".addPageEvents"] = false;

// use timepicker for search panel
$tdatacredit_transactions_admin[".isUseTimeForSearch"] = false;


$tdatacredit_transactions_admin[".badgeColor"] = "CD5C5C";


$tdatacredit_transactions_admin[".allSearchFields"] = array();
$tdatacredit_transactions_admin[".filterFields"] = array();
$tdatacredit_transactions_admin[".requiredSearchFields"] = array();

$tdatacredit_transactions_admin[".googleLikeFields"] = array();
$tdatacredit_transactions_admin[".googleLikeFields"][] = "id";
$tdatacredit_transactions_admin[".googleLikeFields"][] = "owner_id";
$tdatacredit_transactions_admin[".googleLikeFields"][] = "amouth";
$tdatacredit_transactions_admin[".googleLikeFields"][] = "buy_timestamp";



$tdatacredit_transactions_admin[".tableType"] = "list";

$tdatacredit_transactions_admin[".printerPageOrientation"] = 0;
$tdatacredit_transactions_admin[".nPrinterPageScale"] = 100;

$tdatacredit_transactions_admin[".nPrinterSplitRecords"] = 40;

$tdatacredit_transactions_admin[".geocodingEnabled"] = false;










$tdatacredit_transactions_admin[".pageSize"] = 20;

$tdatacredit_transactions_admin[".warnLeavingPages"] = true;



$tstrOrderBy = "ORDER BY id DESC";
$tdatacredit_transactions_admin[".strOrderBy"] = $tstrOrderBy;

$tdatacredit_transactions_admin[".orderindexes"] = array();
	$tdatacredit_transactions_admin[".orderindexes"][] = array(1, (0 ? "ASC" : "DESC"), "id");



$tdatacredit_transactions_admin[".sqlHead"] = "SELECT id,  owner_id,  amouth,  buy_timestamp";
$tdatacredit_transactions_admin[".sqlFrom"] = "FROM credit_transactions";
$tdatacredit_transactions_admin[".sqlWhereExpr"] = "";
$tdatacredit_transactions_admin[".sqlTail"] = "";










//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatacredit_transactions_admin[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatacredit_transactions_admin[".arrGroupsPerPage"] = $arrGPP;

$tdatacredit_transactions_admin[".highlightSearchResults"] = true;

$tableKeyscredit_transactions_admin = array();
$tableKeyscredit_transactions_admin[] = "id";
$tdatacredit_transactions_admin[".Keys"] = $tableKeyscredit_transactions_admin;


$tdatacredit_transactions_admin[".hideMobileList"] = array();




//	id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "id";
	$fdata["GoodName"] = "id";
	$fdata["ownerTable"] = "credit_transactions";
	$fdata["Label"] = GetFieldLabel("credit_transactions_admin","id");
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

	$edata = array("EditFormat" => "Readonly");

	
		$edata["weekdayMessage"] = array("message" => "", "messageType" => "Text");
	$edata["weekdays"] = "[]";


	
	



		$edata["IsRequired"] = true;

	
	
	
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


	$tdatacredit_transactions_admin["id"] = $fdata;
		$tdatacredit_transactions_admin[".searchableFields"][] = "id";
//	owner_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "owner_id";
	$fdata["GoodName"] = "owner_id";
	$fdata["ownerTable"] = "credit_transactions";
	$fdata["Label"] = GetFieldLabel("credit_transactions_admin","owner_id");
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
			$fdata["filterFormat"] = "Values list";
		$fdata["showCollapsed"] = false;

		$fdata["sortValueType"] = 0;
		$fdata["numberOfVisibleItems"] = 10;

		$fdata["filterBy"] = 0;

	

	
	
//end of Filters settings


	$tdatacredit_transactions_admin["owner_id"] = $fdata;
		$tdatacredit_transactions_admin[".searchableFields"][] = "owner_id";
//	amouth
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "amouth";
	$fdata["GoodName"] = "amouth";
	$fdata["ownerTable"] = "credit_transactions";
	$fdata["Label"] = GetFieldLabel("credit_transactions_admin","amouth");
	$fdata["FieldType"] = 3;


	
	
			

		$fdata["strField"] = "amouth";

	
		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "amouth";

	
	
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


	$tdatacredit_transactions_admin["amouth"] = $fdata;
		$tdatacredit_transactions_admin[".searchableFields"][] = "amouth";
//	buy_timestamp
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "buy_timestamp";
	$fdata["GoodName"] = "buy_timestamp";
	$fdata["ownerTable"] = "credit_transactions";
	$fdata["Label"] = GetFieldLabel("credit_transactions_admin","buy_timestamp");
	$fdata["FieldType"] = 135;


	
	
			

		$fdata["strField"] = "buy_timestamp";

	
		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "buy_timestamp";

	
	
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


	$tdatacredit_transactions_admin["buy_timestamp"] = $fdata;
		$tdatacredit_transactions_admin[".searchableFields"][] = "buy_timestamp";


$tables_data["credit_transactions_admin"]=&$tdatacredit_transactions_admin;
$field_labels["credit_transactions_admin"] = &$fieldLabelscredit_transactions_admin;
$fieldToolTips["credit_transactions_admin"] = &$fieldToolTipscredit_transactions_admin;
$placeHolders["credit_transactions_admin"] = &$placeHolderscredit_transactions_admin;
$page_titles["credit_transactions_admin"] = &$pageTitlescredit_transactions_admin;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)

//if !@TABLE.bReportCrossTab

$detailsTablesData["credit_transactions_admin"] = array();
//endif

// tables which are master tables for current table (detail)
$masterTablesData["credit_transactions_admin"] = array();



// -----------------end  prepare master-details data arrays ------------------------------//



require_once(getabspath("classes/sql.php"));











function createSqlQuery_credit_transactions_admin()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "id,  owner_id,  amouth,  buy_timestamp";
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
	"m_srcTableName" => "credit_transactions_admin"
));

$proto6["m_sql"] = "id";
$proto6["m_srcTableName"] = "credit_transactions_admin";
$proto6["m_expr"]=$obj;
$proto6["m_alias"] = "";
$obj = new SQLFieldListItem($proto6);

$proto0["m_fieldlist"][]=$obj;
						$proto8=array();
			$obj = new SQLField(array(
	"m_strName" => "owner_id",
	"m_strTable" => "credit_transactions",
	"m_srcTableName" => "credit_transactions_admin"
));

$proto8["m_sql"] = "owner_id";
$proto8["m_srcTableName"] = "credit_transactions_admin";
$proto8["m_expr"]=$obj;
$proto8["m_alias"] = "";
$obj = new SQLFieldListItem($proto8);

$proto0["m_fieldlist"][]=$obj;
						$proto10=array();
			$obj = new SQLField(array(
	"m_strName" => "amouth",
	"m_strTable" => "credit_transactions",
	"m_srcTableName" => "credit_transactions_admin"
));

$proto10["m_sql"] = "amouth";
$proto10["m_srcTableName"] = "credit_transactions_admin";
$proto10["m_expr"]=$obj;
$proto10["m_alias"] = "";
$obj = new SQLFieldListItem($proto10);

$proto0["m_fieldlist"][]=$obj;
						$proto12=array();
			$obj = new SQLField(array(
	"m_strName" => "buy_timestamp",
	"m_strTable" => "credit_transactions",
	"m_srcTableName" => "credit_transactions_admin"
));

$proto12["m_sql"] = "buy_timestamp";
$proto12["m_srcTableName"] = "credit_transactions_admin";
$proto12["m_expr"]=$obj;
$proto12["m_alias"] = "";
$obj = new SQLFieldListItem($proto12);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto14=array();
$proto14["m_link"] = "SQLL_MAIN";
			$proto15=array();
$proto15["m_strName"] = "credit_transactions";
$proto15["m_srcTableName"] = "credit_transactions_admin";
$proto15["m_columns"] = array();
$proto15["m_columns"][] = "id";
$proto15["m_columns"][] = "owner_id";
$proto15["m_columns"][] = "package";
$proto15["m_columns"][] = "amouth";
$proto15["m_columns"][] = "buy_timestamp";
$proto15["m_columns"][] = "approved";
$proto15["m_columns"][] = "slipup_upload";
$proto15["m_columns"][] = "approved_timestamp";
$proto15["m_columns"][] = "coin";
$obj = new SQLTable($proto15);

$proto14["m_table"] = $obj;
$proto14["m_sql"] = "credit_transactions";
$proto14["m_alias"] = "";
$proto14["m_srcTableName"] = "credit_transactions_admin";
$proto16=array();
$proto16["m_sql"] = "";
$proto16["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto16["m_column"]=$obj;
$proto16["m_contained"] = array();
$proto16["m_strCase"] = "";
$proto16["m_havingmode"] = false;
$proto16["m_inBrackets"] = false;
$proto16["m_useAlias"] = false;
$obj = new SQLLogicalExpr($proto16);

$proto14["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto14);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
												$proto18=array();
						$obj = new SQLField(array(
	"m_strName" => "id",
	"m_strTable" => "credit_transactions",
	"m_srcTableName" => "credit_transactions_admin"
));

$proto18["m_column"]=$obj;
$proto18["m_bAsc"] = 0;
$proto18["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto18);

$proto0["m_orderby"][]=$obj;					
$proto0["m_srcTableName"]="credit_transactions_admin";		
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_credit_transactions_admin = createSqlQuery_credit_transactions_admin();


	
		;

				

$tdatacredit_transactions_admin[".sqlquery"] = $queryData_credit_transactions_admin;



$tableEvents["credit_transactions_admin"] = new eventsBase;
$tdatacredit_transactions_admin[".hasEvents"] = false;

?>