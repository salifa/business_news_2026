<?php
$dalTablecredit_transactions = array();
$dalTablecredit_transactions["id"] = array("type"=>3,"varname"=>"id", "name" => "id");
$dalTablecredit_transactions["owner_id"] = array("type"=>200,"varname"=>"owner_id", "name" => "owner_id");
$dalTablecredit_transactions["package"] = array("type"=>200,"varname"=>"package", "name" => "package");
$dalTablecredit_transactions["amouth"] = array("type"=>3,"varname"=>"amouth", "name" => "amouth");
$dalTablecredit_transactions["buy_timestamp"] = array("type"=>135,"varname"=>"buy_timestamp", "name" => "buy_timestamp");
$dalTablecredit_transactions["approved"] = array("type"=>200,"varname"=>"approved", "name" => "approved");
$dalTablecredit_transactions["slipup_upload"] = array("type"=>200,"varname"=>"slipup_upload", "name" => "slipup_upload");
$dalTablecredit_transactions["approved_timestamp"] = array("type"=>135,"varname"=>"approved_timestamp", "name" => "approved_timestamp");
$dalTablecredit_transactions["coin"] = array("type"=>3,"varname"=>"coin", "name" => "coin");
	$dalTablecredit_transactions["id"]["key"]=true;

$dal_info["vnnsbiz_at_192_168_1_111__credit_transactions"] = &$dalTablecredit_transactions;
?>