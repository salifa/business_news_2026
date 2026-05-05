<?php
$tdataplacard = array();
$tdataplacard[".searchableFields"] = array();
$tdataplacard[".ShortName"] = "placard";
$tdataplacard[".OwnerID"] = "owner_id";
$tdataplacard[".OriginalTable"] = "placard";


$tdataplacard[".pagesByType"] = my_json_decode( "{\"add\":[\"Create_New\",\"add\"],\"edit\":[\"edit1\",\"edit\"],\"list\":[\"list\"],\"print\":[\"print\"],\"search\":[\"search\"],\"view\":[\"view\"]}" );
$tdataplacard[".originalPagesByType"] = $tdataplacard[".pagesByType"];
$tdataplacard[".pages"] = types2pages( my_json_decode( "{\"add\":[\"Create_New\",\"add\"],\"edit\":[\"edit1\",\"edit\"],\"list\":[\"list\"],\"print\":[\"print\"],\"search\":[\"search\"],\"view\":[\"view\"]}" ) );
$tdataplacard[".originalPages"] = $tdataplacard[".pages"];
$tdataplacard[".defaultPages"] = my_json_decode( "{\"add\":\"Create_New\",\"edit\":\"edit1\",\"list\":\"list\",\"print\":\"print\",\"search\":\"search\",\"view\":\"view\"}" );
$tdataplacard[".originalDefaultPages"] = $tdataplacard[".defaultPages"];

//	field labels
$fieldLabelsplacard = array();
$fieldToolTipsplacard = array();
$pageTitlesplacard = array();
$placeHoldersplacard = array();

if(mlang_getcurrentlang()=="English")
{
	$fieldLabelsplacard["English"] = array();
	$fieldToolTipsplacard["English"] = array();
	$placeHoldersplacard["English"] = array();
	$pageTitlesplacard["English"] = array();
	$fieldLabelsplacard["English"]["id"] = "Id";
	$fieldToolTipsplacard["English"]["id"] = "";
	$placeHoldersplacard["English"]["id"] = "";
	$fieldLabelsplacard["English"]["subject"] = "Subject";
	$fieldToolTipsplacard["English"]["subject"] = "";
	$placeHoldersplacard["English"]["subject"] = "";
	$fieldLabelsplacard["English"]["content"] = "Content";
	$fieldToolTipsplacard["English"]["content"] = "";
	$placeHoldersplacard["English"]["content"] = "";
	$fieldLabelsplacard["English"]["companyname"] = "Companyname";
	$fieldToolTipsplacard["English"]["companyname"] = "";
	$placeHoldersplacard["English"]["companyname"] = "";
	$fieldLabelsplacard["English"]["count"] = "Count";
	$fieldToolTipsplacard["English"]["count"] = "";
	$placeHoldersplacard["English"]["count"] = "";
	$fieldLabelsplacard["English"]["placard_to"] = "Placard To";
	$fieldToolTipsplacard["English"]["placard_to"] = "";
	$placeHoldersplacard["English"]["placard_to"] = "";
	$fieldLabelsplacard["English"]["meeting_date"] = "Meeting Date";
	$fieldToolTipsplacard["English"]["meeting_date"] = "";
	$placeHoldersplacard["English"]["meeting_date"] = "";
	$fieldLabelsplacard["English"]["meeting_time"] = "Meeting Time";
	$fieldToolTipsplacard["English"]["meeting_time"] = "";
	$placeHoldersplacard["English"]["meeting_time"] = "";
	$fieldLabelsplacard["English"]["placard_date"] = "Placard Date";
	$fieldToolTipsplacard["English"]["placard_date"] = "";
	$placeHoldersplacard["English"]["placard_date"] = "";
	$fieldLabelsplacard["English"]["name_prefix"] = "Name Prefix";
	$fieldToolTipsplacard["English"]["name_prefix"] = "";
	$placeHoldersplacard["English"]["name_prefix"] = "";
	$fieldLabelsplacard["English"]["name_last"] = "Name Last";
	$fieldToolTipsplacard["English"]["name_last"] = "";
	$placeHoldersplacard["English"]["name_last"] = "";
	$fieldLabelsplacard["English"]["position"] = "Position";
	$fieldToolTipsplacard["English"]["position"] = "";
	$placeHoldersplacard["English"]["position"] = "";
	$fieldLabelsplacard["English"]["owner_id"] = "Owner Id";
	$fieldToolTipsplacard["English"]["owner_id"] = "";
	$placeHoldersplacard["English"]["owner_id"] = "";
	$fieldLabelsplacard["English"]["publish"] = "Publish";
	$fieldToolTipsplacard["English"]["publish"] = "";
	$placeHoldersplacard["English"]["publish"] = "";
	$fieldLabelsplacard["English"]["tdate"] = "Tdate";
	$fieldToolTipsplacard["English"]["tdate"] = "";
	$placeHoldersplacard["English"]["tdate"] = "";
	$fieldLabelsplacard["English"]["image1"] = "Image1";
	$fieldToolTipsplacard["English"]["image1"] = "";
	$placeHoldersplacard["English"]["image1"] = "";
	$fieldLabelsplacard["English"]["pdf_file1"] = "Pdf File1";
	$fieldToolTipsplacard["English"]["pdf_file1"] = "";
	$placeHoldersplacard["English"]["pdf_file1"] = "";
	$fieldLabelsplacard["English"]["meeting_place"] = "Meeting Place";
	$fieldToolTipsplacard["English"]["meeting_place"] = "";
	$placeHoldersplacard["English"]["meeting_place"] = "";
	$pageTitlesplacard["English"]["Create_New"] = "Placard, Add new";
	if (count($fieldToolTipsplacard["English"]))
		$tdataplacard[".isUseToolTips"] = true;
}
if(mlang_getcurrentlang()=="Thai")
{
	$fieldLabelsplacard["Thai"] = array();
	$fieldToolTipsplacard["Thai"] = array();
	$placeHoldersplacard["Thai"] = array();
	$pageTitlesplacard["Thai"] = array();
	$fieldLabelsplacard["Thai"]["id"] = "Id";
	$fieldToolTipsplacard["Thai"]["id"] = "";
	$placeHoldersplacard["Thai"]["id"] = "";
	$fieldLabelsplacard["Thai"]["subject"] = "หัวข้อ / เรื่อง";
	$fieldToolTipsplacard["Thai"]["subject"] = "";
	$placeHoldersplacard["Thai"]["subject"] = "";
	$fieldLabelsplacard["Thai"]["content"] = "วาระการประชุม";
	$fieldToolTipsplacard["Thai"]["content"] = "";
	$placeHoldersplacard["Thai"]["content"] = "วาระการประชุม";
	$fieldLabelsplacard["Thai"]["companyname"] = "ชื่อบริษัท / ชื่อหน่วยงาน";
	$fieldToolTipsplacard["Thai"]["companyname"] = "";
	$placeHoldersplacard["Thai"]["companyname"] = "";
	$fieldLabelsplacard["Thai"]["count"] = "ครั้งที่ประชุม";
	$fieldToolTipsplacard["Thai"]["count"] = "";
	$placeHoldersplacard["Thai"]["count"] = "ครั้งที่ 1/2563";
	$fieldLabelsplacard["Thai"]["placard_to"] = "ประกาศถึง";
	$fieldToolTipsplacard["Thai"]["placard_to"] = "";
	$placeHoldersplacard["Thai"]["placard_to"] = "ท่านผู้ถือหุ้นของบริษัท";
	$fieldLabelsplacard["Thai"]["meeting_date"] = "วันที่จัดประชุม";
	$fieldToolTipsplacard["Thai"]["meeting_date"] = "";
	$placeHoldersplacard["Thai"]["meeting_date"] = "";
	$fieldLabelsplacard["Thai"]["meeting_time"] = "เวลาจัดประชุม";
	$fieldToolTipsplacard["Thai"]["meeting_time"] = "";
	$placeHoldersplacard["Thai"]["meeting_time"] = "";
	$fieldLabelsplacard["Thai"]["placard_date"] = "วันที่ลงโฆษณา";
	$fieldToolTipsplacard["Thai"]["placard_date"] = "";
	$placeHoldersplacard["Thai"]["placard_date"] = "";
	$fieldLabelsplacard["Thai"]["name_prefix"] = "คำนำหน้าชื่อ";
	$fieldToolTipsplacard["Thai"]["name_prefix"] = "";
	$placeHoldersplacard["Thai"]["name_prefix"] = "";
	$fieldLabelsplacard["Thai"]["name_last"] = "ชื่อ-นามสกุล";
	$fieldToolTipsplacard["Thai"]["name_last"] = "";
	$placeHoldersplacard["Thai"]["name_last"] = "";
	$fieldLabelsplacard["Thai"]["position"] = "ตำแหน่งผู้ลงนาม";
	$fieldToolTipsplacard["Thai"]["position"] = "";
	$placeHoldersplacard["Thai"]["position"] = "";
	$fieldLabelsplacard["Thai"]["owner_id"] = "Owner Id";
	$fieldToolTipsplacard["Thai"]["owner_id"] = "";
	$placeHoldersplacard["Thai"]["owner_id"] = "";
	$fieldLabelsplacard["Thai"]["publish"] = "แสดง";
	$fieldToolTipsplacard["Thai"]["publish"] = "";
	$placeHoldersplacard["Thai"]["publish"] = "";
	$fieldLabelsplacard["Thai"]["tdate"] = "Tdate";
	$fieldToolTipsplacard["Thai"]["tdate"] = "";
	$placeHoldersplacard["Thai"]["tdate"] = "";
	$fieldLabelsplacard["Thai"]["image1"] = "ภาพหน้าแรก";
	$fieldToolTipsplacard["Thai"]["image1"] = "";
	$placeHoldersplacard["Thai"]["image1"] = "";
	$fieldLabelsplacard["Thai"]["pdf_file1"] = "Pdf File1";
	$fieldToolTipsplacard["Thai"]["pdf_file1"] = "";
	$placeHoldersplacard["Thai"]["pdf_file1"] = "";
	$fieldLabelsplacard["Thai"]["meeting_place"] = "Meeting Place";
	$fieldToolTipsplacard["Thai"]["meeting_place"] = "";
	$placeHoldersplacard["Thai"]["meeting_place"] = "";
	$pageTitlesplacard["Thai"]["Create_New"] = "ป้อนข้อมูลลงประกาศ";
	$pageTitlesplacard["Thai"]["edit"] = "แก้ไขประกาศ [{%subject}]";
	$pageTitlesplacard["Thai"]["view"] = "ประกาศ หมายเลข{%id}";
	if (count($fieldToolTipsplacard["Thai"]))
		$tdataplacard[".isUseToolTips"] = true;
}


	$tdataplacard[".NCSearch"] = true;



$tdataplacard[".shortTableName"] = "placard";
$tdataplacard[".nSecOptions"] = 1;

$tdataplacard[".mainTableOwnerID"] = "owner_id";
$tdataplacard[".entityType"] = 0;
$tdataplacard[".connId"] = "vnnsbiz_at_192_168_1_111";


$tdataplacard[".strOriginalTableName"] = "placard";

	



$tdataplacard[".showAddInPopup"] = false;

$tdataplacard[".showEditInPopup"] = false;

$tdataplacard[".showViewInPopup"] = false;

$tdataplacard[".listAjax"] = false;
//	temporary
//$tdataplacard[".listAjax"] = false;

	$tdataplacard[".audit"] = true;

	$tdataplacard[".locking"] = false;


$pages = $tdataplacard[".defaultPages"];

if( $pages[PAGE_EDIT] ) {
	$tdataplacard[".edit"] = true;
	$tdataplacard[".afterEditAction"] = 0;
	$tdataplacard[".closePopupAfterEdit"] = 1;
	$tdataplacard[".afterEditActionDetTable"] = "Detail tables not found!";
}

if( $pages[PAGE_ADD] ) {
$tdataplacard[".add"] = true;
$tdataplacard[".afterAddAction"] = 0;
$tdataplacard[".closePopupAfterAdd"] = 1;
$tdataplacard[".afterAddActionDetTable"] = "Detail tables not found!";
}

if( $pages[PAGE_LIST] ) {
	$tdataplacard[".list"] = true;
}



$tdataplacard[".strSortControlSettingsJSON"] = "";




if( $pages[PAGE_VIEW] ) {
$tdataplacard[".view"] = true;
}

if( $pages[PAGE_IMPORT] ) {
$tdataplacard[".import"] = true;
}

if( $pages[PAGE_EXPORT] ) {
$tdataplacard[".exportTo"] = true;
}

if( $pages[PAGE_PRINT] ) {
$tdataplacard[".printFriendly"] = true;
}



$tdataplacard[".showSimpleSearchOptions"] = true; // temp fix #13449

// Allow Show/Hide Fields in GRID
$tdataplacard[".allowShowHideFields"] = true; // temp fix #13449
//

// Allow Fields Reordering in GRID
$tdataplacard[".allowFieldsReordering"] = true; // temp fix #13449
//

$tdataplacard[".isUseAjaxSuggest"] = true;

$tdataplacard[".rowHighlite"] = true;



								
							
					

$tdataplacard[".ajaxCodeSnippetAdded"] = false;

$tdataplacard[".buttonsAdded"] = true;

$tdataplacard[".addPageEvents"] = true;

// use timepicker for search panel
$tdataplacard[".isUseTimeForSearch"] = true;


$tdataplacard[".badgeColor"] = "6493ea";


$tdataplacard[".allSearchFields"] = array();
$tdataplacard[".filterFields"] = array();
$tdataplacard[".requiredSearchFields"] = array();

$tdataplacard[".googleLikeFields"] = array();
$tdataplacard[".googleLikeFields"][] = "id";
$tdataplacard[".googleLikeFields"][] = "owner_id";
$tdataplacard[".googleLikeFields"][] = "publish";
$tdataplacard[".googleLikeFields"][] = "subject";
$tdataplacard[".googleLikeFields"][] = "content";
$tdataplacard[".googleLikeFields"][] = "companyname";
$tdataplacard[".googleLikeFields"][] = "count";
$tdataplacard[".googleLikeFields"][] = "placard_to";
$tdataplacard[".googleLikeFields"][] = "meeting_date";
$tdataplacard[".googleLikeFields"][] = "meeting_time";
$tdataplacard[".googleLikeFields"][] = "meeting_place";
$tdataplacard[".googleLikeFields"][] = "placard_date";
$tdataplacard[".googleLikeFields"][] = "name_prefix";
$tdataplacard[".googleLikeFields"][] = "name_last";
$tdataplacard[".googleLikeFields"][] = "position";
$tdataplacard[".googleLikeFields"][] = "tdate";
$tdataplacard[".googleLikeFields"][] = "image1";
$tdataplacard[".googleLikeFields"][] = "pdf_file1";



$tdataplacard[".tableType"] = "list";

$tdataplacard[".printerPageOrientation"] = 0;
$tdataplacard[".nPrinterPageScale"] = 100;

$tdataplacard[".nPrinterSplitRecords"] = 40;

$tdataplacard[".geocodingEnabled"] = false;




$tdataplacard[".isDisplayLoading"] = true;






$tdataplacard[".pageSize"] = 20;

$tdataplacard[".warnLeavingPages"] = true;



$tstrOrderBy = "ORDER BY id DESC";
$tdataplacard[".strOrderBy"] = $tstrOrderBy;

$tdataplacard[".orderindexes"] = array();
	$tdataplacard[".orderindexes"][] = array(1, (0 ? "ASC" : "DESC"), "id");



$tdataplacard[".sqlHead"] = "SELECT id,  owner_id,  publish,  subject,  content,  companyname,  `count`,  placard_to,  meeting_date,  meeting_time,  meeting_place,  placard_date,  name_prefix,  name_last,  `position`,  concat(DAY(placard_date), ' ', Thaimonth(month(placard_date)), ' ', (year(placard_date)+543)) AS tdate,  image1,  pdf_file1";
$tdataplacard[".sqlFrom"] = "FROM placard";
$tdataplacard[".sqlWhereExpr"] = "";
$tdataplacard[".sqlTail"] = "";

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
$tdataplacard[".arrGridTabs"] = $arrGridTabs;









//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdataplacard[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdataplacard[".arrGroupsPerPage"] = $arrGPP;

$tdataplacard[".highlightSearchResults"] = true;

$tableKeysplacard = array();
$tableKeysplacard[] = "id";
$tdataplacard[".Keys"] = $tableKeysplacard;


$tdataplacard[".hideMobileList"] = array();




//	id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "id";
	$fdata["GoodName"] = "id";
	$fdata["ownerTable"] = "placard";
	$fdata["Label"] = GetFieldLabel("placard","id");
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


	$tdataplacard["id"] = $fdata;
		$tdataplacard[".searchableFields"][] = "id";
//	owner_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "owner_id";
	$fdata["GoodName"] = "owner_id";
	$fdata["ownerTable"] = "placard";
	$fdata["Label"] = GetFieldLabel("placard","owner_id");
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


	$tdataplacard["owner_id"] = $fdata;
		$tdataplacard[".searchableFields"][] = "owner_id";
//	publish
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "publish";
	$fdata["GoodName"] = "publish";
	$fdata["ownerTable"] = "placard";
	$fdata["Label"] = GetFieldLabel("placard","publish");
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


	$tdataplacard["publish"] = $fdata;
		$tdataplacard[".searchableFields"][] = "publish";
//	subject
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "subject";
	$fdata["GoodName"] = "subject";
	$fdata["ownerTable"] = "placard";
	$fdata["Label"] = GetFieldLabel("placard","subject");
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


	$tdataplacard["subject"] = $fdata;
		$tdataplacard[".searchableFields"][] = "subject";
//	content
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "content";
	$fdata["GoodName"] = "content";
	$fdata["ownerTable"] = "placard";
	$fdata["Label"] = GetFieldLabel("placard","content");
	$fdata["FieldType"] = 201;


	
	
			

		$fdata["strField"] = "content";

	
		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "content";

	
	
				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
		
	
		$vdata["NeedEncode"] = true;

	
	
	$fdata["ViewFormats"]["view"] = $vdata;
	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
		
	
		$vdata["NeedEncode"] = true;

	
		$vdata["truncateText"] = true;
	$vdata["NumberOfChars"] = 20;

	$fdata["ViewFormats"]["list"] = $vdata;
	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
		
	
		$vdata["NeedEncode"] = true;

	
	
	$fdata["ViewFormats"]["print"] = $vdata;
	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
		
	
		$vdata["NeedEncode"] = true;

	
	
	$fdata["ViewFormats"]["export"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text area");

	
		$edata["weekdayMessage"] = array("message" => "", "messageType" => "Text");
	$edata["weekdays"] = "[]";


	
	



	
	
	
	
			$edata["acceptFileTypes"] = ".+$";
		$edata["acceptFileTypesHtml"] = "";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
				$edata["nRows"] = 150;
			$edata["nCols"] = 200;

	
	
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
	$edata = array("EditFormat" => "Text area");

	
		$edata["weekdayMessage"] = array("message" => "", "messageType" => "Text");
	$edata["weekdays"] = "[]";


	
	



	
	
	
	
			$edata["acceptFileTypes"] = ".+$";
		$edata["acceptFileTypesHtml"] = "";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
				$edata["nRows"] = 150;
			$edata["nCols"] = 200;

	
	
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["add"] = $edata;
	$edata = array("EditFormat" => "Text area");

	
		$edata["weekdayMessage"] = array("message" => "", "messageType" => "Text");
	$edata["weekdays"] = "[]";


	
	



	
	
	
	
			$edata["acceptFileTypes"] = ".+$";
		$edata["acceptFileTypesHtml"] = "";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
				$edata["nRows"] = 150;
			$edata["nCols"] = 200;

	
	
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
		$fdata["filterTotalFields"] = "id";
		$fdata["filterFormat"] = "Values list";
		$fdata["showCollapsed"] = false;

		$fdata["sortValueType"] = 0;
		$fdata["numberOfVisibleItems"] = 10;

		$fdata["filterBy"] = 0;

	

	
	
//end of Filters settings


	$tdataplacard["content"] = $fdata;
		$tdataplacard[".searchableFields"][] = "content";
//	companyname
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
	$fdata["strName"] = "companyname";
	$fdata["GoodName"] = "companyname";
	$fdata["ownerTable"] = "placard";
	$fdata["Label"] = GetFieldLabel("placard","companyname");
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


	$tdataplacard["companyname"] = $fdata;
		$tdataplacard[".searchableFields"][] = "companyname";
//	count
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 7;
	$fdata["strName"] = "count";
	$fdata["GoodName"] = "count";
	$fdata["ownerTable"] = "placard";
	$fdata["Label"] = GetFieldLabel("placard","count");
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


	$tdataplacard["count"] = $fdata;
		$tdataplacard[".searchableFields"][] = "count";
//	placard_to
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 8;
	$fdata["strName"] = "placard_to";
	$fdata["GoodName"] = "placard_to";
	$fdata["ownerTable"] = "placard";
	$fdata["Label"] = GetFieldLabel("placard","placard_to");
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


	$tdataplacard["placard_to"] = $fdata;
		$tdataplacard[".searchableFields"][] = "placard_to";
//	meeting_date
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 9;
	$fdata["strName"] = "meeting_date";
	$fdata["GoodName"] = "meeting_date";
	$fdata["ownerTable"] = "placard";
	$fdata["Label"] = GetFieldLabel("placard","meeting_date");
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


	$tdataplacard["meeting_date"] = $fdata;
		$tdataplacard[".searchableFields"][] = "meeting_date";
//	meeting_time
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 10;
	$fdata["strName"] = "meeting_time";
	$fdata["GoodName"] = "meeting_time";
	$fdata["ownerTable"] = "placard";
	$fdata["Label"] = GetFieldLabel("placard","meeting_time");
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


	$tdataplacard["meeting_time"] = $fdata;
		$tdataplacard[".searchableFields"][] = "meeting_time";
//	meeting_place
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 11;
	$fdata["strName"] = "meeting_place";
	$fdata["GoodName"] = "meeting_place";
	$fdata["ownerTable"] = "placard";
	$fdata["Label"] = GetFieldLabel("placard","meeting_place");
	$fdata["FieldType"] = 200;


	
	
			

		$fdata["strField"] = "meeting_place";

		$fdata["sourceSingle"] = "meeting_place";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "meeting_place";

	
	
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


	$tdataplacard["meeting_place"] = $fdata;
		$tdataplacard[".searchableFields"][] = "meeting_place";
//	placard_date
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 12;
	$fdata["strName"] = "placard_date";
	$fdata["GoodName"] = "placard_date";
	$fdata["ownerTable"] = "placard";
	$fdata["Label"] = GetFieldLabel("placard","placard_date");
	$fdata["FieldType"] = 7;


	
	
			

		$fdata["strField"] = "placard_date";

	
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


	$tdataplacard["placard_date"] = $fdata;
		$tdataplacard[".searchableFields"][] = "placard_date";
//	name_prefix
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 13;
	$fdata["strName"] = "name_prefix";
	$fdata["GoodName"] = "name_prefix";
	$fdata["ownerTable"] = "placard";
	$fdata["Label"] = GetFieldLabel("placard","name_prefix");
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


	$tdataplacard["name_prefix"] = $fdata;
		$tdataplacard[".searchableFields"][] = "name_prefix";
//	name_last
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 14;
	$fdata["strName"] = "name_last";
	$fdata["GoodName"] = "name_last";
	$fdata["ownerTable"] = "placard";
	$fdata["Label"] = GetFieldLabel("placard","name_last");
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


	$tdataplacard["name_last"] = $fdata;
		$tdataplacard[".searchableFields"][] = "name_last";
//	position
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 15;
	$fdata["strName"] = "position";
	$fdata["GoodName"] = "position";
	$fdata["ownerTable"] = "placard";
	$fdata["Label"] = GetFieldLabel("placard","position");
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


	$tdataplacard["position"] = $fdata;
		$tdataplacard[".searchableFields"][] = "position";
//	tdate
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 16;
	$fdata["strName"] = "tdate";
	$fdata["GoodName"] = "tdate";
	$fdata["ownerTable"] = "";
	$fdata["Label"] = GetFieldLabel("placard","tdate");
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


	$tdataplacard["tdate"] = $fdata;
		$tdataplacard[".searchableFields"][] = "tdate";
//	image1
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 17;
	$fdata["strName"] = "image1";
	$fdata["GoodName"] = "image1";
	$fdata["ownerTable"] = "placard";
	$fdata["Label"] = GetFieldLabel("placard","image1");
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


	$tdataplacard["image1"] = $fdata;
		$tdataplacard[".searchableFields"][] = "image1";
//	pdf_file1
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 18;
	$fdata["strName"] = "pdf_file1";
	$fdata["GoodName"] = "pdf_file1";
	$fdata["ownerTable"] = "placard";
	$fdata["Label"] = GetFieldLabel("placard","pdf_file1");
	$fdata["FieldType"] = 201;


	
	
			

		$fdata["strField"] = "pdf_file1";

		$fdata["sourceSingle"] = "pdf_file1";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "pdf_file1";

	
	
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


	$tdataplacard["pdf_file1"] = $fdata;
		$tdataplacard[".searchableFields"][] = "pdf_file1";


$tables_data["placard"]=&$tdataplacard;
$field_labels["placard"] = &$fieldLabelsplacard;
$fieldToolTips["placard"] = &$fieldToolTipsplacard;
$placeHolders["placard"] = &$placeHoldersplacard;
$page_titles["placard"] = &$pageTitlesplacard;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)

//if !@TABLE.bReportCrossTab

$detailsTablesData["placard"] = array();
//endif

// tables which are master tables for current table (detail)
$masterTablesData["placard"] = array();



// -----------------end  prepare master-details data arrays ------------------------------//



require_once(getabspath("classes/sql.php"));











function createSqlQuery_placard()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "id,  owner_id,  publish,  subject,  content,  companyname,  `count`,  placard_to,  meeting_date,  meeting_time,  meeting_place,  placard_date,  name_prefix,  name_last,  `position`,  concat(DAY(placard_date), ' ', Thaimonth(month(placard_date)), ' ', (year(placard_date)+543)) AS tdate,  image1,  pdf_file1";
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
	"m_srcTableName" => "placard"
));

$proto6["m_sql"] = "id";
$proto6["m_srcTableName"] = "placard";
$proto6["m_expr"]=$obj;
$proto6["m_alias"] = "";
$obj = new SQLFieldListItem($proto6);

$proto0["m_fieldlist"][]=$obj;
						$proto8=array();
			$obj = new SQLField(array(
	"m_strName" => "owner_id",
	"m_strTable" => "placard",
	"m_srcTableName" => "placard"
));

$proto8["m_sql"] = "owner_id";
$proto8["m_srcTableName"] = "placard";
$proto8["m_expr"]=$obj;
$proto8["m_alias"] = "";
$obj = new SQLFieldListItem($proto8);

$proto0["m_fieldlist"][]=$obj;
						$proto10=array();
			$obj = new SQLField(array(
	"m_strName" => "publish",
	"m_strTable" => "placard",
	"m_srcTableName" => "placard"
));

$proto10["m_sql"] = "publish";
$proto10["m_srcTableName"] = "placard";
$proto10["m_expr"]=$obj;
$proto10["m_alias"] = "";
$obj = new SQLFieldListItem($proto10);

$proto0["m_fieldlist"][]=$obj;
						$proto12=array();
			$obj = new SQLField(array(
	"m_strName" => "subject",
	"m_strTable" => "placard",
	"m_srcTableName" => "placard"
));

$proto12["m_sql"] = "subject";
$proto12["m_srcTableName"] = "placard";
$proto12["m_expr"]=$obj;
$proto12["m_alias"] = "";
$obj = new SQLFieldListItem($proto12);

$proto0["m_fieldlist"][]=$obj;
						$proto14=array();
			$obj = new SQLField(array(
	"m_strName" => "content",
	"m_strTable" => "placard",
	"m_srcTableName" => "placard"
));

$proto14["m_sql"] = "content";
$proto14["m_srcTableName"] = "placard";
$proto14["m_expr"]=$obj;
$proto14["m_alias"] = "";
$obj = new SQLFieldListItem($proto14);

$proto0["m_fieldlist"][]=$obj;
						$proto16=array();
			$obj = new SQLField(array(
	"m_strName" => "companyname",
	"m_strTable" => "placard",
	"m_srcTableName" => "placard"
));

$proto16["m_sql"] = "companyname";
$proto16["m_srcTableName"] = "placard";
$proto16["m_expr"]=$obj;
$proto16["m_alias"] = "";
$obj = new SQLFieldListItem($proto16);

$proto0["m_fieldlist"][]=$obj;
						$proto18=array();
			$obj = new SQLField(array(
	"m_strName" => "count",
	"m_strTable" => "placard",
	"m_srcTableName" => "placard"
));

$proto18["m_sql"] = "`count`";
$proto18["m_srcTableName"] = "placard";
$proto18["m_expr"]=$obj;
$proto18["m_alias"] = "";
$obj = new SQLFieldListItem($proto18);

$proto0["m_fieldlist"][]=$obj;
						$proto20=array();
			$obj = new SQLField(array(
	"m_strName" => "placard_to",
	"m_strTable" => "placard",
	"m_srcTableName" => "placard"
));

$proto20["m_sql"] = "placard_to";
$proto20["m_srcTableName"] = "placard";
$proto20["m_expr"]=$obj;
$proto20["m_alias"] = "";
$obj = new SQLFieldListItem($proto20);

$proto0["m_fieldlist"][]=$obj;
						$proto22=array();
			$obj = new SQLField(array(
	"m_strName" => "meeting_date",
	"m_strTable" => "placard",
	"m_srcTableName" => "placard"
));

$proto22["m_sql"] = "meeting_date";
$proto22["m_srcTableName"] = "placard";
$proto22["m_expr"]=$obj;
$proto22["m_alias"] = "";
$obj = new SQLFieldListItem($proto22);

$proto0["m_fieldlist"][]=$obj;
						$proto24=array();
			$obj = new SQLField(array(
	"m_strName" => "meeting_time",
	"m_strTable" => "placard",
	"m_srcTableName" => "placard"
));

$proto24["m_sql"] = "meeting_time";
$proto24["m_srcTableName"] = "placard";
$proto24["m_expr"]=$obj;
$proto24["m_alias"] = "";
$obj = new SQLFieldListItem($proto24);

$proto0["m_fieldlist"][]=$obj;
						$proto26=array();
			$obj = new SQLField(array(
	"m_strName" => "meeting_place",
	"m_strTable" => "placard",
	"m_srcTableName" => "placard"
));

$proto26["m_sql"] = "meeting_place";
$proto26["m_srcTableName"] = "placard";
$proto26["m_expr"]=$obj;
$proto26["m_alias"] = "";
$obj = new SQLFieldListItem($proto26);

$proto0["m_fieldlist"][]=$obj;
						$proto28=array();
			$obj = new SQLField(array(
	"m_strName" => "placard_date",
	"m_strTable" => "placard",
	"m_srcTableName" => "placard"
));

$proto28["m_sql"] = "placard_date";
$proto28["m_srcTableName"] = "placard";
$proto28["m_expr"]=$obj;
$proto28["m_alias"] = "";
$obj = new SQLFieldListItem($proto28);

$proto0["m_fieldlist"][]=$obj;
						$proto30=array();
			$obj = new SQLField(array(
	"m_strName" => "name_prefix",
	"m_strTable" => "placard",
	"m_srcTableName" => "placard"
));

$proto30["m_sql"] = "name_prefix";
$proto30["m_srcTableName"] = "placard";
$proto30["m_expr"]=$obj;
$proto30["m_alias"] = "";
$obj = new SQLFieldListItem($proto30);

$proto0["m_fieldlist"][]=$obj;
						$proto32=array();
			$obj = new SQLField(array(
	"m_strName" => "name_last",
	"m_strTable" => "placard",
	"m_srcTableName" => "placard"
));

$proto32["m_sql"] = "name_last";
$proto32["m_srcTableName"] = "placard";
$proto32["m_expr"]=$obj;
$proto32["m_alias"] = "";
$obj = new SQLFieldListItem($proto32);

$proto0["m_fieldlist"][]=$obj;
						$proto34=array();
			$obj = new SQLField(array(
	"m_strName" => "position",
	"m_strTable" => "placard",
	"m_srcTableName" => "placard"
));

$proto34["m_sql"] = "`position`";
$proto34["m_srcTableName"] = "placard";
$proto34["m_expr"]=$obj;
$proto34["m_alias"] = "";
$obj = new SQLFieldListItem($proto34);

$proto0["m_fieldlist"][]=$obj;
						$proto36=array();
			$proto37=array();
$proto37["m_functiontype"] = "SQLF_CUSTOM";
$proto37["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "DAY(placard_date)"
));

$proto37["m_arguments"][]=$obj;
						$obj = new SQLNonParsed(array(
	"m_sql" => "' '"
));

$proto37["m_arguments"][]=$obj;
						$obj = new SQLNonParsed(array(
	"m_sql" => "Thaimonth(month(placard_date))"
));

$proto37["m_arguments"][]=$obj;
						$obj = new SQLNonParsed(array(
	"m_sql" => "' '"
));

$proto37["m_arguments"][]=$obj;
						$obj = new SQLNonParsed(array(
	"m_sql" => "(year(placard_date)+543)"
));

$proto37["m_arguments"][]=$obj;
$proto37["m_strFunctionName"] = "concat";
$obj = new SQLFunctionCall($proto37);

$proto36["m_sql"] = "concat(DAY(placard_date), ' ', Thaimonth(month(placard_date)), ' ', (year(placard_date)+543))";
$proto36["m_srcTableName"] = "placard";
$proto36["m_expr"]=$obj;
$proto36["m_alias"] = "tdate";
$obj = new SQLFieldListItem($proto36);

$proto0["m_fieldlist"][]=$obj;
						$proto43=array();
			$obj = new SQLField(array(
	"m_strName" => "image1",
	"m_strTable" => "placard",
	"m_srcTableName" => "placard"
));

$proto43["m_sql"] = "image1";
$proto43["m_srcTableName"] = "placard";
$proto43["m_expr"]=$obj;
$proto43["m_alias"] = "";
$obj = new SQLFieldListItem($proto43);

$proto0["m_fieldlist"][]=$obj;
						$proto45=array();
			$obj = new SQLField(array(
	"m_strName" => "pdf_file1",
	"m_strTable" => "placard",
	"m_srcTableName" => "placard"
));

$proto45["m_sql"] = "pdf_file1";
$proto45["m_srcTableName"] = "placard";
$proto45["m_expr"]=$obj;
$proto45["m_alias"] = "";
$obj = new SQLFieldListItem($proto45);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto47=array();
$proto47["m_link"] = "SQLL_MAIN";
			$proto48=array();
$proto48["m_strName"] = "placard";
$proto48["m_srcTableName"] = "placard";
$proto48["m_columns"] = array();
$proto48["m_columns"][] = "id";
$proto48["m_columns"][] = "owner_id";
$proto48["m_columns"][] = "publish";
$proto48["m_columns"][] = "subject";
$proto48["m_columns"][] = "content";
$proto48["m_columns"][] = "companyname";
$proto48["m_columns"][] = "count";
$proto48["m_columns"][] = "placard_to";
$proto48["m_columns"][] = "meeting_date";
$proto48["m_columns"][] = "meeting_time";
$proto48["m_columns"][] = "meeting_place";
$proto48["m_columns"][] = "placard_date";
$proto48["m_columns"][] = "name_prefix";
$proto48["m_columns"][] = "name_last";
$proto48["m_columns"][] = "position";
$proto48["m_columns"][] = "uuid";
$proto48["m_columns"][] = "create_date";
$proto48["m_columns"][] = "image1";
$proto48["m_columns"][] = "pdf_file1";
$proto48["m_columns"][] = "pdf_image_url";
$obj = new SQLTable($proto48);

$proto47["m_table"] = $obj;
$proto47["m_sql"] = "placard";
$proto47["m_alias"] = "";
$proto47["m_srcTableName"] = "placard";
$proto49=array();
$proto49["m_sql"] = "";
$proto49["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto49["m_column"]=$obj;
$proto49["m_contained"] = array();
$proto49["m_strCase"] = "";
$proto49["m_havingmode"] = false;
$proto49["m_inBrackets"] = false;
$proto49["m_useAlias"] = false;
$obj = new SQLLogicalExpr($proto49);

$proto47["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto47);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
												$proto51=array();
						$obj = new SQLField(array(
	"m_strName" => "id",
	"m_strTable" => "placard",
	"m_srcTableName" => "placard"
));

$proto51["m_column"]=$obj;
$proto51["m_bAsc"] = 0;
$proto51["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto51);

$proto0["m_orderby"][]=$obj;					
$proto0["m_srcTableName"]="placard";		
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_placard = createSqlQuery_placard();


	
		;

																		

$tdataplacard[".sqlquery"] = $queryData_placard;



include_once(getabspath("include/placard_events.php"));
$tableEvents["placard"] = new eventclass_placard;
$tdataplacard[".hasEvents"] = true;

?>