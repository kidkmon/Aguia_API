<?php
namespace ApiMaster\Service;

use ApiMaster\Controller\AuthController;
use ApiMaster\Controller\MultaController;
use ApiMaster\Controller\UserController;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ControllerServiceProvider implements ServiceProviderInterface
{
    public function register(Container $app)
    {
        /**
         * Multa Controller
         * @param Container $app
         * @return MultaController
         */
        $app['multas'] = function (Container $app){
            return new MultaController($app);
        };

        $app['user'] = function (Container $app){
            return new UserController($app);
        };

        $app['auth'] = function (Container $app){
            return new AuthController($app);
        };
    }
}