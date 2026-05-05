<?php
$tdatachoices = array();
$tdatachoices[".searchableFields"] = array();
$tdatachoices[".ShortName"] = "choices";
$tdatachoices[".OwnerID"] = "";
$tdatachoices[".OriginalTable"] = "choices";


$tdatachoices[".pagesByType"] = my_json_decode( "{\"search\":[\"search\"]}" );
$tdatachoices[".originalPagesByType"] = $tdatachoices[".pagesByType"];
$tdatachoices[".pages"] = types2pages( my_json_decode( "{\"search\":[\"search\"]}" ) );
$tdatachoices[".originalPages"] = $tdatachoices[".pages"];
$tdatachoices[".defaultPages"] = my_json_decode( "{\"search\":\"search\"}" );
$tdatachoices[".originalDefaultPages"] = $tdatachoices[".defaultPages"];

//	field labels
$fieldLabelschoices = array();
$fieldToolTipschoices = array();
$pageTitleschoices = array();
$placeHolderschoices = array();

if(mlang_getcurrentlang()=="English")
{
	$fieldLabelschoices["English"] = array();
	$fieldToolTipschoices["English"] = array();
	$placeHolderschoices["English"] = array();
	$pageTitleschoices["English"] = array();
	$fieldLabelschoices["English"]["id"] = "Id";
	$fieldToolTipschoices["English"]["id"] = "";
	$placeHolderschoices["English"]["id"] = "";
	$fieldLabelschoices["English"]["field_name"] = "Field Name";
	$fieldToolTipschoices["English"]["field_name"] = "";
	$placeHolderschoices["English"]["field_name"] = "";
	$fieldLabelschoices["English"]["field_values"] = "Field Values";
	$fieldToolTipschoices["English"]["field_values"] = "";
	$placeHolderschoices["English"]["field_values"] = "";
	$fieldLabelschoices["English"]["field_textarea"] = "Field Textarea";
	$fieldToolTipschoices["English"]["field_textarea"] = "";
	$placeHolderschoices["English"]["field_textarea"] = "";
	$fieldLabelschoices["English"]["day_advance"] = "Day Advance";
	$fieldToolTipschoices["English"]["day_advance"] = "";
	$placeHolderschoices["English"]["day_advance"] = "";
	if (count($fieldToolTipschoices["English"]))
		$tdatachoices[".isUseToolTips"] = true;
}
if(mlang_getcurrentlang()=="Thai")
{
	$fieldLabelschoices["Thai"] = array();
	$fieldToolTipschoices["Thai"] = array();
	$placeHolderschoices["Thai"] = array();
	$pageTitleschoices["Thai"] = array();
	$fieldLabelschoices["Thai"]["id"] = "Id";
	$fieldToolTipschoices["Thai"]["id"] = "";
	$placeHolderschoices["Thai"]["id"] = "";
	$fieldLabelschoices["Thai"]["field_name"] = "Field Name";
	$fieldToolTipschoices["Thai"]["field_name"] = "";
	$placeHolderschoices["Thai"]["field_name"] = "";
	$fieldLabelschoices["Thai"]["field_values"] = "Field Values";
	$fieldToolTipschoices["Thai"]["field_values"] = "";
	$placeHolderschoices["Thai"]["field_values"] = "";
	$fieldLabelschoices["Thai"]["field_textarea"] = "Field Textarea";
	$fieldToolTipschoices["Thai"]["field_textarea"] = "";
	$placeHolderschoices["Thai"]["field_textarea"] = "";
	$fieldLabelschoices["Thai"]["day_advance"] = "Day Advance";
	$fieldToolTipschoices["Thai"]["day_advance"] = "";
	$placeHolderschoices["Thai"]["day_advance"] = "";
	if (count($fieldToolTipschoices["Thai"]))
		$tdatachoices[".isUseToolTips"] = true;
}


	$tdatachoices[".NCSearch"] = true;



$tdatachoices[".shortTableName"] = "choices";
$tdatachoices[".nSecOptions"] = 0;

$tdatachoices[".mainTableOwnerID"] = "";
$tdatachoices[".entityType"] = 0;
$tdatachoices[".connId"] = "vnnsbiz_at_192_168_1_111";


$tdatachoices[".strOriginalTableName"] = "choices";

	



$tdatachoices[".showAddInPopup"] = false;

$tdatachoices[".showEditInPopup"] = false;

$tdatachoices[".showViewInPopup"] = false;

$tdatachoices[".listAjax"] = false;
//	temporary
//$tdatachoices[".listAjax"] = false;

	$tdatachoices[".audit"] = true;

	$tdatachoices[".locking"] = false;


$pages = $tdatachoices[".defaultPages"];

if( $pages[PAGE_EDIT] ) {
	$tdatachoices[".edit"] = true;
	$tdatachoices[".afterEditAction"] = 0;
	$tdatachoices[".closePopupAfterEdit"] = 1;
	$tdatachoices[".afterEditActionDetTable"] = "";
}

if( $pages[PAGE_ADD] ) {
$tdatachoices[".add"] = true;
$tdatachoices[".afterAddAction"] = 0;
$tdatachoices[".closePopupAfterAdd"] = 1;
$tdatachoices[".afterAddActionDetTable"] = "";
}

if( $pages[PAGE_LIST] ) {
	$tdatachoices[".list"] = true;
}



$tdatachoices[".strSortControlSettingsJSON"] = "";




if( $pages[PAGE_VIEW] ) {
$tdatachoices[".view"] = true;
}

if( $pages[PAGE_IMPORT] ) {
$tdatachoices[".import"] = true;
}

if( $pages[PAGE_EXPORT] ) {
$tdatachoices[".exportTo"] = true;
}

if( $pages[PAGE_PRINT] ) {
$tdatachoices[".printFriendly"] = true;
}



$tdatachoices[".showSimpleSearchOptions"] = true; // temp fix #13449

// Allow Show/Hide Fields in GRID
$tdatachoices[".allowShowHideFields"] = true; // temp fix #13449
//

// Allow Fields Reordering in GRID
$tdatachoices[".allowFieldsReordering"] = true; // temp fix #13449
//

$tdatachoices[".isUseAjaxSuggest"] = true;

$tdatachoices[".rowHighlite"] = true;



																		

$tdatachoices[".ajaxCodeSnippetAdded"] = false;

$tdatachoices[".buttonsAdded"] = false;

$tdatachoices[".addPageEvents"] = false;

// use timepicker for search panel
$tdatachoices[".isUseTimeForSearch"] = false;


$tdatachoices[".badgeColor"] = "D2691E";


$tdatachoices[".allSearchFields"] = array();
$tdatachoices[".filterFields"] = array();
$tdatachoices[".requiredSearchFields"] = array();

$tdatachoices[".googleLikeFields"] = array();
$tdatachoices[".googleLikeFields"][] = "id";
$tdatachoices[".googleLikeFields"][] = "field_name";
$tdatachoices[".googleLikeFields"][] = "field_values";
$tdatachoices[".googleLikeFields"][] = "field_textarea";
$tdatachoices[".googleLikeFields"][] = "day_advance";



$tdatachoices[".tableType"] = "list";

$tdatachoices[".printerPageOrientation"] = 0;
$tdatachoices[".nPrinterPageScale"] = 100;

$tdatachoices[".nPrinterSplitRecords"] = 40;

$tdatachoices[".geocodingEnabled"] = false;




$tdatachoices[".isDisplayLoading"] = true;






$tdatachoices[".pageSize"] = 20;

$tdatachoices[".warnLeavingPages"] = true;



$tstrOrderBy = "";
$tdatachoices[".strOrderBy"] = $tstrOrderBy;

$tdatachoices[".orderindexes"] = array();


$tdatachoices[".sqlHead"] = "SELECT id,  	field_name,  	field_values,  	field_textarea,  	day_advance";
$tdatachoices[".sqlFrom"] = "FROM choices";
$tdatachoices[".sqlWhereExpr"] = "";
$tdatachoices[".sqlTail"] = "";










//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatachoices[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatachoices[".arrGroupsPerPage"] = $arrGPP;

$tdatachoices[".highlightSearchResults"] = true;

$tableKeyschoices = array();
$tableKeyschoices[] = "id";
$tdatachoices[".Keys"] = $tableKeyschoices;


$tdatachoices[".hideMobileList"] = array();




//	id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "id";
	$fdata["GoodName"] = "id";
	$fdata["ownerTable"] = "choices";
	$fdata["Label"] = GetFieldLabel("choices","id");
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


	$tdatachoices["id"] = $fdata;
		$tdatachoices[".searchableFields"][] = "id";
//	field_name
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "field_name";
	$fdata["GoodName"] = "field_name";
	$fdata["ownerTable"] = "choices";
	$fdata["Label"] = GetFieldLabel("choices","field_name");
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


	$tdatachoices["field_name"] = $fdata;
		$tdatachoices[".searchableFields"][] = "field_name";
//	field_values
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "field_values";
	$fdata["GoodName"] = "field_values";
	$fdata["ownerTable"] = "choices";
	$fdata["Label"] = GetFieldLabel("choices","field_values");
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


	$tdatachoices["field_values"] = $fdata;
		$tdatachoices[".searchableFields"][] = "field_values";
//	field_textarea
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "field_textarea";
	$fdata["GoodName"] = "field_textarea";
	$fdata["ownerTable"] = "choices";
	$fdata["Label"] = GetFieldLabel("choices","field_textarea");
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


	$tdatachoices["field_textarea"] = $fdata;
		$tdatachoices[".searchableFields"][] = "field_textarea";
//	day_advance
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "day_advance";
	$fdata["GoodName"] = "day_advance";
	$fdata["ownerTable"] = "choices";
	$fdata["Label"] = GetFieldLabel("choices","day_advance");
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


	$tdatachoices["day_advance"] = $fdata;
		$tdatachoices[".searchableFields"][] = "day_advance";


$tables_data["choices"]=&$tdatachoices;
$field_labels["choices"] = &$fieldLabelschoices;
$fieldToolTips["choices"] = &$fieldToolTipschoices;
$placeHolders["choices"] = &$placeHolderschoices;
$page_titles["choices"] = &$pageTitleschoices;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)

//if !@TABLE.bReportCrossTab

$detailsTablesData["choices"] = array();
//endif

// tables which are master tables for current table (detail)
$masterTablesData["choices"] = array();



// -----------------end  prepare master-details data arrays ------------------------------//



require_once(getabspath("classes/sql.php"));











function createSqlQuery_choices()
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
	"m_srcTableName" => "choices"
));

$proto6["m_sql"] = "id";
$proto6["m_srcTableName"] = "choices";
$proto6["m_expr"]=$obj;
$proto6["m_alias"] = "";
$obj = new SQLFieldListItem($proto6);

$proto0["m_fieldlist"][]=$obj;
						$proto8=array();
			$obj = new SQLField(array(
	"m_strName" => "field_name",
	"m_strTable" => "choices",
	"m_srcTableName" => "choices"
));

$proto8["m_sql"] = "field_name";
$proto8["m_srcTableName"] = "choices";
$proto8["m_expr"]=$obj;
$proto8["m_alias"] = "";
$obj = new SQLFieldListItem($proto8);

$proto0["m_fieldlist"][]=$obj;
						$proto10=array();
			$obj = new SQLField(array(
	"m_strName" => "field_values",
	"m_strTable" => "choices",
	"m_srcTableName" => "choices"
));

$proto10["m_sql"] = "field_values";
$proto10["m_srcTableName"] = "choices";
$proto10["m_expr"]=$obj;
$proto10["m_alias"] = "";
$obj = new SQLFieldListItem($proto10);

$proto0["m_fieldlist"][]=$obj;
						$proto12=array();
			$obj = new SQLField(array(
	"m_strName" => "field_textarea",
	"m_strTable" => "choices",
	"m_srcTableName" => "choices"
));

$proto12["m_sql"] = "field_textarea";
$proto12["m_srcTableName"] = "choices";
$proto12["m_expr"]=$obj;
$proto12["m_alias"] = "";
$obj = new SQLFieldListItem($proto12);

$proto0["m_fieldlist"][]=$obj;
						$proto14=array();
			$obj = new SQLField(array(
	"m_strName" => "day_advance",
	"m_strTable" => "choices",
	"m_srcTableName" => "choices"
));

$proto14["m_sql"] = "day_advance";
$proto14["m_srcTableName"] = "choices";
$proto14["m_expr"]=$obj;
$proto14["m_alias"] = "";
$obj = new SQLFieldListItem($proto14);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto16=array();
$proto16["m_link"] = "SQLL_MAIN";
			$proto17=array();
$proto17["m_strName"] = "choices";
$proto17["m_srcTableName"] = "choices";
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
$proto16["m_srcTableName"] = "choices";
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
$proto0["m_srcTableName"]="choices";		
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_choices = createSqlQuery_choices();


	
		;

					

$tdatachoices[".sqlquery"] = $queryData_choices;



$tableEvents["choices"] = new eventsBase;
$tdatachoices[".hasEvents"] = false;

?>