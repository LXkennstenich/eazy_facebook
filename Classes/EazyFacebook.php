<?php

/**
 * Holt Facebook Posts ab und teilt eigene Wordpress Posts auf Facebook
 *
 * @author alexw
 */
class EazyFacebook extends EazyFacebookSystem {

    /**
     *
     * @var type 
     */
    protected $appID;

    /**
     *
     * @var type 
     */
    protected $appSecret;

    /**
     *
     * @var type 
     */
    protected $userID;

    /**
     *
     * @var type 
     */
    protected $authToken;

    /**
     *
     * @var type 
     */
    protected $permaAuthToken;

    /**
     * 
     */
    function __construct() {
        $this->setAppID($this->getSettings()->getFacebookAppID());
        $this->setAppSecret($this->getSettings()->getFacebookAppSecret());
        $this->setUserID($this->getSettings()->getFacebookUserID());
        $this->setAuthToken($this->getSettings()->getFacebookAuthToken());
        $this->setPermaAuthToken($this->getSettings()->getFacebookPermaAuthToken());
    }

    /**
     * 
     * @param string $appID
     */
    private function setAppID($appID) {
        $this->appID = $appID;
    }

    /**
     * 
     * @param string $appSecret
     */
    private function setAppSecret($appSecret) {
        $this->appSecret = $appSecret;
    }

    /**
     * 
     * @param string $userID
     */
    private function setUserID($userID) {
        $this->userID = $userID;
    }

    /**
     * 
     * @param string $authToken
     */
    private function setAuthToken($authToken) {
        $this->authToken = $authToken;
    }

    /**
     * 
     * @param string $permaToken
     */
    private function setPermaAuthToken($permaToken) {
        $this->permaAuthToken = $permaToken;
    }

    /**
     * 
     * @return string
     */
    public function getAppID() {
        return $this->appID;
    }

    /**
     * 
     * @return string
     */
    public function getAppSecret() {
        return $this->appSecret;
    }

    /**
     * 
     * @return string
     */
    public function getUserID() {
        return $this->userID;
    }

    /**
     * 
     * @return string
     */
    public function getAuthToken() {
        return $this->authToken;
    }

    /**
     * 
     * @return string
     */
    public function getPermaAuthToken() {
        return $this->permaAuthToken;
    }

}
