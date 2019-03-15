<?php use tests\codeception\frontend\FunctionalTester;

use common\models\Article;

$I = new FunctionalTester($scenario);
$I->wantTo('ensure that many pages works');

$I->amGoingTo('Check all aritcles');
foreach (Article::find()->published()->all() as $model) {
    $I->amOnPage($model->url);
    $I->seeResponseCodeIs(200);
    $I->see($model->title, 'h1');
    $I->seeInSource($model->body);
}