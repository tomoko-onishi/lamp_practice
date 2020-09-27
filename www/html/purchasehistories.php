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

if($user['name'] === 'admin'){
    $purchasehistories = get_admin_purchasehistories($db);
} else {
//購入履歴データ取得
    $purchasehistories = get_purchasehistories($db, $user['user_id']);
}


include_once VIEW_PATH . 'purchasehistories_view.php';