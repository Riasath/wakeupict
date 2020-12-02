-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 01, 2020 at 12:34 PM
-- Server version: 10.3.25-MariaDB-log-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adolbodol_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `accountant`
--

CREATE TABLE `accountant` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `img_url` varchar(200) NOT NULL,
  `ion_user_id` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accountant`
--

INSERT INTO `accountant` (`id`, `name`, `email`, `password`, `address`, `phone`, `img_url`, `ion_user_id`) VALUES
(2, 'Accountant', 'ac@gmail.com', '123456', 'Kholifa Potti Rajbari', '01749335508', '', '36'),
(3, 'dasvdasgf', 'abc@gmail.com', '123123', 'dsfsdf', '54646464', '', '22'),
(4, 'acc', 'acc@gmail.com', '12345', 'asdf', 'asdfdsf', '', '27');

-- --------------------------------------------------------

--
-- Table structure for table `add_prescription_comment`
--

CREATE TABLE `add_prescription_comment` (
  `id` int(50) NOT NULL,
  `comment` varchar(1000) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_prescription_comment`
--

INSERT INTO `add_prescription_comment` (`id`, `comment`) VALUES
(7, 'ভরা পেটে'),
(6, 'খাবার আধ ঘণ্টা আগে'),
(8, '(ভরা পেটে) - চলবে'),
(9, 'চলবে'),
(34, 'সপ্তাহে 5 দিন - চলবে'),
(13, 'চলবে - বিকেল পাঁচটা'),
(11, 'চাপ-  চলবে নেওয়ার 10 মিনিট পর কুলি করবেন'),
(14, 'প্রতি সপ্তাহে ১ করে - ৩ মাস'),
(15, 'ঘুম না হলে'),
(16, 'খাওয়ার আধা ঘণ্টা আগে - ১ মাস'),
(17, '৩ চামচ সকাল + রাত'),
(18, 'চলবে - ঘুম না হলে'),
(19, 'খালি পেটে'),
(20, 'খালি পেটে - (চলবে)'),
(21, 'ইনসুলিন চলবে'),
(22, '১ টি করে মাংসপেশিতে - প্রতি ২ সপ্তাহে ৬ ডোজ'),
(23, 'পানি এক থেকে দেড় লিটার 24 ঘন্টায়'),
(24, 'বাড়তি লবণ খাবেন না'),
(25, 'ডাবের পানি এবং বোরহানি খাবেন না'),
(26, 'ইসুবগুল খাবেন'),
(27, 'হাটুর ব্যায়াম করবেন'),
(28, 'প্রতিদিন হাঁটবেন'),
(29, 'মুখের ভেতর প্রয়োজনমতো'),
(30, 'প্রয়োজনমতো'),
(31, 'প্রতি শুক্রবার ১টি করে (ভরা পেটে) - ২ মাস'),
(32, 'দিনে ৩ বার ১৫ দিন'),
(33, 'সপ্তাহে 5 দিন '),
(35, '10 দিন'),
(36, 'নখে দিনে ২-৩ বার -৩ মাস'),
(37, '৩ মাস'),
(38, 'চাপ- চলবে'),
(39, '১ মাস'),
(40, 'খালি পেটে - ১মাস'),
(41, 'প্রয়োজন হলে'),
(42, '৭ দিন'),
(44, '২ মাস'),
(45, '.......');

-- --------------------------------------------------------

--
-- Table structure for table `add_prescription_type`
--

CREATE TABLE `add_prescription_type` (
  `id` int(50) NOT NULL,
  `type` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_prescription_type`
--

INSERT INTO `add_prescription_type` (`id`, `type`) VALUES
(2, '1+1+1'),
(3, '0+1+1'),
(4, '0+0+1'),
(5, '1+1+0'),
(6, '1+0+0'),
(7, '0+1+0'),
(8, '1+0+1'),
(9, '0.5 + 0 + 0'),
(10, '0.5 + 0 + 1'),
(11, '0.5 + 0 + 0.5'),
(12, '1 + 0 + 0.5'),
(13, '0 + 0 + 2'),
(14, '0.5 + 1 + 0'),
(15, '22 + 0 + 22 (+- 2)'),
(16, '0 + 0 +  0.5'),
(17, '1 + 0 + 1.5'),
(18, '20 + 0 + 6 (+-2)'),
(19, '2 + 0 + 0'),
(20, '6 + 6 + 0'),
(21, '0 + 0 + 8 (+- 2)'),
(22, '0 + 0 + 3'),
(23, '0+0+0'),
(24, '1+0+.5'),
(25, '26+0+22 (+-2)'),
(26, '2 + 0 + 2'),
(27, '1+0+0+1'),
(28, '0.5 + 0.5 + 0.5'),
(35, '1+1+1'),
(30, '6 + 4 + 0 (+-2)'),
(32, '1+0.5+0'),
(33, '20 + 0 + 14 (+-2)'),
(34, '8 + 0 + 12 (+- 2)');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(150) NOT NULL,
  `patient` varchar(150) NOT NULL,
  `doctor` varchar(250) NOT NULL,
  `date` varchar(200) NOT NULL,
  `s_time` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `type` varchar(150) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `blog_setting`
--

CREATE TABLE `blog_setting` (
  `id` int(150) NOT NULL,
  `title` varchar(500) NOT NULL,
  `posted_by` varchar(500) NOT NULL,
  `date` varchar(150) NOT NULL,
  `published` varchar(300) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `blog_post` varchar(2000) NOT NULL,
  `img_url` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_setting`
--

INSERT INTO `blog_setting` (`id`, `title`, `posted_by`, `date`, `published`, `description`, `blog_post`, `img_url`) VALUES
(3, 'How to Save Money on Groceries if You’re Trying to Eat Healthy', 'administrator', '05/23/19', 'Yes', 'Grocery shopping when you’re watching what you eat can put a dent in your wallet. But with these tips from registered dietitians, it doesn’t have to.', 'Have you ever experienced a shockingly high grocery bill when trying to eat healthier? It\'s not just your imagination. A study published in December 2013 in BMJ Open Access suggests that eating a healthful diet, such as one rich in fruits, vegetables, fish, and nuts costs about $1.50 per day more than eating a less-healthy diet packed with refined grains and processed meats. For a family of four, this could mean spending as much as $2,000 more annually on groceries alone.\r\n\r\nSo, does that mean you have to either spend more money or accept a less nutritious diet? Absolutely not!\r\n\r\nWe turned to registered dietitians to learn the exact steps they take to cut down on grocery costs without sacrificing nutrition.', 'uploads/Ways-Registered-Dietitians-Save-Money-Grocery-Shopping-for-Healthy-Food-722x406.jpg'),
(4, 'Your Budget-Friendly Guide to Healthy Cooking', 'administrator', '05/23/19', 'Yes', 'Craving a four-star meal, without the price tag of a four-star restaurant? We\'ll show you how to stretch your grocery dollar and whip up your own tasty recipes at home.', 'ood is a big part of any household budget, and fixing healthy recipes that taste good can seem like a challenge. But with good nutrition as your first priority, you can put a little planning and bargain hunting to work and end up with some cheap meals that have rich taste. Here’s how to get started.\r\n\r\nStart by carefully thinking about your menu, then make a plan and stick to it. You can save money by buying discount food, buying in bulk, and eliminating what you really don’t need or eat. \"A great example of a healthy budget food is beans,\" says Joan Salge Blake, MS, RD, dietitian and nutrition professor at Boston University. \"Beans are a great source of protein and fiber. You can add canned beans to a salad or pasta and you have a cheap recipe that is healthy and filling.\"\r\n\r\nTry these other tips when shopping:\r\n\r\nEliminate junk food. Soda, processed food, desserts, and prepackaged meals tend to be more expensive and less healthy. Cross them off your list.\r\nBuy in bulk. Dried beans, grains, and canned goods are cheaper in bulk. You can also buy perishable foods like meat, dairy, and bread in bulk and freeze them. Bread from the freezer defrosts quickly and doesn\'t get moldy.\r\nBuy frozen produce. \"Frozen fruits and vegetables retain their nutrients better than those that linger in your refrigerator bins, which can be graveyards for produce. They are less expensive and there is much less waste. Think about all the parts of fresh fruits and vegetables that you cut off before eating,\" says Blake.\r\nThink about alternate sources of protein. Protein is an important part of many healthy recipes, but meat is often your most expensive grocery item. Alternate sources of less expensive proteins include canned fish and chicken, beans, eggs, and lentils.\r\nTake advantage of discounts. Low-budget does not mean poor quality. Clip coupons, shop for discount food at club stores like Costco or Sam\'s, and use generic store brands if they are cheaper. Farmers markets and ethnic markets ', 'uploads/download.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `chart_data`
--

CREATE TABLE `chart_data` (
  `id` int(11) NOT NULL,
  `year` varchar(100) DEFAULT NULL,
  `month` varchar(100) DEFAULT NULL,
  `profit` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chart_data`
--

INSERT INTO `chart_data` (`id`, `year`, `month`, `profit`) VALUES
(1, '2019', 'January', '50000'),
(2, '2019', 'February', '45000'),
(3, '2019', 'March', '60000'),
(4, '2019', 'April', '50000'),
(5, '2020', 'January', '50000'),
(6, '2020', 'February', '45000'),
(7, '2020', 'March', '60000'),
(8, '2020', 'April', '50000');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(150) NOT NULL,
  `name` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `subject` varchar(500) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `add_date` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `subject`, `message`, `add_date`) VALUES
(1, 'adsgdgdg', 'mdmurad321@gmail.com', 'sdgdsgdssd asdgdsgds', 'sdgdsg asdgdsg asdgdsgdsg', '05/23/19');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(150) NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` varchar(150) NOT NULL,
  `img_url` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`, `description`, `img_url`) VALUES
(1, 'CARDIOLOGY', 'CARDIOLOGY Description CARDIOLOGY Description CARDIOLOGY Description CARDIOLOGY Description', 'uploads/Screenshot5.jpg'),
(2, 'Gastroenterology', 'dffsdf agg', 'uploads/Screenshot2.png'),
(3, 'Neurology', 'Neurology Neurology ', 'uploads/Screenshot4.png'),
(4, 'Dentistry', 'Dentistry Dentistry', 'uploads/Screenshot3.png'),
(5, 'Orthopedic ', 'Orthopedic  Orthopedic ', 'uploads/Screenshot11.png');

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `id` int(11) NOT NULL,
  `patient_id` varchar(500) DEFAULT NULL,
  `doctor_id` varchar(500) DEFAULT NULL,
  `date` varchar(500) DEFAULT NULL,
  `pneumococcal` varchar(1000) DEFAULT NULL,
  `pn_date` varchar(1000) DEFAULT NULL,
  `influenza` varchar(1000) DEFAULT NULL,
  `in_date` varchar(1000) DEFAULT NULL,
  `past_medical_history` mediumtext DEFAULT NULL,
  `comorbidities_risk_factors` mediumtext DEFAULT NULL,
  `diagnosis` mediumtext DEFAULT NULL,
  `ecg` mediumtext DEFAULT NULL,
  `echo` mediumtext DEFAULT NULL,
  `chest_x_ray` mediumtext DEFAULT NULL,
  `six_min_walk` mediumtext DEFAULT NULL,
  `holter_event_recorder` mediumtext DEFAULT NULL,
  `stress_test` mediumtext DEFAULT NULL,
  `mpi` mediumtext DEFAULT NULL,
  `angiogram` mediumtext DEFAULT NULL,
  `s_creatinine` mediumtext DEFAULT NULL,
  `s_electrolytes` mediumtext DEFAULT NULL,
  `lipid_profile` mediumtext DEFAULT NULL,
  `cbc` mediumtext DEFAULT NULL,
  `glucose` mediumtext DEFAULT NULL,
  `vitamin_d` mediumtext DEFAULT NULL,
  `uric_acid` mediumtext DEFAULT NULL,
  `inr` mediumtext DEFAULT NULL,
  `tsh` mediumtext DEFAULT NULL,
  `t_three` mediumtext DEFAULT NULL,
  `t_four` mediumtext DEFAULT NULL,
  `calcium` mediumtext DEFAULT NULL,
  `magnesium` mediumtext DEFAULT NULL,
  `nt_pro_bnp` mediumtext DEFAULT NULL,
  `other` mediumtext DEFAULT NULL,
  `x` mediumtext DEFAULT NULL,
  `y` mediumtext DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`id`, `patient_id`, `doctor_id`, `date`, `pneumococcal`, `pn_date`, `influenza`, `in_date`, `past_medical_history`, `comorbidities_risk_factors`, `diagnosis`, `ecg`, `echo`, `chest_x_ray`, `six_min_walk`, `holter_event_recorder`, `stress_test`, `mpi`, `angiogram`, `s_creatinine`, `s_electrolytes`, `lipid_profile`, `cbc`, `glucose`, `vitamin_d`, `uric_acid`, `inr`, `tsh`, `t_three`, `t_four`, `calcium`, `magnesium`, `nt_pro_bnp`, `other`, `x`, `y`) VALUES
(65, '89', NULL, NULL, '[{\"pneumococcal\":null,\"pn_date\":\"\"}]', NULL, '[{\"influenza\":null,\"in_date\":\"\"}]', NULL, '{\"past_medical_history\":\"H\\/O VA (05\\/09 NiCVD)\\r\\n<br>H\\/O LVF (11\\/10 NiCVD)\\r\\n<br>Known case of DCM (11\\/10)\\r\\n<br>CAG Non Critical CAD (04\\/12, UHL)\"}', '{\"htn\":null,\"asthma\":null,\"ba\":null,\"obstructive_sleep_apnoea\":null,\"dm_type_one\":\"I\",\"dm_type_two\":null,\"copd\":null,\"cerebrovascular_accident\":null,\"dl\":\"Yes\",\"renal_failure\":null,\"severe_musculoskeletal_disease\":null,\"positive_fh\":null,\"associated_cad\":null,\"cancer\":null,\"smoker_yes\":null,\"smoker_no\":null,\"ex_smoker\":\"Ex-Smoker\",\"valvular_disease\":null,\"bleeding_diathesis\":null,\"alcohol\":null,\"thyroid_dysfunction\":null,\"peripheral_vascular_disease\":null,\"other_one\":\"\",\"other_two\":\"\",\"other_three\":\"\",\"anaemia\":null}', '{\"diagnosis\":\"DCM. Non-Caritical coronary, aitaies dis\\r\\n<br>H\\/O LVF DM, DL\"}', '[{\"ecg_date\":\"2017-02-01\",\"findings\":\"OMI (Int), Poor , V1 - V6\",\"rhythmc_sinus_AF\":\"\",\"qrs_ms\":\"114\",\"rbbb_lbbb\":\"\",\"heart_block\":\"\",\"qt_qtc\":\"\",\"ex_beats\":\"\"},{\"ecg_date\":\"2018-09-01\",\"findings\":\"\",\"rhythmc_sinus_AF\":\"\",\"qrs_ms\":\"110\",\"rbbb_lbbb\":\"\",\"heart_block\":\"\",\"qt_qtc\":\"\",\"ex_beats\":\"\"}]', '[{\"echo_date\":\"2011-06-01\",\"lvidd_lvids\":\"75, 64, 30%, DCM\",\"ef_per\":\"30%\",\"rvsp_pasp\":\"\",\"rwma\":\"\",\"d_d\":\"\",\"mr_none\":\"\",\"la\":\"\"},{\"echo_date\":\"2014-02-01\",\"lvidd_lvids\":\"61, 48, PASP 37\",\"ef_per\":\"45%\",\"rvsp_pasp\":\"\",\"rwma\":\"\",\"d_d\":\"\",\"mr_none\":\"\",\"la\":\"\"},{\"echo_date\":\"2017-02-01\",\"lvidd_lvids\":\"54, 40\",\"ef_per\":\"50%\",\"rvsp_pasp\":\"\",\"rwma\":\"\",\"d_d\":\"\",\"mr_none\":\"\",\"la\":\"\"},{\"echo_date\":\"2018-09-01\",\"lvidd_lvids\":\"54, 38, RWMAT+\",\"ef_per\":\"56%\",\"rvsp_pasp\":\"\",\"rwma\":\"\",\"d_d\":\"\",\"mr_none\":\"\",\"la\":\"\"},{\"echo_date\":\"2019-01-01\",\"lvidd_lvids\":\"54, 40, RWMA+\",\"ef_per\":\"50%\",\"rvsp_pasp\":\"\",\"rwma\":\"\",\"d_d\":\"\",\"mr_none\":\"\",\"la\":\"\"}]', '[{\"chest_x_ray_date\":\"\",\"chest_x_ray_findings\":\"\",\"chest_x_ray_pulmonary_edema\":\"\",\"chest_x_ray_pvh\":\"\",\"chest_x_ray_pleural_effusion\":\"\",\"chest_x_ray_ct_ratio\":\"\"}]', '[{\"six_min_walk_date\":\"\",\"six_min_walk_performance\":\"\",\"six_min_walk_speed\":\"\",\"six_min_walk_distance\":\"\"}]', '[{\"holter_date\":\"\",\"holter_vpc\":\"\",\"holter_ventricular_arrhythmia\":null,\"holter_ventricular_arrhythmia_yes\":null,\"holter_atrial_arrhythmia\":null,\"holter_atrial_arrhythmia_yes\":null,\"holter_heart_rate_variability\":\"\",\"holter_othrt\":\"\"}]', '[{\"stress_test_date\":\"\",\"involved_regions\":\"\",\"involved_coronary\":\"\",\"viable\":\"\",\"non_viable\":\"\",\"ischemia\":\"\",\"arrhythmias\":\"\",\"thr_achieved\":\"\"}]', '[{\"mpi_date\":\"\",\"lvef\":\"\",\"territory\":\"\",\"territory_persent\":\"\",\"scar\":\"\"}]', '[{\"angiogram_date\":\"2018-12-01\",\"angiogram\":null}]', '[{\"s_creatinine_date\":\"2018-12-01\",\"s_creatinine_value\":\"1.0\"},{\"s_creatinine_date\":\"2019-11-01\",\"s_creatinine_value\":\"1.04\"}]', '[{\"s_electrolytes_date\":\"2018-12-01\",\"s_electrolytes_sodium\":\"135\",\"s_electrolytes_potassium\":\"4.5\"},{\"s_electrolytes_date\":\"2019-11-01\",\"s_electrolytes_sodium\":\"138\",\"s_electrolytes_potassium\":\"4.4\"}]', '[{\"lipid_profile_date\":\"2009-06-01\",\"lipid_profile_tc\":\"132\",\"lipid_profile_ldl\":\"76\",\"lipid_profile_hdl\":\"34\",\"lipid_profile_tg\":\"238\"},{\"lipid_profile_date\":\"2015-05-01\",\"lipid_profile_tc\":\"262\",\"lipid_profile_ldl\":\"117\",\"lipid_profile_hdl\":\"40\",\"lipid_profile_tg\":\"226\"},{\"lipid_profile_date\":\"2017-02-01\",\"lipid_profile_tc\":\"160\",\"lipid_profile_ldl\":\"67\",\"lipid_profile_hdl\":\"35\",\"lipid_profile_tg\":\"346\"},{\"lipid_profile_date\":\"2018-12-01\",\"lipid_profile_tc\":\"196\",\"lipid_profile_ldl\":\"87\",\"lipid_profile_hdl\":\"46\",\"lipid_profile_tg\":\"311\"}]', '[{\"cbc_date\":\"2018-12-01\",\"cbc_hb\":\"15\",\"cbc_platelet\":\"260000\",\"cbc_tc\":\"1100\",\"cbc_dc\":\"46, 39, 0\"},{\"cbc_date\":\"2019-11-01\",\"cbc_hb\":\"14.5\",\"cbc_platelet\":\"221000\",\"cbc_tc\":\"1080\",\"cbc_dc\":\"52, 31, 2, 13\"}]', '[{\"glucose_date\":\"\",\"glucose_fbs\":\"\",\"glucose_rbs\":\"\",\"glucose_hab\":\"\",\"glucose_hbac\":\"\"}]', '[{\"vitamin_d_date\":\"0001-01-01\",\"vitamin_d_value\":\"12-> 27, 9, 18, 4, 18\"}]', '[{\"uric_acid_date\":\"\",\"uric_acid_value\":\"\"}]', '[{\"inr_date\":\"\",\"inr_value\":\"\"}]', '[{\"tsh_date\":\"\",\"tsh_value\":\"\"}]', '[{\"t_three_date\":\"\",\"t_three_value\":\"\"}]', '[{\"t_four_date\":\"\",\"t_four_value\":\"\"}]', '[{\"calcium_date\":\"\",\"calcium_value\":\"\"}]', '[{\"magnesium_date\":\"\",\"magnesium_value\":\"\"}]', '[{\"nt_pro_bnp_date\":\"\",\"nt_pro_bnp_value\":\"\"}]', '[]', NULL, NULL),
(63, '88', NULL, NULL, '[{\"pneumococcal\":\"Yes\",\"pn_date\":\"2016-02-01\"}]', NULL, '[{\"influenza\":\"Yes\",\"in_date\":\"2016-02-01\"}]', NULL, '{\"past_medical_history\":\"OMI (Ant) STK+, ALVF (03\\/09, NICVD)\\r\\n<br>H\\/O parapnmonic effusion (x 3 time)\\r\\n<br>CAG : SVG (LCX 80, OM 70%)  (06\\/09, LahAid)\"}', '{\"htn\":\"Yes\",\"asthma\":null,\"ba\":null,\"obstructive_sleep_apnoea\":null,\"dm_type_one\":null,\"dm_type_two\":null,\"copd\":null,\"cerebrovascular_accident\":null,\"dl\":null,\"renal_failure\":null,\"severe_musculoskeletal_disease\":null,\"positive_fh\":null,\"associated_cad\":null,\"cancer\":null,\"smoker_yes\":null,\"smoker_no\":\"No\",\"ex_smoker\":null,\"valvular_disease\":null,\"bleeding_diathesis\":null,\"alcohol\":null,\"thyroid_dysfunction\":null,\"peripheral_vascular_disease\":null,\"other_one\":\"\",\"other_two\":\"Gout, osteoarthritis, mild renal impairment\",\"other_three\":\"\",\"anaemia\":null}', '{\"diagnosis\":\"OMI (Ant) - STK+, H\\/O LVF, SV - CAD, H\\/O parapnellmonic etyuoion, HTN, DM, mild renal impairment\"}', '[{\"ecg_date\":\"2017-03-01\",\"findings\":\"RBBB\",\"rhythmc_sinus_AF\":\"\",\"qrs_ms\":\"126\",\"rbbb_lbbb\":\"\",\"heart_block\":\"\",\"qt_qtc\":\"\",\"ex_beats\":\"\"},{\"ecg_date\":\"2018-03-01\",\"findings\":\"Bitaosiunlar, block\",\"rhythmc_sinus_AF\":\"\",\"qrs_ms\":\"130\",\"rbbb_lbbb\":\"\",\"heart_block\":\"\",\"qt_qtc\":\"\",\"ex_beats\":\"\"},{\"ecg_date\":\"2018-10-01\",\"findings\":\"Bifasci, Block\",\"rhythmc_sinus_AF\":\"\",\"qrs_ms\":\"136\",\"rbbb_lbbb\":\"\",\"heart_block\":\"\",\"qt_qtc\":\"\",\"ex_beats\":\"\"}]', '[{\"echo_date\":\"2009-03-01\",\"lvidd_lvids\":\"48, 33, RWMAT+, PASP 77\",\"ef_per\":\"30 - 35%\",\"rvsp_pasp\":\"\",\"rwma\":\"\",\"d_d\":\"\",\"mr_none\":\"\",\"la\":\"\"},{\"echo_date\":\"2017-03-01\",\"lvidd_lvids\":\"56, 47, PWMA+, DD(IV), Mod, MR, PASP 52\",\"ef_per\":\"32%\",\"rvsp_pasp\":\"\",\"rwma\":\"\",\"d_d\":\"\",\"mr_none\":\"\",\"la\":\"\"},{\"echo_date\":\"2018-03-01\",\"lvidd_lvids\":\"56, 46, PASP 58, Mod, MR\",\"ef_per\":\"35%\",\"rvsp_pasp\":\"\",\"rwma\":\"\",\"d_d\":\"\",\"mr_none\":\"\",\"la\":\"\"},{\"echo_date\":\"2018-09-01\",\"lvidd_lvids\":\"60,52,ICM\",\"ef_per\":\"33%\",\"rvsp_pasp\":\"\",\"rwma\":\"\",\"d_d\":\"\",\"mr_none\":\"\",\"la\":\"\"},{\"echo_date\":\"2019-01-01\",\"lvidd_lvids\":\"54,43, PASP: 35\",\"ef_per\":\"30% - 35%\",\"rvsp_pasp\":\"\",\"rwma\":\"\",\"d_d\":\"\",\"mr_none\":\"\",\"la\":\"\"},{\"echo_date\":\"2020-12-01\",\"lvidd_lvids\":\"44\\/88\",\"ef_per\":\"56% \",\"rvsp_pasp\":\"sf\",\"rwma\":\"as\",\"d_d\":\"asf\",\"mr_none\":\"asf\",\"la\":\"saf\"}]', '[{\"chest_x_ray_date\":\"\",\"chest_x_ray_findings\":\"\",\"chest_x_ray_pulmonary_edema\":\"\",\"chest_x_ray_pvh\":\"\",\"chest_x_ray_pleural_effusion\":\"\",\"chest_x_ray_ct_ratio\":\"\"}]', '[{\"six_min_walk_date\":\"\",\"six_min_walk_performance\":\"\",\"six_min_walk_speed\":\"\",\"six_min_walk_distance\":\"\"}]', '[{\"holter_date\":\"\",\"holter_vpc\":\"\",\"holter_ventricular_arrhythmia\":null,\"holter_ventricular_arrhythmia_yes\":null,\"holter_atrial_arrhythmia\":null,\"holter_atrial_arrhythmia_yes\":null,\"holter_heart_rate_variability\":\"\",\"holter_othrt\":\"\"},{\"holter_date\":\"2020-12-02\",\"holter_vpc\":\"20\",\"holter_ventricular_arrhythmia\":\"No\",\"holter_ventricular_arrhythmia_yes\":null,\"holter_atrial_arrhythmia\":\"No\",\"holter_atrial_arrhythmia_yes\":null,\"holter_heart_rate_variability\":\"\",\"holter_othrt\":\"22\"}]', '[{\"stress_test_date\":\"\",\"involved_regions\":\"\",\"involved_coronary\":\"\",\"viable\":\"\",\"non_viable\":\"\",\"ischemia\":\"\",\"arrhythmias\":\"\",\"thr_achieved\":\"\"}]', '[{\"mpi_date\":\"\",\"lvef\":\"\",\"territory\":\"\",\"territory_persent\":\"\",\"scar\":\"\"}]', '[{\"angiogram_date\":\"2009-06-12\",\"angiogram\":null}]', '[{\"s_creatinine_date\":\"2009-06-12\",\"s_creatinine_value\":\"1.5\"},{\"s_creatinine_date\":\"2009-03-01\",\"s_creatinine_value\":\"1.5\"},{\"s_creatinine_date\":\"2018-04-01\",\"s_creatinine_value\":\"0.95\"},{\"s_creatinine_date\":\"2018-04-01\",\"s_creatinine_value\":\"0.95\"}]', '[{\"s_electrolytes_date\":\"2017-03-01\",\"s_electrolytes_sodium\":\"141\",\"s_electrolytes_potassium\":\"4.6\"},{\"s_electrolytes_date\":\"2017-09-01\",\"s_electrolytes_sodium\":\"137\",\"s_electrolytes_potassium\":\"4.6\"},{\"s_electrolytes_date\":\"2018-06-01\",\"s_electrolytes_sodium\":\"139\",\"s_electrolytes_potassium\":\"4.39\"}]', '[{\"lipid_profile_date\":\"2009-03-01\",\"lipid_profile_tc\":\"160\",\"lipid_profile_ldl\":\"102\",\"lipid_profile_hdl\":\"38\",\"lipid_profile_tg\":\"102\"},{\"lipid_profile_date\":\"2017-03-01\",\"lipid_profile_tc\":\"38\",\"lipid_profile_ldl\":\"68\",\"lipid_profile_hdl\":\"38\",\"lipid_profile_tg\":\"32\"},{\"lipid_profile_date\":\"2018-03-01\",\"lipid_profile_tc\":\"179\",\"lipid_profile_ldl\":\"109\",\"lipid_profile_hdl\":\"43\",\"lipid_profile_tg\":\"133\"}]', '[{\"cbc_date\":\"2016-02-02\",\"cbc_hb\":\"10\",\"cbc_platelet\":\"250000\",\"cbc_tc\":\"9000\",\"cbc_dc\":\"65, 29, 4, 2\"},{\"cbc_date\":\"2017-03-01\",\"cbc_hb\":\"10.3->14\",\"cbc_platelet\":\"245000\",\"cbc_tc\":\"4900\",\"cbc_dc\":\"67, 25, 5, 3\"}]', '[{\"glucose_date\":\"2017-04-01\",\"glucose_fbs\":\"4.1\",\"glucose_rbs\":\"7 -> 7.78 (1\\/19)\",\"glucose_hab\":\"30\",\"glucose_hbac\":\"6.4\"}]', '[{\"vitamin_d_date\":\"0001-01-01\",\"vitamin_d_value\":\"49\"}]', '[{\"uric_acid_date\":\"2017-03-01\",\"uric_acid_value\":\"9.9\"}]', '[{\"inr_date\":\"\",\"inr_value\":\"\"}]', '[{\"tsh_date\":\"\",\"tsh_value\":\"\"}]', '[{\"t_three_date\":\"\",\"t_three_value\":\"\"}]', '[{\"t_four_date\":\"\",\"t_four_value\":\"\"}]', '[{\"calcium_date\":\"\",\"calcium_value\":\"\"}]', '[{\"magnesium_date\":\"\",\"magnesium_value\":\"\"}]', '[{\"nt_pro_bnp_date\":\"\",\"nt_pro_bnp_value\":\"\"}]', '[{\"other_date\":\"0001-01-01\",\"other_name\":\"O\",\"other_value\":\" positive \"}]', NULL, NULL),
(64, '86', NULL, NULL, '[{\"pneumococcal\":null,\"pn_date\":\"\"}]', NULL, '[{\"influenza\":null,\"in_date\":\"\"}]', NULL, '{\"past_medical_history\":\"Known case of DCM (2009)\\r\\n<br>S\\/P CRTD implantation (01\\/10, UHL)\\r\\n<br>CT CAG: Non - Critical CAD (09\\/09)\\r\\n<br>last CRTD Check on 23.10.17\"}', '{\"htn\":null,\"asthma\":null,\"ba\":null,\"obstructive_sleep_apnoea\":null,\"dm_type_one\":\"I\",\"dm_type_two\":null,\"copd\":null,\"cerebrovascular_accident\":null,\"dl\":null,\"renal_failure\":null,\"severe_musculoskeletal_disease\":null,\"positive_fh\":null,\"associated_cad\":null,\"cancer\":null,\"smoker_yes\":null,\"smoker_no\":null,\"ex_smoker\":\"Ex-Smoker\",\"valvular_disease\":null,\"bleeding_diathesis\":null,\"alcohol\":null,\"thyroid_dysfunction\":null,\"peripheral_vascular_disease\":null,\"other_one\":\"\",\"other_two\":\"H\\/O Renal Impairment \",\"other_three\":\"\",\"anaemia\":null}', '{\"diagnosis\":\"DCM, S\\/P, CRTD, NON Critical CAD, DM. , H\\/O RENAL Impairment \"}', '[{\"ecg_date\":\"2018-07-01\",\"findings\":\"\",\"rhythmc_sinus_AF\":\"\",\"qrs_ms\":\"153\",\"rbbb_lbbb\":\"\",\"heart_block\":\"\",\"qt_qtc\":\"\",\"ex_beats\":\"\"},{\"ecg_date\":\"2020-02-01\",\"findings\":\"\",\"rhythmc_sinus_AF\":\"\",\"qrs_ms\":\"124\",\"rbbb_lbbb\":\"\",\"heart_block\":\"\",\"qt_qtc\":\"\",\"ex_beats\":\"\"}]', '[{\"echo_date\":\"2009-09-01\",\"lvidd_lvids\":\"67, 57, RWMA+\",\"ef_per\":\"33%\",\"rvsp_pasp\":\"\",\"rwma\":\"\",\"d_d\":\"\",\"mr_none\":\"\",\"la\":\"\"},{\"echo_date\":\"2016-08-01\",\"lvidd_lvids\":\"57, 44, RWMA +\",\"ef_per\":\"40%\",\"rvsp_pasp\":\"\",\"rwma\":\"\",\"d_d\":\"\",\"mr_none\":\"\",\"la\":\"\"},{\"echo_date\":\"2018-07-01\",\"lvidd_lvids\":\"57, 47, RWMA+, PASP : 38\",\"ef_per\":\"35%\",\"rvsp_pasp\":\"\",\"rwma\":\"\",\"d_d\":\"\",\"mr_none\":\"\",\"la\":\"\"},{\"echo_date\":\"2020-02-01\",\"lvidd_lvids\":\"69, 59\",\"ef_per\":\"30%\",\"rvsp_pasp\":\"\",\"rwma\":\"\",\"d_d\":\"\",\"mr_none\":\"\",\"la\":\"\"}]', '[{\"chest_x_ray_date\":\"\",\"chest_x_ray_findings\":\"\",\"chest_x_ray_pulmonary_edema\":\"\",\"chest_x_ray_pvh\":\"\",\"chest_x_ray_pleural_effusion\":\"\",\"chest_x_ray_ct_ratio\":\"\"}]', '[{\"six_min_walk_date\":\"\",\"six_min_walk_performance\":\"\",\"six_min_walk_speed\":\"\",\"six_min_walk_distance\":\"\"}]', '[{\"holter_date\":\"\",\"holter_vpc\":\"\",\"holter_ventricular_arrhythmia\":null,\"holter_ventricular_arrhythmia_yes\":null,\"holter_atrial_arrhythmia\":null,\"holter_atrial_arrhythmia_yes\":null,\"holter_heart_rate_variability\":\"\",\"holter_othrt\":\"\"}]', '[{\"stress_test_date\":\"\",\"involved_regions\":\"\",\"involved_coronary\":\"\",\"viable\":\"\",\"non_viable\":\"\",\"ischemia\":\"\",\"arrhythmias\":\"\",\"thr_achieved\":\"\"}]', '[{\"mpi_date\":\"\",\"lvef\":\"\",\"territory\":\"\",\"territory_persent\":\"\",\"scar\":\"\"}]', '[{\"angiogram_date\":\"2016-08-01\",\"angiogram\":null}]', '[{\"s_creatinine_date\":\"2016-08-01\",\"s_creatinine_value\":\"1.49\"},{\"s_creatinine_date\":\"2018-07-01\",\"s_creatinine_value\":\"1.5\"}]', '[{\"s_electrolytes_date\":\"2016-08-01\",\"s_electrolytes_sodium\":\"125\",\"s_electrolytes_potassium\":\"3.6\"},{\"s_electrolytes_date\":\"2018-07-01\",\"s_electrolytes_sodium\":\"139\",\"s_electrolytes_potassium\":\"4.6\"}]', '[{\"lipid_profile_date\":\"2018-07-01\",\"lipid_profile_tc\":\"177\",\"lipid_profile_ldl\":\"115\",\"lipid_profile_hdl\":\"32\",\"lipid_profile_tg\":\"240\"},{\"lipid_profile_date\":\"2020-02-01\",\"lipid_profile_tc\":\"233\",\"lipid_profile_ldl\":\"122\",\"lipid_profile_hdl\":\"40\",\"lipid_profile_tg\":\"475\"}]', '[{\"cbc_date\":\"2018-12-01\",\"cbc_hb\":\"\",\"cbc_platelet\":\"\",\"cbc_tc\":\"13200\",\"cbc_dc\":\"73, 22, 2,3\"},{\"cbc_date\":\"2018-07-01\",\"cbc_hb\":\"13.0\",\"cbc_platelet\":\"\",\"cbc_tc\":\"14200\",\"cbc_dc\":\"70, 25, 0\"}]', '[{\"glucose_date\":\"2015-01-01\",\"glucose_fbs\":\"18.8\",\"glucose_rbs\":\"\",\"glucose_hab\":\"\",\"glucose_hbac\":\"\"}]', '[{\"vitamin_d_date\":\"\",\"vitamin_d_value\":\"\"}]', '[{\"uric_acid_date\":\"\",\"uric_acid_value\":\"\"}]', '[{\"inr_date\":\"\",\"inr_value\":\"\"}]', '[{\"tsh_date\":\"\",\"tsh_value\":\"\"}]', '[{\"t_three_date\":\"\",\"t_three_value\":\"\"}]', '[{\"t_four_date\":\"\",\"t_four_value\":\"\"}]', '[{\"calcium_date\":\"\",\"calcium_value\":\"\"}]', '[{\"magnesium_date\":\"\",\"magnesium_value\":\"\"}]', '[{\"nt_pro_bnp_date\":\"\",\"nt_pro_bnp_value\":\"\"}]', '[]', NULL, NULL),
(78, '92', NULL, NULL, '[{\"pneumococcal\":null,\"pn_date\":\"2020-12-02\"}]', NULL, '[{\"influenza\":\"Yes\",\"in_date\":\"\"}]', NULL, '{\"past_medical_history\":\"jhkfhjk\"}', '{\"htn\":\"Yes\",\"asthma\":null,\"ba\":null,\"obstructive_sleep_apnoea\":null,\"dm_type_one\":\"I\",\"dm_type_two\":null,\"copd\":null,\"cerebrovascular_accident\":null,\"dl\":null,\"renal_failure\":null,\"severe_musculoskeletal_disease\":null,\"positive_fh\":null,\"associated_cad\":null,\"cancer\":null,\"smoker_yes\":null,\"smoker_no\":null,\"ex_smoker\":null,\"valvular_disease\":null,\"bleeding_diathesis\":null,\"alcohol\":null,\"thyroid_dysfunction\":null,\"peripheral_vascular_disease\":null,\"other_one\":\"\",\"other_two\":\"\",\"other_three\":\"\",\"anaemia\":null}', '{\"diagnosis\":\"fghjfhj\"}', '[{\"ecg_date\":\"2020-12-01\",\"findings\":\"2\",\"rhythmc_sinus_AF\":\"asdg\",\"qrs_ms\":\"\",\"rbbb_lbbb\":\"\",\"heart_block\":\"\",\"qt_qtc\":\"\",\"ex_beats\":\"\"}]', '[{\"echo_date\":\"2020-12-01\",\"lvidd_lvids\":\"44\\/88\",\"ef_per\":\"\",\"rvsp_pasp\":\"\",\"rwma\":\"\",\"d_d\":\"\",\"mr_none\":\"\",\"la\":\"\"}]', '[{\"chest_x_ray_date\":\"\",\"chest_x_ray_findings\":\"\",\"chest_x_ray_pulmonary_edema\":\"\",\"chest_x_ray_pvh\":\"\",\"chest_x_ray_pleural_effusion\":\"\",\"chest_x_ray_ct_ratio\":\"\"}]', '[{\"six_min_walk_date\":\"\",\"six_min_walk_performance\":\"\",\"six_min_walk_speed\":\"\",\"six_min_walk_distance\":\"\"}]', '[{\"holter_date\":\"\",\"holter_vpc\":\"\",\"holter_ventricular_arrhythmia\":null,\"holter_ventricular_arrhythmia_yes\":null,\"holter_atrial_arrhythmia\":null,\"holter_atrial_arrhythmia_yes\":null,\"holter_heart_rate_variability\":\"\",\"holter_othrt\":\"\"}]', '[{\"stress_test_date\":\"\",\"involved_regions\":\"\",\"involved_coronary\":\"\",\"viable\":\"\",\"non_viable\":\"\",\"ischemia\":\"\",\"arrhythmias\":\"\",\"thr_achieved\":\"\"}]', '[{\"mpi_date\":\"\",\"lvef\":\"\",\"territory\":\"\",\"territory_persent\":\"\",\"scar\":\"\"}]', '[{\"angiogram_date\":\"\",\"angiogram\":null}]', '[{\"s_creatinine_date\":\"\",\"s_creatinine_value\":\"\"}]', '[{\"s_electrolytes_date\":\"\",\"s_electrolytes_sodium\":\"\",\"s_electrolytes_potassium\":\"\"}]', '[{\"lipid_profile_date\":\"\",\"lipid_profile_tc\":\"\",\"lipid_profile_ldl\":\"\",\"lipid_profile_hdl\":\"\",\"lipid_profile_tg\":\"\"}]', '[{\"cbc_date\":\"\",\"cbc_hb\":\"\",\"cbc_platelet\":\"\",\"cbc_tc\":\"\",\"cbc_dc\":\"\"}]', '[{\"glucose_date\":\"\",\"glucose_fbs\":\"\",\"glucose_rbs\":\"\",\"glucose_hab\":\"\",\"glucose_hbac\":\"\"}]', '[{\"vitamin_d_date\":\"\",\"vitamin_d_value\":\"\"}]', '[{\"uric_acid_date\":\"\",\"uric_acid_value\":\"\"}]', '[{\"inr_date\":\"\",\"inr_value\":\"\"}]', '[{\"tsh_date\":\"\",\"tsh_value\":\"\"}]', '[{\"t_three_date\":\"\",\"t_three_value\":\"\"}]', '[{\"t_four_date\":\"\",\"t_four_value\":\"\"}]', '[{\"calcium_date\":\"\",\"calcium_value\":\"\"}]', '[{\"magnesium_date\":\"\",\"magnesium_value\":\"\"}]', '[{\"nt_pro_bnp_date\":\"\",\"nt_pro_bnp_value\":\"\"}]', '[{\"other_date\":\"2020-12-24\",\"other_name\":\"fghj\",\"other_value\":\"ghj\"},{\"other_date\":\"2020-12-17\",\"other_name\":\"gfhj\",\"other_value\":\"fghj\"}]', NULL, NULL),
(77, '87', NULL, NULL, '[{\"pneumococcal\":null,\"pn_date\":\"2020-12-01\"}]', NULL, '[{\"influenza\":\"Yes\",\"in_date\":\"2020-12-02\"}]', NULL, '{\"past_medical_history\":\"Demo data for test\\r\\n<br>Demo data for test\"}', '{\"htn\":\"Yes\",\"asthma\":\"Yes\",\"ba\":null,\"obstructive_sleep_apnoea\":null,\"dm_type_one\":\"I\",\"dm_type_two\":null,\"copd\":\"Yes\",\"cerebrovascular_accident\":\"Yes\",\"dl\":\"Yes\",\"renal_failure\":null,\"severe_musculoskeletal_disease\":\"Yes\",\"positive_fh\":\"Yes\",\"associated_cad\":null,\"cancer\":null,\"smoker_yes\":null,\"smoker_no\":\"No\",\"ex_smoker\":null,\"valvular_disease\":\"Yes\",\"bleeding_diathesis\":null,\"alcohol\":\"Yes\",\"thyroid_dysfunction\":null,\"peripheral_vascular_disease\":\"Yes\",\"other_one\":\"Demo data for test\",\"other_two\":\"Demo data for test\",\"other_three\":\"Demo data for test\",\"anaemia\":\"Yes\"}', '{\"diagnosis\":\"Demo data for test\"}', '[{\"ecg_date\":\"2020-12-01\",\"findings\":\"Demo data for test\",\"rhythmc_sinus_AF\":\"Demo data for test\",\"qrs_ms\":\"Demo data for test\",\"rbbb_lbbb\":\"Demo data for test\",\"heart_block\":\"Demo data for test\",\"qt_qtc\":\"Demo data for test\",\"ex_beats\":\"Demo data for test\"}]', '[{\"echo_date\":\"2020-12-02\",\"lvidd_lvids\":\"Demo data for test\",\"ef_per\":\"Demo data for test\",\"rvsp_pasp\":\"Demo data for test\",\"rwma\":\"Demo data for test\",\"d_d\":\"Demo data for test\",\"mr_none\":\"Demo data for test\",\"la\":\"Demo data for test\"}]', '[{\"chest_x_ray_date\":\"2020-12-02\",\"chest_x_ray_findings\":\"Demo data for test\",\"chest_x_ray_pulmonary_edema\":\"Demo data for test\",\"chest_x_ray_pvh\":\"Demo data for test\",\"chest_x_ray_pleural_effusion\":\"Demo data for test\",\"chest_x_ray_ct_ratio\":\"Demo data for test\"}]', '[{\"six_min_walk_date\":\"2020-12-02\",\"six_min_walk_performance\":\"Demo data for test\",\"six_min_walk_speed\":\"Demo data for test\",\"six_min_walk_distance\":\"Demo data for test\"}]', '[{\"holter_date\":\"2020-12-01\",\"holter_vpc\":\"Demo data for test\",\"holter_ventricular_arrhythmia\":\"Yes\",\"holter_ventricular_arrhythmia_yes\":\"NSV\",\"holter_atrial_arrhythmia\":\"No\",\"holter_atrial_arrhythmia_yes\":null,\"holter_heart_rate_variability\":\"\",\"holter_othrt\":\"Demo data for test\"}]', '[{\"stress_test_date\":\"2020-12-01\",\"involved_regions\":\"Demo data for test\",\"involved_coronary\":\"Demo data for test\",\"viable\":\"Demo data for test\",\"non_viable\":\"Demo data for test\",\"ischemia\":\"Demo data for test\",\"arrhythmias\":\"Demo data for test\",\"thr_achieved\":\"Demo data for test\"}]', '[{\"mpi_date\":\"2020-12-09\",\"lvef\":\"Demo data for test\",\"territory\":\"Demo data for test\",\"territory_persent\":\"Demo data for test\",\"scar\":\"Demo data for test\"}]', '[{\"angiogram_date\":\"2020-12-01\",\"angiogram\":\"Normal\"}]', '[{\"s_creatinine_date\":\"2020-12-01\",\"s_creatinine_value\":\"Demo data for test\"}]', '[{\"s_electrolytes_date\":\"2020-12-01\",\"s_electrolytes_sodium\":\"Demo data for test\",\"s_electrolytes_potassium\":\"Demo data for test\"}]', '[{\"lipid_profile_date\":\"2020-12-01\",\"lipid_profile_tc\":\"Demo data for test\",\"lipid_profile_ldl\":\"Demo data for test\",\"lipid_profile_hdl\":\"Demo data for test\",\"lipid_profile_tg\":\"Demo data for test\"}]', '[{\"cbc_date\":\"2020-12-01\",\"cbc_hb\":\"Demo data for test\",\"cbc_platelet\":\"Demo data for test\",\"cbc_tc\":\"Demo data for test\",\"cbc_dc\":\"Demo data for test\"}]', '[{\"glucose_date\":\"2020-12-01\",\"glucose_fbs\":\"Demo data for test\",\"glucose_rbs\":\"Demo data for test\",\"glucose_hab\":\"Demo data for test\",\"glucose_hbac\":\"Demo data for test\"}]', '[{\"vitamin_d_date\":\"2020-12-01\",\"vitamin_d_value\":\"Demo data for test\"}]', '[{\"uric_acid_date\":\"2020-12-01\",\"uric_acid_value\":\"Demo data for test\"}]', '[{\"inr_date\":\"2020-12-01\",\"inr_value\":\"Demo data for test\"}]', '[{\"tsh_date\":\"2020-12-01\",\"tsh_value\":\"Demo data for test\"}]', '[{\"t_three_date\":\"2020-12-01\",\"t_three_value\":\"Demo data for test\"}]', '[{\"t_four_date\":\"2020-12-01\",\"t_four_value\":\"Demo data for test\"}]', '[{\"calcium_date\":\"2020-12-01\",\"calcium_value\":\"Demo data for test\"}]', '[{\"magnesium_date\":\"2020-12-01\",\"magnesium_value\":\"Demo data for test\"}]', '[{\"nt_pro_bnp_date\":\"2020-12-01\",\"nt_pro_bnp_value\":\"Demo data for test\"}]', '[{\"other_date\":\"2020-12-01\",\"other_name\":\"Demo data for test\",\"other_value\":\"Demo data for test\"},{\"other_date\":\"2020-12-01\",\"other_name\":\"Demo data for test\",\"other_value\":\"Demo data for test\"}]', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` int(50) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `address` varchar(150) NOT NULL,
  `phone` varchar(150) NOT NULL,
  `department` varchar(150) NOT NULL,
  `profile` varchar(500) NOT NULL,
  `facebook` varchar(200) NOT NULL,
  `twitter` varchar(200) NOT NULL,
  `linkedin` varchar(200) NOT NULL,
  `google` varchar(200) NOT NULL,
  `img_url` varchar(250) NOT NULL,
  `ion_user_id` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `name`, `email`, `password`, `address`, `phone`, `department`, `profile`, `facebook`, `twitter`, `linkedin`, `google`, `img_url`, `ion_user_id`) VALUES
(3, 'Dr. NAM Momenuzzaman', 'doctor@example.com', '12345', 'United Hospital, Dhaka', '01710016092', '1', 'sdf', 'sdfs', 'sdfsdf', 'sdfsdfsd', 'sdfsdfsdfsdfsdf', 'uploads/15578237282Dr_momenuzzaman1.jpg', '7');

-- --------------------------------------------------------

--
-- Table structure for table `d_medicine`
--

CREATE TABLE `d_medicine` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `d_medicine`
--

INSERT INTO `d_medicine` (`id`, `name`) VALUES
(15, 'Tab Rocovas  50mg '),
(165, 'Tab Frulac 20/50'),
(13, 'Tab Ecosprin (75mg) '),
(17, 'Tab Montair 10mg '),
(18, 'Tab Hemofix Fz '),
(19, ' Tab Ostocal-D '),
(20, 'Tab Carnista 6.25mg '),
(21, 'Tab Betaloc 50 mg'),
(22, 'Tab entresto 200mg'),
(23, 'Tab vastarel mr 35mg'),
(191, 'Tab NeuroB'),
(204, 'Tab Cavazide (150Mg)'),
(26, 'Tab mezest 160mg'),
(27, 'Tab bextram silver'),
(29, 'Tab feralstat 400mg'),
(30, 'Tab Tocit 5mg'),
(31, 'Cap d-rise 40000'),
(160, 'Tab Bislol (2.5 mg)'),
(166, 'Tab Finix (20 mg)'),
(34, 'Tab atova 20mg'),
(35, 'Tab calbo-D'),
(142, 'Tab Larb (50Mg)'),
(161, 'Tab Agoxin'),
(38, 'Tab sandocal-d'),
(39, 'Tab mezest 160mg'),
(143, 'Cap Fimoxyclar (625Mg)'),
(85, 'Cap. Flugal (50Mg)'),
(42, 'Tab coracal -d'),
(43, 'Tab clopid as'),
(44, 'Tab belatoc 50mg'),
(45, 'Enfresto 100mg'),
(46, 'Tab frulac 40/50 mg'),
(47, 'Tab iva prex 5mg'),
(48, 'Tab nitromint sr'),
(49, 'Tab.calvimax-plus'),
(50, 'Tab meroxlyn 5m'),
(51, 'Tab lopiref plus'),
(52, 'Tab prazopress-er'),
(182, 'Tab Osartil 100mg'),
(167, 'Tab Levoxin 500'),
(55, 'Tab clopid-as'),
(56, 'Tab carnista 6.25mg'),
(57, 'Entresto 500mg'),
(58, 'Rocovas 10mg'),
(59, 'Tab epleron 25mg'),
(65, 'Tab Dilgard (12.5 mg)'),
(64, 'Tab Dilgard (12.5 mg)'),
(66, 'Tab Losardil (50Mg)'),
(67, 'Tab Monas (10 Mg)'),
(68, 'Tab Siglita(50 mg)'),
(175, 'Tab Edeloss'),
(70, 'Inhaler Ticamet 25/250'),
(172, 'Tab Bisopro (2.5 Mg)'),
(73, 'Tab Angilock (.50 Mg)'),
(74, 'Tab Atrovast (10Mg)'),
(75, 'Tab Nexum (20Mg)'),
(76, 'Tab Mexulin (30/70)'),
(173, 'Inhaler Seroxyn HFA'),
(78, 'Inhaler Scebri (80MG)'),
(79, 'Tab Calbo - D (500Mg)'),
(80, 'Tab Xinc - B'),
(81, 'Tab Warin (5Mg)'),
(82, 'Tab Valsartil or Sioan (160Mg)'),
(83, 'Tab Spirocard (25Mg)'),
(170, 'Tab Entresto (50 mg)'),
(86, 'Ointment Terbifin'),
(87, 'Tab asotin'),
(88, 'Tab Mave (135Mg)'),
(89, 'Tab Rivotril (0.5Mg)'),
(90, 'Tab Finis (20Mg)'),
(91, 'Tab Carvista (12.5)'),
(189, 'Tab Calcin M Vita'),
(93, 'Tab B - 50 Forte'),
(94, 'dcnw'),
(95, 'Cap Lirica (25Mg)'),
(96, 'Cap Losectil (20Mg)'),
(97, 'Tab Span 40'),
(98, 'Tab Mirez (15Mg)'),
(99, 'Tab Amolosartan (5/160)'),
(100, 'Tab Unicorntine (40Mg)'),
(101, 'Tab Prokind (15Mg)'),
(102, 'Tab Corestain (5Mg)'),
(103, 'Tab Lexotanil (3Mg)'),
(104, 'Iy Humulin 30/70 (1000)'),
(105, 'Tab Thugrox (50Mg)'),
(106, 'Cap Galcapen (300Mg)'),
(107, 'Tab Nilmin SR (2.6 Mg)'),
(108, 'Tab Ewsprin (75Mg)'),
(109, 'Tab Sabitar (10Mg)'),
(110, 'Tab Avas (10Mg)'),
(111, 'Tab Edeloss (40/50)'),
(112, 'Tab Doxiva (400Mg)'),
(113, 'Tab Secrin (2Mg)'),
(114, 'Tab Ostogen - D'),
(195, 'Cap Sergel (20Mg)'),
(116, 'Tab Sitgil M (50/500)'),
(117, 'Tab Gaba - p (25Mg)'),
(118, 'Tab Fusid (40Mg)'),
(119, 'Tab Fossical - D'),
(120, 'Tab Comet (500Mg)'),
(121, 'Cap Ziliron - B'),
(122, 'Tab Fabustat (40Mg)'),
(123, 'Inj Lantus Solostau 100'),
(124, 'Inj Apisra Solosau'),
(125, 'Tab Gulureron (0.5Mg)'),
(126, 'Tab Acecard (1.25Mg)'),
(127, 'Tab Ambrisan (5Mg)'),
(128, 'Cap Zif - CI'),
(129, 'Tab Pladex (75Mg)'),
(130, 'Tab Empa (10Mg)'),
(131, 'Cap Fenocap (200Mg)'),
(132, 'Tab Nebicard (2.5 Mg)'),
(133, 'Tab Accpril 10'),
(134, 'Tab Delipid (300Mg)'),
(135, 'Inj Mixtard (30/70)'),
(136, 'Tab Cavazide (300Mg)'),
(137, 'Inj D3 Bon (2 lac To)'),
(138, 'Tab Cadalcn 200'),
(139, 'Tab Rivarex 20'),
(140, 'Tab Rosua 2.0'),
(141, 'Tab Dilatrael 25'),
(144, 'Tab Lasix (40Mg)'),
(145, 'Tab Fryptw 10'),
(146, 'Micoral get'),
(147, 'Osyp Mon'),
(148, 'Tab Galvasmet (50/850Mg)'),
(149, 'Tab Empatab (25Mg)'),
(150, 'Tab Emistal (80Mg)'),
(151, 'Tab Xelpid (10Mg)'),
(152, 'Tav Fossical - D'),
(153, 'Tab Ramipril (5Mg)'),
(154, 'Tab Fusid Plus (20/50)'),
(155, 'Tab Cinaron Plus '),
(156, 'Tab Edegra (50Mg)'),
(157, 'Insulin Mixtard 30(1000)'),
(158, 'Tab Sabitar (50Mg)'),
(159, 'Tab Agoxin (0.025mg)'),
(162, 'Tab Bislol (5 mg)'),
(163, 'Tab Angilock (50 Mg)'),
(164, 'Tab Angilock (25 Mg)'),
(168, 'Tab Frulac 20'),
(169, 'Tab Febustat 40'),
(171, 'Tab Ostocal Dx'),
(174, 'Inj Maxsulin 30/70'),
(176, 'Tab Edeloss (20/50)'),
(177, 'Tab Omidon 10mg'),
(178, 'Tab Alova 10mg'),
(179, 'Cap Losectil (40Mg)'),
(180, 'Tab Carvista (25 mg)'),
(181, '..........'),
(183, 'Tab Osartil 50mg'),
(184, 'Tab D-rise (2000 IU)'),
(185, 'Tab Napa Extend '),
(186, 'Tab Flexibac 10mg'),
(187, 'Tab Calorate (740mg)'),
(188, 'Cap Q.10 -30'),
(190, 'Tab Atova 10mg'),
(192, 'Tab Angilock (100 Mg)'),
(193, 'Cap Tigirate (200 mg)'),
(194, 'Tab Thyrox (.50 mg)'),
(196, 'Inhaler Bexitnol f (25/250)'),
(197, 'Tab Carvista (6.25 mg)'),
(198, 'Tab Agoxin (0.25mg)'),
(199, 'Tab Doxiva (200Mg)'),
(200, 'Tab Gluretor 0.5 mg'),
(201, 'Tab Coralcal (500 mg)'),
(202, 'Tab Tiginor (10mg)'),
(203, 'Tab Tiginor (20mg)'),
(205, 'Tab Aldonist(25Mg)'),
(206, 'Tab Nomopil (20Mg)'),
(207, 'Tab Cardaron (100Mg)'),
(208, 'Tab dicattrol (0.25Mg)'),
(209, 'Tab vasigestto'),
(210, 'Tab Fluver (5Mg)'),
(211, 'Tab Menaril (8Mg)'),
(212, 'Ospy Mom'),
(213, 'Tab Rewnil (200Mg)'),
(214, 'Tab Nodia (10Mg)'),
(215, 'Tab Maxpro (20Mg)'),
(216, 'Tab Reconil (200Mg)'),
(217, 'Tab Reconil (200Mg)'),
(218, 'Tab Stacor (10Mg)'),
(219, 'Tab Pantonix (20Mg)'),
(220, 'Tab Rovast (5Mg)'),
(221, 'Tab Nexcital (5Mg)'),
(222, 'Cap Calcitriol (25Mg)'),
(223, 'Tab Nexcital(5Mg)'),
(224, 'Tab Osartil (25Mg)'),
(225, 'Tab Urinide (1mg)'),
(226, 'Tab Inospiron (25Mg)'),
(227, 'Tba Moxibac(400Mg)'),
(228, 'Tab Sinewd (50Mg)'),
(229, 'Tab Reversain (10Mg)'),
(230, 'Tab Deslon (10Mg)'),
(231, 'Tab Acmigra(50Mg)'),
(232, 'Tab Rex');

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

CREATE TABLE `email` (
  `id` int(50) NOT NULL,
  `subject` varchar(500) NOT NULL,
  `date` varchar(150) NOT NULL,
  `message` varchar(10000) NOT NULL,
  `recipient` varchar(10000) NOT NULL,
  `user` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `email`
--

INSERT INTO `email` (`id`, `subject`, `date`, `message`, `recipient`, `user`) VALUES
(1, 'single email', '1593537344', 'ssss mmmmm', 'All Patient', '1');

-- --------------------------------------------------------

--
-- Table structure for table `email_settings`
--

CREATE TABLE `email_settings` (
  `id` int(50) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `user` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `email_settings`
--

INSERT INTO `email_settings` (`id`, `admin_email`, `type`, `user`, `password`) VALUES
(1, 'sajib@adolbodol.com', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `facility`
--

CREATE TABLE `facility` (
  `id` int(150) NOT NULL,
  `department_id` varchar(500) NOT NULL,
  `name` varchar(500) NOT NULL,
  `description` varchar(1000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `facility`
--

INSERT INTO `facility` (`id`, `department_id`, `name`, `description`) VALUES
(4, '2', 'Nurse', 'fdhfh  hsfdhhfd hfdh  '),
(5, '2', 'Mr. Patient', 'dfhfdh sh dhfghf  hgfsh '),
(6, '1', '25may sfdhfh', 'nrnwtrtn n trjtj ttrjnerhe'),
(3, '1', 'Murad', 'mmmmmmmmmmm m                   mm          m mmmmmm');

-- --------------------------------------------------------

--
-- Table structure for table `frontend_setting`
--

CREATE TABLE `frontend_setting` (
  `id` int(150) NOT NULL,
  `h_name` varchar(500) NOT NULL,
  `contact` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `open_a` varchar(500) NOT NULL,
  `open_b` varchar(500) NOT NULL,
  `open_c` varchar(500) NOT NULL,
  `facebook` varchar(500) NOT NULL,
  `twitter` varchar(500) NOT NULL,
  `google` varchar(500) NOT NULL,
  `youtube` varchar(500) NOT NULL,
  `copyright` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `frontend_setting`
--

INSERT INTO `frontend_setting` (`id`, `h_name`, `contact`, `email`, `open_a`, `open_b`, `open_c`, `facebook`, `twitter`, `google`, `youtube`, `copyright`) VALUES
(1, 'DR. NAM MOMENUZZAMAN', '01791-612121', 'wakeupictacademy@gmail.com', '10.00-21.0', '10.00-18.0', '11.00-17.00', 'sdfsd', 'sdfsdf', 'sdfsd', 'sdfsd', 'ab');

-- --------------------------------------------------------

--
-- Table structure for table `front_about`
--

CREATE TABLE `front_about` (
  `id` int(150) NOT NULL,
  `title` varchar(500) NOT NULL,
  `description` varchar(1500) NOT NULL,
  `img_url` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `front_about`
--

INSERT INTO `front_about` (`id`, `title`, `description`, `img_url`) VALUES
(1, 'WakeUp ICT Academy', 'To keep the body in good health is a duty. Otherwise we shall not be able to keep our mind strong and clear 44 nnbbl.To keep the body in good health is a duty. Otherwise we shall not be able to keep our mind strong and clear 44 nnbbl.To keep the body in good health is a duty. Otherwise we shall not be able to keep our mind strong and clear 44 nnbbl.To keep the body in good health is a duty. Otherwise we shall not be able to keep our mind strong and clear 44 nnbbl.To keep the body in good health is a duty. Otherwise we shall not be able to keep our mind strong and clear 44 nnbbl', 'uploads/about11.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `front_header`
--

CREATE TABLE `front_header` (
  `id` int(150) NOT NULL,
  `title` varchar(500) NOT NULL,
  `description` varchar(1500) NOT NULL,
  `type` varchar(500) NOT NULL,
  `img_url` varchar(345) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `front_header`
--

INSERT INTO `front_header` (`id`, `title`, `description`, `type`, `img_url`) VALUES
(1, 'DR. NAM MOMENUZZAMAN', 'MBBS, D-Card. MD (Card) <br>\r\nChief Consultant <br>\r\nUnited Hospital Limited', '', 'uploads/sir_1920-600.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `front_service`
--

CREATE TABLE `front_service` (
  `id` int(150) NOT NULL,
  `title` varchar(1000) NOT NULL,
  `description` varchar(1500) NOT NULL,
  `img_url` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `front_service`
--

INSERT INTO `front_service` (`id`, `title`, `description`, `img_url`) VALUES
(1, 'Cardiology', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec lorem maximus malesuada lorem maximus mauris.', 'uploads/0001691.jpg'),
(4, 'Medical Lab', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec lorem maximus malesuada lorem maximus mauris.', 'uploads/Picture1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `front_service_header`
--

CREATE TABLE `front_service_header` (
  `id` int(150) NOT NULL,
  `title` varchar(1000) NOT NULL,
  `description` varchar(1500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `front_service_header`
--

INSERT INTO `front_service_header` (`id`, `title`, `description`) VALUES
(1, 'Our Services 24/7 ', 'dFdsfdsf eafewr ');

-- --------------------------------------------------------

--
-- Table structure for table `front_welcome`
--

CREATE TABLE `front_welcome` (
  `id` int(150) NOT NULL,
  `title` varchar(500) NOT NULL,
  `description` varchar(1500) NOT NULL,
  `img_url` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `front_welcome`
--

INSERT INTO `front_welcome` (`id`, `title`, `description`, `img_url`) VALUES
(1, 'Welcome To DR. NAM MOMENUZZAMAN', 'In the basic CodeIgniter course we created a basic app for user to add project and task. In this course we will create a complete software called “Hospital management system”.  <br>\r\nYou can find the complete structure or the feature, users activities and  <br> views of the software on your asset folder. The file name is “”.\r\nIn the previous course we use localhost but in this course we will use web server.   So 1st we have to create a subdomain under our hosting.   \r\n', 'uploads/BSA-hospital-header1200x50003331.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User'),
(3, 'patient', 'patient info'),
(4, 'doctor', 'doctor info'),
(5, 'nurse', 'nurse info'),
(6, 'pharmacist', 'pharmacist info'),
(7, 'receptionist', 'receptionist info'),
(8, 'accountant', 'accountant info'),
(9, 'laboratorist', 'laboratorist info');

-- --------------------------------------------------------

--
-- Table structure for table `laboratorist`
--

CREATE TABLE `laboratorist` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `img_url` varchar(200) NOT NULL,
  `ion_user_id` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laboratorist`
--

INSERT INTO `laboratorist` (`id`, `name`, `email`, `password`, `address`, `phone`, `img_url`, `ion_user_id`) VALUES
(2, 'Labratorist', 'labratorist@gmail.com', '123456', 'Kholifa Potti Rajbari', '01749335508', '', '37'),
(3, 'mr. lab', 'lab@gmail.com', '123456', 'Ramkantopur, Rajbari', '+564+64+65', '', '21');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `new_prescription`
--

CREATE TABLE `new_prescription` (
  `id` int(150) NOT NULL,
  `patient_id` varchar(150) CHARACTER SET latin1 DEFAULT NULL,
  `doctor_id` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `date` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `visit_no` varchar(100) DEFAULT NULL,
  `diagnosis` varchar(10000) CHARACTER SET latin1 DEFAULT NULL,
  `chief_complaints` mediumtext CHARACTER SET latin1 DEFAULT NULL,
  `signs_symptoms` varchar(10000) CHARACTER SET latin1 DEFAULT NULL,
  `physical_examination` mediumtext DEFAULT NULL,
  `allowances` varchar(1000) DEFAULT NULL,
  `deductions` varchar(10000) DEFAULT NULL,
  `status` varchar(150) CHARACTER SET latin1 DEFAULT NULL,
  `payroll_code` varchar(150) CHARACTER SET latin1 DEFAULT NULL,
  `daily_water` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `extra_salt` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `saline` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `borhani` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `chips` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `influenza` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `pneumonia` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `next_appointment` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `week` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `month` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `comment` varchar(500) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `new_prescription`
--

INSERT INTO `new_prescription` (`id`, `patient_id`, `doctor_id`, `date`, `visit_no`, `diagnosis`, `chief_complaints`, `signs_symptoms`, `physical_examination`, `allowances`, `deductions`, `status`, `payroll_code`, `daily_water`, `extra_salt`, `saline`, `borhani`, `chips`, `influenza`, `pneumonia`, `next_appointment`, `week`, `month`, `comment`) VALUES
(87, '89', '3', '27-07-2017', '3', '(3rd Visit)', 'Impored, Recent Chiknguniya, | valking elgort, Reunt, desentry', '{\"Exertional SOB\":\"Absent\",\"NYHA Classification\":\"  II  III  \",\"Onthopnoea\":\"No\",\"PND\":\"No\",\"ExertionalChestPain\":\"Absent\",\"Palpitation\":null,\"Fatigue\":\"Absent\",\"Dizziness\":\"Absent\",\"Syncopy\\/Presyncopy\":null,\"Overall QQL\":\"Fair\",\"Leg Swelling\":\"Absent\",\"Sleep Disturbance\":\"Present\",\"Appetite\":\"Good\",\"Bowel Habit\":\"Normal\",\"Sexual Activities\":\"Normal\",\"Mental Status\":null,\"Psychological Status\":null}', '{\"Weight\":\"67 <- 68kg\",\"Anemia\\/ Jaundice \\/ Cyanosis\":null,\"Edema\":\"Absent\",\"JVP\":\"Not Rised\",\"Pulse\":\"76 HR Inr\",\"Pulse B\\/M\":null,\"BP\":\"120\\/80\",\"Heart\":\"s1 + s2\",\"Lungs\":\"clear\",\"6MWT\":null,\"Echo\":null,\"ECG\":null}', '[]', '[{\"type\":\"Tab Bislol (5 mg)\",\"amount\":\"1+0+0\",\"duration\":\"\\u099a\\u09b2\\u09ac\\u09c7\"},{\"type\":\"Tab Angilock (50 Mg)\",\"amount\":\"1+0+1\",\"duration\":\"\\u099a\\u09b2\\u09ac\\u09c7\"},{\"type\":\"Tab Agoxin (0.025mg)\",\"amount\":\"1+0+0\",\"duration\":\"\\u09b8\\u09aa\\u09cd\\u09a4\\u09be\\u09b9\\u09c7 5 \\u09a6\\u09bf\\u09a8 - \\u099a\\u09b2\\u09ac\\u09c7\"},{\"type\":\"Tab Warin (5Mg)\",\"amount\":\"0 + 0 +  0.5\",\"duration\":\"\\u099a\\u09b2\\u09ac\\u09c7\"},{\"type\":\"Tab Spirocard (25Mg)\",\"amount\":\"1+0+0\",\"duration\":\"\\u099a\\u09b2\\u09ac\\u09c7\"},{\"type\":\"Tab Mave (135Mg)\",\"amount\":\"1+1+1\",\"duration\":\"\\u099a\\u09b2\\u09ac\\u09c7\"},{\"type\":\"Tab Nexum (20Mg)\",\"amount\":\"1+0+1\",\"duration\":\"\\u099a\\u09b2\\u09ac\\u09c7\"},{\"type\":\"Tab Rivotril (0.5Mg)\",\"amount\":\"0+0+1\",\"duration\":\"\\u0998\\u09c1\\u09ae \\u09a8\\u09be \\u09b9\\u09b2\\u09c7\"}]', 'Done', '7eb7bda', '1', 'yes', 'yes', 'yes', 'yes', NULL, NULL, '4', NULL, 'Month', '(02/05) Ectatic wronaries'),
(84, '89', '3', '20-12-2016', '1', '1st visit', '^ PUD', '{\"Exertional SOB\":\"Present\",\"NYHA Classification\":\"  II  III  \",\"Onthopnoea\":\"No\",\"PND\":\"No\",\"ExertionalChestPain\":\"Absent\",\"Palpitation\":\"Absent\",\"Fatigue\":\"Absent\",\"Dizziness\":\"Absent\",\"Syncopy\\/Presyncopy\":null,\"Overall QQL\":\"Fair\",\"Leg Swelling\":\"Absent\",\"Sleep Disturbance\":\"Present\",\"Appetite\":\"Good\",\"Bowel Habit\":\"Normal\",\"Sexual Activities\":\"Normal\",\"Mental Status\":null,\"Psychological Status\":null}', '{\"Weight\":\"67 <-65kg\",\"Anemia\\/ Jaundice \\/ Cyanosis\":null,\"Edema\":\"Present\",\"JVP\":\"Not Rised\",\"Pulse\":\"72\",\"Pulse B\\/M\":null,\"BP\":\"130\\/85\",\"Heart\":\"s1 + s2\",\"Lungs\":\"clear\",\"6MWT\":null,\"Echo\":null,\"ECG\":null}', '[]', '[{\"type\":\"Tab Agoxin\",\"amount\":\"1+0+0\",\"duration\":\"\\u09b8\\u09aa\\u09cd\\u09a4\\u09be\\u09b9\\u09c7 5 \\u09a6\\u09bf\\u09a8 - \\u099a\\u09b2\\u09ac\\u09c7\"},{\"type\":\"Tab Bislol (5 mg)\",\"amount\":\"1+0+0\",\"duration\":\"\\u099a\\u09b2\\u09ac\\u09c7\"},{\"type\":\"Tab Angilock (25 Mg)\",\"amount\":\"1+0+1\",\"duration\":\"\\u099a\\u09b2\\u09ac\\u09c7\"},{\"type\":\"Tab Warin (5Mg)\",\"amount\":\"0 + 0 +  0.5\",\"duration\":\"\"},{\"type\":\"Tab Frulac 20\\/50\",\"amount\":\"0.5 + 0 + 0\",\"duration\":\"\\u099a\\u09b2\\u09ac\\u09c7\"},{\"type\":\"Tab Finix (20 mg)\",\"amount\":\"1+0+1\",\"duration\":\"\\u099a\\u09b2\\u09ac\\u09c7\"},{\"type\":\"Tab Montair 10mg \",\"amount\":\"0+0+1\",\"duration\":\"\\u099a\\u09b2\\u09ac\\u09c7\"},{\"type\":\"Tab Rivotril (0.5Mg)\",\"amount\":\"0+0+1\",\"duration\":\"\"}]', 'Done', 'e86b5e2', '1-1.25', 'yes', 'yes', 'yes', 'yes', 'Influenza', 'Pneumonia', '6', NULL, 'Month', '(02/05) Ectatic wronaries'),
(86, '89', '3', '23-03-2017', '2', '(2nd)', '', '{\"Exertional SOB\":\"Present\",\"NYHA Classification\":\"  II  III  \",\"Onthopnoea\":\"No\",\"PND\":\"No\",\"ExertionalChestPain\":\"Absent\",\"Palpitation\":\"Absent\",\"Fatigue\":\"Absent\",\"Dizziness\":\"Absent\",\"Syncopy\\/Presyncopy\":null,\"Overall QQL\":\"Fair\",\"Leg Swelling\":\"Absent\",\"Sleep Disturbance\":\"Present\",\"Appetite\":\"Good\",\"Bowel Habit\":\"Normal\",\"Sexual Activities\":\"Normal\",\"Mental Status\":null,\"Psychological Status\":null}', '{\"Weight\":\"68  <- 67 Kg\",\"Anemia\\/ Jaundice \\/ Cyanosis\":null,\"Edema\":null,\"JVP\":\"Raised (45)\",\"Pulse\":\"72 Hr imegula\",\"Pulse B\\/M\":null,\"BP\":\"140\\/70\",\"Heart\":\"s1 + s2\",\"Lungs\":\"clear\",\"6MWT\":null,\"Echo\":null,\"ECG\":null}', '[]', '[{\"type\":\"Tab Bislol (5 mg)\",\"amount\":\"1+0+0\",\"duration\":\"\\u099a\\u09b2\\u09ac\\u09c7\"},{\"type\":\"Tab Angilock (50 Mg)\",\"amount\":\"1 + 0 + 0.5\",\"duration\":\"\\u099a\\u09b2\\u09ac\\u09c7\"},{\"type\":\"Tab Agoxin (0.025mg)\",\"amount\":\"1+0+0\",\"duration\":\"\\u09b8\\u09aa\\u09cd\\u09a4\\u09be\\u09b9\\u09c7 5 \\u09a6\\u09bf\\u09a8 - \\u099a\\u09b2\\u09ac\\u09c7\"},{\"type\":\"Tab Warin (5Mg)\",\"amount\":\"0 + 0 +  0.5\",\"duration\":\"\\u099a\\u09b2\\u09ac\\u09c7\"},{\"type\":\"Tab Spirocard (25Mg)\",\"amount\":\"1+0+0\",\"duration\":\"\\u099a\\u09b2\\u09ac\\u09c7\"}]', 'Done', '84baf2e', '1.25 - 1.5', 'yes', NULL, 'yes', 'yes', 'Influenza', 'Pneumonia', '4', 'Week', NULL, '(02/05) Ectatic wronaries'),
(88, '88', '3', '01-02-2017', '1', '', '', '{\"Exertional SOB\":\"Present\",\"NYHA Classification\":\"      \",\"Onthopnoea\":\"No\",\"PND\":\"No\",\"ExertionalChestPain\":\"Absent\",\"Palpitation\":null,\"Fatigue\":\"Present\",\"Dizziness\":\"Absent\",\"Syncopy\\/Presyncopy\":null,\"Overall QQL\":\"Fair\",\"Leg Swelling\":\"Present\",\"Sleep Disturbance\":\"Present\",\"Appetite\":\"Good\",\"Bowel Habit\":\"Normal\",\"Sexual Activities\":\"Normal\",\"Mental Status\":null,\"Psychological Status\":null}', '{\"Weight\":\"70 <- 67kg\",\"Anemia\\/ Jaundice \\/ Cyanosis\":null,\"Edema\":\"Present\",\"JVP\":\"\",\"Pulse\":\"68\",\"Pulse B\\/M\":null,\"BP\":\"110\\/70\",\"Heart\":\"s1 + s2\",\"Lungs\":\"clear\",\"6MWT\":null,\"Echo\":null,\"ECG\":null}', '[]', '[{\"type\":\"Tab Warin (5Mg)\",\"amount\":\"0+0+1\",\"duration\":\"\"},{\"type\":\"Tab Bislol (2.5 mg)\",\"amount\":\"1+0+0\",\"duration\":\"\"},{\"type\":\"Tab Angilock (50 Mg)\",\"amount\":\"0+0+1\",\"duration\":\"\"},{\"type\":\"Tab Frulac 20\",\"amount\":\"0.5 + 0 + 0\",\"duration\":\"\"},{\"type\":\"Tab Levoxin 500\",\"amount\":\"1+0+0\",\"duration\":\"10 \\u09a6\\u09bf\\u09a8\"},{\"type\":\"Tab Rivotril (0.5Mg)\",\"amount\":\"0+0+1\",\"duration\":\"\"}]', 'Done', '2363d3e', '1-1.5', 'yes', 'yes', 'yes', 'yes', 'Influenza', 'Pneumonia', '4', NULL, 'Month', ''),
(89, '88', '3', '26-05-2018', '2', '', 'Improved.  ^ PUD', '{\"Exertional SOB\":\"Present\",\"NYHA Classification\":\"I  II    \",\"Onthopnoea\":\"No\",\"PND\":\"No\",\"ExertionalChestPain\":\"Absent\",\"Palpitation\":\"Absent\",\"Fatigue\":\"Absent\",\"Dizziness\":\"Absent\",\"Syncopy\\/Presyncopy\":null,\"Overall QQL\":\"Fair\",\"Leg Swelling\":null,\"Sleep Disturbance\":null,\"Appetite\":null,\"Bowel Habit\":\"Normal\",\"Sexual Activities\":null,\"Mental Status\":null,\"Psychological Status\":null}', '{\"Weight\":\"67 <- 70kg\",\"Anemia\\/ Jaundice \\/ Cyanosis\":null,\"Edema\":\"Absent\",\"JVP\":\"Not Rised\",\"Pulse\":\"90\",\"Pulse B\\/M\":null,\"BP\":\"100\\/70\",\"Heart\":\"s1 + s2\",\"Lungs\":\"clear\",\"6MWT\":null,\"Echo\":null,\"ECG\":null}', '[]', '[{\"type\":\"Tab Warin (5Mg)\",\"amount\":\"0 + 0 +  0.5\",\"duration\":\"\\u099a\\u09b2\\u09ac\\u09c7 - \\u09ac\\u09bf\\u0995\\u09c7\\u09b2 \\u09aa\\u09be\\u0981\\u099a\\u099f\\u09be\"},{\"type\":\"Tab Bislol (2.5 mg)\",\"amount\":\"1 + 0 + 0.5\",\"duration\":\"\\u099a\\u09b2\\u09ac\\u09c7\"},{\"type\":\"Tab Entresto (50 mg)\",\"amount\":\"0.5 + 0 + 0.5\",\"duration\":\"\\u099a\\u09b2\\u09ac\\u09c7\"},{\"type\":\"Tab Spirocard (25Mg)\",\"amount\":\"1+0+0\",\"duration\":\"\\u099a\\u09b2\\u09ac\\u09c7\"},{\"type\":\"Tab Nexum (20Mg)\",\"amount\":\"1+0+1\",\"duration\":\"\\u099a\\u09b2\\u09ac\\u09c7\"},{\"type\":\"Cap Flugal (50Mg)\",\"amount\":\"1+1+1\",\"duration\":\"\\u09aa\\u09cd\\u09b0\\u09a4\\u09bf \\u09b8\\u09aa\\u09cd\\u09a4\\u09be\\u09b9\\u09c7 \\u098f\\u0995\\u099f\\u09bf \\u0995\\u09b0\\u09c7 - \\u09a4\\u09bf\\u09a8 \\u09ae\\u09be\\u09b8\"},{\"type\":\"Ointment Terbifin\",\"amount\":\"0+0+0\",\"duration\":\"\\u09a8\\u0996\\u09c7 \\u09a6\\u09bf\\u09a8\\u09c7 \\u09e8-\\u09e9 \\u09ac\\u09be\\u09b0 -\\u09e9 \\u09ae\\u09be\\u09b8\"},{\"type\":\"Tab Agoxin\",\"amount\":\"1+0+0\",\"duration\":\"\\u09b8\\u09aa\\u09cd\\u09a4\\u09be\\u09b9\\u09c7 5 \\u09a6\\u', 'Done', '95188e4', '1.5', 'yes', NULL, 'yes', 'yes', 'Influenza', 'Pneumonia', '6', NULL, 'Month', '02/05 Ectatic wronaries'),
(90, '88', '3', '26-09-2018', '3', 'DCM Ectatic coronary artaies, Permanent AF', 'Improred is not taking tab Entnesto', '{\"Exertional SOB\":\"Absent\",\"NYHA Classification\":\"I  II    \",\"Onthopnoea\":\"No\",\"PND\":\"No\",\"ExertionalChestPain\":\"Absent\",\"Palpitation\":\"Absent\",\"Fatigue\":\"Absent\",\"Dizziness\":\"Absent\",\"Syncopy\\/Presyncopy\":\"No\",\"Overall QQL\":\"Fair\",\"Leg Swelling\":\"Absent\",\"Sleep Disturbance\":\"Present\",\"Appetite\":\"Good\",\"Bowel Habit\":\"Normal\",\"Sexual Activities\":null,\"Mental Status\":\"Alert\",\"Psychological Status\":null}', '{\"Weight\":\"67 <-65kg (26.05.18)\",\"Anemia\\/ Jaundice \\/ Cyanosis\":null,\"Edema\":\"Absent\",\"JVP\":\"Not Rised\",\"Pulse\":\"100\",\"Pulse B\\/M\":\"Irregiler\",\"BP\":\"80\\/60\",\"Heart\":\"s1 + s2\",\"Lungs\":\"clear\",\"6MWT\":null,\"Echo\":null,\"ECG\":null}', '[]', '[{\"type\":\"Tab Warin (5Mg)\",\"amount\":\"0 + 0 +  0.5\",\"duration\":\"\\u099a\\u09b2\\u09ac\\u09c7 - \\u09ac\\u09bf\\u0995\\u09c7\\u09b2 \\u09aa\\u09be\\u0981\\u099a\\u099f\\u09be\"},{\"type\":\"Tab Bislol (2.5 mg)\",\"amount\":\"1+0+0.5\",\"duration\":\"\\u099a\\u09b2\\u09ac\\u09c7\"},{\"type\":\"Tab Angilock (25 Mg)\",\"amount\":\"0+0+1\",\"duration\":\"\\u099a\\u09b2\\u09ac\\u09c7\"},{\"type\":\"Tab Spirocard (25Mg)\",\"amount\":\"1+0+0\",\"duration\":\"\\u099a\\u09b2\\u09ac\\u09c7\"},{\"type\":\"Tab Agoxin (0.025mg)\",\"amount\":\"1+0+0\",\"duration\":\"\\u09b8\\u09aa\\u09cd\\u09a4\\u09be\\u09b9\\u09c7 5 \\u09a6\\u09bf\\u09a8 - \\u099a\\u09b2\\u09ac\\u09c7\"},{\"type\":\" Tab Ostocal Dx \",\"amount\":\"0+0+1\",\"duration\":\"(\\u09ad\\u09b0\\u09be \\u09aa\\u09c7\\u099f\\u09c7) - \\u099a\\u09b2\\u09ac\\u09c7\"}]', 'Done', 'faaacd5', '1.5', 'yes', 'yes', 'yes', 'yes', 'Influenza', 'Pneumonia', '6', NULL, 'Month', '(02/05) Ectatic wronaries'),
(204, '87', '3', '01-12-2020', '04', 'Demo data for test', 'Demo data for test', '{\"Exertional SOB\":\"Present\",\"NYHA Classification\":\"  II    \",\"Onthopnoea\":\"Yes\",\"PND\":\"No\",\"ExertionalChestPain\":\"Present\",\"Palpitation\":\"Absent\",\"Fatigue\":\"Present\",\"Dizziness\":\"Absent\",\"Syncopy\\/Presyncopy\":\"Yes\",\"Overall QQL\":\"Medium\",\"Leg Swelling\":\"Present\",\"Sleep Disturbance\":\"Absent\",\"Appetite\":\"Poor\",\"Bowel Habit\":\"Diarrhea\",\"Sexual Activities\":\"Normal\",\"Mental Status\":\"Confused\",\"Psychological Status\":\"Depression\"}', '{\"Weight\":\"64\",\"Anemia\\/ Jaundice \\/ Cyanosis\":\"Jaundice\",\"Edema\":\"Absent\",\"JVP\":\"Demo data for test\",\"Pulse\":\"Demo data for test\",\"Pulse B\\/M\":\"Reguler\",\"BP\":\"Demo data for test\",\"Heart\":\"Demo data for test\",\"Lungs\":\"Demo data for test\",\"6MWT\":null,\"Echo\":null,\"ECG\":null}', '[]', '[{\"type\":\"Tab Frulac 20\\/50\",\"amount\":\"0+0+1\",\"duration\":\"\\u099a\\u09b2\\u09ac\\u09c7\"},{\"type\":\"Tab Frulac 20\\/50\",\"amount\":\"1+0+0\",\"duration\":\"\\u0996\\u09be\\u09ac\\u09be\\u09b0 \\u0986\\u09a7 \\u0998\\u09a3\\u09cd\\u099f\\u09be \\u0986\\u0997\\u09c7\"},{\"type\":\"Tab Hemofix Fz \",\"amount\":\"0+1+1\",\"duration\":\"\\u09ad\\u09b0\\u09be \\u09aa\\u09c7\\u099f\\u09c7\"}]', 'Done', '68ea3dc', 'Demo data for test', 'yes', 'yes', 'yes', 'yes', 'Influenza', 'Pneumonia', 'Demo data for test', NULL, 'Month', 'Demo data for test'),
(205, '87', '3', '01-12-2020', '08', 'Demo data for test', 'Demo data for test', '{\"Exertional SOB\":\"Present\",\"NYHA Classification\":\"I      \",\"Onthopnoea\":\"Yes\",\"PND\":\"Yes\",\"ExertionalChestPain\":\"Present\",\"Palpitation\":\"Present\",\"Fatigue\":\"Present\",\"Dizziness\":\"Present\",\"Syncopy\\/Presyncopy\":\"Yes\",\"Overall QQL\":\"Poor\",\"Leg Swelling\":\"Present\",\"Sleep Disturbance\":\"Present\",\"Appetite\":\"Poor\",\"Bowel Habit\":\"Normal\",\"Sexual Activities\":\"Normal\",\"Mental Status\":\"Alert\",\"Psychological Status\":\"Depression\"}', '{\"Weight\":\"Demo data for test\",\"Anemia\\/ Jaundice \\/ Cyanosis\":\"Anemia\",\"Edema\":\"Present\",\"JVP\":\"Demo data for test\",\"Pulse\":\"Demo data for test\",\"Pulse B\\/M\":\"Reguler\",\"BP\":\"Demo data for test\",\"Heart\":\"Demo data for test\",\"Lungs\":\"Demo data for test\",\"6MWT\":null,\"Echo\":null,\"ECG\":null}', '[]', '[{\"type\":\"Tab Montair 10mg \",\"amount\":\"1+1+0\",\"duration\":\"(\\u09ad\\u09b0\\u09be \\u09aa\\u09c7\\u099f\\u09c7) - \\u099a\\u09b2\\u09ac\\u09c7\"}]', 'Done', '61117f8', 'Demo data for test', 'yes', 'yes', 'yes', 'yes', 'Influenza', 'Pneumonia', 'Demo data for test', 'Week', NULL, 'Demo data for test'),
(124, '86', '3', '24-10-2019', '01', '', 'Improved', '{\"Exertional SOB\":\"Absent\",\"NYHA Classification\":\"  II    \",\"Onthopnoea\":\"No\",\"PND\":\"No\",\"ExertionalChestPain\":\"Absent\",\"Palpitation\":\"Absent\",\"Fatigue\":\"Absent\",\"Dizziness\":\"Absent\",\"Syncopy\\/Presyncopy\":null,\"Overall QQL\":\"Fair\",\"Leg Swelling\":\"Absent\",\"Sleep Disturbance\":\"Absent\",\"Appetite\":\"Fair\",\"Bowel Habit\":\"Normal\",\"Sexual Activities\":\"Normal\",\"Mental Status\":null,\"Psychological Status\":null}', '{\"Weight\":\"105\",\"Anemia\\/ Jaundice \\/ Cyanosis\":null,\"Edema\":\"Absent\",\"JVP\":\"not raised\",\"Pulse\":\"66\",\"Pulse B\\/M\":null,\"BP\":\"170\\/75\",\"Heart\":\"s1 + s2\",\"Lungs\":\"Clean\",\"6MWT\":null,\"Echo\":null,\"ECG\":null}', '[]', '[{\"type\":\"Tab Ecosprin (75mg) \",\"amount\":\"0+0+1\",\"duration\":\"(\\u09ad\\u09b0\\u09be \\u09aa\\u09c7\\u099f\\u09c7) - \\u099a\\u09b2\\u09ac\\u09c7\"},{\"type\":\"Tab Nebicard (2.5 Mg)\",\"amount\":\"1+0+0\",\"duration\":\"\\u099a\\u09b2\\u09ac\\u09c7\"},{\"type\":\"Tab Angilock (50 Mg)\",\"amount\":\"0.5 + 0 + 1\",\"duration\":\"\\u099a\\u09b2\\u09ac\\u09c7\"},{\"type\":\"Tab Frulac 20\\/50\",\"amount\":\"0.5 + 0 + 0\",\"duration\":\"\\u099a\\u09b2\\u09ac\\u09c7\"},{\"type\":\"Tab Atrovast (10Mg)\",\"amount\":\"0+0+1\",\"duration\":\"\\u0996\\u09be\\u09b2\\u09bf \\u09aa\\u09c7\\u099f\\u09c7 - (\\u099a\\u09b2\\u09ac\\u09c7)\"},{\"type\":\"..........\",\"amount\":\"......\",\"duration\":\".......\"},{\"type\":\"..........\",\"amount\":\"......\",\"duration\":\".......\"},{\"type\":\"Tab Finix (20 mg)\",\"amount\":\"1+0+1\",\"duration\":\"\\u099a\\u09b2\\u09ac\\u09c7\"}]', 'Done', 'ff1e633', '2', 'yes', 'yes', 'yes', NULL, 'Influenza', 'Pneumonia', '4', NULL, 'Month', ''),
(126, '86', '3', '15-07-2018', '', 'DCM, S/P CRTD', '', '{\"Exertional SOB\":\"Absent\",\"NYHA Classification\":\"  II    \",\"Onthopnoea\":\"No\",\"PND\":\"No\",\"ExertionalChestPain\":\"Absent\",\"Palpitation\":\"Absent\",\"Fatigue\":\"Absent\",\"Dizziness\":\"Absent\",\"Syncopy\\/Presyncopy\":\"No\",\"Overall QQL\":\"Fair\",\"Leg Swelling\":\"Absent\",\"Sleep Disturbance\":\"Absent\",\"Appetite\":\"Fair\",\"Bowel Habit\":\"Normal\",\"Sexual Activities\":null,\"Mental Status\":\"Alert\",\"Psychological Status\":null}', '{\"Weight\":\"104\",\"Anemia\\/ Jaundice \\/ Cyanosis\":null,\"Edema\":null,\"JVP\":\"Raised (sitting, low .33)\",\"Pulse\":\"76\",\"Pulse B\\/M\":null,\"BP\":\"100\\/60\",\"Heart\":\"s1 + s2\",\"Lungs\":\"Clean\",\"6MWT\":null,\"Echo\":null,\"ECG\":null}', '[]', '[{\"type\":\"Tab Ecosprin (75mg) \",\"amount\":\"0+0+1\",\"duration\":\"\"},{\"type\":\"Tab Nebicard (2.5 Mg)\",\"amount\":\"1+0+0\",\"duration\":\"\"},{\"type\":\"Tab Entresto (50 mg)\",\"amount\":\"1+0+1\",\"duration\":\"\"},{\"type\":\"Tab Frulac 20\\/50\",\"amount\":\"1+0+0\",\"duration\":\"\"},{\"type\":\"Tab Montair 10mg \",\"amount\":\"0+0+1\",\"duration\":\"\"},{\"type\":\"..........\",\"amount\":\"1+0+1\",\"duration\":\"\"},{\"type\":\" Tab Ostocal-D \",\"amount\":\"1+0+0\",\"duration\":\"\"},{\"type\":\"Tab Sabitar (10Mg)\",\"amount\":\"0 + 0 +  0.5\",\"duration\":\"\"}]', 'Done', '2756217', '1 - 1.5', 'yes', 'yes', 'yes', NULL, 'Influenza', 'Pneumonia', '4', NULL, 'Month', ''),
(129, '86', '3', '07-03-2020', '03', 'DCM, S/P, CRTD, NON Critical CAD, DM. , H/O RENAL Impairment', 'Tummy fullness, stc : 233 ta: 475', '{\"Exertional SOB\":\"Absent\",\"NYHA Classification\":\"  II    \",\"Onthopnoea\":\"No\",\"PND\":\"No\",\"ExertionalChestPain\":\"Absent\",\"Palpitation\":\"Absent\",\"Fatigue\":\"Present\",\"Dizziness\":\"Absent\",\"Syncopy\\/Presyncopy\":\"No\",\"Overall QQL\":\"Fair\",\"Leg Swelling\":\"Present\",\"Sleep Disturbance\":\"Absent\",\"Appetite\":\"Fair\",\"Bowel Habit\":\"Normal\",\"Sexual Activities\":null,\"Mental Status\":\"Alert\",\"Psychological Status\":null}', '{\"Weight\":\"104\",\"Anemia\\/ Jaundice \\/ Cyanosis\":null,\"Edema\":\"Absent\",\"JVP\":\"not raised\",\"Pulse\":\"80\",\"Pulse B\\/M\":null,\"BP\":\"120\\/80\",\"Heart\":\"s1 + s2\",\"Lungs\":\"Clean\",\"6MWT\":null,\"Echo\":null,\"ECG\":null}', '[]', '[{\"type\":\"Tab Ecosprin (75mg) \",\"amount\":\"0+0+1\",\"duration\":\"\\u09ad\\u09b0\\u09be \\u09aa\\u09c7\\u099f\\u09c7\"},{\"type\":\"Tab Valsartil or Sioan (160Mg)\",\"amount\":\"0 + 0 +  0.5\",\"duration\":\"\"},{\"type\":\"Tab Betaloc 50 mg\",\"amount\":\"1+0+1\",\"duration\":\"\"},{\"type\":\"Tab Edeloss (40\\/50)\",\"amount\":\"1+0+0\",\"duration\":\"\"},{\"type\":\" Tab Ostocal-D \",\"amount\":\"0+1+0\",\"duration\":\"\"},{\"type\":\"Inj Maxsulin 30\\/70\",\"amount\":\"......\",\"duration\":\"\"},{\"type\":\"Tab Empa (10Mg)\",\"amount\":\"1+0+1\",\"duration\":\"\\u09ad\\u09b0\\u09be \\u09aa\\u09c7\\u099f\\u09c7\"},{\"type\":\"..........\",\"amount\":\"0+0+1\",\"duration\":\".......\"},{\"type\":\"Cap Fenocap (200Mg)\",\"amount\":\"0+0+1\",\"duration\":\"\"}]', 'Done', '869a85f', '1.5', 'yes', 'yes', 'yes', NULL, NULL, NULL, '5', NULL, 'Month', 'S/P CRT-p implantation (2010)\r\nS/P CRT - P Ceneratoe Replecment (11.11.19, UHL)');

-- --------------------------------------------------------

--
-- Table structure for table `nurse`
--

CREATE TABLE `nurse` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `img_url` varchar(200) NOT NULL,
  `subject` varchar(500) DEFAULT NULL,
  `message` varchar(500) DEFAULT NULL,
  `ion_user_id` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nurse`
--

INSERT INTO `nurse` (`id`, `name`, `email`, `password`, `address`, `phone`, `img_url`, `subject`, `message`, `ion_user_id`) VALUES
(1, 'Nurse', 'nurse@gmail.com', '123123', 'sfdgfd gfdh', '61651+1', 'uploads/519514304058603135009565153513163773181952N_(1).jpg', NULL, NULL, '5'),
(2, 'Dr. Assistant Mia', 'assistant@example.com', '12345', 'assistantpara', '123456789', 'uploads/Asadur_Rahaman.png', NULL, NULL, '28'),
(5, 'sarkersajib330@gmail.com', 'sarkersajib330@gmail.com', 'sarkersajib330@gmail.com', 'sarkersajib330@gmail.com', 'sarkersajib330@gmail.com', '', 'congrats', 'You become a nurse', '58');

-- --------------------------------------------------------

--
-- Table structure for table `overPhoneInfo`
--

CREATE TABLE `overPhoneInfo` (
  `id` int(11) NOT NULL,
  `patient_id` varchar(100) DEFAULT NULL,
  `f_date` varchar(100) DEFAULT NULL,
  `time` varchar(100) DEFAULT NULL,
  `problem` varchar(500) DEFAULT NULL,
  `solution` varchar(500) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `overPhoneInfo`
--

INSERT INTO `overPhoneInfo` (`id`, `patient_id`, `f_date`, `time`, `problem`, `solution`) VALUES
(10, '87', '2020-12-02', '23:15', 'Fever', 'Good');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(50) NOT NULL,
  `patient_id` varchar(50) DEFAULT NULL,
  `assessment_date` varchar(100) DEFAULT NULL,
  `hf_id` varchar(100) DEFAULT NULL,
  `mr_no` varchar(100) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `visit_type` varchar(500) DEFAULT NULL,
  `sex` varchar(200) DEFAULT NULL,
  `birth_date` varchar(200) DEFAULT NULL,
  `highest_education_level` varchar(200) DEFAULT NULL,
  `phone` varchar(200) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `occupation` varchar(500) DEFAULT NULL,
  `monthly_income` varchar(500) DEFAULT NULL,
  `marital_status` varchar(500) DEFAULT NULL,
  `no_of_children` varchar(500) DEFAULT NULL,
  `blood_group` varchar(200) DEFAULT NULL,
  `menstrual_history` varchar(500) DEFAULT NULL,
  `caregiver_name_relation` varchar(500) DEFAULT NULL,
  `caregiver_phone_no` varchar(500) DEFAULT NULL,
  `height` varchar(500) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `img_url` varchar(250) DEFAULT NULL,
  `ion_user_id` varchar(150) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `patient_id`, `assessment_date`, `hf_id`, `mr_no`, `name`, `visit_type`, `sex`, `birth_date`, `highest_education_level`, `phone`, `address`, `occupation`, `monthly_income`, `marital_status`, `no_of_children`, `blood_group`, `menstrual_history`, `caregiver_name_relation`, `caregiver_phone_no`, `height`, `email`, `password`, `img_url`, `ion_user_id`) VALUES
(86, 'PSY7UHYF', NULL, '231', '258', 'Mr. Patient', NULL, 'Male', '1990-02-28', NULL, '123456', '', '', '', NULL, '', NULL, '', '', '123456', '', 'patient@example.com', '12345', NULL, '88'),
(87, 'PR3ISYUL', '', 'ac232', 'we2132', 'Sajib Sarker', 'Inpatient', 'Male', '1998-10-13', 'College', '01756600608', 'Rajbari, Dhaka', 'Web Developer', '$', 'Unmarried', '00', 'O+', 'Did not found', 'Did not found', '01756600608', '5\'10\"', 'sajib.wakeupict@gmail.com', '12345', NULL, '89'),
(89, 'POE663KQ', NULL, 'd3r43t', '88kjhjm', 'Murad Hasan Khan', 'Inpatient', 'Male', '1988-07-28', 'Graduate', '01710016092', 'Rajbari, Dhaka', 'Web Developer', '$', 'Unmarried', '00', 'O+', 'Did not found', 'Did not found', '01710016092', '5\'10\"', 'muradwakeupict@gmail.com', '12345', NULL, '91'),
(88, 'PTUDWG69', '', 'sd3423', 'efd47', 'Mahmuduz Zaman', 'Inpatient', 'Male', '1968-10-18', 'Post Graduate', '01791612121', 'Rajbari, Dhaka', 'Business man', '$$', 'Married', '02', 'O+', 'Did not found', 'Did not found', '01791612121', '5\'10\"', 'wakeupict@gmail.com', '12345', NULL, '90'),
(90, 'P8CF96FE', NULL, 'fd4fe43', 'ferf4353', 'Ab Siddique', 'Inpatient', 'Male', '1998-01-30', 'College', '01780805503', 'Rajbari, Dhaka', 'Web developer', '$', 'Unmarried', '00', 'B+', 'Did not found', 'Did not found', '01780805503', '5\'10\"', 'absiddiquehc@gmail.com', '12345', NULL, '92');

-- --------------------------------------------------------

--
-- Table structure for table `pharmacist`
--

CREATE TABLE `pharmacist` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `img_url` varchar(200) NOT NULL,
  `ion_user_id` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pharmacist`
--

INSERT INTO `pharmacist` (`id`, `name`, `email`, `password`, `address`, `phone`, `img_url`, `ion_user_id`) VALUES
(3, 'Pharmacist', 'pharmacist@gmail.com', '123456', 'Kholifa Potti Rajbari', '01728302437', 'uploads/547309043236682518309045012168001969979392N.png', '34'),
(4, 'Mr fa', 'pr@example.com', '12345', 'asdf', 'asdfsadf', '', '29');

-- --------------------------------------------------------

--
-- Table structure for table `receptionist`
--

CREATE TABLE `receptionist` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `img_url` varchar(200) NOT NULL,
  `ion_user_id` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receptionist`
--

INSERT INTO `receptionist` (`id`, `name`, `email`, `password`, `address`, `phone`, `img_url`, `ion_user_id`) VALUES
(4, 'Mr. Receptionist', 'receptionist@example.com', '12345', 'addd', '12312323', '', '11');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `schedule_id` int(11) NOT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `available_date` varchar(100) DEFAULT NULL,
  `sl_no` varchar(100) DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `patient_id` varchar(100) DEFAULT NULL,
  `per_patient_time` time DEFAULT NULL,
  `add_date` varchar(250) NOT NULL,
  `place` varchar(250) NOT NULL,
  `status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`schedule_id`, `doctor_id`, `available_date`, `sl_no`, `start_time`, `end_time`, `patient_id`, `per_patient_time`, `add_date`, `place`, `status`) VALUES
(1690, 3, '2020-12-02', '1', '10:00:00', '10:10:00', '86', NULL, '', '', 'Approved'),
(1691, 3, '2020-12-02', '2', '10:10:00', '10:20:00', NULL, NULL, '', '', NULL),
(1692, 3, '2020-12-02', '3', '10:20:00', '10:30:00', NULL, NULL, '', '', NULL),
(1693, 3, '2020-12-02', '4', '10:30:00', '10:40:00', NULL, NULL, '', '', NULL),
(1694, 3, '2020-12-02', '5', '10:40:00', '10:50:00', NULL, NULL, '', '', NULL),
(1695, 3, '2020-12-02', '6', '10:50:00', '11:00:00', NULL, NULL, '', '', NULL),
(1696, 3, '2020-12-02', '7', '11:00:00', '11:10:00', NULL, NULL, '', '', NULL),
(1697, 3, '2020-12-02', '8', '11:10:00', '11:20:00', NULL, NULL, '', '', NULL),
(1698, 3, '2020-12-02', '9', '11:20:00', '11:30:00', NULL, NULL, '', '', NULL),
(1699, 3, '2020-12-02', '10', '11:30:00', '11:40:00', NULL, NULL, '', '', NULL),
(1700, 3, '2020-12-02', '11', '11:40:00', '11:50:00', NULL, NULL, '', '', NULL),
(1701, 3, '2020-12-02', '12', '11:50:00', '12:00:00', NULL, NULL, '', '', NULL),
(1702, 3, '2020-12-02', '13', '12:30:00', '12:40:00', NULL, NULL, '', '', NULL),
(1703, 3, '2020-12-02', '14', '12:40:00', '12:50:00', NULL, NULL, '', '', NULL),
(1704, 3, '2020-12-02', '15', '12:50:00', '01:00:00', NULL, NULL, '', '', NULL),
(1705, 3, '2020-12-02', '16', '01:00:00', '01:10:00', NULL, NULL, '', '', NULL),
(1706, 3, '2020-12-02', '17', '01:10:00', '01:20:00', NULL, NULL, '', '', NULL),
(1707, 3, '2020-12-02', '18', '01:20:00', '01:30:00', NULL, NULL, '', '', NULL),
(1708, 3, '2020-12-02', '19', '01:30:00', '01:40:00', NULL, NULL, '', '', NULL),
(1709, 3, '2020-12-02', '20', '01:40:00', '01:50:00', NULL, NULL, '', '', NULL),
(1710, 3, '2020-12-02', '21', '01:50:00', '02:00:00', NULL, NULL, '', '', NULL),
(1711, 3, '2020-12-02', '22', '02:00:00', '02:10:00', NULL, NULL, '', '', NULL),
(1712, 3, '2020-12-02', '23', '02:10:00', '02:20:00', NULL, NULL, '', '', NULL),
(1713, 3, '2020-12-02', '24', '02:20:00', '02:30:00', NULL, NULL, '', '', NULL),
(1714, 3, '2020-12-03', '1', '10:00:00', '10:10:00', NULL, NULL, '', '', NULL),
(1715, 3, '2020-12-03', '2', '10:10:00', '10:20:00', '86', NULL, '', '', 'Pending'),
(1716, 3, '2020-12-03', '3', '10:20:00', '10:30:00', NULL, NULL, '', '', NULL),
(1717, 3, '2020-12-03', '4', '10:30:00', '10:40:00', NULL, NULL, '', '', NULL),
(1718, 3, '2020-12-03', '5', '10:40:00', '10:50:00', NULL, NULL, '', '', NULL),
(1719, 3, '2020-12-03', '6', '10:50:00', '11:00:00', NULL, NULL, '', '', NULL),
(1720, 3, '2020-12-03', '7', '11:00:00', '11:10:00', NULL, NULL, '', '', NULL),
(1721, 3, '2020-12-03', '8', '11:10:00', '11:20:00', NULL, NULL, '', '', NULL),
(1722, 3, '2020-12-03', '9', '11:20:00', '11:30:00', NULL, NULL, '', '', NULL),
(1723, 3, '2020-12-03', '10', '11:30:00', '11:40:00', NULL, NULL, '', '', NULL),
(1724, 3, '2020-12-03', '11', '11:40:00', '11:50:00', NULL, NULL, '', '', NULL),
(1725, 3, '2020-12-03', '12', '11:50:00', '12:00:00', NULL, NULL, '', '', NULL),
(1726, 3, '2020-12-03', '13', '12:30:00', '12:40:00', NULL, NULL, '', '', NULL),
(1727, 3, '2020-12-03', '14', '12:40:00', '12:50:00', NULL, NULL, '', '', NULL),
(1728, 3, '2020-12-03', '15', '12:50:00', '01:00:00', NULL, NULL, '', '', NULL),
(1729, 3, '2020-12-03', '16', '01:00:00', '01:10:00', NULL, NULL, '', '', NULL),
(1730, 3, '2020-12-03', '17', '01:10:00', '01:20:00', NULL, NULL, '', '', NULL),
(1731, 3, '2020-12-03', '18', '01:20:00', '01:30:00', NULL, NULL, '', '', NULL),
(1732, 3, '2020-12-03', '19', '01:30:00', '01:40:00', NULL, NULL, '', '', NULL),
(1733, 3, '2020-12-03', '20', '01:40:00', '01:50:00', NULL, NULL, '', '', NULL),
(1734, 3, '2020-12-03', '21', '01:50:00', '02:00:00', NULL, NULL, '', '', NULL),
(1735, 3, '2020-12-03', '22', '02:00:00', '02:10:00', NULL, NULL, '', '', NULL),
(1736, 3, '2020-12-03', '23', '02:10:00', '02:20:00', NULL, NULL, '', '', NULL),
(1737, 3, '2020-12-03', '24', '02:20:00', '02:30:00', NULL, NULL, '', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) NOT NULL,
  `system_vendor` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `date_format` varchar(100) NOT NULL,
  `currency` varchar(100) NOT NULL,
  `login_title` varchar(100) NOT NULL,
  `img_url` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `system_vendor`, `title`, `address`, `phone`, `email`, `date_format`, `currency`, `login_title`, `img_url`) VALUES
(1, 'Hospital Management System', 'United Hospital', 'Dhaka 1212, Bangladesh', 'Hotline: 10666', 'hospital@gmail.com', 'd-m-Y', '$', 'Hospital Management System', 'uploads/united-logo1.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'Admin', '$2y$12$4bb10NuE9X89th6/z.VAqu74yENawOmqc1.oPOyOlgolFVDW7WRI2', 'admin@example.com', NULL, '', NULL, NULL, NULL, NULL, NULL, 1268889823, 1606842896, 1, 'Admin', 'istrator', 'ADMIN', '0'),
(2, '103.107.160.194', 'dsfasdfdsf', '$2y$10$gB4yQiNK7DKr/Xr2qrcJmOODCUvYxsiWJWuA8rJIYcguoNAJIQYNi', 'fdsafsd@gadsg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1553004720, NULL, 1, NULL, NULL, NULL, NULL),
(5, '103.107.160.194', 'Nurse', '$2y$10$V8lS9A1Eln1Unqx/oHW0c.JDx7gFYYEuBLGnHp/oX6KD0Rwy4Ejkm', 'nurse@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1553081188, NULL, 1, NULL, NULL, NULL, NULL),
(7, '103.107.160.194', 'Dr. NAM Momenuzzaman', '$2y$10$vp01VAPH5o0/6gYdTHVaJuT9Y.M3xVcPhFYWuyUl75BapW0ujS.I.', 'doctor@example.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1553154008, 1606843254, 1, NULL, NULL, NULL, NULL),
(11, '103.107.161.50', 'Mr. Receptionist', '$2y$10$phTU5L8s9E7YNQC9/8KKvOzQhLK8qblZpPZOweD5vYUjWk4x4tKry', 'receptionist@example.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1554871258, 1606843220, 1, NULL, NULL, NULL, NULL),
(14, '103.107.160.194', 'tttt', '$2y$10$4SahJRdghrsK3ueCC7oJ0.UcxfHmmlBYXcmg0Q3QC.5mRMYnK6tr2', 'tttt@tt.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1558759104, NULL, 1, NULL, NULL, NULL, NULL),
(15, '103.107.160.194', 'nnnn', '$2y$10$dFwE/ZrYCtvCZ1hR.zXXV.vwShi98GjpRwfVHKbbIvxZIotudWsE2', 'nnnn@ppp.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1558764277, NULL, 1, NULL, NULL, NULL, NULL),
(16, '103.107.160.194', 'llll@ll.com', '$2y$10$gNXVAx3YuHmIXmhpEqOZ1.SpdoGW8ckBs6j0QNGUBToeYw77zRQ3m', 'llll@ll.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1558764538, NULL, 1, NULL, NULL, NULL, NULL),
(17, '103.107.160.194', 'hhh', '$2y$10$DvKM/YChma7rbvohQ/Aogeoxz5eRi5DpuwHuzoE102Jn0HPatiY6O', 'hhh@hhh.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1558764669, NULL, 1, NULL, NULL, NULL, NULL),
(18, '103.107.160.194', 'Murad', '$2y$10$DSh.QOZpoWIOKpffixWAe.YDgIgpq7KaZIkx78zxMV62PWjLgrNIm', 'rrr@ddf.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1558764757, 1558765092, 1, NULL, NULL, NULL, NULL),
(19, '103.107.160.194', 'rgergtrewt', '$2y$10$q.ME1YNkv3iDtFHlo3bkX.9yGmGOeT47qcxhe0Gqy.djAzlFrXNFC', 'rgergtrewt-126-rgergtrewt-409@example.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1558765475, NULL, 1, NULL, NULL, NULL, NULL),
(21, '103.107.160.194', 'mr. lab', '$2y$10$T8f7wSa6FtvKZXB7igE9Veb4HI2oVwFrUeJJH9GDkoQ5ruVuUHswe', 'lab@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1558933571, 1559125899, 1, NULL, NULL, NULL, NULL),
(22, '103.107.160.194', 'dasvdasgf', '$2y$10$Cc2BEtMhrGuW1ZCadLpMNO2fCMvDKAxDqWfJmizaHwAJF1.R0pa7y', 'abc@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1559108041, 1559364418, 1, NULL, NULL, NULL, NULL),
(24, '103.107.162.86', 'fffffffff', '$2y$10$n.zxl8Bkp8rUY1NfCqOqc.quPeM6zi376ippi2r8djHDdB6Mhi2ya', 'asdfasdfdsf@dgdsagasdgsdg.fff', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1570461184, NULL, 1, NULL, NULL, NULL, NULL),
(27, '103.139.9.194', 'acc', '$2y$10$femMR5EexOU0FSZ8lF0myOlGag0FfJJA99OJc6WnZDIaYKpbOpN1K', 'acc@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1581347685, 1581347704, 1, NULL, NULL, NULL, NULL),
(28, '103.143.139.10', 'Dr. Assistant Mia', '$2y$10$DcxC9u5Zqe8YrXgjNW810elTJi1TAMAnjqrY/kUJDDzWjxdRGhNga', 'assistant@example.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1588047344, 1588047438, 1, NULL, NULL, NULL, NULL),
(29, '103.143.139.10', 'Mr fa', '$2y$10$0JcT.b/Ksf7s5rj6ABxinOUPV9gqb8TYIlf3LKK3F237eSUYHx6dS', 'pr@example.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1588051358, 1588051493, 1, NULL, NULL, NULL, NULL),
(49, '103.143.139.10', 'test 1', '$2y$10$a.qaE5glNXZFU.hKT56QOOeNBU0IGOaRHqve9pOTIWR0WYDTpwsUC', 'test1@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1591181962, NULL, 1, NULL, NULL, NULL, NULL),
(50, '103.143.139.10', 'fff test', '$2y$10$TlCag4Iin8geBxmkesqVaegAHaFWSiBCTb04ecNTGUkSkClu6NyXO', 'ffftest@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1591182211, NULL, 1, NULL, NULL, NULL, NULL),
(58, '103.143.139.10', 'sarkersajib330@gmail.com', '$2y$10$7FpRiqf72CA8xa0Mz9Kb5ec0Lx7LXTaSj8kzed9K.A1ng4.fSTTPm', 'sarkersajib330@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1593666663, NULL, 1, NULL, NULL, NULL, NULL),
(88, '103.147.166.38', 'Mr. Patient', '$2y$10$QRFiTaTW9ISXNHys6tkyvOARxJLecCIzSSR.bS2WvHfTZOFZFCaiK', 'patient@example.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1606794991, 1606843029, 1, NULL, NULL, NULL, NULL),
(89, '103.147.166.38', 'Sajib Sarker', '$2y$10$5TpNzxfy.UzjzWBcA.ZmvO0o2UVNc5E7LSeYfgfAG3KwGCLsduyc2', 'sajib.wakeupict@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1606822055, NULL, 1, NULL, NULL, NULL, NULL),
(90, '103.147.166.38', 'Mahmuduz Zaman', '$2y$10$CuabBzvMB1d5SQw0gCamoOTHN3YQE1dgqmGj7AspvT37IxQvMAJAi', 'wakeupict@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1606822872, NULL, 1, NULL, NULL, NULL, NULL),
(91, '103.147.166.38', 'Murad Hasan Khan', '$2y$10$ppYbE69NHODTNF.gCwvdM.weOzA.0LxJLvY622lP7AxGsXYVhaKQK', 'muradwakeupict@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1606823109, NULL, 1, NULL, NULL, NULL, NULL),
(92, '103.147.166.38', 'Ab Siddique', '$2y$10$yryLD/lP0nrJWBn/Dt4FouFcJHAz01/jrI4rKh8H1tdhfAqefUx4.', 'absiddiquehc@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1606823277, NULL, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(6, 5, 5),
(8, 7, 4),
(12, 11, 7),
(15, 14, 2),
(16, 15, 2),
(17, 16, 3),
(18, 17, 3),
(19, 18, 3),
(20, 19, 3),
(22, 21, 9),
(23, 22, 8),
(26, 27, 8),
(27, 28, 5),
(28, 29, 6),
(48, 49, 3),
(49, 50, 3),
(57, 58, 7),
(87, 88, 3),
(88, 89, 3),
(89, 90, 3),
(90, 91, 3),
(91, 92, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accountant`
--
ALTER TABLE `accountant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `add_prescription_comment`
--
ALTER TABLE `add_prescription_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `add_prescription_type`
--
ALTER TABLE `add_prescription_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_setting`
--
ALTER TABLE `blog_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chart_data`
--
ALTER TABLE `chart_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `d_medicine`
--
ALTER TABLE `d_medicine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_settings`
--
ALTER TABLE `email_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facility`
--
ALTER TABLE `facility`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frontend_setting`
--
ALTER TABLE `frontend_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `front_about`
--
ALTER TABLE `front_about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `front_header`
--
ALTER TABLE `front_header`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `front_service`
--
ALTER TABLE `front_service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `front_service_header`
--
ALTER TABLE `front_service_header`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `front_welcome`
--
ALTER TABLE `front_welcome`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laboratorist`
--
ALTER TABLE `laboratorist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `new_prescription`
--
ALTER TABLE `new_prescription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nurse`
--
ALTER TABLE `nurse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `overPhoneInfo`
--
ALTER TABLE `overPhoneInfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pharmacist`
--
ALTER TABLE `pharmacist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receptionist`
--
ALTER TABLE `receptionist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`schedule_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_email` (`email`),
  ADD UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  ADD UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  ADD UNIQUE KEY `uc_remember_selector` (`remember_selector`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accountant`
--
ALTER TABLE `accountant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `add_prescription_comment`
--
ALTER TABLE `add_prescription_comment`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `add_prescription_type`
--
ALTER TABLE `add_prescription_type`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `blog_setting`
--
ALTER TABLE `blog_setting`
  MODIFY `id` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `chart_data`
--
ALTER TABLE `chart_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `d_medicine`
--
ALTER TABLE `d_medicine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=233;

--
-- AUTO_INCREMENT for table `email`
--
ALTER TABLE `email`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `email_settings`
--
ALTER TABLE `email_settings`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `facility`
--
ALTER TABLE `facility`
  MODIFY `id` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `frontend_setting`
--
ALTER TABLE `frontend_setting`
  MODIFY `id` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `front_about`
--
ALTER TABLE `front_about`
  MODIFY `id` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `front_header`
--
ALTER TABLE `front_header`
  MODIFY `id` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `front_service`
--
ALTER TABLE `front_service`
  MODIFY `id` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `front_service_header`
--
ALTER TABLE `front_service_header`
  MODIFY `id` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `front_welcome`
--
ALTER TABLE `front_welcome`
  MODIFY `id` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `laboratorist`
--
ALTER TABLE `laboratorist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `new_prescription`
--
ALTER TABLE `new_prescription`
  MODIFY `id` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=207;

--
-- AUTO_INCREMENT for table `nurse`
--
ALTER TABLE `nurse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `overPhoneInfo`
--
ALTER TABLE `overPhoneInfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `pharmacist`
--
ALTER TABLE `pharmacist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `receptionist`
--
ALTER TABLE `receptionist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1738;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
