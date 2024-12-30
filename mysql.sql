/* 
 For adding firebase user id in users table 
 */
ALTER TABLE `users`
ADD `uid` VARCHAR(255) NULL
AFTER `id`;
/* 
 For adding firebase user id in users table 
 */
ALTER TABLE `users` CHANGE `oauth_type` `oauth_type` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL;
ALTER TABLE `users` CHANGE `oauth_type` `signInType` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL;
ALTER TABLE `users` DROP INDEX `users_email_unique`;
