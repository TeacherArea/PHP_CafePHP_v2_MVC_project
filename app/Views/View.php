<?php

class View {
    public function render($page, $data = []) {
        extract($data);
        include __DIR__ . "/../../public_html/pages/{$page}.php";
    }
}
