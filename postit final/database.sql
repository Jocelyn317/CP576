/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50714
 Source Host           : localhost:3306
 Source Schema         : tcmanager

 Target Server Type    : MySQL
 Target Server Version : 50714
 File Encoding         : 65001

 Date: 03/04/2019 22:37:16
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin`  (
  `AdminID` int(11) NOT NULL AUTO_INCREMENT,
  `AdminName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `SchoolNews` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `UserName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`AdminID`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 103 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES (101, 'Admin Ad', 'News from Admin Ad', '101', '$2y$10$UtGx2I1B0n/1pwwu/CnXmOPLwEdHkbIZEcCNS.V2L6eOGel63MlGO');
INSERT INTO `admin` VALUES (102, 'Admin Min', 'News from Admin Min2', '102', '$2y$10$UtGx2I1B0n/1pwwu/CnXmOPLwEdHkbIZEcCNS.V2L6eOGel63MlGO');

-- ----------------------------
-- Table structure for assignment
-- ----------------------------
DROP TABLE IF EXISTS `assignment`;
CREATE TABLE `assignment`  (
  `AssignmentID` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `File` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `CourseID` int(11) NULL DEFAULT NULL,
  `DueDate` date NULL DEFAULT NULL,
  PRIMARY KEY (`AssignmentID`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of assignment
-- ----------------------------
INSERT INTO `assignment` VALUES (1, 'test', 'upload/20190402153440864.jpg', 5, '2019-04-02');
INSERT INTO `assignment` VALUES (12, 'Assignment Title', NULL, 5, '2019-04-30');

-- ----------------------------
-- Table structure for course
-- ----------------------------
DROP TABLE IF EXISTS `course`;
CREATE TABLE `course`  (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Grade` int(11) NOT NULL,
  `CourseID` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `CourseName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `TeacherID` int(11) NOT NULL,
  `CourseNews` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 16 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of course
-- ----------------------------
INSERT INTO `course` VALUES (1, 9, 'MPM1D', 'Grade 9 math', 1, 'News for Grade 9 Math');
INSERT INTO `course` VALUES (2, 9, 'ENG1D', 'Grade 9 english', 2, 'News for Grade 9 english');
INSERT INTO `course` VALUES (3, 9, 'ACT1O', 'Grade 9 art', 3, 'News for Grade 9 art');
INSERT INTO `course` VALUES (4, 9, 'SNC1D', 'Grade 9 science', 4, 'News for Grade 9 science');
INSERT INTO `course` VALUES (5, 10, 'MPM2D', 'Grade 10 math', 1, 'Grade 10 math');
INSERT INTO `course` VALUES (6, 10, 'ENG2D', 'Grade 10 english', 2, 'News for Grade 10 english');
INSERT INTO `course` VALUES (7, 10, 'ACT2O', 'Grade 10 art', 3, 'News for Grade 10 art');
INSERT INTO `course` VALUES (8, 10, 'SNC2D', 'Grade 10 science', 4, 'News for Grade 10 science');
INSERT INTO `course` VALUES (9, 11, 'MCR3U', 'Grade 11 math', 1, 'News for Grade 11 math');
INSERT INTO `course` VALUES (10, 11, 'ENG3U', 'Grade 11 english', 2, 'News for Grade 11 english');
INSERT INTO `course` VALUES (11, 11, 'ACT3M', 'Grade 11 art', 3, 'News for Grade 11 art');
INSERT INTO `course` VALUES (12, 12, 'MHF4U', 'Grade 12 math', 1, 'News for Grade 12 math');
INSERT INTO `course` VALUES (13, 12, 'ENG4U', 'Grade 12 english', 2, 'News for Grade 12 english');
INSERT INTO `course` VALUES (14, 12, 'ACT4M', 'Grade 12 art', 3, 'News for Grade 12 art');
INSERT INTO `course` VALUES (15, 12, 'SNC4M', 'Grade 12 science', 4, 'News for Grade 12 science');

-- ----------------------------
-- Table structure for news
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news`  (
  `NewsID` int(11) NOT NULL AUTO_INCREMENT,
  `NewsContent` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `NewsType` int(11) NOT NULL,
  `ModTime` datetime(3) NULL DEFAULT NULL,
  `ModUser` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`NewsID`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of news
-- ----------------------------
INSERT INTO `news` VALUES (1, 'School NewsSchool News', 1, '2019-04-02 14:07:40.000', 101);

-- ----------------------------
-- Table structure for notes
-- ----------------------------
DROP TABLE IF EXISTS `notes`;
CREATE TABLE `notes`  (
  `NotesID` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `File` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `CourseID` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`NotesID`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of notes
-- ----------------------------
INSERT INTO `notes` VALUES (2, 'Chapter 2', 'upload/20190402144627704.txt', 5);
INSERT INTO `notes` VALUES (10, 'Notes1', 'upload/20190402144534695.xls', 1);

-- ----------------------------
-- Table structure for student
-- ----------------------------
DROP TABLE IF EXISTS `student`;
CREATE TABLE `student`  (
  `StudentID` int(11) NOT NULL AUTO_INCREMENT,
  `StudentName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `CourseTaking` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `Notes` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `UserName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`StudentID`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 90002 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of student
-- ----------------------------
INSERT INTO `student` VALUES (90001, 'Grade 9 Kid', '', 'No notes', '90001', '$2y$10$UtGx2I1B0n/1pwwu/CnXmOPLwEdHkbIZEcCNS.V2L6eOGel63MlGO');
INSERT INTO `student` VALUES (10001, 'Grade 10 Kid', '', 'No notes ', '10001', '$2y$10$UtGx2I1B0n/1pwwu/CnXmOPLwEdHkbIZEcCNS.V2L6eOGel63MlGO');
INSERT INTO `student` VALUES (11001, 'Grade 11 Kid', '', 'No notes ', '11001', '$2y$10$UtGx2I1B0n/1pwwu/CnXmOPLwEdHkbIZEcCNS.V2L6eOGel63MlGO');
INSERT INTO `student` VALUES (12001, 'Grade 12 kid', '', 'No notes', '12001', '$2y$10$UtGx2I1B0n/1pwwu/CnXmOPLwEdHkbIZEcCNS.V2L6eOGel63MlGO');

-- ----------------------------
-- Table structure for student_course
-- ----------------------------
DROP TABLE IF EXISTS `student_course`;
CREATE TABLE `student_course`  (
  `StudentCourseID` int(11) NOT NULL AUTO_INCREMENT,
  `StudentID` int(11) NULL DEFAULT NULL,
  `CourseID` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`StudentCourseID`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 32 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Fixed;

-- ----------------------------
-- Records of student_course
-- ----------------------------
INSERT INTO `student_course` VALUES (31, 12001, 15);
INSERT INTO `student_course` VALUES (30, 12001, 14);
INSERT INTO `student_course` VALUES (29, 12001, 13);
INSERT INTO `student_course` VALUES (28, 12001, 12);
INSERT INTO `student_course` VALUES (27, 11001, 11);
INSERT INTO `student_course` VALUES (26, 11001, 10);
INSERT INTO `student_course` VALUES (25, 11001, 9);
INSERT INTO `student_course` VALUES (24, 10001, 8);
INSERT INTO `student_course` VALUES (23, 10001, 7);
INSERT INTO `student_course` VALUES (22, 10001, 6);
INSERT INTO `student_course` VALUES (21, 10001, 5);
INSERT INTO `student_course` VALUES (20, 90001, 4);
INSERT INTO `student_course` VALUES (19, 90001, 3);
INSERT INTO `student_course` VALUES (18, 90001, 2);
INSERT INTO `student_course` VALUES (17, 90001, 1);

-- ----------------------------
-- Table structure for teacher
-- ----------------------------
DROP TABLE IF EXISTS `teacher`;
CREATE TABLE `teacher`  (
  `TeacherID` int(11) NOT NULL AUTO_INCREMENT,
  `TeacherName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `CourseTeaching` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `Intro` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `UserName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`TeacherID`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of teacher
-- ----------------------------
INSERT INTO `teacher` VALUES (1, 'Dr Math', '', 'Dr Math had been teaching in our school for 5 years. He graduated from University of ABC for his bachelor’s degree and finish his master in University of BCD. ', 'math', '$2y$10$UtGx2I1B0n/1pwwu/CnXmOPLwEdHkbIZEcCNS.V2L6eOGel63MlGO');
INSERT INTO `teacher` VALUES (2, 'Dr English', '', 'Dr English had been teaching in our school for 10 years. He graduated from University of FDSSD for his bachelor’s degree and finish his master in University of RGR.', 'english', '$2y$10$UtGx2I1B0n/1pwwu/CnXmOPLwEdHkbIZEcCNS.V2L6eOGel63MlGO');
INSERT INTO `teacher` VALUES (3, 'Dr Art', '', 'Dr Art had been teaching in our school for 15 years. He graduated from University of GSDSVF for his bachelor’s degree and finish his master and PHD in University of TNTY.', 'art', '$2y$10$UtGx2I1B0n/1pwwu/CnXmOPLwEdHkbIZEcCNS.V2L6eOGel63MlGO');
INSERT INTO `teacher` VALUES (4, 'Dr Science', '', 'Dr Science had been teaching in our school for 20 years. He graduated from University of ERT for his bachelor’s degree and finish his master in University of YUI.', 'science', '$2y$10$UtGx2I1B0n/1pwwu/CnXmOPLwEdHkbIZEcCNS.V2L6eOGel63MlGO');

-- ----------------------------
-- Table structure for teacher_course
-- ----------------------------
DROP TABLE IF EXISTS `teacher_course`;
CREATE TABLE `teacher_course`  (
  `TeacherCourseID` int(11) NOT NULL AUTO_INCREMENT,
  `TeacherID` int(11) NULL DEFAULT NULL,
  `CourseID` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`TeacherCourseID`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 16 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Fixed;

-- ----------------------------
-- Records of teacher_course
-- ----------------------------
INSERT INTO `teacher_course` VALUES (1, 1, 1);
INSERT INTO `teacher_course` VALUES (2, 1, 5);
INSERT INTO `teacher_course` VALUES (3, 1, 9);
INSERT INTO `teacher_course` VALUES (4, 1, 12);
INSERT INTO `teacher_course` VALUES (5, 2, 2);
INSERT INTO `teacher_course` VALUES (6, 2, 6);
INSERT INTO `teacher_course` VALUES (7, 2, 10);
INSERT INTO `teacher_course` VALUES (8, 2, 13);
INSERT INTO `teacher_course` VALUES (9, 3, 3);
INSERT INTO `teacher_course` VALUES (10, 3, 7);
INSERT INTO `teacher_course` VALUES (11, 3, 11);
INSERT INTO `teacher_course` VALUES (12, 3, 14);
INSERT INTO `teacher_course` VALUES (13, 4, 4);
INSERT INTO `teacher_course` VALUES (14, 4, 8);
INSERT INTO `teacher_course` VALUES (15, 4, 15);

SET FOREIGN_KEY_CHECKS = 1;
