<?php
// Define o namespace usado pra organizar as classes
namespace Core;

// Importa as classes necessárias do Twig
use Twig\Loader\FilesystemLoader;
use Twig\Environment;

class Controller
{
    // Instância do Twig disponível em qualquer controller que herde esse
    protected $twig;

    public function __construct()
    {
        // Define onde ficam os arquivos .twig (pasta de views)
        $loader = new FilesystemLoader('../app/views');

        // Cria o ambiente do Twig com configurações:
        $this->twig = new Environment($loader, [
            'debug' => true,
            'cache' => false // Pode ativar isso em produção pra mais performance
        ]);

        // Define variáveis globais acessíveis em todas as views
        $this->twig->addGlobal('base_url', base_url());
        $this->twig->addGlobal('app_name', env('APP_NAME', 'Minha Aplicação'));
        $this->twig->addGlobal('ano_atual', date('Y'));
        $this->twig->addGlobal('user_session', $_SESSION['user'] ?? null);
    }

    /**
     * Renderiza uma view em PHP puro (sem Twig)
     * Ex: $this->view('home/index', ['nome' => 'Vitor']);
     */
    protected function view($view, $data = [])
    {
        extract($data);
        require "../app/views/{$view}.php";
    }

    /**
     * Renderiza uma view com Twig
     * Ex: $this->viewTwig('home/index', ['nome' => 'Vitor']);
     */
    protected function viewTwig($template, $data = [])
    {
        echo $this->twig->render("{$template}.twig", $data);
    }
}
