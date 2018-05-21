<?php

/**
 * Description of EazyFacebookShortcode
 *
 * @author alexw
 */
class EazyFacebookShortcode extends EazyFacebookSystem {

    /**
     * 
     */
    public function createShortCodes() {
        try {
            if (!shortcode_exists('eazy_facebook')) {
                add_shortcode('eazy_facebook', array($this, 'custom_shortcode'));
            }
        } catch (Exception $ex) {
            if (EAZYLOGDATA) {
                EazyFacebookSystem::Log(__('Ausnahme: ' . $ex->getMessage() . ' Datei: ' . __FILE__ . ' Zeile: ' . __LINE__ . ' Funktion: ' . __FUNCTION__, 'eazy_facebook'));
            }
        }
    }

    /**
     * 
     */
    public function removeShortcodes() {
        try {
            if (shortcode_exists('eazy_facebook')) {
                remove_shortcode('eazy_facebook');
            }
        } catch (Exception $ex) {
            if (EAZYLOGDATA) {
                EazyFacebookSystem::Log(__('Ausnahme: ' . $ex->getMessage() . ' Datei: ' . __FILE__ . ' Zeile: ' . __LINE__ . ' Funktion: ' . __FUNCTION__, 'eazy_facebook'));
            }
        }
    }

    /**
     * 
     */
    public function custom_shortcode() {
        ?>
        <div id="eazy-facebook-register-form" class="eazy-facebook-register-form">
            <input type="hidden" id="eazy-facebook-time" value="<?php echo current_time('timestamp'); ?>">
            <input type="hidden" id="eazy-facebook-action"  value="<?php echo EazyFacebookSystem::getAjaxRequestValue('RegisterNewEmail'); ?>">
            <input id="eazy-facebook-mail-three" class="eazy-facebook-mail-two" type="text" autocomplete="off">
            <input id="eazy-facebook-mail-two" class="eazy-facebook-mail-two" type="email" autocomplete="off">
            <input id="eazy-facebook-mail" class="eazy-facebook-mail" type="email" autocomplete="off" required="true" placeholder="<?php echo __('Ihre E-Mail Adresse...', 'eazy_facebook'); ?>">
            <button id="eazy-facebook-submit-button" class="eazy-facebook-submit-button" value="Eintragen"><?php echo __('Eintragen', 'eazy_facebook'); ?></button>
        </div>
        <div class = "ajax-message" id = "ajax-message">
            <p class = "text"></p>
        </div>
        <div class = "loading-div" id = "loading-div">
            <img src = "<?php echo EazyFacebookSystem::getImageURL('ajax-loader.gif'); ?>" />
        </div>
        <?php
    }

}
