<?php
namespace App\Controllers;

use Core\Controller; // Importa a classe base
use App\Models\Teste; // Importa o model via namespace

class HomeController extends Controller
{
    public function index()
    {
        $teste = new Teste();
        $dados = $teste->check();
        
        // Chama a view Twig com uma variável "titulo"
        $this->viewTwig('home/index', [
            'titulo' => 'Verificação do Sistema',
            'status' => $dados
        ]);
    }
}
