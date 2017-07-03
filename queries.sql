--получить список из всех категорий;
SELECT * FROM categories;

--получить самые новые, открытые лоты.
-- Каждый лот должен включать название, стартовую цену, ссылку на изображение, цену, количество ставок, название категории;

SELECT lots.name, lots.price, lots.img, categories.name AS category, MAX(bets.price) AS rate, COUNT(bets.lot_id) AS bet
FROM lots
JOIN categories ON lots.category_id = categories.id
JOIN bets ON lots.id = bets.lot_id
WHERE lots.date_final > NOW() AND lots.winner_id IS NULL
GROUP BY lots.id
ORDER BY lots.date_add DESC;

--найти лот по его названию или описанию;
SELECT * FROM lots
WHERE name LIKE "%snow%"
      OR 'description' LIKE "%snow%";

--добавить новый лот (все данные из формы добавления);
INSERT INTO lots
(
  date_add,
  name,
  img,
  price,
  description,
  date_final,
  step_price,
  user_id,
  category_id)
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
UPDATE lots
SET name = "new test name"
WHERE id = 1;

--добавить новую ставку для лота;
INSERT INTO bets SET
                  date_add = now(),
                  price = 15000,
                  user_id = 2,
                  lot_id= 2;

--получить список ставок для лота по его идентификатору.
SELECT * FROM bets
Where user_id = 2;
