<?php
$Web_Cookies = 'userinfo';
$maindomain=".hxiuli.com";
function getCookie($cookieStr) {
    $temCookieStr = "";
    foreach ($_COOKIE as $site => $link) {
        if ($site == $cookieStr) {
            $temCookieStr = $link;
        }
    }
    return $temCookieStr;
}
function getSubCookie($cookieStr, $subCookieStr) {
    if (getCookie($cookieStr) != "") {
        $userinfos = explode("&", getCookie($cookieStr));
        for ($i = 0; $i < count($userinfos); $i++) {
            $strTemArr = explode("=", $userinfos[$i]);
            if ($strTemArr[0] == $subCookieStr) {
                return $strTemArr[1];
            }
        }
    }
    return "";
}
function getUserName() {
    $userName = "";
    if (getSubCookie('userinfo', 'username') != "") {
        $userName = getSubCookie('userinfo', 'username');
    }
    $userName = str_replace('\'', '', $userName);
    return $userName;
}
function getUserID() {
    $UserID = "";
    if (getSubCookie('userinfo', 'userid') != "") {
        $UserID = getSubCookie('userinfo', 'userid');
        if (!is_numeric($UserID)) {
            $UserID = 0;
        }
    }
    return $UserID;
}
?>
