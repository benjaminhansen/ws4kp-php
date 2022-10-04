﻿<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />

    <title>WeatherStar 4000+</title>
    <meta name="description" content="Web based WeatherStar 4000 simulator that reports current and forecast weather conditions plus a few extras!" />
    <meta name="keywords" content="WeatherStar 4000+" />
    <meta name="author" content="Michael Battaglia" />
    <meta name="copyright" content="2016-2017" />
    <meta name="application-name" content="WeatherStar 4000+" />

    <meta property="og:title" content="WeatherStar 4000+" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="http://battaglia.ddns.net/twc/images/logo200.png" />
    <meta property="og:url" content="http://battaglia.ddns.net/twc/index.html" />
    <meta property="og:description" content="Web based WeatherStar 4000 simulator that reports current and forecast weather conditions plus a few extras!" />

    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="WeatherStar 4000+" />
    <meta name="twitter:description" content="Web based WeatherStar 4000 simulator that reports current and forecast weather conditions plus a few extras!" />
    <meta name="twitter:image" content="http://battaglia.ddns.net/twc/images/logo200.png" />

    <meta name="viewport" content="width=660,user-scalable=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
    <meta name="theme-color" content="#ffffff">

    <link rel="manifest" href="manifest.json?v=68" />
    <link rel="icon" href="images/logo192.png" />
    <link rel="stylesheet" type="text/css" href="styles/index.css?v=68" />

    <script type="text/javascript" src="scripts/jquery-3.1.0.min.js"></script>
    <script type="text/javascript" src="scripts/jquery.autocomplete.min.js"></script>
    <script type="text/javascript" src="scripts/NoSleep.min.js"></script>
    <script type="text/javascript" src="scripts/jquery.touchSwipe.min.js"></script>
    <script type="text/javascript" src="scripts/Timer.js?v=68"></script>
    <script type="text/javascript" src="scripts/index.js?v=68"></script>
    <script type="text/javascript" src="scripts/States.js?v=68"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</head>
<body>

    <!--<a href="https://github.com/vbguyny/ws4kp"><img style="position: absolute; top: 0; right: 0; border: 0;" src="https://camo.githubusercontent.com/38ef81f8aca64bb9a64448d0d70f1308ef5341ab/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f72696768745f6461726b626c75655f3132313632312e706e67" alt="Fork me on GitHub" data-canonical-src="https://s3.amazonaws.com/github/ribbons/forkme_right_darkblue_121621.png"></a>-->

    <div id="divQuery">
        <form id="frmGetLatLng">
            <input id="txtAddress" type="text" value="<?php echo $_GET['location']; ?>" placeholder="Zip or City, State" /><button id="btnGetGps" type="button" title="Get GPS Location"><img id="imgGetGps" src="images/nav/gps_fixed_black_24dp.svg" /></button>
            <input id="btnGetLatLng" type="submit" value="GO" />
            <input id="btnClearQuery" type="reset" value="Reset" />
        </form>
        <div id="divLat"></div>
        <div id="divLng"></div>
    </div>

    <br />

    <!-- This will force the browser to download the font before the canvas is rendered. -->
    <!--<div id="Star4000LargeCompressedNumbers">123 This is a test</div>-->
    <img id="imgPause1x" src="images/nav/ic_pause_white_24dp_1x.png" />
    <img id="imgPause2x" src="images/nav/ic_pause_white_24dp_2x.png" />

    <div id="divTwc">
        <div id="divTwcTop"></div>
        <div id="divTwcMiddle">
            <div id="divTwcLeft">
                <div>
                    <div>
                        <a id="aMenuLeft" href="#" class="NavigateMenu"><img src="images/nav/ic_menu_white_24dp_2x.png" title="Menu" /></a>
                    </div>
                </div>
                <div>
                    <div>
                        <a id="aPreviousLeft" href="#" class="NavigatePrevious"><img src="images/nav/ic_skip_previous_white_24dp_2x.png" title="Previous" /></a>
                    </div>
                </div>
                <div>
                    <div>
                        <a id="aNextLeft" href="#" class="NavigateNext"><img src="images/nav/ic_skip_next_white_24dp_2x.png" title="Next" /></a>
                    </div>
                </div>
                <div>
                    <div>
                        <a id="aPlayLeft" href="#" class="NavigatePlay"><img src="images/nav/ic_play_arrow_white_24dp_2x.png" title="Play" /></a>
                    </div>
                </div>
            </div>
            <iframe id="iframeTwc"></iframe>
            <div id="divTwcRight">
                <div>
                    <div>
                        <a id="aRefreshRight" href="#" class="NavigateRefresh"><img src="images/nav/ic_refresh_white_24dp_2x.png" title="Refresh" /></a>
                    </div>
                </div>
                <div>
                    <div>
                        <a id="aVolumeRight" href="#" class="ToggleVolume"><img src="images/nav/ic_volume_off_white_24dp_2x.png" title="Mute" /></a>
                    </div>
                </div>
                <div>
                    <div>
                        <a id="aNarrationRight" href="#" class="ToggleNarration"><img src="images/nav/ic_no_hearing_white_24dp_2x.png" title="Turn on Narration" /></a>
                    </div>
                </div>
                <div>
                    <div>
                        <a id="aFullScreenRight" href="#" class="ToggleFullScreen"><img src="images/nav/ic_fullscreen_exit_white_24dp_2x.png" title="Exit Fullscreen" /></a>
                    </div>
                </div>
            </div>
        </div>
        <div id="divTwcBottom">
            <!--Bottom <a id="aFullScreenBottom" href="#" class="ToggleFullScreen"><img src="images/nav/ic_fullscreen_exit_white_24dp_2x.png" title="Exit Fullscreen" /></a>-->
            <div id="divTwcBottomLeft">
                <a id="aMenuBottom" href="#" class="NavigateMenu"><img src="images/nav/ic_menu_white_24dp_1x.png" title="Menu" /></a>
                <a id="aPreviousBottom" href="#" class="NavigatePrevious"><img src="images/nav/ic_skip_previous_white_24dp_1x.png" title="Previous" /></a>
                <a id="aNextBottom" href="#" class="NavigateNext"><img src="images/nav/ic_skip_next_white_24dp_1x.png" title="Next" /></a>
                <a id="aPlayBottom" href="#" class="NavigatePlay"><img src="images/nav/ic_play_arrow_white_24dp_1x.png" title="Play" /></a>
            </div>
            <div id="divTwcBottomMiddle">
                <a id="aRefreshBottom" href="#" class="NavigateRefresh"><img src="images/nav/ic_refresh_white_24dp_1x.png" title="Refresh" /></a>
            </div>
            <div id="divTwcBottomRight">
                <a id="aVolumeBottom" href="#" class="ToggleVolume"><img src="images/nav/ic_volume_off_white_24dp_1x.png" title="Mute" /></a>
                <a id="aNarrationBottom" href="#" class="ToggleNarration"><img src="images/nav/ic_no_hearing_white_24dp_1x.png" title="Turn on Narration" /></a>
                <a id="aFullScreenBottom" href="#" class="ToggleFullScreen"><img src="images/nav/ic_fullscreen_exit_white_24dp_1x.png" title="Exit Fullscreen" /></a>
            </div>
        </div>
    </div>
    <div id="divTwcNavContainer">
        <div id="divTwcNav">
            <div id="divTwcNavLeft">
                <a id="aMenu" href="#" class="NavigateMenu"><img src="images/nav/ic_menu_white_24dp_1x.png" title="Menu" /></a>
                <a id="aPrevious" href="#" class="NavigatePrevious"><img src="images/nav/ic_skip_previous_white_24dp_1x.png" title="Previous" /></a>
                <a id="aNext" href="#" class="NavigateNext"><img src="images/nav/ic_skip_next_white_24dp_1x.png" title="Next" /></a>
                <a id="aPlay" href="#" class="NavigatePlay"><img src="images/nav/ic_play_arrow_white_24dp_1x.png" title="Play" /></a>
            </div>
            <div id="divTwcNavMiddle">
                <a id="aRefresh" href="#" class="NavigateRefresh"><img src="images/nav/ic_refresh_white_24dp_1x.png" title="Refresh" /></a>
            </div>
            <div id="divTwcNavRight">
                <a id="aVolume" href="#" class="ToggleVolume"><img src="images/nav/ic_volume_off_white_24dp_1x.png" title="Mute" /></a>
                <!--<a id="aVolume" href="#" class="ToggleVolume"><img src="images/nav/ic_volume_off_white_24dp_1x.png" title="Mute Volume" /></a>-->
                <a id="aNarration" href="#" class="ToggleNarration"><img src="images/nav/ic_no_hearing_white_24dp_1x.png" title="Turn on Narration" /></a>
                <a id="aFullScreen" href="#" class="ToggleFullScreen"><img src="images/nav/ic_fullscreen_white_24dp_1x.png" title="Fullscreen" /></a>
            </div>
        </div>
    </div>

    <br />

    <!-- <div id="divGitHub"> -->
        <!--<a class="github-button" href="https://github.com/vbguyny/ws4kp" data-style="large" data-count-href="/vbguyny/ws4kp/network" data-count-api="/repos/vbguyny/ws4kp#forks_count" data-count-aria-label="# forks on GitHub" aria-label="Fork vbguyny/ws4kp on GitHub">GitHub</a>-->
        <!-- <a class="github-button" href="https://github.com/vbguyny/ws4kp" data-icon="" data-size="large" data-show-count="false" aria-label="GitHub">GitHub</a>
        <a class="github-button" href="https://github.com/vbguyny/ws4kp" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star vbguyny/ws4kp on GitHub">Star</a>
        <a class="github-button" href="https://github.com/vbguyny/ws4kp/fork" data-icon="octicon-repo-forked" data-size="large" data-show-count="true" aria-label="Fork vbguyny/ws4kp on GitHub">Fork</a>        <a class="github-button" href="https://github.com/vbguyny/ws4kp/issues" data-icon="octicon-issue-opened" data-size="large" aria-label="Issue vbguyny/ws4kp on GitHub">Issue</a>
        <a class="github-button" href="https://github.com/vbguyny" data-size="large" aria-label="Follow @vbguyny on GitHub">Follow @vbguyny</a>
    </div> -->

    <!-- <br /> -->

    <div id="divInfo">
        <span id="spanLocation">
            Location: <span id="spanCity"></span> <span id="spanState"></span>
        </span>
        <span id="spanStation">
            Station Id: <span id="spanStationId"></span>
        </span>
        <br />
        <span id="spanRadar">
            Radar Id: <span id="spanRadarId"></span>
        </span>
        <span id="spanZone">
            Zone Id: <span id="spanZoneId"></span>
        </span>
        <br />
    </div>

    <br />

    <div id="divRefresh">
        <span id="spanLastUpdate">
            Last Update: <span id="spanLastRefresh">(None)</span>
        </span>
        <span id="spanAutoRefresh">
            <input id="chkAutoRefresh" name="chkAutoRefresh" type="checkbox" /><label id="lblRefreshCountDown" for="chkAutoRefresh">Auto Refresh: <span id="spanRefreshCountDown">--:--</span></label>
        </span>
        <br />
    </div>

    <br />

    <div id="divUnits">
        <span id="spanUnits">Units:</span>
        <input id="radEnglish" name="radUnits" type="radio" value="ENGLISH" /><label for="radEnglish">English</label>
        <input id="radMetric" name="radUnits" type="radio" value="METRIC" /><label for="radMetric">Metric</label>
    </div>

    <br />

    <div id="divThemes">
        <span id="spanThemes">Themes:</span>
        <input id="radThemeA" name="radThemes" type="radio" value="THEMEA" /><label for="radThemeA">Classic</label>
        <input id="radThemeD" name="radThemes" type="radio" value="THEMED" /><label for="radThemeD">Dark</label>
        <input id="radThemeB" name="radThemes" type="radio" value="THEMEB" /><label for="radThemeB">Sea Foam</label>
        <input id="radThemeC" name="radThemes" type="radio" value="THEMEC" /><label for="radThemeC">Cosmic</label>
    </div>

    <br />

    <div id="divScrollText">
        <!--<form id="frmScrollText">
            <input id="chkScrollText" name="chkScrollText" type="checkbox" /><label id="lblScrollText" for="chkScrollText">Scroll Text: </label><input id="txtScrollText" type="text" autocomplete="off" value="" /><input id="btnScrollText" type="submit" value="Set" />
        </form>-->
        Scroll Options:<br />
        <input id="radScrollDefault" name="radScroll" type="radio" /><label id="lblScrollDefault" for="radScrollDefault">Current Conditions</label><br />
        <input id="radScrollText" name="radScroll" type="radio" /><label id="lblScrollText" for="radScrollText">Custom Text: </label>
        <form id="frmScrollText">
            <input id="txtScrollText" type="text" autocomplete="off" value="" /><input id="btnScrollText" type="submit" value="Set" />
        </form><br />
        <input id="radScrollRss" name="radScroll" type="radio" /><label id="lblScrollRss" for="radScrollRss">RSS Feed: </label>
        <form id="frmScrollRss">
            <input id="txtScrollRss" type="text" autocomplete="off" value="" /><input id="btnScrollRss" type="submit" value="Set" />
        </form><br />
        <input id="chkScrollHazardText" name="chkScrollHazardText" type="checkbox" /><label id="lblScrollHazardText" for="chkScrollHazardText">Hazardous Weather</label>
    </div>

    <script>
        $(document).ready(function(){
            $("#aVolume").click();
            $("#aFullScreen").click();
        });
    </script>

</body>
</html>
