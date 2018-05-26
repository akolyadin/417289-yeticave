INSERT INTO categories (id_category, category_name, category_name_alias) 
VALUES 
	(1, 'Доски и лыжи', 'boards'),
	(2, 'Крепления', 'attachment'),
	(3, 'Ботинки', 'boots'),
	(4, 'Одежда', 'clothing'),
	(5, 'Инструменты', 'tools'),
	(6, 'Разное', 'others');

INSERT INTO users (id_users, user_email, user_name, user_pass, user_contact) 
VALUES 
	(1, 'ironman@ya.ru', 'Iron Man', '123456789', '+7926'),
	(2, 'batman@ya.ru', 'Batmnan', '987654321', '+7910'),
	(3, 'tor@ya.ru', 'Tor', '111111111', '7909');

INSERT INTO ads (id_ad, ad_name, ad_descrition, ad_link, ad_price, ad_date_end, ad_price_step, user_create_id, category_id) 
VALUES 
	(1, '2014 Rossignol District Snowboard', 'Легкий маневренный сноуборд, готовый дать жару в любом парке, растопив снег мощным щелчкоми четкими дугами. Стекловолокно Bi-Ax, уложенное в двух направлениях, наделяет этот снаряд отличной гибкостью и отзывчивостью, а симметричная геометрия в сочетании с классическим прогибом кэмбер позволит уверенно держать высокие скорости. А если к концу катального дня сил совсем не останется, просто посмотрите на Вашу доску и улыбнитесь, крутая графика от Шона Кливера еще никого не оставляла равнодушным.', 'img/lot-1.jpg', 10999, '18.05.2018', 100, 1, 1),
	(2, 'DC Ply Mens 2016/2017 Snowboard', 'Идеально состояние', 'img/lot-2.jpg', 159999, '20.05.2018', 100, 1, 1),
	(3, 'Крепления Union Contact Pro 2015 года размер L/XL', 'Имеются царапины', 'img/lot-3.jpg', 8000, '28.05.2018', 50, 3, 2),
	(4, 'Ботинки для сноуборда DC Mutiny Charocal', 'Не подошел размер', 'img/lot-4.jpg', 10999, '21.05.2018', 100, 2, 3),
	(5, 'Куртка для сноуборда DC Mutiny Charocal', 'Носилась один сезон', 'img/lot-5.jpg', 7500, '30.05.2018', 50, 2, 4),
	(6, 'Маска Oakley Canopy', 'Купил новые', 'img/lot-6.jpg', 5400, '01.06.2018', 50, 3, 6);

INSERT INTO bets (bet_date, user_id, ad_id)
VALUES 
	('13.05.2018', 2, 1),
	('15.05.2018', 3, 1);

/*Выборка всех категорий*/
SELECT * FROM categories;

/*Выборка новых открытых лотов*/
SELECT ad_name, ad_price, ad_link, (t_cnt_bet.cnt_bet * ad_price_step) + ad_price AS cur_price, t_cnt_bet.cnt_bet, categories.category_name FROM ads
JOIN categories ON categories.id_category = ads.category_id
LEFT JOIN (SELECT COUNT(id_bet) cnt_bet, ad_id FROM bets GROUP BY ad_id) t_cnt_bet ON t_cnt_bet.ad_id = ads.id_ad
WHERE user_win_id is null;

/*Выборка лота по id*/
SELECT ad_name, ad_price, ad_link, categories.category_name FROM ads
JOIN categories ON categories.id_category = ads.category_id
WHERE ads.id_ad = 1;

/*Обновление название лота по id*/
UPDATE ads
SET ad_name = ad_name
where ads.id_ad = 1

/*Выборка самых свежих ставок*/
SELECT users.user_name, bet_date  FROM bets
JOIN users ON users.id_users = bets.user_id
JOIN ads ON ads.id_ad = bets.ad_id
WHERE bets.ad_id = 1
ORDER BY bet_date DESC

