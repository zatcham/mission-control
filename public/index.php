<?php

require_once ("../vendor/autoload.php");
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

$loader = new FilesystemLoader('../templates');
$twig = new Environment($loader);

$config = json_decode(file_get_contents("../config/config.json"), true);

try {
    echo $twig->render('page.html.twig',
        ['page_name' => $config['site_name'],
            'config' => $config,
        ]);
} catch (\Twig\Error\LoaderError $e) {
    echo ("Error loading page : Twig loader error");
} catch (\Twig\Error\RuntimeError $e) {
    echo ("Error loading page : Twig runtime error");
} catch (\Twig\Error\SyntaxError $e) {
    echo ("Error loading page : Twig syntax error");
}
