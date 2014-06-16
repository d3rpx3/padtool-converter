<?php

$ch = curl_init("https://api.padtool.com/public/getMonsterBox/{$argv[1]}");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
$box = json_decode(curl_exec($ch), true);

curl_setopt($ch, CURLOPT_URL, "https://api.padtool.com/public/getAccount/{$argv[1]}");
$account = json_decode(curl_exec($ch), true);

if($box['status'] != '200' || $account['status'] != '200') die('Failed to grab data. Either your box or account isn\'t set to public or your PADTool account isn\'t set up yet.');

$padh = array();
foreach($box['payload']['deck'] as $card){
	$padh[] = array(
		'no' => $card['card']['monster_id'],
		'lv' => $card['card']['level'],
		'exp' => $card['card']['current_exp'],
		'slv' => $card['card']['skill_level'],
		'plus' => array(
			$card['card']['hp']['plus'],
			$card['card']['atk']['plus'],
			$card['card']['rcv']['plus'],
			$card['card']['awaken_level']
		)
	);
}

echo json_encode(
	array(
		'friends' => null, //PADH checks that it exists but does nothing with it.
		'card' => $padh,
		'name' => $account['payload']['display_name'],
		'lv' => $account['payload']['stat']['rank']
	)
);
