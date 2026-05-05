<?php
$tdatapopup_key_value = array();
$tdatapopup_key_value[".searchableFields"] = array();
$tdatapopup_key_value[".ShortName"] = "popup_key_value";
$tdatapopup_key_value[".OwnerID"] = "";
$tdatapopup_key_value[".OriginalTable"] = "popup_key_value";


$tdatapopup_key_value[".pagesByType"] = my_json_decode( "{}" );
$tdatapopup_key_value[".originalPagesByType"] = $tdatapopup_key_value[".pagesByType"];
$tdatapopup_key_value[".pages"] = types2pages( my_json_decode( "{}" ) );
$tdatapopup_key_value[".originalPages"] = $tdatapopup_key_value[".pages"];
$tdatapopup_key_value[".defaultPages"] = my_json_decode( "{}" );
$tdatapopup_key_value[".originalDefaultPages"] = $tdatapopup_key_value[".defaultPages"];

//	field labels
$fieldLabelspopup_key_value = array();
$fieldToolTipspopup_key_value = array();
$pageTitlespopup_key_value = array();
$placeHolderspopup_key_value = array();

if(mlang_getcurrentlang()=="English")
{
	$fieldLabelspopup_key_value["English"] = array();
	$fieldToolTipspopup_key_value["English"] = array();
	$placeHolderspopup_key_value["English"] = array();
	$pageTitlespopup_key_value["English"] = array();
	$fieldLabelspopup_key_value["English"]["id"] = "Id";
	$fieldToolTipspopup_key_value["English"]["id"] = "";
	$placeHolderspopup_key_value["English"]["id"] = "";
	$fieldLabelspopup_key_value["English"]["name"] = "Name";
	$fieldToolTipspopup_key_value["English"]["name"] = "";
	$placeHolderspopup_key_value["English"]["name"] = "";
	$fieldLabelspopup_key_value["English"]["key"] = "Key";
	$fieldToolTipspopup_key_value["English"]["key"] = "";
	$placeHolderspopup_key_value["English"]["key"] = "";
	$fieldLabelspopup_key_value["English"]["value"] = "Value";
	$fieldToolTipspopup_key_value["English"]["value"] = "";
	$placeHolderspopup_key_value["English"]["value"] = "";
	if (count($fieldToolTipspopup_key_value["English"]))
		$tdatapopup_key_value[".isUseToolTips"] = true;
}
if(mlang_getcurrentlang()=="Thai")
{
	$fieldLabelspopup_key_value["Thai"] = array();
	$fieldToolTipspopup_key_value["Thai"] = array();
	$placeHolderspopup_key_value["Thai"] = array();
	$pageTitlespopup_key_value["Thai"] = array();
	$fieldLabelspopup_key_value["Thai"]["id"] = "Id";
	$fieldToolTipspopup_key_value["Thai"]["id"] = "";
	$placeHolderspopup_key_value["Thai"]["id"] = "";
	$fieldLabelspopup_key_value["Thai"]["name"] = "Name";
	$fieldToolTipspopup_key_value["Thai"]["name"] = "";
	$placeHolderspopup_key_value["Thai"]["name"] = "";
	$fieldLabelspopup_key_value["Thai"]["key"] = "Key";
	$fieldToolTipspopup_key_value["Thai"]["key"] = "";
	$placeHolderspopup_key_value["Thai"]["key"] = "";
	$fieldLabelspopup_key_value["Thai"]["value"] = "Value";
	$fieldToolTipspopup_key_value["Thai"]["value"] = "";
	$placeHolderspopup_key_value["Thai"]["value"] = "";
	if (count($fieldToolTipspopup_key_value["Thai"]))
		$tdatapopup_key_value[".isUseToolTips"] = true;
}


	$tdatapopup_key_value[".NCSearch"] = true;



$tdatapopup_key_value[".shortTableName"] = "popup_key_value";
$tdatapopup_key_value[".nSecOptions"] = 0;

$tdatapopup_key_value[".mainTableOwnerID"] = "";
$tdatapopup_key_value[".entityType"] = 0;
$tdatapopup_key_value[".connId"] = "vnnsbiz_at_192_168_1_111";


$tdatapopup_key_value[".strOriginalTableName"] = "popup_key_value";

	



$tdatapopup_key_value[".showAddInPopup"] = false;

$tdatapopup_key_value[".showEditInPopup"] = false;

$tdatapopup_key_value[".showViewInPopup"] = false;

$tdatapopup_key_value[".listAjax"] = false;
//	temporary
//$tdatapopup_key_value[".listAjax"] = false;

	$tdatapopup_key_value[".audit"] = false;

	$tdatapopup_key_value[".locking"] = false;


$pages = $tdatapopup_key_value[".defaultPages"];

if( $pages[PAGE_EDIT] ) {
	$tdatapopup_key_value[".edit"] = true;
	$tdatapopup_key_value[".afterEditAction"] = 1;
	$tdatapopup_key_value[".closePopupAfterEdit"] = 1;
	$tdatapopup_key_value[".afterEditActionDetTable"] = "";
}

if( $pages[PAGE_ADD] ) {
$tdatapopup_key_value[".add"] = true;
$tdatapopup_key_value[".afterAddAction"] = 1;
$tdatapopup_key_value[".closePopupAfterAdd"] = 1;
$tdatapopup_key_value[".afterAddActionDetTable"] = "";
}

if( $pages[PAGE_LIST] ) {
	$tdatapopup_key_value[".list"] = true;
}



$tdatapopup_key_value[".strSortControlSettingsJSON"] = "";




if( $pages[PAGE_VIEW] ) {
$tdatapopup_key_value[".view"] = true;
}

if( $pages[PAGE_IMPORT] ) {
$tdatapopup_key_value[".import"] = true;
}

if( $pages[PAGE_EXPORT] ) {
$tdatapopup_key_value[".exportTo"] = true;
}

if( $pages[PAGE_PRINT] ) {
$tdatapopup_key_value[".printFriendly"] = true;
}



$tdatapopup_key_value[".showSimpleSearchOptions"] = true; // temp fix #13449

// Allow Show/Hide Fields in GRID
$tdatapopup_key_value[".allowShowHideFields"] = true; // temp fix #13449
//

// Allow Fields Reordering in GRID
$tdatapopup_key_value[".allowFieldsReordering"] = true; // temp fix #13449
//

$tdatapopup_key_value[".isUseAjaxSuggest"] = true;

$tdatapopup_key_value[".rowHighlite"] = true;



																		

$tdatapopup_key_value[".ajaxCodeSnippetAdded"] = false;

$tdatapopup_key_value[".buttonsAdded"] = false;

$tdatapopup_key_value[".addPageEvents"] = false;

// use timepicker for search panel
$tdatapopup_key_value[".isUseTimeForSearch"] = false;


$tdatapopup_key_value[".badgeColor"] = "CD853F";


$tdatapopup_key_value[".allSearchFields"] = array();
$tdatapopup_key_value[".filterFields"] = array();
$tdatapopup_key_value[".requiredSearchFields"] = array();

$tdatapopup_key_value[".googleLikeFields"] = array();
$tdatapopup_key_value[".googleLikeFields"][] = "id";
$tdatapopup_key_value[".googleLikeFields"][] = "name";
$tdatapopup_key_value[".googleLikeFields"][] = "key";
$tdatapopup_key_value[".googleLikeFields"][] = "value";



$tdatapopup_key_value[".tableType"] = "list";

$tdatapopup_key_value[".printerPageOrientation"] = 0;
$tdatapopup_key_value[".nPrinterPageScale"] = 100;

$tdatapopup_key_value[".nPrinterSplitRecords"] = 40;

$tdatapopup_key_value[".geocodingEnabled"] = false;










$tdatapopup_key_value[".pageSize"] = 20;

$tdatapopup_key_value[".warnLeavingPages"] = true;



$tstrOrderBy = "";
$tdatapopup_key_value[".strOrderBy"] = $tstrOrderBy;

$tdatapopup_key_value[".orderindexes"] = array();


$tdatapopup_key_value[".sqlHead"] = "SELECT id,  	name,  	`key`,  	`value`";
$tdatapopup_key_value[".sqlFrom"] = "FROM popup_key_value";
$tdatapopup_key_value[".sqlWhereExpr"] = "";
$tdatapopup_key_value[".sqlTail"] = "";










//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatapopup_key_value[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatapopup_key_value[".arrGroupsPerPage"] = $arrGPP;

$tdatapopup_key_value[".highlightSearchResults"] = true;

$tableKeyspopup_key_value = array();
$tableKeyspopup_key_value[] = "id";
$tdatapopup_key_value[".Keys"] = $tableKeyspopup_key_value;


$tdatapopup_key_value[".hideMobileList"] = array();




//	id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "id";
	$fdata["GoodName"] = "id";
	$fdata["ownerTable"] = "popup_key_value";
	$fdata["Label"] = GetFieldLabel("popup_key_value","id");
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


	$tdatapopup_key_value["id"] = $fdata;
		$tdatapopup_key_value[".searchableFields"][] = "id";
//	name
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "name";
	$fdata["GoodName"] = "name";
	$fdata["ownerTable"] = "popup_key_value";
	$fdata["Label"] = GetFieldLabel("popup_key_value","name");
	$fdata["FieldType"] = 200;


	
	
			

		$fdata["strField"] = "name";

	
		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "name";

	
	
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


	$tdatapopup_key_value["name"] = $fdata;
		$tdatapopup_key_value[".searchableFields"][] = "name";
//	key
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "key";
	$fdata["GoodName"] = "key";
	$fdata["ownerTable"] = "popup_key_value";
	$fdata["Label"] = GetFieldLabel("popup_key_value","key");
	$fdata["FieldType"] = 200;


	
	
			

		$fdata["strField"] = "key";

	
		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "`key`";

	
	
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


	$tdatapopup_key_value["key"] = $fdata;
		$tdatapopup_key_value[".searchableFields"][] = "key";
//	value
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "value";
	$fdata["GoodName"] = "value";
	$fdata["ownerTable"] = "popup_key_value";
	$fdata["Label"] = GetFieldLabel("popup_key_value","value");
	$fdata["FieldType"] = 200;


	
	
			

		$fdata["strField"] = "value";

	
		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "`value`";

	
	
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


	$tdatapopup_key_value["value"] = $fdata;
		$tdatapopup_key_value[".searchableFields"][] = "value";


$tables_data["popup_key_value"]=&$tdatapopup_key_value;
$field_labels["popup_key_value"] = &$fieldLabelspopup_key_value;
$fieldToolTips["popup_key_value"] = &$fieldToolTipspopup_key_value;
$placeHolders["popup_key_value"] = &$placeHolderspopup_key_value;
$page_titles["popup_key_value"] = &$pageTitlespopup_key_value;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)

//if !@TABLE.bReportCrossTab

$detailsTablesData["popup_key_value"] = array();
//endif

// tables which are master tables for current table (detail)
$masterTablesData["popup_key_value"] = array();



// -----------------end  prepare master-details data arrays ------------------------------//



require_once(getabspath("classes/sql.php"));











function createSqlQuery_popup_key_value()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "id,  	name,  	`key`,  	`value`";
$proto0["m_strFrom"] = "FROM popup_key_value";
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
	"m_strTable" => "popup_key_value",
	"m_srcTableName" => "popup_key_value"
));

$proto6["m_sql"] = "id";
$proto6["m_srcTableName"] = "popup_key_value";
$proto6["m_expr"]=$obj;
$proto6["m_alias"] = "";
$obj = new SQLFieldListItem($proto6);

$proto0["m_fieldlist"][]=$obj;
						$proto8=array();
			$obj = new SQLField(array(
	"m_strName" => "name",
	"m_strTable" => "popup_key_value",
	"m_srcTableName" => "popup_key_value"
));

$proto8["m_sql"] = "name";
$proto8["m_srcTableName"] = "popup_key_value";
$proto8["m_expr"]=$obj;
$proto8["m_alias"] = "";
$obj = new SQLFieldListItem($proto8);

$proto0["m_fieldlist"][]=$obj;
						$proto10=array();
			$obj = new SQLField(array(
	"m_strName" => "key",
	"m_strTable" => "popup_key_value",
	"m_srcTableName" => "popup_key_value"
));

$proto10["m_sql"] = "`key`";
$proto10["m_srcTableName"] = "popup_key_value";
$proto10["m_expr"]=$obj;
$proto10["m_alias"] = "";
$obj = new SQLFieldListItem($proto10);

$proto0["m_fieldlist"][]=$obj;
						$proto12=array();
			$obj = new SQLField(array(
	"m_strName" => "value",
	"m_strTable" => "popup_key_value",
	"m_srcTableName" => "popup_key_value"
));

$proto12["m_sql"] = "`value`";
$proto12["m_srcTableName"] = "popup_key_value";
$proto12["m_expr"]=$obj;
$proto12["m_alias"] = "";
$obj = new SQLFieldListItem($proto12);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto14=array();
$proto14["m_link"] = "SQLL_MAIN";
			$proto15=array();
$proto15["m_strName"] = "popup_key_value";
$proto15["m_srcTableName"] = "popup_key_value";
$proto15["m_columns"] = array();
$proto15["m_columns"][] = "id";
$proto15["m_columns"][] = "name";
$proto15["m_columns"][] = "key";
$proto15["m_columns"][] = "value";
$obj = new SQLTable($proto15);

$proto14["m_table"] = $obj;
$proto14["m_sql"] = "popup_key_value";
$proto14["m_alias"] = "";
$proto14["m_srcTableName"] = "popup_key_value";
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
$proto0["m_srcTableName"]="popup_key_value";		
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_popup_key_value = createSqlQuery_popup_key_value();


	
		;

				

$tdatapopup_key_value[".sqlquery"] = $queryData_popup_key_value;



$tableEvents["popup_key_value"] = new eventsBase;
$tdatapopup_key_value[".hasEvents"] = false;

?>