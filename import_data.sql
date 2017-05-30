INSERT INTO category (`name`) VALUES
  ('Доски и лыжи'),
  ('Крепления'),
  ('Ботинки'),
  ('Одежда'),
  ('Инструменты'),
  ('Разное');

INSERT INTO users (`date`, `email`, `password`, `name`, `avatar`, `contact`) VALUES
  (NOW(), 'ignat.v@gmail.com', '$2y$10$OqvsKHQwr0Wk6FMZDoHo1uHoXd4UdxJG/5UDtUiie00XaxMHrW8ka', 'Игнат', '/img/upload/avatar.jpg', 'ignat.v@gmail.com'),
  (NOW(), 'kitty_93@li.ru', '$2y$10$bWtSjUhwgggtxrnJ7rxmIe63ABubHQs0AS0hgnOo41IEdMHkYoSVa', 'Леночка', '/img/upload/avatar.jpg', 'kitty_93@li.ru'),
  (NOW(), 'warrior07@mail.ru', '$2y$10$2OxpEH7narYpkOT1H5cApezuzh10tZEEQ2axgFOaKW.55LxIJBgWW', 'Руслан', '/img/upload/user.jpg', 'warrior07@mail.ru');

INSERT INTO lot (`category_id`, `user_id`, `winner_id`, `date_add`, `date_final`, `title`, `description`, `img`, `initial_rate`, `step_price`, `favorit`)
VALUES
  (1, 5, NULL, NOW(), '2017-07-01 00:00:00', '2014 Rossignol District Snowboard', 'Описание',
      'img / upload / lot - 1.jpg', 10000, 450, 5),
  (2, 4, NULL, NOW(), '2017-06-02 00:00:00', 'DC Ply Mens 2016 / 2017 Snowboard', 'Описание',
      'img / upload / lot - 2.jpg', 15000, 2000, 0),
  (3, 3, NULL, NOW(), '2017-05-03 00:00:00', 'Крепления UNION Contact Pro 2015 года размер L/XL', 'Описание',
      'img / upload / lot - 3.jpg', 8000, 100, 0),
  (4, 2, NULL, NOW(), '2017-07-04 00:00:00', 'Ботинки для сноуборда DC Mutiny Charocal', 'Описание',
      'img / upload / lot - 4.jpg', 11000, 400, 4),
  (5, 1, NULL, NOW(), '2017-08-05 00:00:00', 'Куртка для сноуборда DC Mutiny Charocal', 'Описание',
      'img / upload / lot - 5.jpg', 7500, 200, 3),
  (4, 3, NULL, NOW(), '2017-07-06 00:00:00', 'Маска Oakley Canopy', 'Описание', 'img / upload / lot - 6.jpg',
      5400, 50, 5),
  (3, 3, NULL, NOW(), '2017-07-07 00:00:00', 'Snowboard Jons lord Snow', 'Описание',
      'img / upload / lot - 7.jpg', 7700, 80, 5);

INSERT INTO bet (`lot_id`, `user_id`, `date_add`, `price`) VALUES
  (1, 3, '2017 - 05 - 07 07:07:07', 10500),
  (1, 3, '2017 - 05 - 08 08:18:08', 11000),
  (1, 3, '2017 - 05 - 09 09:09:09', 11500),
  (1, 2, NOW(), 18000);