<?php

declare(strict_types=1);

namespace App\Presentation\Home;

use App\UI\UserForm\UserForm;
use App\UI\UserForm\UserFormFactory;
use Nette;


final class HomePresenter extends Nette\Application\UI\Presenter
{
    public function __construct(protected UserFormFactory $userFormFactory)
    {

    }

    protected function createComponentUserForm(): UserForm
    {
        return $this->userFormFactory->create();
    }
}
