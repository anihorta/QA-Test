<?php
namespace tests\codeception\frontend;

use common\models\CatalogCategory;

/**
 * Inherited Methods
 * @method void wantToTest($text)
 * @method void wantTo($text)
 * @method void execute($callable)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
 * @method \Codeception\Lib\Friend haveFriend($name, $actorClass = null)
 *
 * @SuppressWarnings(PHPMD)
 */
class AcceptanceTester extends \Codeception\Actor
{
    use _generated\AcceptanceTesterActions;

    /**
     * Define custom actions here
     */
    public function see($text, $selector = null)
    {
        return $this->seeAndHighlight($text, $selector);
    }

    public function seeLink($text, $url = null)
    {
        return $this->seeLinkAndHighlight($text, $url);
    }


    /**
     * @Given зашли на домашнюю страницу
     */
    public function amAtHome()
    {
        $I = $this;
        $I->amOnPage('/');
    }

    /**
     * @Then высветился запрос по регионам
     */
    public function seeRegionPopup(bool $yes = true)
    {
        $I = $this;
        //$I->wait(1);
        $I->seeElement('#modal-your-region');
    }

    /**
     * @Then /(?:увидели|видно|присутствует|будет присутствовать) ссылк(?:у|а) "(.+)"/
     * @Then видно меню :arg1
     */
    public function seeOneLink($link)
    {
        $this->seeLink($link);
    }

    /**
     * @Then /(?:увидели|видно|присутствуют|будут присутствовать) ссылки (.+)/
     */
    public function seeLinks($links)
    {
        $I = $this;
        $links = preg_split('/ [,;] /', $links);
        foreach ($links as $arg) {
            $text = trim(trim($arg), "'");
            $I->seeLink($text);
        }
    }

    /**
     * @Then увидели заголовок :arg1
     */
     public function seeTitle($arg1)
     {
         $this->seeInTitle($arg1);
     }

    /**
     * @Then в URL содержится :arg1
     */
     public function uRL($arg1)
     {
         $this->seeInCurrentUrl($arg1);
     }

    /**
     * @Given кликнуть
     */
     public function clickOnly()
     {
         $this->clickWithLeftButton(null, 0, 0);
     }

    /**
     * @Given /(?:нажимаю|нажимаем|кликнуть)(?: на|) (ссылку |кнопку |)"(.+)"(?: в | |)(.*)/
     */
     public function clickOn($what, $name, $context)
     {
     //    $context = ['ссылку ' => 'a', 'кнопку ' => 'button', '' => null];
         // $this->click($arg2, $context[$arg1]);
         $locator = strpos($what, 'ссыл')===0 ? ['link'=>$name] : $name;
         $this->click($locator, $context);
         //$this->wait(1);
     }

    /**
     * @Given навести на :arg1 курсор
     * @Given навести курсор на :arg1
     */
     public function moveCursorOn($arg1)
     {
         $this->moveMouseOver(['link'=>$arg1]);
     }

    /**
     * @Then /откроется (?:еще |)подменю/
     */
     public function seeSubmenu()
     {
         //$this->seeElement('nav .nav-cat__full.active');
         $this->wait(2);
         $this->seeElement('.nav-cat__full');
     }

    /**
     * @Then видно блок :arg1
     * @Then загрузится страница с заголовком :arg1
     */
     public function seeBlock($arg1)
     {
         $this->see($arg1, 'div.container h1,h2,h3');
     }

    /**
     * @Then видно слайдер
     */
     public function seeSlider()
     {
         $this->seeElement('.slider');
     }

    /**
     * @Given найти в каталоге :arg1
     */
     public function step_93b1989c9($arg1)
     {
         $breadcrumbs = CatalogCategory::findOne(['name'=>$arg1])->breadcrumbs();
         $this->click(['link'=>'Каталог товаров']);
         foreach ($breadcrumbs as $crumb) {
            $link = is_array($crumb) ? $crumb['label'] : $crumb;
            $this->moveMouseOver(['link'=>$link]);
         }
     }


}
