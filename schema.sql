CREATE DATABASE yeticave
	DEFAULT CHARACTER SET utf8
	DEFAULT COLLATE utf8_general_ci;
	
USE yeticave;

CREATE TABLE ads (
	id_ad INT AUTO_INCREMENT PRIMARY KEY,
	ad_date_create DATETIME DEFAULT CURRENT_TIMESTAMP, 
	ad_name CHAR(64),
	ad_descrition CHAR(255),
	ad_link CHAR(255),
	ad_price INT,
	ad_date_end DATETIME,
	ad_price_step INT,
	user_create_id INT,
	user_win_id INT,
	category_id TINYINT
);

CREATE TABLE categories (
	id_category INT AUTO_INCREMENT PRIMARY KEY,
	category_name CHAR(64)
);

CREATE TABLE  bets (
	id_bet INT AUTO_INCREMENT PRIMARY KEY,
	bet_date DATETIME DEFAULT CURRENT_TIMESTAMP,
	bet_price INT,
	user_id INT,
	ad_id INT
);

CREATE TABLE users (
	id_users INT AUTO_INCREMENT PRIMARY KEY,
	user_reg_date DATETIME DEFAULT CURRENT_TIMESTAMP,
	user_email ,
	user_name ,
	user_pass ,
	user_avatar ,
	user_contact ,

);

ALTER TABLE `ads` ADD FOREIGN KEY ( `user_create_id` ) 
REFERENCES `users` (`id_users`) ON DELETE RESTRICT ON UPDATE RESTRICT ;


ALTER TABLE `ads` ADD FOREIGN KEY ( `user_win_id` ) 
REFERENCES `users` (`id_users`) ON DELETE RESTRICT ON UPDATE RESTRICT ;


ALTER TABLE `ads` ADD FOREIGN KEY ( `category_id` ) 
REFERENCES `categories` (`id_category`) ON DELETE RESTRICT ON UPDATE RESTRICT ;


ALTER TABLE ` bets` ADD FOREIGN KEY ( `user_id` ) 
REFERENCES `users` (`id_users`) ON DELETE RESTRICT ON UPDATE RESTRICT ;


ALTER TABLE ` bets` ADD FOREIGN KEY ( `user_id` ) 
REFERENCES `ads` (`id_ad`) ON DELETE RESTRICT ON UPDATE RESTRICT ;
