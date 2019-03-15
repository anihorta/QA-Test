<?php
use tests\codeception\frontend\FunctionalTester;

/* @var $scenario Codeception\Scenario */

$I = new FunctionalTester($scenario);
$I->wantTo('ensure all menu works');

$I->amOnPage(['/']);

/* Меню из шапки */
$I->seeLink('Доставка и оплата');
$I->seeLink('Стать дилером');
$I->seeLink('Контакты');

// Доставка и оплата
$I->amOnPage(['/page/delivery-payment']);
$I->see('Доставка и оплата', 'h1');

// Стать дилером
$I->amOnPage(['/page/became-dealer']);
$I->see('Стать дилером', 'h1');

// Контакты
$I->amOnPage(['/page/contacts']);
$I->see('Контакты', 'h1');


/* Горизонтальное меню */
$I->seeLink('Фильтры для воды');
$I->seeLink('Сменные элементы');
$I->seeLink('Фильтрующие материалы');
$I->seeLink('УФ Лампы');
$I->seeLink('Комплектующие к фильтрам');

// Фильтры для воды
$I->amOnPage(['/category/37f4129aff0f463f97d0c54c51aae9fd']);
$I->see('Фильтры для воды', 'h1');
$I->seeElement('div.category__list');

// Сменные элементы
$I->amOnPage(['/category/356179618ec64e4db2903e3b61d541f6']);
$I->see('Сменные элементы', 'h1');
$I->seeElement('div.category__list');

// Фильтрующие материалы
$I->amOnPage(['/category/c96b5cc3c4d647868c61a3c35c84ee0b']);
$I->see('Фильтрующие материалы', 'h1');
$I->seeElement('div.category__list');

// УФ Лампы
$I->amOnPage(['/category/e0edeeb4341b4b149dc560d0cf5c73c4']);
$I->see('УФ Лампы', 'h1');
$I->seeElement('div.category__list');

// Комплектующие к фильтрам
$I->amOnPage(['/category/f655b372ec3a4774b596edafd6818afa']);
$I->see('Комплектующие к фильтрам', 'h1');
$I->seeElement('div.category__list');


/* Раскрывающееся меню */
$I->seeLink('Фильтры для квартиры');
$I->seeLink('Фильтры для предприятий');
$I->seeLink('Клапаны управления');
$I->seeLink('Корпуса фильтров');
$I->seeLink('Фильтрующие материалы');
$I->seeLink('УФ-обеззараживание');
$I->seeLink('Картриджные фильтры и мембраны');
$I->seeLink('Комплектующие к фильтрам');

// Фильтры для квартиры
$I->amOnPage(['/category/34a589dd835811e780c60cc47aaa3885']);
$I->see('Фильтры для квартиры', 'h1');
$I->seeElement('div.category__list');

// Фильтры для предприятий
$I->amOnPage(['/category/1db0acc52d4411e18aa6003048ddf04b']);
$I->see('Фильтры для предприятий', 'h1');
$I->seeElement('div.category__list');

// Клапаны управления
$I->amOnPage(['/category/ab1d4625aad811dfa7ce001bfc436a55']);
$I->see('Клапаны управления', 'h1');
$I->seeElement('div.category__list');

// Корпуса фильтров
$I->amOnPage(['/category/ab1d461faad811dfa7ce001bfc436a55']);
$I->see('Корпуса фильтров', 'h1');
$I->seeElement('div.category__list');

// Фильтрующие материалы
$I->amOnPage(['/category/a6bc2a0144f511e2b4b6003048ddf04b']);
$I->see('Фильтрующие материалы', 'h1');
$I->seeElement('div.category__list');

// УФ-обеззараживание
$I->amOnPage(['/category/0494b02fae6d11dfa7ce001bfc436a55']);
$I->see('УФ-обеззараживание', 'h1');
$I->seeElement('div.category__list');

// Картриджные фильтры и мембраны
$I->amOnPage(['/category/34a589e5835811e780c60cc47aaa3885']);
$I->see('Картриджные фильтры и мембраны', 'h1');
$I->seeElement('div.category__list');

// Комплектующие к фильтрам
$I->amOnPage(['/category/ab1d461daad811dfa7ce001bfc436a55']);
$I->see('Комплектующие к фильтрам', 'h1');
$I->seeElement('div.category__list');


/* Меню из подвала */
$I->seeLink('О нас');
$I->seeLink('Акции');
$I->seeLink('Статьи');
$I->seeLink('Отзывы');
$I->seeLink('Контакты');

// О нас
$I->amOnPage(['/page/about']);
$I->see('О нас', 'h1');

// Акции
$I->amOnPage(['/page/actions']);
$I->see('Акции', 'h1');

// Статьи
$I->amOnPage(['/article']);
$I->see('Статьи', 'h1');

// Отзывы
$I->amOnPage(['/page/reviews']);
$I->see('Отзывы', 'h1');

// Контакты
$I->amOnPage(['/page/contacts']);
$I->see('Контакты', 'h1');

$I->seeLink('Вопросы-ответы');
$I->seeLink('Доставка и оплата');
$I->seeLink('Стать дилером');
$I->seeLink('Реквизиты');
$I->seeLink('Гарантии');

// Вопросы-ответы
$I->amOnPage(['/page/faq']);
$I->see('Вопрос-ответ', 'h1');

// Доставка и оплата
$I->amOnPage(['/page/delivery-payment']);
$I->see('Доставка и оплата', 'h1');

// Стать дилером
$I->amOnPage(['/page/became-dealer']);
$I->see('Стать дилером', 'h1');

// Реквизиты
$I->amOnPage(['/page/requisites']);
$I->see('Реквизиты', 'h1');

// Гарантии
$I->amOnPage(['/page/guarantee']);
$I->see('Гарантии', 'h1');