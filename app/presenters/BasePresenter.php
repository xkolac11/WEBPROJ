<?php

use Nette\Application\UI;
use Nette\Application\UI\Form;

/**
 * Base presenter for all application presenters.
 */
abstract class BasePresenter extends Nette\Application\UI\Presenter
{

	/** @var object list of items, which we want to add to breadcrumb menu (used by addToEndNavigation()) */
    protected $listToNav;

    /** @var Navigation Navigation object */
    protected $nav;

    /** @var Navigation last valid subnode */
    protected $lastSubnode = false;
	
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
	
	/**
     * Creates navigation component.
     * @example use in template: {widget navigation:breadcrumb}
     */
    protected function createComponentNavigation($name)
    {
        $navigation = array (
			'Homepage:default' =>
			array (
				'title' => 'Hlavní strana',
				'link' => 'Homepage:default',
				'subdirs' =>
				array (
					'Forum:show' =>
					array (
						'title' => 'Sekce',
						'link' => 'Section:default',
						'subdirs' =>
						array (
						),
					),
				),
			),
		);

        $this->nav = new Navigation($this, $name);

        $this->nav = $this->addNavigationNode($navigation, $this->nav);

        $this->addToEndNavigation($this->listToNav);

    }

    /**
    * Recursive function, which goes throw all 'subdirs' in $nav_submenu
    * and tries to find current link and create breadcrumb navigation.
    *
    * @param    Navigation  menu tree
    * @param    Navigation  navigation node
    * @return   Navigation  navigation object
    */
    protected function addNavigationNode($nav_submenu, $subnode)
    {
        if(count($nav_submenu) == 0){
            return $this->nav;
        }

        foreach($nav_submenu AS $link=>$info){
            $node = $subnode->add($info['title'], $this->link($info['link']), false);

            // set homepage link
            if(!$this->lastSubnode){
                $this->lastSubnode = $node;
            }

            // set current link
            if($this->isLinkCurrent($link) && $this->nav != $subnode){ // $nav != $subnode ...we don't want to show pagination on root site
                $this->lastSubnode = $node;
                $this->nav->setCurrentNode($node);
            }
            $this->addNavigationNode($info['subdirs'], $node);
        }
        return $this->nav;
    }

    /**
     * Gets lastSubnode from this object.
     * @return  Navigation  last valid subnode
     */
    protected function getLastSubnode()
    {
        return $this->lastSubnode;
    }

    /**
     * Adds a list of items to the top-page navigation.
     * @param   object
     * @example addToEndNavigation(array('Presenter:action' => array("title" => "..title..", "link" => "Presenter:action" ), (.....), .... ));
     */
    protected function addToEndNavigation($item_list)
    {
        if($item_list){
            foreach($item_list AS $item){
                if(!isset($item['link_args'])){
                    $item['link_args'] = array();
                }
                $node = $this->lastSubnode->add($item['title'], $this->link($item['link'], $item['link_args']), (isset($item['nolink']) && $item['nolink'] === "true" ? true : false));
                $this->lastSubnode = $node;
            }
            $this->nav->setCurrentNode($this->lastSubnode);
        }
    }
	

}
