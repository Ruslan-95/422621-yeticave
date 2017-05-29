--получить список из всех категорий;
SELECT * FROM category;

--получить самые новые, открытые лоты. Каждый лот должен включать название, стартовую цену, ссылку на изображение, цену, количество ставок, название категории;
SELECT `name`, `price`, `img`, `bet.price`, count(bet.id), category.name FROM lot
  JOIN category ON lot.category_id = category.id
  JOIN bet ON lot.id = bet.lot_id
WHERE now() < date_final AND lot.winner_id=FALSE
ORDER BY lot.date DESC;

--найти лот по его названию или описанию;
SELECT * FROM lot
WHERE name LIKE "%snow%"
      OR 'description' LIKE "%snow%";

--добавить новый лот (все данные из формы добавления);
INSERT INTO lot
(
  `data`,
  `name`,
  `img`,
  `price`,
  `description`,
  `date_final`,
  `step_price`,
  `user_id`,
  `category_id`)
  VALUE
  (
    now(),
    "test name",
    "img/lot-7.jpg",
    10000,
    "some test description",
    NOW()+INTERVAL 7 DAY,
    500,
    2,
    2);

--обновить название лота по его идентификатору;
UPDATE lot
SET name = "new test name"
WHERE id = 1;

--добавить новую ставку для лота;
INSERT INTO bet SET
                  `date_add` = now(),
                  `price` = 15000,
                  `user_id` = 2,
                  `lot_id`= 2;

--получить список ставок для лота по его идентификатору.
SELECT * FROM bet
Where id= 2;
