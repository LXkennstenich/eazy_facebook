<?php

/**
 * Description of System
 *
 * @author alexw
 */
class EazyFacebookSystem {

    /**
     *
     * @var EazyFacebookSettings
     */
    var $settings;

    /**
     * 
     */
    function __construct() {
        $this->setSettings(EazyFacebookSettings::getInstance());
    }

    /**
     * 
     * @param EazyFacebookSettings $settings
     */
    private function setSettings($settings) {
        $this->settings = $settings;
    }

    /**
     * 
     * @return EazyFacebookSettings
     */
    public function getSettings() {
        return $this->settings;
    }

    /**
     * Fügt dem Debug-Log Daten hinzu. Gibt True zurück wenn die Daten erfolgreich in die Datei geschrieben wurden.
     * Andernfalls false.
     * @param string $data
     * @return boolean
     */
    public static function Log($data) {
        try {
            $file = EAZYFACEBOOKROOTDIR . 'temp/log.txt';

            $logData = '';

            $logData .= '********************************************************************************************************' . "\n";
            $logData .= '********************************************************************************************************' . "\n";
            $logData .= '********************************************************************************************************';
            $logData .= "\n";
            $logData .= "\n";

            $logData .= '[***UHRZEIT:*** ' . date('d-m-Y H:i:s', current_time('timestamp')) . ' *** ' . $data;

            $logData .= "\n";
            $logData .= "\n";
            $logData .= '********************************************************************************************************' . "\n";
            $logData .= '********************************************************************************************************' . "\n";
            $logData .= '********************************************************************************************************';
            $logData .= "\n";
            $logData .= "\n";
            $logData .= "\n";

            $writeLog = file_put_contents($file, $logData, FILE_APPEND);

            if ($writeLog === false) {
                return false;
            }

            return true;
        } catch (Exception $ex) {
            if ($this->getSettings()->getErrorLog === true) {
                self::Log(__('Ausnahme: ' . $ex->getMessage() . ' Datei: ' . __FILE__ . ' Zeile: ' . __LINE__ . ' Funktion: ' . __FUNCTION__, 'eazy_newsletter'));
            }
        }
    }

    /**
     * Ermittelt den Pfad für eine angefragte "View" Datei des Plugins. Ist die datei vorhanden wird der absolute pfad zurückgegeben andernfalls NULL.
     * @param string $file
     * @return string
     */
    public static function getViewPath($file) {
        try {
            $fullFilePath = EAZYFACEBOOKVIEWDIR . $file . '.php';

            if (file_exists($fullFilePath)) {
                return $fullFilePath;
            }

            return null;
        } catch (Exception $ex) {
            if ($this->getSettings()->getErrorLog === true) {
                self::Log(__('Ausnahme: ' . $ex->getMessage() . ' Datei: ' . __FILE__ . ' Zeile: ' . __LINE__ . ' Funktion: ' . __FUNCTION__, 'eazy_newsletter'));
            }
        }
    }

    /**
     * Ermittelt die Url für eine JavaScript-Datei. Existiert die Datei wird die entsprechende Url zurückgegeben andernfalls NULL.
     * @param string $file
     * @return string
     */
    public static function eazyFacebookScriptURL($file) {
        try {
            $scriptPath = EAZYFACEBOOKSCRIPTSDIR . $file . '.js';
            $scriptURL = EAZYFACEBOOKSCRIPTSURL . $file . '.js';

            if (file_exists($scriptPath)) {
                return $scriptURL;
            }

            return null;
        } catch (Exception $ex) {
            if ($this->getSettings()->getErrorLog === true) {
                self::Log(__('Ausnahme: ' . $ex->getMessage() . ' Datei: ' . __FILE__ . ' Zeile: ' . __LINE__ . ' Funktion: ' . __FUNCTION__, 'eazy_newsletter'));
            }
        }
    }

    /**
     * Ermittelt die Url für eine CSS-Datei. Existiert die Datei wird die entsprechende Url zurückgegeben andernfalls NULL.
     * @param string $file
     * @return string
     */
    public static function eazyFacebookStyleURL($file) {
        try {
            $scriptPath = EAZYFACEBOOKSTYLESDIR . $file . '.css';
            $scriptURL = EAZYFACEBOOKSTYLESURL . $file . '.css';

            if (file_exists($scriptPath)) {
                return $scriptURL;
            }

            return null;
        } catch (Exception $ex) {
            if ($this->getSettings()->getErrorLog === true) {
                self::Log(__('Ausnahme: ' . $ex->getMessage() . ' Datei: ' . __FILE__ . ' Zeile: ' . __LINE__ . ' Funktion: ' . __FUNCTION__, 'eazy_newsletter'));
            }
        }
    }

    /**
     * Ermittelt den Controller-Pfad für einen angefragten Ajax-Controller. 
     * Existiert die Datei wird der entsprechende Pfad zurück gegeben andernfalls NULL.
     * @param string $action
     * @return string
     */
    public static function getAjaxControllerPath($action) {
        try {
            $requestedControllerPath = EAZYFACEBOOKCONTROLLERDIR . $action . 'Controller.php';

            if (file_exists($requestedControllerPath)) {
                return $requestedControllerPath;
            }

            return null;
        } catch (Exception $ex) {
            if ($this->getSettings()->getErrorLog === true) {
                self::Log(__('Ausnahme: ' . $ex->getMessage() . ' Datei: ' . __FILE__ . ' Zeile: ' . __LINE__ . ' Funktion: ' . __FUNCTION__, 'eazy_newsletter'));
            }
        }
    }

    /**
     * Überprüft ob ein Ajax-Controller existiert. Wenn ja wird TRUE zurückgegeben andernfalls FALSE.
     * @param string $action
     * @return boolean
     */
    public static function ajaxControllerExists($action) {
        try {
            $requestedControllerPath = EAZYFACEBOOKCONTROLLERDIR . $action . 'Controller.php';

            if (file_exists($requestedControllerPath)) {
                return true;
            }

            return false;
        } catch (Exception $ex) {
            if ($this->getSettings()->getErrorLog === true) {
                self::Log(__('Ausnahme: ' . $ex->getMessage() . ' Datei: ' . __FILE__ . ' Zeile: ' . __LINE__ . ' Funktion: ' . __FUNCTION__, 'eazy_newsletter'));
            }
        }
    }

    public static function getAjaxRequestValue($action) {
        try {
            return base64_encode($action);
        } catch (Exception $ex) {
            if ($this->getSettings()->getErrorLog === true) {
                self::Log(__('Ausnahme: ' . $ex->getMessage() . ' Datei: ' . __FILE__ . ' Zeile: ' . __LINE__ . ' Funktion: ' . __FUNCTION__, 'eazy_newsletter'));
            }
        }
    }

    public static function getImageURL($imageName) {
        try {
            $imagePath = EAZYFACEBOOKIMAGESDIR . $imageName;
            $imageURL = EAZYFACEBOOKIMAGESURL . $imageName;

            if (file_exists($imagePath)) {
                return $imageURL;
            }
        } catch (Exception $ex) {
            if ($this->getSettings()->getErrorLog === true) {
                self::Log(__('Ausnahme: ' . $ex->getMessage() . ' Datei: ' . __FILE__ . ' Zeile: ' . __LINE__ . ' Funktion: ' . __FUNCTION__, 'eazy_newsletter'));
            }
        }
    }

}
