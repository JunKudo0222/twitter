<?php
$_POST['users']=trim($_POST['users']);
$array = explode("@", $_POST['users']);
$users=[];

foreach($array as $arr){
    if($arr!=""){

        $users[]=trim($arr);
    }
}

foreach($users as $user){
    echo $user."<br>";

}