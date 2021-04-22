<?php
namespace App\Dao;

interface InterfaceDao
{
    public function add($object);
    public function update($object);
    public function delete($object);
    public function find($id);
    public function getList($where);
    public function query($query);
}
?>
