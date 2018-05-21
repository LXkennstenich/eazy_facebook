<?php

/**
 * Description of EazyFacebookAjaxRequests
 *
 * @author alexw
 */
class EazyFacebookAjaxRequests extends EazyFacebookSystem {

    /**
     * Registriert unseren Callback für Frontent und Backend Ajax 
     */
    public function createRequests() {
        try {
            if (!has_action('wp_ajax_eazyFacebookRequests', array($this, 'eazyFacebookRequests'))) {
                add_action('wp_ajax_eazyFacebookRequests', array($this, 'eazyFacebookRequests'));
            }

            if (!has_action('wp_ajax_nopriv_eazyFacebookRequests', array($this, 'eazyFacebookRequests'))) {
                add_action('wp_ajax_nopriv_eazyFacebookRequests', array($this, 'eazyFacebookRequests'));
            }
        } catch (Exception $ex) {
            if (EAZYLOGDATA) {
                EazyFacebookSystem::Log(__('Ausnahme: ' . $ex->getMessage() . ' Datei: ' . __FILE__ . ' Zeile: ' . __LINE__ . ' Funktion: ' . __FUNCTION__, 'eazy_newsletter'));
            }
        }
    }

    /**
     * Bei Deaktivierung müssen unsere Callbacks wieder entfernt werden
     */
    public function removeRequests() {
        try {
            if (has_action('wp_ajax_eazyFacebookRequests', array($this, 'eazyFacebookRequests'))) {
                remove_action('wp_ajax_eazyFacebookRequests', array($this, 'eazyFacebookRequests'));
            }

            if (has_action('wp_ajax_nopriv_eazyFacebookRequests', array($this, 'eazyFacebookRequests'))) {
                remove_action('wp_ajax_nopriv_eazyFacebookRequests', array($this, 'eazyFacebookRequests'));
            }
        } catch (Exception $ex) {
            if (EAZYLOGDATA) {
                EazyFacebookSystem::Log(__('Ausnahme: ' . $ex->getMessage() . ' Datei: ' . __FILE__ . ' Zeile: ' . __LINE__ . ' Funktion: ' . __FUNCTION__, 'eazy_newsletter'));
            }
        }
    }

    /**
     * Unser Ajax-Callback. Hier werden die Controller eingebunden -> je nach angefragter Action
     */
    public function eazyFacebookRequests() {
        try {
            if (isset($_POST['eazy_newsletter_action']) && !empty($_POST['eazy_newsletter_action'])) {
                $actionDecoded = base64_decode($_POST['eazy_newsletter_action']);
                $action = filter_var($actionDecoded, FILTER_SANITIZE_STRING) ? $actionDecoded : null;

                if (EazyFacebookSystem::ajaxControllerExists($action)) {
                    $isAjax = true;
                    $system = new EazyFacebookSystem();
                    include EazyFacebookSystem::getAjaxControllerPath($action);
                }
            }

            wp_die();
        } catch (Exception $ex) {
            if (EAZYLOGDATA) {
                EazyFacebookSystem::Log(__('Ausnahme: ' . $ex->getMessage() . ' Datei: ' . __FILE__ . ' Zeile: ' . __LINE__ . ' Funktion: ' . __FUNCTION__, 'eazy_newsletter'));
            }

            wp_die();
        }
    }

}
