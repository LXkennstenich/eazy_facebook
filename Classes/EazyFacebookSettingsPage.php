<?php

/**
 * Description of SettingsPage
 *
 * @author alexw
 */
class EazyFacebookSettingsPage extends EazyFacebookSystem {

    public function renderPage() {
        try {
            add_action('admin_menu', array($this, 'eazy_facebook_add_admin_menu'));
            add_action('admin_init', array($this, 'eazy_facebook_settings_init'));
        } catch (Exception $ex) {
            if (EAZYLOGDATA) {
                EazyFacebookSystem::Log(__('Ausnahme: ' . $ex->getMessage() . ' Datei: ' . __FILE__ . ' Zeile: ' . __LINE__ . ' Funktion: ' . __FUNCTION__, 'eazy_facebook'));
            }
        }
    }

    public function eazy_facebook_add_admin_menu() {
        try {
            add_options_page('eazy_facebook', 'eazy_facebook', 'manage_options', 'eazy_facebook', array($this, 'eazy_facebook_options_page'));
        } catch (Exception $ex) {
            if (EAZYLOGDATA) {
                EazyFacebookSystem::Log(__('Ausnahme: ' . $ex->getMessage() . ' Datei: ' . __FILE__ . ' Zeile: ' . __LINE__ . ' Funktion: ' . __FUNCTION__, 'eazy_facebook'));
            }
        }
    }

    public function eazy_facebook_settings_init() {
        
    }

    public function eazy_facebook_settings_init() {
        try {
            register_setting('eazy_facebook', 'eazy_facebook_settings');

            add_settings_section('eazy_facebook_general_settings_section', __('Allgemein', 'eazy_facebook'), array($this, 'eazy_facebook_general_settings_section_callback'), 'eazy_facebook');
            add_settings_section('eazy_facebook_share_settings_section', __('Einstellungen für das Teilen von Posts auf Facebook', 'eazy_facebook'), array($this, 'eazy_facebook_share_settings_section_callback'), 'eazy_facebook');
            add_settings_section('eazy_facebook_display_settings_section', __('Einstellungen für das abrufen von Posts von Facebook', 'eazy_facebook'), array($this, 'eazy_facebook_display_settings_section_callback'), 'eazy_facebook');

            /* -------------------------------------------------------------------------------------- */
            /* -------------------------------- General Section ------------------------------------- */
            /* -------------------------------------------------------------------------------------- */

            add_settings_field(
                    'eazy_facebook_app_id', __('Facebook App ID', 'eazy_facebook'), array($this, 'eazy_facebook_app_id_render'), 'eazy_facebook', 'eazy_facebook_general_settings_section'
            );

            add_settings_field(
                    'eazy_facebook_app_secret', __('Facebook App Secret', 'eazy_facebook'), array($this, 'eazy_facebook_app_secret_render'), 'eazy_facebook', 'eazy_facebook_general_settings_section'
            );

            add_settings_field(
                    'eazy_facebook_user_id', __('Facebook UserID', 'eazy_facebook'), array($this, 'eazy_facebook_user_id_render'), 'eazy_facebook', 'eazy_facebook_general_settings_section'
            );

            add_settings_field(
                    'eazy_facebook_auth_token', __('Facebook Benutzer-Token', 'eazy_facebook'), array($this, 'eazy_facebook_auth_token_render'), 'eazy_facebook', 'eazy_facebook_general_settings_section'
            );

            add_settings_field(
                    'eazy_facebook_cache_posts', __('Sollen abgerufene Posts gecached werden?', 'eazy_facebook'), array($this, 'eazy_facebook_cache_posts_render'), 'eazy_facebook', 'eazy_facebook_general_settings_section'
            );

            add_settings_field(
                    'eazy_facebook_download_images', __('Sollen die Bilder von Posts herunterladen werden?', 'eazy_facebook'), array($this, 'eazy_facebook_download_images_render'), 'eazy_facebook', 'eazy_facebook_general_settings_section'
            );

            add_settings_field(
                    'eazy_facebook_cached_posts', __('Momentan im Cache vorhandene Posts:', 'eazy_facebook'), array($this, 'eazy_facebook_cached_posts_render'), 'eazy_facebook', 'eazy_facebook_general_settings_section'
            );

            /* -------------------------------------------------------------------------------------- */
            /* -------------------------------- Share Section --------------------------------------- */
            /* -------------------------------------------------------------------------------------- */

            add_settings_field(
                    'eazy_facebook_share_posts', __('Sollen neue Beiträge auf Facebook geteilt werden?', 'eazy_facebook'), array($this, 'eazy_facebook_share_posts_render'), 'eazy_facebook', 'eazy_facebook_share_settings_section'
            );

            add_settings_field(
                    'eazy_facebook_share_posts_automatic', __('Sollen bestimmte Beiträge automatisch geteilt werden?', 'eazy_facebook'), array($this, 'eazy_facebook_share_posts_render'), 'eazy_facebook', 'eazy_facebook_share_settings_section'
            );

            add_settings_field(
                    'eazy_facebook_share_posts_automatic_time', __('Zu welcher Uhrzeit sollen die Beiträge automatisch geteilt werden?', 'eazy_facebook'), array($this, 'eazy_facebook_share_posts_render'), 'eazy_facebook', 'eazy_facebook_share_settings_section'
            );

            /* -------------------------------------------------------------------------------------- */
            /* -------------------------------- Display Section ------------------------------------- */
            /* -------------------------------------------------------------------------------------- */

            add_settings_field(
                    'eazy_facebook_get_posts', __('Posts von Facebook abrufen?', 'eazy_facebook'), array($this, 'eazy_facebook_get_posts_render'), 'eazy_facebook', 'eazy_facebook_display_settings_section'
            );

            add_settings_field(
                    'eazy_facebook_last_post_check', __('Letzte Überprüfung: ', 'eazy_facebook'), array($this, 'eazy_facebook_last_post_check_render'), 'eazy_facebook', 'eazy_facebook_display_settings_section'
            );

            add_settings_field(
                    'eazy_facebook_last_post_check_succeeded', __('Fehler bei der letzten Überprüfung:', 'eazy_facebook'), array($this, 'eazy_facebook_last_post_check_succeeded_render'), 'eazy_facebook', 'eazy_facebook_display_settings_section'
            );
        } catch (Exception $ex) {
            if (EAZYLOGDATA) {
                EazyFacebookSystem::Log(__('Ausnahme: ' . $ex->getMessage() . ' Datei: ' . __FILE__ . ' Zeile: ' . __LINE__ . ' Funktion: ' . __FUNCTION__, 'eazy_facebook'));
            }
        }
    }

    /**
     * 
     */
    public function eazy_facebook_general_settings_section_callback() {

        echo __('Allgemeine Einstellungen', 'eazy_facebook');
        ?> 

        <?php
    }

    /**
     * 
     */
    public function eazy_facebook_share_settings_section_callback() {

        echo __('Einstellungen für das teilen von Beiträgen auf Facebook', 'eazy_facebook');
        ?> 

        <?php
    }

    /**
     * 
     */
    public function eazy_facebook_display_settings_section_callback() {

        echo __('Einstellungen für das abrufen von Posts von Facebook', 'eazy_facebook');
        ?> 

        <?php
    }

    /**
     * 
     */
    public function eazy_facebook_options_page() {
        ?>
        <div id="eazy_facebook_settings_form" class="eazy_facebook_settings_form">
            <h2>Eazy Newsletter</h2>
            <input type="hidden" id="eazy-newsletter-action"  value="<?php echo EazyFacebookSystem::getAjaxRequestValue('SaveSettings'); ?>">
            <?php
            settings_fields('eazy_facebook');
            do_settings_sections('eazy_facebook');
            ?>
        </div>
        <input type="button" id="save-eazy-newsletter-settings-button" value="<?php echo __('Einstellungen speichern', 'eazy_facebook'); ?>">
        <div class="ajax-message" id="ajax-message">
            <p class="text"></p>
        </div>
        <div class="loading-div" id="loading-div">
            <img src="<?php echo EazyFacebookSystem::getImageURL('ajax-loader.gif'); ?>"/>
        </div>
        <?php
    }

}
