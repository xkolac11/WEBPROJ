<?php

/**
 * Homepage presenter.
 */
class HomepagePresenter extends BasePresenter
{

	private $sections;
	private $forums;

	protected function startup()
	{
		parent::startup();

		if (!$this->getUser()->isLoggedIn()) {
			$this->redirect('Sign:in');
		}
		
		$this->sections = $this->context->sections;
		$this->forums = $this->context->forums;				
	}
	

	public function renderDefault()
	{
		//vsechny sekce serazene podle abecedy
		
		$res = $this->sections->getAllAsc();
		$this->template->results = Array();
		
		
		foreach ($res as $key=>$val){
			$this->template->results[$key]['section'] = $val;
			//pozor, pole se cisluje od 0
			$this->template->results[$key]['forums'] = $this->forums->getForumsBySectionId($val->id);
			$this->template->results[$key]['forums_count'] = count($this->template->results[$key]['forums']);
		}
		
			
	}
	
	/** components **/

	


}
