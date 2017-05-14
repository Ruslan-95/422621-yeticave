
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
            $id = $new_bet['lot_id'];
            $stuff = $stuff_details[$id];
            ?>
            <tr class="rates__item">
                <td class="rates__info">
                    <div class="rates__img">
                        <img src="<? htmlspecialchars($stuff['url_image']) ?>" width="54" height="40" alt="Сноуборд">
                    </div>
                    <h3 class="rates__title"><a href="lot.php?id<?=$valid?>">
                            <?=htmlspecialchars($stuff['name'])?></a></h3>
                </td>
                <td class="rates__category">
                    <?=htmlspecialchars($stuff['category'])?>
                </td>
                <td class="rates__timer">
                    <div class="timer timer--finishing"><?=lot_time_remaining()?></div>
                </td>
                <td class="rates__price">
                    <?=htmlspecialchars($new_bet['cost'])?>
                </td>
                <td class="rates__time">
                    <?= bets_time($old['time'])?>
                </td>
                <?php endforeach;?>
            </tr>
        </table>
    </section>
</main>