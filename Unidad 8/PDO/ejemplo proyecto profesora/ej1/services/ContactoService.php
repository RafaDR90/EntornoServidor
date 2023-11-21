<?php
namespace services;
use repositories\ContactoRepository;

class ContactoService{
    private ContactoRepository $repository;

    function __construct()
    {
        $this->repository= new ContactoRepository();
    }
    public function findAll(){
        return $this->repository->findAll();
    }

    public function save(array $contacto){
        return $this->repository->save($contacto);
    }

    public function read(int $id){
        return $this->repository->delete($id);
    }

    public function delete(int $id){
        return $this->repository->delete($id);
    }

    public function filasAfectadas(){
        return $this->repository->filasAfectadas();
    }
}