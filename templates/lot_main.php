<main  class="main">
    <nav class="nav">
        <ul class="nav__list container">

            <?php foreach ($data['categories'] as $item): ?>
                <li class="nav__item">
                    <a href="<?= $item['id'] ?>">
                        <?= $item['name'] ?>
                    </a>
                </li>
            <?php endforeach;?>
        </ul>
    </nav>
    <section class="lot-item container">
        <?
        $cat = $data['categories'];
        var_dump($cat['name'])
        ?>
        <h2><?= $data['lots'].['name'] ?></h2>
        <div class="lot-item__content">
            <div class="lot-item__left">
                <div class="lot-item__image">
                    <img src="<?= $data['lots']['img'] ?>" width="730" height="548"
                         alt="<?= $data['lots']['name'] ?>">
                </div>
                <p class="lot-item__category">Категория: <span><?= $data['lots']['categories'] ?></span></p>
                <p class="lot-item__description"><?= $data['lot']['description'] ?></p>
            </div>
            <div class="lot-item__right">
                <div class="lot-item__state">
                    <div class="lot-item__timer timer">
                        <?= lotTimeRemaining() ?>
                    </div>
                    <div class="lot-item__cost-state">
                        <div class="lot-item__rate">
                            <span class="lot-item__amount">Текущая цена</span>
                            <span class="lot-item__cost"><?= $data['lot']['price'] ?></span>
                        </div>
                        <?php if ($data['check']): ?>
                            <div class="lot-item__min-cost">
                                Мин. ставка <span><?= $data['lot']['price'] ?></span>
                            </div>
                        <?php endif; ?>
                    </div>

                    <?php if ($data['check']): ?>
                        <form class="lot-item__form <?= $data['errors']? 'form--invalid': '' ?>"
                              action="lot.php?<?= 'id='.$_GET['id']?>" method="post">
                            <p class="lot-item__form-item <?= $data['errors']['cost']? 'form__item--invalid': '' ?>">
                                <label for="cost">Ваша ставка</label>
                                <input id="cost" type="number" name="cost"
                                       min="<?= $data['lot']['price'] ?>"
                                       placeholder="<?= $data['lot']['price'] ?>">
                                <span class="form__error"><?= $data['errors']['cost'] ?></span>
                            </p>
                            <button type="submit" class="button">Сделать ставку</button>
                        </form>
                    <?php endif; ?>
                </div>
                <div class="history">
                    <h3>История ставок (<span><?= count(['bets']) ?></span>)</h3>
                    <table class="history__list">
                        <?php foreach (['bets'] as $item):?>
                            <tr class="history__item">
                                <td class="history__name"><?= ['user_id'] ?></td>
                                <td class="history__price"><?= ['price'] ?> р</td>
                                <td class="history__time"><?= bets_time($item['ts']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
    </section>
</main>