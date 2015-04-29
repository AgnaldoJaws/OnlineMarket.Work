<?php 

namespace Market\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;


class PostControllerFactory implements FactoryInterface
{



	#obriga a ter uma interface do serviceLocator
	public function createService(ServiceLocatorInterface $controllerManager)
	{
		$allServices = $controllerManager->getServiceLocator();
		$sm = $allServices->get('ServiceManager');
		#pegando as categorias do serviço
		$categories = $sm->get('categories');

		#instanciando a controller
		$postController = new \Market\Controller\PostController();
		#passando as categorias
		$postController->setCategories($categories);
		$postController->setPostForm($sm->get('market-post-form'));
        //$postController->setListingsTable($sm->get('listings-table'));
		return $postController;
		#trabalhando uma factory para fabricar um postcontroller
		#e injetar informações dentro dele
	}



}