<?php

/**
 * Description of EazyFacebookScripts
 *
 * @author alexw
 */
class EazyFacebookScripts extends EazyFacebookSystem {

    /**
     * 
     */
    public function enqueueScripts() {
        try {
            add_action('wp_enqueue_scripts', array($this, 'eazy_newsletter_scripts'), 90);
            add_action('admin_enqueue_scripts', array($this, 'eazy_newsletter_backend_scripts'));
        } catch (Exception $ex) {
            if (EAZYLOGDATA) {
                EazyFacebookSystem::Log(__('Ausnahme: ' . $ex->getMessage() . ' Datei: ' . __FILE__ . ' Zeile: ' . __LINE__ . ' Funktion: ' . __FUNCTION__, 'eazy_newsletter'));
            }
        }
    }

    /**
     * 
     */
    public function removeScripts() {
        try {
            if (wp_script_is('eazy-newsletter-jquery-js', 'enqueued')) {
                wp_dequeue_script('eazy-newsletter-jquery-js');
            }

            if (wp_script_is('eazy-newsletter-jquery-js', 'enqueued')) {
                wp_dequeue_script('eazy-newsletter-custom-js');
            }
        } catch (Exception $ex) {
            if (EAZYLOGDATA) {
                EazyFacebookSystem::Log(__('Ausnahme: ' . $ex->getMessage() . ' Datei: ' . __FILE__ . ' Zeile: ' . __LINE__ . ' Funktion: ' . __FUNCTION__, 'eazy_newsletter'));
            }
        }
    }

    /**
     * 
     */
    public function eazy_newsletter_scripts() {
        try {
            if (!wp_script_is('eazy-newsletter-jquery-js', 'enqueued')) {
                wp_enqueue_script('eazy-newsletter-jquery-js', EazyFacebookSystem::eazyFacebookScriptUrl('jquery.min'));
            }

            if (!wp_script_is('eazy-newsletter-custom-js', 'enqueued')) {
                wp_enqueue_script('eazy-newsletter-custom-js', EazyFacebookSystem::eazyFacebookScriptUrl('eazy-newsletter-custom-js.min'));
            }

            wp_localize_script('eazy-newsletter-custom-js', 'getAjaxUrl', array('ajaxurl' => admin_url('admin-ajax.php')));
        } catch (Exception $ex) {
            if (EAZYLOGDATA) {
                EazyFacebookSystem::Log(__('Ausnahme: ' . $ex->getMessage() . ' Datei: ' . __FILE__ . ' Zeile: ' . __LINE__ . ' Funktion: ' . __FUNCTION__, 'eazy_newsletter'));
            }
        }
    }

    /**
     * 
     */
    public function eazy_newsletter_backend_scripts() {
        try {
            if (!wp_script_is('eazy-newsletter-backend', 'enqueued')) {
                wp_enqueue_script('eazy-newsletter-backend', EazyFacebookSystem::eazyFacebookScriptUrl('eazy-newsletter-backend.min'));
            }

            wp_localize_script('eazy-newsletter-backend', 'getAjaxUrl', array('ajaxurl' => admin_url('admin-ajax.php')));
        } catch (Exception $ex) {
            if (EAZYLOGDATA) {
                EazyFacebookSystem::Log(__('Ausnahme: ' . $ex->getMessage() . ' Datei: ' . __FILE__ . ' Zeile: ' . __LINE__ . ' Funktion: ' . __FUNCTION__, 'eazy_newsletter'));
            }
        }
    }

}
