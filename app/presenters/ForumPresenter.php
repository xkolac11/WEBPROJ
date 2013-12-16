<?php

/**
 * Forum presenter.
 */
class ForumPresenter extends BasePresenter
{

	private $forums;
	private $forum;
	private $forum_id;

	protected function startup()
	{
		parent::startup();

		if (!$this->getUser()->isLoggedIn()) {
			$this->redirect('Sign:in');
		}
		
		$this->forums = $this->context->forums;				
	}
	
	public function renderDefault()
	{
		
			
	}
	
	public function actionShow($id){
		$this->forum = $this->forums->getById($id);
		if($this->forum == FALSE){
			$this->setView('notFound');
		}
	}
	
	public function renderShow($id){
		$this->template->forum = $this->forum;
		$ent = $this->template->forum;
		
		$sec = $this->forums->getForumSection($id);
		
		$this->listToNav = array(
						'Sections:default' => array('title' => $sec->title, 'link' => 'Section:show'. $sec->id),
						$this->presenter->getName().':show' =>
    					array(
							'title' => htmlspecialchars($ent->title),
    						'link' => $this->presenter->getName().':default'
    					)
    			);
	}
	
	/** components **/
	

}
