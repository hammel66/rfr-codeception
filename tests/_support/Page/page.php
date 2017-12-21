<?php
namespace Page;

class page
{
    public static $startPageImageLoader = '#inav2_gui_lock';

    // include url of current page
    public static $loginUsername = '#user';
    public static $loginPassword = 'body > table:nth-child(3) > tbody > tr > td > form > table > tbody > tr:nth-child(2) > td.ctbr.cbody > table > tbody > tr:nth-child(2) > td:nth-child(2) > input';
    public static $loginLink = '#testCSS > span > a';
    public static $loginButton = 'body > table:nth-child(3) > tbody > tr > td > form > table > tbody > tr:nth-child(3) > td.ctbr.cfoot > input';

    public static $navigationBuchungsAssistent = '#navigation > tbody > tr:nth-child(4) > td.topnav > a.cnavTabAct';

    public static $buchungsAssistentRaumbuchungDeutschlandweit = 'body > table:nth-child(3) > tbody > tr > td > div > div.ym-grid.ym-equalize > div.ym-gl.ba-middleRight > div > div:nth-child(3) > div.ym-gl.ba-sceneTitle';

}
