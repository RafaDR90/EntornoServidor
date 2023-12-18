<?php
namespace models;
use lib\BaseDeDatos,
    PDO,
    PDOException;
use utils\utils;
use utils\ValidationUtils;

class usuario{
    private string|null $id;
    private string $nombre;
    private string $apellidos;
    private string $email;
    private string $password;
    private string $rol;

    private BaseDeDatos $db;

    public function __construct(string|null $id, string $nombre, string $apellidos, string $email, string $password, string $rol)
    {
        $this->db=new BaseDeDatos();
        $this->id=$id;
        $this->nombre=$nombre;
        $this->apellidos=$apellidos;
        $this->email=$email;
        $this->password=$password;
        $this->rol=$rol;
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }

    public function getApellidos(): string
    {
        return $this->apellidos;
    }

    public function setApellidos(string $apellidos): void
    {
        $this->apellidos = $apellidos;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getRol(): string
    {
        return $this->rol;
    }

    public function setRol(string $rol): void
    {
        $this->rol = $rol;
    }

    public static function fromArray(array $data):usuario{
        return new usuario(
            $data['id']?? null,
            $data['nombre']??'',
            $data['apellidos']??'',
            $data['email']??'',
            $data['password']??'',
            'user',
        );
    }

    public function validaUsuario($usuario){
        //saneamos los datos
        $usuario->setNombre(ValidationUtils::sanidarStringFiltro($usuario->getNombre()));
        $usuario->setApellidos(ValidationUtils::sanidarStringFiltro($usuario->getApellidos()));
        $usuario->setEmail(filter_var($usuario->getEmail(),FILTER_SANITIZE_EMAIL));
        $usuario->setPassword(ValidationUtils::sanidarStringFiltro($usuario->getPassword()));
        //Valida Nombre
        if (empty($usuario->getNombre())){
            return $error='El nombre no puede estar vacio';
        }else if (!ValidationUtils::son_letras($usuario->getNombre())){
            return $error='El nombre solo puede contener letras';
        }else if (!ValidationUtils::TextoNoEsMayorQue($usuario->getNombre(),30)){
            return $error='El nombre no puede tener mas de 30 caracteres';
        }
        //Valida Apellidos
        if (empty($usuario->getApellidos())){
            return $error='Los apellidos no pueden estar vacios';
        }else if (!ValidationUtils::son_letras($usuario->getApellidos())){
            return $error='Los apellidos solo pueden contener letras';
        }else if (!ValidationUtils::TextoNoEsMayorQue($usuario->getApellidos(),50)){
            return $error='Los apellidos no pueden tener mas de 50 caracteres';
        }
        //Valida Email
        if (empty($usuario->getEmail())){
            return $error='El email no puede estar vacio';
        }else if (filter_var($usuario->getEmail(),FILTER_VALIDATE_EMAIL)){
            return $error='El email no es valido';
        }
        //Valida Password
        if (empty($usuario->getPassword())){
            return $error='La contraseña no puede estar vacia';
        }else if (!ValidationUtils::validarContrasena($usuario->getPassword())) {
            return $error = 'La contraseña no es valida';
        }else if(!ValidationUtils::TextoNoEsMayorQue($usuario->getPassword(),70)){
            return $error='La contraseña no puede tener mas de 70 caracteres';
        }
        $error=null;
        return $error;
    }
    public function obtenerPassword($email){
        $select= $this->db->prepara("SELECT * FROM usuarios WHERE email = :email");
        $select->bindValue(':email', $email);
        $select->execute();
        return $resultados = $select->fetch(PDO::FETCH_ASSOC);
    }

    public function login(){
        $result=false;
        $email = $this->getEmail();
        $password=$this->getPassword();
        $usuario=$this->buscaMail($email);
        if ($usuario !==false){
            $verify=password_verify($password,$usuario->password);
            if ($verify){
                return $usuario;
            }
        }

    }
    public function buscaMail($email){
        $cons=$this->db->prepara("SELECT * FROM usuarios WHERE email=:email");
        $cons->bindValue(':email',$email,PDO::PARAM_STR);
        try{
            $cons->execute();
            if ($cons && $cons->rowCount()==1){
                $result=$cons->fetch(PDO::FETCH_OBJ);
            }
        }catch (PDOException $err){
            $result=false;
        }
        return $result;
    }
    public function validar(){}

    public function sanear(){}

}