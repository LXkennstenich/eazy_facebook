<?php

/**
 * Description of Settings
 *
 * @author alexw
 */
class EazyFacebookSettings {

    /**
     * Instanz von Settings
     * @static
     * @var Settings
     */
    private static $instance = null;

    /**
     * Table Name in der Datenbank
     * @static 
     * @var string
     */
    private static $tableName = 'eazy_facebook_settings';

    /**
     * Row ID in der Datenbank
     * @static
     * @var int 
     */
    private static $settingsID = 1;

    /**
     * Unsere Columns im Table
     * @static
     * @var Array
     */
    private static $columns = array(
        'eazy_facebook_app_id',
        'eazy_facebook_app_secret',
        'eazy_facebook_user_id',
        'eazy_facebook_auth_token',
        'eazy_facebook_perma_auth_token',
        'eazy_facebook_share_posts',
        'eazy_facebook_last_post_check',
        'eazy_facebook_last_post_check_succeeded',
        'eazy_facebook_cache_posts',
        'eazy_facebook_download_images',
        'eazy_facebook_cached_posts',
        'eazy_facebook_get_posts',
        'eazy_facebook_error_log',
        'eazy_facebook_share_posts_automatic',
        'eazy_facebook_share_posts_automatic_time'
    );
    protected $columnSize;

    /**
     * Die Facebook App ID
     * @var string
     */
    protected $facebookAppID;

    /**
     * Facebook App Secret
     * @var string
     */
    protected $facebookAppSecret;

    /**
     * Facebook User ID
     * @var string
     */
    protected $facebookUserID;

    /**
     * Der Benutzer-AuthToken
     * @var string
     */
    protected $facebookAuthToken;

    /**
     * Der Perma AuthToken den wir mithilfe der Facebook API generieren werden
     * @var string
     */
    protected $facebookPermaAuthToken;

    /**
     * Gibt an ob Posts von WordPress nach Facebook geteilt werden sollen
     * @var bool
     */
    protected $sharePosts;

    /**
     * Timestamp des letztens Vorgangs zur Prüfung auf neue Facebook Inhalte
     * @var 
     */
    protected $lastPostCheck;

    /**
     * Gibt an ob der letzte Prüfungsvorgang erfolgreich war. Wenn nicht wird die Fehlermeldung zurück gegeben
     * @var bool|string
     */
    protected $lastPostCheckSucceeded;

    /**
     * Gibt an ob Facebook Posts gecached werden sollen (enorme performance steigerung!)
     * @var bool
     */
    protected $cachePosts;

    /**
     * Gibt an ob Bilder heruntergeladen werden sollen (möglicherweise performance steigerung)
     * @var bool
     */
    protected $downloadImages;

    /**
     * Enthält die Facebook Posts aus dem Cache als Array
     * @var array
     */
    protected $cachedPosts;

    /**
     * Gibt an ob Posts von Facebook abgerufen werden sollen
     * @var bool
     */
    protected $getPosts;

    /**
     * Gibt an ob Fehler geloggt werden sollen
     * @var bool
     */
    protected $errorLog;

    /**
     *
     * @var bool 
     */
    protected $sharePostsAutomatic;

    /**
     *
     * @var int 
     */
    protected $sharePostsAutomaticTime;

    /**
     * Konstruktor
     */
    function __construct() {

        $this->setColumnSize(sizeof(static::$columns));

        $tableCreated = $this->tableExists();

        if (!$tableCreated) {
            $tableCreated = $this->createSettings();
        }

        $options = $tableCreated == true ? $this->getOptions() : array();

        if (sizeof($options) === sizeof(static::$columns)) {
            foreach ($options as $optionName => $optionValue) {

                if (!in_array($optionName, static::$columns)) {
                    continue;
                }

                switch ($optionName) {
                    case 'eazy_facebook_app_id':
                        $this->setFacebookAppID($optionValue);
                        break;
                    case 'eazy_facebook_app_secret':
                        $this->setFacebookAppSecret($optionValue);
                        break;
                    case 'eazy_facebook_user_id':
                        $this->setFacebookUserID($optionValue);
                        break;
                    case 'eazy_facebook_auth_token':
                        $this->setFacebookAuthToken($optionValue);
                        break;
                    case 'eazy_facebook_perma_auth_token':
                        $this->setFacebookPermaAuthToken($optionValue);
                        break;
                    case 'eazy_facebook_share_posts':
                        $this->setSharePosts($optionValue);
                        break;
                    case 'eazy_facebook_last_post_check':
                        $this->setLastPostCheck($optionValue);
                        break;
                    case 'eazy_facebook_last_post_check_succeeded':
                        $this->setLastPostCheckSucceeded($optionValue);
                        break;
                    case 'eazy_facebook_cache_posts':
                        $this->setCachePosts($optionValue);
                        break;
                    case 'eazy_facebook_download_images':
                        $this->setDownloadImages($optionValue);
                        break;
                    case 'eazy_facebook_cached_posts':
                        $this->setCachedPosts($optionValue);
                        break;
                    case 'eazy_facebook_get_posts':
                        $this->setGetPosts($optionValue);
                        break;
                    case 'eazy_facebook_error_log':
                        $this->setErrorLog($optionValue);
                        break;
                    case 'eazy_facebook_share_posts_automatic':
                        $this->setSharePostsAutomatic($optionValue);
                        break;
                    case 'eazy_facebook_share_posts_automatic_time':
                        $this->setSharePostsAutomaticTime($optionValue);
                        break;
                }
            }
        }
    }

    /**
     * 
     * @param string $appID
     */
    public function setColumnSize($size) {
        $this->columnSize = filter_var($size, FILTER_VALIDATE_INT);
    }

    /**
     * 
     * @param string $appID
     */
    public function setFacebookAppID($appID) {
        $this->facebookAppID = filter_var($appID, FILTER_SANITIZE_STRING);
    }

    /**
     * 
     * @param string $appSecret
     */
    public function setFacebookAppSecret($appSecret) {
        $this->facebookAppSecret = filter_var($appSecret, FILTER_SANITIZE_STRING);
    }

    /**
     * 
     * @param string $userID
     */
    public function setFacebookUserID($userID) {
        $this->facebookUserID = filter_var($userID, FILTER_SANITIZE_STRING);
    }

    /**
     * 
     * @param string $authToken
     */
    public function setFacebookAuthToken($authToken) {
        $this->facebookAuthToken = filter_var($authToken, FILTER_SANITIZE_STRING);
    }

    /**
     * 
     * @param string $permaToken
     */
    public function setFacebookPermaAuthToken($permaToken) {
        $this->facebookPermaAuthToken = filter_var($permaToken, FILTER_SANITIZE_STRING);
    }

    /**
     * 
     * @param bool $sharePosts
     */
    public function setSharePosts($sharePosts) {
        $this->sharePosts = boolval($sharePosts);
    }

    /**
     * 
     * @param int $timeStamp
     */
    public function setLastPostCheck($timeStamp) {
        $time = intval($timeStamp);
        $this->lastPostCheck = $this->isDate($time) ? $time : false;
    }

    /**
     * 
     * @param bool $succeeded
     */
    public function setLastPostCheckSucceeded($succeeded) {
        $this->lastPostCheckSucceeded = boolval($succeeded);
    }

    /**
     * 
     * @param bool $cachePosts
     */
    public function setCachePosts($cachePosts) {
        $this->cachePosts = boolval($cachePosts);
    }

    /**
     * 
     * @param bool $downloadImages
     */
    public function setDownloadImages($downloadImages) {
        $this->downloadImages = boolval($downloadImages);
    }

    /**
     * 
     * @param string $cachedPosts
     */
    public function setCachedPosts($cachedPosts) {
        $this->cachedPosts = unserialize($cachedPosts);
    }

    /**
     * 
     * @param bool $getPosts
     */
    public function setGetPosts($getPosts) {
        $this->getPosts = boolval($getPosts);
    }

    /**
     * 
     * @param bool $errorLog
     */
    public function setErrorLog($errorLog) {
        $this->errorLog = boolval($errorLog);
    }

    /**
     * 
     * @param bool $automatic
     */
    public function setSharePostsAutomatic($automatic) {
        $this->sharePostsAutomatic = boolval($automatic);
    }

    /**
     * 
     * @param int $time
     */
    public function setSharePostsAutomaticTime($time) {
        $this->sharePostsAutomaticTime = intval($time);
    }

    /**
     * 
     * @return string
     */
    public function getColumnSize() {
        return $this->columnSize;
    }

    /**
     * 
     * @return string
     */
    public function getFacebookAppID() {
        return $this->facebookAppID;
    }

    /**
     * 
     * @return string
     */
    public function getFacebookAppSecret() {
        return $this->facebookAppSecret;
    }

    /**
     * 
     * @return string
     */
    public function getFacebookUserID() {
        return $this->facebookUserID;
    }

    /**
     * 
     * @return string
     */
    public function getFacebookAuthToken() {
        return $this->facebookAuthToken;
    }

    /**
     * 
     * @return string
     */
    public function getFacebookPermaAuthToken() {
        return $this->facebookPermaAuthToken;
    }

    /**
     * 
     * @return bool
     */
    public function getSharePosts() {
        return $this->sharePosts;
    }

    /**
     * 
     * @return int
     */
    public function getLastPostCheck() {
        return $this->lastPostCheck;
    }

    /**
     * 
     * @return bool
     */
    public function getLastPostCheckSucceeded() {
        return $this->lastPostCheckSucceeded;
    }

    /**
     * 
     * @return bool
     */
    public function getCachePosts() {
        return $this->cachePosts;
    }

    /**
     * 
     * @return bool
     */
    public function getDownloadImages() {
        return $this->downloadImages;
    }

    /**
     * 
     * @return array
     */
    public function getCachedPosts() {
        return $this->cachedPosts;
    }

    /**
     * 
     * @return bool
     */
    public function getGetPosts() {
        return $this->getPosts;
    }

    /**
     * 
     * @return bool
     */
    public function getErrorLog() {
        return $this->errorLog;
    }

    /**
     * 
     * @return bool
     */
    public function getSharePostsAutomatic() {
        return $this->sharePostsAutomatic;
    }

    /**
     * 
     * @return int
     */
    public function getSharePostsAutomaticTime() {
        return $this->sharePostsAutomaticTime;
    }

    private function isDate($timeStamp) {
        try {
            $dateTime = new DateTime($timeStamp);

            $day = $dateTime->format('d');
            $month = $dateTime->format('m');
            $year = $dateTime->format('Y');

            if (checkdate($month, $day, $year)) {
                return true;
            }

            return false;
        } catch (Exception $ex) {
            if (EAZYLOGDATA) {
                EazyFacebookSystem::Log(__('Ausnahme: ' . $ex->getMessage() . ' Datei: ' . __FILE__ . ' Zeile: ' . __LINE__ . ' Funktion: ' . __FUNCTION__, 'eazy_newsletter'));
            }
        }
    }

    public static function getInstance() {
        if (self::$instance === null || $this->checkForChange() === true) {
            self::$instance = new Settings();
        }

        return self::$instance;
    }

    private function checkForChange() {

        $changes = false;

        if ($this->tableExists()) {

            $options = $this->getOptions();

            foreach ($options as $optionName => $optionValue) {
                switch ($optionName) {
                    case 'eazy_facebook_app_id':
                        $changes = $this->getFacebookAppID() != $optionValue || $changes === true ? true : false;
                        break;
                    case 'eazy_facebook_app_secret':
                        $changes = $this->getFacebookAppSecret() != $optionValue || $changes === true ? true : false;
                        break;
                    case 'eazy_facebook_user_id':
                        $changes = $this->getFacebookUserID() != $optionValue || $changes === true ? true : false;
                        break;
                    case 'eazy_facebook_auth_token':
                        $changes = $this->getFacebookAuthToken() != $optionValue || $changes === true ? true : false;
                        break;
                    case 'eazy_facebook_perma_auth_token':
                        $changes = $this->getFacebookPermaAuthToken() != $optionValue || $changes === true ? true : false;
                        break;
                    case 'eazy_facebook_share_posts':
                        $changes = $this->getSharePosts() != $optionValue || $changes === true ? true : false;
                        break;
                    case 'eazy_facebook_last_post_check':
                        $changes = $this->getLastPostCheck() != $optionValue || $changes === true ? true : false;
                        break;
                    case 'eazy_facebook_last_post_check_succeeded':
                        $changes = $this->getLastPostCheckSucceeded() != $optionValue || $changes === true ? true : false;
                        break;
                    case 'eazy_facebook_cache_posts':
                        $changes = $this->getCachePosts() != $optionValue || $changes === true ? true : false;
                        break;
                    case 'eazy_facebook_download_images':
                        $changes = $this->getDownloadImages() != $optionValue || $changes === true ? true : false;
                        break;
                    case 'eazy_facebook_cached_posts':
                        $changes = $this->getCachedPosts() != unserialize($optionValue) || $changes === true ? true : false;
                        break;
                    case 'eazy_facebook_get_posts':
                        $changes = $this->getGetPosts() != $optionValue || $changes === true ? true : false;
                        break;
                    case 'eazy_facebook_error_log':
                        $changes = $this->getErrorLog() != $optionValue || $changes === true ? true : false;
                        break;
                    case 'eazy_facebook_share_posts_automatic':
                        $changes = $this->getSharePostsAutomatic() != $optionValue || $changes === true ? true : false;
                        break;
                    case 'eazy_facebook_share_posts_automatic_time':
                        $changes = $this->getSharePostsAutomaticTime() != $optionValue || $changes === true ? true : false;
                        break;
                }
            }
        }

        return $changes;
    }

    public function getOption($optionName) {
        try {
            /* @var $wpdb wpdb */
            global $wpdb;
            $tableName = $wpdb->prefix . static::$tableName;
            $option = esc_sql($optionName);

            $sql = 'SELECT ' . $option . ' FROM ' . $tableName;

            $value = $wpdb->get_var($sql);

            return $value;
        } catch (Exception $ex) {
            if (EAZYLOGDATA) {
                EazyFacebookSystem::Log(__('Ausnahme: ' . $ex->getMessage() . ' Datei: ' . __FILE__ . ' Zeile: ' . __LINE__ . ' Funktion: ' . __FUNCTION__, 'eazy_newsletter'));
            }
        }
    }

    public function updateSettings() {
        
    }

    public function updateOption($optionName, $value) {
        /* @var $wpdb wpdb */
        global $wpdb;

        $tableName = $wpdb->prefix . static::$tableName;
        $settingsID = static::$settingsID;
        $optionValue = esc_sql($value);

        if ($wpdb->update($tableName, array($optionName => $optionValue), array('Id' => $settingsID)) !== false) {
            return true;
        }

        return false;
    }

    public function getOptions() {
        try {
            /* @var $wpdb wpdb */
            global $wpdb;

            $tableName = $wpdb->prefix . static::$tableName;

            $sql = 'SELECT ';

            $columns = static::$columns;

            $i = 1;

            foreach ($columns as $singleColumn) {
                $sql .= $singleColumn;

                if ($i <= (static::$columnsSize - 1)) {
                    $sql .= ', ';
                }
            }

            $sql .= 'FROM ' . static::$tableName . ' WHERE Id=' . static::$settingsID;

            $options = $wpdb->get_row($sql, ARRAY_A);

            if (sizeof($options) > 0) {
                return $options;
            } else {
                return array();
            }
        } catch (Exception $ex) {
            if ($this->getErrorLog() === true) {
                EazyFacebookSystem::Log(__('Ausnahme: ' . $ex->getMessage() . ' Datei: ' . __FILE__ . ' Zeile: ' . __LINE__ . ' Funktion: ' . __FUNCTION__, 'eazy_newsletter'));
            }
        }
    }

    public function createSettings() {
        try {

            $this->setFacebookAppID('');
            $this->setFacebookAppSecret('');
            $this->setFacebookUserID('');
            $this->setFacebookAuthToken('');
            $this->setFacebookPermaAuthToken('');
            $this->setSharePosts(false);
            $this->setLastPostCheck(null);
            $this->setLastPostCheckSucceeded(false);
            $this->setCachePosts(false);
            $this->setDownloadImages(false);
            $this->setCachedPosts(serialize(array()));
            $this->setGetPosts(false);
            $this->setErrorLog(true);
            $this->setSharePostsAutomatic(false);
            $this->setSharePostsAutomaticTime(null);

            if ($this->insertSettings() === true) {
                return true;
            }

            return false;
        } catch (Exception $ex) {
            if (EAZYLOGDATA) {
                EazyFacebookSystem::Log(__('Ausnahme: ' . $ex->getMessage() . ' Datei: ' . __FILE__ . ' Zeile: ' . __LINE__ . ' Funktion: ' . __FUNCTION__, 'eazy_newsletter'));
            }
        }
    }

    public function insertSettings() {
        try {
            /* @var $wpdb wpdb */
            global $wpdb;
            $tableName = $wpdb->prefix . static::$tableName;

            $settings = array(
                'eazy_facebook_app_id' => $this->getFacebookAppID(),
                'eazy_facebook_app_secret' => $this->getFacebookAppSecret(),
                'eazy_facebook_user_id' => $this->getFacebookUserID(),
                'eazy_facebook_auth_token' => $this->getFacebookAuthToken(),
                'eazy_facebook_perma_auth_token' => $this->getFacebookPermaAuthToken(),
                'eazy_facebook_share_posts' => $this->getSharePosts(),
                'eazy_facebook_last_post_check' => $this->getLastPostCheck(),
                'eazy_facebook_last_post_check_succeeded' => $this->getLastPostCheck(),
                'eazy_facebook_cache_posts' => $this->getCachePosts(),
                'eazy_facebook_download_images' => $this->getDownloadImages(),
                'eazy_facebook_cached_posts' => serialize($this->getCachedPosts()),
                'eazy_facebook_get_posts' => $this->getGetPosts(),
                'eazy_facebook_error_log' => $this->getErrorLog(),
                'eazy_facebook_share_posts_automatic' => $this->getSharePostsAutomatic(),
                'eazy_facebook_share_posts_automatic_time' => $this->getSharePostsAutomaticTime()
            );

            if ($wpdb->insert($tableName, $settings) !== false) {
                return true;
            }

            return false;
        } catch (Exception $ex) {
            if (EAZYLOGDATA) {
                EazyFacebookSystem::Log(__('Ausnahme: ' . $ex->getMessage() . ' Datei: ' . __FILE__ . ' Zeile: ' . __LINE__ . ' Funktion: ' . __FUNCTION__, 'eazy_newsletter'));
            }
        }
    }

    public function tableExists() {
        try {
            global $wpdb;

            $tableName = $wpdb->prefix . static::$tableName;

            if ($wpdb->get_var("SHOW TABLES LIKE '$tableName'") != $tableName) {
                return false;
            } else {
                return true;
            }
        } catch (Exception $ex) {
            if (EAZYLOGDATA) {
                EazyFacebookSystem::Log(__('Ausnahme: ' . $ex->getMessage() . ' Datei: ' . __FILE__ . ' Zeile: ' . __LINE__ . ' Funktion: ' . __FUNCTION__, 'eazy_newsletter'));
            }
        }
    }

}
