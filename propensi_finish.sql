-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.41-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             8.3.0.4694
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for propensi
CREATE DATABASE IF NOT EXISTS `propensi` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `propensi`;


-- Dumping structure for table propensi.access_notes
CREATE TABLE IF NOT EXISTS `access_notes` (
  `topic_id` int(11) NOT NULL,
  `resource_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  KEY `no_urut` (`topic_id`,`resource_id`,`course_id`,`teacher_id`,`student_id`),
  KEY `no_urut_2` (`topic_id`,`resource_id`,`course_id`,`teacher_id`,`student_id`),
  KEY `no_urut_3` (`topic_id`,`resource_id`,`course_id`,`teacher_id`,`student_id`),
  KEY `id_topik` (`topic_id`,`resource_id`,`course_id`,`teacher_id`,`student_id`),
  KEY `id_resource` (`resource_id`),
  KEY `id_kelas` (`course_id`,`teacher_id`,`student_id`),
  KEY `id_guru` (`teacher_id`),
  KEY `id_murid` (`student_id`),
  CONSTRAINT `access_notes_ibfk_4` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `access_notes_ibfk_6` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `access_notes_ibfk_8` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table propensi.access_notes: ~7 rows (approximately)
/*!40000 ALTER TABLE `access_notes` DISABLE KEYS */;
INSERT INTO `access_notes` (`topic_id`, `resource_id`, `course_id`, `teacher_id`, `student_id`) VALUES
	(1, 1, 3002, 1002, 2001),
	(1, 1, 3002, 1002, 2003),
	(1, 1, 3002, 1002, 2006),
	(1, 1, 3002, 1002, 2008),
	(1, 2, 3002, 1002, 2001),
	(19, 19, 3019, 1001, 2001),
	(21, 21, 3021, 1003, 2001);
/*!40000 ALTER TABLE `access_notes` ENABLE KEYS */;


-- Dumping structure for table propensi.admins
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(35) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `password` varchar(35) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `e-mail` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table propensi.admins: ~2 rows (approximately)
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` (`id`, `email`, `nama`, `password`) VALUES
	(0, 'admin1@ruangguru.com', 'Admin 1', 'e10adc3949ba59abbe56e057f20f883e'),
	(1, 'admin2@ruangguru.com', 'Admin 2', 'e10adc3949ba59abbe56e057f20f883e');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;


-- Dumping structure for table propensi.classes_tags
CREATE TABLE IF NOT EXISTS `classes_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) DEFAULT NULL,
  `tag_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `course_id_tag_id` (`course_id`,`tag_id`),
  KEY `FK__tags` (`tag_id`),
  CONSTRAINT `FK__courses` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK__tags` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table propensi.classes_tags: ~0 rows (approximately)
/*!40000 ALTER TABLE `classes_tags` DISABLE KEYS */;
/*!40000 ALTER TABLE `classes_tags` ENABLE KEYS */;


-- Dumping structure for table propensi.courses
CREATE TABLE IF NOT EXISTS `courses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `teacher_id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` int(11) NOT NULL,
  `tgl_mulai` date DEFAULT NULL,
  `status_kelas` tinyint(5) NOT NULL COMMENT '-1 reject, 0 new, 1 pending publish, 2 publish',
  `gambar` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_guru` (`teacher_id`),
  CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3022 DEFAULT CHARSET=latin1;

-- Dumping data for table propensi.courses: ~20 rows (approximately)
/*!40000 ALTER TABLE `courses` DISABLE KEYS */;
INSERT INTO `courses` (`id`, `teacher_id`, `nama`, `deskripsi`, `harga`, `tgl_mulai`, `status_kelas`, `gambar`) VALUES
	(3001, 1001, 'Fisika : Sekolah Dasar', 'Kelas ini ditujukan untuk tingkat Sekolah Menengah Pertama. ', 75000, '2015-05-22', 3, NULL),
	(3002, 1002, 'Pemrograman Java : For Beginner to Advanced', 'Kelas ini merupakan kelas untuk siapa saja yang ingin belajar bahasa pemrograman java, tidak terbatas umur dan pendidikan. ', 150000, '2015-05-23', 3, NULL),
	(3003, 1003, 'Olimpiade Matematika : Preparation', 'Kelas ini merupakan kelas yang diperuntukan bagi mahasiswa yang akan memersiapkan olimpiade Matematika baik nasional maupun internasional.', 750000, '2015-05-24', 1, NULL),
	(3004, 1001, 'Matematika : Sekolah Dasar', 'Kelas ini akan mengajarkan materi Matematika untuk tingkat Sekolah Dasar.', 50000, '2015-05-25', 2, NULL),
	(3005, 1002, 'Olimpiade Komputer : Preparation', 'Kelas ini ditujukan kepada mahasiswa yang akan memepersiapkan olimpiade Komputer baik tingkat nasional maupun internasional.', 750000, '2015-05-26', 2, NULL),
	(3006, 1003, 'Pemrograman C++ : For Beginner to Advanceds 2', '<p>[REV] Kelas ini merupakan kelas untuk siapa saja yang ingin belajar bahasa pemrograman C++, tidak terbatas umur dan pendidikan.</p>\r\n', 250000, '2015-05-27', 0, NULL),
	(3007, 1001, 'Kimia : Sekolah Menengah Atas', 'Kelas ini ditujukan untuk tingkat Sekolah Menengah Atas.', 100000, '2015-05-28', 1, NULL),
	(3008, 1002, 'Matematika Dasar : Universitas', 'Kelas ini ditujukan untuk tingkat universitas.', 125000, '2015-05-29', 1, NULL),
	(3009, 1003, 'Pemrograman Phyton : For Beginner to Advanced', 'Kelas ini merupakan kelas untuk siapa saja yang ingin belajar bahasa pemrograman phyton, tidak terbatas umur dan pendidikan. ', 150000, '2015-05-30', 1, NULL),
	(3010, 1001, 'Biologi : Sekolah Menengah Pertama', 'Kelas ini ditujukan untuk tingkat Sekolah Menengah Pertama.', 75000, '2015-05-31', 2, NULL),
	(3011, 1003, 'Matematika Diskret : Universitas', '<p>Kelas ini akan ditujukan untuk tingkat universias.</p>\r\n', 125000, '2015-06-01', 2, NULL),
	(3012, 1003, 'Pemrograman Android : For Beginner to Advanced', 'Kelas ini merupakan kelas untuk siapa saja yang ingin belajar bahasa pemrograman Android, tidak terbatas umur dan pendidikan. ', 150, '2015-06-02', 3, NULL),
	(3013, 1001, 'Statistika : Universitas', 'Kelas ini ditujukan untuk tingkat universitas.', 125000, '2015-06-03', 1, NULL),
	(3014, 1002, 'Fisika Dasar : Universitas', 'Kelas ini ditujukan untuk tingkat universitas', 125000, '2015-06-04', 1, NULL),
	(3016, 1001, 'Aljabar Linier : Universitas', 'Kelas ini ditujukan untuk tingkat universitas', 125000, '2015-06-06', 0, NULL),
	(3017, 1002, 'Aljabar Numerik : Universitas', 'Kelas ini ditujukan untuk tingkat universitas.', 125000, '2015-06-07', 0, NULL),
	(3018, 1003, 'Pemrograman PHP : For Beginner to Advanced', 'Kelas ini merupakan kelas untuk siapa saja yang ingin belajar bahasa pemrograman PHP, tidak terbatas umur dan pendidikan. ', 150000, '2015-06-08', 0, NULL),
	(3019, 1001, 'Microsoft Office : For Beginner', 'Kelas ini merupakan kelas yang ditujukan untuk masyarakat umum yang ingin mempelajari microsoft office, tidak terbatas umur dan pendidikan dan kelas ini tidak dipungut biaya.', 0, '2015-06-09', 2, '1001_microsftOffice.jpg'),
	(3020, 1002, 'Mengetik 10 Jari : For Beginner', 'Kelas ini merupakan kelas yang ditujukan untuk masyarakat umum yang ingin mempelajari cara mengetik 10 jari, tidak terbatas umur dan pendidikan dan kelas ini tidak dipungut biaya.', 0, '2015-06-10', 2, '3020_mengetik10jari.png'),
	(3021, 1003, 'Windows 8 : For Beginner', 'Kelas ini merupakan kelas yang ditujukan untuk masyarakat umum yang ingin mempelajari windows 8, tidak terbatas umur dan pendidikan dan kelas ini tidak dipungut biaya.', 0, '2015-06-11', 0, NULL);
/*!40000 ALTER TABLE `courses` ENABLE KEYS */;


-- Dumping structure for table propensi.courses_students
CREATE TABLE IF NOT EXISTS `courses_students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `rating` tinyint(4) DEFAULT NULL,
  `isActive` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `course_id_student_id` (`course_id`,`student_id`),
  KEY `teacher_id` (`teacher_id`),
  KEY `student_id` (`student_id`),
  CONSTRAINT `courses_students_ibfk_2` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `courses_students_ibfk_3` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `courses_students_ibfk_4` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- Dumping data for table propensi.courses_students: ~13 rows (approximately)
/*!40000 ALTER TABLE `courses_students` DISABLE KEYS */;
INSERT INTO `courses_students` (`id`, `course_id`, `teacher_id`, `student_id`, `rating`, `isActive`) VALUES
	(1, 3004, 1001, 2001, 4, 1),
	(2, 3005, 1002, 2002, 3, 0),
	(3, 3006, 1003, 2003, 2, 1),
	(4, 3019, 1001, 2004, 3, 1),
	(7, 3019, 1001, 2001, 3, 1),
	(8, 3020, 1002, 2001, 3, 0),
	(9, 3021, 1003, 2001, 3, 0),
	(10, 3006, 1003, 2001, NULL, 1),
	(11, 3020, 1002, 2001, NULL, 1),
	(12, 3005, 1002, 2001, NULL, 1),
	(13, 3021, 1003, 2004, 4, 1),
	(14, 3021, 1003, 2001, 4, 1),
	(15, 3005, 1002, 2001, NULL, 1);
/*!40000 ALTER TABLE `courses_students` ENABLE KEYS */;


-- Dumping structure for table propensi.feedbacks
CREATE TABLE IF NOT EXISTS `feedbacks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `teacher_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `pesan` text NOT NULL,
  `waktu_kirim` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `role` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id_guru` (`teacher_id`,`course_id`),
  KEY `id_kelas` (`course_id`),
  CONSTRAINT `feedbacks_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `feedbacks_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

-- Dumping data for table propensi.feedbacks: ~42 rows (approximately)
/*!40000 ALTER TABLE `feedbacks` DISABLE KEYS */;
INSERT INTO `feedbacks` (`id`, `teacher_id`, `course_id`, `pesan`, `waktu_kirim`, `role`) VALUES
	(1, 1001, 3001, 'Great Job. Bagus. Lanjutkan. Semoga dapat menjadi kelas favorite', '2015-05-15 06:27:29', 0),
	(2, 1001, 3001, 'Thank you. Semoga kelas ini dapat bermanfaat', '2015-05-15 06:27:29', 1),
	(3, 1002, 3002, 'Great Job. Bagus. Lanjutkan. Semoga dapat menjadi kelas favorite', '2015-05-15 06:27:29', 0),
	(4, 1002, 3002, 'Thank you. Semoga kelas ini dapat bermanfaat', '2015-05-15 06:27:29', 1),
	(5, 1003, 3003, 'Great Job. Bagus. Lanjutkan. Semoga dapat menjadi kelas favorite', '2015-05-15 06:27:30', 0),
	(6, 1003, 3003, 'Thank you. Semoga kelas ini dapat bermanfaat', '2015-05-15 06:27:30', 1),
	(7, 1001, 3004, 'Great Job. Bagus. Lanjutkan. Semoga dapat menjadi kelas favorite', '2015-05-15 06:27:30', 0),
	(8, 1001, 3004, 'Thank you. Semoga kelas ini dapat bermanfaat', '2015-05-15 06:27:30', 1),
	(9, 1002, 3005, 'Great Job. Bagus. Lanjutkan. Semoga dapat menjadi kelas favorite', '2015-05-15 06:27:30', 0),
	(10, 1002, 3005, 'Thank you. Semoga kelas ini dapat bermanfaat', '2015-05-15 06:27:30', 1),
	(11, 1003, 3006, 'Great Job. Bagus. Lanjutkan. Semoga dapat menjadi kelas favorite', '2015-05-15 06:27:30', 0),
	(12, 1003, 3006, 'Thank you. Semoga kelas ini dapat bermanfaat', '2015-05-15 06:27:30', 1),
	(13, 1001, 3007, 'Great Job. Bagus. Lanjutkan. Semoga dapat menjadi kelas favorite', '2015-05-15 06:27:30', 0),
	(14, 1001, 3007, 'Thank you. Semoga kelas ini dapat bermanfaat', '2015-05-15 06:27:30', 1),
	(15, 1002, 3008, 'Great Job. Bagus. Lanjutkan. Semoga dapat menjadi kelas favorite', '2015-05-15 06:27:30', 0),
	(16, 1002, 3008, 'Thank you. Semoga kelas ini dapat bermanfaat', '2015-05-15 06:27:30', 1),
	(17, 1003, 3009, 'Great Job. Bagus. Lanjutkan. Semoga dapat menjadi kelas favorite', '2015-05-15 06:27:30', 0),
	(18, 1003, 3009, 'Thank you. Semoga kelas ini dapat bermanfaat', '2015-05-15 06:27:30', 1),
	(19, 1001, 3010, 'Great Job. Bagus. Lanjutkan. Semoga dapat menjadi kelas favorite', '2015-05-15 06:27:30', 0),
	(20, 1001, 3010, 'Thank you. Semoga kelas ini dapat bermanfaat', '2015-05-15 06:27:30', 1),
	(21, 1002, 3011, 'Great Job. Bagus. Lanjutkan. Semoga dapat menjadi kelas favorite', '2015-05-15 06:27:31', 0),
	(22, 1002, 3011, 'Thank you. Semoga kelas ini dapat bermanfaat', '2015-05-15 06:27:31', 1),
	(23, 1003, 3012, 'Great Job. Bagus. Lanjutkan. Semoga dapat menjadi kelas favorite', '2015-05-15 06:27:31', 0),
	(24, 1003, 3012, 'Thank you. Semoga kelas ini dapat bermanfaat', '2015-05-15 06:27:31', 1),
	(25, 1001, 3013, 'Great Job. Bagus. Lanjutkan. Semoga dapat menjadi kelas favorite', '2015-05-15 06:27:31', 0),
	(26, 1001, 3013, 'Thank you. Semoga kelas ini dapat bermanfaat', '2015-05-15 19:02:59', 1),
	(27, 1002, 3014, 'Great Job. Bagus. Lanjutkan. Semoga dapat menjadi kelas favorite', '2015-05-15 19:02:59', 0),
	(28, 1002, 3014, 'Thank you. Semoga kelas ini dapat bermanfaat', '2015-05-15 19:02:59', 1),
	(31, 1001, 3016, 'Great Job. Bagus. Lanjutkan. Semoga dapat menjadi kelas favorite', '2015-05-15 19:02:59', 0),
	(32, 1001, 3016, 'Thank you. Semoga kelas ini dapat bermanfaat', '2015-05-15 19:02:59', 1),
	(33, 1002, 3017, 'Great Job. Bagus. Lanjutkan. Semoga dapat menjadi kelas favorite', '2015-05-15 19:02:59', 0),
	(34, 1002, 3017, 'Thank you. Semoga kelas ini dapat bermanfaat', '2015-05-15 19:02:59', 0),
	(35, 1003, 3018, 'Great Job', '2015-05-18 20:19:41', 0),
	(36, 1003, 3018, 'Thank You', '2015-05-19 20:19:41', 1),
	(37, 1001, 3019, 'Great Job', '2015-05-19 20:19:41', 0),
	(38, 1001, 3019, 'Thank You', '2015-05-20 20:19:41', 1),
	(39, 1002, 3020, 'Great Job', '2015-05-20 20:19:41', 0),
	(40, 1002, 3020, 'Thank You', '2015-05-21 20:17:39', 1),
	(41, 1003, 3021, 'Great Job', '2015-05-21 20:19:41', 0),
	(42, 1003, 3021, 'Thank You', '2015-05-22 20:19:41', 1),
	(43, 1003, 3003, 'halo admin', '2015-05-26 18:55:33', 1),
	(44, 1003, 3003, 'halo juga', '2015-05-26 18:56:55', 0);
/*!40000 ALTER TABLE `feedbacks` ENABLE KEYS */;


-- Dumping structure for table propensi.resources
CREATE TABLE IF NOT EXISTS `resources` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_urut_materi` int(11) NOT NULL DEFAULT '1',
  `topic_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `url` varchar(200) NOT NULL,
  `notes` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `url` (`url`),
  KEY `no_urut` (`topic_id`),
  KEY `id_kelas` (`course_id`),
  KEY `resources_ibfk_3` (`teacher_id`),
  CONSTRAINT `resources_ibfk_4` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `resources_ibfk_5` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `resources_ibfk_6` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

-- Dumping data for table propensi.resources: ~19 rows (approximately)
/*!40000 ALTER TABLE `resources` DISABLE KEYS */;
INSERT INTO `resources` (`id`, `no_urut_materi`, `topic_id`, `course_id`, `teacher_id`, `judul`, `url`, `notes`) VALUES
	(1, 1, 1, 3001, 1001, 'Lensa 1', 'materi/video1.mp4', 'Materi ini membahas mengenai Lensa secara dasar'),
	(2, 1, 2, 3002, 1002, 'Encapsulation 1', 'materi/video2.mp4', 'Materi ini membahas mengenai Encapculation'),
	(3, 1, 3, 3003, 1003, 'Interfal Tak Wajar 1', 'materi/video3.mp4', 'Materi ini membahas mengenai Interfal Tak Wajar'),
	(4, 1, 4, 3004, 1001, 'Penjumlahan 1', 'materi/video4.mp4', 'Materi ini membahas mengenai Penjumlahan dasar'),
	(5, 1, 5, 3005, 1002, 'Competitive Programming 1', 'materi/video5.mp4', 'Materi ini membahas mengenai competitive programming olimpiade'),
	(7, 1, 7, 3007, 1001, 'Tabel Periodik 1', 'materi/video7.mp4', 'Materi ini membahas mengenai Tabel Periodik '),
	(8, 1, 8, 3008, 1002, 'Integral 1', 'materi/video8.mp4', 'Materi ini membahas mengenai integral dasar'),
	(9, 1, 9, 3009, 1003, 'Inheritance 1', 'materi/video9.mp4', 'Materi ini membahas mengenai inheritance'),
	(10, 1, 10, 3010, 1001, 'Vertebrata 1', 'materi/video10.mp4', 'Materi ini membahas mengenai vertebrata'),
	(11, 1, 11, 3011, 1002, 'Advanced Counting 1', 'materi/video11.mp4', 'Materi ini membahas mengenai advanced accounting '),
	(12, 1, 12, 3012, 1003, 'Emulator 1', 'materi/video12.mp4', 'Materi ini membahas mengenai emulator android'),
	(13, 1, 13, 3013, 1001, 'Teori Bayes 1', 'materi/video13.mp4', 'Materi ini membahas mengenai teori bayes'),
	(14, 1, 14, 3014, 1002, 'Gerak 1', 'materi/video14.mp4', 'Materi ini membahas mengenai gerak'),
	(16, 1, 16, 3016, 1001, 'Trigonometri 1', 'materi/video16.mp4', 'Materi ini membahas mengenai Trigonometri dasar'),
	(17, 1, 17, 3017, 1002, 'Interpolasi 1', 'materi/video17.mp4', 'Materi ini membahas mengenai interpolasi '),
	(19, 1, 19, 3019, 1001, 'Microsoft word 1', 'materi/video19.mp4', 'Materi ini membahas mengenai microsoft word dasar'),
	(20, 1, 20, 3020, 1002, 'Teknik Fingering 1', 'materi/video20.mp4', 'Materi ini membahas mengenai teknik fingering dasar'),
	(21, 1, 21, 3021, 1003, 'Home windows 8', 'materi/materi.pdf', 'Materi ini membahas mengenai pengoperasian windows 8 dasar'),
	(24, 1, 25, 3006, 1003, 'materi 1', 'materi/materi_3.pdf', 'notes');
/*!40000 ALTER TABLE `resources` ENABLE KEYS */;


-- Dumping structure for table propensi.reviews
CREATE TABLE IF NOT EXISTS `reviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `courses_student_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `tanggapan` text,
  `komentar` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_reviews_courses_students` (`courses_student_id`),
  CONSTRAINT `FK_reviews_courses_students` FOREIGN KEY (`courses_student_id`) REFERENCES `courses_students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- Dumping data for table propensi.reviews: ~7 rows (approximately)
/*!40000 ALTER TABLE `reviews` DISABLE KEYS */;
INSERT INTO `reviews` (`id`, `courses_student_id`, `status`, `tanggapan`, `komentar`) VALUES
	(1, 1, 1, NULL, 'keren banget'),
	(2, 2, 0, NULL, 'seru looh'),
	(6, 3, 1, '', 'bermanfaat banget'),
	(7, 4, 0, NULL, 'asyik'),
	(8, 8, 1, NULL, 'keren'),
	(9, 13, 1, 'thanks', 'video yang diberikan kurang menarik'),
	(10, 14, 1, NULL, 'videonya keren');
/*!40000 ALTER TABLE `reviews` ENABLE KEYS */;


-- Dumping structure for table propensi.students
CREATE TABLE IF NOT EXISTS `students` (
  `id` int(11) NOT NULL,
  `email` varchar(35) NOT NULL,
  `password` varchar(35) NOT NULL,
  `nama` varchar(35) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `e-mail` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table propensi.students: ~4 rows (approximately)
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` (`id`, `email`, `password`, `nama`) VALUES
	(2001, 'saqib.abud@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Saqib Abud'),
	(2002, 'vaskodagama54@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Vasko Dagama'),
	(2003, 'pravitasari.m@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Mira Pravitasari Yunus'),
	(2004, 'retnowatiwahyu@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Wahyu Retnowati');
/*!40000 ALTER TABLE `students` ENABLE KEYS */;


-- Dumping structure for table propensi.tags
CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subjek` varchar(35) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `subjek` (`subjek`)
) ENGINE=InnoDB AUTO_INCREMENT=124 DEFAULT CHARSET=latin1;

-- Dumping data for table propensi.tags: ~23 rows (approximately)
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
INSERT INTO `tags` (`id`, `subjek`) VALUES
	(113, ' survival'),
	(109, ' waaa'),
	(110, '123'),
	(114, 'academic'),
	(103, 'Advanced'),
	(108, 'aww'),
	(115, 'bahasa'),
	(101, 'Beginner'),
	(104, 'college'),
	(116, 'english'),
	(105, 'guide'),
	(117, 'ielts'),
	(118, 'inggris'),
	(102, 'Intermediate'),
	(123, 'kelas'),
	(119, 'liburan'),
	(120, 'ramadha'),
	(106, 'student'),
	(111, 'survival'),
	(107, 'survive'),
	(122, 'tag'),
	(112, 'tags'),
	(121, 'test');
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;


-- Dumping structure for table propensi.teachers
CREATE TABLE IF NOT EXISTS `teachers` (
  `id` int(11) NOT NULL DEFAULT '0',
  `email` varchar(35) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `bio` text NOT NULL,
  `pendidikan` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `e-mail` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table propensi.teachers: ~3 rows (approximately)
/*!40000 ALTER TABLE `teachers` DISABLE KEYS */;
INSERT INTO `teachers` (`id`, `email`, `password`, `nama`, `bio`, `pendidikan`) VALUES
	(1001, 'andri@itb.ac.id', 'e10adc3949ba59abbe56e057f20f883e', 'Andri R', 'Hello. My name is Andri Rahmadhani. I graduated from Department of Physics, Bandung Institute of Technolgy. I attended to ITB in 2009. I work as software engineer at a multinational company in Jakarta. I am very interested to learn science, technology, and solving complex problems as well. Therefore, I want to share what I have learnt especially to fulfill my spare time.', 'S1-Bandung Institute of Technology-Physic'),
	(1002, 'silvester@ui.ac.id', 'e10adc3949ba59abbe56e057f20f883e', 'Silvester D', 'Nama saya adalah Silvester. Selama SMA saya pernah mengikuti lomba olimpiade dan dikirim ke Jakarta untuk menjadi finalis. Selepas dari SMA, saya melanjutkan kuliah saya (S1) di Universitas Atma Jaya Yogyakarta. Disana saya menjadi asisten dosen dalam seluruh bidang tridarma perguruan tinggi. Setelah dari Universitas Atma Jaya Yogyakarta, saya melanjutkan S2 saya di Universitas Indonesia di Magister Teknologi Informasi.', 'S2 - Universitas Indonesia - Magister Teknologi Informasi'),
	(1003, 'adrian@ui.ac.id', 'e10adc3949ba59abbe56e057f20f883e', 'Adrian S', 'Saya adalah orang yang suka mengajar dan bermain akan tetapi saya dapat membagi waktu belajar dan bermain. Saya mengerti bahwa setiap orang akan kehilangan fokusnya dalam belajar apabila sudah terlalu lama sehingga saya memiliki metode sendiri untuk menanggulanginya. Cara mengajar saya juga bisa cepat atau lambat mengikuti frekuensi pemahaman murid.', 'S1 - Universitas Indonesia - Ilmu Komputer');
/*!40000 ALTER TABLE `teachers` ENABLE KEYS */;


-- Dumping structure for table propensi.topics
CREATE TABLE IF NOT EXISTS `topics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `deskripsi` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_guru` (`teacher_id`),
  KEY `id_kelas` (`course_id`),
  CONSTRAINT `topics_ibfk_2` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `topics_ibfk_3` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

-- Dumping data for table propensi.topics: ~21 rows (approximately)
/*!40000 ALTER TABLE `topics` DISABLE KEYS */;
INSERT INTO `topics` (`id`, `course_id`, `teacher_id`, `judul`, `deskripsi`) VALUES
	(1, 3001, 1001, 'Lensa', 'dskripsi topik'),
	(2, 3002, 1002, 'Encapsulation', 'dskripsi topik'),
	(3, 3003, 1003, 'Interfal Tak Wajar', 'dskripsi topik'),
	(4, 3004, 1001, 'Penjumlahan', 'dskripsi topik'),
	(5, 3005, 1002, 'Competitive Programming', 'dskripsi topik'),
	(7, 3007, 1001, 'Tabel Periodik', 'dskripsi topik'),
	(8, 3008, 1002, 'Integral', 'dskripsi topik'),
	(9, 3009, 1003, 'Inheritance', 'dskripsi topik'),
	(10, 3010, 1001, 'Vertebrata', 'dskripsi topik'),
	(11, 3011, 1002, 'Advanced Counting', 'dskripsi topik'),
	(12, 3012, 1003, 'Emulator', 'dskripsi topik'),
	(13, 3013, 1001, 'Teori Bayes', 'dskripsi topik'),
	(14, 3014, 1002, 'Gerak', 'dskripsi topik'),
	(16, 3016, 1001, 'Trigonometri', 'dskripsi topik'),
	(17, 3017, 1002, 'Interpolasi', 'dskripsi topik'),
	(19, 3019, 1001, 'Microsoft Word', 'dskripsi topik'),
	(20, 3020, 1002, 'Teknik fingering', 'dskripsi topik'),
	(21, 3021, 1003, 'Start', 'dskripsi topik'),
	(22, 3018, 1003, 'topik 1', 'dskripsi topik'),
	(23, 3018, 1003, 'topik 2', 'dskripsi topik'),
	(25, 3006, 1003, 'tiopik 1', 'dskripsi topik');
/*!40000 ALTER TABLE `topics` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
