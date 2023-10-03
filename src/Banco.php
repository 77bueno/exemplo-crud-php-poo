<?php
namespace ExemploCrudPdo;

use PDO, Exception;

abstract class Banco {
    /* Propriedades/atributos estáticos
    para acesso ao Banco */
    private static string $servidor = "localhost";
    private static string $usuario = "root";
    private static string $senha = "";
    private static string $banco = "vendas";

    /* Classes internar do próprio PHP (como é o caso da PDO)
    precisam do use NomeDaClasse OU de uma barra invertida
    no momento da criação (como abaixo:)
    private static \PDO $conexao ;*/ 

    private static PDO $conexao ; // Se for desta forma, é usado "use PDO"
    
    /* Método de conexão ao banco (será usado pelas outras classes) */ 
    public static function conecta():PDO {
        try {
            self::$conexao = new PDO(
                "mysql:host=".self::$servidor.
                ";dbname=".self::$banco.
                ";charset=utf8",
                self::$usuario, self::$senha
            ); 
            
            self::$conexao->setAttribute(
                PDO::ATTR_ERRMODE, 
                PDO::ERRMODE_EXCEPTION
            );
        } catch(Exception $erro){
            die("Deu ruim: ".$erro->getMessage());
        }
        return self::$conexao;
    }
}; // FIM DA CLASSE BANCO

Banco::conecta();