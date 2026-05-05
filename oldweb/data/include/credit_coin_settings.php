<?php
$tdatacredit_coin = array();
$tdatacredit_coin[".searchableFields"] = array();
$tdatacredit_coin[".ShortName"] = "credit_coin";
$tdatacredit_coin[".OwnerID"] = "";
$tdatacredit_coin[".OriginalTable"] = "credit_coin";


$tdatacredit_coin[".pagesByType"] = my_json_decode( "{\"add\":[\"add\"],\"edit\":[\"edit\"],\"export\":[\"export\"],\"import\":[\"import\"],\"list\":[\"list\"],\"print\":[\"print\"],\"search\":[\"search\"],\"view\":[\"view\"]}" );
$tdatacredit_coin[".originalPagesByType"] = $tdatacredit_coin[".pagesByType"];
$tdatacredit_coin[".pages"] = types2pages( my_json_decode( "{\"add\":[\"add\"],\"edit\":[\"edit\"],\"export\":[\"export\"],\"import\":[\"import\"],\"list\":[\"list\"],\"print\":[\"print\"],\"search\":[\"search\"],\"view\":[\"view\"]}" ) );
$tdatacredit_coin[".originalPages"] = $tdatacredit_coin[".pages"];
$tdatacredit_coin[".defaultPages"] = my_json_decode( "{\"add\":\"add\",\"edit\":\"edit\",\"export\":\"export\",\"import\":\"import\",\"list\":\"list\",\"print\":\"print\",\"search\":\"search\",\"view\":\"view\"}" );
$tdatacredit_coin[".originalDefaultPages"] = $tdatacredit_coin[".defaultPages"];

//	field labels
$fieldLabelscredit_coin = array();
$fieldToolTipscredit_coin = array();
$pageTitlescredit_coin = array();
$placeHolderscredit_coin = array();

if(mlang_getcurrentlang()=="English")
{
	$fieldLabelscredit_coin["English"] = array();
	$fieldToolTipscredit_coin["English"] = array();
	$placeHolderscredit_coin["English"] = array();
	$pageTitlescredit_coin["English"] = array();
	$fieldLabelscredit_coin["English"]["id"] = "Id";
	$fieldToolTipscredit_coin["English"]["id"] = "";
	$placeHolderscredit_coin["English"]["id"] = "";
	$fieldLabelscredit_coin["English"]["credit_amt"] = "จำนวนเงิน";
	$fieldToolTipscredit_coin["English"]["credit_amt"] = "";
	$placeHolderscredit_coin["English"]["credit_amt"] = "";
	$fieldLabelscredit_coin["English"]["pop_name"] = "ชื่อ pack";
	$fieldToolTipscredit_coin["English"]["pop_name"] = "";
	$placeHolderscredit_coin["English"]["pop_name"] = "";
	$fieldLabelscredit_coin["English"]["coins"] = "จำนวนเหรียญ";
	$fieldToolTipscredit_coin["English"]["coins"] = "";
	$placeHolderscredit_coin["English"]["coins"] = "";
	if (count($fieldToolTipscredit_coin["English"]))
		$tdatacredit_coin[".isUseToolTips"] = true;
}
if(mlang_getcurrentlang()=="Thai")
{
	$fieldLabelscredit_coin["Thai"] = array();
	$fieldToolTipscredit_coin["Thai"] = array();
	$placeHolderscredit_coin["Thai"] = array();
	$pageTitlescredit_coin["Thai"] = array();
	$fieldLabelscredit_coin["Thai"]["id"] = "Id";
	$fieldToolTipscredit_coin["Thai"]["id"] = "";
	$placeHolderscredit_coin["Thai"]["id"] = "";
	$fieldLabelscredit_coin["Thai"]["credit_amt"] = "จำนวนเงิน";
	$fieldToolTipscredit_coin["Thai"]["credit_amt"] = "";
	$placeHolderscredit_coin["Thai"]["credit_amt"] = "";
	$fieldLabelscredit_coin["Thai"]["pop_name"] = "ชื่อ pack";
	$fieldToolTipscredit_coin["Thai"]["pop_name"] = "";
	$placeHolderscredit_coin["Thai"]["pop_name"] = "";
	$fieldLabelscredit_coin["Thai"]["coins"] = "จำนวนเหรียญ";
	$fieldToolTipscredit_coin["Thai"]["coins"] = "";
	$placeHolderscredit_coin["Thai"]["coins"] = "";
	if (count($fieldToolTipscredit_coin["Thai"]))
		$tdatacredit_coin[".isUseToolTips"] = true;
}


	$tdatacredit_coin[".NCSearch"] = true;



$tdatacredit_coin[".shortTableName"] = "credit_coin";
$tdatacredit_coin[".nSecOptions"] = 0;

$tdatacredit_coin[".mainTableOwnerID"] = "";
$tdatacredit_coin[".entityType"] = 0;
$tdatacredit_coin[".connId"] = "vnnsbiz_at_192_168_1_111";


$tdatacredit_coin[".strOriginalTableName"] = "credit_coin";

	



$tdatacredit_coin[".showAddInPopup"] = false;

$tdatacredit_coin[".showEditInPopup"] = false;

$tdatacredit_coin[".showViewInPopup"] = false;

$tdatacredit_coin[".listAjax"] = false;
//	temporary
//$tdatacredit_coin[".listAjax"] = false;

	$tdatacredit_coin[".audit"] = false;

	$tdatacredit_coin[".locking"] = false;


$pages = $tdatacredit_coin[".defaultPages"];

if( $pages[PAGE_EDIT] ) {
	$tdatacredit_coin[".edit"] = true;
	$tdatacredit_coin[".afterEditAction"] = 1;
	$tdatacredit_coin[".closePopupAfterEdit"] = 1;
	$tdatacredit_coin[".afterEditActionDetTable"] = "";
}

if( $pages[PAGE_ADD] ) {
$tdatacredit_coin[".add"] = true;
$tdatacredit_coin[".afterAddAction"] = 1;
$tdatacredit_coin[".closePopupAfterAdd"] = 1;
$tdatacredit_coin[".afterAddActionDetTable"] = "";
}

if( $pages[PAGE_LIST] ) {
	$tdatacredit_coin[".list"] = true;
}



$tdatacredit_coin[".strSortControlSettingsJSON"] = "";




if( $pages[PAGE_VIEW] ) {
$tdatacredit_coin[".view"] = true;
}

if( $pages[PAGE_IMPORT] ) {
$tdatacredit_coin[".import"] = true;
}

if( $pages[PAGE_EXPORT] ) {
$tdatacredit_coin[".exportTo"] = true;
}

if( $pages[PAGE_PRINT] ) {
$tdatacredit_coin[".printFriendly"] = true;
}



$tdatacredit_coin[".showSimpleSearchOptions"] = true; // temp fix #13449

// Allow Show/Hide Fields in GRID
$tdatacredit_coin[".allowShowHideFields"] = true; // temp fix #13449
//

// Allow Fields Reordering in GRID
$tdatacredit_coin[".allowFieldsReordering"] = true; // temp fix #13449
//

$tdatacredit_coin[".isUseAjaxSuggest"] = true;

$tdatacredit_coin[".rowHighlite"] = true;



																											

$tdatacredit_coin[".ajaxCodeSnippetAdded"] = false;

$tdatacredit_coin[".buttonsAdded"] = false;

$tdatacredit_coin[".addPageEvents"] = false;

// use timepicker for search panel
$tdatacredit_coin[".isUseTimeForSearch"] = false;


$tdatacredit_coin[".badgeColor"] = "DC143C";


$tdatacredit_coin[".allSearchFields"] = array();
$tdatacredit_coin[".filterFields"] = array();
$tdatacredit_coin[".requiredSearchFields"] = array();

$tdatacredit_coin[".googleLikeFields"] = array();
$tdatacredit_coin[".googleLikeFields"][] = "id";
$tdatacredit_coin[".googleLikeFields"][] = "credit_amt";
$tdatacredit_coin[".googleLikeFields"][] = "pop_name";
$tdatacredit_coin[".googleLikeFields"][] = "coins";



$tdatacredit_coin[".tableType"] = "list";

$tdatacredit_coin[".printerPageOrientation"] = 0;
$tdatacredit_coin[".nPrinterPageScale"] = 100;

$tdatacredit_coin[".nPrinterSplitRecords"] = 40;

$tdatacredit_coin[".geocodingEnabled"] = false;










$tdatacredit_coin[".pageSize"] = 20;

$tdatacredit_coin[".warnLeavingPages"] = true;



$tstrOrderBy = "";
$tdatacredit_coin[".strOrderBy"] = $tstrOrderBy;

$tdatacredit_coin[".orderindexes"] = array();


$tdatacredit_coin[".sqlHead"] = "SELECT id,  	credit_amt,  	pop_name,  	coins";
$tdatacredit_coin[".sqlFrom"] = "FROM credit_coin";
$tdatacredit_coin[".sqlWhereExpr"] = "";
$tdatacredit_coin[".sqlTail"] = "";










//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatacredit_coin[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatacredit_coin[".arrGroupsPerPage"] = $arrGPP;

$tdatacredit_coin[".highlightSearchResults"] = true;

$tableKeyscredit_coin = array();
$tableKeyscredit_coin[] = "id";
$tdatacredit_coin[".Keys"] = $tableKeyscredit_coin;


$tdatacredit_coin[".hideMobileList"] = array();




//	id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "id";
	$fdata["GoodName"] = "id";
	$fdata["ownerTable"] = "credit_coin";
	$fdata["Label"] = GetFieldLabel("credit_coin","id");
	$fdata["FieldType"] = 3;


		$fdata["AutoInc"] = true;

	
			

		$fdata["strField"] = "id";

		$fdata["sourceSingle"] = "id";

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


	$tdatacredit_coin["id"] = $fdata;
		$tdatacredit_coin[".searchableFields"][] = "id";
//	credit_amt
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "credit_amt";
	$fdata["GoodName"] = "credit_amt";
	$fdata["ownerTable"] = "credit_coin";
	$fdata["Label"] = GetFieldLabel("credit_coin","credit_amt");
	$fdata["FieldType"] = 3;


	
	
			

		$fdata["strField"] = "credit_amt";

		$fdata["sourceSingle"] = "credit_amt";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "credit_amt";

	
	
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


	$tdatacredit_coin["credit_amt"] = $fdata;
		$tdatacredit_coin[".searchableFields"][] = "credit_amt";
//	pop_name
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "pop_name";
	$fdata["GoodName"] = "pop_name";
	$fdata["ownerTable"] = "credit_coin";
	$fdata["Label"] = GetFieldLabel("credit_coin","pop_name");
	$fdata["FieldType"] = 200;


	
	
			

		$fdata["strField"] = "pop_name";

		$fdata["sourceSingle"] = "pop_name";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "pop_name";

	
	
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


	$tdatacredit_coin["pop_name"] = $fdata;
		$tdatacredit_coin[".searchableFields"][] = "pop_name";
//	coins
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "coins";
	$fdata["GoodName"] = "coins";
	$fdata["ownerTable"] = "credit_coin";
	$fdata["Label"] = GetFieldLabel("credit_coin","coins");
	$fdata["FieldType"] = 3;


	
	
			

		$fdata["strField"] = "coins";

		$fdata["sourceSingle"] = "coins";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "coins";

	
	
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


	$tdatacredit_coin["coins"] = $fdata;
		$tdatacredit_coin[".searchableFields"][] = "coins";


$tables_data["credit_coin"]=&$tdatacredit_coin;
$field_labels["credit_coin"] = &$fieldLabelscredit_coin;
$fieldToolTips["credit_coin"] = &$fieldToolTipscredit_coin;
$placeHolders["credit_coin"] = &$placeHolderscredit_coin;
$page_titles["credit_coin"] = &$pageTitlescredit_coin;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)

//if !@TABLE.bReportCrossTab

$detailsTablesData["credit_coin"] = array();
//endif

// tables which are master tables for current table (detail)
$masterTablesData["credit_coin"] = array();



// -----------------end  prepare master-details data arrays ------------------------------//



require_once(getabspath("classes/sql.php"));











function createSqlQuery_credit_coin()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "id,  	credit_amt,  	pop_name,  	coins";
$proto0["m_strFrom"] = "FROM credit_coin";
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
	"m_strName" => "id",
	"m_strTable" => "credit_coin",
	"m_srcTableName" => "credit_coin"
));

$proto6["m_sql"] = "id";
$proto6["m_srcTableName"] = "credit_coin";
$proto6["m_expr"]=$obj;
$proto6["m_alias"] = "";
$obj = new SQLFieldListItem($proto6);

$proto0["m_fieldlist"][]=$obj;
						$proto8=array();
			$obj = new SQLField(array(
	"m_strName" => "credit_amt",
	"m_strTable" => "credit_coin",
	"m_srcTableName" => "credit_coin"
));

$proto8["m_sql"] = "credit_amt";
$proto8["m_srcTableName"] = "credit_coin";
$proto8["m_expr"]=$obj;
$proto8["m_alias"] = "";
$obj = new SQLFieldListItem($proto8);

$proto0["m_fieldlist"][]=$obj;
						$proto10=array();
			$obj = new SQLField(array(
	"m_strName" => "pop_name",
	"m_strTable" => "credit_coin",
	"m_srcTableName" => "credit_coin"
));

$proto10["m_sql"] = "pop_name";
$proto10["m_srcTableName"] = "credit_coin";
$proto10["m_expr"]=$obj;
$proto10["m_alias"] = "";
$obj = new SQLFieldListItem($proto10);

$proto0["m_fieldlist"][]=$obj;
						$proto12=array();
			$obj = new SQLField(array(
	"m_strName" => "coins",
	"m_strTable" => "credit_coin",
	"m_srcTableName" => "credit_coin"
));

$proto12["m_sql"] = "coins";
$proto12["m_srcTableName"] = "credit_coin";
$proto12["m_expr"]=$obj;
$proto12["m_alias"] = "";
$obj = new SQLFieldListItem($proto12);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto14=array();
$proto14["m_link"] = "SQLL_MAIN";
			$proto15=array();
$proto15["m_strName"] = "credit_coin";
$proto15["m_srcTableName"] = "credit_coin";
$proto15["m_columns"] = array();
$proto15["m_columns"][] = "id";
$proto15["m_columns"][] = "credit_amt";
$proto15["m_columns"][] = "pop_name";
$proto15["m_columns"][] = "coins";
$obj = new SQLTable($proto15);

$proto14["m_table"] = $obj;
$proto14["m_sql"] = "credit_coin";
$proto14["m_alias"] = "";
$proto14["m_srcTableName"] = "credit_coin";
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
$proto0["m_srcTableName"]="credit_coin";		
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_credit_coin = createSqlQuery_credit_coin();


	
		;

				

$tdatacredit_coin[".sqlquery"] = $queryData_credit_coin;



$tableEvents["credit_coin"] = new eventsBase;
$tdatacredit_coin[".hasEvents"] = false;

?>