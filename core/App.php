<?php
namespace Core;

class App
{
    // Nome do controller padrão (sem namespace ainda)
    protected $controller = 'HomeController';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseUrl();

        // Monta o caminho completo com namespace
        $controllerName = 'App\\Controllers\\' . ($url[0] ?? $this->controller);

        // Verifica se a classe existe (autoload do Composer cuida disso)
        if (class_exists($controllerName)) {
            $this->controller = $controllerName;
            unset($url[0]);
        } else {
            // Se não existir, ainda usa o controller padrão
            $this->controller = 'App\\Controllers\\' . $this->controller;
        }

        // Instancia o controller
        $this->controller = new $this->controller;

        // Verifica o método
        if (isset($url[1]) && method_exists($this->controller, $url[1])) {
            $this->method = $url[1];
            unset($url[1]);
        }

        // Parâmetros restantes
        $this->params = $url ? array_values($url) : [];

        // Executa o método com os parâmetros
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    private function parseUrl()
    {
        if (isset($_GET['url'])) {
            return explode("/", filter_var(rtrim($_GET['url'], "/"), FILTER_SANITIZE_URL));
        }

        return [];
    }
}
