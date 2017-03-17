<?php
/**
 * @package Plugin
 */
namespace Jihel\Plugin\MailXpertiseBundle\Proxy\Bean;

/**
 * Class ApiProxyBean
 *
 * @author Joseph LEMOINE <lemoine.joseph@gmail.com>
 * @link http://www.joseph-lemoine.fr
 */
abstract class ApiProxyBean
{
    /**
     * @var string
     */
    protected $apiKey;

    /**
     * @var string
     */
    protected $token;

    /**
     * @var string
     */
    protected $timeout;

    /**
     * @var string
     */
    protected $baseUrl;

    /**
     * @var string
     */
    protected $referer;

    /**
     * @var Client
     */
    protected $client;

    /**
     * @param string $apiKey
     * @param string $token
     * @param string $timeout
     * @param string $baseUrl
     * @param string $referer
     */
    public function __construct(
        $apiKey,
        $token,
        $timeout,
        $baseUrl,
        $referer
    ) {
        $this->apiKey = $apiKey;
        $this->token = $token;
        $this->timeout = $timeout;
        $this->baseUrl = $baseUrl;
        $this->referer = $referer;
    }

    /**
     * @return array
     */
    protected function getConfig() {
        return [
            'base_uri' => $this->baseUrl,
            'timeout' => $this->timeout,
            'headers' => [
                'Application-key' => $this->apiKey ,
                'Token-api' => $this->token,
                'Type-Response' => 'json',
            ]
        ];
    }
}
