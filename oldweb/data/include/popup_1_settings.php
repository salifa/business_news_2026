<?php
$tdatapopup_1 = array();
$tdatapopup_1[".searchableFields"] = array();
$tdatapopup_1[".ShortName"] = "popup_1";
$tdatapopup_1[".OwnerID"] = "";
$tdatapopup_1[".OriginalTable"] = "choices";


$tdatapopup_1[".pagesByType"] = my_json_decode( "{\"search\":[\"search\"]}" );
$tdatapopup_1[".originalPagesByType"] = $tdatapopup_1[".pagesByType"];
$tdatapopup_1[".pages"] = types2pages( my_json_decode( "{\"search\":[\"search\"]}" ) );
$tdatapopup_1[".originalPages"] = $tdatapopup_1[".pages"];
$tdatapopup_1[".defaultPages"] = my_json_decode( "{\"search\":\"search\"}" );
$tdatapopup_1[".originalDefaultPages"] = $tdatapopup_1[".defaultPages"];

//	field labels
$fieldLabelspopup_1 = array();
$fieldToolTipspopup_1 = array();
$pageTitlespopup_1 = array();
$placeHolderspopup_1 = array();

if(mlang_getcurrentlang()=="English")
{
	$fieldLabelspopup_1["English"] = array();
	$fieldToolTipspopup_1["English"] = array();
	$placeHolderspopup_1["English"] = array();
	$pageTitlespopup_1["English"] = array();
	$fieldLabelspopup_1["English"]["id"] = "Id";
	$fieldToolTipspopup_1["English"]["id"] = "";
	$placeHolderspopup_1["English"]["id"] = "";
	$fieldLabelspopup_1["English"]["field_name"] = "Field Name";
	$fieldToolTipspopup_1["English"]["field_name"] = "";
	$placeHolderspopup_1["English"]["field_name"] = "";
	$fieldLabelspopup_1["English"]["field_values"] = "Field Values";
	$fieldToolTipspopup_1["English"]["field_values"] = "";
	$placeHolderspopup_1["English"]["field_values"] = "";
	$fieldLabelspopup_1["English"]["field_textarea"] = "Field Textarea";
	$fieldToolTipspopup_1["English"]["field_textarea"] = "";
	$placeHolderspopup_1["English"]["field_textarea"] = "";
	$fieldLabelspopup_1["English"]["day_advance"] = "Day Advance";
	$fieldToolTipspopup_1["English"]["day_advance"] = "";
	$placeHolderspopup_1["English"]["day_advance"] = "";
	if (count($fieldToolTipspopup_1["English"]))
		$tdatapopup_1[".isUseToolTips"] = true;
}
if(mlang_getcurrentlang()=="Thai")
{
	$fieldLabelspopup_1["Thai"] = array();
	$fieldToolTipspopup_1["Thai"] = array();
	$placeHolderspopup_1["Thai"] = array();
	$pageTitlespopup_1["Thai"] = array();
	$fieldLabelspopup_1["Thai"]["id"] = "Id";
	$fieldToolTipspopup_1["Thai"]["id"] = "";
	$placeHolderspopup_1["Thai"]["id"] = "";
	$fieldLabelspopup_1["Thai"]["field_name"] = "Field Name";
	$fieldToolTipspopup_1["Thai"]["field_name"] = "";
	$placeHolderspopup_1["Thai"]["field_name"] = "";
	$fieldLabelspopup_1["Thai"]["field_values"] = "Field Values";
	$fieldToolTipspopup_1["Thai"]["field_values"] = "";
	$placeHolderspopup_1["Thai"]["field_values"] = "";
	$fieldLabelspopup_1["Thai"]["field_textarea"] = "Field Textarea";
	$fieldToolTipspopup_1["Thai"]["field_textarea"] = "";
	$placeHolderspopup_1["Thai"]["field_textarea"] = "";
	$fieldLabelspopup_1["Thai"]["day_advance"] = "Day Advance";
	$fieldToolTipspopup_1["Thai"]["day_advance"] = "";
	$placeHolderspopup_1["Thai"]["day_advance"] = "";
	if (count($fieldToolTipspopup_1["Thai"]))
		$tdatapopup_1[".isUseToolTips"] = true;
}


	$tdatapopup_1[".NCSearch"] = true;



$tdatapopup_1[".shortTableName"] = "popup_1";
$tdatapopup_1[".nSecOptions"] = 0;

$tdatapopup_1[".mainTableOwnerID"] = "";
$tdatapopup_1[".entityType"] = 1;
$tdatapopup_1[".connId"] = "vnnsbiz_at_192_168_1_111";


$tdatapopup_1[".strOriginalTableName"] = "choices";

	



$tdatapopup_1[".showAddInPopup"] = false;

$tdatapopup_1[".showEditInPopup"] = false;

$tdatapopup_1[".showViewInPopup"] = false;

$tdatapopup_1[".listAjax"] = false;
//	temporary
//$tdatapopup_1[".listAjax"] = false;

	$tdatapopup_1[".audit"] = true;

	$tdatapopup_1[".locking"] = false;


$pages = $tdatapopup_1[".defaultPages"];

if( $pages[PAGE_EDIT] ) {
	$tdatapopup_1[".edit"] = true;
	$tdatapopup_1[".afterEditAction"] = 0;
	$tdatapopup_1[".closePopupAfterEdit"] = 1;
	$tdatapopup_1[".afterEditActionDetTable"] = "";
}

if( $pages[PAGE_ADD] ) {
$tdatapopup_1[".add"] = true;
$tdatapopup_1[".afterAddAction"] = 0;
$tdatapopup_1[".closePopupAfterAdd"] = 1;
$tdatapopup_1[".afterAddActionDetTable"] = "";
}

if( $pages[PAGE_LIST] ) {
	$tdatapopup_1[".list"] = true;
}



$tdatapopup_1[".strSortControlSettingsJSON"] = "";




if( $pages[PAGE_VIEW] ) {
$tdatapopup_1[".view"] = true;
}

if( $pages[PAGE_IMPORT] ) {
$tdatapopup_1[".import"] = true;
}

if( $pages[PAGE_EXPORT] ) {
$tdatapopup_1[".exportTo"] = true;
}

if( $pages[PAGE_PRINT] ) {
$tdatapopup_1[".printFriendly"] = true;
}



$tdatapopup_1[".showSimpleSearchOptions"] = true; // temp fix #13449

// Allow Show/Hide Fields in GRID
$tdatapopup_1[".allowShowHideFields"] = true; // temp fix #13449
//

// Allow Fields Reordering in GRID
$tdatapopup_1[".allowFieldsReordering"] = true; // temp fix #13449
//

$tdatapopup_1[".isUseAjaxSuggest"] = true;

$tdatapopup_1[".rowHighlite"] = true;



																		

$tdatapopup_1[".ajaxCodeSnippetAdded"] = false;

$tdatapopup_1[".buttonsAdded"] = false;

$tdatapopup_1[".addPageEvents"] = false;

// use timepicker for search panel
$tdatapopup_1[".isUseTimeForSearch"] = false;


$tdatapopup_1[".badgeColor"] = "008B8B";


$tdatapopup_1[".allSearchFields"] = array();
$tdatapopup_1[".filterFields"] = array();
$tdatapopup_1[".requiredSearchFields"] = array();

$tdatapopup_1[".googleLikeFields"] = array();
$tdatapopup_1[".googleLikeFields"][] = "id";
$tdatapopup_1[".googleLikeFields"][] = "field_name";
$tdatapopup_1[".googleLikeFields"][] = "field_values";
$tdatapopup_1[".googleLikeFields"][] = "field_textarea";
$tdatapopup_1[".googleLikeFields"][] = "day_advance";



$tdatapopup_1[".tableType"] = "list";

$tdatapopup_1[".printerPageOrientation"] = 0;
$tdatapopup_1[".nPrinterPageScale"] = 100;

$tdatapopup_1[".nPrinterSplitRecords"] = 40;

$tdatapopup_1[".geocodingEnabled"] = false;










$tdatapopup_1[".pageSize"] = 20;

$tdatapopup_1[".warnLeavingPages"] = true;



$tstrOrderBy = "";
$tdatapopup_1[".strOrderBy"] = $tstrOrderBy;

$tdatapopup_1[".orderindexes"] = array();


$tdatapopup_1[".sqlHead"] = "SELECT id,  	field_name,  	field_values,  	field_textarea,  	day_advance";
$tdatapopup_1[".sqlFrom"] = "FROM choices";
$tdatapopup_1[".sqlWhereExpr"] = "";
$tdatapopup_1[".sqlTail"] = "";










//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatapopup_1[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatapopup_1[".arrGroupsPerPage"] = $arrGPP;

$tdatapopup_1[".highlightSearchResults"] = true;

$tableKeyspopup_1 = array();
$tableKeyspopup_1[] = "id";
$tdatapopup_1[".Keys"] = $tableKeyspopup_1;


$tdatapopup_1[".hideMobileList"] = array();




//	id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "id";
	$fdata["GoodName"] = "id";
	$fdata["ownerTable"] = "choices";
	$fdata["Label"] = GetFieldLabel("popup_1","id");
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


	$tdatapopup_1["id"] = $fdata;
		$tdatapopup_1[".searchableFields"][] = "id";
//	field_name
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "field_name";
	$fdata["GoodName"] = "field_name";
	$fdata["ownerTable"] = "choices";
	$fdata["Label"] = GetFieldLabel("popup_1","field_name");
	$fdata["FieldType"] = 200;


	
	
			

		$fdata["strField"] = "field_name";

	
		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "field_name";

	
	
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


	$tdatapopup_1["field_name"] = $fdata;
		$tdatapopup_1[".searchableFields"][] = "field_name";
//	field_values
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "field_values";
	$fdata["GoodName"] = "field_values";
	$fdata["ownerTable"] = "choices";
	$fdata["Label"] = GetFieldLabel("popup_1","field_values");
	$fdata["FieldType"] = 201;


	
	
			

		$fdata["strField"] = "field_values";

	
		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "field_values";

	
	
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

		$edata["maxNumberOfFiles"] = 0;

	
	
	
				$edata["nRows"] = 100;
			$edata["nCols"] = 200;

	
	
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

		$edata["CreateThumbnail"] = true;
	$edata["StrThumbnail"] = "th";
			$edata["ThumbnailSize"] = 600;

			
	
	
	
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


	$tdatapopup_1["field_values"] = $fdata;
		$tdatapopup_1[".searchableFields"][] = "field_values";
//	field_textarea
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "field_textarea";
	$fdata["GoodName"] = "field_textarea";
	$fdata["ownerTable"] = "choices";
	$fdata["Label"] = GetFieldLabel("popup_1","field_textarea");
	$fdata["FieldType"] = 201;


	
	
			

		$fdata["strField"] = "field_textarea";

	
		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "field_textarea";

	
	
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

		$edata["maxNumberOfFiles"] = 0;

	
	
	
				$edata["nRows"] = 100;
			$edata["nCols"] = 200;

	
	
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

		$edata["CreateThumbnail"] = true;
	$edata["StrThumbnail"] = "th";
			$edata["ThumbnailSize"] = 600;

			
	
	
	
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


	$tdatapopup_1["field_textarea"] = $fdata;
		$tdatapopup_1[".searchableFields"][] = "field_textarea";
//	day_advance
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "day_advance";
	$fdata["GoodName"] = "day_advance";
	$fdata["ownerTable"] = "choices";
	$fdata["Label"] = GetFieldLabel("popup_1","day_advance");
	$fdata["FieldType"] = 3;


	
	
			

		$fdata["strField"] = "day_advance";

		$fdata["sourceSingle"] = "day_advance";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "day_advance";

	
	
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


	$tdatapopup_1["day_advance"] = $fdata;
		$tdatapopup_1[".searchableFields"][] = "day_advance";


$tables_data["popup_1"]=&$tdatapopup_1;
$field_labels["popup_1"] = &$fieldLabelspopup_1;
$fieldToolTips["popup_1"] = &$fieldToolTipspopup_1;
$placeHolders["popup_1"] = &$placeHolderspopup_1;
$page_titles["popup_1"] = &$pageTitlespopup_1;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)

//if !@TABLE.bReportCrossTab

$detailsTablesData["popup_1"] = array();
//endif

// tables which are master tables for current table (detail)
$masterTablesData["popup_1"] = array();



// -----------------end  prepare master-details data arrays ------------------------------//



require_once(getabspath("classes/sql.php"));











function createSqlQuery_popup_1()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "id,  	field_name,  	field_values,  	field_textarea,  	day_advance";
$proto0["m_strFrom"] = "FROM choices";
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
	"m_strTable" => "choices",
	"m_srcTableName" => "popup_1"
));

$proto6["m_sql"] = "id";
$proto6["m_srcTableName"] = "popup_1";
$proto6["m_expr"]=$obj;
$proto6["m_alias"] = "";
$obj = new SQLFieldListItem($proto6);

$proto0["m_fieldlist"][]=$obj;
						$proto8=array();
			$obj = new SQLField(array(
	"m_strName" => "field_name",
	"m_strTable" => "choices",
	"m_srcTableName" => "popup_1"
));

$proto8["m_sql"] = "field_name";
$proto8["m_srcTableName"] = "popup_1";
$proto8["m_expr"]=$obj;
$proto8["m_alias"] = "";
$obj = new SQLFieldListItem($proto8);

$proto0["m_fieldlist"][]=$obj;
						$proto10=array();
			$obj = new SQLField(array(
	"m_strName" => "field_values",
	"m_strTable" => "choices",
	"m_srcTableName" => "popup_1"
));

$proto10["m_sql"] = "field_values";
$proto10["m_srcTableName"] = "popup_1";
$proto10["m_expr"]=$obj;
$proto10["m_alias"] = "";
$obj = new SQLFieldListItem($proto10);

$proto0["m_fieldlist"][]=$obj;
						$proto12=array();
			$obj = new SQLField(array(
	"m_strName" => "field_textarea",
	"m_strTable" => "choices",
	"m_srcTableName" => "popup_1"
));

$proto12["m_sql"] = "field_textarea";
$proto12["m_srcTableName"] = "popup_1";
$proto12["m_expr"]=$obj;
$proto12["m_alias"] = "";
$obj = new SQLFieldListItem($proto12);

$proto0["m_fieldlist"][]=$obj;
						$proto14=array();
			$obj = new SQLField(array(
	"m_strName" => "day_advance",
	"m_strTable" => "choices",
	"m_srcTableName" => "popup_1"
));

$proto14["m_sql"] = "day_advance";
$proto14["m_srcTableName"] = "popup_1";
$proto14["m_expr"]=$obj;
$proto14["m_alias"] = "";
$obj = new SQLFieldListItem($proto14);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto16=array();
$proto16["m_link"] = "SQLL_MAIN";
			$proto17=array();
$proto17["m_strName"] = "choices";
$proto17["m_srcTableName"] = "popup_1";
$proto17["m_columns"] = array();
$proto17["m_columns"][] = "id";
$proto17["m_columns"][] = "field_name";
$proto17["m_columns"][] = "field_values";
$proto17["m_columns"][] = "field_textarea";
$proto17["m_columns"][] = "day_advance";
$obj = new SQLTable($proto17);

$proto16["m_table"] = $obj;
$proto16["m_sql"] = "choices";
$proto16["m_alias"] = "";
$proto16["m_srcTableName"] = "popup_1";
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
$proto0["m_srcTableName"]="popup_1";		
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_popup_1 = createSqlQuery_popup_1();


	
		;

					

$tdatapopup_1[".sqlquery"] = $queryData_popup_1;



$tableEvents["popup_1"] = new eventsBase;
$tdatapopup_1[".hasEvents"] = false;

?>