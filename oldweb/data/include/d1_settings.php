<?php
require_once(getabspath("classes/cipherer.php"));



$tdatad1 = array();
$tdatad1[".ShortName"] = "d1";

$tdatad1[".pagesByType"] = my_json_decode( "{\"dashboard\":[\"dashboard\"],\"search\":[\"search\"]}" );
$tdatad1[".originalPagesByType"] = $tdatad1[".pagesByType"];
$tdatad1[".pages"] = types2pages( my_json_decode( "{\"dashboard\":[\"dashboard\"],\"search\":[\"search\"]}" ) );
$tdatad1[".originalPages"] = $tdatad1[".pages"];
$tdatad1[".defaultPages"] = my_json_decode( "{\"dashboard\":\"dashboard\",\"search\":\"search\"}" );
$tdatad1[".originalDefaultPages"] = $tdatad1[".defaultPages"];


//	field labels
$fieldLabelsd1 = array();
$pageTitlesd1 = array();

if(mlang_getcurrentlang()=="English")
{
	$fieldLabelsd1["English"] = array();
	$fieldLabelsd1["English"]["placard_id"] = "Id";
	$fieldLabelsd1["English"]["placard_owner_id"] = "Owner Id";
	$fieldLabelsd1["English"]["placard_publish"] = "Publish";
	$fieldLabelsd1["English"]["placard_subject"] = "Subject";
	$fieldLabelsd1["English"]["placard_content"] = "Content";
	$fieldLabelsd1["English"]["placard_companyname"] = "Companyname";
	$fieldLabelsd1["English"]["placard_count"] = "Count";
	$fieldLabelsd1["English"]["placard_placard_to"] = "Placard To";
	$fieldLabelsd1["English"]["placard_meeting_date"] = "Meeting Date";
	$fieldLabelsd1["English"]["placard_meeting_time"] = "Meeting Time";
	$fieldLabelsd1["English"]["placard_placard_date"] = "Placard Date";
	$fieldLabelsd1["English"]["placard_name_prefix"] = "Name Prefix";
	$fieldLabelsd1["English"]["placard_name_last"] = "Name Last";
	$fieldLabelsd1["English"]["placard_position"] = "Position";
	$fieldLabelsd1["English"]["placard_tdate"] = "Tdate";
	$fieldLabelsd1["English"]["placard_image1"] = "Image1";
	$fieldLabelsd1["English"]["placard_pdf_file1"] = "Pdf File1";
}
if(mlang_getcurrentlang()=="Thai")
{
	$fieldLabelsd1["Thai"] = array();
	$fieldLabelsd1["Thai"]["placard_id"] = "Id";
	$fieldLabelsd1["Thai"]["placard_owner_id"] = "Owner Id";
	$fieldLabelsd1["Thai"]["placard_publish"] = "แสดง";
	$fieldLabelsd1["Thai"]["placard_subject"] = "หัวข้อ / เรื่อง";
	$fieldLabelsd1["Thai"]["placard_content"] = "วาระการประชุม";
	$fieldLabelsd1["Thai"]["placard_companyname"] = "ชื่อบริษัท / ชื่อหน่วยงาน";
	$fieldLabelsd1["Thai"]["placard_count"] = "ครั้งที่ประชุม";
	$fieldLabelsd1["Thai"]["placard_placard_to"] = "ประกาศถึง";
	$fieldLabelsd1["Thai"]["placard_meeting_date"] = "วันที่จัดประชุม";
	$fieldLabelsd1["Thai"]["placard_meeting_time"] = "เวลาจัดประชุม";
	$fieldLabelsd1["Thai"]["placard_placard_date"] = "วันที่ลงโฆษณา";
	$fieldLabelsd1["Thai"]["placard_name_prefix"] = "คำนำหน้าชื่อ";
	$fieldLabelsd1["Thai"]["placard_name_last"] = "ชื่อ-นามสกุล";
	$fieldLabelsd1["Thai"]["placard_position"] = "ตำแหน่งผู้ลงนาม";
	$fieldLabelsd1["Thai"]["placard_tdate"] = "Tdate";
	$fieldLabelsd1["Thai"]["placard_image1"] = "ภาพหน้าแรก";
	$fieldLabelsd1["Thai"]["placard_pdf_file1"] = "Pdf File1";
}

//	search fields
$tdatad1[".searchFields"] = array();
$dashField = array();
$dashField[] = array( "table"=>"placard", "field"=>"id" );
$tdatad1[".searchFields"]["placard_id"] = $dashField;
$dashField = array();
$dashField[] = array( "table"=>"placard", "field"=>"owner_id" );
$tdatad1[".searchFields"]["placard_owner_id"] = $dashField;
$dashField = array();
$dashField[] = array( "table"=>"placard", "field"=>"publish" );
$tdatad1[".searchFields"]["placard_publish"] = $dashField;
$dashField = array();
$dashField[] = array( "table"=>"placard", "field"=>"subject" );
$tdatad1[".searchFields"]["placard_subject"] = $dashField;
$dashField = array();
$dashField[] = array( "table"=>"placard", "field"=>"content" );
$tdatad1[".searchFields"]["placard_content"] = $dashField;
$dashField = array();
$dashField[] = array( "table"=>"placard", "field"=>"companyname" );
$tdatad1[".searchFields"]["placard_companyname"] = $dashField;
$dashField = array();
$dashField[] = array( "table"=>"placard", "field"=>"count" );
$tdatad1[".searchFields"]["placard_count"] = $dashField;
$dashField = array();
$dashField[] = array( "table"=>"placard", "field"=>"placard_to" );
$tdatad1[".searchFields"]["placard_placard_to"] = $dashField;
$dashField = array();
$dashField[] = array( "table"=>"placard", "field"=>"meeting_date" );
$tdatad1[".searchFields"]["placard_meeting_date"] = $dashField;
$dashField = array();
$dashField[] = array( "table"=>"placard", "field"=>"meeting_time" );
$tdatad1[".searchFields"]["placard_meeting_time"] = $dashField;
$dashField = array();
$dashField[] = array( "table"=>"placard", "field"=>"placard_date" );
$tdatad1[".searchFields"]["placard_placard_date"] = $dashField;
$dashField = array();
$dashField[] = array( "table"=>"placard", "field"=>"name_prefix" );
$tdatad1[".searchFields"]["placard_name_prefix"] = $dashField;
$dashField = array();
$dashField[] = array( "table"=>"placard", "field"=>"name_last" );
$tdatad1[".searchFields"]["placard_name_last"] = $dashField;
$dashField = array();
$dashField[] = array( "table"=>"placard", "field"=>"position" );
$tdatad1[".searchFields"]["placard_position"] = $dashField;
$dashField = array();
$dashField[] = array( "table"=>"placard", "field"=>"tdate" );
$tdatad1[".searchFields"]["placard_tdate"] = $dashField;
$dashField = array();
$dashField[] = array( "table"=>"placard", "field"=>"image1" );
$tdatad1[".searchFields"]["placard_image1"] = $dashField;
$dashField = array();
$dashField[] = array( "table"=>"placard", "field"=>"pdf_file1" );
$tdatad1[".searchFields"]["placard_pdf_file1"] = $dashField;

// all search fields
$tdatad1[".allSearchFields"] = array();
$tdatad1[".allSearchFields"][] = "placard_id";
$tdatad1[".allSearchFields"][] = "placard_owner_id";
$tdatad1[".allSearchFields"][] = "placard_publish";
$tdatad1[".allSearchFields"][] = "placard_subject";
$tdatad1[".allSearchFields"][] = "placard_content";
$tdatad1[".allSearchFields"][] = "placard_companyname";
$tdatad1[".allSearchFields"][] = "placard_count";
$tdatad1[".allSearchFields"][] = "placard_placard_to";
$tdatad1[".allSearchFields"][] = "placard_meeting_date";
$tdatad1[".allSearchFields"][] = "placard_meeting_time";
$tdatad1[".allSearchFields"][] = "placard_placard_date";
$tdatad1[".allSearchFields"][] = "placard_name_prefix";
$tdatad1[".allSearchFields"][] = "placard_name_last";
$tdatad1[".allSearchFields"][] = "placard_position";
$tdatad1[".allSearchFields"][] = "placard_tdate";
$tdatad1[".allSearchFields"][] = "placard_image1";
$tdatad1[".allSearchFields"][] = "placard_pdf_file1";

// good like search fields
$tdatad1[".googleLikeFields"] = array();
$tdatad1[".googleLikeFields"][] = "placard_id";
$tdatad1[".googleLikeFields"][] = "placard_owner_id";
$tdatad1[".googleLikeFields"][] = "placard_publish";
$tdatad1[".googleLikeFields"][] = "placard_subject";
$tdatad1[".googleLikeFields"][] = "placard_content";
$tdatad1[".googleLikeFields"][] = "placard_companyname";
$tdatad1[".googleLikeFields"][] = "placard_count";
$tdatad1[".googleLikeFields"][] = "placard_placard_to";
$tdatad1[".googleLikeFields"][] = "placard_meeting_date";
$tdatad1[".googleLikeFields"][] = "placard_meeting_time";
$tdatad1[".googleLikeFields"][] = "placard_placard_date";
$tdatad1[".googleLikeFields"][] = "placard_name_prefix";
$tdatad1[".googleLikeFields"][] = "placard_name_last";
$tdatad1[".googleLikeFields"][] = "placard_position";
$tdatad1[".googleLikeFields"][] = "placard_tdate";
$tdatad1[".googleLikeFields"][] = "placard_image1";
$tdatad1[".googleLikeFields"][] = "placard_pdf_file1";

$tdatad1[".dashElements"] = array();

	$dbelement = array( "elementName" => "placard_list", "table" => "placard",
		 "pageName" => "D1_list","type" => 0);
	$dbelement["cellName"] = "cell_1_0";

					$dbelement["inlineAdd"] = 0 > 0;
	$dbelement["inlineEdit"] = 0 > 0;
	$dbelement["deleteRecord"] = 0 > 0;
	$dbelement["copy"] = 0 > 0;

	$dbelement["popupAdd"] = 0 > 0;
	$dbelement["popupEdit"] = 0 > 0;
	$dbelement["popupView"] = 0 > 0;

	$dbelement["updateSelected"] = 0 > 0;


	$tdatad1[".dashElements"][] = $dbelement;
	$dbelement = array( "elementName" => "credit_transactions_list", "table" => "credit_transactions",
		 "pageName" => "D1_credit_list","type" => 0);
	$dbelement["cellName"] = "cell_0_0";

					$dbelement["inlineAdd"] = 0 > 0;
	$dbelement["inlineEdit"] = 0 > 0;
	$dbelement["deleteRecord"] = 0 > 0;
	$dbelement["copy"] = 0 > 0;

	$dbelement["popupAdd"] = 0 > 0;
	$dbelement["popupEdit"] = 0 > 0;
	$dbelement["popupView"] = 0 > 0;

	$dbelement["updateSelected"] = 0 > 0;


	$tdatad1[".dashElements"][] = $dbelement;
	$dbelement = array( "elementName" => "d1_snippet", "table" => "D1",
		 "pageName" => "","type" => 7);
	$dbelement["cellName"] = "cell_0_1";

				$dbelement["snippetId"] = "D1_snippet";


	$tdatad1[".dashElements"][] = $dbelement;

$tdatad1[".shortTableName"] = "d1";
$tdatad1[".entityType"] = 4;




include_once(getabspath("include/d1_events.php"));
$tableEvents["D1"] = new eventclass_d1;
$tdatad1[".hasEvents"] = true;


$tdatad1[".tableType"] = "dashboard";


			
$tdatad1[".addPageEvents"] = false;

$tdatad1[".isUseAjaxSuggest"] = true;

$tables_data["D1"]=&$tdatad1;
$field_labels["D1"] = &$fieldLabelsd1;
$page_titles["D1"] = &$pageTitlesd1;

?>