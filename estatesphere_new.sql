CREATE TABLE `inquiry` (
  `inquiry_id` int(11) NOT NULL,
  `inquiry_sender` int(11) DEFAULT NULL,
  `contact_number` bigint(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `concern` varchar(1000) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
);


CREATE TABLE `property` (
  `property_id` int(11) NOT NULL,
  `property_seller` int(11) DEFAULT NULL,
  `property_name` varchar(255) DEFAULT NULL,
  `property_owner_fname` varchar(255) DEFAULT NULL,
  `property_owner_lname` varchar(255) DEFAULT NULL,
  `property_owner_cont` bigint(20) DEFAULT NULL,
  `property_owner_email` varchar(255) DEFAULT NULL,
  `property_status` enum('sold','for sale') DEFAULT NULL,
  `property_type` varchar(255) DEFAULT NULL,
  `property_price` bigint(20) DEFAULT NULL,
  `property_municipality` varchar(255) DEFAULT NULL,
  `property_baranggay` varchar(255) DEFAULT NULL,
  `property_zone_purok` varchar(255) DEFAULT NULL,
  `property_map` varchar(255) DEFAULT NULL,
  `property_lot_area` varchar(255) DEFAULT NULL,
  `property_flr_area` varchar(255) DEFAULT NULL,
  `property_img_addrs` varchar(255) DEFAULT NULL,
  `num_of_beds` int(11) DEFAULT NULL,
  `num_of_baths` int(11) DEFAULT NULL,
  `num_of_carports` int(11) DEFAULT NULL,
  `prop_others` varchar(500) DEFAULT NULL,
  `prop_features` varchar(1000) DEFAULT NULL,
  `property_sale_type` enum('Sale','Rent') DEFAULT NULL
);
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `contact_number` varchar(20) DEFAULT NULL
);
ALTER TABLE `inquiry`
  ADD PRIMARY KEY (`inquiry_id`),
  ADD KEY `inquiry_sender` (`inquiry_sender`);

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`property_id`),
  ADD KEY `property_seller` (`property_seller`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inquiry`
--
ALTER TABLE `inquiry`
  MODIFY `inquiry_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `property_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `inquiry`
--
ALTER TABLE `inquiry`
  ADD CONSTRAINT `inquiry_ibfk_1` FOREIGN KEY (`inquiry_sender`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `property`
--
ALTER TABLE `property`
  ADD CONSTRAINT `property_ibfk_1` FOREIGN KEY (`property_seller`) REFERENCES `users` (`user_id`);
COMMIT;
