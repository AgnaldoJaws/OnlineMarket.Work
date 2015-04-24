<?php
namespace Market\Form;

use Zend\Form\Element;

use Zend\Form\Form;



class PostForm extends Form
{
	 use  Market\Form\ExpireDaysTrait;
     private $categories;

	public function setCategories($categories)
	{
		$this->categories = $categories;
	}

	#Metodo responsável por fazer a criação dor
	#formulario
	public function buildForm()
	{
		// form tag attributes
		$this->setAttribute('method', 'POST');

		
		$expires = new Element\Radio('expires');
		$expires->setLabel('Expires')
		->setAttribute('title', 'The expiration date will be calculated from today')
		->setAttribute('class', 'expiresButton')
		->setValueOptions($this->getExpireDays());

		$submit = new Element\Submit('submit');
		$submit->setAttribute('value', 'Post');

		$this->add($expires)

		->add($submit);
	}
}