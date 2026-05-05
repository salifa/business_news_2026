<?php
$tdatatotal_post_count = array();
$tdatatotal_post_count[".searchableFields"] = array();
$tdatatotal_post_count[".ShortName"] = "total_post_count";
$tdatatotal_post_count[".OwnerID"] = "email";
$tdatatotal_post_count[".OriginalTable"] = "total_post_count";


$tdatatotal_post_count[".pagesByType"] = my_json_decode( "{\"export\":[\"export\"],\"import\":[\"import\"],\"list\":[\"list\"],\"print\":[\"print\"],\"search\":[\"search\"]}" );
$tdatatotal_post_count[".originalPagesByType"] = $tdatatotal_post_count[".pagesByType"];
$tdatatotal_post_count[".pages"] = types2pages( my_json_decode( "{\"export\":[\"export\"],\"import\":[\"import\"],\"list\":[\"list\"],\"print\":[\"print\"],\"search\":[\"search\"]}" ) );
$tdatatotal_post_count[".originalPages"] = $tdatatotal_post_count[".pages"];
$tdatatotal_post_count[".defaultPages"] = my_json_decode( "{\"export\":\"export\",\"import\":\"import\",\"list\":\"list\",\"print\":\"print\",\"search\":\"search\"}" );
$tdatatotal_post_count[".originalDefaultPages"] = $tdatatotal_post_count[".defaultPages"];

//	field labels
$fieldLabelstotal_post_count = array();
$fieldToolTipstotal_post_count = array();
$pageTitlestotal_post_count = array();
$placeHolderstotal_post_count = array();

if(mlang_getcurrentlang()=="English")
{
	$fieldLabelstotal_post_count["English"] = array();
	$fieldToolTipstotal_post_count["English"] = array();
	$placeHolderstotal_post_count["English"] = array();
	$pageTitlestotal_post_count["English"] = array();
	$fieldLabelstotal_post_count["English"]["email"] = "Email";
	$fieldToolTipstotal_post_count["English"]["email"] = "";
	$placeHolderstotal_post_count["English"]["email"] = "";
	$fieldLabelstotal_post_count["English"]["post_count"] = "Post Count";
	$fieldToolTipstotal_post_count["English"]["post_count"] = "";
	$placeHolderstotal_post_count["English"]["post_count"] = "";
	if (count($fieldToolTipstotal_post_count["English"]))
		$tdatatotal_post_count[".isUseToolTips"] = true;
}
if(mlang_getcurrentlang()=="Thai")
{
	$fieldLabelstotal_post_count["Thai"] = array();
	$fieldToolTipstotal_post_count["Thai"] = array();
	$placeHolderstotal_post_count["Thai"] = array();
	$pageTitlestotal_post_count["Thai"] = array();
	$fieldLabelstotal_post_count["Thai"]["post_count"] = "Post Count";
	$fieldToolTipstotal_post_count["Thai"]["post_count"] = "";
	$placeHolderstotal_post_count["Thai"]["post_count"] = "";
	$fieldLabelstotal_post_count["Thai"]["email"] = "Email";
	$fieldToolTipstotal_post_count["Thai"]["email"] = "";
	$placeHolderstotal_post_count["Thai"]["email"] = "";
	if (count($fieldToolTipstotal_post_count["Thai"]))
		$tdatatotal_post_count[".isUseToolTips"] = true;
}


	$tdatatotal_post_count[".NCSearch"] = true;



$tdatatotal_post_count[".shortTableName"] = "total_post_count";
$tdatatotal_post_count[".nSecOptions"] = 1;

$tdatatotal_post_count[".mainTableOwnerID"] = "email";
$tdatatotal_post_count[".entityType"] = 0;
$tdatatotal_post_count[".connId"] = "vnnsbiz_at_192_168_1_111";


$tdatatotal_post_count[".strOriginalTableName"] = "total_post_count";

	



$tdatatotal_post_count[".showAddInPopup"] = false;

$tdatatotal_post_count[".showEditInPopup"] = false;

$tdatatotal_post_count[".showViewInPopup"] = false;

$tdatatotal_post_count[".listAjax"] = false;
//	temporary
//$tdatatotal_post_count[".listAjax"] = false;

	$tdatatotal_post_count[".audit"] = false;

	$tdatatotal_post_count[".locking"] = false;


$pages = $tdatatotal_post_count[".defaultPages"];

if( $pages[PAGE_EDIT] ) {
	$tdatatotal_post_count[".edit"] = true;
	$tdatatotal_post_count[".afterEditAction"] = 1;
	$tdatatotal_post_count[".closePopupAfterEdit"] = 1;
	$tdatatotal_post_count[".afterEditActionDetTable"] = "";
}

if( $pages[PAGE_ADD] ) {
$tdatatotal_post_count[".add"] = true;
$tdatatotal_post_count[".afterAddAction"] = 1;
$tdatatotal_post_count[".closePopupAfterAdd"] = 1;
$tdatatotal_post_count[".afterAddActionDetTable"] = "";
}

if( $pages[PAGE_LIST] ) {
	$tdatatotal_post_count[".list"] = true;
}



$tdatatotal_post_count[".strSortControlSettingsJSON"] = "";




if( $pages[PAGE_VIEW] ) {
$tdatatotal_post_count[".view"] = true;
}

if( $pages[PAGE_IMPORT] ) {
$tdatatotal_post_count[".import"] = true;
}

if( $pages[PAGE_EXPORT] ) {
$tdatatotal_post_count[".exportTo"] = true;
}

if( $pages[PAGE_PRINT] ) {
$tdatatotal_post_count[".printFriendly"] = true;
}



$tdatatotal_post_count[".showSimpleSearchOptions"] = true; // temp fix #13449

// Allow Show/Hide Fields in GRID
$tdatatotal_post_count[".allowShowHideFields"] = true; // temp fix #13449
//

// Allow Fields Reordering in GRID
$tdatatotal_post_count[".allowFieldsReordering"] = true; // temp fix #13449
//

$tdatatotal_post_count[".isUseAjaxSuggest"] = true;

$tdatatotal_post_count[".rowHighlite"] = true;



																											

$tdatatotal_post_count[".ajaxCodeSnippetAdded"] = false;

$tdatatotal_post_count[".buttonsAdded"] = false;

$tdatatotal_post_count[".addPageEvents"] = false;

// use timepicker for search panel
$tdatatotal_post_count[".isUseTimeForSearch"] = false;


$tdatatotal_post_count[".badgeColor"] = "CD853F";


$tdatatotal_post_count[".allSearchFields"] = array();
$tdatatotal_post_count[".filterFields"] = array();
$tdatatotal_post_count[".requiredSearchFields"] = array();

$tdatatotal_post_count[".googleLikeFields"] = array();
$tdatatotal_post_count[".googleLikeFields"][] = "email";
$tdatatotal_post_count[".googleLikeFields"][] = "post_count";



$tdatatotal_post_count[".tableType"] = "list";

$tdatatotal_post_count[".printerPageOrientation"] = 0;
$tdatatotal_post_count[".nPrinterPageScale"] = 100;

$tdatatotal_post_count[".nPrinterSplitRecords"] = 40;

$tdatatotal_post_count[".geocodingEnabled"] = false;










$tdatatotal_post_count[".pageSize"] = 20;

$tdatatotal_post_count[".warnLeavingPages"] = true;



$tstrOrderBy = "";
$tdatatotal_post_count[".strOrderBy"] = $tstrOrderBy;

$tdatatotal_post_count[".orderindexes"] = array();


$tdatatotal_post_count[".sqlHead"] = "SELECT email,  	post_count";
$tdatatotal_post_count[".sqlFrom"] = "FROM total_post_count";
$tdatatotal_post_count[".sqlWhereExpr"] = "";
$tdatatotal_post_count[".sqlTail"] = "";

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
$tdatatotal_post_count[".arrGridTabs"] = $arrGridTabs;









//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatatotal_post_count[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatatotal_post_count[".arrGroupsPerPage"] = $arrGPP;

$tdatatotal_post_count[".highlightSearchResults"] = true;

$tableKeystotal_post_count = array();
$tdatatotal_post_count[".Keys"] = $tableKeystotal_post_count;


$tdatatotal_post_count[".hideMobileList"] = array();




//	email
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "email";
	$fdata["GoodName"] = "email";
	$fdata["ownerTable"] = "total_post_count";
	$fdata["Label"] = GetFieldLabel("total_post_count","email");
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


	$tdatatotal_post_count["email"] = $fdata;
		$tdatatotal_post_count[".searchableFields"][] = "email";
//	post_count
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "post_count";
	$fdata["GoodName"] = "post_count";
	$fdata["ownerTable"] = "total_post_count";
	$fdata["Label"] = GetFieldLabel("total_post_count","post_count");
	$fdata["FieldType"] = 20;


	
	
			

		$fdata["strField"] = "post_count";

		$fdata["sourceSingle"] = "post_count";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "post_count";

	
	
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


	$tdatatotal_post_count["post_count"] = $fdata;
		$tdatatotal_post_count[".searchableFields"][] = "post_count";


$tables_data["total_post_count"]=&$tdatatotal_post_count;
$field_labels["total_post_count"] = &$fieldLabelstotal_post_count;
$fieldToolTips["total_post_count"] = &$fieldToolTipstotal_post_count;
$placeHolders["total_post_count"] = &$placeHolderstotal_post_count;
$page_titles["total_post_count"] = &$pageTitlestotal_post_count;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)

//if !@TABLE.bReportCrossTab

$detailsTablesData["total_post_count"] = array();
//endif

// tables which are master tables for current table (detail)
$masterTablesData["total_post_count"] = array();



// -----------------end  prepare master-details data arrays ------------------------------//



require_once(getabspath("classes/sql.php"));











function createSqlQuery_total_post_count()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "email,  	post_count";
$proto0["m_strFrom"] = "FROM total_post_count";
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
	"m_strTable" => "total_post_count",
	"m_srcTableName" => "total_post_count"
));

$proto6["m_sql"] = "email";
$proto6["m_srcTableName"] = "total_post_count";
$proto6["m_expr"]=$obj;
$proto6["m_alias"] = "";
$obj = new SQLFieldListItem($proto6);

$proto0["m_fieldlist"][]=$obj;
						$proto8=array();
			$obj = new SQLField(array(
	"m_strName" => "post_count",
	"m_strTable" => "total_post_count",
	"m_srcTableName" => "total_post_count"
));

$proto8["m_sql"] = "post_count";
$proto8["m_srcTableName"] = "total_post_count";
$proto8["m_expr"]=$obj;
$proto8["m_alias"] = "";
$obj = new SQLFieldListItem($proto8);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto10=array();
$proto10["m_link"] = "SQLL_MAIN";
			$proto11=array();
$proto11["m_strName"] = "total_post_count";
$proto11["m_srcTableName"] = "total_post_count";
$proto11["m_columns"] = array();
$proto11["m_columns"][] = "email";
$proto11["m_columns"][] = "post_count";
$obj = new SQLTable($proto11);

$proto10["m_table"] = $obj;
$proto10["m_sql"] = "total_post_count";
$proto10["m_alias"] = "";
$proto10["m_srcTableName"] = "total_post_count";
$proto12=array();
$proto12["m_sql"] = "";
$proto12["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto12["m_column"]=$obj;
$proto12["m_contained"] = array();
$proto12["m_strCase"] = "";
$proto12["m_havingmode"] = false;
$proto12["m_inBrackets"] = false;
$proto12["m_useAlias"] = false;
$obj = new SQLLogicalExpr($proto12);

$proto10["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto10);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
$proto0["m_srcTableName"]="total_post_count";		
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_total_post_count = createSqlQuery_total_post_count();


	
		;

		

$tdatatotal_post_count[".sqlquery"] = $queryData_total_post_count;



$tableEvents["total_post_count"] = new eventsBase;
$tdatatotal_post_count[".hasEvents"] = false;

?>