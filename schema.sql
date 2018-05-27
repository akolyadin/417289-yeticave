CREATE DATABASE yeticave
	DEFAULT CHARACTER SET utf8
	DEFAULT COLLATE utf8_general_ci;
	
USE yeticave;

CREATE TABLE ads (
	id_ad INT AUTO_INCREMENT PRIMARY KEY,
	ad_date_create DATETIME DEFAULT CURRENT_TIMESTAMP, 
	ad_name CHAR(64) NOT NULL,
	ad_descrition CHAR(128),
	ad_link CHAR(128) NOT NULL,
	ad_price INT NOT NULL,
	ad_date_end DATETIME NOT NULL,
	ad_price_current INT,
	user_create_id INT NOT NULL,
	user_win_id INT,
	category_id TINYINT NOT NULL
);

CREATE TABLE categories (
	id_category TINYINT AUTO_INCREMENT PRIMARY KEY,
	category_name CHAR(64) NOT NULL,
	category_name_alias CHAR(64) NOT NULL
);

CREATE TABLE bets (
	id_bet INT AUTO_INCREMENT PRIMARY KEY,
	bet_date DATETIME DEFAULT CURRENT_TIMESTAMP,
	bet_value int NOT NULL,
	user_id INT NOT NULL,
	ad_id INT NOT NULL
);

CREATE TABLE users (
	id_users INT AUTO_INCREMENT PRIMARY KEY,
	user_reg_date DATETIME DEFAULT CURRENT_TIMESTAMP,
	user_email CHAR(128) NOT NULL,
	user_name CHAR(128) NOT NULL,
	user_pass CHAR(32) NOT NULL,
	user_avatar BLOB,
	user_contact CHAR(128) NOT NULL
);

CREATE UNIQUE INDEX uix_ads_ad_name ON ads(ad_name);

CREATE INDEX ix_ads_ad_descrition ON ads(ad_descrition);

CREATE UNIQUE INDEX uix_categories_category_name ON categories(category_name);

CREATE UNIQUE INDEX uix_users_user_email ON users(user_email);

ALTER TABLE `ads` ADD FOREIGN KEY ( `user_create_id`) 
REFERENCES `users` (`id_users`) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE `ads` ADD FOREIGN KEY ( `user_win_id`) 
REFERENCES `users` (`id_users`) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE `ads` ADD FOREIGN KEY ( `category_id`) 
REFERENCES `categories` (`id_category`) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE `bets` ADD FOREIGN KEY ( `user_id`) 
REFERENCES `users` (`id_users`) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE `bets` ADD FOREIGN KEY ( `user_id` ) 
REFERENCES `ads` (`id_ad`) ON DELETE RESTRICT ON UPDATE RESTRICT;
