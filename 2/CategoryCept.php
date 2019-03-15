<?php use tests\codeception\frontend\FunctionalTester;

use common\models\CatalogCategory;

$I = new FunctionalTester($scenario);
$I->wantTo('ensure that many pages works');

$I->amGoingTo('Check many category pages');
foreach (CatalogCategory::find()->all() as $model) {
    $I->amOnPage($model->url); // Зашли
    $I->seeResponseCodeIs(200); // Код норм
    $I->see($model->name, 'h1'); // Есть заголовок
    //$model->description and $I->seeInSource($model->description); // Есть описание
}