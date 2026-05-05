<?php
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

require_once("include/dbcommon.php");
require_once("classes/button.php");

//	CSRF protection
if( !isPostRequest() )
	return;

$params = (array)my_json_decode(postvalue('params'));

if( $params["_base64fields"] ) {
	foreach( $params["_base64fields"] as $f ) {
		$params[$f] = base64_str2bin( $params[$f] );
	}
}

$buttId = $params['buttId'];
$eventId = postvalue('event');
$table = $params['table'];
if( !GetTableURL( $table ) ) {
	exit;
}
$page = $params['page'];
if( !Security::userCanSeePage($table, $page ) ) {
	exit;
}

$pSet = new ProjectSettings( $table, "", $page );
if( $buttId ) {
	$pageButtons = $pSet->customButtons();
	if( array_search( $buttId , $pageButtons ) === false ) {
		exit;
	}
}

$params["masterTable"] = postValue("masterTable");;
$params["masterKeys"] = array();
// RunnerPage::readMasterKeysFromRequest
$i = 1;
while( isset( $_REQUEST["masterkey".$i] ) ) {
	$params["masterKeys"][ $i ] = $_REQUEST["masterkey".$i];
	$i++;
}


if($buttId=='________')
{
	//  for login page users table can be turned off
	if( $table != GLOBAL_PAGES )
	{
		require_once("include/". GetTableURL( $table ) ."_variables.php");
		$cipherer = new RunnerCipherer( $table );
	}
	buttonHandler_________($params);
}

if( $eventId == 'meeting_date_event' && "placard" == $table )
{
	require_once("include/placard_variables.php");
	$cipherer = new RunnerCipherer("placard");
	fieldEventHandler_meeting_date_event( $params );
}
if( $eventId == 'meeting_date_event' && "placard admin" == $table )
{
	require_once("include/placard_admin_variables.php");
	$cipherer = new RunnerCipherer("placard admin");
	fieldEventHandler_meeting_date_event( $params );
}
if( $eventId == 'subject_event' && "placard" == $table )
{
	require_once("include/placard_variables.php");
	$cipherer = new RunnerCipherer("placard");
	fieldEventHandler_subject_event( $params );
}
if( $eventId == 'subject_event' && "placard admin" == $table )
{
	require_once("include/placard_admin_variables.php");
	$cipherer = new RunnerCipherer("placard admin");
	fieldEventHandler_subject_event( $params );
}
if( $eventId == 'subject_event' && "placard_download" == $table )
{
	require_once("include/placard_download_variables.php");
	$cipherer = new RunnerCipherer("placard_download");
	fieldEventHandler_subject_event( $params );
}




// create table and non table handlers
function buttonHandler_________($params)
{
	global $strTableName;
	$result = array();

	// create new button object for get record data
	$params["keys"] = (array)my_json_decode(postvalue('keys'));
	$params["isManyKeys"] = postvalue('isManyKeys');
	$params["location"] = postvalue('location');

	$button = new Button($params);
	$ajax = $button; // for examle from HELP
	$keys = $button->getKeys();

	$masterData = false;
	if ( isset($params['masterData']) && count($params['masterData']) > 0 )
	{
		$masterData = $params['masterData'];
	}
	else if ( isset($params["masterTable"]) )
	{
		$masterData = $button->getMasterData($params["masterTable"]);
	}
	
	$contextParams = array();
	if ( $params["location"] == PAGE_VIEW )
	{
		$contextParams["data"] = $button->getRecordData();
		$contextParams["masterData"] = $masterData;
	}
	else if ( $params["location"] == PAGE_EDIT )
	{
		$contextParams["data"] = $button->getRecordData();
		$contextParams["newData"] = $params['fieldsData'];
		$contextParams["masterData"] = $masterData;
	}
	else if ( $params["location"] == "grid" )
	{	
		$params["location"] = "list";
		$contextParams["data"] = $button->getRecordData();
		$contextParams["newData"] = $params['fieldsData'];
		$contextParams["masterData"] = $masterData;
	}
	else 
	{
		$contextParams["masterData"] = $masterData;
	}

	RunnerContext::push( new RunnerContextItem( $params["location"], $contextParams));
	// Put your code here.
$result["txt"] = $params["txt"]." world!";
;
	RunnerContext::pop();
	echo my_json_encode($result);
	$button->deleteTempFiles();
}


		
function fieldEventHandler_meeting_date_event( $params )
{
	$params["keys"] = (array)my_json_decode(postvalue('keys'));
	$params["isManyKeys"] = false;
	$params["location"] = postvalue('pageType');
	
	$button = new Button($params);
	$keys = $button->getKeys();
	$ajax = $button; // for examle from HELP
	$result = array();
	
	$pageType = postvalue("pageType");
	$fieldsData = my_json_decode( postvalue("fieldsData") );
	
	$contextParams = array(
		"data" => $fieldsData,
		"masterData" => $_SESSION[ $masterTable . "_masterRecordData" ]
	);
	
	RunnerContext::push( new RunnerContextItem( CONTEXT_ROW, $contextParams ) );
	;
	RunnerContext::pop();
	
	echo my_json_encode( $result );
	$button->deleteTempFiles();
}
function fieldEventHandler_subject_event( $params )
{
	$params["keys"] = (array)my_json_decode(postvalue('keys'));
	$params["isManyKeys"] = false;
	$params["location"] = postvalue('pageType');
	
	$button = new Button($params);
	$keys = $button->getKeys();
	$ajax = $button; // for examle from HELP
	$result = array();
	
	$pageType = postvalue("pageType");
	$fieldsData = my_json_decode( postvalue("fieldsData") );
	
	$contextParams = array(
		"data" => $fieldsData,
		"masterData" => $_SESSION[ $masterTable . "_masterRecordData" ]
	);
	
	RunnerContext::push( new RunnerContextItem( CONTEXT_ROW, $contextParams ) );
	



if ($params["choices_id"] = "เชิญประชุมปิดงบประจำปี" ) {
	$result["contents"] = "1. รับรองรายงานการประชุมครั้งที่ผ่านมา\n2. รายงานผลการดำเนินงานของบริษัทและรับรองงบการเงินประจำปี\n3. พิจารณาแต่งตั้งผู้สอบบัญชีและกำหนดค่าตอบแทนประจำปี\n4. พิจารณาแต่งตั้งคณะกรรมการแทนกรรมการที่จะครบกำหนดออกตามวาระ\n5. พิจารณาเงินปันผล การจัดสรรทุนสำรองตามกฎหมายและบำเหน็จกรรมการ\n6. พิจารณาเรื่องอื่นๆ (ถ้ามี)"; }
else {
	$result["contents"] = "ป้อนข้อความเอง"; }



//global $conn ;
//$sql = "select * from contents where choices_id='เชิญประชุมปิดงบประจำปี'" . " limit 1" ;
//$result1 = mysql_query( $conn,$sql );
//if ( mysql_num_rows($result1) > 0 ) {
//	while ($row = mysql_fetch_assoc($result1)) {
//	 $result["contents"] = $row["contents"];		
//	}
//} else {
//	echo "0 result";
//}

//global $conn ;
//$result["contents"] = $params ["choices_id"];
// เชิญประชุมปิดงบประจำปี

//$sql = "select * from contents where choices_id='". $params . "'" ;
//db_exec ($sql,$conn);


  
//$data = mysql_db_query("select * from contents where choices_id='".$params."'") ;
//$result['record'] = $data;
//$result['contents'] = $data["contents"];

//echo($result);;
	RunnerContext::pop();
	
	echo my_json_encode( $result );
	$button->deleteTempFiles();
}
?>
