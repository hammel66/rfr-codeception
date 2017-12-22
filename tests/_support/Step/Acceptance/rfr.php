<?php
namespace Step\Acceptance;

use Page\page;

class rfr extends \AcceptanceTester
{

    public function loginAsCodeception()
    {
        $this->login("codeception", "codeception");
    }

    public function login($username, $password)
    {
        $page = page::class;
        $I = $this;

        $userInput = $page::$loginUsername;
        $passwordInput = $page::$loginPassword;

        $I->amOnPage('/');
        $I->waitForElement($page::$loginLink);
        $I->waitForElementNotVisible($page::$startPageImageLoader);
        $I->click($page::$loginLink);

        $I->waitForElement($userInput);
        $I->fillField($userInput, $username);
        $I->fillField($passwordInput, $password);
        $I->click($page::$loginButton);
        $I->waitForText('Logout');

        $optionalButton = '.button';

        try {
            $I->seeElement($optionalButton);

            $I->click($optionalButton);
        } catch (\PHPUnit_Framework_Exception $e) {

        }
    }
    public function logout()
    {
        $I = $this;

        $I->see("Logout");
        $I->click("Logout");
    }

    public function chooseDate()
    {
        $I = $this;
        $I->click('#datum_termin');

        $I->waitForElement('#ui-datepicker-div');
        $I->selectOption(["xpath"=>"//select[@class='ui-datepicker-year']"], 2018);
        $I->selectOption(["xpath"=>"//select[@class='ui-datepicker-month']"], ["value" => 0]);
        $I->click(['link' => '8']);
    }

}