<?php
namespace models;
use lib\BaseDeDatos,
    PDO;

class producto{
    private ?int $id;
    private ?int $categoria_id;
    private string $nombre;
    private string $descripcion;
    private float $precio;
    private int $stock;
    private string $oferta;
    private string $fecha;
    private string $imagen;
    private BaseDeDatos $db;
    private mixed $sql;

    public function __construct(?int $id=null, int $categoria_id=null, string $nombre='', string $descripcion='', float $precio=0, int $stock=0, string $oferta='', string $fecha='', string $imagen='')
    {
        $this->id=$id;
        $this->categoria_id=$categoria_id;
        $this->nombre=$nombre;
        $this->descripcion=$descripcion;
        $this->precio=$precio;
        $this->stock=$stock;
        $this->oferta=$oferta;
        $this->fecha=$fecha;
        $this->imagen=$imagen;
        $this->db=new BaseDeDatos();
    }

    public static function fromArray(array $array): array
    {
        $productos=[];
        foreach ($array as $producto){
            $productos[]=new producto(
                $producto['id']??null,
                $producto['categoria_id']??null,
                $producto['nombre']??'',
                $producto['descripcion']??'',
                $producto['precio'],$producto['stock']??0,
                $producto['oferta'],$producto['fecha']??'',
                $producto['imagen'])??'';
        }
        return $productos;
    }

    public function getProductoById(int $id)
    {
        $errores='';
        try{
            $this->sql=$this->db->prepara("SELECT * FROM productos WHERE categoria_id=:id");
            $this->sql->bindParam(':id',$id,PDO::PARAM_INT);
            $this->sql->execute();
            $resultado=$this->sql->fetchAll(PDO::FETCH_ASSOC);

        }catch (\PDOException $e){
            $resultado['error']=$e->getMessage();
        }
        $this->sql->closeCursor();
        $this->sql=null;
        $this->db->cierraConexion();
        return $resultado;

    }
    public function getProductoByIdProducto(){
        if (!session_status() == PHP_SESSION_ACTIVE) {
            session_start();
        }
        if ($_SESSION['productosCarrito']){
            if(count($_SESSION['productosCarrito'])>0){
                $ids=array_keys($_SESSION['productosCarrito']);
                $ids=implode(',',$ids);
                $this->db->consulta("SELECT * FROM productos WHERE id IN ($ids)");
                $resultado=$this->db->extraer_todos();
                $this->db->cierraConexion();
                return $resultado;
            }
        }
        return null;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getCategoriaId(): ?int
    {
        return $this->categoria_id;
    }

    public function setCategoriaId(?int $categoria_id): void
    {
        $this->categoria_id = $categoria_id;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }

    public function getDescripcion(): string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): void
    {
        $this->descripcion = $descripcion;
    }

    public function getPrecio(): float
    {
        return $this->precio;
    }

    public function setPrecio(float $precio): void
    {
        $this->precio = $precio;
    }

    public function getStock(): int
    {
        return $this->stock;
    }

    public function setStock(int $stock): void
    {
        $this->stock = $stock;
    }

    public function getOferta(): string
    {
        return $this->oferta;
    }

    public function setOferta(string $oferta): void
    {
        $this->oferta = $oferta;
    }

    public function getFecha(): string
    {
        return $this->fecha;
    }

    public function setFecha(string $fecha): void
    {
        $this->fecha = $fecha;
    }

    public function getImagen(): string
    {
        return $this->imagen;
    }

    public function setImagen(string $imagen): void
    {
        $this->imagen = $imagen;
    }


}
