/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : boke

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2019-07-26 13:59:12
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for article
-- ----------------------------
DROP TABLE IF EXISTS `article`;
CREATE TABLE `article` (
  `article_id` int(11) NOT NULL AUTO_INCREMENT,
  `article_title` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `article_triffic` int(100) NOT NULL,
  `lanmu` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tag` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `artical_create_time` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `guanjianzi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `inner` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dsc` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `visibility` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `u_id` int(100) NOT NULL,
  `is_del` int(1) NOT NULL,
  PRIMARY KEY (`article_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of article
-- ----------------------------
INSERT INTO `article` VALUES ('1', '骆驼祥子ab', '0', '4', 'PHP', '1562409717', '鲁迅', '内容12', '描述1钱钱钱', '0', '', '2', '1');
INSERT INTO `article` VALUES ('2', '西游记', '0', '1', 'PHP', '1562409717', '周树人', '内容2', '描述2', '0', '', '1', '0');
INSERT INTO `article` VALUES ('3', '红楼梦', '0', '2', 'PHP', '1562409717', '巴金', '内容3', '描述3', '0', '', '3', '0');
INSERT INTO `article` VALUES ('4', '三国演义', '3', '3', 'PHP', '1562409717', '钱学森', '内容4', '描述4', '0', '', '2', '0');
INSERT INTO `article` VALUES ('5', '水浒传', '0', '4', 'PHP', '1562409717', '鲁班', '内容5 ', '描述5', '0', '', '3', '0');
INSERT INTO `article` VALUES ('6', '前端框架', '0', '5', 'react', '1562597260', 'react', '个人认为最好用的前端框架react.js', '前端最火的框架', '0', '', '3', '1');
INSERT INTO `article` VALUES ('7', '骆驼祥子', '0', '4', 'PHP', '1562942450', '鲁迅111', '内容1 ', '描述1', '0', '', '3', '1');

-- ----------------------------
-- Table structure for comment
-- ----------------------------
DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `comment_id` int(100) NOT NULL AUTO_INCREMENT,
  `a_id` int(100) NOT NULL,
  `comment_content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cr_time` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `cr_zy` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `is_del` int(1) NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1562683765 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of comment
-- ----------------------------
INSERT INTO `comment` VALUES ('1', '0', '这本书很好看', '1562683764', '这本书很好看', '0');
INSERT INTO `comment` VALUES ('2', '1562683764', '1562683764', '1562683764', '1562683764', '1');
INSERT INTO `comment` VALUES ('3', '0', '我觉得作者很赞', '1562683764', '我觉得作者很赞', '0');
INSERT INTO `comment` VALUES ('4', '0', '不太认同，作者观点还好', '1562683764', '不太认同，作者观点还好', '0');

-- ----------------------------
-- Table structure for inner
-- ----------------------------
DROP TABLE IF EXISTS `inner`;
CREATE TABLE `inner` (
  `inner_id` int(100) NOT NULL AUTO_INCREMENT,
  `inner_title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `inner_content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `inner_create_time` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `inner_gjz` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `inner_dsc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_del` int(1) NOT NULL,
  PRIMARY KEY (`inner_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of inner
-- ----------------------------
INSERT INTO `inner` VALUES ('1', '招聘前端工程师', '本公司急招招聘前端工程师.。。。。。。。', '1562409717', null, null, '0');
INSERT INTO `inner` VALUES ('2', '招聘后台工程师', '本公司急招招聘后台工程师.。。。。。。。', '1562409717', null, null, '0');
INSERT INTO `inner` VALUES ('6', 'title', 'title', '1562683764', 'gjz', 'dsc', '1');

-- ----------------------------
-- Table structure for lanmu
-- ----------------------------
DROP TABLE IF EXISTS `lanmu`;
CREATE TABLE `lanmu` (
  `lanmu_id` int(100) NOT NULL AUTO_INCREMENT,
  `lan_father_id` int(100) NOT NULL,
  `lanmu_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lan_another_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lan_guanjianzi` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lan_num` int(100) NOT NULL,
  `lan_dsc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_del` int(1) NOT NULL,
  PRIMARY KEY (`lanmu_id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of lanmu
-- ----------------------------
INSERT INTO `lanmu` VALUES ('1', '0', '前端技术', '前端', '前端', '10', null, '1');
INSERT INTO `lanmu` VALUES ('2', '0', '后端程序', '后端', '后端', '20', null, '0');
INSERT INTO `lanmu` VALUES ('3', '0', '设计栏目', 'ps，ai', 'ps', '30', null, '0');
INSERT INTO `lanmu` VALUES ('4', '0', 'SEO栏目', 'seo,搜索优化', 'SEO', '40', null, '0');
INSERT INTO `lanmu` VALUES ('5', '0', '服务器栏目', '服务器', '服务器', '50', null, '0');
INSERT INTO `lanmu` VALUES ('6', '1', '脚本', null, 'js', '0', '页面效果制作', '0');
INSERT INTO `lanmu` VALUES ('7', '2', 'phpinfo', 'info', 'php', '0', '世界上最好用的语言', '0');
INSERT INTO `lanmu` VALUES ('8', '3', 'ai制作', null, 'ai制作步骤', '0', 'ai设计步骤方法的总结', '1');
INSERT INTO `lanmu` VALUES ('9', '3', 'ai制作', 'ps', 'ai制作步骤', '0', 'ai设计步骤方法的总结', '0');

-- ----------------------------
-- Table structure for link
-- ----------------------------
DROP TABLE IF EXISTS `link`;
CREATE TABLE `link` (
  `link_id` int(100) NOT NULL AUTO_INCREMENT,
  `link_content` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `link_logo` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link_dsc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link_create_time` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `link_update_time` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_del` int(1) NOT NULL,
  PRIMARY KEY (`link_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of link
-- ----------------------------
INSERT INTO `link` VALUES ('1', 'www.baidu.com', '百度', '发', '狗爪', '1563628858', null, '0');
INSERT INTO `link` VALUES ('2', 'www.sougou.com', '搜狗', '啊', '狗头', '1563628858', '1563628858', '0');
INSERT INTO `link` VALUES ('3', 'www.lanhu.com', '蓝湖', null, '大海', '1563628858', null, '1');
INSERT INTO `link` VALUES ('4', 'www.taobao.com', '淘宝', null, '交易', '1563628858', null, '0');
INSERT INTO `link` VALUES ('5', 'www.jingdong.com', '京东', '东', '小狗', '1563628858', null, '0');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `u_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` char(32) COLLATE utf8_unicode_ci NOT NULL,
  `login_time` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `truename` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `create_time` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `is_del` int(1) NOT NULL,
  `ip` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `pre_time` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '1563876207', '刘欢', '18521324111', '1562409717', '1', '127.0.0.1', '1563876206');
INSERT INTO `user` VALUES ('2', 'user', 'e10adc3949ba59abbe56e057f20f883e', '1564110830', '李林', '15231232222', '1562409717', '0', '127.0.0.1', '1564110727');
INSERT INTO `user` VALUES ('3', 'super_user', 'e10adc3949ba59abbe56e057f20f883e', '1562409841', '王五', '15952313333', '1562409717', '1', '192.168.199.88', '0');
