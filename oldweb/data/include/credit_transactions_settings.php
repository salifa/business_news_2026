<?php
$tdatacredit_transactions = array();
$tdatacredit_transactions[".searchableFields"] = array();
$tdatacredit_transactions[".ShortName"] = "credit_transactions";
$tdatacredit_transactions[".OwnerID"] = "owner_id";
$tdatacredit_transactions[".OriginalTable"] = "credit_transactions";


$tdatacredit_transactions[".pagesByType"] = my_json_decode( "{\"add\":[\"add\"],\"list\":[\"list\"],\"search\":[\"search\"],\"view\":[\"view\"]}" );
$tdatacredit_transactions[".originalPagesByType"] = $tdatacredit_transactions[".pagesByType"];
$tdatacredit_transactions[".pages"] = types2pages( my_json_decode( "{\"add\":[\"add\"],\"list\":[\"list\"],\"search\":[\"search\"],\"view\":[\"view\"]}" ) );
$tdatacredit_transactions[".originalPages"] = $tdatacredit_transactions[".pages"];
$tdatacredit_transactions[".defaultPages"] = my_json_decode( "{\"add\":\"add\",\"list\":\"list\",\"search\":\"search\",\"view\":\"view\"}" );
$tdatacredit_transactions[".originalDefaultPages"] = $tdatacredit_transactions[".defaultPages"];

//	field labels
$fieldLabelscredit_transactions = array();
$fieldToolTipscredit_transactions = array();
$pageTitlescredit_transactions = array();
$placeHolderscredit_transactions = array();

if(mlang_getcurrentlang()=="English")
{
	$fieldLabelscredit_transactions["English"] = array();
	$fieldToolTipscredit_transactions["English"] = array();
	$placeHolderscredit_transactions["English"] = array();
	$pageTitlescredit_transactions["English"] = array();
	$fieldLabelscredit_transactions["English"]["id"] = "Id";
	$fieldToolTipscredit_transactions["English"]["id"] = "";
	$placeHolderscredit_transactions["English"]["id"] = "";
	$fieldLabelscredit_transactions["English"]["owner_id"] = "Owner Id";
	$fieldToolTipscredit_transactions["English"]["owner_id"] = "";
	$placeHolderscredit_transactions["English"]["owner_id"] = "";
	$fieldLabelscredit_transactions["English"]["amouth"] = "Amouth";
	$fieldToolTipscredit_transactions["English"]["amouth"] = "";
	$placeHolderscredit_transactions["English"]["amouth"] = "";
	$fieldLabelscredit_transactions["English"]["buy_timestamp"] = "Buy Timestamp";
	$fieldToolTipscredit_transactions["English"]["buy_timestamp"] = "";
	$placeHolderscredit_transactions["English"]["buy_timestamp"] = "";
	if (count($fieldToolTipscredit_transactions["English"]))
		$tdatacredit_transactions[".isUseToolTips"] = true;
}
if(mlang_getcurrentlang()=="Thai")
{
	$fieldLabelscredit_transactions["Thai"] = array();
	$fieldToolTipscredit_transactions["Thai"] = array();
	$placeHolderscredit_transactions["Thai"] = array();
	$pageTitlescredit_transactions["Thai"] = array();
	$fieldLabelscredit_transactions["Thai"]["id"] = "Id";
	$fieldToolTipscredit_transactions["Thai"]["id"] = "";
	$placeHolderscredit_transactions["Thai"]["id"] = "";
	$fieldLabelscredit_transactions["Thai"]["owner_id"] = "Owner Id";
	$fieldToolTipscredit_transactions["Thai"]["owner_id"] = "";
	$placeHolderscredit_transactions["Thai"]["owner_id"] = "";
	$fieldLabelscredit_transactions["Thai"]["amouth"] = "จำนวนเงิน";
	$fieldToolTipscredit_transactions["Thai"]["amouth"] = "";
	$placeHolderscredit_transactions["Thai"]["amouth"] = "";
	$fieldLabelscredit_transactions["Thai"]["buy_timestamp"] = "วัน-เวลา ที่ทำรายการ";
	$fieldToolTipscredit_transactions["Thai"]["buy_timestamp"] = "";
	$placeHolderscredit_transactions["Thai"]["buy_timestamp"] = "";
	if (count($fieldToolTipscredit_transactions["Thai"]))
		$tdatacredit_transactions[".isUseToolTips"] = true;
}


	$tdatacredit_transactions[".NCSearch"] = true;



$tdatacredit_transactions[".shortTableName"] = "credit_transactions";
$tdatacredit_transactions[".nSecOptions"] = 1;

$tdatacredit_transactions[".mainTableOwnerID"] = "owner_id";
$tdatacredit_transactions[".entityType"] = 0;
$tdatacredit_transactions[".connId"] = "vnnsbiz_at_192_168_1_111";


$tdatacredit_transactions[".strOriginalTableName"] = "credit_transactions";

	



$tdatacredit_transactions[".showAddInPopup"] = false;

$tdatacredit_transactions[".showEditInPopup"] = false;

$tdatacredit_transactions[".showViewInPopup"] = false;

$tdatacredit_transactions[".listAjax"] = false;
//	temporary
//$tdatacredit_transactions[".listAjax"] = false;

	$tdatacredit_transactions[".audit"] = false;

	$tdatacredit_transactions[".locking"] = false;


$pages = $tdatacredit_transactions[".defaultPages"];

if( $pages[PAGE_EDIT] ) {
	$tdatacredit_transactions[".edit"] = true;
	$tdatacredit_transactions[".afterEditAction"] = 0;
	$tdatacredit_transactions[".closePopupAfterEdit"] = 1;
	$tdatacredit_transactions[".afterEditActionDetTable"] = "";
}

if( $pages[PAGE_ADD] ) {
$tdatacredit_transactions[".add"] = true;
$tdatacredit_transactions[".afterAddAction"] = 0;
$tdatacredit_transactions[".closePopupAfterAdd"] = 1;
$tdatacredit_transactions[".afterAddActionDetTable"] = "Detail tables not found!";
}

if( $pages[PAGE_LIST] ) {
	$tdatacredit_transactions[".list"] = true;
}



$tdatacredit_transactions[".strSortControlSettingsJSON"] = "";




if( $pages[PAGE_VIEW] ) {
$tdatacredit_transactions[".view"] = true;
}

if( $pages[PAGE_IMPORT] ) {
$tdatacredit_transactions[".import"] = true;
}

if( $pages[PAGE_EXPORT] ) {
$tdatacredit_transactions[".exportTo"] = true;
}

if( $pages[PAGE_PRINT] ) {
$tdatacredit_transactions[".printFriendly"] = true;
}



$tdatacredit_transactions[".showSimpleSearchOptions"] = true; // temp fix #13449

// Allow Show/Hide Fields in GRID
$tdatacredit_transactions[".allowShowHideFields"] = true; // temp fix #13449
//

// Allow Fields Reordering in GRID
$tdatacredit_transactions[".allowFieldsReordering"] = true; // temp fix #13449
//

$tdatacredit_transactions[".isUseAjaxSuggest"] = true;

$tdatacredit_transactions[".rowHighlite"] = true;



																		

$tdatacredit_transactions[".ajaxCodeSnippetAdded"] = false;

$tdatacredit_transactions[".buttonsAdded"] = false;

$tdatacredit_transactions[".addPageEvents"] = false;

// use timepicker for search panel
$tdatacredit_transactions[".isUseTimeForSearch"] = false;


$tdatacredit_transactions[".badgeColor"] = "dc143c";


$tdatacredit_transactions[".allSearchFields"] = array();
$tdatacredit_transactions[".filterFields"] = array();
$tdatacredit_transactions[".requiredSearchFields"] = array();

$tdatacredit_transactions[".googleLikeFields"] = array();
$tdatacredit_transactions[".googleLikeFields"][] = "id";
$tdatacredit_transactions[".googleLikeFields"][] = "owner_id";
$tdatacredit_transactions[".googleLikeFields"][] = "amouth";
$tdatacredit_transactions[".googleLikeFields"][] = "buy_timestamp";



$tdatacredit_transactions[".tableType"] = "list";

$tdatacredit_transactions[".printerPageOrientation"] = 0;
$tdatacredit_transactions[".nPrinterPageScale"] = 100;

$tdatacredit_transactions[".nPrinterSplitRecords"] = 40;

$tdatacredit_transactions[".geocodingEnabled"] = false;










$tdatacredit_transactions[".pageSize"] = 20;

$tdatacredit_transactions[".warnLeavingPages"] = true;



$tstrOrderBy = "ORDER BY id DESC";
$tdatacredit_transactions[".strOrderBy"] = $tstrOrderBy;

$tdatacredit_transactions[".orderindexes"] = array();
	$tdatacredit_transactions[".orderindexes"][] = array(1, (0 ? "ASC" : "DESC"), "id");



$tdatacredit_transactions[".sqlHead"] = "SELECT id,  owner_id,  amouth,  buy_timestamp";
$tdatacredit_transactions[".sqlFrom"] = "FROM credit_transactions";
$tdatacredit_transactions[".sqlWhereExpr"] = "";
$tdatacredit_transactions[".sqlTail"] = "";










//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatacredit_transactions[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatacredit_transactions[".arrGroupsPerPage"] = $arrGPP;

$tdatacredit_transactions[".highlightSearchResults"] = true;

$tableKeyscredit_transactions = array();
$tableKeyscredit_transactions[] = "id";
$tdatacredit_transactions[".Keys"] = $tableKeyscredit_transactions;


$tdatacredit_transactions[".hideMobileList"] = array();




//	id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "id";
	$fdata["GoodName"] = "id";
	$fdata["ownerTable"] = "credit_transactions";
	$fdata["Label"] = GetFieldLabel("credit_transactions","id");
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


	$tdatacredit_transactions["id"] = $fdata;
		$tdatacredit_transactions[".searchableFields"][] = "id";
//	owner_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "owner_id";
	$fdata["GoodName"] = "owner_id";
	$fdata["ownerTable"] = "credit_transactions";
	$fdata["Label"] = GetFieldLabel("credit_transactions","owner_id");
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


	$tdatacredit_transactions["owner_id"] = $fdata;
		$tdatacredit_transactions[".searchableFields"][] = "owner_id";
//	amouth
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "amouth";
	$fdata["GoodName"] = "amouth";
	$fdata["ownerTable"] = "credit_transactions";
	$fdata["Label"] = GetFieldLabel("credit_transactions","amouth");
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


	$tdatacredit_transactions["amouth"] = $fdata;
		$tdatacredit_transactions[".searchableFields"][] = "amouth";
//	buy_timestamp
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "buy_timestamp";
	$fdata["GoodName"] = "buy_timestamp";
	$fdata["ownerTable"] = "credit_transactions";
	$fdata["Label"] = GetFieldLabel("credit_transactions","buy_timestamp");
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


	$tdatacredit_transactions["buy_timestamp"] = $fdata;
		$tdatacredit_transactions[".searchableFields"][] = "buy_timestamp";


$tables_data["credit_transactions"]=&$tdatacredit_transactions;
$field_labels["credit_transactions"] = &$fieldLabelscredit_transactions;
$fieldToolTips["credit_transactions"] = &$fieldToolTipscredit_transactions;
$placeHolders["credit_transactions"] = &$placeHolderscredit_transactions;
$page_titles["credit_transactions"] = &$pageTitlescredit_transactions;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)

//if !@TABLE.bReportCrossTab

$detailsTablesData["credit_transactions"] = array();
//endif

// tables which are master tables for current table (detail)
$masterTablesData["credit_transactions"] = array();



// -----------------end  prepare master-details data arrays ------------------------------//



require_once(getabspath("classes/sql.php"));











function createSqlQuery_credit_transactions()
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
	"m_srcTableName" => "credit_transactions"
));

$proto6["m_sql"] = "id";
$proto6["m_srcTableName"] = "credit_transactions";
$proto6["m_expr"]=$obj;
$proto6["m_alias"] = "";
$obj = new SQLFieldListItem($proto6);

$proto0["m_fieldlist"][]=$obj;
						$proto8=array();
			$obj = new SQLField(array(
	"m_strName" => "owner_id",
	"m_strTable" => "credit_transactions",
	"m_srcTableName" => "credit_transactions"
));

$proto8["m_sql"] = "owner_id";
$proto8["m_srcTableName"] = "credit_transactions";
$proto8["m_expr"]=$obj;
$proto8["m_alias"] = "";
$obj = new SQLFieldListItem($proto8);

$proto0["m_fieldlist"][]=$obj;
						$proto10=array();
			$obj = new SQLField(array(
	"m_strName" => "amouth",
	"m_strTable" => "credit_transactions",
	"m_srcTableName" => "credit_transactions"
));

$proto10["m_sql"] = "amouth";
$proto10["m_srcTableName"] = "credit_transactions";
$proto10["m_expr"]=$obj;
$proto10["m_alias"] = "";
$obj = new SQLFieldListItem($proto10);

$proto0["m_fieldlist"][]=$obj;
						$proto12=array();
			$obj = new SQLField(array(
	"m_strName" => "buy_timestamp",
	"m_strTable" => "credit_transactions",
	"m_srcTableName" => "credit_transactions"
));

$proto12["m_sql"] = "buy_timestamp";
$proto12["m_srcTableName"] = "credit_transactions";
$proto12["m_expr"]=$obj;
$proto12["m_alias"] = "";
$obj = new SQLFieldListItem($proto12);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto14=array();
$proto14["m_link"] = "SQLL_MAIN";
			$proto15=array();
$proto15["m_strName"] = "credit_transactions";
$proto15["m_srcTableName"] = "credit_transactions";
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
$proto14["m_srcTableName"] = "credit_transactions";
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
	"m_srcTableName" => "credit_transactions"
));

$proto18["m_column"]=$obj;
$proto18["m_bAsc"] = 0;
$proto18["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto18);

$proto0["m_orderby"][]=$obj;					
$proto0["m_srcTableName"]="credit_transactions";		
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_credit_transactions = createSqlQuery_credit_transactions();


	
		;

				

$tdatacredit_transactions[".sqlquery"] = $queryData_credit_transactions;



$tableEvents["credit_transactions"] = new eventsBase;
$tdatacredit_transactions[".hasEvents"] = false;

?>