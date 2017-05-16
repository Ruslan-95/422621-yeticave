<main>
    <nav class="nav">
        <ul class="nav__list container">
            <li class="nav__item">
                <a href="all-lots.html">Доски и лыжи</a>
            </li>
            <li class="nav__item">
                <a href="all-lots.html">Крепления</a>
            </li>
            <li class="nav__item">
                <a href="all-lots.html">Ботинки</a>
            </li>
            <li class="nav__item">
                <a href="all-lots.html">Одежда</a>
            </li>
            <li class="nav__item">
                <a href="all-lots.html">Инструменты</a>
            </li>
            <li class="nav__item">
                <a href="all-lots.html">Разное</a>
            </li>
        </ul>
    </nav>
    <section class="rates container">
        <h2>Мои ставки</h2>
        <table class="rates__list">
            <?php foreach ($new_bet as $old) : ?>
            <?php
            $id = $old['lot_id'];
            $stuff = $stuff_details[$id];
            ?>
            <tr class="rates__item">
                <td class="rates__info">
                    <div class="rates__img">
                        <img src="<?= strip_tags($stuff['url_image'])?>" width="54" height="40" alt="Сноуборд">
                    </div>
                    <h3 class="rates__title">
                        <a href="lot.php?id=<?=$id?>">
                            <?= strip_tags($stuff['name'])?>
                        </a>
                    </h3>
                </td>
                <td class="rates__category">
                    <?=$stuff['category']?>
                </td>
                <td class="rates__timer">
                    <div class="timer timer--finishing"><?=lot_time_remaining()?></div>
                </td>
                <td class="rates__price">
                    <?= $old['cost']?>
                </td>
                <td class="rates__time">
                    <?= bets_time($old['time'])?>
                </td>
                <?php endforeach;?>
            </tr>
        </table>
    </section>
</main>
