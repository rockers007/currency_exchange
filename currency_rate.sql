
CREATE TABLE `currency` (
  `id` int(10) NOT NULL,
  `name` varchar(40) NOT NULL,
  `rate` varchar(50) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`id`, `name`, `rate`, `created`, `updated`) VALUES
(1, 'AUD', '54,8081', '2021-07-20 09:07:08', '2021-07-20 09:07:08'),
(2, 'AZN', '43,7589', '2021-07-20 09:07:08', '2021-07-20 09:07:08'),
(3, 'GBP', '102,0329', '2021-07-20 09:07:08', '2021-07-20 09:07:08'),
(4, 'AMD', '14,9425', '2021-07-20 09:07:08', '2021-07-20 09:07:08'),
(5, 'BYN', '29,3349', '2021-07-20 09:07:08', '2021-07-20 09:07:08'),
(6, 'BGN', '44,7842', '2021-07-20 09:07:08', '2021-07-20 09:07:08'),
(7, 'BRL', '14,5335', '2021-07-20 09:07:08', '2021-07-20 09:07:08'),
(8, 'HUF', '24,3343', '2021-07-20 09:07:08', '2021-07-20 09:07:08'),
(9, 'HKD', '95,6924', '2021-07-20 09:07:08', '2021-07-20 09:07:08'),
(10, 'DKK', '11,7776', '2021-07-20 09:07:08', '2021-07-20 09:07:08'),
(11, 'USD', '74,3463', '2021-07-20 09:07:08', '2021-07-20 09:07:08'),
(12, 'EUR', '87,6097', '2021-07-20 09:07:08', '2021-07-20 09:07:08'),
(13, 'INR', '99,3536', '2021-07-20 09:07:08', '2021-07-20 09:07:08'),
(14, 'KZT', '17,3647', '2021-07-20 09:07:08', '2021-07-20 09:07:08'),
(15, 'CAD', '58,5035', '2021-07-20 09:07:08', '2021-07-20 09:07:08'),
(16, 'KGS', '87,6640', '2021-07-20 09:07:08', '2021-07-20 09:07:08'),
(17, 'CNY', '11,4674', '2021-07-20 09:07:08', '2021-07-20 09:07:08'),
(18, 'MDL', '41,3840', '2021-07-20 09:07:08', '2021-07-20 09:07:08'),
(19, 'NOK', '83,5051', '2021-07-20 09:07:08', '2021-07-20 09:07:08'),
(20, 'PLN', '19,1033', '2021-07-20 09:07:08', '2021-07-20 09:07:08'),
(21, 'RON', '17,7777', '2021-07-20 09:07:08', '2021-07-20 09:07:08'),
(22, 'XDR', '105,7703', '2021-07-20 09:07:08', '2021-07-20 09:07:08'),
(23, 'SGD', '54,6825', '2021-07-20 09:07:08', '2021-07-20 09:07:08'),
(24, 'TJS', '65,1875', '2021-07-20 09:07:08', '2021-07-20 09:07:08'),
(25, 'TRY', '86,4985', '2021-07-20 09:07:08', '2021-07-20 09:07:08'),
(26, 'TMT', '21,2722', '2021-07-20 09:07:08', '2021-07-20 09:07:08'),
(27, 'UZS', '69,9666', '2021-07-20 09:07:08', '2021-07-20 09:07:08'),
(28, 'UAH', '27,3227', '2021-07-20 09:07:08', '2021-07-20 09:07:08'),
(29, 'CZK', '34,2531', '2021-07-20 09:07:08', '2021-07-20 09:07:08'),
(30, 'SEK', '85,3319', '2021-07-20 09:07:08', '2021-07-20 09:07:08'),
(31, 'CHF', '80,7410', '2021-07-20 09:07:08', '2021-07-20 09:07:08'),
(32, 'ZAR', '51,3757', '2021-07-20 09:07:08', '2021-07-20 09:07:08'),
(33, 'KRW', '64,7156', '2021-07-20 09:07:08', '2021-07-20 09:07:08'),
(34, 'JPY', '67,7137', '2021-07-20 09:07:08', '2021-07-20 09:07:08');

-- --------------------------------------------------------

--
-- Table structure for table `currency_history`
--

CREATE TABLE `currency_history` (
  `id` int(10) NOT NULL,
  `currency_id` int(10) NOT NULL,
  `old_rate` varchar(50) NOT NULL,
  `new_rate` varchar(50) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `currency_history`
--

INSERT INTO `currency_history` (`id`, `currency_id`, `old_rate`, `new_rate`, `created`) VALUES
(1, 1, '54,860', '54,960', '2021-07-20 09:47:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(6, 'rakesh', 'rakesh@rockersinfo.com', '$2y$10$GC/eSKryC9W./Mz78RI0G.WOn0IWHL3ERTxXHce0gRmEdZbpV1cMq');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currency_history`
--
ALTER TABLE `currency_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `currency_history`
--
ALTER TABLE `currency_history`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;