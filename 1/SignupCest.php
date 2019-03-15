<?php

namespace tests\codeception\frontend\acceptance;

use common\models\User;
use common\models\UserProfile;

/**
 * @SuppressWarnings(PHPMD.UnusedFormalParameter)
 * @SuppressWarnings(PHPMD.UnusedLocalVariable)
 */
class SignupCest
{
    private $txn;
    public function _before($event)
    {
        //$this->txn = Yii::$app->db->beginTransaction();
        $this->_after($event);
    }

    public function _after($event)
    {
        //$this->txn->rollback();
        User::deleteAll([
            'email' => 'tester.email@example.com',
        ]);
    }

    public function _fail()
    {
        $this->_after($event);
    }

    /**
     * @param \tests\codeception\frontend\AcceptanceTester $I
     * @param \Codeception\Scenario $scenario
     */
    public function testUserSignup($I, $scenario)
    {
        $I->wantTo('ensure that signup works');

        $I->amOnPage('/');
        $I->click('#modal-your-region button');
        $I->wait(1);
        $I->click('Личный кабинет');
        $I->click('Зарегистрироваться', '#w1');
        $I->wait(1);
        $I->click('Для собственного использования');
        $I->seeInCurrentUrl('/user/sign-in/signup?usage=personal');
        $I->see('Регистрация', 'h1');

        $I->amGoingTo('submit signup form with no data');
        $sigdata = [];

        foreach ($sigdata as $field => $value) {
            $inputType = $field === 'body' ? 'textarea' : 'input';
            $I->fillField($inputType . '[name="SignupForm[' . $field . ']"]', $value);
        }
        $I->click('signup-button');

        $I->expectTo('Видим кучу ошибок валидации');
        $I->see('Необходимо заполнить «Имя».', '.help-block');
        $I->see('Необходимо заполнить «Фамилия».', '.help-block');
        $I->see('Необходимо заполнить «Отчество».', '.help-block');
        $I->see('Необходимо заполнить «E-mail».', '.help-block');
        $I->see('Необходимо заполнить «Пароль».', '.help-block');
        $I->see('Необходимо заполнить «Телефон».', '.help-block');
        //$I->see('Необходимо заполнить «Регион».', '.help-block');
        //$I->see('Необходимо заполнить «Адрес».', '.help-block');
        $I->see('Необходимо заполнить «Проверочный код».', '.help-block');

        $sigdata = [
            'email' => 'tester.email',
            'firstname' => 'Тест',
            'lastname' => 'Тестовый',
            'middlename' => 'Тестович',
            //'address' => 'Урюпинск д.1',
            'phone' => '(123) 456-78-90',
            'password' => 'tester_password',
        ];

        $I->amGoingTo('Отправить форму с неправильным емейлом, без капчи и подтверждения пароля');
        $I->selectOption('form select[name="SignupForm[region_id]"]', 'Москва');

        foreach ($sigdata as $field => $value) {
            $inputType = $field === 'body' ? 'textarea' : 'input';
            $I->fillField($inputType . '[name="SignupForm[' . $field . ']"]', $value);
        }
        $I->click('signup-button');


        $I->expectTo('Видим что ругается на емейл, капчу и подтв.пароля и не ругается на остальное');

        $I->see('Значение «E-mail» не является правильным email адресом.', '.help-block');
        $I->see('Необходимо заполнить «Проверочный код».', '.help-block');
        $I->see('Значение «Подтвердите пароль» должно быть равно «Пароль».', '.help-block');

        $I->dontSee('Необходимо заполнить «Имя».', '.help-block');
        $I->dontSee('Необходимо заполнить «Фамилия».', '.help-block');
        $I->dontSee('Необходимо заполнить «Отчество».', '.help-block');
        $I->dontSee('Необходимо заполнить «Пароль».', '.help-block');
        $I->dontSee('Необходимо заполнить «Телефон».', '.help-block');
        $I->dontSee('Необходимо заполнить «Адрес».', '.help-block');

        $I->amGoingTo('Довводим всё остальное, но вводим неправильную капчу');
        $sigdata['email'] = 'tester.email@example.com';
        $sigdata['password_confirm'] = 'tester_password';
        $sigdata['captcha'] = 'test';

        foreach ($sigdata as $field => $value) {
            $inputType = $field === 'body' ? 'textarea' : 'input';
            $I->fillField($inputType . '[name="SignupForm[' . $field . ']"]', $value);
        }
        $I->click('signup-button');

        $I->expectTo('Видим ошибку капчи');
        $I->see('Неправильный проверочный код.', '.help-block');

        $I->amGoingTo('Введём правильную капчу');
        $sigdata['captcha'] = '42';

        foreach ($sigdata as $field => $value) {
            $inputType = $field === 'body' ? 'textarea' : 'input';
            $I->fillField($inputType . '[name="SignupForm[' . $field . ']"]', $value);
        }
        $I->click('signup-button');

        $I->dontSeeElement('#form-signup .help-block-error');

        $I->expectTo('Попали в личный кабинет');
        $I->seeLink('Информация о клиенте');
        //$I->see('Временный доступ');
        $I->click('Тест Тестовый');
        $I->click('Выйти');
        $I->seeLink('Личный кабинет');
    }
}
