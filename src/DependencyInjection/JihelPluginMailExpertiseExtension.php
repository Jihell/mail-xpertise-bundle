<?php
/**
 * @package Plugin
 */
namespace Jihel\Plugin\MailExpertiseBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * Class JihelPluginMailExpertiseExtension
 *
 * @author Joseph LEMOINE <lemoine.joseph@gmail.com>
 * @link http://www.joseph-lemoine.fr
 */
class JihelPluginMailExpertiseExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);
        $this->registerParameters($config, $container);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('proxy.yml');
    }

    /**
     * Lazy register parameters recursively and name parameter key as in configuration file,
     * with a dot as deep separator.
     * Arrays are still completely available from related key.
     *
     * @param array $config
     * @param ContainerBuilder $container
     * @param string $prefix
     * @return $this
     */
    protected function registerParameters(array $config, ContainerBuilder $container, $prefix = '')
    {
        if (count($config)) {
            foreach ($config as $key => $value) {
                if (is_array($value)) {
                    $this->registerParameters($value, $container, $prefix.$key.'.');
                }

                $container->setParameter(
                    sprintf('jihel.plugin.mail_expertise.%s', $prefix.$key),
                    $value
                );
            }
        }

        return $this;
    }
}
