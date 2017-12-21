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

        $inputWeiter = '#dateDataForm > div > div.ym-gl.ba-middleRight > div > div.ym-grid.ba-CategoryContainer > div.ym-grid.ym-equalize.ba-footmenuContainer > table > tbody > tr > td.ba-tdBtnFtLast > input';
        $I->click($inputWeiter);

        $I->waitForText('Termindetails');

    }
}
