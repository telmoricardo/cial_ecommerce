<?php

/**
 * Classe abstrata de conexão. Padrão SingleTon.
 * Retorna um objeto PDO pelo método estático getConn();
 */
abstract class Conn {

    private static $Host = HOST;
    private static $User = USER;
    private static $Pass = PASS;
    private static $Dbsa = DBSA;
    private static $Result;
    protected static $Table;
    private static $RowCount;
    private static $Read;

    /** @var PDO */
    private static $Connect = null;

    /**
     * Conecta com o banco de dados com o pattern singleton.
     * Retorna um objeto PDO!
     */
    private static function Conectar() {
        try {
            if (self::$Connect == null):
                $dsn = 'mysql:host=' . self::$Host . ';dbname=' . self::$Dbsa;
                $options = [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'];
                self::$Connect = new PDO($dsn, self::$User, self::$Pass, $options);
            endif;
        } catch (PDOException $e) {
            PHPErro($e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
            die;
        }

        self::$Connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return self::$Connect;
    }

    /** Retorna um objeto PDO Singleton Pattern. */
    protected static function getConn() {
        return self::Conectar();
    }

    public static function getResult() {
        return self::$Result;
    }

    public static function getRowCount() {
        return self::$Result;
    }

    /*
     * Método privado para construção da instrução SQL de UPDATE   
     * @param $arrayDados = Array de dados contendo colunas, operadores e valores   
     * @param $arrayCondicao = Array de dados contendo colunas e valores para condição WHERE   
     * @return String contendo instrução SQL   
     */

    public static function Create(array $Fields) {
        try {
            $tableName = static::$Table;
            $fields = implode(', ', array_keys($Fields));
            $values = ":" . implode(', :', array_keys($Fields));
            $stmt = self::getConn()->prepare("INSERT INTO {$tableName} ($fields) VALUES($values)");
            foreach ($Fields as $key => $value):
                $stmt->bindValue(":$key", $value);
            endforeach;

            $stmt->execute();

            if ($stmt->rowCount() == 1):
                return self::$Result = self::getConn()->lastInsertId();
            endif;
        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
    }

    /*
     * Método público para excluir os dados na tabela   
     * @param $arrayCondicao = Array de dados contendo colunas e valores para condição WHERE - Exemplo array('$id='=>1)   
     * @return Retorna resultado booleano da instrução SQL   
     * http://www.devwilliam.com.br/php/crud-generico-com-php-e-pdo
     */

    public static function Delele($cod_pk, $id) {
        try {
            $tableName = static::$Table;
            $stmt = self::getConn()->prepare("DELETE FROM {$tableName} WHERE {$cod_pk} = :id");
            $stmt->bindValue(":id", $id);
            $stmt->execute();

            if ($stmt->rowCount() == 1):
                self::$Result = true;
                return self::$Result;
            endif;
        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
    }

    /*
     * Método público para atualizar os dados na tabela   
     * @param $arrayDados = Array de dados contendo colunas e valores   
     * @param $arrayCondicao = Array de dados contendo colunas e valores para condição WHERE - Exemplo array('$id='=>1)   
     * @return Retorna resultado booleano da instrução SQL   
     */

    public static function Update(array $Fields, $cod_pk, $id) {
        //DELETE FROM tabela WHERE cod_id = :cod_id
        try {
            $tableName = static::$Table;
            foreach ($Fields as $key => $value):
                $fields[] = "$key = :$key";
            endforeach;

            $fields = implode(', ', $fields);
            $stmt = self::getConn()->prepare("UPDATE {$tableName} SET {$fields} WHERE {$cod_pk} = :id");

            foreach ($Fields as $key => $value):
                $stmt->bindValue(":$key", $value);
                $stmt->bindValue(":id", $id);
            endforeach;
            
            $stmt->execute();
            if ($stmt->rowCount() == 1):
                return self::$Result = true;
            endif;
        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
    }

    //LISTAR TODAS AS TABELAS
    public static function ReadAll() {
        try {
            $tableName = static::$Table;
            $stmt = self::getConn()->prepare("SELECT * FROM {$tableName}");
            $stmt->execute();

            if ($stmt->rowCount() > 0):
                self::$Result = $stmt->fetchAll(PDO::FETCH_OBJ);
                return self::$Result;
            endif;
        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
    }

    //LISTAR TODAS AS TABELAS COM FILT
    public static function ReadByField($field, $value) {
        try {
            $tableName = static::$Table;
            $stmt = self::getConn()->prepare("SELECT * FROM {$tableName} WHERE {$field} = :value");
            $stmt->bindValue(":value", $value);
            $stmt->execute();
            if ($stmt->rowCount() > 0):
                self::$Result = $stmt->fetch(PDO::FETCH_OBJ);
                return self::$Result;
            endif;
        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
    }

    public static function FullRead($Query, array $Fields = null) {
        try {
            $stmt = self::getConn()->prepare($Query);
            if ($Fields != null):
                foreach ($Fields as $key => $value):
                    $stmt->bindValue(":$key", $value);
                endforeach;
            endif;
            $stmt->execute();
            if ($stmt->rowCount() > 0):
                self::$Result = $stmt->fetchAll(PDO::FETCH_OBJ);
                return self::$Result;
            endif;
        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
    }

    /*
     * Método genérico para executar instruções de consulta independente do nome da tabela passada no _construct  
     * @param $sql = Instrução SQL inteira contendo, nome das tabelas envolvidas, JOINS, WHERE, ORDER BY, GROUP BY e LIMIT  
     * @param $arrayParam = Array contendo somente os parâmetros necessários para clásusla WHERE  
     * @param $fetchAll  = Valor booleano com valor default TRUE indicando que serão retornadas várias linhas, FALSE retorna apenas a primeira linha  
     * @return Retorna array de dados da consulta em forma de objetos  
     */

    public function SQLGeneric($sql, $arrayParams = null, $fetchAll = TRUE) {
        try {

            // Passa a instrução para o PDO   
            $stmt = $this->getConn()->prepare($sql);

            // Verifica se existem condições para carregar os parâmetros    
            if (!empty($arrayParams)):
                // Loop para passar os dados como parâmetro cláusula WHERE   
                $cont = 1;
                foreach ($arrayParams as $valor):
                    $stmt->bindValue($cont, $valor);
                    $cont++;
                endforeach;

            endif;
//            var_dump($stmt);
//            die();
            // Executa a instrução SQL    
            $stmt->execute();

            // Verifica se é necessário retornar várias linhas  
            if ($fetchAll):                
                self::$Result = $stmt->fetchAll(PDO::FETCH_OBJ);
                return self::$Result;
            else:
                self::$Result = $stmt->fetch(PDO::FETCH_OBJ);
                return self::$Result;
            endif;

            return self::getResult();
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
    }

}
