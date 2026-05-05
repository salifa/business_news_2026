<?php
$topscoint_left = array();
		$topscoint_left["selectList"] = array(
		"subtype" => "sql",
		"sql" => "SELECT
	sum(credit_transactions.coin ) as total_coin,
	count(placard.id) as total_placard,
	sum(credit_transactions.coin )  -  count(placard.id) as coin_left
FROM
	credit_transactions, placard
WHERE
	credit_transactions.owner_id = 'ann_ant@live.com'
	and 
	placard.owner_id = 'ann_ant@live.com'
	"
	);
		$tables_data["coint_left"][".operations"] = &$topscoint_left;
?>