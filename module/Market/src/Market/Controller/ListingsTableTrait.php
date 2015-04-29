<?php


namespace Market\Controller;

  trait ListingsTableTrait
{
	private $listingstable;
	
	public function setListingsTable($ListingsTable)
	{
		$this->listingstable = $ListingsTable;
		
	}
	
}