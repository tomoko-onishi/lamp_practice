<!DOCTYPE html>
<html lang="ja">
<head>
  <?php include VIEW_PATH . 'templates/head.php'; ?>
  <title>購入明細画面</title>
  <link rel="stylesheet" href="<?php print(STYLESHEET_PATH . 'admin.css'); ?>">
</head>
<body>
  <?php include VIEW_PATH . 'templates/header_logined.php'; ?>

  <div class="container">
    <?php include VIEW_PATH . 'templates/messages.php'; ?>

    <p class="text-right">注文番号: <?php print ($purchasehistory['order_id']); ?></p>
    <p class="text-right">購入日時: <?php print ($purchasehistory['purchasedate']); ?></p>
    <p class="text-right">合計金額: <?php print number_format($purchasehistory['totalprice']); ?>円</p>

      <table class="table table-bordered">
        <thead class="thead-light">
          <tr>
            <th>商品名</th>
            <th>購入時の商品価格</th>
            <th>購入数</th>
            <th>小計</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($purchasedetails as $purchasedetail){ ?>
          <tr>
            <td><?php print($purchasedetail['name']); ?></td>
            <td><?php print number_format($purchasedetail['purchase_price']); ?>円</td>
            <td><?php print ($purchasedetail['amount']); ?></td>
            <td><?php print number_format($purchasedetail['purchase_price'] * $purchasedetail['amount']); ?>円</td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
  </div>
</body>
</html>