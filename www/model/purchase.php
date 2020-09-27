<?php 
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'db.php';

function get_purchasehistories($db, $user_id){
    $sql = "
      SELECT
      histories.order_id,
      histories.user_id,
      histories.purchasedate,
      SUM(purchasedetails.amount*purchasedetails.purchase_price) AS totalprice
      FROM
        purchasehistories as histories
      JOIN
        purchasedetails
      ON
        histories.order_id = purchasedetails.order_id
      WHERE
        user_id = ?
      GROUP BY
        histories.order_id;
    ";
  
    return fetch_all_query($db, $sql, array($user_id));
  }

  function get_admin_purchasehistories($db){
    $sql = "
      SELECT
      histories.order_id,
      histories.user_id,
      histories.purchasedate,
      SUM(purchasedetails.amount*purchasedetails.purchase_price) AS totalprice
      FROM
        purchasehistories as histories
      JOIN
        purchasedetails
      ON
        histories.order_id = purchasedetails.order_id
      GROUP BY
        histories.order_id;
    ";
  
    return fetch_all_query($db, $sql);
  }
  
  function get_purchasedetails($db, $order_id){
    $sql = "
      SELECT
        items.name,
        purchasedetails.order_id,
        purchasedetails.amount,
        purchasedetails.purchase_price
      FROM
        purchasedetails
      JOIN
        items
      ON
        purchasedetails.item_id = items.item_id
      WHERE
        purchasedetails.order_id = ?
    ";
    return fetch_all_query($db, $sql, array($order_id));
  }

  function get_purchasehistory($db, $order_id){
    $sql = "
    SELECT
    histories.order_id,
    histories.user_id,
    histories.purchasedate,
    SUM(purchasedetails.amount*purchasedetails.purchase_price) AS totalprice
    FROM
      purchasehistories as histories
    JOIN
      purchasedetails
    ON
      histories.order_id = purchasedetails.order_id
    WHERE
    histories.order_id = ?
    GROUP BY
      histories.order_id;
    ";
  
    return fetch_query($db, $sql, array($order_id));
  }