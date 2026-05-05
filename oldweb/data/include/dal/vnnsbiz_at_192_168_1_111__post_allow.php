<?php
$dalTablepost_allow = array();
$dalTablepost_allow["email"] = array("type"=>200,"varname"=>"email", "name" => "email");
$dalTablepost_allow["total_coin"] = array("type"=>14,"varname"=>"total_coin", "name" => "total_coin");
$dalTablepost_allow["total_placard"] = array("type"=>20,"varname"=>"total_placard", "name" => "total_placard");
$dalTablepost_allow["coin_left"] = array("type"=>14,"varname"=>"coin_left", "name" => "coin_left");
$dalTablepost_allow["POST_ALLOW"] = array("type"=>200,"varname"=>"POST_ALLOW", "name" => "POST_ALLOW");

$dal_info["vnnsbiz_at_192_168_1_111__post_allow"] = &$dalTablepost_allow;
?>