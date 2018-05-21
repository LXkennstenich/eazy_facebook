<?php

/**
 * Description of EazyFacebookStyles
 *
 * @author alexw
 */
class EazyFacebookStyles extends EazyFacebookSystem {

    /**
     * 
     */
    public function enqueueStyles() {
        try {
            add_action('wp_enqueue_scripts', array($this, 'eazy_facebook_styles'), 90);
            add_action('admin_enqueue_scripts', array($this, 'eazy_facebook_backend_styles'));
        } catch (Exception $ex) {
            if ($this->getSettings()->getErrorLog() === true) {
                EazyFacebookSystem::Log(__('Ausnahme: ' . $ex->getMessage() . ' Datei: ' . __FILE__ . ' Zeile: ' . __LINE__ . ' Funktion: ' . __FUNCTION__, 'eazy_facebook'));
            }
        }
    }

    /**
     * 
     */
    public function removeStyles() {
        try {
            if (wp_style_is('eazy-facebook-frontend-style', 'enqueued')) {
                wp_dequeue_style('eazy-facebook-frontend-style');
            }

            if (wp_style_is('eazy-facebook-backend-style', 'enqueued')) {
                wp_dequeue_style('eazy-facebook-backend-style');
            }
        } catch (Exception $ex) {
            if ($this->getSettings()->getErrorLog() === true) {
                EazyFacebookSystem::Log(__('Ausnahme: ' . $ex->getMessage() . ' Datei: ' . __FILE__ . ' Zeile: ' . __LINE__ . ' Funktion: ' . __FUNCTION__, 'eazy_facebook'));
            }
        }
    }

    /**
     * 
     */
    public function eazy_facebook_styles() {
        try {
            if (!wp_style_is('eazy-facebook-frontend-style', 'enqueued')) {
                wp_enqueue_style('eazy-facebook-frontend-style', EazyFacebookSystem::eazyFacebookStyleUrl('eazy-facebook-frontend-style.min'));
            }
        } catch (Exception $ex) {
            if ($this->getSettings()->getErrorLog() === true) {
                EazyFacebookSystem::Log(__('Ausnahme: ' . $ex->getMessage() . ' Datei: ' . __FILE__ . ' Zeile: ' . __LINE__ . ' Funktion: ' . __FUNCTION__, 'eazy_facebook'));
            }
        }
    }

    /**
     * 
     */
    public function eazy_facebook_backend_styles() {
        try {
            if (!wp_style_is('eazy-facebook-backend-style', 'enqueued')) {
                wp_enqueue_style('eazy-facebook-backend-style', EazyFacebookSystem::eazyFacebookStyleUrl('eazy-facebook-backend-style.min'));
            }
        } catch (Exception $ex) {
            if ($this->getSettings()->getErrorLog() === true) {
                EazyFacebookSystem::Log(__('Ausnahme: ' . $ex->getMessage() . ' Datei: ' . __FILE__ . ' Zeile: ' . __LINE__ . ' Funktion: ' . __FUNCTION__, 'eazy_facebook'));
            }
        }
    }

}
