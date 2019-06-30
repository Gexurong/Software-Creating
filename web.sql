/*
 Navicat Premium Data Transfer

 Source Server         : docker
 Source Server Type    : MySQL
 Source Server Version : 50726
 Source Host           : localhost:3306
 Source Schema         : web

 Target Server Type    : MySQL
 Target Server Version : 50726
 File Encoding         : 65001

 Date: 29/06/2019 18:29:17
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for chapter
-- ----------------------------
DROP TABLE IF EXISTS `chapter`;
CREATE TABLE `chapter`  (
  `comicid` int(11) NOT NULL,
  `chapterid` int(11) NOT NULL,
  `page` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`comicid`, `chapterid`) USING BTREE,
  CONSTRAINT `comicid` FOREIGN KEY (`comicid`) REFERENCES `comic` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of chapter
-- ----------------------------
INSERT INTO `chapter` VALUES (1, 1, 4);
INSERT INTO `chapter` VALUES (1, 2, 3);
INSERT INTO `chapter` VALUES (1, 3, 4);
INSERT INTO `chapter` VALUES (2, 1, 5);
INSERT INTO `chapter` VALUES (2, 2, 3);
INSERT INTO `chapter` VALUES (2, 3, 3);
INSERT INTO `chapter` VALUES (3, 1, 3);
INSERT INTO `chapter` VALUES (3, 2, 3);
INSERT INTO `chapter` VALUES (3, 3, 3);
INSERT INTO `chapter` VALUES (4, 1, 3);
INSERT INTO `chapter` VALUES (4, 2, 3);
INSERT INTO `chapter` VALUES (4, 3, 3);

-- ----------------------------
-- Table structure for comic
-- ----------------------------
DROP TABLE IF EXISTS `comic`;
CREATE TABLE `comic`  (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `instruction` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `chapter` int(11) NULL DEFAULT NULL,
  `author` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `time` datetime(0) NULL DEFAULT NULL,
  `like` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of comic
-- ----------------------------
INSERT INTO `comic` VALUES (1, '海贼王', '拥有财富、名声、权力，这世界上的一切的男人 “海贼王”哥尔·D·罗杰，在被行刑受死之前说了一句话，让全世界的人都涌向了大海。“想要我的宝藏吗？如果想要的话，那就到海上去找吧，我全部都放在那里。”，世界开始迎接“大海贼时代”的来临。', 3, '尾田荣一郎', '2019-06-27 19:05:04', 46);
INSERT INTO `comic` VALUES (2, '哆啦A梦', '漫画叙述了一只来自22世纪的猫型机器人——哆啦A梦，受主人野比世修的托付，回到20世纪，借助从四维口袋里拿出来的各种未来道具，来帮助世修的高祖父——小学生野比大雄化解身边的种种困难问题，以及生活中和身边的小伙伴们发生的轻松幽默搞笑感人的故事。', 3, '藤子·F·不二雄', '2019-06-27 19:05:50', 22);
INSERT INTO `comic` VALUES (3, '狂赌之渊', '名门·私立百花王学园，在这所学园里存在着阶级制度。以学生会为顶点的这一所学校，受到“赌博”支配。赢的话就是天国，输的话就是地狱。赌博强者受人羡慕、弱者被虐的疯狂学园。而这样的学园里，转来了一位少女，她的名字是蛇喰梦子。', 3, '河本ほむら', '2019-06-29 13:40:54', 19);
INSERT INTO `comic` VALUES (4, '文豪野犬', '中岛敦被赶出孤儿院，即将饿死在横滨时，遇到了投河自尽的太宰治。敦声称自己一直被猛虎追赶，太宰便借机让其协助武装侦探社找寻“食人虎”。最终，“食人虎”的真面目令人咋舌，而且此事件的背后竟然隐藏着巨大的阴谋……文豪们的异能力之战，即将打响！', 3, '朝雾カフカ', '2019-06-29 13:44:40', 6);

-- ----------------------------
-- Table structure for comment
-- ----------------------------
DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comicid` int(11) NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `content` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `time` datetime(0) NULL DEFAULT NULL,
  `avator` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `commentcomicid`(`comicid`) USING BTREE,
  CONSTRAINT `commentcomicid` FOREIGN KEY (`comicid`) REFERENCES `comic` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 24 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of comment
-- ----------------------------
INSERT INTO `comment` VALUES (1, 1, '**\r\n**', '有没有这个装扮。', '2019-06-28 16:59:01', 1);
INSERT INTO `comment` VALUES (2, 1, '永远永远', '时隔一年，现在看着慢慢的都是回忆啊', '2019-06-26 02:07:22', 2);
INSERT INTO `comment` VALUES (3, 1, '琪亚娜本人\r\n', '等着看动画', '2019-06-29 17:16:44', 3);
INSERT INTO `comment` VALUES (4, 2, '我的', '好看哦', '2019-06-29 17:23:49', 4);
INSERT INTO `comment` VALUES (5, 3, '是谁呢', '快点更新！', '2019-06-29 17:24:14', 5);
INSERT INTO `comment` VALUES (6, 4, '爱了', '什么神仙漫画！', '2019-06-29 17:24:31', 6);
INSERT INTO `comment` VALUES (19, 3, '12', '3', '0000-00-00 00:00:00', 1);
INSERT INTO `comment` VALUES (21, 3, '333', '4', '2019-06-29 10:14:19', 3);
INSERT INTO `comment` VALUES (22, 3, '333', '4', '2019-06-29 10:14:19', 3);
INSERT INTO `comment` VALUES (23, 3, '412412', '2', '2019-06-29 10:16:08', 4);

SET FOREIGN_KEY_CHECKS = 1;
