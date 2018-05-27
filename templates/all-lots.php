<div class="container">
    <section class="lots">
      <h2>Все лоты в категории <span>«<?= $category[0]['category_name']; ?>»</span></h2>
      <ul class="lots__list">
        <?php foreach ($ads as $ad): ?>
        <li class="lots__item lot">
          <div class="lot__image">
            <img src="<?= $ad['ad_link']; ?>" width="730" height="548" alt="<?= $ad['ad_name']; ?>">
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
    <ul class="pagination-list">
      <li class="pagination-item pagination-item-prev"><a>Назад</a></li>
      <li class="pagination-item pagination-item-active"><a>1</a></li>
      <li class="pagination-item"><a href="#">2</a></li>
      <li class="pagination-item"><a href="#">3</a></li>
      <li class="pagination-item"><a href="#">4</a></li>
      <li class="pagination-item pagination-item-next"><a href="#">Вперед</a></li>
    </ul>
  </div>