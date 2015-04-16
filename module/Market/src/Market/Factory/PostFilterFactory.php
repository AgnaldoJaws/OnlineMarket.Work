<?php
namespace Market\Factory;

use Market\Form\PostFilter;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;



class PostFilterFactory implements FactoryInterface

{
	public function createService(ServiceLocatorInterface $sm)
	{
		$filter = new PostFilter();
		$filter->setCategories($sm->get('categories'));
		$filter->buildFilter();
		
		return $filter;
	}
	
}