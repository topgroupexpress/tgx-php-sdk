<?php

namespace tgx;

require_once 'ContentClient.php';
require_once 'AgenciesClient.php';
require_once 'RequestsClient.php';


class Client
{
    private static $api_host = 'https://www.t3admin.com';

    private $email;
    private $token;
    private $connected;
    private $session_token;

    private $content_client = null;
    private $agencies_client = null;
    private $requests_client = null;

    function __construct($email, $token)
    {
        $this->email = $email;
        $this->token = $token;
        $this->connected = false;

        $body = json_encode([
            'email' => $this->email,
            'token' => $this->token
        ]);

        $curl = curl_init($this->getFullUrl('/auth/login'));
        curl_setopt_array($curl, [
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $body,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json',
                'Content-Length: ' . strlen($body)
            ]
        ]);

        $response = curl_exec($curl);
        curl_close($curl);

        $json = json_decode($response, true);

        if ($json['meta']['answer'] === 'ok') {
            $this->session_token = $json['body'];
            $this->connected = true;

            $this->content_client = new ContentClient($this);
            $this->agencies_client = new AgenciesClient($this);
            $this->requests_client = new RequestsClient($this);
        } else {
            $message = 'Api Error: ' . $json['meta']['message'];
            throw new \Exception($message);
        }
    }

    function __toString() {
        return 'Client';
    }

    public function getFullUrl($endpoint) {
        return Client::$api_host . '/api/external' . $endpoint;
    }

    public function get($endpoint, $params=null) {
        if ($this->connected) {
            $url = $this->getFullUrl($endpoint);
            if ($params !== null) {
                $url .= '?' . http_build_query($params);
            }

            $curl = curl_init();
            curl_setopt_array($curl, [
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTPHEADER => [
                    'Authorization: Bearer ' . $this->session_token,
                ]
            ]);

            $response = curl_exec($curl);

            curl_close($curl);

            $json = json_decode($response, true);

            if ($json['meta']['answer'] === 'ok') {
                return $json['body'];
            } else {
                $message = 'Api Error: ' . $json['meta']['message'];
                throw new \Exception($message);
            }
        }

        $message = 'Client Error: Operation cannot be completed due the client is not connected';
        throw new \Exception($message);
    }

    public function post($endpoint, $params=null) {
        if ($this->connected) {
            $curl = curl_init($this->getFullUrl($endpoint));

            if ($params !== null) {
                $body = json_encode($params);

                curl_setopt_array($curl, [
                    CURLOPT_POST => true,
                    CURLOPT_POSTFIELDS => $body,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_HTTPHEADER => [
                        'Authorization: Bearer ' . $this->session_token,
                        'Content-Type: application/json',
                        'Content-Length: ' . strlen($body)
                    ]
                ]);
            } else {
                curl_setopt_array($curl, [
                    CURLOPT_POST => true,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_HTTPHEADER => [
                        'Authorization: Bearer ' . $this->session_token
                    ]
                ]);
            }

            $response = curl_exec($curl);

            curl_close($curl);

            $json = json_decode($response, true);

            if ($json['meta']['answer'] === 'ok') {
                return $json['body'];
            } else {
                $message = 'Api Error: ' . $json['meta']['message'];
                throw new \Exception($message);
            }
        }

        $message = 'Client Error: Operation cannot be completed due the client is not connected';
        throw new \Exception($message);
    }

    public function close()
    {
        $this->post('/auth/logout');
        $this->connected = false;
    }

    public function contents()
    {
        if ($this->connected) {
            return $this->content_client;
        }

        $message = 'Client Error: Operation cannot be completed due the client is not connected';
        throw new \Exception($message);
    }

    public function agencies() {
        if ($this->connected) {
            return $this->agencies_client;
        }

        $message = 'Client Error: Operation cannot be completed due the client is not connected';
        throw new \Exception($message);
    }

    public function requests()
    {
        if ($this->connected) {
            return $this->requests_client;
        }

        $message = 'Client Error: Operation cannot be completed due the client is not connected';
        throw new \Exception($message);
    }
 }

?>