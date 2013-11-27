<?php

use Nette\Application\UI;
use Nette\Application\UI\Form;

/**
 * Base presenter for all application presenters.
 */
abstract class BasePresenter extends Nette\Application\UI\Presenter
{

	public function handleSignOut()
	{
		$this->getUser()->logout();
		$this->redirect('Sign:in');
	}
	
	/** components **/
	public function createComponentSearchForm(){
		
		$form = new Form();
		
		$renderer = $form->getRenderer();
		$form->onSuccess[] = callback($this, 'searchFormSubmitted');
		$form->addText('query', "Hledat...");
		
		// where you want to search
		$form->addCheckbox("ch_sections", "sekce");
		$form->addCheckbox("ch_topics", "témata");
		$form->addCheckbox("ch_posts", "příspěvky");
		$form->addCheckbox("ch_comments", "komentáře");
		$form->addCheckbox("ch_users", "lidé");
		
		$form->addSubmit("submit", "");
		
		return $form;
		
	}
	
	public function searchFormSubmitted(Form $form){
		//todo
	}

}
