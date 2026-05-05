<?php
$tdataplacard_download = array();
$tdataplacard_download[".searchableFields"] = array();
$tdataplacard_download[".ShortName"] = "placard_download";
$tdataplacard_download[".OwnerID"] = "owner_id";
$tdataplacard_download[".OriginalTable"] = "placard";


$tdataplacard_download[".pagesByType"] = my_json_decode( "{\"list\":[\"list\"],\"search\":[\"search\"]}" );
$tdataplacard_download[".originalPagesByType"] = $tdataplacard_download[".pagesByType"];
$tdataplacard_download[".pages"] = types2pages( my_json_decode( "{\"list\":[\"list\"],\"search\":[\"search\"]}" ) );
$tdataplacard_download[".originalPages"] = $tdataplacard_download[".pages"];
$tdataplacard_download[".defaultPages"] = my_json_decode( "{\"list\":\"list\",\"search\":\"search\"}" );
$tdataplacard_download[".originalDefaultPages"] = $tdataplacard_download[".defaultPages"];

//	field labels
$fieldLabelsplacard_download = array();
$fieldToolTipsplacard_download = array();
$pageTitlesplacard_download = array();
$placeHoldersplacard_download = array();

if(mlang_getcurrentlang()=="English")
{
	$fieldLabelsplacard_download["English"] = array();
	$fieldToolTipsplacard_download["English"] = array();
	$placeHoldersplacard_download["English"] = array();
	$pageTitlesplacard_download["English"] = array();
	$fieldLabelsplacard_download["English"]["id"] = "Id";
	$fieldToolTipsplacard_download["English"]["id"] = "";
	$placeHoldersplacard_download["English"]["id"] = "";
	$fieldLabelsplacard_download["English"]["subject"] = "Subject";
	$fieldToolTipsplacard_download["English"]["subject"] = "";
	$placeHoldersplacard_download["English"]["subject"] = "";
	$fieldLabelsplacard_download["English"]["placard_date"] = "Placard Date";
	$fieldToolTipsplacard_download["English"]["placard_date"] = "";
	$placeHoldersplacard_download["English"]["placard_date"] = "";
	$fieldLabelsplacard_download["English"]["owner_id"] = "Owner Id";
	$fieldToolTipsplacard_download["English"]["owner_id"] = "";
	$placeHoldersplacard_download["English"]["owner_id"] = "";
	$fieldLabelsplacard_download["English"]["publish"] = "Publish";
	$fieldToolTipsplacard_download["English"]["publish"] = "";
	$placeHoldersplacard_download["English"]["publish"] = "";
	$fieldLabelsplacard_download["English"]["companyname"] = "Companyname";
	$fieldToolTipsplacard_download["English"]["companyname"] = "";
	$placeHoldersplacard_download["English"]["companyname"] = "";
	$fieldLabelsplacard_download["English"]["name_last"] = "Name Last";
	$fieldToolTipsplacard_download["English"]["name_last"] = "";
	$placeHoldersplacard_download["English"]["name_last"] = "";
	if (count($fieldToolTipsplacard_download["English"]))
		$tdataplacard_download[".isUseToolTips"] = true;
}
if(mlang_getcurrentlang()=="Thai")
{
	$fieldLabelsplacard_download["Thai"] = array();
	$fieldToolTipsplacard_download["Thai"] = array();
	$placeHoldersplacard_download["Thai"] = array();
	$pageTitlesplacard_download["Thai"] = array();
	$fieldLabelsplacard_download["Thai"]["id"] = "item";
	$fieldToolTipsplacard_download["Thai"]["id"] = "";
	$placeHoldersplacard_download["Thai"]["id"] = "";
	$fieldLabelsplacard_download["Thai"]["subject"] = "หัวข้อ / เรื่อง";
	$fieldToolTipsplacard_download["Thai"]["subject"] = "";
	$placeHoldersplacard_download["Thai"]["subject"] = "";
	$fieldLabelsplacard_download["Thai"]["placard_date"] = "วันที่ หนังสือพิมพ์";
	$fieldToolTipsplacard_download["Thai"]["placard_date"] = "";
	$placeHoldersplacard_download["Thai"]["placard_date"] = "";
	$fieldLabelsplacard_download["Thai"]["owner_id"] = "eMail Address";
	$fieldToolTipsplacard_download["Thai"]["owner_id"] = "";
	$placeHoldersplacard_download["Thai"]["owner_id"] = "";
	$fieldLabelsplacard_download["Thai"]["publish"] = "แสดง";
	$fieldToolTipsplacard_download["Thai"]["publish"] = "";
	$placeHoldersplacard_download["Thai"]["publish"] = "";
	$fieldLabelsplacard_download["Thai"]["companyname"] = "ชื่อบริษัท / ชื่อหน่วยงาน";
	$fieldToolTipsplacard_download["Thai"]["companyname"] = "";
	$placeHoldersplacard_download["Thai"]["companyname"] = "";
	$fieldLabelsplacard_download["Thai"]["name_last"] = "ชื่อ-นามสกุลผู้ลงนาม";
	$fieldToolTipsplacard_download["Thai"]["name_last"] = "";
	$placeHoldersplacard_download["Thai"]["name_last"] = "";
	if (count($fieldToolTipsplacard_download["Thai"]))
		$tdataplacard_download[".isUseToolTips"] = true;
}


	$tdataplacard_download[".NCSearch"] = true;



$tdataplacard_download[".shortTableName"] = "placard_download";
$tdataplacard_download[".nSecOptions"] = 1;

$tdataplacard_download[".mainTableOwnerID"] = "owner_id";
$tdataplacard_download[".entityType"] = 1;
$tdataplacard_download[".connId"] = "vnnsbiz_at_192_168_1_111";


$tdataplacard_download[".strOriginalTableName"] = "placard";

	



$tdataplacard_download[".showAddInPopup"] = false;

$tdataplacard_download[".showEditInPopup"] = false;

$tdataplacard_download[".showViewInPopup"] = false;

$tdataplacard_download[".listAjax"] = false;
//	temporary
//$tdataplacard_download[".listAjax"] = false;

	$tdataplacard_download[".audit"] = true;

	$tdataplacard_download[".locking"] = false;


$pages = $tdataplacard_download[".defaultPages"];

if( $pages[PAGE_EDIT] ) {
	$tdataplacard_download[".edit"] = true;
	$tdataplacard_download[".afterEditAction"] = 0;
	$tdataplacard_download[".closePopupAfterEdit"] = 1;
	$tdataplacard_download[".afterEditActionDetTable"] = "Detail tables not found!";
}

if( $pages[PAGE_ADD] ) {
$tdataplacard_download[".add"] = true;
$tdataplacard_download[".afterAddAction"] = 0;
$tdataplacard_download[".closePopupAfterAdd"] = 1;
$tdataplacard_download[".afterAddActionDetTable"] = "Detail tables not found!";
}

if( $pages[PAGE_LIST] ) {
	$tdataplacard_download[".list"] = true;
}



$tdataplacard_download[".strSortControlSettingsJSON"] = "";




if( $pages[PAGE_VIEW] ) {
$tdataplacard_download[".view"] = true;
}

if( $pages[PAGE_IMPORT] ) {
$tdataplacard_download[".import"] = true;
}

if( $pages[PAGE_EXPORT] ) {
$tdataplacard_download[".exportTo"] = true;
}

if( $pages[PAGE_PRINT] ) {
$tdataplacard_download[".printFriendly"] = true;
}



$tdataplacard_download[".showSimpleSearchOptions"] = true; // temp fix #13449

// Allow Show/Hide Fields in GRID
$tdataplacard_download[".allowShowHideFields"] = true; // temp fix #13449
//

// Allow Fields Reordering in GRID
$tdataplacard_download[".allowFieldsReordering"] = true; // temp fix #13449
//

$tdataplacard_download[".isUseAjaxSuggest"] = true;

$tdataplacard_download[".rowHighlite"] = true;



														
					

$tdataplacard_download[".ajaxCodeSnippetAdded"] = false;

$tdataplacard_download[".buttonsAdded"] = true;

$tdataplacard_download[".addPageEvents"] = true;

// use timepicker for search panel
$tdataplacard_download[".isUseTimeForSearch"] = false;


$tdataplacard_download[".badgeColor"] = "5F9EA0";


$tdataplacard_download[".allSearchFields"] = array();
$tdataplacard_download[".filterFields"] = array();
$tdataplacard_download[".requiredSearchFields"] = array();

$tdataplacard_download[".googleLikeFields"] = array();
$tdataplacard_download[".googleLikeFields"][] = "id";
$tdataplacard_download[".googleLikeFields"][] = "owner_id";
$tdataplacard_download[".googleLikeFields"][] = "subject";
$tdataplacard_download[".googleLikeFields"][] = "placard_date";
$tdataplacard_download[".googleLikeFields"][] = "publish";
$tdataplacard_download[".googleLikeFields"][] = "companyname";
$tdataplacard_download[".googleLikeFields"][] = "name_last";



$tdataplacard_download[".tableType"] = "list";

$tdataplacard_download[".printerPageOrientation"] = 0;
$tdataplacard_download[".nPrinterPageScale"] = 100;

$tdataplacard_download[".nPrinterSplitRecords"] = 40;

$tdataplacard_download[".geocodingEnabled"] = false;




$tdataplacard_download[".isDisplayLoading"] = true;






$tdataplacard_download[".pageSize"] = 20;

$tdataplacard_download[".warnLeavingPages"] = true;



$tstrOrderBy = "ORDER BY id DESC";
$tdataplacard_download[".strOrderBy"] = $tstrOrderBy;

$tdataplacard_download[".orderindexes"] = array();
	$tdataplacard_download[".orderindexes"][] = array(1, (0 ? "ASC" : "DESC"), "id");



$tdataplacard_download[".sqlHead"] = "SELECT id,  owner_id,  subject,  placard_date,  publish,  companyname,  name_last";
$tdataplacard_download[".sqlFrom"] = "FROM placard";
$tdataplacard_download[".sqlWhereExpr"] = "";
$tdataplacard_download[".sqlTail"] = "";

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
$tdataplacard_download[".arrGridTabs"] = $arrGridTabs;









//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdataplacard_download[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdataplacard_download[".arrGroupsPerPage"] = $arrGPP;

$tdataplacard_download[".highlightSearchResults"] = true;

$tableKeysplacard_download = array();
$tableKeysplacard_download[] = "id";
$tdataplacard_download[".Keys"] = $tableKeysplacard_download;


$tdataplacard_download[".hideMobileList"] = array();




//	id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "id";
	$fdata["GoodName"] = "id";
	$fdata["ownerTable"] = "placard";
	$fdata["Label"] = GetFieldLabel("placard_download","id");
	$fdata["FieldType"] = 3;


		$fdata["AutoInc"] = true;

	
			

		$fdata["strField"] = "id";

	
		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "id";

	
	
				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "Custom");

	
	
	
	
	
	
	
	
	
	
	
		
	
	
	
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


	$tdataplacard_download["id"] = $fdata;
		$tdataplacard_download[".searchableFields"][] = "id";
//	owner_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "owner_id";
	$fdata["GoodName"] = "owner_id";
	$fdata["ownerTable"] = "placard";
	$fdata["Label"] = GetFieldLabel("placard_download","owner_id");
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


	$tdataplacard_download["owner_id"] = $fdata;
		$tdataplacard_download[".searchableFields"][] = "owner_id";
//	subject
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "subject";
	$fdata["GoodName"] = "subject";
	$fdata["ownerTable"] = "placard";
	$fdata["Label"] = GetFieldLabel("placard_download","subject");
	$fdata["FieldType"] = 200;


	
	
			

		$fdata["strField"] = "subject";

	
		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "subject";

	
	
				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
		
	
		$vdata["NeedEncode"] = true;

	
		$vdata["truncateText"] = true;
	$vdata["NumberOfChars"] = 80;

	$fdata["ViewFormats"]["view"] = $vdata;
	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
		
	
		$vdata["NeedEncode"] = true;

	
		$vdata["truncateText"] = true;
	$vdata["NumberOfChars"] = 80;

	$fdata["ViewFormats"]["list"] = $vdata;
	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
		
	
		$vdata["NeedEncode"] = true;

	
		$vdata["truncateText"] = true;
	$vdata["NumberOfChars"] = 80;

	$fdata["ViewFormats"]["print"] = $vdata;
	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
		
	
		$vdata["NeedEncode"] = true;

	
		$vdata["truncateText"] = true;
	$vdata["NumberOfChars"] = 80;

	$fdata["ViewFormats"]["export"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Lookup wizard");

	
		$edata["weekdayMessage"] = array("message" => "", "messageType" => "Text");
	$edata["weekdays"] = "[]";


	
	

// Begin Lookup settings
				$edata["LookupType"] = 2;
	$edata["LookupTable"] = "choices";
			$edata["autoCompleteFieldsOnEdit"] = 0;
	$edata["autoCompleteFields"] = array();
		$edata["LCType"] = 0;

	
		
	$edata["LinkField"] = "field_values";
	$edata["LinkFieldType"] = 201;
	$edata["DisplayField"] = "field_values";

	

	
	$edata["LookupOrderBy"] = "";

	
	
	
	

	
	
		$edata["SelectSize"] = 1;

// End Lookup Settings


	
	
	
	
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
	$edata = array("EditFormat" => "Lookup wizard");

	
		$edata["weekdayMessage"] = array("message" => "", "messageType" => "Text");
	$edata["weekdays"] = "[]";


	
	

// Begin Lookup settings
				$edata["LookupType"] = 2;
	$edata["LookupTable"] = "choices";
			$edata["autoCompleteFieldsOnEdit"] = 0;
	$edata["autoCompleteFields"] = array();
		$edata["autoCompleteFields"][] = array('masterF'=>"content", 'lookupF'=>"field_textarea");
	$edata["LCType"] = 0;

	
		
	$edata["LinkField"] = "field_values";
	$edata["LinkFieldType"] = 201;
	$edata["DisplayField"] = "field_values";

	

	
	$edata["LookupOrderBy"] = "";

	
	
	
	

	
	
		$edata["SelectSize"] = 1;

// End Lookup Settings


	
	
	
	
			$edata["acceptFileTypes"] = ".+$";
		$edata["acceptFileTypesHtml"] = "";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
	
	
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["add"] = $edata;
	$edata = array("EditFormat" => "Lookup wizard");

	
		$edata["weekdayMessage"] = array("message" => "", "messageType" => "Text");
	$edata["weekdays"] = "[]";


	
		$eventsData = array();
	$eventsData[] = array( "name" => "subject_event", "type" => "click" );
	$edata["fieldEvents"] = $eventsData;


// Begin Lookup settings
				$edata["LookupType"] = 2;
	$edata["LookupTable"] = "choices";
			$edata["autoCompleteFieldsOnEdit"] = 0;
	$edata["autoCompleteFields"] = array();
		$edata["LCType"] = 0;

	
		
	$edata["LinkField"] = "field_values";
	$edata["LinkFieldType"] = 201;
	$edata["DisplayField"] = "field_values";

	

	
	$edata["LookupOrderBy"] = "";

	
	
	
	

	
	
		$edata["SelectSize"] = 1;

// End Lookup Settings


	
	
	
	
			$edata["acceptFileTypes"] = ".+$";
		$edata["acceptFileTypesHtml"] = "";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
	
	
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["search"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = true;




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


	$tdataplacard_download["subject"] = $fdata;
		$tdataplacard_download[".searchableFields"][] = "subject";
//	placard_date
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "placard_date";
	$fdata["GoodName"] = "placard_date";
	$fdata["ownerTable"] = "placard";
	$fdata["Label"] = GetFieldLabel("placard_download","placard_date");
	$fdata["FieldType"] = 7;


	
	
			

		$fdata["strField"] = "placard_date";

	
		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "placard_date";

	
	
				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "Long Date");

	
	
	
	
	
	
	
	
	
	
	
		
	
		$vdata["NeedEncode"] = true;

	
		$vdata["truncateText"] = true;
	$vdata["NumberOfChars"] = 80;

	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Date");

	
		$edata["weekdayMessage"] = array("message" => "Invalid week day", "messageType" => "Text");
	$edata["weekdays"] = "[]";


	
	



		$edata["IsRequired"] = true;

	
	
	
			$edata["acceptFileTypes"] = ".+$";
		$edata["acceptFileTypesHtml"] = "";

		$edata["maxNumberOfFiles"] = 1;

	
	
		$edata["DateEditType"] = 2;
	$edata["InitialYearFactor"] = 0;
	$edata["LastYearFactor"] = 10;

	
	
	
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
						$edata["validateAs"]["basicValidate"][] = "IsRequired";
		
	
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
		$fdata["filterTotalFields"] = "id";
		$fdata["filterFormat"] = "Values list";
		$fdata["showCollapsed"] = false;

		$fdata["sortValueType"] = 0;
		$fdata["numberOfVisibleItems"] = 10;

		$fdata["filterBy"] = 0;

	

	
	
//end of Filters settings


	$tdataplacard_download["placard_date"] = $fdata;
		$tdataplacard_download[".searchableFields"][] = "placard_date";
//	publish
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "publish";
	$fdata["GoodName"] = "publish";
	$fdata["ownerTable"] = "placard";
	$fdata["Label"] = GetFieldLabel("placard_download","publish");
	$fdata["FieldType"] = 129;


	
	
			

		$fdata["strField"] = "publish";

	
		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "publish";

	
	
				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
		
	
		$vdata["NeedEncode"] = true;

	
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Lookup wizard");

	
		$edata["weekdayMessage"] = array("message" => "", "messageType" => "Text");
	$edata["weekdays"] = "[]";


	
	

// Begin Lookup settings
		$edata["LookupType"] = 0;
			$edata["autoCompleteFieldsOnEdit"] = 0;
	$edata["autoCompleteFields"] = array();
		$edata["LCType"] = 0;

	
	
		$edata["LookupValues"] = array();
	$edata["LookupValues"][] = "On";
	$edata["LookupValues"][] = "Off";

	
		$edata["SelectSize"] = 1;

// End Lookup Settings


	
	
	
	
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
		$fdata["filterTotalFields"] = "id";
		$fdata["filterFormat"] = "Values list";
		$fdata["showCollapsed"] = false;

		$fdata["sortValueType"] = 0;
		$fdata["numberOfVisibleItems"] = 10;

		$fdata["filterBy"] = 0;

	

	
	
//end of Filters settings


	$tdataplacard_download["publish"] = $fdata;
		$tdataplacard_download[".searchableFields"][] = "publish";
//	companyname
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
	$fdata["strName"] = "companyname";
	$fdata["GoodName"] = "companyname";
	$fdata["ownerTable"] = "placard";
	$fdata["Label"] = GetFieldLabel("placard_download","companyname");
	$fdata["FieldType"] = 200;


	
	
			

		$fdata["strField"] = "companyname";

	
		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "companyname";

	
	
				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
		
	
		$vdata["NeedEncode"] = true;

	
	
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
			$edata["EditParams"].= " maxlength=255";

		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
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


	$tdataplacard_download["companyname"] = $fdata;
		$tdataplacard_download[".searchableFields"][] = "companyname";
//	name_last
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 7;
	$fdata["strName"] = "name_last";
	$fdata["GoodName"] = "name_last";
	$fdata["ownerTable"] = "placard";
	$fdata["Label"] = GetFieldLabel("placard_download","name_last");
	$fdata["FieldType"] = 200;


	
	
			

		$fdata["strField"] = "name_last";

	
		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "name_last";

	
	
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
			$edata["EditParams"].= " maxlength=255";

		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
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


	$tdataplacard_download["name_last"] = $fdata;
		$tdataplacard_download[".searchableFields"][] = "name_last";


$tables_data["placard_download"]=&$tdataplacard_download;
$field_labels["placard_download"] = &$fieldLabelsplacard_download;
$fieldToolTips["placard_download"] = &$fieldToolTipsplacard_download;
$placeHolders["placard_download"] = &$placeHoldersplacard_download;
$page_titles["placard_download"] = &$pageTitlesplacard_download;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)

//if !@TABLE.bReportCrossTab

$detailsTablesData["placard_download"] = array();
//endif

// tables which are master tables for current table (detail)
$masterTablesData["placard_download"] = array();



// -----------------end  prepare master-details data arrays ------------------------------//



require_once(getabspath("classes/sql.php"));











function createSqlQuery_placard_download()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "id,  owner_id,  subject,  placard_date,  publish,  companyname,  name_last";
$proto0["m_strFrom"] = "FROM placard";
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
	"m_strTable" => "placard",
	"m_srcTableName" => "placard_download"
));

$proto6["m_sql"] = "id";
$proto6["m_srcTableName"] = "placard_download";
$proto6["m_expr"]=$obj;
$proto6["m_alias"] = "";
$obj = new SQLFieldListItem($proto6);

$proto0["m_fieldlist"][]=$obj;
						$proto8=array();
			$obj = new SQLField(array(
	"m_strName" => "owner_id",
	"m_strTable" => "placard",
	"m_srcTableName" => "placard_download"
));

$proto8["m_sql"] = "owner_id";
$proto8["m_srcTableName"] = "placard_download";
$proto8["m_expr"]=$obj;
$proto8["m_alias"] = "";
$obj = new SQLFieldListItem($proto8);

$proto0["m_fieldlist"][]=$obj;
						$proto10=array();
			$obj = new SQLField(array(
	"m_strName" => "subject",
	"m_strTable" => "placard",
	"m_srcTableName" => "placard_download"
));

$proto10["m_sql"] = "subject";
$proto10["m_srcTableName"] = "placard_download";
$proto10["m_expr"]=$obj;
$proto10["m_alias"] = "";
$obj = new SQLFieldListItem($proto10);

$proto0["m_fieldlist"][]=$obj;
						$proto12=array();
			$obj = new SQLField(array(
	"m_strName" => "placard_date",
	"m_strTable" => "placard",
	"m_srcTableName" => "placard_download"
));

$proto12["m_sql"] = "placard_date";
$proto12["m_srcTableName"] = "placard_download";
$proto12["m_expr"]=$obj;
$proto12["m_alias"] = "";
$obj = new SQLFieldListItem($proto12);

$proto0["m_fieldlist"][]=$obj;
						$proto14=array();
			$obj = new SQLField(array(
	"m_strName" => "publish",
	"m_strTable" => "placard",
	"m_srcTableName" => "placard_download"
));

$proto14["m_sql"] = "publish";
$proto14["m_srcTableName"] = "placard_download";
$proto14["m_expr"]=$obj;
$proto14["m_alias"] = "";
$obj = new SQLFieldListItem($proto14);

$proto0["m_fieldlist"][]=$obj;
						$proto16=array();
			$obj = new SQLField(array(
	"m_strName" => "companyname",
	"m_strTable" => "placard",
	"m_srcTableName" => "placard_download"
));

$proto16["m_sql"] = "companyname";
$proto16["m_srcTableName"] = "placard_download";
$proto16["m_expr"]=$obj;
$proto16["m_alias"] = "";
$obj = new SQLFieldListItem($proto16);

$proto0["m_fieldlist"][]=$obj;
						$proto18=array();
			$obj = new SQLField(array(
	"m_strName" => "name_last",
	"m_strTable" => "placard",
	"m_srcTableName" => "placard_download"
));

$proto18["m_sql"] = "name_last";
$proto18["m_srcTableName"] = "placard_download";
$proto18["m_expr"]=$obj;
$proto18["m_alias"] = "";
$obj = new SQLFieldListItem($proto18);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto20=array();
$proto20["m_link"] = "SQLL_MAIN";
			$proto21=array();
$proto21["m_strName"] = "placard";
$proto21["m_srcTableName"] = "placard_download";
$proto21["m_columns"] = array();
$proto21["m_columns"][] = "id";
$proto21["m_columns"][] = "owner_id";
$proto21["m_columns"][] = "publish";
$proto21["m_columns"][] = "subject";
$proto21["m_columns"][] = "content";
$proto21["m_columns"][] = "companyname";
$proto21["m_columns"][] = "count";
$proto21["m_columns"][] = "placard_to";
$proto21["m_columns"][] = "meeting_date";
$proto21["m_columns"][] = "meeting_time";
$proto21["m_columns"][] = "meeting_place";
$proto21["m_columns"][] = "placard_date";
$proto21["m_columns"][] = "name_prefix";
$proto21["m_columns"][] = "name_last";
$proto21["m_columns"][] = "position";
$proto21["m_columns"][] = "uuid";
$proto21["m_columns"][] = "create_date";
$proto21["m_columns"][] = "image1";
$proto21["m_columns"][] = "pdf_file1";
$proto21["m_columns"][] = "pdf_image_url";
$obj = new SQLTable($proto21);

$proto20["m_table"] = $obj;
$proto20["m_sql"] = "placard";
$proto20["m_alias"] = "";
$proto20["m_srcTableName"] = "placard_download";
$proto22=array();
$proto22["m_sql"] = "";
$proto22["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto22["m_column"]=$obj;
$proto22["m_contained"] = array();
$proto22["m_strCase"] = "";
$proto22["m_havingmode"] = false;
$proto22["m_inBrackets"] = false;
$proto22["m_useAlias"] = false;
$obj = new SQLLogicalExpr($proto22);

$proto20["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto20);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
												$proto24=array();
						$obj = new SQLField(array(
	"m_strName" => "id",
	"m_strTable" => "placard",
	"m_srcTableName" => "placard_download"
));

$proto24["m_column"]=$obj;
$proto24["m_bAsc"] = 0;
$proto24["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto24);

$proto0["m_orderby"][]=$obj;					
$proto0["m_srcTableName"]="placard_download";		
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_placard_download = createSqlQuery_placard_download();


	
		;

							

$tdataplacard_download[".sqlquery"] = $queryData_placard_download;



include_once(getabspath("include/placard_download_events.php"));
$tableEvents["placard_download"] = new eventclass_placard_download;
$tdataplacard_download[".hasEvents"] = true;

?>