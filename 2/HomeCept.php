<?php
use tests\codeception\frontend\FunctionalTester;

/* @var $scenario Codeception\Scenario */

$I = new FunctionalTester($scenario);
$I->wantTo('ensure that home page works');
$I->amOnPage(Yii::$app->homeUrl);
$I->seeInTitle('Экодар');
$I->seeLink('Каталог товаров');
//$I->click('Контакты');
$I->seeLink('Контакты');
