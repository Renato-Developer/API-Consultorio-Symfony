<?php

namespace ContainerJu87obY;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getAlterarDadosMedicoService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'App\Helper\AlterarDadosMedico' shared autowired service.
     *
     * @return \App\Helper\AlterarDadosMedico
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/src/Helper/AlterarDadosMedico.php';

        return $container->services['App\\Helper\\AlterarDadosMedico'] = new \App\Helper\AlterarDadosMedico();
    }
}
