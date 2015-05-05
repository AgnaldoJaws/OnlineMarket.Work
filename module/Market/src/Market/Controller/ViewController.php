<?php


namespace Market\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;


class ViewController extends AbstractActionController{
    
    use ListingsTableTrait;
    
    public function indexAction() {
        
        #pegando os valores da rota
		$category = $this->params()->fromRoute("category");
		# o valor está sendo forçado
       $listings = $this->listingsTable->getListingsByCategory($category);
        
        return new ViewModel(array('category' => $category, 'list' => $listings));
    }
    
    public function itemAction() 
    {
        #permite consulta pela barra de endereço
        $itemId = $this->params()->fromRoute("itemId");
        
        $item = $this->listingsTable->getListingsByID($itemId);
        
        
        if(!$itemId){
            
            $this->flashMessenger()->addMessage("Item Not Found");
            
            return $this->redirect()->toRoute('market');
        }
        
        return new ViewModel(array('itemId' => $itemId, 'item' => $item));
    }
}
