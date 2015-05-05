<?php
namespace Market\Factory;

/**
 * Description of PostControllerFactory
 *
 * @author ennio
 */
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class PostControllerFactory implements FactoryInterface 
{
    public function createService(ServiceLocatorInterface $controllerManager) {
        
        $allServices = $controllerManager->getServiceLocator();
        
        $sm = $allServices->get('ServiceManager');
        
        
        $categories = $sm->get('categories');
        
        $postController = new \Market\Controller\PostController();
        $postController->setCategories($categories);
        $postController->setPostForm($sm->get('market-post-form'));
        $postController->setListingsTable($sm->get('listings-table'));
        
        return $postController;
    }

}
