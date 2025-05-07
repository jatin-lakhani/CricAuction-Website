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


-- Added for optimization of fetch auctions with filters
ALTER TABLE auctions ADD INDEX creator_id (creator_id);
ALTER TABLE auctions ADD INDEX creator_phone (creator_phone);
ALTER TABLE auctions ADD INDEX auction_name (auction_name);
ALTER TABLE auctions ADD INDEX auction_code (auction_code);
ALTER TABLE pricings ADD INDEX auction_id_paymentStatus (auction_id, paymentStatus);
ALTER TABLE pricings ADD INDEX auction_id_paymentDate (auction_id, paymentDate);
ALTER TABLE players ADD INDEX player_mobile_no (player_mobile_no);
ALTER TABLE auction_bidders ADD INDEX creator_id (creator_id);