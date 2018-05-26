<section class="promo">
    <h2 class="promo__title">Нужен стафф для катки?</h2>
    <p class="promo__text">На нашем интернет-аукционе ты найдёшь самое эксклюзивное сноубордическое и горнолыжное снаряжение.</p>
    <ul class="promo__list">

        <?php foreach ($categories as $category): ?>
            <li class="promo__item promo__item--<?= $category_key; ?>">
                <a class="promo__link" href="all-lots.php?id_category=<?= htmlspecialchars($category['id_category']); ?>"><?= $category['category_name']; ?></a>
            </li>
        <?php endforeach; ?>

    </ul>
</section>
<section class="lots">
    <div class="lots__header">
        <h2>Открытые лоты</h2>
    </div>
    <ul class="lots__list">
        
        <?php foreach ($ads as $ad): ?>
            <li class="lots__item lot">
                <div class="lot__image">
                    <img src="<?=$ad['ad_link']; ?>" width="350" height="260" alt="<?= $ad['ad_name']; ?>" alt="<?= $ad['ad_name']; ?>">
                </div>
                <div class="lot__info">
                    <span class="lot__category"><?= $ad['category_name']; ?></span>
                    <h3 class="lot__title"><a class="text-link" href="lot.php?id_ad=<?= htmlspecialchars($ad['id_ad']); ?>"><?= $ad['ad_name']; ?></a></h3>
                    <div class="lot__state">
                        <div class="lot__rate">
                            <span class="lot__amount">Стартовая цена</span>
                            <span class="lot__cost"><?= price_format($ad['ad_price']) ?><b class="rub"> р</b></span>
                        </div>
                        <div class="lot__timer timer">
                            <?= end_time ($ad['ad_date_end']) ?>
                        </div>
                    </div>
                </div>
            </li>
        <?php endforeach; ?>

    </ul>
</section>