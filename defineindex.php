<?php
require 'common.php';
$array=[
'kyohei_ja',
'miyatatsu_IT_19',
'yuka_web06',
'kodai_web_tips',
'takkun_marked',
'smar10select',
'python_academia',
'achiechi_',
'aoki_ownlife',
'lifestrategy_wt',
'ichi3mrk',
'yu_2005_0503',
'bboysussy',
'WebGodog',
'deign_tw',
'tky_biz',
'Gaishi_Manufact',
'mochipapa40',
'NakajimaBook',
'zen_climb',
'onichan4949',
'photokohs7_7',
'hiro_buppann',
];
$stmt = $db->prepare("SELECT screen_name,id FROM accounts");
		$res = $stmt->execute();
		if( $res ) {
			$ids = $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
foreach($ids as $id){
    
        if(!in_array($id['screen_name'],$array)){
            echo $id['id']."<br>";

        }

    

}
