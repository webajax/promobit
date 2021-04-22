<?php

namespace App\Dao;

use App\Dao\InterfaceDao;
use Doctrine\ORM\EntityManagerInterface;


class UserDao implements InterfaceDao 
{
    protected $em;

    public function __construct(EntityManagerInterface $em) 
    {

       $this->em = $em;

    }
    
    public function add($object) 
    {

        try
        {
            $this->em->persist($object);
            $this->em->flush();

        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
        
        return $object;
    }

    public function update($object)
    {
        $this->em->merge($object);
        $this->em->flush();
        return $object;
    }    
    
    public function delete($object) 
    {
        $this->em->remove($object);
        $this->em->flush();
         return $object;
    }

    public function find($id) 
    {
        try 
        {
            $obj = $this->em->find("App\Entity\Entity\User", $id);
            return $obj;
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function getList($where=null) 
    {
        $query = $this->em->createQuery("SELECT u FROM App\Entity\User u $where");
        return $query->getResult();
    }

    public function query($where) 
    {
        $query=$this->em->createQuery($where);
        return $query->getResult();
    }
}
?>
