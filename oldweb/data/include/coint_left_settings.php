<?php
$tdatacoint_left = array();
$tdatacoint_left[".searchableFields"] = array();
$tdatacoint_left[".ShortName"] = "coint_left";
$tdatacoint_left[".OwnerID"] = "";
$tdatacoint_left[".OriginalTable"] = "coint_left";


$tdatacoint_left[".pagesByType"] = my_json_decode( "{\"export\":[\"export\"],\"import\":[\"import\"],\"list\":[\"list\"],\"print\":[\"print\"]}" );
$tdatacoint_left[".originalPagesByType"] = $tdatacoint_left[".pagesByType"];
$tdatacoint_left[".pages"] = types2pages( my_json_decode( "{\"export\":[\"export\"],\"import\":[\"import\"],\"list\":[\"list\"],\"print\":[\"print\"]}" ) );
$tdatacoint_left[".originalPages"] = $tdatacoint_left[".pages"];
$tdatacoint_left[".defaultPages"] = my_json_decode( "{\"export\":\"export\",\"import\":\"import\",\"list\":\"list\",\"print\":\"print\"}" );
$tdatacoint_left[".originalDefaultPages"] = $tdatacoint_left[".defaultPages"];

//	field labels
$fieldLabelscoint_left = array();
$fieldToolTipscoint_left = array();
$pageTitlescoint_left = array();
$placeHolderscoint_left = array();

if(mlang_getcurrentlang()=="English")
{
	$fieldLabelscoint_left["English"] = array();
	$fieldToolTipscoint_left["English"] = array();
	$placeHolderscoint_left["English"] = array();
	$pageTitlescoint_left["English"] = array();
	if (count($fieldToolTipscoint_left["English"]))
		$tdatacoint_left[".isUseToolTips"] = true;
}
if(mlang_getcurrentlang()=="Thai")
{
	$fieldLabelscoint_left["Thai"] = array();
	$fieldToolTipscoint_left["Thai"] = array();
	$placeHolderscoint_left["Thai"] = array();
	$pageTitlescoint_left["Thai"] = array();
	if (count($fieldToolTipscoint_left["Thai"]))
		$tdatacoint_left[".isUseToolTips"] = true;
}


	$tdatacoint_left[".NCSearch"] = true;



$tdatacoint_left[".shortTableName"] = "coint_left";
$tdatacoint_left[".nSecOptions"] = 0;

$tdatacoint_left[".mainTableOwnerID"] = "";
$tdatacoint_left[".entityType"] = 6;
$tdatacoint_left[".connId"] = "vnnsbiz_at_192_168_1_111";


$tdatacoint_left[".strOriginalTableName"] = "coint_left";

	



$tdatacoint_left[".showAddInPopup"] = false;

$tdatacoint_left[".showEditInPopup"] = false;

$tdatacoint_left[".showViewInPopup"] = false;

$tdatacoint_left[".listAjax"] = false;
//	temporary
//$tdatacoint_left[".listAjax"] = false;

	$tdatacoint_left[".audit"] = false;

	$tdatacoint_left[".locking"] = false;


$pages = $tdatacoint_left[".defaultPages"];

if( $pages[PAGE_EDIT] ) {
	$tdatacoint_left[".edit"] = true;
	$tdatacoint_left[".afterEditAction"] = 1;
	$tdatacoint_left[".closePopupAfterEdit"] = 1;
	$tdatacoint_left[".afterEditActionDetTable"] = "";
}

if( $pages[PAGE_ADD] ) {
$tdatacoint_left[".add"] = true;
$tdatacoint_left[".afterAddAction"] = 1;
$tdatacoint_left[".closePopupAfterAdd"] = 1;
$tdatacoint_left[".afterAddActionDetTable"] = "";
}

if( $pages[PAGE_LIST] ) {
	$tdatacoint_left[".list"] = true;
}



$tdatacoint_left[".strSortControlSettingsJSON"] = "";




if( $pages[PAGE_VIEW] ) {
$tdatacoint_left[".view"] = true;
}

if( $pages[PAGE_IMPORT] ) {
$tdatacoint_left[".import"] = true;
}

if( $pages[PAGE_EXPORT] ) {
$tdatacoint_left[".exportTo"] = true;
}

if( $pages[PAGE_PRINT] ) {
$tdatacoint_left[".printFriendly"] = true;
}



$tdatacoint_left[".showSimpleSearchOptions"] = true; // temp fix #13449

// Allow Show/Hide Fields in GRID
$tdatacoint_left[".allowShowHideFields"] = true; // temp fix #13449
//

// Allow Fields Reordering in GRID
$tdatacoint_left[".allowFieldsReordering"] = true; // temp fix #13449
//

$tdatacoint_left[".isUseAjaxSuggest"] = false;

$tdatacoint_left[".rowHighlite"] = true;



																											

$tdatacoint_left[".ajaxCodeSnippetAdded"] = false;

$tdatacoint_left[".buttonsAdded"] = false;

$tdatacoint_left[".addPageEvents"] = false;

// use timepicker for search panel
$tdatacoint_left[".isUseTimeForSearch"] = false;


$tdatacoint_left[".badgeColor"] = "DC143C";


$tdatacoint_left[".allSearchFields"] = array();
$tdatacoint_left[".filterFields"] = array();
$tdatacoint_left[".requiredSearchFields"] = array();





$tdatacoint_left[".printerPageOrientation"] = 0;
$tdatacoint_left[".nPrinterPageScale"] = 100;

$tdatacoint_left[".nPrinterSplitRecords"] = 40;

$tdatacoint_left[".geocodingEnabled"] = false;










$tdatacoint_left[".pageSize"] = 20;

$tdatacoint_left[".warnLeavingPages"] = true;



$tstrOrderBy = "";
$tdatacoint_left[".strOrderBy"] = $tstrOrderBy;

$tdatacoint_left[".orderindexes"] = array();


$tdatacoint_left[".sqlHead"] = "";
$tdatacoint_left[".sqlFrom"] = "";
$tdatacoint_left[".sqlWhereExpr"] = "";
$tdatacoint_left[".sqlTail"] = "";










//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatacoint_left[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatacoint_left[".arrGroupsPerPage"] = $arrGPP;

$tdatacoint_left[".highlightSearchResults"] = true;

$tableKeyscoint_left = array();
$tdatacoint_left[".Keys"] = $tableKeyscoint_left;


$tdatacoint_left[".hideMobileList"] = array();






$tables_data["coint_left"]=&$tdatacoint_left;
$field_labels["coint_left"] = &$fieldLabelscoint_left;
$fieldToolTips["coint_left"] = &$fieldToolTipscoint_left;
$placeHolders["coint_left"] = &$placeHolderscoint_left;
$page_titles["coint_left"] = &$pageTitlescoint_left;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)

//if !@TABLE.bReportCrossTab

$detailsTablesData["coint_left"] = array();
//endif

// tables which are master tables for current table (detail)
$masterTablesData["coint_left"] = array();



// -----------------end  prepare master-details data arrays ------------------------------//


require_once( getabspath( "include/coint_left_ops.php" ) );



	
		;



$tdatacoint_left[".sqlquery"] = $queryData_coint_left;



$tableEvents["coint_left"] = new eventsBase;
$tdatacoint_left[".hasEvents"] = false;

?>