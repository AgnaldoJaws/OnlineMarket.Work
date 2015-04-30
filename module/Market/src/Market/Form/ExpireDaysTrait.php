<?php
namespace Market\Form;

  use Zend\Form\Form;

		trait  ExpireDaysTrait 
  
{
	
	public $expireDays;

	
	/**
	 * @return the $expireDays
	 */
	public function getExpireDays() {
		return $this->expireDays;
	}
	
	/**
	 * @param array $expireDays;
	 */
	public function setExpireDays($expireDays) {

		$this->expireDays = $expireDays;
	}
	
}