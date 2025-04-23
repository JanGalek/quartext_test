<?php

namespace App\UI\UserForm;

use App\Core\Model\User;
use App\Core\Model\UserRepository;
use Nette\Application\UI\Control;
use Nette\Application\UI\Form;

class UserForm extends Control
{
    public array $onSuccess = [];

    protected ?User $user = null;

    public function __construct(private  UserRepository $repository)
    {
    }

    protected function createComponentForm(): Form
    {
        $form = new Form;

        $form->addText('name', 'Jméno')
            ->setRequired('Zadejte jméno');

        $form->addEmail('email', 'Email')
            ->setRequired('Zadejte e-mail.');

        $form->addDate('birthdate', ' Datum narození')
            ->setRequired('Zadejte datum narození.');

        $form->addSubmit('submit', 'Odeslat');
        $form->getElementPrototype()->addAttributes(['class' => 'ajax']);

        $form->onSuccess[] = $this->processForm(...);

        return $form;
    }

    public function processForm(Form $form, \stdClass $values): void
    {

        $uuid = $this->repository->create(
            $values->name,
            $values->email,
            $values->birthdate,
        );

        $this->user = $this->repository->findById($uuid);
        $this->onSuccess($uuid);
        $this->redrawControl();
    }

    public function render(): void
    {
        $this->template->setFile(__DIR__ . '/userForm.latte');
        $this->template->isOlder = $this->user?->isOlderThan(20);
        $this->template->render();
    }
}