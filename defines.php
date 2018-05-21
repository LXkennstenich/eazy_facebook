<?php

/* -------------------------------------------------------------------------------------- */
/* ------------------------------------- absolute Pfade --------------------------------- */
/* -------------------------------------------------------------------------------------- */

/**
 * Der absolute Root-Path des Plugins
 */
if (!defined('EAZYFACEBOOKROOTDIR')) {
    define('EAZYFACEBOOKROOTDIR', plugin_dir_path(__FILE__));
}

/**
 * Der absolute Pfad zum Image Pfad
 */
if (!defined('EAZYFACEBOOKIMAGESDIR')) {
    define('EAZYFACEBOOKIMAGESDIR', EAZYFACEBOOKROOTDIR . 'Images/');
}

/**
 * Der absolute Pfad zum Styles Pfad
 */
if (!defined('EAZYFACEBOOKSTYLESDIR')) {
    define('EAZYFACEBOOKSTYLESDIR', EAZYFACEBOOKROOTDIR . 'Css/');
}

/**
 * Der absolute Pfad zum Scripts Pfad
 */
if (!defined('EAZYFACEBOOKSCRIPTSDIR')) {
    define('EAZYFACEBOOKSCRIPTSDIR', EAZYFACEBOOKROOTDIR . 'Js/');
}

/**
 * Der absolute Pfad zum Controller Pfad
 */
if (!defined('EAZYFACEBOOKCONTROLLERDIR')) {
    define('EAZYFACEBOOKCONTROLLERDIR', EAZYFACEBOOKROOTDIR . 'Controller/');
}

/**
 * Der absolute Pfad zum Cache Pfad
 */
if (!defined('EAZYFACEBOOKCACHEDIR')) {
    define('EAZYFACEBOOKCACHEDIR', EAZYFACEBOOKROOTDIR . 'temp/cache/');
}

/**
 * Der absolute Pfad zum temp Pfad
 */
if (!defined('EAZYFACEBOOKTEMPDIR')) {
    define('EAZYFACEBOOKTEMPDIR', EAZYFACEBOOKROOTDIR . 'temp/');
}

/**
 * Der absolute Pfad zum Klassen Pfad
 */
if (!defined('EAZYFACEBOOKCLASSESDIR')) {
    define('EAZYFACEBOOKCLASSESDIR', EAZYFACEBOOKROOTDIR . 'Classes/');
}

/**
 * Der absolute Pfad zum View Pfad
 */
if (!defined('EAZYFACEBOOKVIEWDIR')) {
    define('EAZYFACEBOOKVIEWDIR', EAZYFACEBOOKROOTDIR . 'View/');
}

/* -------------------------------------------------------------------------------------- */
/* ------------------------------------- URL -------------------------------------------- */
/* -------------------------------------------------------------------------------------- */

/**
 * Die Root-Url des Plugins
 */
if (!defined('EAZYFACEBOOKROOTURL')) {
    define('EAZYFACEBOOKROOTURL', plugin_dir_url(__FILE__));
}

/**
 * Die URL zum Scripts Pfad
 */
if (!defined('EAZYFACEBOOKSCRIPTSURL')) {
    define('EAZYFACEBOOKSCRIPTSURL', EAZYFACEBOOKROOTURL . 'Js/');
}

/**
 * Die URL zum Styles Pfad
 */
if (!defined('EAZYFACEBOOKSTYLESURL')) {
    define('EAZYFACEBOOKSTYLESURL', EAZYFACEBOOKROOTURL . 'Css/');
}

/**
 * Die URL zum Image Pfad
 */
if (!defined('EAZYFACEBOOKIMAGESURL')) {
    define('EAZYFACEBOOKIMAGESURL', EAZYFACEBOOKROOTURL . 'Images/');
}