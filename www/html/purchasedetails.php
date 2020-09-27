<?php
require_once '../conf/const.php';
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'user.php';
require_once MODEL_PATH . 'item.php';
require_once MODEL_PATH . 'purchase.php';

session_start();

if(is_logined() === false){
  redirect_to(LOGIN_URL);
}

$db = get_db_connect();
$user = get_login_user($db);

//order_idを取得する
$order_id = get_post('order_id');
$purchasehistory = get_purchasehistory($db, $order_id);

if($user['user_id'] !== $purchasehistory['user_id'] && $user['name'] !== 'admin'){
    redirect_to('purchasehistories.php');
} 
//購入詳細データ取得
$purchasedetails = get_purchasedetails($db, $order_id);
//var_dump($order_id);
//var_dump($purchasedetails);


include_once VIEW_PATH . 'purchasedetails_view.php';