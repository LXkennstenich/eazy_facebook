<?php

/* @var $system EazyFacebookSystem  */
/* @var $facebook EazyFacebook  */
/* @var $settingsPage EazyFacebookSettingsPage  */
/* @var $ajaxRequest EazyFacebookAjaxRequests  */
/* @var $scripts EazyFacebookScripts  */
/* @var $styles EazyFacebookStyles  */
/* @var $shortcode EazyFacebookShortcode  */

$system = new EazyFacebookSystem();
$facebook = new EazyFacebook();
$settingsPage = new EazyFacebookSettingsPage();
$ajaxRequest = new EazyFacebookAjaxRequests();
$scripts = new EazyFacebookScripts();
$styles = new EazyFacebookStyles();
$shortcode = new EazyFacebookShortcode();

$ajaxRequest->createRequests();
$scripts->enqueueScripts();
$styles->enqueueStyles();
$shortcode->createShortCodes();
$settingsPage->renderPage();
