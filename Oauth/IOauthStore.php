<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Kathy
 * Date: 17/07/14
 */

namespace Foundation\Oauth;


use Storyous\Account;
use Storyous\OauthServerRegistry;

interface IOauthStore {
    // metody od story.us \Foundantion\Oauth\Store.php

    public function getServerToken($consumer_key, $token, $token_type = OAuthService::TOKEN_TYPE_ACCESS);
    public function getSecretsForVerify ( $consumer_key, $token, $token_type = OAuthService::TOKEN_TYPE_ACCESS );
    public function checkServerNonce ( $consumer_key, $token, $timestamp, $nonce );
    public function updateConsumerAccessTokenTtl( $token, $ttl);
    public function getPublicCertificate ( Secrets $secrets );
    public function getPrivateCertificate (Secrets $secrets );
    public function getConsumerRequestToken ($token, $tokenType = OAuthService::TOKEN_TYPE_REQUEST );
    public function addConsumerRequestToken ( $consumer_key, $options = array() );
    public function generateSecret();
    public function generateKey ( $unique = false );
    public function authorizeConsumerRequestToken ( $token, Account $account, $referrer_host = '' );
    public function deleteConsumerRequestToken ( $token );
    public function exchangeConsumerRequestForAccessToken ( $token, $options = array() );
    public function createAuthorizedAccessToken ( Account $account, OauthServerRegistry $app, $options = array() );

}