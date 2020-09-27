<!DOCTYPE html>
<html lang="ja">
<head>
  <?php include VIEW_PATH . 'templates/head.php'; ?>
  <title>購入履歴画面</title>
  <link rel="stylesheet" href="<?php print(STYLESHEET_PATH . 'admin.css'); ?>">
</head>
<body>
  <?php include VIEW_PATH . 'templates/header_logined.php'; ?>

  <div class="container">
    <?php include VIEW_PATH . 'templates/messages.php'; ?>

      <table class="table table-bordered">
        <thead class="thead-light">
          <tr>
            <th>注文番号</th>
            <th>購入日時</th>
            <th>該当の注文番号の合計</th>
            <th>購入詳細表示</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($purchasehistories as $purchasehistory){ ?>
          <tr>
            <td><?php print($purchasehistory['order_id']); ?></td>
            <td><?php print($purchasehistory['purchasedate']); ?></td>
            <td><?php print number_format($purchasehistory['totalprice']); ?>円</td>
            <td>
                <form method="post" action="purchasedetails.php">
                    <input type="submit" value="購入詳細画面表示">
                    <input type="hidden" name="order_id" value="<?php print($purchasehistory['order_id']); ?>">
                </form>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
  </div>
</body>
</html>