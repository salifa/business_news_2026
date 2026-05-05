<?php
$dalTablepayment = array();
$dalTablepayment["id"] = array("type"=>3,"varname"=>"id", "name" => "id");
$dalTablepayment["owner_id"] = array("type"=>200,"varname"=>"owner_id", "name" => "owner_id");
$dalTablepayment["paydate"] = array("type"=>7,"varname"=>"paydate", "name" => "paydate");
$dalTablepayment["paytime"] = array("type"=>134,"varname"=>"paytime", "name" => "paytime");
$dalTablepayment["amount"] = array("type"=>3,"varname"=>"amount", "name" => "amount");
$dalTablepayment["slip_upload"] = array("type"=>200,"varname"=>"slip_upload", "name" => "slip_upload");
$dalTablepayment["remark"] = array("type"=>200,"varname"=>"remark", "name" => "remark");
$dalTablepayment["admin_confirm"] = array("type"=>200,"varname"=>"admin_confirm", "name" => "admin_confirm");
	$dalTablepayment["id"]["key"]=true;

$dal_info["vnnsbiz_at_192_168_1_111__payment"] = &$dalTablepayment;
?>