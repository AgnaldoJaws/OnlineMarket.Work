<?php
namespace Market\Form;



use Zend\Validator\Regex;

use Zend\InputFilter\Input;

use Zend\InputFilter\InputFilter;
use Form\CategoryTrait;
use  Form\ExpireDaysTrait;
use  Form\CaptchaTrait;
use Filter\Float;

class PostFilter extends InputFilter

{

	private $categories;

	public function setCategories ($categories)
	{

		$this->categories = $categories;
	}

public function buildFilter()
	{
		
		
		$expires = new Input('expires');
		$expires->setAllowEmpty(TRUE);
		$expires->getValidatorChain();
			#->attachByName('InArray', array('haystack' => array_keys($this->getExpireDays())));
		$expires->getFilterChain()
			    ->attachByName('StripTags')
				->attachByName('StringTrim');

		
		$this->add($expires);
	}
}