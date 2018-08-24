<?php

class UserDAO {

    private $debug;
    private $pdo;

    public function __construct() {
        $this->pdo = new Banco();
        $this->debug = true;
    }

    public function cadastrar(User $user) {
        try {
            $sql = "INSERT INTO users(user_name, user_lastname, user_document, user_genre, user_telephone, user_cell, user_email, 
                user_password, user_registration, user_level, user_status) VALUES (:name, :lastname, :document, :genre, :telephone, :cell, :email, 
                :password, :registration, :level, :status)";
            $param = array(
                ":name" => $user->getUser_name(),
                ":lastname" => $user->getUser_lastname(),
                ":document" => $user->getUser_document(),
                ":genre" => $user->getUser_genre(),
                ":telephone" => $user->getUser_telephone(),
                ":cell" => $user->getUser_cell(),
                ":email" => $user->getUser_email(),
                ":password" => $user->getUser_password(),
                ":registration" => $user->getUser_registration(),
                ":level" => $user->getUser_level(),
                ":status" => $user->getUser_status(),
            );
            return $this->pdo->ExecuteNonQuery($sql, $param);
        } catch (PDOException $e) {
            if ($this->debug):
                echo "Erro {$e->getMessage()}, LINE {$e->getLine()}";
            else:
                return null;
            endif;
        }
    }

    //atualizar
    public function Atualizar(User $user) {
        try {
            $sql = "UPDATE users SET user_name = :name, user_lastname = :lastname, user_document = :document, user_genre = :genre, 
                user_telephone = :telephone, user_cell = :cell, user_email = :email, user_password = :password, user_level = :level,
                user_status = :status, user_lastupdate = :lastupdate WHERE user_id = :id";
            $param = array(
                ":name" => $user->getUser_name(),
                ":lastname" => $user->getUser_lastname(),
                ":document" => $user->getUser_document(),
                ":genre" => $user->getUser_genre(),
                ":telephone" => $user->getUser_telephone(),
                ":cell" => $user->getUser_cell(),
                ":email" => $user->getUser_email(),
                ":password" => $user->getUser_password(),
                ":level" => $user->getUser_level(),
                ":status" => $user->getUser_status(),
                ":lastupdate" => $user->getUser_lastupdate(),
                ":id" => $user->getUser_id()
            );
            return $this->pdo->ExecuteNonQuery($sql, $param);
        } catch (PDOException $e) {
            if ($this->debug):
                echo "Erro {$e->getMessage()}, LINE {$e->getLine()}";
            else:
                return null;
            endif;
        }
    }

    //excluir usuário
    public function Excluir($id) {
        try {
            $sql = "DELETE FROM users WHERE user_id = :id";
            $param = array(":id" => $id);
            return $this->pdo->ExecuteNonQuery($sql, $param);
        } catch (PDOException $e) {
            if ($this->debug):
                echo "Erro {$e->getMessage()}, LINE {$e->getLine()}";
            else:
                return null;
            endif;
        }
    }

    //RETORNO DADOS
    public function returnUser($id) {
        try {
            $sql = "SELECT * FROM users WHERE user_id = :id";
            $param = array(":id" => $id);
            $dt = $this->pdo->ExecuteQueryOneRow($sql, $param);
            $user = new User();
            $user->setUser_name($dt['user_name']);
            $user->setUser_lastname($dt['user_lastname']);
            $user->setUser_document($dt['user_document']);
            $user->setUser_telephone($dt['user_telephone']);
            $user->setUser_cell($dt['user_cell']);
            $user->setUser_email($dt['user_email']);
            $user->setUser_level($dt['user_level']);
            $user->setUser_genre($dt['user_genre']);
            $user->setUser_status($dt['user_status']);
            return $user;
        } catch (PDOException $ex) {
            if ($this->debug) {
                echo "ERRO: {$ex->getMessage()} LINE: {$ex->getLine()}";
            }
            return null;
        }
    }

    //PAGINAÇÃO DE RESULTADOS
    public function Pager($inicio = null, $quantidade = null) {
        try {
            $sql = "SELECT * FROM users ORDER BY user_id DESC LIMIT :inicio, :quantidade";
            $param = array(":inicio" => $inicio, ":quantidade" => $quantidade);
            $dt = $this->pdo->ExecuteQuery($sql, $param);
            $listaUsuario = [];
            foreach ($dt as $pts) {
                $usuario = new User();
                $usuario->setUser_id($pts['user_id']);
                $usuario->setUser_name($pts['user_name']);
                $usuario->setUser_email($pts['user_email']);
                $usuario->setUser_level($pts['user_level']);
                $usuario->setUser_status($pts['user_status']);
                $usuario->setUser_lastupdate($pts['user_lastupdate']);
                $usuario->setUser_lastacess($pts['user_lastaccess']);
                $listaUsuario[] = $usuario;
            }
            return $listaUsuario;
        } catch (PDOException $ex) {
            if ($this->debug) {
                echo "ERRO: {$ex->getMessage()} LINE: {$ex->getLine()}";
            }
            return null;
        }
    }

    //QUANTIDADE DE USUARIOS - METODO AUXILIAR PARA FAZER PAGINAÇÃO DE RESULTADOS
    public function RetornaQtdUser() {
        try {
            $sql = "SELECT count(u.user_id) as total FROM users u";
            $dr = $this->pdo->ExecuteQueryOneRow($sql);
            if ($dr["total"] != null):
                return $dr["total"];
            else:
                return 0;
            endif;
        } catch (PDOException $e) {
            if ($this->debug):
                echo "Erro {$e->getMessage()}, LINE {$e->getLine()}";
            else:
                return null;
            endif;
        }
    }

    //pagina de login - verifica se existe email já cadastrado
    public function verificarEmail($email) {
        try {
            $sql = "SELECT * FROM users WHERE user_status = 1 AND user_email = :email";
            $param = array(":email" => $email);
            $dt = $this->pdo->ExecuteQueryOneRow($sql, $param);
            if ($dt != null) {
                $user = new User();
                $user->setUser_password($dt["user_password"]);
                return $user;
            } else {
                return null;
            }
        } catch (PDOException $ex) {
            if ($this->debug) {
                echo "ERRO: {$ex->getMessage()} LINE: {$ex->getLine()}";
            }
            return null;
        }
    }

    //pagina de login - validação do email e senha
    public function validarUser($email, $password) {
        try {
            $sql = "SELECT user_id, user_name, user_level FROM users WHERE user_email = :email AND user_password = :password";
            $param = array(
                ":email" => $email,
                ":password" => $password
            );
            $dt = $this->pdo->ExecuteQueryOneRow($sql, $param);
            if ($dt != null) {
                $user = new User();
                $user->setUser_id($dt["user_id"]);
                $user->setUser_name($dt["user_name"]);
                $user->setUser_level($dt["user_level"]);
                return $user;
            } else {
                return null;
            }
        } catch (PDOException $ex) {
            if ($this->debug) {
                echo "ERRO: {$ex->getMessage()} LINE: {$ex->getLine()}";
            }
            return null;
        }
    }

    //verifica se estar logado
    public function isLoggedIn() {
        if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
            return false;
        }
        return true;
    }
    //atualizar o último acesso 
    public function lastAccess($id, $lastaccess) {
        try {
            $sql = "UPDATE users SET user_lastaccess = :lastaccess WHERE user_id = :id";
            $param = array(
                ":id" => $id,
                ":lastaccess" => $lastaccess
            );
            return $this->pdo->ExecuteNonQuery($sql, $param);
        } catch (PDOException $e) {
            if ($this->debug):
                echo "Erro {$e->getMessage()}, LINE {$e->getLine()}";
            else:
                return null;
            endif;
        }
    }

}
