/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 80027
 Source Host           : localhost:3306
 Source Schema         : book

 Target Server Type    : MySQL
 Target Server Version : 80027
 File Encoding         : 65001

 Date: 26/05/2022 18:01:53
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `password` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES (1, 'admin', 'admin');

-- ----------------------------
-- Table structure for lend
-- ----------------------------
DROP TABLE IF EXISTS `lend`;
CREATE TABLE `lend`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `book_id` int NOT NULL,
  `book_title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `lend_time` date NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`id`, `user_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 145 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of lend
-- ----------------------------

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `password` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `email` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `tel` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `address` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (20, 'user1', '24c9e15e52afc47c225b757e7bee1f9d', 'mike@163.com', '12233334444', '密码 user1');

-- ----------------------------
-- Table structure for yx_books
-- ----------------------------
DROP TABLE IF EXISTS `yx_books`;
CREATE TABLE `yx_books`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `price` decimal(8, 2) NOT NULL,
  `uploadtime` datetime NOT NULL,
  `type` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `total` int NULL DEFAULT NULL,
  `leave_number` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 42 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of yx_books
-- ----------------------------
INSERT INTO `yx_books` VALUES (1, 'PHP100', 50.00, '2021-12-24 11:07:27', 'PHP编程', 5, 2);
INSERT INTO `yx_books` VALUES (2, 'asp200', 50.36, '2021-12-24 11:07:27', 'ASP编程', 1, 0);
INSERT INTO `yx_books` VALUES (3, 'ASP.net中文教程', 32.45, '2021-12-24 11:07:27', '网络营销', 4, 3);
INSERT INTO `yx_books` VALUES (26, '数据库系统', 23.46, '2021-12-24 11:07:27', '网页美工', 5, 4);
INSERT INTO `yx_books` VALUES (36, 'DB', 23.17, '2021-12-24 11:07:27', '软件开发', 8, 8);
INSERT INTO `yx_books` VALUES (37, 'asp', 22.00, '2021-12-24 11:07:27', 'ASP编程', 7, 0);
INSERT INTO `yx_books` VALUES (39, 'asp新手学习', 88.00, '2021-12-24 11:07:27', 'asp编程', 10, 7);
INSERT INTO `yx_books` VALUES (40, 'php新手学习', 33.00, '2021-12-24 11:07:27', 'php编程', 8, 0);
INSERT INTO `yx_books` VALUES (41, '经典php编程', 66.00, '2021-12-24 11:07:27', 'php编程', 22, 7);

SET FOREIGN_KEY_CHECKS = 1;
