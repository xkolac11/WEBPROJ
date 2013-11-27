<?php

use Nette\Application\UI;
use Nette\Application\UI\Form;


/**
 * Sign in/out presenters.
 */
class SignPresenter extends BasePresenter
{


	/**
	 * Sign-in form factory.
	 * @return Nette\Application\UI\Form
	 */
	protected function createComponentSignInForm()
	{
		$form = new Form();
		$form->addText('username', 'Uživatelské jméno:', 30, 20);
		$form->addPassword('password', 'Heslo:', 30);
		$form->addCheckbox('persistent', 'Zapamatovat');
		$form->addSubmit('login', 'Přihlásit se');
		$form->onSuccess[] = $this->signInFormSubmitted;
		return $form;
	}


	public function signInFormSubmitted(Form $form)
{
    try {
        $user = $this->getUser();
        $values = $form->getValues();
        if ($values->persistent) {
            $user->setExpiration('+30 days', FALSE);
        }
        $user->login($values->username, $values->password);
        //$this->flashMessage('Přihlášení bylo úspěšné.', 'success');
        $this->redirect('Homepage:');
    } catch (NS\AuthenticationException $e) {
        $form->addError('Neplatné uživatelské jméno nebo heslo.');
    }
}



}
