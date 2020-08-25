<?php
require_once 'model/user.php';

class UserController
{
    private $model;

    public function __CONSTRUCT()
    {
        $this->model = new User();
    }
    
    public function dashboard()
    {
        require_once 'view/header.php';
        require_once 'view/message.php';
        require_once 'view/footer.php';
    }

    public function index()
    {
        require_once 'view/header.php';
        require_once 'view/message.php';
        require_once 'view/indextables.php';
        require_once 'view/footer.php';
    }

    public function delete() {
        $this->model->delete($_REQUEST['id']);
        $msg = database::encryptor('encrypt', 'Usuario Eliminado Satisfactoriamente!!') ;
        $err = database::encryptor('encrypt', 0) ; 
        header("location: index.php?c=".database::encryptor('encrypt', 'user')."user&a=".database::encryptor('encrypt', 'index')."&m=".$msg.'&e='.$err);
    }

    public function edit() {
    
        if(!isset($_REQUEST['id'])) {
            $select1 = null;
            $select2 = null;
            $id     = null;
            $name   = null;
            $email  = null;
            $level  = null;
            $button = 'CREAR NUEVO USUARIO';
        } else {
            $id = $_REQUEST['id'];
            $row = $this->model->view($id);
            $name   = $row->name;
            $email  = $row->email;
            $level  = $row->level;
            if ($level  == 1) {
                $select1 = 'selected';
                $select2 =  null;
            } else {
                $select2 = 'selected';
                $select1 =  null;
            }
            $button = 'ACTUALIZAR DATOS DEL USUARIO';
        }
    
        require_once 'view/header.php';
        require_once 'view/message.php';
        require_once 'view/user/edit.php';
        require_once 'view/footer.php';
    }

    public function crud() {
        $id     = $_REQUEST['id'];
        $name   = $_REQUEST['name'];
        $email  = $_REQUEST['email'];
        $level  = $_REQUEST['level'];


        $err = database::encryptor('encrypt', 0);

        if ($id == null) {            
            $lastId = $this->model->create($name, $email, $level);
            mkdir('documents/'.$lastId, 0700);
            $msg = database::encryptor('encrypt', 'Usuario Creado Satisfactoriamente!!') ; 
        } else {
            $this->model->update($name, $email, $level, $id);
            $msg = database::encryptor('encrypt', 'Usuario Actualizado Satisfactoriamente!!');  
        }
        header("location: index.php?c=".database::encryptor('encrypt', 'user')."user&a=".database::encryptor('encrypt', 'index')."&m=".$msg.'&e='.$err);
    }

    public function login()
    {
        require_once 'view/message.php';
        require_once 'view/user/login.php';
        require_once 'view/footer.php';
    }

    public function validate($email, $password)
    {   
        $msg = database::encryptor('encrypt', 'Datos de ingreso errados!!') ;
        $err = database::encryptor('encrypt', 1) ; 
        $row = $this->model->validate($email, $password);
        if ($row != false) {
            $this->model->lastAccess($row->id);
            $_SESSION['idUser'] = $row->id;
            $_SESSION['nameUser'] = $row->name;
            $msg = database::encryptor('encrypt', 'Bienvenido al sistema!!!') ;
            $err = database::encryptor('encrypt', 0) ;  
        } 
        header('location: index.php?m='.$msg.'&e='.$err);
          
    }

    public function logout() {
        $_SESSION = array();
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httpnly"]   
            );
        }
        session_destroy();
        header('location: index.php');
    }

    public function upload() {
        $id = database::encryptor('decrypt', $_REQUEST['id']);
        require_once 'view/header.php';
        require_once 'view/message.php';
        require_once 'view/user/upload.php';
        require_once 'view/footer.php';
    }

    public function uploadFile()
    {

        $id = $_REQUEST['id'];

        $err = database::encryptor('encrypt', 0);
        $msg = database::encryptor('encrypt', 'Documento Subido Satisfactoriamente!!!');

        $target_dir = "documents/$id/";

        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0700);
        }
        /* 
        move_uploaded_file($_FILES["file"]["tmp_name"], $target_dir.$_FILES['file']['name']);
        */
        if($_FILES['file']['type'] == "application/pdf") {
            move_uploaded_file($_FILES["file"]["tmp_name"], $target_dir."cedula.pdf");
        
        } else if ($_FILES['file']['type'] == "image/jpeg") {
            move_uploaded_file($_FILES["file"]["tmp_name"], $target_dir."cedula.jpg");
        } else if ($_FILES['file']['type'] == "image/png") {
            move_uploaded_file($_FILES["file"]["tmp_name"], $target_dir."cedula.png");

        }else if ($_FILES['file']['type'] == "image/png") {
            move_uploaded_file($_FILES["file"]["tmp_name"], $target_dir."cedula.png");
        
        } else {   
            $err = database::encryptor('encrypt', 1);
            $msg = database::encryptor('encrypt', 'Documento Subido No Validos!!!');
        }


        header("location: index.php?c=".database::encryptor('encrypt', 'user')."user&a=".database::encryptor('encrypt', 'index')."&m=".$msg.'&e='.$err);
    }
    public function viewDoc(){
        $id = Database:: encryptor('decrypt', $_REQUEST['id']);
        require_once 'view/header.php';
        require_once 'view/message.php';
        require_once 'view/user/viewDoc.php';
        require_once 'view/footer.php';
    }
    
}