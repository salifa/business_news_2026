<?php
$tdatatotal_approve_trans = array();
$tdatatotal_approve_trans[".searchableFields"] = array();
$tdatatotal_approve_trans[".ShortName"] = "total_approve_trans";
$tdatatotal_approve_trans[".OwnerID"] = "email";
$tdatatotal_approve_trans[".OriginalTable"] = "total_approve_trans";


$tdatatotal_approve_trans[".pagesByType"] = my_json_decode( "{\"export\":[\"export\"],\"import\":[\"import\"],\"list\":[\"list\"],\"print\":[\"print\"],\"search\":[\"search\"]}" );
$tdatatotal_approve_trans[".originalPagesByType"] = $tdatatotal_approve_trans[".pagesByType"];
$tdatatotal_approve_trans[".pages"] = types2pages( my_json_decode( "{\"export\":[\"export\"],\"import\":[\"import\"],\"list\":[\"list\"],\"print\":[\"print\"],\"search\":[\"search\"]}" ) );
$tdatatotal_approve_trans[".originalPages"] = $tdatatotal_approve_trans[".pages"];
$tdatatotal_approve_trans[".defaultPages"] = my_json_decode( "{\"export\":\"export\",\"import\":\"import\",\"list\":\"list\",\"print\":\"print\",\"search\":\"search\"}" );
$tdatatotal_approve_trans[".originalDefaultPages"] = $tdatatotal_approve_trans[".defaultPages"];

//	field labels
$fieldLabelstotal_approve_trans = array();
$fieldToolTipstotal_approve_trans = array();
$pageTitlestotal_approve_trans = array();
$placeHolderstotal_approve_trans = array();

if(mlang_getcurrentlang()=="English")
{
	$fieldLabelstotal_approve_trans["English"] = array();
	$fieldToolTipstotal_approve_trans["English"] = array();
	$placeHolderstotal_approve_trans["English"] = array();
	$pageTitlestotal_approve_trans["English"] = array();
	$fieldLabelstotal_approve_trans["English"]["approved"] = "Approved";
	$fieldToolTipstotal_approve_trans["English"]["approved"] = "";
	$placeHolderstotal_approve_trans["English"]["approved"] = "";
	$fieldLabelstotal_approve_trans["English"]["email"] = "Email";
	$fieldToolTipstotal_approve_trans["English"]["email"] = "";
	$placeHolderstotal_approve_trans["English"]["email"] = "";
	$fieldLabelstotal_approve_trans["English"]["money"] = "Money";
	$fieldToolTipstotal_approve_trans["English"]["money"] = "";
	$placeHolderstotal_approve_trans["English"]["money"] = "";
	$fieldLabelstotal_approve_trans["English"]["coin"] = "Coin";
	$fieldToolTipstotal_approve_trans["English"]["coin"] = "";
	$placeHolderstotal_approve_trans["English"]["coin"] = "";
	if (count($fieldToolTipstotal_approve_trans["English"]))
		$tdatatotal_approve_trans[".isUseToolTips"] = true;
}
if(mlang_getcurrentlang()=="Thai")
{
	$fieldLabelstotal_approve_trans["Thai"] = array();
	$fieldToolTipstotal_approve_trans["Thai"] = array();
	$placeHolderstotal_approve_trans["Thai"] = array();
	$pageTitlestotal_approve_trans["Thai"] = array();
	$fieldLabelstotal_approve_trans["Thai"]["approved"] = "Approved";
	$fieldToolTipstotal_approve_trans["Thai"]["approved"] = "";
	$placeHolderstotal_approve_trans["Thai"]["approved"] = "";
	$fieldLabelstotal_approve_trans["Thai"]["email"] = "Email";
	$fieldToolTipstotal_approve_trans["Thai"]["email"] = "";
	$placeHolderstotal_approve_trans["Thai"]["email"] = "";
	$fieldLabelstotal_approve_trans["Thai"]["money"] = "Money";
	$fieldToolTipstotal_approve_trans["Thai"]["money"] = "";
	$placeHolderstotal_approve_trans["Thai"]["money"] = "";
	$fieldLabelstotal_approve_trans["Thai"]["coin"] = "Coin";
	$fieldToolTipstotal_approve_trans["Thai"]["coin"] = "";
	$placeHolderstotal_approve_trans["Thai"]["coin"] = "";
	if (count($fieldToolTipstotal_approve_trans["Thai"]))
		$tdatatotal_approve_trans[".isUseToolTips"] = true;
}


	$tdatatotal_approve_trans[".NCSearch"] = true;



$tdatatotal_approve_trans[".shortTableName"] = "total_approve_trans";
$tdatatotal_approve_trans[".nSecOptions"] = 1;

$tdatatotal_approve_trans[".mainTableOwnerID"] = "email";
$tdatatotal_approve_trans[".entityType"] = 0;
$tdatatotal_approve_trans[".connId"] = "vnnsbiz_at_192_168_1_111";


$tdatatotal_approve_trans[".strOriginalTableName"] = "total_approve_trans";

	



$tdatatotal_approve_trans[".showAddInPopup"] = false;

$tdatatotal_approve_trans[".showEditInPopup"] = false;

$tdatatotal_approve_trans[".showViewInPopup"] = false;

$tdatatotal_approve_trans[".listAjax"] = false;
//	temporary
//$tdatatotal_approve_trans[".listAjax"] = false;

	$tdatatotal_approve_trans[".audit"] = false;

	$tdatatotal_approve_trans[".locking"] = false;


$pages = $tdatatotal_approve_trans[".defaultPages"];

if( $pages[PAGE_EDIT] ) {
	$tdatatotal_approve_trans[".edit"] = true;
	$tdatatotal_approve_trans[".afterEditAction"] = 1;
	$tdatatotal_approve_trans[".closePopupAfterEdit"] = 1;
	$tdatatotal_approve_trans[".afterEditActionDetTable"] = "";
}

if( $pages[PAGE_ADD] ) {
$tdatatotal_approve_trans[".add"] = true;
$tdatatotal_approve_trans[".afterAddAction"] = 1;
$tdatatotal_approve_trans[".closePopupAfterAdd"] = 1;
$tdatatotal_approve_trans[".afterAddActionDetTable"] = "";
}

if( $pages[PAGE_LIST] ) {
	$tdatatotal_approve_trans[".list"] = true;
}



$tdatatotal_approve_trans[".strSortControlSettingsJSON"] = "";




if( $pages[PAGE_VIEW] ) {
$tdatatotal_approve_trans[".view"] = true;
}

if( $pages[PAGE_IMPORT] ) {
$tdatatotal_approve_trans[".import"] = true;
}

if( $pages[PAGE_EXPORT] ) {
$tdatatotal_approve_trans[".exportTo"] = true;
}

if( $pages[PAGE_PRINT] ) {
$tdatatotal_approve_trans[".printFriendly"] = true;
}



$tdatatotal_approve_trans[".showSimpleSearchOptions"] = true; // temp fix #13449

// Allow Show/Hide Fields in GRID
$tdatatotal_approve_trans[".allowShowHideFields"] = true; // temp fix #13449
//

// Allow Fields Reordering in GRID
$tdatatotal_approve_trans[".allowFieldsReordering"] = true; // temp fix #13449
//

$tdatatotal_approve_trans[".isUseAjaxSuggest"] = true;

$tdatatotal_approve_trans[".rowHighlite"] = true;



																											

$tdatatotal_approve_trans[".ajaxCodeSnippetAdded"] = false;

$tdatatotal_approve_trans[".buttonsAdded"] = false;

$tdatatotal_approve_trans[".addPageEvents"] = false;

// use timepicker for search panel
$tdatatotal_approve_trans[".isUseTimeForSearch"] = false;


$tdatatotal_approve_trans[".badgeColor"] = "2F4F4F";


$tdatatotal_approve_trans[".allSearchFields"] = array();
$tdatatotal_approve_trans[".filterFields"] = array();
$tdatatotal_approve_trans[".requiredSearchFields"] = array();

$tdatatotal_approve_trans[".googleLikeFields"] = array();
$tdatatotal_approve_trans[".googleLikeFields"][] = "email";
$tdatatotal_approve_trans[".googleLikeFields"][] = "money";
$tdatatotal_approve_trans[".googleLikeFields"][] = "approved";
$tdatatotal_approve_trans[".googleLikeFields"][] = "coin";



$tdatatotal_approve_trans[".tableType"] = "list";

$tdatatotal_approve_trans[".printerPageOrientation"] = 0;
$tdatatotal_approve_trans[".nPrinterPageScale"] = 100;

$tdatatotal_approve_trans[".nPrinterSplitRecords"] = 40;

$tdatatotal_approve_trans[".geocodingEnabled"] = false;










$tdatatotal_approve_trans[".pageSize"] = 20;

$tdatatotal_approve_trans[".warnLeavingPages"] = true;



$tstrOrderBy = "";
$tdatatotal_approve_trans[".strOrderBy"] = $tstrOrderBy;

$tdatatotal_approve_trans[".orderindexes"] = array();


$tdatatotal_approve_trans[".sqlHead"] = "SELECT email,  	money,  	approved,  	coin";
$tdatatotal_approve_trans[".sqlFrom"] = "FROM total_approve_trans";
$tdatatotal_approve_trans[".sqlWhereExpr"] = "";
$tdatatotal_approve_trans[".sqlTail"] = "";

//fill array of tabs for list page
$arrGridTabs = array();
$arrGridTabs[] = array(
	'tabId' => "",
	'name' => "All data",
	'nameType' => 'Text',
	'where' => "",
	'showRowCount' => 0,
	'hideEmpty' => 0,
);
$tdatatotal_approve_trans[".arrGridTabs"] = $arrGridTabs;









//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatatotal_approve_trans[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatatotal_approve_trans[".arrGroupsPerPage"] = $arrGPP;

$tdatatotal_approve_trans[".highlightSearchResults"] = true;

$tableKeystotal_approve_trans = array();
$tdatatotal_approve_trans[".Keys"] = $tableKeystotal_approve_trans;


$tdatatotal_approve_trans[".hideMobileList"] = array();




//	email
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "email";
	$fdata["GoodName"] = "email";
	$fdata["ownerTable"] = "total_approve_trans";
	$fdata["Label"] = GetFieldLabel("total_approve_trans","email");
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


	$tdatatotal_approve_trans["email"] = $fdata;
		$tdatatotal_approve_trans[".searchableFields"][] = "email";
//	money
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "money";
	$fdata["GoodName"] = "money";
	$fdata["ownerTable"] = "total_approve_trans";
	$fdata["Label"] = GetFieldLabel("total_approve_trans","money");
	$fdata["FieldType"] = 14;


	
	
			

		$fdata["strField"] = "money";

		$fdata["sourceSingle"] = "money";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "money";

	
	
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


	$tdatatotal_approve_trans["money"] = $fdata;
		$tdatatotal_approve_trans[".searchableFields"][] = "money";
//	approved
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "approved";
	$fdata["GoodName"] = "approved";
	$fdata["ownerTable"] = "total_approve_trans";
	$fdata["Label"] = GetFieldLabel("total_approve_trans","approved");
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


	$tdatatotal_approve_trans["approved"] = $fdata;
		$tdatatotal_approve_trans[".searchableFields"][] = "approved";
//	coin
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "coin";
	$fdata["GoodName"] = "coin";
	$fdata["ownerTable"] = "total_approve_trans";
	$fdata["Label"] = GetFieldLabel("total_approve_trans","coin");
	$fdata["FieldType"] = 14;


	
	
			

		$fdata["strField"] = "coin";

		$fdata["sourceSingle"] = "coin";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "coin";

	
	
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


	$tdatatotal_approve_trans["coin"] = $fdata;
		$tdatatotal_approve_trans[".searchableFields"][] = "coin";


$tables_data["total_approve_trans"]=&$tdatatotal_approve_trans;
$field_labels["total_approve_trans"] = &$fieldLabelstotal_approve_trans;
$fieldToolTips["total_approve_trans"] = &$fieldToolTipstotal_approve_trans;
$placeHolders["total_approve_trans"] = &$placeHolderstotal_approve_trans;
$page_titles["total_approve_trans"] = &$pageTitlestotal_approve_trans;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)

//if !@TABLE.bReportCrossTab

$detailsTablesData["total_approve_trans"] = array();
//endif

// tables which are master tables for current table (detail)
$masterTablesData["total_approve_trans"] = array();



// -----------------end  prepare master-details data arrays ------------------------------//



require_once(getabspath("classes/sql.php"));











function createSqlQuery_total_approve_trans()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "email,  	money,  	approved,  	coin";
$proto0["m_strFrom"] = "FROM total_approve_trans";
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
	"m_strTable" => "total_approve_trans",
	"m_srcTableName" => "total_approve_trans"
));

$proto6["m_sql"] = "email";
$proto6["m_srcTableName"] = "total_approve_trans";
$proto6["m_expr"]=$obj;
$proto6["m_alias"] = "";
$obj = new SQLFieldListItem($proto6);

$proto0["m_fieldlist"][]=$obj;
						$proto8=array();
			$obj = new SQLField(array(
	"m_strName" => "money",
	"m_strTable" => "total_approve_trans",
	"m_srcTableName" => "total_approve_trans"
));

$proto8["m_sql"] = "money";
$proto8["m_srcTableName"] = "total_approve_trans";
$proto8["m_expr"]=$obj;
$proto8["m_alias"] = "";
$obj = new SQLFieldListItem($proto8);

$proto0["m_fieldlist"][]=$obj;
						$proto10=array();
			$obj = new SQLField(array(
	"m_strName" => "approved",
	"m_strTable" => "total_approve_trans",
	"m_srcTableName" => "total_approve_trans"
));

$proto10["m_sql"] = "approved";
$proto10["m_srcTableName"] = "total_approve_trans";
$proto10["m_expr"]=$obj;
$proto10["m_alias"] = "";
$obj = new SQLFieldListItem($proto10);

$proto0["m_fieldlist"][]=$obj;
						$proto12=array();
			$obj = new SQLField(array(
	"m_strName" => "coin",
	"m_strTable" => "total_approve_trans",
	"m_srcTableName" => "total_approve_trans"
));

$proto12["m_sql"] = "coin";
$proto12["m_srcTableName"] = "total_approve_trans";
$proto12["m_expr"]=$obj;
$proto12["m_alias"] = "";
$obj = new SQLFieldListItem($proto12);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto14=array();
$proto14["m_link"] = "SQLL_MAIN";
			$proto15=array();
$proto15["m_strName"] = "total_approve_trans";
$proto15["m_srcTableName"] = "total_approve_trans";
$proto15["m_columns"] = array();
$proto15["m_columns"][] = "email";
$proto15["m_columns"][] = "money";
$proto15["m_columns"][] = "approved";
$proto15["m_columns"][] = "coin";
$obj = new SQLTable($proto15);

$proto14["m_table"] = $obj;
$proto14["m_sql"] = "total_approve_trans";
$proto14["m_alias"] = "";
$proto14["m_srcTableName"] = "total_approve_trans";
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
$proto0["m_srcTableName"]="total_approve_trans";		
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_total_approve_trans = createSqlQuery_total_approve_trans();


	
		;

				

$tdatatotal_approve_trans[".sqlquery"] = $queryData_total_approve_trans;



$tableEvents["total_approve_trans"] = new eventsBase;
$tdatatotal_approve_trans[".hasEvents"] = false;

?>