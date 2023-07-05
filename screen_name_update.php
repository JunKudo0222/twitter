<?php
require 'common.php';

$array=[
['hmgchk','kyohei_ja'],
['TSUTAYA00000926','miyatatsu_IT_19'],
['yuika_web06','yuka_web06'],
['kochan0218','kodai_web_tips'],
['hayato_marked','takkun_marked'],
['hiroyuki_ymd','smar10select'],
['arika_technavi','python_academia'],
['fumiya238388','achiechi_'],
['isao_ownlife','aoki_ownlife'],
['beauty_ctbb','lifestrategy_wt'],
['ichi3_startupW','ichi3mrk'],
['yu_0503_2005','yu_2005_0503'],
['bboy_fulufulu','bboysussy'],
['7ka_326','WebGodog'],
['eiever__','deign_tw'],
['akg_tky','tky_biz'],
['AlchemistGlobal','Gaishi_Manufact'],
['guchi13646123','mochipapa40'],
['fezNote18','NakajimaBook'],
['tubakimini','zen_climb'],
['hiromi4949','onichan4949'],
['kosuke72_free','photokohs7_7'],
['hiro_buppan_','hiro_buppann'],
];

foreach($array as $arr){

    $stmt = $db -> prepare("UPDATE accounts SET screen_name = :hiduke WHERE screen_name = :requser");//登録準備
    $stmt -> bindValue(':hiduke', $arr[1], PDO::PARAM_STR);
    $stmt -> bindValue(':requser', $arr[0], PDO::PARAM_STR);
    $stmt -> execute();
}