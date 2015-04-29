<?php 

namespace Market\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;


class IndexControllerFactory implements FactoryInterface
{



	#obriga a ter uma interface do serviceLocator
	public function createService(ServiceLocatorInterface $controllerManager)
    {
        $allServices = $controllerManager->getServiceLocator();
        $sm = $allServices->get('ServiceManager');
        #pegando as categorias do serviço
        $categories = $sm->get('categories');

        #instanciando a controller
        $indexController = new \Market\Controller\IndexController();
        #passando as categorias
       // $indexController->setCategories($categories);
        //$indexController->setPostForm($sm->get('market-post-form'));
        $indexController->setListingsTable($sm->get('listings-table'));
        return $indexController;
        #trabalhando uma factory para fabricar um postcontroller
        #e injetar informações dentro dele
    }



}