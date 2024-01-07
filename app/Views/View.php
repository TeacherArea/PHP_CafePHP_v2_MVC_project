<?php
class View
{
    public function render($page)
    {
        include __DIR__ . '/../../public_html/pages/' . $page . '.php';
    }
}
