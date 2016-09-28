/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : yume

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2016-09-28 22:05:49
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for menus
-- ----------------------------
DROP TABLE IF EXISTS `menus`;
CREATE TABLE `menus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '菜单名称',
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '菜单链接',
  `icon` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '菜单图表',
  `parent_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '父级id',
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '菜单权限',
  `heightlight_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '菜单高亮',
  `sort` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '菜单排序',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of menus
-- ----------------------------
INSERT INTO `menus` VALUES ('1', '控制台', '/admin', 'icon-home', '0', '', 'admin', '3', '2016-09-18 09:03:55', '2016-09-23 11:54:22');
INSERT INTO `menus` VALUES ('2', '系统管理', '/admin', 'icon-settings', '0', 'admin.system.manage', 'admin/menu*,admin/user*,admin/role*,admin/permission*', '1', '2016-09-18 09:03:56', '2016-09-23 11:54:32');
INSERT INTO `menus` VALUES ('3', '菜单管理', '/admin/menu', '', '2', 'admin.menus.manage', 'admin/menu', '0', '2016-09-18 09:03:56', '2016-09-18 09:03:56');
INSERT INTO `menus` VALUES ('4', '用户管理', '/admin/user', 'icon-user', '2', 'admin.users.manage', 'admin/user,admin/user/create', '0', '2016-09-18 09:03:56', '2016-09-18 09:03:56');
INSERT INTO `menus` VALUES ('5', '用户列表', '/admin/user', 'fa fa-user', '4', 'admin.users.list', 'admin/user', '0', '2016-09-18 09:03:56', '2016-09-18 09:03:56');
INSERT INTO `menus` VALUES ('6', '用户添加', '/admin/user/create', 'fa fa-user-plus', '4', 'admin.users.add', 'admin/user/create', '0', '2016-09-18 09:03:56', '2016-09-18 09:03:56');
INSERT INTO `menus` VALUES ('7', '权限管理', '/admin/permission', 'fa fa-key', '2', 'admin.permissions.manage', 'admin/permission,admin/permission/create', '0', '2016-09-18 09:03:56', '2016-09-23 11:58:37');
INSERT INTO `menus` VALUES ('8', '角色管理', '/admin/role', '', '2', 'admin.roles.manage', 'admin/role,admin/role/create', '0', '2016-09-18 09:03:56', '2016-09-20 09:25:50');
INSERT INTO `menus` VALUES ('14', '日志管理', '/admin/article', 'fa fa-book', '0', '', 'admin/article', '2', '2016-09-19 09:08:38', '2016-09-28 12:41:09');
INSERT INTO `menus` VALUES ('15', '添加日志', '/admin/article', '', '14', '', '', '1', '2016-09-19 09:34:35', '2016-09-28 12:43:49');
INSERT INTO `menus` VALUES ('16', '日志列表', '/admin/article', '', '14', '', '', '2', '2016-09-19 09:38:33', '2016-09-28 12:41:35');
INSERT INTO `menus` VALUES ('20', '添加角色', '/admin/role/create', 'fa fa-user', '8', '', 'admin/role/create', '0', '2016-09-20 09:14:00', '2016-09-20 09:14:00');
INSERT INTO `menus` VALUES ('21', '权限列表', '/admin/permission', 'fa fa-key', '7', '', 'admin/permission', '0', '2016-09-23 11:40:57', '2016-09-23 11:57:48');
INSERT INTO `menus` VALUES ('22', '添加权限', '/admin/permission/create', 'fa fa-key', '7', '', 'admin/permission/create', '0', '2016-09-23 11:42:26', '2016-09-23 11:58:47');
INSERT INTO `menus` VALUES ('23', '角色列表', '/admin/role', 'fa fa-user', '8', '', 'admin/role', '1', '2016-09-27 05:04:26', '2016-09-27 05:15:37');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('2016_09_13_055602_entrust_setup_tables', '1');
INSERT INTO `migrations` VALUES ('2016_09_13_093624_create_menus_table', '1');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of permissions
-- ----------------------------
INSERT INTO `permissions` VALUES ('1', 'admin.system.login', '登录后台', '登录后台', '2016-09-18 09:03:54', '2016-09-18 09:03:54');
INSERT INTO `permissions` VALUES ('2', 'admin.system.manage', '系统管理', '系统管理', '2016-09-18 09:03:54', '2016-09-18 09:03:54');
INSERT INTO `permissions` VALUES ('3', 'admin.users.manage', '用户管理', '用户管理', '2016-09-18 09:03:54', '2016-09-18 09:03:54');
INSERT INTO `permissions` VALUES ('4', 'admin.menus.manage', '菜单管理', '菜单管理', '2016-09-18 09:03:54', '2016-09-18 09:03:54');
INSERT INTO `permissions` VALUES ('5', 'admin.permissions.manage', '权限管理', '权限管理', '2016-09-18 09:03:54', '2016-09-18 09:03:54');
INSERT INTO `permissions` VALUES ('6', 'admin.roles.manage', '角色管理', '角色管理', '2016-09-18 09:03:54', '2016-09-18 09:03:54');
INSERT INTO `permissions` VALUES ('7', 'admin.users.list', '用户列表', '用户列表', '2016-09-18 09:03:55', '2016-09-18 09:03:55');
INSERT INTO `permissions` VALUES ('8', 'admin.users.add', '添加用户', '添加用户', '2016-09-18 09:03:55', '2016-09-18 09:03:55');
INSERT INTO `permissions` VALUES ('9', 'admin.menus.add', '添加菜单', '添加菜单', '2016-09-20 17:22:15', '2016-09-20 17:22:20');
INSERT INTO `permissions` VALUES ('10', 'admin.menus.edit', '编辑菜单', '编辑菜单', '2016-09-20 17:23:13', '2016-09-20 17:23:16');
INSERT INTO `permissions` VALUES ('11', 'admin.menus.delete', '删除菜单', '删除菜单', '2016-09-20 17:23:44', '2016-09-20 17:23:47');

-- ----------------------------
-- Table structure for permission_role
-- ----------------------------
DROP TABLE IF EXISTS `permission_role`;
CREATE TABLE `permission_role` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_role_id_foreign` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of permission_role
-- ----------------------------
INSERT INTO `permission_role` VALUES ('1', '1');
INSERT INTO `permission_role` VALUES ('2', '1');
INSERT INTO `permission_role` VALUES ('3', '1');
INSERT INTO `permission_role` VALUES ('4', '1');
INSERT INTO `permission_role` VALUES ('5', '1');
INSERT INTO `permission_role` VALUES ('6', '1');
INSERT INTO `permission_role` VALUES ('7', '1');
INSERT INTO `permission_role` VALUES ('8', '1');
INSERT INTO `permission_role` VALUES ('9', '1');
INSERT INTO `permission_role` VALUES ('10', '1');
INSERT INTO `permission_role` VALUES ('11', '1');
INSERT INTO `permission_role` VALUES ('1', '2');

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES ('1', 'admin', '超级管理员', '炒鸡管理员', '2016-09-18 09:03:55', '2016-09-18 09:03:55');
INSERT INTO `roles` VALUES ('2', 'user', '普通管理', '普通管理', '2016-09-18 09:03:55', '2016-09-18 09:03:55');
INSERT INTO `roles` VALUES ('3', 'kid', '小孩', '小孩', '2016-09-20 09:43:10', '2016-09-20 09:43:10');

-- ----------------------------
-- Table structure for role_user
-- ----------------------------
DROP TABLE IF EXISTS `role_user`;
CREATE TABLE `role_user` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `role_user_role_id_foreign` (`role_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of role_user
-- ----------------------------
INSERT INTO `role_user` VALUES ('1', '1');
INSERT INTO `role_user` VALUES ('1', '2');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'admin', '+3253519721924', 'admin@163.com', '$2y$10$kuDe0W2a49pn.T9H1YGa2OgIXOKWF.mPEeVzORIoCj7vTogi2Jwsm', '4hviIaPr2V', '2016-09-18 09:03:55', '2016-09-18 09:03:55');
INSERT INTO `users` VALUES ('2', 'user1', '', 'user@user.com', '$2y$10$soa5fkJSvzE0ALcGaLvpl.y89vmPXd4lE4XWT8uumqksMy5aCEXAa', null, '2016-09-20 01:41:13', '2016-09-27 07:01:52');
