<?php
namespace Market\Factory;
/**
 * Description of PostFilterFactory
 *
 * @author ennio
 */
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Market\Form\PostFilter;
class PostFilterFactory implements FactoryInterface{

    public function createService(ServiceLocatorInterface $sm)
    {
        $filter = new PostFilter();
        $filter->setCategories($sm->get('categories'));
        //Appication\config\module.config
        $filter->setExpireDays($sm->get('expireDays'));
        $filter->setCaptchaOptions($sm->get('captchaOptions'));

        $filter->buildFilter();
        return $filter;
    }
}