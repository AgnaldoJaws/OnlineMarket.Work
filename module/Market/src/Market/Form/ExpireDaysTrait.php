<?php
namespace Market\Form;

class ExpireDaysTrait
{
    
	protected $expireDays;
	
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