<?php


namespace Market\Controller;

use Zend\View\View;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ViewController extends AbstractActionController
{
    public function indexAction()
    {
    	
    	$category = $this->params()->fromQuery("category");
    	# o valor está sendo forçado
        return new ViewModel(array('category'=>$category) );
    }
    
    public function itemAction (){
    	
    	#permite consulta pela barra de endereço
    	$itemId = $this->params()->fromQuery('itemId');
    	
    if (!$itemId){
    	$this->flashMessenger()->addMessage("Item not found");
    	return $this->redirect()->toRoute('market');
    }
    	return new ViewModel(array('itemId'=>$itemId));
    }
}
