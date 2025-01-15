<?php

namespace app\core\middlewares;

use app\core\App;
use app\core\exception\ForbiddenException;

class PartnerMiddleware extends BaseMiddleware
{
    protected array $actions = [];

    public function __construct($actions = [])
    {
        $this->actions = $actions;
    }

    public function execute()
    {
        if (App::isPartner()) {
            if (empty($this->actions) || in_array(App::$app->controller->action, $this->actions)) {
                throw new ForbiddenException();
            }
        }

    }
}