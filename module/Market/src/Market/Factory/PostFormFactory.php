<?php 

namespace Market\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Market\Form\PostForm;

class PostFormFactory implements FactoryInterface
{



	#obriga a ter uma interface do serviceLocator
	public function createService(ServiceLocatorInterface $sm)
	{


		# pegando as categorias do serviço
		$categories = $sm->get('categories');

		$form = new PostForm();
		$form->setCategories($categories);
		$form->buildForm();
		$form->setInputFilter($sm->get('market-post-filter'));


		return $form;
		#trabalhando uma factory para fabricar um postcontroller
		#e injetar informações dentro dele
	}



}