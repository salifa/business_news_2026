<?php
$tdataplacardpdf = array();
$tdataplacardpdf[".searchableFields"] = array();
$tdataplacardpdf[".ShortName"] = "placardpdf";
$tdataplacardpdf[".OwnerID"] = "owner_id";
$tdataplacardpdf[".OriginalTable"] = "placard";


$tdataplacardpdf[".pagesByType"] = my_json_decode( "{\"add\":[\"Create_New\",\"add\"],\"edit\":[\"edit\",\"edit1\"],\"list\":[\"list\"],\"print\":[\"print\"],\"search\":[\"search\"],\"view\":[\"view\"]}" );
$tdataplacardpdf[".originalPagesByType"] = $tdataplacardpdf[".pagesByType"];
$tdataplacardpdf[".pages"] = types2pages( my_json_decode( "{\"add\":[\"Create_New\",\"add\"],\"edit\":[\"edit\",\"edit1\"],\"list\":[\"list\"],\"print\":[\"print\"],\"search\":[\"search\"],\"view\":[\"view\"]}" ) );
$tdataplacardpdf[".originalPages"] = $tdataplacardpdf[".pages"];
$tdataplacardpdf[".defaultPages"] = my_json_decode( "{\"add\":\"Create_New\",\"edit\":\"edit\",\"list\":\"list\",\"print\":\"print\",\"search\":\"search\",\"view\":\"view\"}" );
$tdataplacardpdf[".originalDefaultPages"] = $tdataplacardpdf[".defaultPages"];

//	field labels
$fieldLabelsplacardpdf = array();
$fieldToolTipsplacardpdf = array();
$pageTitlesplacardpdf = array();
$placeHoldersplacardpdf = array();

if(mlang_getcurrentlang()=="English")
{
	$fieldLabelsplacardpdf["English"] = array();
	$fieldToolTipsplacardpdf["English"] = array();
	$placeHoldersplacardpdf["English"] = array();
	$pageTitlesplacardpdf["English"] = array();
	$fieldLabelsplacardpdf["English"]["id"] = "Id";
	$fieldToolTipsplacardpdf["English"]["id"] = "";
	$placeHoldersplacardpdf["English"]["id"] = "";
	$fieldLabelsplacardpdf["English"]["count"] = "Count";
	$fieldToolTipsplacardpdf["English"]["count"] = "";
	$placeHoldersplacardpdf["English"]["count"] = "";
	$fieldLabelsplacardpdf["English"]["placard_to"] = "Placard To";
	$fieldToolTipsplacardpdf["English"]["placard_to"] = "";
	$placeHoldersplacardpdf["English"]["placard_to"] = "";
	$fieldLabelsplacardpdf["English"]["meeting_date"] = "Meeting Date";
	$fieldToolTipsplacardpdf["English"]["meeting_date"] = "";
	$placeHoldersplacardpdf["English"]["meeting_date"] = "";
	$fieldLabelsplacardpdf["English"]["meeting_time"] = "Meeting Time";
	$fieldToolTipsplacardpdf["English"]["meeting_time"] = "";
	$placeHoldersplacardpdf["English"]["meeting_time"] = "";
	$fieldLabelsplacardpdf["English"]["name_prefix"] = "Name Prefix";
	$fieldToolTipsplacardpdf["English"]["name_prefix"] = "";
	$placeHoldersplacardpdf["English"]["name_prefix"] = "";
	$fieldLabelsplacardpdf["English"]["name_last"] = "Name Last";
	$fieldToolTipsplacardpdf["English"]["name_last"] = "";
	$placeHoldersplacardpdf["English"]["name_last"] = "";
	$fieldLabelsplacardpdf["English"]["position"] = "Position";
	$fieldToolTipsplacardpdf["English"]["position"] = "";
	$placeHoldersplacardpdf["English"]["position"] = "";
	$fieldLabelsplacardpdf["English"]["owner_id"] = "Owner Id";
	$fieldToolTipsplacardpdf["English"]["owner_id"] = "";
	$placeHoldersplacardpdf["English"]["owner_id"] = "";
	$fieldLabelsplacardpdf["English"]["publish"] = "Publish";
	$fieldToolTipsplacardpdf["English"]["publish"] = "";
	$placeHoldersplacardpdf["English"]["publish"] = "";
	$fieldLabelsplacardpdf["English"]["tdate"] = "Tdate";
	$fieldToolTipsplacardpdf["English"]["tdate"] = "";
	$placeHoldersplacardpdf["English"]["tdate"] = "";
	$fieldLabelsplacardpdf["English"]["image1"] = "Image1";
	$fieldToolTipsplacardpdf["English"]["image1"] = "";
	$placeHoldersplacardpdf["English"]["image1"] = "";
	$fieldLabelsplacardpdf["English"]["pdf_file1"] = "Pdf File1";
	$fieldToolTipsplacardpdf["English"]["pdf_file1"] = "";
	$placeHoldersplacardpdf["English"]["pdf_file1"] = "";
	$fieldLabelsplacardpdf["English"]["companyname"] = "Companyname";
	$fieldToolTipsplacardpdf["English"]["companyname"] = "";
	$placeHoldersplacardpdf["English"]["companyname"] = "";
	$fieldLabelsplacardpdf["English"]["placard_date"] = "Placard Date";
	$fieldToolTipsplacardpdf["English"]["placard_date"] = "";
	$placeHoldersplacardpdf["English"]["placard_date"] = "";
	if (count($fieldToolTipsplacardpdf["English"]))
		$tdataplacardpdf[".isUseToolTips"] = true;
}
if(mlang_getcurrentlang()=="Thai")
{
	$fieldLabelsplacardpdf["Thai"] = array();
	$fieldToolTipsplacardpdf["Thai"] = array();
	$placeHoldersplacardpdf["Thai"] = array();
	$pageTitlesplacardpdf["Thai"] = array();
	$fieldLabelsplacardpdf["Thai"]["id"] = "Id";
	$fieldToolTipsplacardpdf["Thai"]["id"] = "";
	$placeHoldersplacardpdf["Thai"]["id"] = "";
	$fieldLabelsplacardpdf["Thai"]["count"] = "ครั้งที่ประชุม";
	$fieldToolTipsplacardpdf["Thai"]["count"] = "";
	$placeHoldersplacardpdf["Thai"]["count"] = "";
	$fieldLabelsplacardpdf["Thai"]["placard_to"] = "ประกาศถึง";
	$fieldToolTipsplacardpdf["Thai"]["placard_to"] = "";
	$placeHoldersplacardpdf["Thai"]["placard_to"] = "";
	$fieldLabelsplacardpdf["Thai"]["meeting_date"] = "วันที่จัดประชุม";
	$fieldToolTipsplacardpdf["Thai"]["meeting_date"] = "";
	$placeHoldersplacardpdf["Thai"]["meeting_date"] = "";
	$fieldLabelsplacardpdf["Thai"]["meeting_time"] = "เวลาจัดประชุม";
	$fieldToolTipsplacardpdf["Thai"]["meeting_time"] = "";
	$placeHoldersplacardpdf["Thai"]["meeting_time"] = "";
	$fieldLabelsplacardpdf["Thai"]["name_prefix"] = "คำนำหน้าชื่อ";
	$fieldToolTipsplacardpdf["Thai"]["name_prefix"] = "";
	$placeHoldersplacardpdf["Thai"]["name_prefix"] = "";
	$fieldLabelsplacardpdf["Thai"]["name_last"] = "ชื่อ-นามสกุล";
	$fieldToolTipsplacardpdf["Thai"]["name_last"] = "";
	$placeHoldersplacardpdf["Thai"]["name_last"] = "";
	$fieldLabelsplacardpdf["Thai"]["position"] = "ตำแหน่งผู้ลงนาม";
	$fieldToolTipsplacardpdf["Thai"]["position"] = "";
	$placeHoldersplacardpdf["Thai"]["position"] = "";
	$fieldLabelsplacardpdf["Thai"]["owner_id"] = "Owner Id";
	$fieldToolTipsplacardpdf["Thai"]["owner_id"] = "";
	$placeHoldersplacardpdf["Thai"]["owner_id"] = "";
	$fieldLabelsplacardpdf["Thai"]["publish"] = "แสดง";
	$fieldToolTipsplacardpdf["Thai"]["publish"] = "";
	$placeHoldersplacardpdf["Thai"]["publish"] = "";
	$fieldLabelsplacardpdf["Thai"]["tdate"] = "Tdate";
	$fieldToolTipsplacardpdf["Thai"]["tdate"] = "";
	$placeHoldersplacardpdf["Thai"]["tdate"] = "";
	$fieldLabelsplacardpdf["Thai"]["image1"] = "ภาพหน้าแรก";
	$fieldToolTipsplacardpdf["Thai"]["image1"] = "";
	$placeHoldersplacardpdf["Thai"]["image1"] = "";
	$fieldLabelsplacardpdf["Thai"]["pdf_file1"] = "Pdf File1";
	$fieldToolTipsplacardpdf["Thai"]["pdf_file1"] = "";
	$placeHoldersplacardpdf["Thai"]["pdf_file1"] = "";
	$fieldLabelsplacardpdf["Thai"]["companyname"] = "ชื่อบริษัท / ชื่อหน่วยงาน";
	$fieldToolTipsplacardpdf["Thai"]["companyname"] = "";
	$placeHoldersplacardpdf["Thai"]["companyname"] = "";
	$fieldLabelsplacardpdf["Thai"]["placard_date"] = "วันที่ลงโฆษณา";
	$fieldToolTipsplacardpdf["Thai"]["placard_date"] = "";
	$placeHoldersplacardpdf["Thai"]["placard_date"] = "";
	if (count($fieldToolTipsplacardpdf["Thai"]))
		$tdataplacardpdf[".isUseToolTips"] = true;
}


	$tdataplacardpdf[".NCSearch"] = true;



$tdataplacardpdf[".shortTableName"] = "placardpdf";
$tdataplacardpdf[".nSecOptions"] = 1;

$tdataplacardpdf[".mainTableOwnerID"] = "owner_id";
$tdataplacardpdf[".entityType"] = 1;
$tdataplacardpdf[".connId"] = "vnnsbiz_at_192_168_1_111";


$tdataplacardpdf[".strOriginalTableName"] = "placard";

	



$tdataplacardpdf[".showAddInPopup"] = false;

$tdataplacardpdf[".showEditInPopup"] = false;

$tdataplacardpdf[".showViewInPopup"] = false;

$tdataplacardpdf[".listAjax"] = false;
//	temporary
//$tdataplacardpdf[".listAjax"] = false;

	$tdataplacardpdf[".audit"] = true;

	$tdataplacardpdf[".locking"] = false;


$pages = $tdataplacardpdf[".defaultPages"];

if( $pages[PAGE_EDIT] ) {
	$tdataplacardpdf[".edit"] = true;
	$tdataplacardpdf[".afterEditAction"] = 0;
	$tdataplacardpdf[".closePopupAfterEdit"] = 1;
	$tdataplacardpdf[".afterEditActionDetTable"] = "Detail tables not found!";
}

if( $pages[PAGE_ADD] ) {
$tdataplacardpdf[".add"] = true;
$tdataplacardpdf[".afterAddAction"] = 0;
$tdataplacardpdf[".closePopupAfterAdd"] = 1;
$tdataplacardpdf[".afterAddActionDetTable"] = "Detail tables not found!";
}

if( $pages[PAGE_LIST] ) {
	$tdataplacardpdf[".list"] = true;
}



$tdataplacardpdf[".strSortControlSettingsJSON"] = "";




if( $pages[PAGE_VIEW] ) {
$tdataplacardpdf[".view"] = true;
}

if( $pages[PAGE_IMPORT] ) {
$tdataplacardpdf[".import"] = true;
}

if( $pages[PAGE_EXPORT] ) {
$tdataplacardpdf[".exportTo"] = true;
}

if( $pages[PAGE_PRINT] ) {
$tdataplacardpdf[".printFriendly"] = true;
}



$tdataplacardpdf[".showSimpleSearchOptions"] = true; // temp fix #13449

// Allow Show/Hide Fields in GRID
$tdataplacardpdf[".allowShowHideFields"] = true; // temp fix #13449
//

// Allow Fields Reordering in GRID
$tdataplacardpdf[".allowFieldsReordering"] = true; // temp fix #13449
//

$tdataplacardpdf[".isUseAjaxSuggest"] = true;

$tdataplacardpdf[".rowHighlite"] = true;



								
																				

$tdataplacardpdf[".ajaxCodeSnippetAdded"] = false;

$tdataplacardpdf[".buttonsAdded"] = true;

$tdataplacardpdf[".addPageEvents"] = true;

// use timepicker for search panel
$tdataplacardpdf[".isUseTimeForSearch"] = true;


$tdataplacardpdf[".badgeColor"] = "4682b4";


$tdataplacardpdf[".allSearchFields"] = array();
$tdataplacardpdf[".filterFields"] = array();
$tdataplacardpdf[".requiredSearchFields"] = array();

$tdataplacardpdf[".googleLikeFields"] = array();
$tdataplacardpdf[".googleLikeFields"][] = "id";
$tdataplacardpdf[".googleLikeFields"][] = "owner_id";
$tdataplacardpdf[".googleLikeFields"][] = "publish";
$tdataplacardpdf[".googleLikeFields"][] = "count";
$tdataplacardpdf[".googleLikeFields"][] = "placard_to";
$tdataplacardpdf[".googleLikeFields"][] = "meeting_date";
$tdataplacardpdf[".googleLikeFields"][] = "meeting_time";
$tdataplacardpdf[".googleLikeFields"][] = "name_prefix";
$tdataplacardpdf[".googleLikeFields"][] = "name_last";
$tdataplacardpdf[".googleLikeFields"][] = "position";
$tdataplacardpdf[".googleLikeFields"][] = "tdate";
$tdataplacardpdf[".googleLikeFields"][] = "image1";
$tdataplacardpdf[".googleLikeFields"][] = "pdf_file1";
$tdataplacardpdf[".googleLikeFields"][] = "companyname";
$tdataplacardpdf[".googleLikeFields"][] = "placard_date";



$tdataplacardpdf[".tableType"] = "list";

$tdataplacardpdf[".printerPageOrientation"] = 0;
$tdataplacardpdf[".nPrinterPageScale"] = 100;

$tdataplacardpdf[".nPrinterSplitRecords"] = 40;

$tdataplacardpdf[".geocodingEnabled"] = false;




$tdataplacardpdf[".isDisplayLoading"] = true;






$tdataplacardpdf[".pageSize"] = 20;

$tdataplacardpdf[".warnLeavingPages"] = true;



$tstrOrderBy = "ORDER BY id DESC";
$tdataplacardpdf[".strOrderBy"] = $tstrOrderBy;

$tdataplacardpdf[".orderindexes"] = array();
	$tdataplacardpdf[".orderindexes"][] = array(1, (0 ? "ASC" : "DESC"), "id");



$tdataplacardpdf[".sqlHead"] = "SELECT id,  owner_id,  publish,  `count`,  placard_to,  meeting_date,  meeting_time,  name_prefix,  name_last,  `position`,  concat(DAY(placard_date), ' ', Thaimonth(month(placard_date)), ' ', (year(placard_date)+543)) AS tdate,  image1,  pdf_file1,  companyname,  placard_date";
$tdataplacardpdf[".sqlFrom"] = "FROM placard";
$tdataplacardpdf[".sqlWhereExpr"] = "";
$tdataplacardpdf[".sqlTail"] = "";

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
$tdataplacardpdf[".arrGridTabs"] = $arrGridTabs;









//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdataplacardpdf[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdataplacardpdf[".arrGroupsPerPage"] = $arrGPP;

$tdataplacardpdf[".highlightSearchResults"] = true;

$tableKeysplacardpdf = array();
$tableKeysplacardpdf[] = "id";
$tdataplacardpdf[".Keys"] = $tableKeysplacardpdf;


$tdataplacardpdf[".hideMobileList"] = array();




//	id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "id";
	$fdata["GoodName"] = "id";
	$fdata["ownerTable"] = "placard";
	$fdata["Label"] = GetFieldLabel("placardpdf","id");
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


	$tdataplacardpdf["id"] = $fdata;
		$tdataplacardpdf[".searchableFields"][] = "id";
//	owner_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "owner_id";
	$fdata["GoodName"] = "owner_id";
	$fdata["ownerTable"] = "placard";
	$fdata["Label"] = GetFieldLabel("placardpdf","owner_id");
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


	$tdataplacardpdf["owner_id"] = $fdata;
		$tdataplacardpdf[".searchableFields"][] = "owner_id";
//	publish
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "publish";
	$fdata["GoodName"] = "publish";
	$fdata["ownerTable"] = "placard";
	$fdata["Label"] = GetFieldLabel("placardpdf","publish");
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


	$tdataplacardpdf["publish"] = $fdata;
		$tdataplacardpdf[".searchableFields"][] = "publish";
//	count
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "count";
	$fdata["GoodName"] = "count";
	$fdata["ownerTable"] = "placard";
	$fdata["Label"] = GetFieldLabel("placardpdf","count");
	$fdata["FieldType"] = 200;


	
	
			

		$fdata["strField"] = "count";

	
		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "`count`";

	
	
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


	$tdataplacardpdf["count"] = $fdata;
		$tdataplacardpdf[".searchableFields"][] = "count";
//	placard_to
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "placard_to";
	$fdata["GoodName"] = "placard_to";
	$fdata["ownerTable"] = "placard";
	$fdata["Label"] = GetFieldLabel("placardpdf","placard_to");
	$fdata["FieldType"] = 200;


	
	
			

		$fdata["strField"] = "placard_to";

	
		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "placard_to";

	
	
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


	$tdataplacardpdf["placard_to"] = $fdata;
		$tdataplacardpdf[".searchableFields"][] = "placard_to";
//	meeting_date
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
	$fdata["strName"] = "meeting_date";
	$fdata["GoodName"] = "meeting_date";
	$fdata["ownerTable"] = "placard";
	$fdata["Label"] = GetFieldLabel("placardpdf","meeting_date");
	$fdata["FieldType"] = 7;


	
	
			

		$fdata["strField"] = "meeting_date";

	
		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "meeting_date";

	
	
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

	
		$edata["weekdayMessage"] = array("message" => "Invalid week day", "messageType" => "Text");
	$edata["weekdays"] = "[]";


	
	



	
	
	
	
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


	$tdataplacardpdf["meeting_date"] = $fdata;
		$tdataplacardpdf[".searchableFields"][] = "meeting_date";
//	meeting_time
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 7;
	$fdata["strName"] = "meeting_time";
	$fdata["GoodName"] = "meeting_time";
	$fdata["ownerTable"] = "placard";
	$fdata["Label"] = GetFieldLabel("placardpdf","meeting_time");
	$fdata["FieldType"] = 134;


	
	
			

		$fdata["strField"] = "meeting_time";

	
		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "meeting_time";

	
	
				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "Time");

	
	
	
	
	
	
	
	
	
	
	
		
		$vdata["timeFormatData"] = array(
		"showSeconds" => false,
		"showDaysInTotals" => false,
		"timeFormat" => 0
	);
	$vdata["timeFormatData"]["showSeconds"] = true;
	$vdata["timeFormatData"]["showDaysInTotals"] = true;

		$vdata["NeedEncode"] = true;

	
		$vdata["truncateText"] = true;
	$vdata["NumberOfChars"] = 80;

	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Time");

	
		$edata["weekdayMessage"] = array("message" => "", "messageType" => "Text");
	$edata["weekdays"] = "[]";


	
	



		$edata["IsRequired"] = true;

	
	
	
			$edata["acceptFileTypes"] = ".+$";
		$edata["acceptFileTypesHtml"] = "";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
	
		$edata["EditParams"] = "";
		
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
				$edata["validateAs"]["basicValidate"][] = getJsValidatorName("Time");
						$edata["validateAs"]["basicValidate"][] = "IsRequired";
		
	
	//	End validation

	
			
				$hours = 24;
	$edata["FormatTimeAttrs"] = array("useTimePicker" => 1,
									  "hours" => $hours,
									  "minutes" => 15,
									  "showSeconds" => 0);

	
	
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


	$tdataplacardpdf["meeting_time"] = $fdata;
		$tdataplacardpdf[".searchableFields"][] = "meeting_time";
//	name_prefix
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 8;
	$fdata["strName"] = "name_prefix";
	$fdata["GoodName"] = "name_prefix";
	$fdata["ownerTable"] = "placard";
	$fdata["Label"] = GetFieldLabel("placardpdf","name_prefix");
	$fdata["FieldType"] = 200;


	
	
			

		$fdata["strField"] = "name_prefix";

	
		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "name_prefix";

	
	
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

	$edata = array("EditFormat" => "Lookup wizard");

	
		$edata["weekdayMessage"] = array("message" => "", "messageType" => "Text");
	$edata["weekdays"] = "[]";


	
	

// Begin Lookup settings
		$edata["LookupType"] = 0;
			$edata["autoCompleteFieldsOnEdit"] = 0;
	$edata["autoCompleteFields"] = array();
		$edata["LCType"] = 0;

	
	
		$edata["LookupValues"] = array();
	$edata["LookupValues"][] = "นาย";
	$edata["LookupValues"][] = "นาง";
	$edata["LookupValues"][] = "นางสาว";

	
		$edata["SelectSize"] = 1;

// End Lookup Settings


		$edata["IsRequired"] = true;

	
	
	
			$edata["acceptFileTypes"] = ".+$";
		$edata["acceptFileTypesHtml"] = "";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
	
	
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


	$tdataplacardpdf["name_prefix"] = $fdata;
		$tdataplacardpdf[".searchableFields"][] = "name_prefix";
//	name_last
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 9;
	$fdata["strName"] = "name_last";
	$fdata["GoodName"] = "name_last";
	$fdata["ownerTable"] = "placard";
	$fdata["Label"] = GetFieldLabel("placardpdf","name_last");
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


	$tdataplacardpdf["name_last"] = $fdata;
		$tdataplacardpdf[".searchableFields"][] = "name_last";
//	position
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 10;
	$fdata["strName"] = "position";
	$fdata["GoodName"] = "position";
	$fdata["ownerTable"] = "placard";
	$fdata["Label"] = GetFieldLabel("placardpdf","position");
	$fdata["FieldType"] = 200;


	
	
			

		$fdata["strField"] = "position";

	
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


	$tdataplacardpdf["position"] = $fdata;
		$tdataplacardpdf[".searchableFields"][] = "position";
//	tdate
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 11;
	$fdata["strName"] = "tdate";
	$fdata["GoodName"] = "tdate";
	$fdata["ownerTable"] = "";
	$fdata["Label"] = GetFieldLabel("placardpdf","tdate");
	$fdata["FieldType"] = 200;


	
	
			

		$fdata["strField"] = "tdate";

	
		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "concat(DAY(placard_date), ' ', Thaimonth(month(placard_date)), ' ', (year(placard_date)+543))";

	
	
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


	$tdataplacardpdf["tdate"] = $fdata;
		$tdataplacardpdf[".searchableFields"][] = "tdate";
//	image1
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 12;
	$fdata["strName"] = "image1";
	$fdata["GoodName"] = "image1";
	$fdata["ownerTable"] = "placard";
	$fdata["Label"] = GetFieldLabel("placardpdf","image1");
	$fdata["FieldType"] = 200;


	
	
			

		$fdata["strField"] = "image1";

		$fdata["sourceSingle"] = "image1";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "image1";

	
	
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


	$tdataplacardpdf["image1"] = $fdata;
		$tdataplacardpdf[".searchableFields"][] = "image1";
//	pdf_file1
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 13;
	$fdata["strName"] = "pdf_file1";
	$fdata["GoodName"] = "pdf_file1";
	$fdata["ownerTable"] = "placard";
	$fdata["Label"] = GetFieldLabel("placardpdf","pdf_file1");
	$fdata["FieldType"] = 201;


	
	
			

		$fdata["strField"] = "pdf_file1";

		$fdata["sourceSingle"] = "pdf_file1";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "pdf_file1";

	
		$fdata["CompatibilityMode"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "Document Download");

	
	
	
						$vdata["ShowFileSize"] = true;
			$vdata["ShowIcon"] = true;
		
	
	
	
	
	
	
	
		
	
	
	
		$vdata["truncateText"] = true;
	$vdata["NumberOfChars"] = 80;

	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Document upload");

	
		$edata["weekdayMessage"] = array("message" => "", "messageType" => "Text");
	$edata["weekdays"] = "[]";


	
	



	
	
	
	
			$edata["acceptFileTypes"] = ".+$";
		$edata["acceptFileTypesHtml"] = "";

		$edata["maxNumberOfFiles"] = 0;

	
	
	
	
	
	
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


	$tdataplacardpdf["pdf_file1"] = $fdata;
		$tdataplacardpdf[".searchableFields"][] = "pdf_file1";
//	companyname
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 14;
	$fdata["strName"] = "companyname";
	$fdata["GoodName"] = "companyname";
	$fdata["ownerTable"] = "placard";
	$fdata["Label"] = GetFieldLabel("placardpdf","companyname");
	$fdata["FieldType"] = 200;


	
	
			

		$fdata["strField"] = "companyname";

		$fdata["sourceSingle"] = "companyname";

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


	$tdataplacardpdf["companyname"] = $fdata;
		$tdataplacardpdf[".searchableFields"][] = "companyname";
//	placard_date
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 15;
	$fdata["strName"] = "placard_date";
	$fdata["GoodName"] = "placard_date";
	$fdata["ownerTable"] = "placard";
	$fdata["Label"] = GetFieldLabel("placardpdf","placard_date");
	$fdata["FieldType"] = 7;


	
	
			

		$fdata["strField"] = "placard_date";

		$fdata["sourceSingle"] = "placard_date";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "placard_date";

	
	
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

	
		$edata["weekdayMessage"] = array("message" => "Invalid week day", "messageType" => "Text");
	$edata["weekdays"] = "[]";


	
		$eventsData = array();
	$eventsData[] = array( "name" => "meeting_date_event", "type" => "change" );
	$edata["fieldEvents"] = $eventsData;




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
			$fdata["filterFormat"] = "Values list";
		$fdata["showCollapsed"] = false;

		$fdata["sortValueType"] = 0;
		$fdata["numberOfVisibleItems"] = 10;

		$fdata["filterBy"] = 0;

	

	
	
//end of Filters settings


	$tdataplacardpdf["placard_date"] = $fdata;
		$tdataplacardpdf[".searchableFields"][] = "placard_date";


$tables_data["placardpdf"]=&$tdataplacardpdf;
$field_labels["placardpdf"] = &$fieldLabelsplacardpdf;
$fieldToolTips["placardpdf"] = &$fieldToolTipsplacardpdf;
$placeHolders["placardpdf"] = &$placeHoldersplacardpdf;
$page_titles["placardpdf"] = &$pageTitlesplacardpdf;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)

//if !@TABLE.bReportCrossTab

$detailsTablesData["placardpdf"] = array();
//endif

// tables which are master tables for current table (detail)
$masterTablesData["placardpdf"] = array();



// -----------------end  prepare master-details data arrays ------------------------------//



require_once(getabspath("classes/sql.php"));











function createSqlQuery_placardpdf()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "id,  owner_id,  publish,  `count`,  placard_to,  meeting_date,  meeting_time,  name_prefix,  name_last,  `position`,  concat(DAY(placard_date), ' ', Thaimonth(month(placard_date)), ' ', (year(placard_date)+543)) AS tdate,  image1,  pdf_file1,  companyname,  placard_date";
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
	"m_srcTableName" => "placardpdf"
));

$proto6["m_sql"] = "id";
$proto6["m_srcTableName"] = "placardpdf";
$proto6["m_expr"]=$obj;
$proto6["m_alias"] = "";
$obj = new SQLFieldListItem($proto6);

$proto0["m_fieldlist"][]=$obj;
						$proto8=array();
			$obj = new SQLField(array(
	"m_strName" => "owner_id",
	"m_strTable" => "placard",
	"m_srcTableName" => "placardpdf"
));

$proto8["m_sql"] = "owner_id";
$proto8["m_srcTableName"] = "placardpdf";
$proto8["m_expr"]=$obj;
$proto8["m_alias"] = "";
$obj = new SQLFieldListItem($proto8);

$proto0["m_fieldlist"][]=$obj;
						$proto10=array();
			$obj = new SQLField(array(
	"m_strName" => "publish",
	"m_strTable" => "placard",
	"m_srcTableName" => "placardpdf"
));

$proto10["m_sql"] = "publish";
$proto10["m_srcTableName"] = "placardpdf";
$proto10["m_expr"]=$obj;
$proto10["m_alias"] = "";
$obj = new SQLFieldListItem($proto10);

$proto0["m_fieldlist"][]=$obj;
						$proto12=array();
			$obj = new SQLField(array(
	"m_strName" => "count",
	"m_strTable" => "placard",
	"m_srcTableName" => "placardpdf"
));

$proto12["m_sql"] = "`count`";
$proto12["m_srcTableName"] = "placardpdf";
$proto12["m_expr"]=$obj;
$proto12["m_alias"] = "";
$obj = new SQLFieldListItem($proto12);

$proto0["m_fieldlist"][]=$obj;
						$proto14=array();
			$obj = new SQLField(array(
	"m_strName" => "placard_to",
	"m_strTable" => "placard",
	"m_srcTableName" => "placardpdf"
));

$proto14["m_sql"] = "placard_to";
$proto14["m_srcTableName"] = "placardpdf";
$proto14["m_expr"]=$obj;
$proto14["m_alias"] = "";
$obj = new SQLFieldListItem($proto14);

$proto0["m_fieldlist"][]=$obj;
						$proto16=array();
			$obj = new SQLField(array(
	"m_strName" => "meeting_date",
	"m_strTable" => "placard",
	"m_srcTableName" => "placardpdf"
));

$proto16["m_sql"] = "meeting_date";
$proto16["m_srcTableName"] = "placardpdf";
$proto16["m_expr"]=$obj;
$proto16["m_alias"] = "";
$obj = new SQLFieldListItem($proto16);

$proto0["m_fieldlist"][]=$obj;
						$proto18=array();
			$obj = new SQLField(array(
	"m_strName" => "meeting_time",
	"m_strTable" => "placard",
	"m_srcTableName" => "placardpdf"
));

$proto18["m_sql"] = "meeting_time";
$proto18["m_srcTableName"] = "placardpdf";
$proto18["m_expr"]=$obj;
$proto18["m_alias"] = "";
$obj = new SQLFieldListItem($proto18);

$proto0["m_fieldlist"][]=$obj;
						$proto20=array();
			$obj = new SQLField(array(
	"m_strName" => "name_prefix",
	"m_strTable" => "placard",
	"m_srcTableName" => "placardpdf"
));

$proto20["m_sql"] = "name_prefix";
$proto20["m_srcTableName"] = "placardpdf";
$proto20["m_expr"]=$obj;
$proto20["m_alias"] = "";
$obj = new SQLFieldListItem($proto20);

$proto0["m_fieldlist"][]=$obj;
						$proto22=array();
			$obj = new SQLField(array(
	"m_strName" => "name_last",
	"m_strTable" => "placard",
	"m_srcTableName" => "placardpdf"
));

$proto22["m_sql"] = "name_last";
$proto22["m_srcTableName"] = "placardpdf";
$proto22["m_expr"]=$obj;
$proto22["m_alias"] = "";
$obj = new SQLFieldListItem($proto22);

$proto0["m_fieldlist"][]=$obj;
						$proto24=array();
			$obj = new SQLField(array(
	"m_strName" => "position",
	"m_strTable" => "placard",
	"m_srcTableName" => "placardpdf"
));

$proto24["m_sql"] = "`position`";
$proto24["m_srcTableName"] = "placardpdf";
$proto24["m_expr"]=$obj;
$proto24["m_alias"] = "";
$obj = new SQLFieldListItem($proto24);

$proto0["m_fieldlist"][]=$obj;
						$proto26=array();
			$proto27=array();
$proto27["m_functiontype"] = "SQLF_CUSTOM";
$proto27["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "DAY(placard_date)"
));

$proto27["m_arguments"][]=$obj;
						$obj = new SQLNonParsed(array(
	"m_sql" => "' '"
));

$proto27["m_arguments"][]=$obj;
						$obj = new SQLNonParsed(array(
	"m_sql" => "Thaimonth(month(placard_date))"
));

$proto27["m_arguments"][]=$obj;
						$obj = new SQLNonParsed(array(
	"m_sql" => "' '"
));

$proto27["m_arguments"][]=$obj;
						$obj = new SQLNonParsed(array(
	"m_sql" => "(year(placard_date)+543)"
));

$proto27["m_arguments"][]=$obj;
$proto27["m_strFunctionName"] = "concat";
$obj = new SQLFunctionCall($proto27);

$proto26["m_sql"] = "concat(DAY(placard_date), ' ', Thaimonth(month(placard_date)), ' ', (year(placard_date)+543))";
$proto26["m_srcTableName"] = "placardpdf";
$proto26["m_expr"]=$obj;
$proto26["m_alias"] = "tdate";
$obj = new SQLFieldListItem($proto26);

$proto0["m_fieldlist"][]=$obj;
						$proto33=array();
			$obj = new SQLField(array(
	"m_strName" => "image1",
	"m_strTable" => "placard",
	"m_srcTableName" => "placardpdf"
));

$proto33["m_sql"] = "image1";
$proto33["m_srcTableName"] = "placardpdf";
$proto33["m_expr"]=$obj;
$proto33["m_alias"] = "";
$obj = new SQLFieldListItem($proto33);

$proto0["m_fieldlist"][]=$obj;
						$proto35=array();
			$obj = new SQLField(array(
	"m_strName" => "pdf_file1",
	"m_strTable" => "placard",
	"m_srcTableName" => "placardpdf"
));

$proto35["m_sql"] = "pdf_file1";
$proto35["m_srcTableName"] = "placardpdf";
$proto35["m_expr"]=$obj;
$proto35["m_alias"] = "";
$obj = new SQLFieldListItem($proto35);

$proto0["m_fieldlist"][]=$obj;
						$proto37=array();
			$obj = new SQLField(array(
	"m_strName" => "companyname",
	"m_strTable" => "placard",
	"m_srcTableName" => "placardpdf"
));

$proto37["m_sql"] = "companyname";
$proto37["m_srcTableName"] = "placardpdf";
$proto37["m_expr"]=$obj;
$proto37["m_alias"] = "";
$obj = new SQLFieldListItem($proto37);

$proto0["m_fieldlist"][]=$obj;
						$proto39=array();
			$obj = new SQLField(array(
	"m_strName" => "placard_date",
	"m_strTable" => "placard",
	"m_srcTableName" => "placardpdf"
));

$proto39["m_sql"] = "placard_date";
$proto39["m_srcTableName"] = "placardpdf";
$proto39["m_expr"]=$obj;
$proto39["m_alias"] = "";
$obj = new SQLFieldListItem($proto39);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto41=array();
$proto41["m_link"] = "SQLL_MAIN";
			$proto42=array();
$proto42["m_strName"] = "placard";
$proto42["m_srcTableName"] = "placardpdf";
$proto42["m_columns"] = array();
$proto42["m_columns"][] = "id";
$proto42["m_columns"][] = "owner_id";
$proto42["m_columns"][] = "publish";
$proto42["m_columns"][] = "subject";
$proto42["m_columns"][] = "content";
$proto42["m_columns"][] = "companyname";
$proto42["m_columns"][] = "count";
$proto42["m_columns"][] = "placard_to";
$proto42["m_columns"][] = "meeting_date";
$proto42["m_columns"][] = "meeting_time";
$proto42["m_columns"][] = "meeting_place";
$proto42["m_columns"][] = "placard_date";
$proto42["m_columns"][] = "name_prefix";
$proto42["m_columns"][] = "name_last";
$proto42["m_columns"][] = "position";
$proto42["m_columns"][] = "uuid";
$proto42["m_columns"][] = "create_date";
$proto42["m_columns"][] = "image1";
$proto42["m_columns"][] = "pdf_file1";
$proto42["m_columns"][] = "pdf_image_url";
$obj = new SQLTable($proto42);

$proto41["m_table"] = $obj;
$proto41["m_sql"] = "placard";
$proto41["m_alias"] = "";
$proto41["m_srcTableName"] = "placardpdf";
$proto43=array();
$proto43["m_sql"] = "";
$proto43["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto43["m_column"]=$obj;
$proto43["m_contained"] = array();
$proto43["m_strCase"] = "";
$proto43["m_havingmode"] = false;
$proto43["m_inBrackets"] = false;
$proto43["m_useAlias"] = false;
$obj = new SQLLogicalExpr($proto43);

$proto41["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto41);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
												$proto45=array();
						$obj = new SQLField(array(
	"m_strName" => "id",
	"m_strTable" => "placard",
	"m_srcTableName" => "placardpdf"
));

$proto45["m_column"]=$obj;
$proto45["m_bAsc"] = 0;
$proto45["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto45);

$proto0["m_orderby"][]=$obj;					
$proto0["m_srcTableName"]="placardpdf";		
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_placardpdf = createSqlQuery_placardpdf();


	
		;

															

$tdataplacardpdf[".sqlquery"] = $queryData_placardpdf;



include_once(getabspath("include/placardpdf_events.php"));
$tableEvents["placardpdf"] = new eventclass_placardpdf;
$tdataplacardpdf[".hasEvents"] = true;

?>