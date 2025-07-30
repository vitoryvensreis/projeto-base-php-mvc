<?php
namespace App\Models;

use Core\Model;

class Teste extends Model
{
    public function check()
    {
        try {
            $stmt = $this->db->query("SELECT NOW() as data_atual");
            $result = $stmt->fetch(\PDO::FETCH_ASSOC);

            return [
                'php_version' => phpversion(),
                'conexao' => true,
                'data_banco' => $result['data_atual'] ?? 'Erro na data'
            ];
        } catch (\PDOException $e) {
            return [
                'php_version' => phpversion(),
                'conexao' => false,
                'erro' => $e->getMessage()
            ];
        }
    }
}
