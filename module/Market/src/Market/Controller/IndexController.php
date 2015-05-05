<?php



namespace Market\Controller;


use \Zend\Mvc\Controller\AbstractActionController;
use \Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController {
    
    use \Market\Controller\ListingsTableTrait;
    
    public function indexAction() 
    {
        $messages = array();
        if($this->flashMessenger()->hasMessages()){
            $messages = $this->flashMessenger()->getMessages();
        }
        
        $itemRecent = $this->listingsTable->getLatestListing();
        
        return new ViewModel(array('messages' => $messages, 'item' => $itemRecent));
    }
    
    public function fooAction() 
    {
        return new ViewModel();
    }
}
