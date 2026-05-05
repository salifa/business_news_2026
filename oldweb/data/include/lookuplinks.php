<?php

/**
* getLookupMainTableSettings - tests whether the lookup link exists between the tables
*
*  returns array with ProjectSettings class for main table if the link exists in project settings.
*  returns NULL otherwise
*/
function getLookupMainTableSettings($lookupTable, $mainTableShortName, $mainField, $desiredPage = "")
{
	global $lookupTableLinks;
	if(!isset($lookupTableLinks[$lookupTable]))
		return null;
	if(!isset($lookupTableLinks[$lookupTable][$mainTableShortName.".".$mainField]))
		return null;
	$arr = &$lookupTableLinks[$lookupTable][$mainTableShortName.".".$mainField];
	$effectivePage = $desiredPage;
	if(!isset($arr[$effectivePage]))
	{
		$effectivePage = PAGE_EDIT;
		if(!isset($arr[$effectivePage]))
		{
			if($desiredPage == "" && 0 < count($arr))
			{
				$effectivePage = $arr[0];
			}
			else
				return null;
		}
	}
	return new ProjectSettings($arr[$effectivePage]["table"], $effectivePage);
}

/** 
* $lookupTableLinks array stores all lookup links between tables in the project
*/
function InitLookupLinks()
{
	global $lookupTableLinks;

	$lookupTableLinks = array();

		if( !isset( $lookupTableLinks["choices"] ) ) {
			$lookupTableLinks["choices"] = array();
		}
		if( !isset( $lookupTableLinks["choices"]["placard.subject"] )) {
			$lookupTableLinks["choices"]["placard.subject"] = array();
		}
		$lookupTableLinks["choices"]["placard.subject"]["edit"] = array("table" => "placard", "field" => "subject", "page" => "edit");
		if( !isset( $lookupTableLinks["choices"] ) ) {
			$lookupTableLinks["choices"] = array();
		}
		if( !isset( $lookupTableLinks["choices"]["placard.subject"] )) {
			$lookupTableLinks["choices"]["placard.subject"] = array();
		}
		$lookupTableLinks["choices"]["placard.subject"]["add"] = array("table" => "placard", "field" => "subject", "page" => "add");
		if( !isset( $lookupTableLinks["choices"] ) ) {
			$lookupTableLinks["choices"] = array();
		}
		if( !isset( $lookupTableLinks["choices"]["placard.subject"] )) {
			$lookupTableLinks["choices"]["placard.subject"] = array();
		}
		$lookupTableLinks["choices"]["placard.subject"]["search"] = array("table" => "placard", "field" => "subject", "page" => "search");
		if( !isset( $lookupTableLinks["choices"] ) ) {
			$lookupTableLinks["choices"] = array();
		}
		if( !isset( $lookupTableLinks["choices"]["placard_admin.subject"] )) {
			$lookupTableLinks["choices"]["placard_admin.subject"] = array();
		}
		$lookupTableLinks["choices"]["placard_admin.subject"]["edit"] = array("table" => "placard admin", "field" => "subject", "page" => "edit");
		if( !isset( $lookupTableLinks["choices"] ) ) {
			$lookupTableLinks["choices"] = array();
		}
		if( !isset( $lookupTableLinks["choices"]["placard_admin.subject"] )) {
			$lookupTableLinks["choices"]["placard_admin.subject"] = array();
		}
		$lookupTableLinks["choices"]["placard_admin.subject"]["add"] = array("table" => "placard admin", "field" => "subject", "page" => "add");
		if( !isset( $lookupTableLinks["choices"] ) ) {
			$lookupTableLinks["choices"] = array();
		}
		if( !isset( $lookupTableLinks["choices"]["placard_admin.subject"] )) {
			$lookupTableLinks["choices"]["placard_admin.subject"] = array();
		}
		$lookupTableLinks["choices"]["placard_admin.subject"]["search"] = array("table" => "placard admin", "field" => "subject", "page" => "search");
		if( !isset( $lookupTableLinks["choices"] ) ) {
			$lookupTableLinks["choices"] = array();
		}
		if( !isset( $lookupTableLinks["choices"]["placard_download.subject"] )) {
			$lookupTableLinks["choices"]["placard_download.subject"] = array();
		}
		$lookupTableLinks["choices"]["placard_download.subject"]["edit"] = array("table" => "placard_download", "field" => "subject", "page" => "edit");
		if( !isset( $lookupTableLinks["choices"] ) ) {
			$lookupTableLinks["choices"] = array();
		}
		if( !isset( $lookupTableLinks["choices"]["placard_download.subject"] )) {
			$lookupTableLinks["choices"]["placard_download.subject"] = array();
		}
		$lookupTableLinks["choices"]["placard_download.subject"]["add"] = array("table" => "placard_download", "field" => "subject", "page" => "add");
		if( !isset( $lookupTableLinks["choices"] ) ) {
			$lookupTableLinks["choices"] = array();
		}
		if( !isset( $lookupTableLinks["choices"]["placard_download.subject"] )) {
			$lookupTableLinks["choices"]["placard_download.subject"] = array();
		}
		$lookupTableLinks["choices"]["placard_download.subject"]["search"] = array("table" => "placard_download", "field" => "subject", "page" => "search");
}

?>