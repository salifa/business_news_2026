<?php
$tdataplacard_download_pdf = array();
$tdataplacard_download_pdf[".searchableFields"] = array();
$tdataplacard_download_pdf[".ShortName"] = "placard_download_pdf";
$tdataplacard_download_pdf[".OwnerID"] = "owner_id";
$tdataplacard_download_pdf[".OriginalTable"] = "placard";


$tdataplacard_download_pdf[".pagesByType"] = my_json_decode( "{\"list\":[\"list\"],\"search\":[\"search\"]}" );
$tdataplacard_download_pdf[".originalPagesByType"] = $tdataplacard_download_pdf[".pagesByType"];
$tdataplacard_download_pdf[".pages"] = types2pages( my_json_decode( "{\"list\":[\"list\"],\"search\":[\"search\"]}" ) );
$tdataplacard_download_pdf[".originalPages"] = $tdataplacard_download_pdf[".pages"];
$tdataplacard_download_pdf[".defaultPages"] = my_json_decode( "{\"list\":\"list\",\"search\":\"search\"}" );
$tdataplacard_download_pdf[".originalDefaultPages"] = $tdataplacard_download_pdf[".defaultPages"];

//	field labels
$fieldLabelsplacard_download_pdf = array();
$fieldToolTipsplacard_download_pdf = array();
$pageTitlesplacard_download_pdf = array();
$placeHoldersplacard_download_pdf = array();

if(mlang_getcurrentlang()=="English")
{
	$fieldLabelsplacard_download_pdf["English"] = array();
	$fieldToolTipsplacard_download_pdf["English"] = array();
	$placeHoldersplacard_download_pdf["English"] = array();
	$pageTitlesplacard_download_pdf["English"] = array();
	$fieldLabelsplacard_download_pdf["English"]["id"] = "Id";
	$fieldToolTipsplacard_download_pdf["English"]["id"] = "";
	$placeHoldersplacard_download_pdf["English"]["id"] = "";
	$fieldLabelsplacard_download_pdf["English"]["subject"] = "Subject";
	$fieldToolTipsplacard_download_pdf["English"]["subject"] = "";
	$placeHoldersplacard_download_pdf["English"]["subject"] = "";
	$fieldLabelsplacard_download_pdf["English"]["placard_date"] = "Placard Date";
	$fieldToolTipsplacard_download_pdf["English"]["placard_date"] = "";
	$placeHoldersplacard_download_pdf["English"]["placard_date"] = "";
	$fieldLabelsplacard_download_pdf["English"]["owner_id"] = "Owner Id";
	$fieldToolTipsplacard_download_pdf["English"]["owner_id"] = "";
	$placeHoldersplacard_download_pdf["English"]["owner_id"] = "";
	$fieldLabelsplacard_download_pdf["English"]["publish"] = "Publish";
	$fieldToolTipsplacard_download_pdf["English"]["publish"] = "";
	$placeHoldersplacard_download_pdf["English"]["publish"] = "";
	$fieldLabelsplacard_download_pdf["English"]["companyname"] = "Companyname";
	$fieldToolTipsplacard_download_pdf["English"]["companyname"] = "";
	$placeHoldersplacard_download_pdf["English"]["companyname"] = "";
	$fieldLabelsplacard_download_pdf["English"]["name_last"] = "Name Last";
	$fieldToolTipsplacard_download_pdf["English"]["name_last"] = "";
	$placeHoldersplacard_download_pdf["English"]["name_last"] = "";
	if (count($fieldToolTipsplacard_download_pdf["English"]))
		$tdataplacard_download_pdf[".isUseToolTips"] = true;
}
if(mlang_getcurrentlang()=="Thai")
{
	$fieldLabelsplacard_download_pdf["Thai"] = array();
	$fieldToolTipsplacard_download_pdf["Thai"] = array();
	$placeHoldersplacard_download_pdf["Thai"] = array();
	$pageTitlesplacard_download_pdf["Thai"] = array();
	$fieldLabelsplacard_download_pdf["Thai"]["id"] = "item";
	$fieldToolTipsplacard_download_pdf["Thai"]["id"] = "";
	$placeHoldersplacard_download_pdf["Thai"]["id"] = "";
	$fieldLabelsplacard_download_pdf["Thai"]["subject"] = "หัวข้อ / เรื่อง";
	$fieldToolTipsplacard_download_pdf["Thai"]["subject"] = "";
	$placeHoldersplacard_download_pdf["Thai"]["subject"] = "";
	$fieldLabelsplacard_download_pdf["Thai"]["placard_date"] = "วันที่ หนังสือพิมพ์";
	$fieldToolTipsplacard_download_pdf["Thai"]["placard_date"] = "";
	$placeHoldersplacard_download_pdf["Thai"]["placard_date"] = "";
	$fieldLabelsplacard_download_pdf["Thai"]["owner_id"] = "eMail Address";
	$fieldToolTipsplacard_download_pdf["Thai"]["owner_id"] = "";
	$placeHoldersplacard_download_pdf["Thai"]["owner_id"] = "";
	$fieldLabelsplacard_download_pdf["Thai"]["publish"] = "แสดง";
	$fieldToolTipsplacard_download_pdf["Thai"]["publish"] = "";
	$placeHoldersplacard_download_pdf["Thai"]["publish"] = "";
	$fieldLabelsplacard_download_pdf["Thai"]["companyname"] = "ชื่อบริษัท / ชื่อหน่วยงาน";
	$fieldToolTipsplacard_download_pdf["Thai"]["companyname"] = "";
	$placeHoldersplacard_download_pdf["Thai"]["companyname"] = "";
	$fieldLabelsplacard_download_pdf["Thai"]["name_last"] = "ชื่อ-นามสกุลผู้ลงนาม";
	$fieldToolTipsplacard_download_pdf["Thai"]["name_last"] = "";
	$placeHoldersplacard_download_pdf["Thai"]["name_last"] = "";
	if (count($fieldToolTipsplacard_download_pdf["Thai"]))
		$tdataplacard_download_pdf[".isUseToolTips"] = true;
}


	$tdataplacard_download_pdf[".NCSearch"] = true;



$tdataplacard_download_pdf[".shortTableName"] = "placard_download_pdf";
$tdataplacard_download_pdf[".nSecOptions"] = 1;

$tdataplacard_download_pdf[".mainTableOwnerID"] = "owner_id";
$tdataplacard_download_pdf[".entityType"] = 1;
$tdataplacard_download_pdf[".connId"] = "vnnsbiz_at_192_168_1_111";


$tdataplacard_download_pdf[".strOriginalTableName"] = "placard";

	



$tdataplacard_download_pdf[".showAddInPopup"] = false;

$tdataplacard_download_pdf[".showEditInPopup"] = false;

$tdataplacard_download_pdf[".showViewInPopup"] = false;

$tdataplacard_download_pdf[".listAjax"] = false;
//	temporary
//$tdataplacard_download_pdf[".listAjax"] = false;

	$tdataplacard_download_pdf[".audit"] = true;

	$tdataplacard_download_pdf[".locking"] = false;


$pages = $tdataplacard_download_pdf[".defaultPages"];

if( $pages[PAGE_EDIT] ) {
	$tdataplacard_download_pdf[".edit"] = true;
	$tdataplacard_download_pdf[".afterEditAction"] = 0;
	$tdataplacard_download_pdf[".closePopupAfterEdit"] = 1;
	$tdataplacard_download_pdf[".afterEditActionDetTable"] = "Detail tables not found!";
}

if( $pages[PAGE_ADD] ) {
$tdataplacard_download_pdf[".add"] = true;
$tdataplacard_download_pdf[".afterAddAction"] = 0;
$tdataplacard_download_pdf[".closePopupAfterAdd"] = 1;
$tdataplacard_download_pdf[".afterAddActionDetTable"] = "Detail tables not found!";
}

if( $pages[PAGE_LIST] ) {
	$tdataplacard_download_pdf[".list"] = true;
}



$tdataplacard_download_pdf[".strSortControlSettingsJSON"] = "";




if( $pages[PAGE_VIEW] ) {
$tdataplacard_download_pdf[".view"] = true;
}

if( $pages[PAGE_IMPORT] ) {
$tdataplacard_download_pdf[".import"] = true;
}

if( $pages[PAGE_EXPORT] ) {
$tdataplacard_download_pdf[".exportTo"] = true;
}

if( $pages[PAGE_PRINT] ) {
$tdataplacard_download_pdf[".printFriendly"] = true;
}



$tdataplacard_download_pdf[".showSimpleSearchOptions"] = true; // temp fix #13449

// Allow Show/Hide Fields in GRID
$tdataplacard_download_pdf[".allowShowHideFields"] = true; // temp fix #13449
//

// Allow Fields Reordering in GRID
$tdataplacard_download_pdf[".allowFieldsReordering"] = true; // temp fix #13449
//

$tdataplacard_download_pdf[".isUseAjaxSuggest"] = true;

$tdataplacard_download_pdf[".rowHighlite"] = true;



														
														

$tdataplacard_download_pdf[".ajaxCodeSnippetAdded"] = false;

$tdataplacard_download_pdf[".buttonsAdded"] = true;

$tdataplacard_download_pdf[".addPageEvents"] = true;

// use timepicker for search panel
$tdataplacard_download_pdf[".isUseTimeForSearch"] = false;


$tdataplacard_download_pdf[".badgeColor"] = "6493EA";


$tdataplacard_download_pdf[".allSearchFields"] = array();
$tdataplacard_download_pdf[".filterFields"] = array();
$tdataplacard_download_pdf[".requiredSearchFields"] = array();

$tdataplacard_download_pdf[".googleLikeFields"] = array();
$tdataplacard_download_pdf[".googleLikeFields"][] = "id";
$tdataplacard_download_pdf[".googleLikeFields"][] = "owner_id";
$tdataplacard_download_pdf[".googleLikeFields"][] = "subject";
$tdataplacard_download_pdf[".googleLikeFields"][] = "placard_date";
$tdataplacard_download_pdf[".googleLikeFields"][] = "publish";
$tdataplacard_download_pdf[".googleLikeFields"][] = "companyname";
$tdataplacard_download_pdf[".googleLikeFields"][] = "name_last";



$tdataplacard_download_pdf[".tableType"] = "list";

$tdataplacard_download_pdf[".printerPageOrientation"] = 0;
$tdataplacard_download_pdf[".nPrinterPageScale"] = 100;

$tdataplacard_download_pdf[".nPrinterSplitRecords"] = 40;

$tdataplacard_download_pdf[".geocodingEnabled"] = false;




$tdataplacard_download_pdf[".isDisplayLoading"] = true;






$tdataplacard_download_pdf[".pageSize"] = 20;

$tdataplacard_download_pdf[".warnLeavingPages"] = true;



$tstrOrderBy = "ORDER BY id DESC";
$tdataplacard_download_pdf[".strOrderBy"] = $tstrOrderBy;

$tdataplacard_download_pdf[".orderindexes"] = array();
	$tdataplacard_download_pdf[".orderindexes"][] = array(1, (0 ? "ASC" : "DESC"), "id");



$tdataplacard_download_pdf[".sqlHead"] = "SELECT id,  owner_id,  subject,  placard_date,  publish,  companyname,  name_last";
$tdataplacard_download_pdf[".sqlFrom"] = "FROM placard";
$tdataplacard_download_pdf[".sqlWhereExpr"] = "(pdf_file1 is not null)";
$tdataplacard_download_pdf[".sqlTail"] = "";

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
$tdataplacard_download_pdf[".arrGridTabs"] = $arrGridTabs;









//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdataplacard_download_pdf[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdataplacard_download_pdf[".arrGroupsPerPage"] = $arrGPP;

$tdataplacard_download_pdf[".highlightSearchResults"] = true;

$tableKeysplacard_download_pdf = array();
$tableKeysplacard_download_pdf[] = "id";
$tdataplacard_download_pdf[".Keys"] = $tableKeysplacard_download_pdf;


$tdataplacard_download_pdf[".hideMobileList"] = array();




//	id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "id";
	$fdata["GoodName"] = "id";
	$fdata["ownerTable"] = "placard";
	$fdata["Label"] = GetFieldLabel("placard_download_pdf","id");
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


	$tdataplacard_download_pdf["id"] = $fdata;
		$tdataplacard_download_pdf[".searchableFields"][] = "id";
//	owner_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "owner_id";
	$fdata["GoodName"] = "owner_id";
	$fdata["ownerTable"] = "placard";
	$fdata["Label"] = GetFieldLabel("placard_download_pdf","owner_id");
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


	$tdataplacard_download_pdf["owner_id"] = $fdata;
		$tdataplacard_download_pdf[".searchableFields"][] = "owner_id";
//	subject
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "subject";
	$fdata["GoodName"] = "subject";
	$fdata["ownerTable"] = "placard";
	$fdata["Label"] = GetFieldLabel("placard_download_pdf","subject");
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


	$tdataplacard_download_pdf["subject"] = $fdata;
		$tdataplacard_download_pdf[".searchableFields"][] = "subject";
//	placard_date
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "placard_date";
	$fdata["GoodName"] = "placard_date";
	$fdata["ownerTable"] = "placard";
	$fdata["Label"] = GetFieldLabel("placard_download_pdf","placard_date");
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


	$tdataplacard_download_pdf["placard_date"] = $fdata;
		$tdataplacard_download_pdf[".searchableFields"][] = "placard_date";
//	publish
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "publish";
	$fdata["GoodName"] = "publish";
	$fdata["ownerTable"] = "placard";
	$fdata["Label"] = GetFieldLabel("placard_download_pdf","publish");
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


	$tdataplacard_download_pdf["publish"] = $fdata;
		$tdataplacard_download_pdf[".searchableFields"][] = "publish";
//	companyname
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
	$fdata["strName"] = "companyname";
	$fdata["GoodName"] = "companyname";
	$fdata["ownerTable"] = "placard";
	$fdata["Label"] = GetFieldLabel("placard_download_pdf","companyname");
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


	$tdataplacard_download_pdf["companyname"] = $fdata;
		$tdataplacard_download_pdf[".searchableFields"][] = "companyname";
//	name_last
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 7;
	$fdata["strName"] = "name_last";
	$fdata["GoodName"] = "name_last";
	$fdata["ownerTable"] = "placard";
	$fdata["Label"] = GetFieldLabel("placard_download_pdf","name_last");
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


	$tdataplacard_download_pdf["name_last"] = $fdata;
		$tdataplacard_download_pdf[".searchableFields"][] = "name_last";


$tables_data["placard_download_pdf"]=&$tdataplacard_download_pdf;
$field_labels["placard_download_pdf"] = &$fieldLabelsplacard_download_pdf;
$fieldToolTips["placard_download_pdf"] = &$fieldToolTipsplacard_download_pdf;
$placeHolders["placard_download_pdf"] = &$placeHoldersplacard_download_pdf;
$page_titles["placard_download_pdf"] = &$pageTitlesplacard_download_pdf;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)

//if !@TABLE.bReportCrossTab

$detailsTablesData["placard_download_pdf"] = array();
//endif

// tables which are master tables for current table (detail)
$masterTablesData["placard_download_pdf"] = array();



// -----------------end  prepare master-details data arrays ------------------------------//



require_once(getabspath("classes/sql.php"));











function createSqlQuery_placard_download_pdf()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "id,  owner_id,  subject,  placard_date,  publish,  companyname,  name_last";
$proto0["m_strFrom"] = "FROM placard";
$proto0["m_strWhere"] = "(pdf_file1 is not null)";
$proto0["m_strOrderBy"] = "ORDER BY id DESC";
	
		;
			$proto0["cipherer"] = null;
$proto2=array();
$proto2["m_sql"] = "pdf_file1 is not null";
$proto2["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "pdf_file1",
	"m_strTable" => "placard",
	"m_srcTableName" => "placard_download_pdf"
));

$proto2["m_column"]=$obj;
$proto2["m_contained"] = array();
$proto2["m_strCase"] = "is not null";
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
	"m_srcTableName" => "placard_download_pdf"
));

$proto6["m_sql"] = "id";
$proto6["m_srcTableName"] = "placard_download_pdf";
$proto6["m_expr"]=$obj;
$proto6["m_alias"] = "";
$obj = new SQLFieldListItem($proto6);

$proto0["m_fieldlist"][]=$obj;
						$proto8=array();
			$obj = new SQLField(array(
	"m_strName" => "owner_id",
	"m_strTable" => "placard",
	"m_srcTableName" => "placard_download_pdf"
));

$proto8["m_sql"] = "owner_id";
$proto8["m_srcTableName"] = "placard_download_pdf";
$proto8["m_expr"]=$obj;
$proto8["m_alias"] = "";
$obj = new SQLFieldListItem($proto8);

$proto0["m_fieldlist"][]=$obj;
						$proto10=array();
			$obj = new SQLField(array(
	"m_strName" => "subject",
	"m_strTable" => "placard",
	"m_srcTableName" => "placard_download_pdf"
));

$proto10["m_sql"] = "subject";
$proto10["m_srcTableName"] = "placard_download_pdf";
$proto10["m_expr"]=$obj;
$proto10["m_alias"] = "";
$obj = new SQLFieldListItem($proto10);

$proto0["m_fieldlist"][]=$obj;
						$proto12=array();
			$obj = new SQLField(array(
	"m_strName" => "placard_date",
	"m_strTable" => "placard",
	"m_srcTableName" => "placard_download_pdf"
));

$proto12["m_sql"] = "placard_date";
$proto12["m_srcTableName"] = "placard_download_pdf";
$proto12["m_expr"]=$obj;
$proto12["m_alias"] = "";
$obj = new SQLFieldListItem($proto12);

$proto0["m_fieldlist"][]=$obj;
						$proto14=array();
			$obj = new SQLField(array(
	"m_strName" => "publish",
	"m_strTable" => "placard",
	"m_srcTableName" => "placard_download_pdf"
));

$proto14["m_sql"] = "publish";
$proto14["m_srcTableName"] = "placard_download_pdf";
$proto14["m_expr"]=$obj;
$proto14["m_alias"] = "";
$obj = new SQLFieldListItem($proto14);

$proto0["m_fieldlist"][]=$obj;
						$proto16=array();
			$obj = new SQLField(array(
	"m_strName" => "companyname",
	"m_strTable" => "placard",
	"m_srcTableName" => "placard_download_pdf"
));

$proto16["m_sql"] = "companyname";
$proto16["m_srcTableName"] = "placard_download_pdf";
$proto16["m_expr"]=$obj;
$proto16["m_alias"] = "";
$obj = new SQLFieldListItem($proto16);

$proto0["m_fieldlist"][]=$obj;
						$proto18=array();
			$obj = new SQLField(array(
	"m_strName" => "name_last",
	"m_strTable" => "placard",
	"m_srcTableName" => "placard_download_pdf"
));

$proto18["m_sql"] = "name_last";
$proto18["m_srcTableName"] = "placard_download_pdf";
$proto18["m_expr"]=$obj;
$proto18["m_alias"] = "";
$obj = new SQLFieldListItem($proto18);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto20=array();
$proto20["m_link"] = "SQLL_MAIN";
			$proto21=array();
$proto21["m_strName"] = "placard";
$proto21["m_srcTableName"] = "placard_download_pdf";
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
$proto20["m_srcTableName"] = "placard_download_pdf";
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
	"m_srcTableName" => "placard_download_pdf"
));

$proto24["m_column"]=$obj;
$proto24["m_bAsc"] = 0;
$proto24["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto24);

$proto0["m_orderby"][]=$obj;					
$proto0["m_srcTableName"]="placard_download_pdf";		
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_placard_download_pdf = createSqlQuery_placard_download_pdf();


	
		;

							

$tdataplacard_download_pdf[".sqlquery"] = $queryData_placard_download_pdf;



include_once(getabspath("include/placard_download_pdf_events.php"));
$tableEvents["placard_download_pdf"] = new eventclass_placard_download_pdf;
$tdataplacard_download_pdf[".hasEvents"] = true;

?>