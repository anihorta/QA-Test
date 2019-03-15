<?php use tests\codeception\frontend\FunctionalTester;

use common\models\CatalogItem;

$I = new FunctionalTester($scenario);
$I->wantTo('ensure that many pages works');

$I->amGoingTo('Check many product pages');
foreach (CatalogItem::find()->limit(50)->all() as $model) {
    $I->amOnPage($model->url); // Зашли
    $I->seeResponseCodeIs(200); // Код норм
    $I->see($model->name, 'h1'); // Есть заголовок
}