<?php
use tests\codeception\frontend\AcceptanceTester;

/* @var $scenario Codeception\Scenario */

$I = new AcceptanceTester($scenario);
$I->wantTo('ensure that home page works');
$I->amOnPage('/');
$I->click('#modal-your-region button');
$I->wait(1);
$I->seeInTitle(Yii::$app->name);
$I->seeLink('Доставка и оплата');
$I->seeLink('Каталог товаров');
$I->seeLink('Контакты');

$I->click('Личный кабинет');

// try to login from home
$I->fillField('input[name="LoginForm[identity]"]', 'webmaster');
$I->fillField('input[name="LoginForm[password]"]', 'webmaster');

$I->click('Войти', '#w1');
$I->wait(1);
$I->seeInCurrentUrl('login');
$I->see('Неправильный логин или пароль', '.help-block');
//$I->seeLink('Информация о дилере');
//$I->seeLink('Выйти');
