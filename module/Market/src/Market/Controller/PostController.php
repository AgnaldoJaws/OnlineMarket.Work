<?php



namespace Market\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class PostController extends AbstractActionController
{

	public $categories;


	public function setCategories($categories)
	{
			
			
		$this->categories = $categories;
	}

	public function indexAction()
	{
		#resolver vai direto pro templete
		#ao invez de ir para o index
		$viewModel = new ViewModel(array('categories'=>$this->categories));
		$viewModel->setTemplate("market/post/invalid.phtml");
		# o valor está sendo forçado
		return $viewModel;
	}
}
