<?php
namespace common\components;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Psr7\Response;
use yii\log\Logger;
use Yii;

class GithubAPI
{
    protected string $baseUri = 'https://api.github.com/';//users/stackforge/repos

    protected Client $client;

    public function __construct()
    {
        $this->client = new Client(
            [
                'base_uri' => $this->baseUri,
            ]
        );
    }

    public function getUserRepos(string $user)
    {
        $response = $this->send('/users/' . $user . '/repos');
        $body = $response->getBody()->getContents();
        return $body;
    }

    public function send(string $uri, string $method = 'GET')
    {
        /**
         * @var Response $response
         */
        try {
            $response = $this->client->request($method, $uri);
        } catch (\Exception $e) {
            /**
             * @var Logger $logger
             */
            Yii::error($e->getMessage());
            Yii::$app->end();
        }
        return $response;
    }
}
