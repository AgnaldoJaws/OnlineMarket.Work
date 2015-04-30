<?php


namespace Market\Controller;

use Zend\View\View;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ViewController extends AbstractActionController
{
	use ListingsTableTrait;
	public function indexAction()
	{
		#pegando os valores da rota
		$category = $this->params()->fromRoute("category");
		# o valor está sendo forçado
		return new ViewModel(array('category'=>$category) );
	}

	public function itemAction (){
			
		#permite consulta pela barra de endereço
		$itemId = $this->params()->fromRoute('itemId');
			
		if (!$itemId){
			$this->flashMessenger()->addMessage("Item not found");
			return $this->redirect()->toRoute('market');
		}
		return new ViewModel(array('itemId'=>$itemId));
	}
}
