<?php

namespace app\core;

class View
{
    public string $title = '';

    public function renderView($view, array $params)
    {

        $layoutName = App::$app->layout;
        $viewContent = $this->renderViewOnly($view, $params);
        ob_start();
        include_once App::$ROOT_DIR."/views/layouts/$layoutName.view.php";
        $layoutContent = ob_get_clean();
        return str_replace('{{CONTENT}}', $viewContent, $layoutContent);

    }

    public function renderViewOnly($view, array $params)
    {
        foreach ($params as $key => $value) {
            $$key = $value;
        }
        ob_start();
        include_once App::$ROOT_DIR."/views/$view.view.php";
        return ob_get_clean();
    }

}