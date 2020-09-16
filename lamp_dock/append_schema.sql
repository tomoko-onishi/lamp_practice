CREATE TABLE `purchasehistories` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `purchasedate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `purchasehistories`
  ADD PRIMARY KEY (`order_id`);

ALTER TABLE `purchasehistories`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

CREATE TABLE `purchasedetails` (
  `detail_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `purchase_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `purchasedetails`
  ADD PRIMARY KEY (`detail_id`);

ALTER TABLE `purchasedetails`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT;