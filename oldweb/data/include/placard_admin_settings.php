<?php
$tdataplacard_admin = array();
$tdataplacard_admin[".searchableFields"] = array();
$tdataplacard_admin[".ShortName"] = "placard_admin";
$tdataplacard_admin[".OwnerID"] = "";
$tdataplacard_admin[".OriginalTable"] = "placard";


$tdataplacard_admin[".pagesByType"] = my_json_decode( "{\"add\":[\"Create_New\",\"add\"],\"edit\":[\"edit\",\"edit1\"],\"export\":[\"export\"],\"import\":[\"import\"],\"list\":[\"list\"],\"print\":[\"print\"],\"search\":[\"search\"],\"view\":[\"view\"]}" );
$tdataplacard_admin[".originalPagesByType"] = $tdataplacard_admin[".pagesByType"];
$tdataplacard_admin[".pages"] = types2pages( my_json_decode( "{\"add\":[\"Create_New\",\"add\"],\"edit\":[\"edit\",\"edit1\"],\"export\":[\"export\"],\"import\":[\"import\"],\"list\":[\"list\"],\"print\":[\"print\"],\"search\":[\"search\"],\"view\":[\"view\"]}" ) );
$tdataplacard_admin[".originalPages"] = $tdataplacard_admin[".pages"];
$tdataplacard_admin[".defaultPages"] = my_json_decode( "{\"add\":\"Create_New\",\"edit\":\"edit\",\"export\":\"export\",\"import\":\"import\",\"list\":\"list\",\"print\":\"print\",\"search\":\"search\",\"view\":\"view\"}" );
$tdataplacard_admin[".originalDefaultPages"] = $tdataplacard_admin[".defaultPages"];

//	field labels
$fieldLabelsplacard_admin = array();
$fieldToolTipsplacard_admin = array();
$pageTitlesplacard_admin = array();
$placeHoldersplacard_admin = array();

if(mlang_getcurrentlang()=="English")
{
	$fieldLabelsplacard_admin["English"] = array();
	$fieldToolTipsplacard_admin["English"] = array();
	$placeHoldersplacard_admin["English"] = array();
	$pageTitlesplacard_admin["English"] = array();
	$fieldLabelsplacard_admin["English"]["id"] = "Id";
	$fieldToolTipsplacard_admin["English"]["id"] = "";
	$placeHoldersplacard_admin["English"]["id"] = "";
	$fieldLabelsplacard_admin["English"]["subject"] = "Subject";
	$fieldToolTipsplacard_admin["English"]["subject"] = "";
	$placeHoldersplacard_admin["English"]["subject"] = "";
	$fieldLabelsplacard_admin["English"]["content"] = "Content";
	$fieldToolTipsplacard_admin["English"]["content"] = "";
	$placeHoldersplacard_admin["English"]["content"] = "";
	$fieldLabelsplacard_admin["English"]["companyname"] = "Companyname";
	$fieldToolTipsplacard_admin["English"]["companyname"] = "";
	$placeHoldersplacard_admin["English"]["companyname"] = "";
	$fieldLabelsplacard_admin["English"]["count"] = "Count";
	$fieldToolTipsplacard_admin["English"]["count"] = "";
	$placeHoldersplacard_admin["English"]["count"] = "";
	$fieldLabelsplacard_admin["English"]["placard_to"] = "Placard To";
	$fieldToolTipsplacard_admin["English"]["placard_to"] = "";
	$placeHoldersplacard_admin["English"]["placard_to"] = "";
	$fieldLabelsplacard_admin["English"]["meeting_date"] = "Meeting Date";
	$fieldToolTipsplacard_admin["English"]["meeting_date"] = "";
	$placeHoldersplacard_admin["English"]["meeting_date"] = "";
	$fieldLabelsplacard_admin["English"]["meeting_time"] = "Meeting Time";
	$fieldToolTipsplacard_admin["English"]["meeting_time"] = "";
	$placeHoldersplacard_admin["English"]["meeting_time"] = "";
	$fieldLabelsplacard_admin["English"]["placard_date"] = "Placard Date";
	$fieldToolTipsplacard_admin["English"]["placard_date"] = "";
	$placeHoldersplacard_admin["English"]["placard_date"] = "";
	$fieldLabelsplacard_admin["English"]["name_prefix"] = "Name Prefix";
	$fieldToolTipsplacard_admin["English"]["name_prefix"] = "";
	$placeHoldersplacard_admin["English"]["name_prefix"] = "";
	$fieldLabelsplacard_admin["English"]["name_last"] = "Name Last";
	$fieldToolTipsplacard_admin["English"]["name_last"] = "";
	$placeHoldersplacard_admin["English"]["name_last"] = "";
	$fieldLabelsplacard_admin["English"]["position"] = "Position";
	$fieldToolTipsplacard_admin["English"]["position"] = "";
	$placeHoldersplacard_admin["English"]["position"] = "";
	$fieldLabelsplacard_admin["English"]["owner_id"] = "Owner Id";
	$fieldToolTipsplacard_admin["English"]["owner_id"] = "";
	$placeHoldersplacard_admin["English"]["owner_id"] = "";
	$fieldLabelsplacard_admin["English"]["publish"] = "Publish";
	$fieldToolTipsplacard_admin["English"]["publish"] = "";
	$placeHoldersplacard_admin["English"]["publish"] = "";
	$fieldLabelsplacard_admin["English"]["uuid"] = "Uuid";
	$fieldToolTipsplacard_admin["English"]["uuid"] = "";
	$placeHoldersplacard_admin["English"]["uuid"] = "";
	$fieldLabelsplacard_admin["English"]["image1"] = "Image1";
	$fieldToolTipsplacard_admin["English"]["image1"] = "";
	$placeHoldersplacard_admin["English"]["image1"] = "";
	$fieldLabelsplacard_admin["English"]["create_date"] = "Create Date";
	$fieldToolTipsplacard_admin["English"]["create_date"] = "";
	$placeHoldersplacard_admin["English"]["create_date"] = "";
	$fieldLabelsplacard_admin["English"]["pdf_file1"] = "Pdf File1";
	$fieldToolTipsplacard_admin["English"]["pdf_file1"] = "";
	$placeHoldersplacard_admin["English"]["pdf_file1"] = "";
	$fieldLabelsplacard_admin["English"]["meeting_place"] = "Meeting Place";
	$fieldToolTipsplacard_admin["English"]["meeting_place"] = "";
	$placeHoldersplacard_admin["English"]["meeting_place"] = "";
	$fieldLabelsplacard_admin["English"]["pdf_image_url"] = "Pdf Image Url";
	$fieldToolTipsplacard_admin["English"]["pdf_image_url"] = "";
	$placeHoldersplacard_admin["English"]["pdf_image_url"] = "";
	if (count($fieldToolTipsplacard_admin["English"]))
		$tdataplacard_admin[".isUseToolTips"] = true;
}
if(mlang_getcurrentlang()=="Thai")
{
	$fieldLabelsplacard_admin["Thai"] = array();
	$fieldToolTipsplacard_admin["Thai"] = array();
	$placeHoldersplacard_admin["Thai"] = array();
	$pageTitlesplacard_admin["Thai"] = array();
	$fieldLabelsplacard_admin["Thai"]["id"] = "Id";
	$fieldToolTipsplacard_admin["Thai"]["id"] = "";
	$placeHoldersplacard_admin["Thai"]["id"] = "";
	$fieldLabelsplacard_admin["Thai"]["subject"] = "หัวข้อ / เรื่อง";
	$fieldToolTipsplacard_admin["Thai"]["subject"] = "";
	$placeHoldersplacard_admin["Thai"]["subject"] = "";
	$fieldLabelsplacard_admin["Thai"]["content"] = "วาระการประชุม";
	$fieldToolTipsplacard_admin["Thai"]["content"] = "";
	$placeHoldersplacard_admin["Thai"]["content"] = "";
	$fieldLabelsplacard_admin["Thai"]["companyname"] = "ชื่อบริษัท / ชื่อหน่วยงาน";
	$fieldToolTipsplacard_admin["Thai"]["companyname"] = "";
	$placeHoldersplacard_admin["Thai"]["companyname"] = "";
	$fieldLabelsplacard_admin["Thai"]["count"] = "ครั้งที่ประชุม";
	$fieldToolTipsplacard_admin["Thai"]["count"] = "";
	$placeHoldersplacard_admin["Thai"]["count"] = "";
	$fieldLabelsplacard_admin["Thai"]["placard_to"] = "ประกาศถึง";
	$fieldToolTipsplacard_admin["Thai"]["placard_to"] = "";
	$placeHoldersplacard_admin["Thai"]["placard_to"] = "";
	$fieldLabelsplacard_admin["Thai"]["meeting_date"] = "วันที่จัดประชุม";
	$fieldToolTipsplacard_admin["Thai"]["meeting_date"] = "";
	$placeHoldersplacard_admin["Thai"]["meeting_date"] = "";
	$fieldLabelsplacard_admin["Thai"]["meeting_time"] = "เวลาจัดประชุม";
	$fieldToolTipsplacard_admin["Thai"]["meeting_time"] = "";
	$placeHoldersplacard_admin["Thai"]["meeting_time"] = "";
	$fieldLabelsplacard_admin["Thai"]["placard_date"] = "วันที่ลงโฆษณา";
	$fieldToolTipsplacard_admin["Thai"]["placard_date"] = "";
	$placeHoldersplacard_admin["Thai"]["placard_date"] = "";
	$fieldLabelsplacard_admin["Thai"]["name_prefix"] = "คำนำหน้าชื่อผู้ลงนาม";
	$fieldToolTipsplacard_admin["Thai"]["name_prefix"] = "";
	$placeHoldersplacard_admin["Thai"]["name_prefix"] = "";
	$fieldLabelsplacard_admin["Thai"]["name_last"] = "ชื่อ-นามสกุลผู้ลงนาม";
	$fieldToolTipsplacard_admin["Thai"]["name_last"] = "";
	$placeHoldersplacard_admin["Thai"]["name_last"] = "";
	$fieldLabelsplacard_admin["Thai"]["position"] = "ตำแหน่งผู้ลงนาม";
	$fieldToolTipsplacard_admin["Thai"]["position"] = "";
	$placeHoldersplacard_admin["Thai"]["position"] = "";
	$fieldLabelsplacard_admin["Thai"]["owner_id"] = "Owner Id";
	$fieldToolTipsplacard_admin["Thai"]["owner_id"] = "";
	$placeHoldersplacard_admin["Thai"]["owner_id"] = "";
	$fieldLabelsplacard_admin["Thai"]["publish"] = "แสดง";
	$fieldToolTipsplacard_admin["Thai"]["publish"] = "";
	$placeHoldersplacard_admin["Thai"]["publish"] = "";
	$fieldLabelsplacard_admin["Thai"]["uuid"] = "Uuid";
	$fieldToolTipsplacard_admin["Thai"]["uuid"] = "";
	$placeHoldersplacard_admin["Thai"]["uuid"] = "";
	$fieldLabelsplacard_admin["Thai"]["image1"] = "Image1";
	$fieldToolTipsplacard_admin["Thai"]["image1"] = "";
	$placeHoldersplacard_admin["Thai"]["image1"] = "";
	$fieldLabelsplacard_admin["Thai"]["create_date"] = "Create";
	$fieldToolTipsplacard_admin["Thai"]["create_date"] = "";
	$placeHoldersplacard_admin["Thai"]["create_date"] = "";
	$fieldLabelsplacard_admin["Thai"]["pdf_file1"] = "Pdf File1";
	$fieldToolTipsplacard_admin["Thai"]["pdf_file1"] = "";
	$placeHoldersplacard_admin["Thai"]["pdf_file1"] = "";
	$fieldLabelsplacard_admin["Thai"]["meeting_place"] = "Meeting Place";
	$fieldToolTipsplacard_admin["Thai"]["meeting_place"] = "";
	$placeHoldersplacard_admin["Thai"]["meeting_place"] = "";
	$fieldLabelsplacard_admin["Thai"]["pdf_image_url"] = "Pdf Image Url";
	$fieldToolTipsplacard_admin["Thai"]["pdf_image_url"] = "";
	$placeHoldersplacard_admin["Thai"]["pdf_image_url"] = "";
	if (count($fieldToolTipsplacard_admin["Thai"]))
		$tdataplacard_admin[".isUseToolTips"] = true;
}


	$tdataplacard_admin[".NCSearch"] = true;



$tdataplacard_admin[".shortTableName"] = "placard_admin";
$tdataplacard_admin[".nSecOptions"] = 0;

$tdataplacard_admin[".mainTableOwnerID"] = "";
$tdataplacard_admin[".entityType"] = 1;
$tdataplacard_admin[".connId"] = "vnnsbiz_at_192_168_1_111";


$tdataplacard_admin[".strOriginalTableName"] = "placard";

	



$tdataplacard_admin[".showAddInPopup"] = false;

$tdataplacard_admin[".showEditInPopup"] = false;

$tdataplacard_admin[".showViewInPopup"] = false;

$tdataplacard_admin[".listAjax"] = false;
//	temporary
//$tdataplacard_admin[".listAjax"] = false;

	$tdataplacard_admin[".audit"] = true;

	$tdataplacard_admin[".locking"] = false;


$pages = $tdataplacard_admin[".defaultPages"];

if( $pages[PAGE_EDIT] ) {
	$tdataplacard_admin[".edit"] = true;
	$tdataplacard_admin[".afterEditAction"] = 0;
	$tdataplacard_admin[".closePopupAfterEdit"] = 1;
	$tdataplacard_admin[".afterEditActionDetTable"] = "Detail tables not found!";
}

if( $pages[PAGE_ADD] ) {
$tdataplacard_admin[".add"] = true;
$tdataplacard_admin[".afterAddAction"] = 0;
$tdataplacard_admin[".closePopupAfterAdd"] = 1;
$tdataplacard_admin[".afterAddActionDetTable"] = "Detail tables not found!";
}

if( $pages[PAGE_LIST] ) {
	$tdataplacard_admin[".list"] = true;
}



$tdataplacard_admin[".strSortControlSettingsJSON"] = "";




if( $pages[PAGE_VIEW] ) {
$tdataplacard_admin[".view"] = true;
}

if( $pages[PAGE_IMPORT] ) {
$tdataplacard_admin[".import"] = true;
}

if( $pages[PAGE_EXPORT] ) {
$tdataplacard_admin[".exportTo"] = true;
}

if( $pages[PAGE_PRINT] ) {
$tdataplacard_admin[".printFriendly"] = true;
}



$tdataplacard_admin[".showSimpleSearchOptions"] = true; // temp fix #13449

// Allow Show/Hide Fields in GRID
$tdataplacard_admin[".allowShowHideFields"] = true; // temp fix #13449
//

// Allow Fields Reordering in GRID
$tdataplacard_admin[".allowFieldsReordering"] = true; // temp fix #13449
//

$tdataplacard_admin[".isUseAjaxSuggest"] = true;

$tdataplacard_admin[".rowHighlite"] = true;



								
							
					

$tdataplacard_admin[".ajaxCodeSnippetAdded"] = false;

$tdataplacard_admin[".buttonsAdded"] = true;

$tdataplacard_admin[".addPageEvents"] = true;

// use timepicker for search panel
$tdataplacard_admin[".isUseTimeForSearch"] = true;


$tdataplacard_admin[".badgeColor"] = "CFAE83";


$tdataplacard_admin[".allSearchFields"] = array();
$tdataplacard_admin[".filterFields"] = array();
$tdataplacard_admin[".requiredSearchFields"] = array();

$tdataplacard_admin[".googleLikeFields"] = array();
$tdataplacard_admin[".googleLikeFields"][] = "id";
$tdataplacard_admin[".googleLikeFields"][] = "owner_id";
$tdataplacard_admin[".googleLikeFields"][] = "publish";
$tdataplacard_admin[".googleLikeFields"][] = "subject";
$tdataplacard_admin[".googleLikeFields"][] = "content";
$tdataplacard_admin[".googleLikeFields"][] = "companyname";
$tdataplacard_admin[".googleLikeFields"][] = "count";
$tdataplacard_admin[".googleLikeFields"][] = "placard_to";
$tdataplacard_admin[".googleLikeFields"][] = "meeting_date";
$tdataplacard_admin[".googleLikeFields"][] = "meeting_time";
$tdataplacard_admin[".googleLikeFields"][] = "placard_date";
$tdataplacard_admin[".googleLikeFields"][] = "name_prefix";
$tdataplacard_admin[".googleLikeFields"][] = "name_last";
$tdataplacard_admin[".googleLikeFields"][] = "position";
$tdataplacard_admin[".googleLikeFields"][] = "uuid";
$tdataplacard_admin[".googleLikeFields"][] = "image1";
$tdataplacard_admin[".googleLikeFields"][] = "create_date";
$tdataplacard_admin[".googleLikeFields"][] = "pdf_file1";
$tdataplacard_admin[".googleLikeFields"][] = "meeting_place";
$tdataplacard_admin[".googleLikeFields"][] = "pdf_image_url";



$tdataplacard_admin[".tableType"] = "list";

$tdataplacard_admin[".printerPageOrientation"] = 0;
$tdataplacard_admin[".nPrinterPageScale"] = 100;

$tdataplacard_admin[".nPrinterSplitRecords"] = 40;

$tdataplacard_admin[".geocodingEnabled"] = false;




$tdataplacard_admin[".isDisplayLoading"] = true;






$tdataplacard_admin[".pageSize"] = 20;

$tdataplacard_admin[".warnLeavingPages"] = true;



$tstrOrderBy = "ORDER BY id DESC";
$tdataplacard_admin[".strOrderBy"] = $tstrOrderBy;

$tdataplacard_admin[".orderindexes"] = array();
	$tdataplacard_admin[".orderindexes"][] = array(1, (0 ? "ASC" : "DESC"), "id");



$tdataplacard_admin[".sqlHead"] = "SELECT id,  owner_id,  publish,  subject,  content,  companyname,  `count`,  placard_to,  meeting_date,  meeting_time,  placard_date,  name_prefix,  name_last,  `position`,  uuid,  image1,  create_date,  pdf_file1,  meeting_place,  pdf_image_url";
$tdataplacard_admin[".sqlFrom"] = "FROM placard";
$tdataplacard_admin[".sqlWhereExpr"] = "";
$tdataplacard_admin[".sqlTail"] = "";

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
$tdataplacard_admin[".arrGridTabs"] = $arrGridTabs;









//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdataplacard_admin[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdataplacard_admin[".arrGroupsPerPage"] = $arrGPP;

$tdataplacard_admin[".highlightSearchResults"] = true;

$tableKeysplacard_admin = array();
$tableKeysplacard_admin[] = "id";
$tdataplacard_admin[".Keys"] = $tableKeysplacard_admin;


$tdataplacard_admin[".hideMobileList"] = array();




//	id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "id";
	$fdata["GoodName"] = "id";
	$fdata["ownerTable"] = "placard";
	$fdata["Label"] = GetFieldLabel("placard_admin","id");
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


	$tdataplacard_admin["id"] = $fdata;
		$tdataplacard_admin[".searchableFields"][] = "id";
//	owner_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "owner_id";
	$fdata["GoodName"] = "owner_id";
	$fdata["ownerTable"] = "placard";
	$fdata["Label"] = GetFieldLabel("placard_admin","owner_id");
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


	$tdataplacard_admin["owner_id"] = $fdata;
		$tdataplacard_admin[".searchableFields"][] = "owner_id";
//	publish
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "publish";
	$fdata["GoodName"] = "publish";
	$fdata["ownerTable"] = "placard";
	$fdata["Label"] = GetFieldLabel("placard_admin","publish");
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


	$tdataplacard_admin["publish"] = $fdata;
		$tdataplacard_admin[".searchableFields"][] = "publish";
//	subject
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "subject";
	$fdata["GoodName"] = "subject";
	$fdata["ownerTable"] = "placard";
	$fdata["Label"] = GetFieldLabel("placard_admin","subject");
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


	$tdataplacard_admin["subject"] = $fdata;
		$tdataplacard_admin[".searchableFields"][] = "subject";
//	content
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "content";
	$fdata["GoodName"] = "content";
	$fdata["ownerTable"] = "placard";
	$fdata["Label"] = GetFieldLabel("placard_admin","content");
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
	$vdata["NumberOfChars"] = 10;

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


	$tdataplacard_admin["content"] = $fdata;
		$tdataplacard_admin[".searchableFields"][] = "content";
//	companyname
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
	$fdata["strName"] = "companyname";
	$fdata["GoodName"] = "companyname";
	$fdata["ownerTable"] = "placard";
	$fdata["Label"] = GetFieldLabel("placard_admin","companyname");
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


	$tdataplacard_admin["companyname"] = $fdata;
		$tdataplacard_admin[".searchableFields"][] = "companyname";
//	count
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 7;
	$fdata["strName"] = "count";
	$fdata["GoodName"] = "count";
	$fdata["ownerTable"] = "placard";
	$fdata["Label"] = GetFieldLabel("placard_admin","count");
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


	$tdataplacard_admin["count"] = $fdata;
		$tdataplacard_admin[".searchableFields"][] = "count";
//	placard_to
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 8;
	$fdata["strName"] = "placard_to";
	$fdata["GoodName"] = "placard_to";
	$fdata["ownerTable"] = "placard";
	$fdata["Label"] = GetFieldLabel("placard_admin","placard_to");
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


	$tdataplacard_admin["placard_to"] = $fdata;
		$tdataplacard_admin[".searchableFields"][] = "placard_to";
//	meeting_date
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 9;
	$fdata["strName"] = "meeting_date";
	$fdata["GoodName"] = "meeting_date";
	$fdata["ownerTable"] = "placard";
	$fdata["Label"] = GetFieldLabel("placard_admin","meeting_date");
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


	$tdataplacard_admin["meeting_date"] = $fdata;
		$tdataplacard_admin[".searchableFields"][] = "meeting_date";
//	meeting_time
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 10;
	$fdata["strName"] = "meeting_time";
	$fdata["GoodName"] = "meeting_time";
	$fdata["ownerTable"] = "placard";
	$fdata["Label"] = GetFieldLabel("placard_admin","meeting_time");
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


	$tdataplacard_admin["meeting_time"] = $fdata;
		$tdataplacard_admin[".searchableFields"][] = "meeting_time";
//	placard_date
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 11;
	$fdata["strName"] = "placard_date";
	$fdata["GoodName"] = "placard_date";
	$fdata["ownerTable"] = "placard";
	$fdata["Label"] = GetFieldLabel("placard_admin","placard_date");
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
	$vdata = array("ViewFormat" => "Short Date");

	
	
	
	
	
	
	
	
	
	
	
		
	
		$vdata["NeedEncode"] = true;

	
		$vdata["truncateText"] = true;
	$vdata["NumberOfChars"] = 80;

	$fdata["ViewFormats"]["list"] = $vdata;
	$vdata = array("ViewFormat" => "Short Date");

	
	
	
	
	
	
	
	
	
	
	
		
	
		$vdata["NeedEncode"] = true;

	
		$vdata["truncateText"] = true;
	$vdata["NumberOfChars"] = 80;

	$fdata["ViewFormats"]["print"] = $vdata;
	$vdata = array("ViewFormat" => "Short Date");

	
	
	
	
	
	
	
	
	
	
	
		
	
		$vdata["NeedEncode"] = true;

	
		$vdata["truncateText"] = true;
	$vdata["NumberOfChars"] = 80;

	$fdata["ViewFormats"]["export"] = $vdata;
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

	
			
	
	
	
	$fdata["EditFormats"]["add"] = $edata;
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

	
			
	
	
	
	$fdata["EditFormats"]["search"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = true;




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


	$tdataplacard_admin["placard_date"] = $fdata;
		$tdataplacard_admin[".searchableFields"][] = "placard_date";
//	name_prefix
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 12;
	$fdata["strName"] = "name_prefix";
	$fdata["GoodName"] = "name_prefix";
	$fdata["ownerTable"] = "placard";
	$fdata["Label"] = GetFieldLabel("placard_admin","name_prefix");
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


	$tdataplacard_admin["name_prefix"] = $fdata;
		$tdataplacard_admin[".searchableFields"][] = "name_prefix";
//	name_last
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 13;
	$fdata["strName"] = "name_last";
	$fdata["GoodName"] = "name_last";
	$fdata["ownerTable"] = "placard";
	$fdata["Label"] = GetFieldLabel("placard_admin","name_last");
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


	$tdataplacard_admin["name_last"] = $fdata;
		$tdataplacard_admin[".searchableFields"][] = "name_last";
//	position
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 14;
	$fdata["strName"] = "position";
	$fdata["GoodName"] = "position";
	$fdata["ownerTable"] = "placard";
	$fdata["Label"] = GetFieldLabel("placard_admin","position");
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


	$tdataplacard_admin["position"] = $fdata;
		$tdataplacard_admin[".searchableFields"][] = "position";
//	uuid
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 15;
	$fdata["strName"] = "uuid";
	$fdata["GoodName"] = "uuid";
	$fdata["ownerTable"] = "placard";
	$fdata["Label"] = GetFieldLabel("placard_admin","uuid");
	$fdata["FieldType"] = 201;


	
	
			

		$fdata["strField"] = "uuid";

	
		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "uuid";

	
	
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


	$tdataplacard_admin["uuid"] = $fdata;
		$tdataplacard_admin[".searchableFields"][] = "uuid";
//	image1
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 16;
	$fdata["strName"] = "image1";
	$fdata["GoodName"] = "image1";
	$fdata["ownerTable"] = "placard";
	$fdata["Label"] = GetFieldLabel("placard_admin","image1");
	$fdata["FieldType"] = 200;


	
	
			

		$fdata["strField"] = "image1";

		$fdata["sourceSingle"] = "image1";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "image1";

	
		$fdata["CompatibilityMode"] = true;

				$fdata["UploadFolder"] = "/website/vnn.mac.in.th/lic/Design/images/";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "File-based Image");

	
	
				$vdata["ShowThumbnail"] = true;
	$vdata["ThumbWidth"] = 200;
	$vdata["ThumbHeight"] = 150;
	$vdata["ImageWidth"] = 60;
	$vdata["ImageHeight"] = 40;

			$vdata["multipleImgMode"] = 1;
	$vdata["maxImages"] = 0;

			$vdata["showGallery"] = true;
	$vdata["galleryMode"] = 2;
	$vdata["captionMode"] = 2;
	$vdata["captionField"] = "";

	$vdata["imageBorder"] = 1;
	$vdata["imageFullWidth"] = 1;


	
	
	
	
	
	
	
	
		
	
	
	
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

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
	
	
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


	$fdata["Absolute"] = true;


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


	$tdataplacard_admin["image1"] = $fdata;
		$tdataplacard_admin[".searchableFields"][] = "image1";
//	create_date
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 17;
	$fdata["strName"] = "create_date";
	$fdata["GoodName"] = "create_date";
	$fdata["ownerTable"] = "placard";
	$fdata["Label"] = GetFieldLabel("placard_admin","create_date");
	$fdata["FieldType"] = 135;


	
	
			

		$fdata["strField"] = "create_date";

		$fdata["sourceSingle"] = "create_date";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "create_date";

	
	
				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "Datetime");

	
	
	
	
	
	
	
	
	
	
	
		
	
		$vdata["NeedEncode"] = true;

	
		$vdata["truncateText"] = true;
	$vdata["NumberOfChars"] = 80;

	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Readonly");

	
		$edata["weekdayMessage"] = array("message" => "Invalid week day", "messageType" => "Text");
	$edata["weekdays"] = "[]";


	
	



	
	
	
	
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


	$tdataplacard_admin["create_date"] = $fdata;
		$tdataplacard_admin[".searchableFields"][] = "create_date";
//	pdf_file1
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 18;
	$fdata["strName"] = "pdf_file1";
	$fdata["GoodName"] = "pdf_file1";
	$fdata["ownerTable"] = "placard";
	$fdata["Label"] = GetFieldLabel("placard_admin","pdf_file1");
	$fdata["FieldType"] = 201;


	
	
			

		$fdata["strField"] = "pdf_file1";

		$fdata["sourceSingle"] = "pdf_file1";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "pdf_file1";

	
		$fdata["CompatibilityMode"] = true;

				$fdata["UploadFolder"] = "/website/vnn.mac.in.th/lic/Design/images/";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "Document Download");

	
	
	
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


	
	



	
	
	
	
							$edata["acceptFileTypes"] = "pdf";
			$edata["acceptFileTypesHtml"] = ".pdf";
		$edata["acceptFileTypes"] = "(".$edata["acceptFileTypes"].")$";

		$edata["maxNumberOfFiles"] = 0;

	
	
	
	
	
	
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;


	$fdata["Absolute"] = true;


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


	$tdataplacard_admin["pdf_file1"] = $fdata;
		$tdataplacard_admin[".searchableFields"][] = "pdf_file1";
//	meeting_place
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 19;
	$fdata["strName"] = "meeting_place";
	$fdata["GoodName"] = "meeting_place";
	$fdata["ownerTable"] = "placard";
	$fdata["Label"] = GetFieldLabel("placard_admin","meeting_place");
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


	$tdataplacard_admin["meeting_place"] = $fdata;
		$tdataplacard_admin[".searchableFields"][] = "meeting_place";
//	pdf_image_url
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 20;
	$fdata["strName"] = "pdf_image_url";
	$fdata["GoodName"] = "pdf_image_url";
	$fdata["ownerTable"] = "placard";
	$fdata["Label"] = GetFieldLabel("placard_admin","pdf_image_url");
	$fdata["FieldType"] = 201;


	
	
			

		$fdata["strField"] = "pdf_image_url";

		$fdata["sourceSingle"] = "pdf_image_url";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "pdf_image_url";

	
	
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


	$tdataplacard_admin["pdf_image_url"] = $fdata;
		$tdataplacard_admin[".searchableFields"][] = "pdf_image_url";


$tables_data["placard admin"]=&$tdataplacard_admin;
$field_labels["placard_admin"] = &$fieldLabelsplacard_admin;
$fieldToolTips["placard_admin"] = &$fieldToolTipsplacard_admin;
$placeHolders["placard_admin"] = &$placeHoldersplacard_admin;
$page_titles["placard_admin"] = &$pageTitlesplacard_admin;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)

//if !@TABLE.bReportCrossTab

$detailsTablesData["placard admin"] = array();
//endif

// tables which are master tables for current table (detail)
$masterTablesData["placard admin"] = array();



// -----------------end  prepare master-details data arrays ------------------------------//



require_once(getabspath("classes/sql.php"));











function createSqlQuery_placard_admin()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "id,  owner_id,  publish,  subject,  content,  companyname,  `count`,  placard_to,  meeting_date,  meeting_time,  placard_date,  name_prefix,  name_last,  `position`,  uuid,  image1,  create_date,  pdf_file1,  meeting_place,  pdf_image_url";
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
	"m_srcTableName" => "placard admin"
));

$proto6["m_sql"] = "id";
$proto6["m_srcTableName"] = "placard admin";
$proto6["m_expr"]=$obj;
$proto6["m_alias"] = "";
$obj = new SQLFieldListItem($proto6);

$proto0["m_fieldlist"][]=$obj;
						$proto8=array();
			$obj = new SQLField(array(
	"m_strName" => "owner_id",
	"m_strTable" => "placard",
	"m_srcTableName" => "placard admin"
));

$proto8["m_sql"] = "owner_id";
$proto8["m_srcTableName"] = "placard admin";
$proto8["m_expr"]=$obj;
$proto8["m_alias"] = "";
$obj = new SQLFieldListItem($proto8);

$proto0["m_fieldlist"][]=$obj;
						$proto10=array();
			$obj = new SQLField(array(
	"m_strName" => "publish",
	"m_strTable" => "placard",
	"m_srcTableName" => "placard admin"
));

$proto10["m_sql"] = "publish";
$proto10["m_srcTableName"] = "placard admin";
$proto10["m_expr"]=$obj;
$proto10["m_alias"] = "";
$obj = new SQLFieldListItem($proto10);

$proto0["m_fieldlist"][]=$obj;
						$proto12=array();
			$obj = new SQLField(array(
	"m_strName" => "subject",
	"m_strTable" => "placard",
	"m_srcTableName" => "placard admin"
));

$proto12["m_sql"] = "subject";
$proto12["m_srcTableName"] = "placard admin";
$proto12["m_expr"]=$obj;
$proto12["m_alias"] = "";
$obj = new SQLFieldListItem($proto12);

$proto0["m_fieldlist"][]=$obj;
						$proto14=array();
			$obj = new SQLField(array(
	"m_strName" => "content",
	"m_strTable" => "placard",
	"m_srcTableName" => "placard admin"
));

$proto14["m_sql"] = "content";
$proto14["m_srcTableName"] = "placard admin";
$proto14["m_expr"]=$obj;
$proto14["m_alias"] = "";
$obj = new SQLFieldListItem($proto14);

$proto0["m_fieldlist"][]=$obj;
						$proto16=array();
			$obj = new SQLField(array(
	"m_strName" => "companyname",
	"m_strTable" => "placard",
	"m_srcTableName" => "placard admin"
));

$proto16["m_sql"] = "companyname";
$proto16["m_srcTableName"] = "placard admin";
$proto16["m_expr"]=$obj;
$proto16["m_alias"] = "";
$obj = new SQLFieldListItem($proto16);

$proto0["m_fieldlist"][]=$obj;
						$proto18=array();
			$obj = new SQLField(array(
	"m_strName" => "count",
	"m_strTable" => "placard",
	"m_srcTableName" => "placard admin"
));

$proto18["m_sql"] = "`count`";
$proto18["m_srcTableName"] = "placard admin";
$proto18["m_expr"]=$obj;
$proto18["m_alias"] = "";
$obj = new SQLFieldListItem($proto18);

$proto0["m_fieldlist"][]=$obj;
						$proto20=array();
			$obj = new SQLField(array(
	"m_strName" => "placard_to",
	"m_strTable" => "placard",
	"m_srcTableName" => "placard admin"
));

$proto20["m_sql"] = "placard_to";
$proto20["m_srcTableName"] = "placard admin";
$proto20["m_expr"]=$obj;
$proto20["m_alias"] = "";
$obj = new SQLFieldListItem($proto20);

$proto0["m_fieldlist"][]=$obj;
						$proto22=array();
			$obj = new SQLField(array(
	"m_strName" => "meeting_date",
	"m_strTable" => "placard",
	"m_srcTableName" => "placard admin"
));

$proto22["m_sql"] = "meeting_date";
$proto22["m_srcTableName"] = "placard admin";
$proto22["m_expr"]=$obj;
$proto22["m_alias"] = "";
$obj = new SQLFieldListItem($proto22);

$proto0["m_fieldlist"][]=$obj;
						$proto24=array();
			$obj = new SQLField(array(
	"m_strName" => "meeting_time",
	"m_strTable" => "placard",
	"m_srcTableName" => "placard admin"
));

$proto24["m_sql"] = "meeting_time";
$proto24["m_srcTableName"] = "placard admin";
$proto24["m_expr"]=$obj;
$proto24["m_alias"] = "";
$obj = new SQLFieldListItem($proto24);

$proto0["m_fieldlist"][]=$obj;
						$proto26=array();
			$obj = new SQLField(array(
	"m_strName" => "placard_date",
	"m_strTable" => "placard",
	"m_srcTableName" => "placard admin"
));

$proto26["m_sql"] = "placard_date";
$proto26["m_srcTableName"] = "placard admin";
$proto26["m_expr"]=$obj;
$proto26["m_alias"] = "";
$obj = new SQLFieldListItem($proto26);

$proto0["m_fieldlist"][]=$obj;
						$proto28=array();
			$obj = new SQLField(array(
	"m_strName" => "name_prefix",
	"m_strTable" => "placard",
	"m_srcTableName" => "placard admin"
));

$proto28["m_sql"] = "name_prefix";
$proto28["m_srcTableName"] = "placard admin";
$proto28["m_expr"]=$obj;
$proto28["m_alias"] = "";
$obj = new SQLFieldListItem($proto28);

$proto0["m_fieldlist"][]=$obj;
						$proto30=array();
			$obj = new SQLField(array(
	"m_strName" => "name_last",
	"m_strTable" => "placard",
	"m_srcTableName" => "placard admin"
));

$proto30["m_sql"] = "name_last";
$proto30["m_srcTableName"] = "placard admin";
$proto30["m_expr"]=$obj;
$proto30["m_alias"] = "";
$obj = new SQLFieldListItem($proto30);

$proto0["m_fieldlist"][]=$obj;
						$proto32=array();
			$obj = new SQLField(array(
	"m_strName" => "position",
	"m_strTable" => "placard",
	"m_srcTableName" => "placard admin"
));

$proto32["m_sql"] = "`position`";
$proto32["m_srcTableName"] = "placard admin";
$proto32["m_expr"]=$obj;
$proto32["m_alias"] = "";
$obj = new SQLFieldListItem($proto32);

$proto0["m_fieldlist"][]=$obj;
						$proto34=array();
			$obj = new SQLField(array(
	"m_strName" => "uuid",
	"m_strTable" => "placard",
	"m_srcTableName" => "placard admin"
));

$proto34["m_sql"] = "uuid";
$proto34["m_srcTableName"] = "placard admin";
$proto34["m_expr"]=$obj;
$proto34["m_alias"] = "";
$obj = new SQLFieldListItem($proto34);

$proto0["m_fieldlist"][]=$obj;
						$proto36=array();
			$obj = new SQLField(array(
	"m_strName" => "image1",
	"m_strTable" => "placard",
	"m_srcTableName" => "placard admin"
));

$proto36["m_sql"] = "image1";
$proto36["m_srcTableName"] = "placard admin";
$proto36["m_expr"]=$obj;
$proto36["m_alias"] = "";
$obj = new SQLFieldListItem($proto36);

$proto0["m_fieldlist"][]=$obj;
						$proto38=array();
			$obj = new SQLField(array(
	"m_strName" => "create_date",
	"m_strTable" => "placard",
	"m_srcTableName" => "placard admin"
));

$proto38["m_sql"] = "create_date";
$proto38["m_srcTableName"] = "placard admin";
$proto38["m_expr"]=$obj;
$proto38["m_alias"] = "";
$obj = new SQLFieldListItem($proto38);

$proto0["m_fieldlist"][]=$obj;
						$proto40=array();
			$obj = new SQLField(array(
	"m_strName" => "pdf_file1",
	"m_strTable" => "placard",
	"m_srcTableName" => "placard admin"
));

$proto40["m_sql"] = "pdf_file1";
$proto40["m_srcTableName"] = "placard admin";
$proto40["m_expr"]=$obj;
$proto40["m_alias"] = "";
$obj = new SQLFieldListItem($proto40);

$proto0["m_fieldlist"][]=$obj;
						$proto42=array();
			$obj = new SQLField(array(
	"m_strName" => "meeting_place",
	"m_strTable" => "placard",
	"m_srcTableName" => "placard admin"
));

$proto42["m_sql"] = "meeting_place";
$proto42["m_srcTableName"] = "placard admin";
$proto42["m_expr"]=$obj;
$proto42["m_alias"] = "";
$obj = new SQLFieldListItem($proto42);

$proto0["m_fieldlist"][]=$obj;
						$proto44=array();
			$obj = new SQLField(array(
	"m_strName" => "pdf_image_url",
	"m_strTable" => "placard",
	"m_srcTableName" => "placard admin"
));

$proto44["m_sql"] = "pdf_image_url";
$proto44["m_srcTableName"] = "placard admin";
$proto44["m_expr"]=$obj;
$proto44["m_alias"] = "";
$obj = new SQLFieldListItem($proto44);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto46=array();
$proto46["m_link"] = "SQLL_MAIN";
			$proto47=array();
$proto47["m_strName"] = "placard";
$proto47["m_srcTableName"] = "placard admin";
$proto47["m_columns"] = array();
$proto47["m_columns"][] = "id";
$proto47["m_columns"][] = "owner_id";
$proto47["m_columns"][] = "publish";
$proto47["m_columns"][] = "subject";
$proto47["m_columns"][] = "content";
$proto47["m_columns"][] = "companyname";
$proto47["m_columns"][] = "count";
$proto47["m_columns"][] = "placard_to";
$proto47["m_columns"][] = "meeting_date";
$proto47["m_columns"][] = "meeting_time";
$proto47["m_columns"][] = "meeting_place";
$proto47["m_columns"][] = "placard_date";
$proto47["m_columns"][] = "name_prefix";
$proto47["m_columns"][] = "name_last";
$proto47["m_columns"][] = "position";
$proto47["m_columns"][] = "uuid";
$proto47["m_columns"][] = "create_date";
$proto47["m_columns"][] = "image1";
$proto47["m_columns"][] = "pdf_file1";
$proto47["m_columns"][] = "pdf_image_url";
$obj = new SQLTable($proto47);

$proto46["m_table"] = $obj;
$proto46["m_sql"] = "placard";
$proto46["m_alias"] = "";
$proto46["m_srcTableName"] = "placard admin";
$proto48=array();
$proto48["m_sql"] = "";
$proto48["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto48["m_column"]=$obj;
$proto48["m_contained"] = array();
$proto48["m_strCase"] = "";
$proto48["m_havingmode"] = false;
$proto48["m_inBrackets"] = false;
$proto48["m_useAlias"] = false;
$obj = new SQLLogicalExpr($proto48);

$proto46["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto46);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
												$proto50=array();
						$obj = new SQLField(array(
	"m_strName" => "id",
	"m_strTable" => "placard",
	"m_srcTableName" => "placard admin"
));

$proto50["m_column"]=$obj;
$proto50["m_bAsc"] = 0;
$proto50["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto50);

$proto0["m_orderby"][]=$obj;					
$proto0["m_srcTableName"]="placard admin";		
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_placard_admin = createSqlQuery_placard_admin();


	
		;

																				

$tdataplacard_admin[".sqlquery"] = $queryData_placard_admin;



include_once(getabspath("include/placard_admin_events.php"));
$tableEvents["placard admin"] = new eventclass_placard_admin;
$tdataplacard_admin[".hasEvents"] = true;

?>