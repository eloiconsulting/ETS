-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2023 at 02:00 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `enquiry`
--

-- --------------------------------------------------------

--
-- Table structure for table `eloi_career`
--

CREATE TABLE `eloi_career` (
  `applied_id` int(11) NOT NULL,
  `enq_id` varchar(200) DEFAULT NULL,
  `applied_fname` varchar(255) DEFAULT NULL,
  `applied_lname` varchar(255) DEFAULT NULL,
  `applied_email` varchar(255) DEFAULT NULL,
  `applied_phone` varchar(200) DEFAULT NULL,
  `applied_post` varchar(255) DEFAULT NULL,
  `applied_experience` varchar(200) DEFAULT NULL,
  `applied_cover` text DEFAULT NULL,
  `applied_resume` varchar(255) DEFAULT NULL,
  `is_updated` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eloi_career`
--

INSERT INTO `eloi_career` (`applied_id`, `enq_id`, `applied_fname`, `applied_lname`, `applied_email`, `applied_phone`, `applied_post`, `applied_experience`, `applied_cover`, `applied_resume`, `is_updated`, `created_date`, `updated_date`) VALUES
(1, 'WEBENQ001', 'sharma', 'k', 'sharma@gmail.com', '9876543212', 'development', '4', 'job enquiry', NULL, 1, '2023-02-10 06:29:09', '2023-02-23 10:51:08'),
(2, 'WEBENQ002', 'vignesh', 'v', 'vignesh@gmail.com', '9876567890', 'marketing', '3', 'marketing', NULL, 0, '2023-02-10 06:39:27', '2023-02-23 10:43:31'),
(3, 'WEBENQ003', 'mani', 'm', 'mani@gmail.com', '90987765', 'digital', '4', 'applied', NULL, 0, '2023-02-10 06:51:40', '2023-02-16 07:00:00'),
(4, 'WEBENQ004', 'sarnesh', 's', 'sarnesh@gmail.com', '9876543210', 'development', '4', 'development', NULL, 0, '2023-02-10 10:46:39', '2023-02-16 07:00:06');

-- --------------------------------------------------------

--
-- Table structure for table `opportunity`
--

CREATE TABLE `opportunity` (
  `opp_id` int(11) NOT NULL,
  `man_enq_id` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `Enq_recv_date` date NOT NULL,
  `opportunity_desc` text DEFAULT NULL,
  `rfq_date` date NOT NULL,
  `rfq_submited_date` date NOT NULL,
  `po_recv_date` date NOT NULL,
  `proj_start_date` date NOT NULL,
  `proj_end_date` date NOT NULL,
  `project_status` int(11) NOT NULL,
  `opportinity_status` int(11) NOT NULL,
  `assingned_to` int(11) NOT NULL,
  `assigned_by` int(11) NOT NULL,
  `comments` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `service_id` int(11) NOT NULL,
  `service_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`service_id`, `service_name`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'PLM Implementation', '2023-02-22 04:52:48', 0, '2023-02-22 05:47:42', 0),
(2, 'ERP Solutions', '2023-02-22 04:48:55', 0, '2023-02-22 05:48:19', 0),
(3, 'Be Spoke IT Solutions', '2023-02-22 04:49:19', 0, '2023-02-22 05:48:58', 0),
(4, 'Product Engineering', '2023-02-22 04:52:32', 0, '2023-02-22 05:49:21', 0),
(5, 'Manufacturing Automation', '2023-02-22 04:51:23', 0, '2023-02-22 05:51:12', 0),
(6, 'Contract Staffing', '2023-02-22 04:51:53', 0, '2023-02-22 05:51:25', 0),
(7, 'Permanent Placement', '2023-02-22 04:52:17', 0, '2023-02-22 05:51:56', 0);

-- --------------------------------------------------------

--
-- Table structure for table `task_assign`
--

CREATE TABLE `task_assign` (
  `assign_id` int(11) NOT NULL,
  `task_no` varchar(200) DEFAULT NULL,
  `rfq_date` date NOT NULL,
  `po_recv_date` date NOT NULL,
  `rfq_submited_date` date NOT NULL,
  `client_phone` varchar(255) DEFAULT NULL,
  `client_email` varchar(255) NOT NULL,
  `assign_by` int(11) DEFAULT NULL,
  `assign_to` int(11) DEFAULT NULL,
  `comments` text NOT NULL,
  `is_assigned` int(11) NOT NULL,
  `is_status` int(11) NOT NULL,
  `is_deleted` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task_assign`
--

INSERT INTO `task_assign` (`assign_id`, `task_no`, `rfq_date`, `po_recv_date`, `rfq_submited_date`, `client_phone`, `client_email`, `assign_by`, `assign_to`, `comments`, `is_assigned`, `is_status`, `is_deleted`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'WEBENQ001', '2023-02-23', '0000-00-00', '2023-02-23', '9876543212', 'sharma@gmail.com', 1, 2, 'processing', 2, 2, 0, '2023-02-23 10:55:06', 1, '2023-02-23 11:55:06', 2),
(2, 'MANENQ0065', '2023-02-25', '0000-00-00', '2023-02-27', NULL, '', 1, 2, 'Details are missing', 2, 3, 0, '2023-02-23 10:56:34', 1, '2023-02-23 11:56:34', 2),
(3, 'WEBENQ002', '2023-02-24', '0000-00-00', '2023-02-25', '9876567890', 'vignesh@gmail.com', 1, 3, 'new task', 1, 0, 0, '2023-02-23 06:27:29', 1, '0000-00-00 00:00:00', 0),
(5, 'MANENQ0089', '2023-02-24', '0000-00-00', '0000-00-00', NULL, '', 1, 1, 'myself', 1, 0, 0, '2023-02-23 08:23:44', 1, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `permission_user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`user_id`, `user_name`, `password`, `permission_user_id`) VALUES
(1, 'admin@gmail.com', 'admin', 1),
(2, 'pkssharma66@gmail.com', 'sharma', 2),
(3, 'vignesh@gmail.com', 'vignesh', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_register`
--

CREATE TABLE `user_register` (
  `reg_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_register`
--

INSERT INTO `user_register` (`reg_id`, `user_name`, `email`, `password`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin', '2023-02-16 02:15:36', 0, '2023-02-16 12:15:36', 0),
(2, 'sharma.k', 'pkssharma66@gmail.com', 'sharma', '2023-02-16 02:16:12', 0, '2023-02-16 12:16:12', 0),
(3, 'vignesh', 'vignesh@gmail.com', 'vignesh', '2023-02-16 02:16:54', 0, '2023-02-16 12:16:54', 0);

-- --------------------------------------------------------

--
-- Table structure for table `website_opportunity`
--

CREATE TABLE `website_opportunity` (
  `web_id` int(11) NOT NULL,
  `Enq_date` datetime DEFAULT NULL,
  `Enq_des` text DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `opportunity_status` int(11) DEFAULT NULL,
  `Nxt_stp_fld_by` varchar(255) NOT NULL,
  `comments` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `won_opportunity`
--

CREATE TABLE `won_opportunity` (
  `won_id` int(11) NOT NULL,
  `enq_id` varchar(200) NOT NULL,
  `enq_recv_date` date NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `client_phone` varchar(255) DEFAULT NULL,
  `client_email` varchar(255) DEFAULT NULL,
  `comp_name` varchar(255) DEFAULT NULL,
  `opp_desc` text NOT NULL,
  `opp_service` varchar(255) DEFAULT NULL,
  `rfq_date` date NOT NULL,
  `rfq_submited_date` date NOT NULL,
  `po_rec_date` date NOT NULL,
  `project_start_date` date NOT NULL,
  `project_end_date` date NOT NULL,
  `rejection_reason` text DEFAULT NULL,
  `rejection_date` date NOT NULL,
  `project_status` int(11) NOT NULL,
  `opp_status` int(11) NOT NULL,
  `enq_rec_throug` varchar(255) NOT NULL,
  `assign_to` int(11) DEFAULT NULL,
  `assign_by` int(11) DEFAULT NULL,
  `comments` text NOT NULL,
  `document` text NOT NULL,
  `is_deleted` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `won_opportunity`
--

INSERT INTO `won_opportunity` (`won_id`, `enq_id`, `enq_recv_date`, `name`, `client_phone`, `client_email`, `comp_name`, `opp_desc`, `opp_service`, `rfq_date`, `rfq_submited_date`, `po_rec_date`, `project_start_date`, `project_end_date`, `rejection_reason`, `rejection_date`, `project_status`, `opp_status`, `enq_rec_throug`, `assign_to`, `assign_by`, `comments`, `document`, `is_deleted`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'WEBENQ001', '2023-02-10', 'sharma', '9876543212', 'sharma@gmail.com', 'Reading Comp', '', '7', '2023-02-23', '2023-02-23', '2023-02-24', '2023-02-27', '2023-03-06', '', '1970-01-01', 1, 2, '', 2, 1, 'Won processing', '', 0, '2023-02-23 10:55:06', 1, '2023-02-23 11:55:06', 2),
(2, 'MANENQ0065', '2023-02-23', 'test', NULL, NULL, 'Testing', '', '5', '2023-02-25', '2023-02-27', '1970-01-01', '1970-01-01', '1970-01-01', 'daetails are missing', '2023-02-28', 1, 3, '', 2, 1, 'Details are missing', '1677149158Girraj\'s Resume.pdf', 0, '2023-02-23 10:56:34', 1, '2023-02-23 11:56:34', 2),
(3, 'WEBENQ002', '2023-02-10', 'vignesh', '9876567890', 'vignesh@gmail.com', NULL, 'new task', NULL, '2023-02-24', '2023-02-25', '0000-00-00', '0000-00-00', '0000-00-00', NULL, '0000-00-00', 0, 0, '', 3, 1, 'new task', '', 0, '2023-02-23 06:27:29', 1, '0000-00-00 00:00:00', 0),
(5, 'MANENQ0089', '2023-02-23', 'test', '9999999944', 'pkssharma66@gmail.com', 'Testing', 'myself', '3', '2023-02-24', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', NULL, '0000-00-00', 0, 1, '', 1, 1, 'myself', '1677156824', 0, '2023-02-23 08:23:44', 1, '0000-00-00 00:00:00', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `eloi_career`
--
ALTER TABLE `eloi_career`
  ADD PRIMARY KEY (`applied_id`);

--
-- Indexes for table `opportunity`
--
ALTER TABLE `opportunity`
  ADD PRIMARY KEY (`opp_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `task_assign`
--
ALTER TABLE `task_assign`
  ADD PRIMARY KEY (`assign_id`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_register`
--
ALTER TABLE `user_register`
  ADD PRIMARY KEY (`reg_id`);

--
-- Indexes for table `website_opportunity`
--
ALTER TABLE `website_opportunity`
  ADD PRIMARY KEY (`web_id`);

--
-- Indexes for table `won_opportunity`
--
ALTER TABLE `won_opportunity`
  ADD PRIMARY KEY (`won_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `eloi_career`
--
ALTER TABLE `eloi_career`
  MODIFY `applied_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `opportunity`
--
ALTER TABLE `opportunity`
  MODIFY `opp_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `task_assign`
--
ALTER TABLE `task_assign`
  MODIFY `assign_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_register`
--
ALTER TABLE `user_register`
  MODIFY `reg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `website_opportunity`
--
ALTER TABLE `website_opportunity`
  MODIFY `web_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `won_opportunity`
--
ALTER TABLE `won_opportunity`
  MODIFY `won_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
