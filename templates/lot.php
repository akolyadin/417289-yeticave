<?php foreach ($ads as $ad): ?>
  <section class="lot-item container">
    <h2><?= $ad['ad_name']; ?></h2>

    <div class="lot-item__content">
      <div class="lot-item__left">
        <div class="lot-item__image">
          <img src="<?= $ad['ad_link']; ?>" width="730" height="548" alt="<?= $ad['ad_name']; ?>">
        </div>
        <p class="lot-item__category">Категория: <span><?= $ad['category_name']; ?></span></p>
        <p class="lot-item__description"><?= $ad['ad_descrition']; ?></p>
      </div>
      <div class="lot-item__right">
        <div class="lot-item__state">
          <div class="lot-item__timer timer">
            <?= end_time() ?>
          </div>
          <div class="lot-item__cost-state">
            <div class="lot-item__rate">
              <span class="lot-item__amount">Текущая цена</span>
              <span class="lot-item__cost">10 999</span>
            </div>
            <div class="lot-item__min-cost">
              Мин. ставка <span>12 000 р</span>
            </div>
          </div>
          <form class="lot-item__form" action="https://echo.htmlacademy.ru" method="post">
            <p class="lot-item__form-item">
              <label for="cost">Ваша ставка</label>
              <input id="cost" type="number" name="cost" placeholder="12 000">
            </p>
            <button type="submit" class="button">Сделать ставку</button>
          </form>
        </div>
        <div class="history">
          <h3>История ставок (
            <span>   
            <?php 
              if (count($bets) > 0 ) {
                echo count($bets);
              }
                  
              else {
                      echo 'Ставок не было';
              }?>
                
              </span>)
          </h3>
          <table class="history__list">
            
            <?php foreach ($bets as $bet): ?>
              <tr class="history__item">
                <td class="history__name"><?= $bet['user_name']; ?></td>
                <td class="history__price"><?= $bet['bet_value']; ?></td>
                <td class="history__time"><?= pased_time($bet['bet_date']); ?></td>
              </tr>
            <?php endforeach; ?> 
          </table>
        </div>
      </div>
    </div>
  </section>
<?php endforeach; ?>