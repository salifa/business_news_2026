<?php
$tdataads_image = array();
$tdataads_image[".searchableFields"] = array();
$tdataads_image[".ShortName"] = "ads_image";
$tdataads_image[".OwnerID"] = "";
$tdataads_image[".OriginalTable"] = "ads_image";


$tdataads_image[".pagesByType"] = my_json_decode( "{\"add\":[\"add\"],\"edit\":[\"edit\"],\"export\":[\"export\"],\"import\":[\"import\"],\"list\":[\"list\"],\"print\":[\"print\"],\"search\":[\"search\"],\"view\":[\"view\"]}" );
$tdataads_image[".originalPagesByType"] = $tdataads_image[".pagesByType"];
$tdataads_image[".pages"] = types2pages( my_json_decode( "{\"add\":[\"add\"],\"edit\":[\"edit\"],\"export\":[\"export\"],\"import\":[\"import\"],\"list\":[\"list\"],\"print\":[\"print\"],\"search\":[\"search\"],\"view\":[\"view\"]}" ) );
$tdataads_image[".originalPages"] = $tdataads_image[".pages"];
$tdataads_image[".defaultPages"] = my_json_decode( "{\"add\":\"add\",\"edit\":\"edit\",\"export\":\"export\",\"import\":\"import\",\"list\":\"list\",\"print\":\"print\",\"search\":\"search\",\"view\":\"view\"}" );
$tdataads_image[".originalDefaultPages"] = $tdataads_image[".defaultPages"];

//	field labels
$fieldLabelsads_image = array();
$fieldToolTipsads_image = array();
$pageTitlesads_image = array();
$placeHoldersads_image = array();

if(mlang_getcurrentlang()=="English")
{
	$fieldLabelsads_image["English"] = array();
	$fieldToolTipsads_image["English"] = array();
	$placeHoldersads_image["English"] = array();
	$pageTitlesads_image["English"] = array();
	$fieldLabelsads_image["English"]["id"] = "Id";
	$fieldToolTipsads_image["English"]["id"] = "";
	$placeHoldersads_image["English"]["id"] = "";
	$fieldLabelsads_image["English"]["ads_image"] = "Ads Image";
	$fieldToolTipsads_image["English"]["ads_image"] = "";
	$placeHoldersads_image["English"]["ads_image"] = "";
	$fieldLabelsads_image["English"]["promote_status"] = "Promote Status";
	$fieldToolTipsads_image["English"]["promote_status"] = "";
	$placeHoldersads_image["English"]["promote_status"] = "";
	$fieldLabelsads_image["English"]["date_promote"] = "Date Promote";
	$fieldToolTipsads_image["English"]["date_promote"] = "";
	$placeHoldersads_image["English"]["date_promote"] = "";
	$fieldLabelsads_image["English"]["position"] = "Position";
	$fieldToolTipsads_image["English"]["position"] = "";
	$placeHoldersads_image["English"]["position"] = "";
	if (count($fieldToolTipsads_image["English"]))
		$tdataads_image[".isUseToolTips"] = true;
}
if(mlang_getcurrentlang()=="Thai")
{
	$fieldLabelsads_image["Thai"] = array();
	$fieldToolTipsads_image["Thai"] = array();
	$placeHoldersads_image["Thai"] = array();
	$pageTitlesads_image["Thai"] = array();
	$fieldLabelsads_image["Thai"]["id"] = "Id";
	$fieldToolTipsads_image["Thai"]["id"] = "";
	$placeHoldersads_image["Thai"]["id"] = "";
	$fieldLabelsads_image["Thai"]["ads_image"] = "Ads Image";
	$fieldToolTipsads_image["Thai"]["ads_image"] = "";
	$placeHoldersads_image["Thai"]["ads_image"] = "";
	$fieldLabelsads_image["Thai"]["promote_status"] = "Promote Status";
	$fieldToolTipsads_image["Thai"]["promote_status"] = "";
	$placeHoldersads_image["Thai"]["promote_status"] = "";
	$fieldLabelsads_image["Thai"]["date_promote"] = "Date Promote";
	$fieldToolTipsads_image["Thai"]["date_promote"] = "";
	$placeHoldersads_image["Thai"]["date_promote"] = "";
	$fieldLabelsads_image["Thai"]["position"] = "Position";
	$fieldToolTipsads_image["Thai"]["position"] = "";
	$placeHoldersads_image["Thai"]["position"] = "";
	if (count($fieldToolTipsads_image["Thai"]))
		$tdataads_image[".isUseToolTips"] = true;
}


	$tdataads_image[".NCSearch"] = true;



$tdataads_image[".shortTableName"] = "ads_image";
$tdataads_image[".nSecOptions"] = 0;

$tdataads_image[".mainTableOwnerID"] = "";
$tdataads_image[".entityType"] = 0;
$tdataads_image[".connId"] = "vnnsbiz_at_192_168_1_111";


$tdataads_image[".strOriginalTableName"] = "ads_image";

	



$tdataads_image[".showAddInPopup"] = false;

$tdataads_image[".showEditInPopup"] = false;

$tdataads_image[".showViewInPopup"] = false;

$tdataads_image[".listAjax"] = false;
//	temporary
//$tdataads_image[".listAjax"] = false;

	$tdataads_image[".audit"] = false;

	$tdataads_image[".locking"] = false;


$pages = $tdataads_image[".defaultPages"];

if( $pages[PAGE_EDIT] ) {
	$tdataads_image[".edit"] = true;
	$tdataads_image[".afterEditAction"] = 1;
	$tdataads_image[".closePopupAfterEdit"] = 1;
	$tdataads_image[".afterEditActionDetTable"] = "";
}

if( $pages[PAGE_ADD] ) {
$tdataads_image[".add"] = true;
$tdataads_image[".afterAddAction"] = 1;
$tdataads_image[".closePopupAfterAdd"] = 1;
$tdataads_image[".afterAddActionDetTable"] = "";
}

if( $pages[PAGE_LIST] ) {
	$tdataads_image[".list"] = true;
}



$tdataads_image[".strSortControlSettingsJSON"] = "";




if( $pages[PAGE_VIEW] ) {
$tdataads_image[".view"] = true;
}

if( $pages[PAGE_IMPORT] ) {
$tdataads_image[".import"] = true;
}

if( $pages[PAGE_EXPORT] ) {
$tdataads_image[".exportTo"] = true;
}

if( $pages[PAGE_PRINT] ) {
$tdataads_image[".printFriendly"] = true;
}



$tdataads_image[".showSimpleSearchOptions"] = true; // temp fix #13449

// Allow Show/Hide Fields in GRID
$tdataads_image[".allowShowHideFields"] = true; // temp fix #13449
//

// Allow Fields Reordering in GRID
$tdataads_image[".allowFieldsReordering"] = true; // temp fix #13449
//

$tdataads_image[".isUseAjaxSuggest"] = true;

$tdataads_image[".rowHighlite"] = true;



																					

$tdataads_image[".ajaxCodeSnippetAdded"] = false;

$tdataads_image[".buttonsAdded"] = false;

$tdataads_image[".addPageEvents"] = false;

// use timepicker for search panel
$tdataads_image[".isUseTimeForSearch"] = false;


$tdataads_image[".badgeColor"] = "9ACD32";


$tdataads_image[".allSearchFields"] = array();
$tdataads_image[".filterFields"] = array();
$tdataads_image[".requiredSearchFields"] = array();

$tdataads_image[".googleLikeFields"] = array();
$tdataads_image[".googleLikeFields"][] = "id";
$tdataads_image[".googleLikeFields"][] = "ads_image";
$tdataads_image[".googleLikeFields"][] = "promote_status";
$tdataads_image[".googleLikeFields"][] = "date_promote";
$tdataads_image[".googleLikeFields"][] = "position";



$tdataads_image[".tableType"] = "list";

$tdataads_image[".printerPageOrientation"] = 0;
$tdataads_image[".nPrinterPageScale"] = 100;

$tdataads_image[".nPrinterSplitRecords"] = 40;

$tdataads_image[".geocodingEnabled"] = false;










$tdataads_image[".pageSize"] = 20;

$tdataads_image[".warnLeavingPages"] = true;



$tstrOrderBy = "";
$tdataads_image[".strOrderBy"] = $tstrOrderBy;

$tdataads_image[".orderindexes"] = array();


$tdataads_image[".sqlHead"] = "SELECT id,  	ads_image,  	promote_status,  	date_promote,  	`position`";
$tdataads_image[".sqlFrom"] = "FROM ads_image";
$tdataads_image[".sqlWhereExpr"] = "";
$tdataads_image[".sqlTail"] = "";










//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdataads_image[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdataads_image[".arrGroupsPerPage"] = $arrGPP;

$tdataads_image[".highlightSearchResults"] = true;

$tableKeysads_image = array();
$tableKeysads_image[] = "id";
$tdataads_image[".Keys"] = $tableKeysads_image;


$tdataads_image[".hideMobileList"] = array();




//	id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "id";
	$fdata["GoodName"] = "id";
	$fdata["ownerTable"] = "ads_image";
	$fdata["Label"] = GetFieldLabel("ads_image","id");
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


	$tdataads_image["id"] = $fdata;
		$tdataads_image[".searchableFields"][] = "id";
//	ads_image
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "ads_image";
	$fdata["GoodName"] = "ads_image";
	$fdata["ownerTable"] = "ads_image";
	$fdata["Label"] = GetFieldLabel("ads_image","ads_image");
	$fdata["FieldType"] = 200;


	
	
			

		$fdata["strField"] = "ads_image";

		$fdata["sourceSingle"] = "ads_image";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "ads_image";

	
	
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


	$tdataads_image["ads_image"] = $fdata;
		$tdataads_image[".searchableFields"][] = "ads_image";
//	promote_status
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "promote_status";
	$fdata["GoodName"] = "promote_status";
	$fdata["ownerTable"] = "ads_image";
	$fdata["Label"] = GetFieldLabel("ads_image","promote_status");
	$fdata["FieldType"] = 200;


	
	
			

		$fdata["strField"] = "promote_status";

		$fdata["sourceSingle"] = "promote_status";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "promote_status";

	
	
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


	$tdataads_image["promote_status"] = $fdata;
		$tdataads_image[".searchableFields"][] = "promote_status";
//	date_promote
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "date_promote";
	$fdata["GoodName"] = "date_promote";
	$fdata["ownerTable"] = "ads_image";
	$fdata["Label"] = GetFieldLabel("ads_image","date_promote");
	$fdata["FieldType"] = 7;


	
	
			

		$fdata["strField"] = "date_promote";

		$fdata["sourceSingle"] = "date_promote";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "date_promote";

	
	
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

	$edata = array("EditFormat" => "Date");

	
		$edata["weekdayMessage"] = array("message" => "", "messageType" => "Text");
	$edata["weekdays"] = "[]";


	
	



	
	
	
	
			$edata["acceptFileTypes"] = ".+$";
		$edata["acceptFileTypesHtml"] = "";

		$edata["maxNumberOfFiles"] = 1;

	
	
		$edata["DateEditType"] = 13;
	$edata["InitialYearFactor"] = 0;
	$edata["LastYearFactor"] = 10;

	
	
	
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


	$tdataads_image["date_promote"] = $fdata;
		$tdataads_image[".searchableFields"][] = "date_promote";
//	position
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "position";
	$fdata["GoodName"] = "position";
	$fdata["ownerTable"] = "ads_image";
	$fdata["Label"] = GetFieldLabel("ads_image","position");
	$fdata["FieldType"] = 200;


	
	
			

		$fdata["strField"] = "position";

		$fdata["sourceSingle"] = "position";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "`position`";

	
	
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


	$tdataads_image["position"] = $fdata;
		$tdataads_image[".searchableFields"][] = "position";


$tables_data["ads_image"]=&$tdataads_image;
$field_labels["ads_image"] = &$fieldLabelsads_image;
$fieldToolTips["ads_image"] = &$fieldToolTipsads_image;
$placeHolders["ads_image"] = &$placeHoldersads_image;
$page_titles["ads_image"] = &$pageTitlesads_image;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)

//if !@TABLE.bReportCrossTab

$detailsTablesData["ads_image"] = array();
//endif

// tables which are master tables for current table (detail)
$masterTablesData["ads_image"] = array();



// -----------------end  prepare master-details data arrays ------------------------------//



require_once(getabspath("classes/sql.php"));











function createSqlQuery_ads_image()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "id,  	ads_image,  	promote_status,  	date_promote,  	`position`";
$proto0["m_strFrom"] = "FROM ads_image";
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
	"m_strTable" => "ads_image",
	"m_srcTableName" => "ads_image"
));

$proto6["m_sql"] = "id";
$proto6["m_srcTableName"] = "ads_image";
$proto6["m_expr"]=$obj;
$proto6["m_alias"] = "";
$obj = new SQLFieldListItem($proto6);

$proto0["m_fieldlist"][]=$obj;
						$proto8=array();
			$obj = new SQLField(array(
	"m_strName" => "ads_image",
	"m_strTable" => "ads_image",
	"m_srcTableName" => "ads_image"
));

$proto8["m_sql"] = "ads_image";
$proto8["m_srcTableName"] = "ads_image";
$proto8["m_expr"]=$obj;
$proto8["m_alias"] = "";
$obj = new SQLFieldListItem($proto8);

$proto0["m_fieldlist"][]=$obj;
						$proto10=array();
			$obj = new SQLField(array(
	"m_strName" => "promote_status",
	"m_strTable" => "ads_image",
	"m_srcTableName" => "ads_image"
));

$proto10["m_sql"] = "promote_status";
$proto10["m_srcTableName"] = "ads_image";
$proto10["m_expr"]=$obj;
$proto10["m_alias"] = "";
$obj = new SQLFieldListItem($proto10);

$proto0["m_fieldlist"][]=$obj;
						$proto12=array();
			$obj = new SQLField(array(
	"m_strName" => "date_promote",
	"m_strTable" => "ads_image",
	"m_srcTableName" => "ads_image"
));

$proto12["m_sql"] = "date_promote";
$proto12["m_srcTableName"] = "ads_image";
$proto12["m_expr"]=$obj;
$proto12["m_alias"] = "";
$obj = new SQLFieldListItem($proto12);

$proto0["m_fieldlist"][]=$obj;
						$proto14=array();
			$obj = new SQLField(array(
	"m_strName" => "position",
	"m_strTable" => "ads_image",
	"m_srcTableName" => "ads_image"
));

$proto14["m_sql"] = "`position`";
$proto14["m_srcTableName"] = "ads_image";
$proto14["m_expr"]=$obj;
$proto14["m_alias"] = "";
$obj = new SQLFieldListItem($proto14);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto16=array();
$proto16["m_link"] = "SQLL_MAIN";
			$proto17=array();
$proto17["m_strName"] = "ads_image";
$proto17["m_srcTableName"] = "ads_image";
$proto17["m_columns"] = array();
$proto17["m_columns"][] = "id";
$proto17["m_columns"][] = "ads_image";
$proto17["m_columns"][] = "promote_status";
$proto17["m_columns"][] = "date_promote";
$proto17["m_columns"][] = "position";
$obj = new SQLTable($proto17);

$proto16["m_table"] = $obj;
$proto16["m_sql"] = "ads_image";
$proto16["m_alias"] = "";
$proto16["m_srcTableName"] = "ads_image";
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
$proto0["m_srcTableName"]="ads_image";		
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_ads_image = createSqlQuery_ads_image();


	
		;

					

$tdataads_image[".sqlquery"] = $queryData_ads_image;



$tableEvents["ads_image"] = new eventsBase;
$tdataads_image[".hasEvents"] = false;

?>