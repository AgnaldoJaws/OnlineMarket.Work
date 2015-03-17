<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Market;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;

class Module


{
    public function onBootstrap(MvcEvent $e)
    {
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
        
        //escuata / listeners: "dispach" event
        //context: $this
        // handler q calback / metodo: onDispatch ()
        // priority / prioridade: 100
        //quando um evento dispatch for chamado ou
        //seja quando um controller e uma action forem
        //chamadas o dispatch será executado
       $eventManager->attach(MvcEvent::EVENT_DISPATCH,array($this, 'onDispatch'),100);
    }
    
    
    
    public function onDispatch (MvcEvent $e)
    {
    	
    	$sm = $e->getApplication()->getServiceManager();
    	$categories = $sm->get("categories");
    	$vm = $e->getViewModel();
    	$vm->setVariable("categories", $categories);
    	
    }
    
   

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
}
