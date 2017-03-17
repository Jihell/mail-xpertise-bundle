<?php
/**
 * @package Plugin
 */
namespace Jihel\Plugin\MailXpertiseBundle\Proxy;

use GuzzleHttp\Client;

/**
 * Class ApiProxy
 *
 * @author Joseph LEMOINE <lemoine.joseph@gmail.com>
 * @link http://www.joseph-lemoine.fr
 */
class ApiProxy extends Bean\ApiProxyBean
{
    /**
     * Create client singleton
     *
     * @param array $options
     * @return Client
     */
    public function getClient(array $options = [])
    {
        $options = array_merge($this->getConfig(), $options);
        if (null === $this->client) {
            $this->client = new Client($options);
        }

        return $this->client;
    }
}
