<?php
declare(strict_types=1);

namespace Felds\RouteMatcherBundle\DependencyInjection;

use Felds\RouteMatcherBundle\Twig\RouteMatcherExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;

class FeldsRouteMatcherExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $container->register('felds.route_matcher.extension', RouteMatcherExtension::class)
            ->setPrivate(true)
            ->addTag('twig.extension')
        ;
    }
}
