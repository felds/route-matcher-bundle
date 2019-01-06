<?php
declare(strict_types=1);

namespace Felds\RouteMatcherBundle\Twig;

use Symfony\Component\HttpFoundation\RequestStack;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class RouteMatcherExtension extends AbstractExtension
{
    /**
     * @var RequestStack
     */
    private $requestStack;

    public function __construct(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
    }

    public function getFunctions()
    {
        return [
            new TwigFunction('route_matches', [$this, 'routeMatches']),
        ];
    }

    public function routeMatches(string $pattern): bool
    {
        $request = $this->requestStack->getCurrentRequest();

        $route = $request->attributes->get('_route');
        if (!$route) {
            return false;
        }

        return (bool)preg_match($pattern, $route);
    }
}
