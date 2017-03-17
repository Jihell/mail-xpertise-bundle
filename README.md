MailXpertise Api
=================

A Symfony bundle to handle mail expertise api.
This bundle only provide a php object way to use the api with Guzzle.


1- Install
----------

Add plugin to your composer.json require:

    {
        "require": {
            "jihel/mail-expertise-bundle": "dev-master",
        }
    }

or

    php composer.phar require jihel/mail-expertise-bundle:dev-master

Add bundle to your AppKernel.php

    public function registerBundles()
    {
        $bundles = array(
            ...
            new Jihel\Plugin\MailXpertiseBundle\JihelPluginMailXpertise(),
        );
    }


2- Configure your config.yml
----------------------------

The default configuration file and explanations can be found [here](doc/config.md)


    jihel_plugin_mail_xpertise:
        apiKey: your_api_key
        token: your_api_token
        timeout: 3


3- Usage
--------

Get the proxy service **jihel.plugin.mail_xpertise.proxy.api**:

- From a controller


    /** @var \Jihel\Plugin\MailXpertiseBundle\Proxy\ApiProxy $MailXpertiseProxy */
    $MailXpertiseProxy = $this->get('jihel.plugin.mail_xpertise.proxy.api');

- From a service


    service:
        my.super.service:
            class: %my.super.service.class%
            arguments: { '@jihel.plugin.mail_xpertise.proxy.api' }

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

    /** @var \Jihel\Plugin\MailXpertiseBundle\Proxy\ApiProxy $MailXpertiseProxy */
    $MailXpertiseProxy = $this->get('jihel.plugin.mail_xpertise.proxy.api');
    $client = $MailXpertiseProxy->getClient();
    $response = $client->get('/api/lists/info');


4- Thanks
---------

Thanks to me for giving my free time doing class for lazy developers.
You can access my CV [here](http://www.joseph-lemoine.fr)
