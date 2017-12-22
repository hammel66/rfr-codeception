<?php

use Page\page;
use Step\Acceptance\rfr;

class rollenRechteCest
{
    // tests
    public function checkCantSeeBookassistant(rfr $I)
    {
        $I->login("codeminus", "codeminus");

        $I->see("Raumsuche");
        $I->cantSee("Buchungsassistent");

        $I->logout();
        $I->wait(5);
    }

    public function checkCanSee(rfr $I) {
        $I->login("codeagm", "codeagm");

        $I->see("Bestellungen");
        $I->logout();
        $I->wait(5);
    }

    public function checkManager(rfr $I){
        $I->login("codeception", "codeception");

        $I->see("Termine");
        $I->cantSee("Löschanfragen");
        $I->moveMouseOver("a.hasTp:nth-child(1)");
        $I->wait(1);
        $I->see("Löschanfragen");
        $I->logout();


    }




}
