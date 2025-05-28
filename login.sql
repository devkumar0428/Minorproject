-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2025 at 05:29 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login`
--

-- --------------------------------------------------------

--
-- Table structure for table `addjob`
--

CREATE TABLE `addjob` (
  `id` int(11) NOT NULL,
  `crud_id` int(11) NOT NULL,
  `jobTitle` varchar(70) NOT NULL,
  `jobDescription` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `addjob`
--

INSERT INTO `addjob` (`id`, `crud_id`, `jobTitle`, `jobDescription`) VALUES
(1, 1590347483, 'Software Engineering', 'We are seeking a talented and motivated Software Engineer to design, develop, and maintain high-quality software solutions. The ideal candidate will have experience in software development, strong problem-solving skills, and a passion for building scalable and efficient applications. You will collaborate with cross-functional teams to implement innovative solutions, optimize performance, and contribute to the overall success of the company.\r\n\r\nKey Responsibilities:\r\n\r\nDesign, develop, test, and deploy software applications that meet business needs.\r\nCollaborate with product managers, designers, and other engineers to define project requirements and technical specifications.\r\nWrite clean, maintainable, and efficient code following industry best practices.\r\nTroubleshoot, debug, and resolve software defects to ensure system reliability and performance.\r\nOptimize applications for speed, scalability, and security.\r\nParticipate in code reviews to maintain code quality and share knowledge.\r\nStay up to date with emerging technologies and industry trends to improve development processes.\r\nWork in an Agile/Scrum environment, contributing to sprint planning, daily stand-ups, and retrospectives.\r\nRequirements:\r\n\r\nBachelor\'s degree in Computer Science, Software Engineering, or a related field (or equivalent experience).\r\nProficiency in programming languages such as Python, Java, C++, JavaScript, or others.\r\nExperience with web development frameworks (React, Angular, Django, Flask, etc.).\r\nKnowledge of databases (SQL, NoSQL) and cloud technologies (AWS, Azure, Google Cloud).\r\nUnderstanding of software development methodologies, version control (Git), and CI/CD pipelines.\r\nStrong problem-solving skills and ability to work independently or as part of a team.\r\nExcellent communication skills and attention to detail.\r\nPreferred Qualifications:\r\n\r\nExperience with DevOps tools and practices.\r\nKnowledge of containerization (Docker, Kubernetes).\r\nFamiliarity with AI/ML, cybersecurity, or big data technologies.\r\nBenefits:\r\n\r\nCompetitive salary and performance-based bonuses.\r\nFlexible work schedule and remote work options.\r\nHealth, dental, and vision insurance.\r\nLearning and development opportunities.\r\nCollaborative and innovative work environment.\r\nIf you are passionate about software engineering and eager to work on exciting projects, we would love to hear from you! Apply today and join our dynamic team.'),
(2, 1459334673, 'Python Developer', 'We are looking for a skilled and motivated Python Developer to join our dynamic development team. You will play a key role in building, testing, and maintaining robust backend applications while ensuring high performance, scalability, and security. You will work closely with front-end developers, DevOps engineers, and product managers to create seamless, end-to-end software solutions.\r\n\r\nResponsibilities:\r\n1. Develop, maintain, and optimize Python-based backend applications to meet business and technical requirements.\r\n2. Write clean, efficient, and reusable Python code following best practices and industry standards.\r\n3. Design, develop, and integrate RESTful APIs for data exchange between services and third-party applications.\r\n4. Collaborate with front-end developers to ensure seamless integration between UI components and backend logic.\r\n5.  Perform code reviews, identify bottlenecks, and debug complex issues to enhance software quality.\r\n6. Implement and maintain databases (SQL & NoSQL) to improve data integrity, security, and performance.\r\n7. Enhance application security by implementing authentication, authorization, and data protection best practices.\r\n8. Deploy and manage applications in cloud environments such as AWS, Azure, or GCP.\r\n9.  Work closely with DevOps teams to implement containerization (Docker, Kubernetes) and CI/CD pipelines.\r\n10.  Research and implement new technologies to improve software performance, efficiency, and scalability.\r\n\r\n\r\nRequired Qualifications:\r\n1.	Bachelor\'s degree in Computer Science, Engineering, or a related discipline.\r\n2.	2+ years of hands-on experience in Python development for backend applications.\r\n3.	Proficiency in Python frameworks (Django, Flask, FastAPI).\r\n4.	Experience with relational databases (PostgreSQL, MySQL, SQL) and NoSQL databases (MongoDB).\r\n5.	Strong understanding of RESTful APIs and integration with third-party services.\r\n6.	Familiarity with front-end technologies such as JavaScript, HTML, and CSS.\r\n7.	Excellent debugging, analytical, and problem-solving skills for optimizing application performance.\r\n\r\nPreferred Qualifications :\r\n•	Experience with cloud services (AWS, Azure, GCP).\r\n•	Knowledge of containerization technologies (Docker, Kubernetes).\r\n•	Familiarity with CI/CD tools and deployment processes (Jenkins, GitHub Actions).\r\n•	Experience working with microservices architecture and scalable systems.\r\n•	Understanding of asynchronous programming and task queues (Celery, RabbitMQ, Redis).'),
(3, 668148230, 'Data Analyst', 'We are seeking a highly motivated Data Analyst to join our dynamic team. The ideal candidate will be responsible for collecting, analyzing, and interpreting large datasets to drive data-driven decision-making. You will work closely with cross-functional teams to develop insightful reports, dashboards, and predictive models that enhance business strategies.\r\n\r\nResponsibilities\r\nCollect, clean, and analyze large datasets to identify trends and insights.\r\nDevelop and maintain dashboards, reports, and visualizations using SQL, Power BI, Tableau, or Excel.\r\nPerform statistical analysis and predictive modeling to support business objectives.\r\nCollaborate with stakeholders to understand data requirements and deliver actionable insights.\r\nOptimize data collection processes and ensure data integrity.\r\nConduct A/B testing and other experimental analysis to measure business impact.\r\nAutomate data extraction and processing using Python, R, or SQL.\r\nPresent findings and recommendations to technical and non-technical audiences.\r\nQualifications\r\nBachelor\'s degree in Data Science, Statistics, Computer Science, Mathematics, or related field.\r\n2+ years of experience in data analysis, business intelligence, or a related role.\r\nProficiency in SQL, Python, R, or Excel for data manipulation and analysis.\r\nExperience with data visualization tools such as Tableau, Power BI, or Google Data Studio.\r\nStrong understanding of statistical analysis, data modeling, and forecasting techniques.\r\nKnowledge of ETL processes, data warehousing, and relational databases.\r\nAbility to translate complex data into meaningful business insights.\r\nExcellent problem-solving, analytical, and communication skills.\r\nPreferred Qualifications\r\nExperience with cloud platforms (AWS, Google Cloud, Azure).\r\nKnowledge of machine learning models and AI-driven analytics.\r\nFamiliarity with big data tools (Spark, Hadoop) and NoSQL databases.\r\nExperience with A/B testing and experimental design.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Id` int(11) NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `firstName`, `lastName`, `email`, `password`) VALUES
(1, 'Elis', 'Poudel', 'elis@gmail.com', '12345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addjob`
--
ALTER TABLE `addjob`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addjob`
--
ALTER TABLE `addjob`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
