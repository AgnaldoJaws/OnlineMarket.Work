<?php



namespace Market\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class PostController extends AbstractActionController
{

	use ListingsTableTrait;
	public $categories;
	private $postForm;
	
	

	#esta função possibilita a injeção
	#de um formulario
	public function setPostForm($postForm)
	{
		
		
		$this->postForm = $postForm;
	}

	public function setCategories($categories)
	{
			
			
		$this->categories = $categories;
	}

	public function indexAction()
	{
		#pega os dados vindos vindos via post
		$data = $this->params()->fromPost();
		#pega o fomualrio
		#$this->postForm->setData($data);
		#resolver vai direto pro templete
		#ao invez de ir para o index
		$viewModel = new ViewModel(array('postForm'=>$this->postForm, 'data'=>$data));
		#$viewModel->setTemplate("market/post/invalid.phtml");
		# o valor está sendo forçado
		$viewModel->setTemplate('market/post/index.phtml');

		if ($this->getRequest()->isPost()){
			$this->postForm->setData($data);

			if ($this->postForm->isValid()){
				$this->flashMessenger()->addMessage("Thanks for posting");
				$this->redirect()->toRoute('market-view');

			} else {

				$invalidView = new ViewModel();
				$invalidView->setTemplate('market/post/invalid.phtml');
				$invalidView->addChild($viewModel, 'main');
				return $invalidView;
			}
		}

		return $viewModel;

	}


}
