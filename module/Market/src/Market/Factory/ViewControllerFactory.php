<?php
namespace Market\Factory;


use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ViewControllerFactory implements FactoryInterface 
{
    public function createService(ServiceLocatorInterface $controllerManager) {
        
        $allServices = $controllerManager->getServiceLocator();
        
        $sm = $allServices->get('ServiceManager');
        
        
        $categories = $sm->get('categories');
        
        $viewController = new \Market\Controller\ViewController();
        //$viewController->setCategories($categories);
        //$viewController->setPostForm($sm->get('market-post-form'));
        $viewController->setListingsTable($sm->get('listings-table'));
        
        return $viewController;
    }

}
