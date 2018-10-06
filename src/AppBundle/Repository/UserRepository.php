<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class UserRepository extends EntityRepository
{
	public function findAllUserByRoles($city)
	{
        $query = $this->getEntityManager()
                ->createQuery("
                SELECT u FROM AppBundle:User u
                WHERE u.roles LIKE :roles AND u.city = :city"
        );
        $query->setParameter('roles', '%ROLE_COIFFEUR%');
        $query->setParameter('city', $city);
 
        return $query->getResult();
	}

        public function findAllUserAdmin()
        {
        $query = $this->getEntityManager()
                ->createQuery("
                SELECT u FROM AppBundle:User u
                WHERE u.roles != :roles "
        );
        $query->setParameter('roles', 'ROLE_SUPER_ADMIN');
 
        return $query->getResult();
        }


}