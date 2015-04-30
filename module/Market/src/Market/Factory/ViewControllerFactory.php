<?php 

namespace Market\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;


class ViewControllerFactory implements FactoryInterface
{



	#obriga a ter uma interface do serviceLocator
	public function createService(ServiceLocatorInterface $controllerManager)
    {
        $allServices = $controllerManager->getServiceLocator();
        $sm = $allServices->get('ServiceManager');
        #pegando as categorias do serviço
        $categories = $sm->get('categories');

        #instanciando a controller
        $viewController = new \Market\Controller\ViewController();
        #passando as categorias
       // $viewController->setCategories($categories);
        //$viewController->setPostForm($sm->get('market-post-form'));
        $viewController->setListingsTable($sm->get('listings-table'));
        return $viewController;
        #trabalhando uma factory para fabricar um postcontroller
        #e injetar informações dentro dele
    }



}