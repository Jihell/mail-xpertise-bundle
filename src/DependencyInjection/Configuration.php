<?php
/**
 * @package Plugin
 */
namespace Jihel\Plugin\MailExpertiseBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class Configuration
 *
 * @author Joseph LEMOINE <lemoine.joseph@gmail.com>
 * @link http://www.joseph-lemoine.fr
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('jihel_plugin_mail_expertise');

        $rootNode
            ->children()
                ->scalarNode('apiKey')->isRequired()->end()
                ->scalarNode('token')->isRequired()->end()
                ->integerNode('timeout')->defaultValue(3)->end()
                ->integerNode('baseUrl')->defaultValue('https://cloud.mailxpertise.com/')->end()
                ->integerNode('referer')->defaultValue('domain.tld')->end() // Optional
            ->end()
        ;

        return $treeBuilder;
    }
}
