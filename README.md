Mailexpertise Api
=================

A Symfony bundle to handle mail expertise api.
This bundle only provide a php object way to use the api with Guzzle.


1- Install
----------

Add plugin to your composer.json require:

    {
        "require": {
            "jihel/mailexpertise": "dev-master",
        }
    }

or

    php composer.phar require jihel/mailexpertise:dev-master

Add bundle to your AppKernel.php

    public function registerBundles()
    {
        $bundles = array(
            ...
            new Jihel\Plugin\MailExpertiseBundle\JihelPluginMailExpertise(),
        );
    }


2- Configure your config.yml
----------------------------

The default configuration file and explanations can be found [here](doc/config.md)


    jihel_plugin_mail_expertise:
        apiKey: your_api_key
        token: your_api_token
        timeout: 3


3- Usage
--------

Get the proxy service **jihel.plugin.mail_expertise.proxy.api**:

- From a controller


    /** @var \Jihel\Plugin\MailExpertiseBundle\Proxy\ApiProxy $mailExpertiseProxy */
    $mailExpertiseProxy = $this->get('jihel.plugin.mail_expertise.proxy.api');

- From a service


    service:
        my.super.service:
            class: %my.super.service.class%
            arguments: { '@jihel.plugin.mail_expertise.proxy.api' }

The class provite one methods that will return a Guzzle Client object

    /**
     * Get the Guzzle client object.
     * Aditionnal options can be provide, it won't override the one defined by config 
     *
     * @param array $option
     * @return \SplFileObject
     */
    public function getClient(array $option = array())

Example:

    /** @var \Jihel\Plugin\MailExpertiseBundle\Proxy\ApiProxy $mailExpertiseProxy */
    $mailExpertiseProxy = $this->get('jihel.plugin.mail_expertise.proxy.api');
    $client = $mailExpertiseProxy->getClient();
    $response = $client->get('/api/lists/info');


4- Thanks
---------

Thanks to me for giving my free time doing class for lazy developers.
You can access my CV [here](http://www.joseph-lemoine.fr)
