-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 02, 2025 at 09:24 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `talenthub`
--

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `application_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `applicant_id` varchar(1000) NOT NULL,
  `application_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii COLLATE=ascii_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `chat_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii COLLATE=ascii_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `company_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `location` varchar(1000) NOT NULL,
  `industry` varchar(200) NOT NULL,
  `company_size` varchar(200) NOT NULL,
  `website` varchar(200) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `logo` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii COLLATE=ascii_general_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `name`, `location`, `industry`, `company_size`, `website`, `description`, `logo`) VALUES
(1, 'SDWorx', 'Ebene', 'Technology', '2000', 'https://www.sdworx.com/en-en/mauritius', 'Company specialising in payroll', 'sdworx_logo.png'),
(2, 'MCB', 'St-Jean', 'Banking', '2000', 'https://www.mcb.mu', 'The one with Juice', 'mcb_logo.png'),
(3, 'DayForce', 'Ebene', 'IT', '3000', 'https://www.dayforce.com/', 'Boundless workforce, endless possibility', 'dayforce_logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `title` varchar(20) NOT NULL,
  `favicon` varchar(20) NOT NULL,
  `color` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`title`, `favicon`, `color`) VALUES
('TalentHub', 'favicon.ico', 'blue');

-- --------------------------------------------------------

--
-- Table structure for table `connection`
--

CREATE TABLE `connection` (
  `connection_id` int(11) NOT NULL,
  `user_id_1` int(11) NOT NULL,
  `user_id_2` int(11) NOT NULL,
  `status` varchar(200) NOT NULL,
  `connection_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=ascii COLLATE=ascii_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `education_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `school` varchar(1000) NOT NULL,
  `degree` int(200) NOT NULL,
  `field_of_study` int(200) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `grade` varchar(200) NOT NULL,
  `activities` varchar(1000) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii COLLATE=ascii_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `experience`
--

CREATE TABLE `experience` (
  `experience_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `company` varchar(200) NOT NULL,
  `location` varchar(1000) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii COLLATE=ascii_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobposting`
--

CREATE TABLE `jobposting` (
  `job_id` varchar(1000) NOT NULL,
  `company_id` varchar(1000) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` varchar(2000) DEFAULT NULL,
  `overview` text DEFAULT NULL,
  `experience_needed` varchar(20) DEFAULT NULL,
  `work_level` varchar(20) DEFAULT NULL,
  `salary` float DEFAULT NULL,
  `no_of_applications` int(11) NOT NULL DEFAULT 0,
  `location` varchar(1000) NOT NULL,
  `employment_type` varchar(200) NOT NULL,
  `posted_date` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `expiry_date` timestamp NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=ascii COLLATE=ascii_general_ci;

--
-- Dumping data for table `jobposting`
--

INSERT INTO `jobposting` (`job_id`, `company_id`, `title`, `description`, `overview`, `experience_needed`, `work_level`, `salary`, `no_of_applications`, `location`, `employment_type`, `posted_date`, `expiry_date`) VALUES
('2', '2', 'Frontend Developer', 'Create React', 'We believe that design (and you) will be critical to the companys success. You will work with our founders and our early customers to help define and build our product functionality, while maintaining the quality bar that customers have come to expect from modern SaaS applications. You have a strong background in product design with a quantitavely anf qualitatively analytical mindset. You will also have the opportunity to craft our overall product and visual identity and should be comfortable to flex into working.', 'Min. 10 Years', 'Senior Level', 20000, 0, 'St Jean', 'Part Time', '2025-02-25 08:00:51', '2025-01-18 16:00:00'),
('3', '2', 'Backend Developer', 'Writing server scripts and APIs', 'Engineering will be central to our companys success. Youll work closely with our founders and early customers to shape and build our core product, ensuring scalability, reliability, and performance. You have a strong foundation in software development and an analytical mindset that balances speed and quality. You will also have the opportunity to influence our technical direction, architecture, and best practices while collaborating with a fast-moving team to deliver exceptional experiences.', 'Min. 4 Years', 'Senior Level', 25000, 0, 'St-Jean', 'Internship', '2025-02-25 08:20:53', '2025-01-18 16:00:00'),
('330fad86-f1f6-11ef-9b21-4a3edfb38562', '1', 'UI / UX Designer', 'The User Experience Designer position exists to create compelling and digital user experience through excellent design...', ' Youll work with leadership and customers to define the roadmap, prioritize features, and drive execution. You have a strong background in product management, balancing customer needs with business goals. You should be comfortable analyzing data, gathering insights, and collaborating with design and engineering to deliver impactful solutions. This role is a unique opportunity to shape a fast-growing product and influence its future direction.', 'Min. 10 Year', 'Entry Level', 30000, 120, 'Ebene', 'Full Time', '2025-02-23 18:42:27', '2025-03-25 14:55:19'),
('330fd720-f1f6-11ef-9b21-4a3edfb38562', '2', 'Sr. Product Designer', 'The User Experience Designer position exists to create compelling and digital user experience through excellent design...', 'Youll develop and execute go-to-market strategies, working closely with leadership and sales to drive awareness and customer acquisition. You have a strong background in digital marketing, brand positioning, and performance analytics. You will also have the opportunity to craft compelling narratives that resonate with our audience and establish our presence in the market.', 'Min. 5 Years', 'Senior Level', 25000, 98, 'Ebene', 'Internship', '2025-02-25 08:21:00', '2025-03-25 14:55:19'),
('330fd810-f1f6-11ef-9b21-4a3edfb38562', '3', 'User Experience Designer', 'The User Experience Designer position exists to create compelling and digital user experience through excellent design...', 'We believe that design (and you) will be critical to the companys success. You will work with our founders and our early customers to help define and build our product functionality, while maintaining the quality bar that customers have come to expect from modern SaaS applications. You have a strong background in product design with a quantitavely anf qualitatively analytical mindset. You will also have the opportunity to craft our overall product and visual identity and should be comfortable to flex into working.', 'Min. 1 Year', 'Senior Level', 28000, 32, 'Ebene', 'Part Time', '2025-02-23 18:46:41', '2025-03-25 14:55:19'),
('330fd8c4-f1f6-11ef-9b21-4a3edfb38562', '2', 'Product Designer', 'The User Experience Designer position exists to create compelling and digital user experience through excellent design...', 'Youll work with engineering and business teams to analyze data, develop predictive models, and uncover actionable insights. You have experience with statistical analysis, machine learning, and data visualization. You will also have the opportunity to define data-driven strategies and influence product development based on analytics and experimentation.', 'Min. 1 Year', 'Entry Level', 28000, 56, 'Ebene', 'Full Time', '2025-02-23 18:43:24', '2025-03-25 14:55:19'),
('330fd93c-f1f6-11ef-9b21-4a3edfb38562', '1', 'UI / UX Designer', 'The User Experience Designer position exists to create compelling and digital user experience through excellent design...', 'We believe that design (and you) will be critical to the companys success. You will work with our founders and our early customers to help define and build our product functionality, while maintaining the quality bar that customers have come to expect from modern SaaS applications. You have a strong background in product design with a quantitavely anf qualitatively analytical mindset. You will also have the opportunity to craft our overall product and visual identity and should be comfortable to flex into working.', 'Min. 2 Years', 'Senior Level', 25000, 3, 'Ebene', 'Full Time', '2025-02-23 18:35:51', '2025-03-25 14:55:19'),
('330fd9b4-f1f6-11ef-9b21-4a3edfb38562', '2', 'UI Developer', 'The User Experience Designer position exists to create compelling and digital user experience through excellent design...', 'We believe that design (and you) will be critical to the companys success. You will work with our founders and our early customers to help define and build our product functionality, while maintaining the quality bar that customers have come to expect from modern SaaS applications. You have a strong background in product design with a quantitavely anf qualitatively analytical mindset. You will also have the opportunity to craft our overall product and visual identity and should be comfortable to flex into working.', 'Min. 1 Year', 'Senior Level', 32000, 12, 'Ebene', 'Internship', '2025-02-25 08:21:06', '2025-03-25 14:55:19'),
('4', '3', 'IT Consultant', 'Advises, plans, designs, and installs information technology systems for clients', 'Youll collaborate with product and engineering teams to create intuitive, accessible, and visually appealing interfaces. You have a strong understanding of user research, interaction design, and usability testing. You will also have the opportunity to define our design language and ensure a seamless experience across all touchpoints.', 'Min. 5 Years', 'Student Level', 26000, 2, 'Ebene', 'Full Time', '2025-02-25 08:22:30', '2025-06-09 16:00:00'),
('5', '3', 'Frontend Developer', 'Building and maintaining websites', 'Infrastructure and automation will be critical to scaling our technology. Youll work on CI/CD pipelines, cloud deployments, and system reliability, ensuring a seamless experience for developers and customers. You have expertise in cloud platforms, containerization, and monitoring tools. You will also have the opportunity to improve security, optimize performance, and establish best practices for system operations.', 'Min. 2 Years', 'Student Level', 23000, 0, 'Ebene', 'Part Time', '2025-02-25 08:22:46', '2025-06-09 16:00:00'),
('6c265ae0-cf76-11ef-891c-f6c19f2feb13', '3', 'Sales Engineer', 'Act as a bridge between clients and developers', 'Sales will drive customer adoption and revenue growth. Youll engage with prospects, understand their needs, and demonstrate how our solution can solve their problems. You have experience in consultative selling, relationship building, and closing deals. You will also have the opportunity to refine our sales processes and play a key role in shaping our go-to-market strategy.', 'Min. 3 Year', 'Mid Level', 30000, 3, 'North', 'Full Time', '2025-02-25 08:22:41', '0000-00-00 00:00:00'),
('933a8d3c-8993-11ef-aa5d-acde48001122', '3', 'PHP Developer', 'Build our websites backend', 'Customer satisfaction and retention will be key to long-term success. Youll work closely with customers to ensure they are achieving value, provide support, and gather feedback to improve the product. You have a strong background in account management, communication, and problem-solving. You will also have the opportunity to develop strategies for customer engagement and advocacy.', 'Min. 1 Year', 'Entry level', 28000, 30, 'East', 'Part Time', '2025-02-25 08:01:17', '0000-00-00 00:00:00'),
('fc9a39a0-8987-11ef-aa5d-acde48001122', '2', 'Sales Engineer', 'Create documentation for our APIs based on the feedback of clients', 'Data-driven decision-making will be essential to our growth. Youll analyze trends, generate reports, and provide insights to leadership to inform strategy and execution. You have experience with data analytics, visualization tools, and business intelligence platforms. You will also have the opportunity to work across teams to improve processes and identify new opportunities.', 'Min. 1 Year', 'Senior Level', 23000, 12, 'East', 'Part Time', '2025-02-25 08:01:20', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `message_id` int(11) NOT NULL,
  `chat_id` int(11) NOT NULL,
  `message_content` varchar(1000) NOT NULL,
  `sent_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `read_status` tinyint(1) NOT NULL DEFAULT 0,
  `sender_id` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii COLLATE=ascii_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `skill_id` int(11) NOT NULL,
  `skill_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii COLLATE=ascii_general_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`skill_id`, `skill_name`) VALUES
(1, 'HTML'),
(2, 'CSS'),
(3, 'JavaScript'),
(4, 'PHP'),
(5, 'Project Management'),
(6, 'Writing'),
(7, 'Marketing'),
(8, 'DevOps');

-- --------------------------------------------------------

--
-- Table structure for table `test_login`
--

CREATE TABLE `test_login` (
  `user_id` varchar(36) NOT NULL,
  `username` varchar(1000) NOT NULL,
  `password` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii COLLATE=ascii_general_ci;

--
-- Dumping data for table `test_login`
--

INSERT INTO `test_login` (`user_id`, `username`, `password`) VALUES
('3b7283b8-8829-11ef-aa5d-acde48001122', 'simtysha@uom.com', '$2y$10$Fk1OXXwLwYPtYczvYjSYSOZoq442aI4noSv1M9izMsLlHaGqYKfo2'),
('cec98486-8937-11ef-aa5d-acde48001122', 'wenndy@uom.com', '$2y$10$hqlSmap/9ktEI80ldpXZDup6H3YuFo74Ka4f8r0txAWojkSLMwtz6'),
('ec30b904-8946-11ef-aa5d-acde48001122', '', '$2y$10$kzQ/agr7DlpJAy0E6SatlOzuVmMYGx4Ae9N9koIY0eBg.xDnRTlrG'),
('fe46a29e-883c-11ef-aa5d-acde48001122', 'tanoo@uom.com', '$2y$10$uK3GgOIX7tC6FCaHC5mm5uoBQfet.ECd.JOz6UFWUaCKA2O1Ofkte');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` varchar(1000) NOT NULL,
  `username` varchar(1000) CHARACTER SET armscii8 COLLATE armscii8_general_ci DEFAULT NULL,
  `first_name` varchar(200) DEFAULT NULL,
  `last_name` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `password` varchar(1000) DEFAULT NULL,
  `profile_picture` varchar(1000) DEFAULT NULL,
  `headline` varchar(2000) DEFAULT NULL,
  `summary` varchar(2000) DEFAULT NULL,
  `location` varchar(1000) DEFAULT NULL,
  `industry` varchar(200) DEFAULT NULL,
  `current_position` varchar(200) DEFAULT NULL,
  `current_company` varchar(200) DEFAULT NULL,
  `education` varchar(200) DEFAULT NULL,
  `skills` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`skills`)),
  `connections_count` int(11) NOT NULL DEFAULT 0,
  `profile_visibility` varchar(10) NOT NULL DEFAULT 'public'
) ENGINE=InnoDB DEFAULT CHARSET=ascii COLLATE=ascii_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `first_name`, `last_name`, `email`, `password`, `profile_picture`, `headline`, `summary`, `location`, `industry`, `current_position`, `current_company`, `education`, `skills`, `connections_count`, `profile_visibility`) VALUES
('04f915c0-8970-11ef-aa5d-acde48001122', 'oorvashi', 'oorvashi', 'motee', 'oorvashi@uom.com', '$2y$10$TPu4omXGXUXDrukj.lA4z.pB2QQTuZ.GgwdUD2Jagn5OqIN1hZ6di', NULL, 'Googoo', 'GAGA', 'North', 'Information and Technology', 'High', '', '', '{\"skill_ids\":[2,3,4]}', 2, 'public'),
('2225b9d6-897b-11ef-aa5d-acde48001122', 'Dipshika', ' Dipshika', 'Joyekurun', 'dipshika@uom.com', '$2y$10$x0falS9XuM9uhVcJca7Yue.pNe29zXJPeBaZN2/v2PDCcZH1wEA3y', NULL, 'Cloud', 'Bla bla bla', 'West', 'Information and Technology', 'EEngieer', '', '', '{\"skill_ids\":[1,2,3]}', 2, 'public'),
('2b648e3e-cf74-11ef-891c-f6c19f2feb13', NULL, NULL, NULL, 'samu@lol', '$2y$10$gbb5RmKoztMK/alzG68ftOma/inD3WTLs25.JeN6Q5TK6eXoVoMyC', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'public'),
('3', 'tanoojoy', 'Simsom', 'sam', 'joyekuruntanoo@gmail.com', 'password', 'profile-pi.jpg', 'asdsad', 'asdasd', 'North', 'Information and Technology', 'asdasd', '', '', '{\"skill_ids\":[4,6]}', 2, 'public'),
('36479958-8bf5-11ef-aa51-acde48001122', NULL, NULL, NULL, 'charles@uom.com', '$2y$10$JjXQmpKZpDnjOFCGCiTJpeFP.63UbrXuwtMpSod0IKCS5YEOLOI2G', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'public'),
('57e6835e-cf74-11ef-891c-f6c19f2feb13', 'Ansheel', ' Ansheel', 'Pakonner', 'ansheel@uom.com', '$2y$10$ArPgSbQxUhkCs9PSb370Mulhn8Ze23ZfgnHNxbVjiqOZzrSrswIa6', NULL, 'Student', 'Big boi', 'South', 'Sales', 'Intern', 'MBC', '', '{\"skill_ids\":[3,4,5,6]}', 2, 'public'),
('a6bf0f26-f0fa-11ef-9b21-4a3edfb38562', 'ayushee', 'ayushee', 'seeburrun', 'ayushee@vacoas.com', '$2y$10$y2mLJjb2wGX7MUuMPYu9.eVpmypKx8IM3eNFYjAxoO7SDFGfCgNGG', NULL, 'Googoo', 'kjahsfhasd', 'North', 'Information and Technology', '', '', '', '{\"skill_ids\":[]}', 2, 'public'),
('b1336ba2-8992-11ef-aa5d-acde48001122', 'Ayushee109', ' Ayushee   ', 'Seeb', 'ayushee@uom.com', '$2y$10$EDH6DoySpCzs47oT0gREOuXsh1.vMEaTwThQXTib2Q.AL8Aj4JTKC', NULL, 'Looking for a job', 'Undergrad at UoM', 'East', 'Information and Technology', 'Scientist', 'Tesla', '', '{\"skill_ids\":[]}', 2, 'public'),
('b4c44e18-f2dc-11ef-9b21-4a3edfb38562', 'Oorvashi', ' Oorvashi', 'Motee', 'oorvashi@flacq.com', '$2y$10$f/yJkxVn14tWiLujmcAfeO.DSd2aNl2c8aU2FA8WyAXTkR4mStg8S', NULL, '', '', 'North', 'Information and Technology', 'Software Engineer', 'MCB', '', '{\"skill_ids\":[]}', 2, 'public'),
('caa6c364-cf73-11ef-891c-f6c19f2feb13', NULL, NULL, NULL, 'simtysha@uom', '$2y$10$Dd3rSr2J04nc47goUzzKYOz0yeKKrN6xjcNwxu97XiXKYVbyKhiL6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'public');

--
-- Triggers `users`
--
DELIMITER $$
CREATE TRIGGER `before_insert_user` BEFORE INSERT ON `users` FOR EACH ROW BEGIN
    IF NEW.user_id IS NULL THEN
        SET NEW.user_id = UUID();
    END IF;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`application_id`),
  ADD KEY `FK_application_jobposting` (`job_id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`chat_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `connection`
--
ALTER TABLE `connection`
  ADD PRIMARY KEY (`connection_id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`education_id`);

--
-- Indexes for table `experience`
--
ALTER TABLE `experience`
  ADD PRIMARY KEY (`experience_id`),
  ADD KEY `FK_exp_user` (`user_id`);

--
-- Indexes for table `jobposting`
--
ALTER TABLE `jobposting`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD KEY `FK_chat_chat_room` (`chat_id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`skill_id`);

--
-- Indexes for table `test_login`
--
ALTER TABLE `test_login`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `application_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `connection`
--
ALTER TABLE `connection`
  MODIFY `connection_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `education_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `experience`
--
ALTER TABLE `experience`
  MODIFY `experience_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `skill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;