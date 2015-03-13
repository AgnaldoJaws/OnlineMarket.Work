<?php


namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
    	
    	/*$exemploService = $this->getServiceLocator()->get("ExemploService");
    	print_r($exemploService);die;*/
        return new ViewModel();
    }
}
