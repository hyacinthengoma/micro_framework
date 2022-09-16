<?php

namespace Plugo\Controller;
abstract class AbstractController{

    protected function renderView(string $template, array $data = []): string
    {
        $templatePath = dirname(__DIR__, 2) . '/template/pages/' . $template;
        return require_once dirname(__DIR__, 2) . '/template/layout.php';

    }
protected function redirectToRoute(string $name, array $params = []): void {
    $uri = $_SERVER['SCRIPT_NAME'] . "?page=" . $name;


    if (!empty($params)) {
        $strParams = [];
        foreach ($params as $key => $val) {
            array_push($strParams, urlencode((string) $key) . '=' . urlencode((string) $val));
        }
        $uri .= '&' . implode('&', $strParams);
    }

    header("Location: " . $uri);
    die;
}
}