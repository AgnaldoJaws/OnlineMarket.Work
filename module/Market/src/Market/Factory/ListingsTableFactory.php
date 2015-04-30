<?php
/*namespace Market\Factory;




use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Market\Model\ListingsTable;

class ListingsTableFactory implements FactoryInterface {

    #metodo obrigatorio ao criar a factoryInterface
    public function createService(ServiceLocator $sm)
    {
        #pega as configurações do model\ListingsTable
        return new ListingsTable(ListingsTable::$tableName,
            $sm->get('general-adapter'));


    }
	

}