<section class="promo">
    <h2 class="promo__title">Нужен стафф для катки?</h2>
    <p class="promo__text">На нашем интернет-аукционе ты найдёшь самое эксклюзивное сноубордическое и горнолыжное снаряжение.</p>
    <ul class="promo__list">

        <?foreach ($categories as $key => $value):?> 
            <li class="promo__item promo__item--boards">
                <a class="promo__link" href="all-lots.html"><?=$value;?></a>
            </li>
        <?endforeach;?>
    </ul>
</section>
<section class="lots">
    <div class="lots__header">
        <h2>Открытые лоты</h2>
    </div>
    <ul class="lots__list">
        
        <?php foreach ($ads as $key => $lot_value): ?>
            <li class="lots__item lot">
                <div class="lot__image">
                    <img src="<?=$lot_value['pic_link']; ?>" width="350" height="260" alt="Сноуборд" alt="<?=$lot_value['name']; ?>">
                </div>
                <div class="lot__info">
                    <span class="lot__category"><?=$lot_value['ads_category']; ?></span>
                    <h3 class="lot__title"><a class="text-link" href="lot.html"><?=$lot_value['name']; ?></a></h3>
                    <div class="lot__state">
                        <div class="lot__rate">
                            <span class="lot__amount">Стартовая цена</span>
                            <span class="lot__cost"><?php print f_price_format($lot_value['price'])?></span>
                        </div>
                        <div class="lot__timer timer">
                        </div>
                    </div>
                </div>
            </li>
        <?php endforeach; ?>

    </ul>
</section>