<?php

use Page\page;
use Step\Acceptance\rfr;

class buchungsassistentCest
{
    public function _before(rfr $I)
    {
        $I->loginAsCodeception();
    }

    // tests
    public function bookSingleRoom(rfr $I, page $page)
    {
        $anlass = 'Codeception';

        $I->click($page::$navigationBuchungsAssistent);
        $I->waitForElement($page::$buchungsAssistentRaumbuchungDeutschlandweit);
        $I->click($page::$buchungsAssistentRaumbuchungDeutschlandweit);

        $weiterButton = 'body > table:nth-child(3) > tbody > tr > td > div > div.ym-grid.ym-equalize > div.ym-gl.ba-middleRight > div > div.ym-grid.ym-equalize.ba-footmenuContainer > table > tbody > tr > td.ba-tdBtnFtLast > input';
        $I->waitForElement($weiterButton);
        $I->click($weiterButton);

        $I->chooseDate();

        $inputTeilnehmer = '#sitzplaetze';
        $I->fillField($inputTeilnehmer, 2);

        $inputVeranstaltungsArt = '#veracolor';
        $I->selectOption($inputVeranstaltungsArt, 3);

        $inputAnlass = '#fb_anlass';
        $I->fillField($inputAnlass, $anlass);

        $kostenStelle = '#kostenstelle';

        $I->fillField($kostenStelle, '08');
        $I->waitForText('0815');
        $I->click('body > ul.ui-autocomplete > li > a > span');

        $classButtonNext = ".btnNext";
        $I->click($classButtonNext);

        $I->waitForText('Termindetails');

        $I->click($classButtonNext);

        $ressourceKategorieGetraenke = "#expandImageKategorie_2";
        $I->click($ressourceKategorieGetraenke);
        $I->wantTo("Have some Cola!!!!");
        $I->waitForText("Cola");
        $checkboxRessourceCola = "#anfVeraCheck_8_3neu";
        $I->click($checkboxRessourceCola);
        $spinnerRessourceCola = "#dyField_8_3neu_anfVera";
        $I->fillField($spinnerRessourceCola, 10);

        $copyButton = "#tr_dyField_8_3neu_2 > img:nth-child(2)";
        $I->click($copyButton);

        $checkboxRessourceColaCopy = "#dyField_8_4neu_anfVera";
        $I->waitForElement($checkboxRessourceColaCopy);
        $I->fillField($checkboxRessourceColaCopy, 5);

        $I->click($classButtonNext);


        $selectorTitleOnConfirmationpage = "div.ym-grid:nth-child(21) > div:nth-child(2)";
        $titleOnPage = $I->grabTextFrom($selectorTitleOnConfirmationpage);
        $I->assertEquals($anlass, $titleOnPage);

        $inputButtonSave =".btnSave";
        $I->click($inputButtonSave);

        $I->wait(5);

    }
}
