<?php

class UserController {

    private $userDAO;

    public function __construct() {
        $this->userDAO = new UserDAO();
    }

    public function cadastrar(User $user) {
        if ($user->getUser_name() != '' && strlen($user->getUser_name()) >= 5 && $user->getUser_status() >= 1 && $user->getUser_status() <= 2):
            return $this->userDAO->cadastrar($user);
        else:
            return false;
        endif;
        
    }

    public function Atualizar(User $user) {
        return $this->userDAO->Atualizar($user);
    }

    //excluir users
    public function Excluir($id) {
        if ($id > 0):
            return $this->userDAO->Excluir($id);
        else:
            return null;
        endif;
    }

    //RETORNO DADOS
    public function returnUser($id) {
        if ($id > 0):
            return $this->userDAO->returnUser($id);
        else:
            return null;
        endif;
    }

    //PAGINAÇÃO DE RESULTADOS
    public function Pager($inicio = null, $quantidade = null) {
        return $this->userDAO->Pager($inicio, $quantidade);
    }

    //QUANTIDADE DE USUARIOS - METODO AUXILIAR PARA FAZER PAGINAÇÃO DE RESULTADOS
    public function RetornaQtdUser() {
        return $this->userDAO->RetornaQtdUser();
    }

    public function verificarEmail($email) {
        return $this->userDAO->verificarEmail($email);
    }

    public function validarUser($email, $password) {
        return $this->userDAO->validarUser($email, $password);
    }

    public function isLoggedIn() {
        return $this->userDAO->isLoggedIn();
    }

    //atualizar o último acesso 
    public function lastAccess($id, $lastaccess) {
        if ($id > 0):
            return $this->userDAO->lastAccess($id, $lastaccess);
        else:
            return null;
        endif;
    }

}
