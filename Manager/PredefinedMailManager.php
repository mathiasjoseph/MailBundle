<?php
/**
 * Created by PhpStorm.
 * User: miky
 * Date: 02/10/16
 * Time: 02:41
 */

namespace Miky\Bundle\MailBundle\Manager;


use Miky\Bundle\CoreBundle\Doctrine\BaseEntityManager;
use Miky\Bundle\MailBundle\Model\PredefinedMail;


class PredefinedMailManager extends BaseEntityManager
{

    /**
     * Constructor.
     * @param $em
     * @param string $class
     */
    public function __construct($em, $class)
    {
        parent::__construct($em, $class);
    }

    /**
     * {@inheritDoc}
     */
    public function deletePredefinedMail(PredefinedMail $predefinedMail)
    {
        $this->entityManager->remove($predefinedMail);
        $this->entityManager->flush();
    }

    public function getClass()
    {
        return $this->class;
    }

    public function findPredefinedMailBy(array $criteria)
    {
        return $this->repository->findOneBy($criteria);
    }

    public function findPredefinedMailByName($name)
    {
        return $this->repository->findOneBy(array("name" => $name));
    }

    public function findPredefinedMailsBy(array $criteria)
    {
        return $this->repository->findBy($criteria);
    }

    public function findPredefinedMails()
    {
        return $this->repository->findAll();
    }

    public function reloadPredefinedMail(PredefinedMail $predefinedMail)
    {
        $this->entityManager->refresh($predefinedMail);
    }

    /**
     * Updates a PredefinedMail.
     *
     * @param PredefinedMail $predefinedMail
     * @param Boolean $andFlush Whether to flush the changes (default true)
     */
    public function updatePredefinedMail(PredefinedMail $predefinedMail, $andFlush = true)
    {
        $this->entityManager->persist($predefinedMail);
        if ($andFlush) {
            $this->entityManager->flush();
        }
    }

    /**
     * Returns an empty PredefinedMail instance
     *
     * @return PredefinedMail
     */
    public function createPredefinedMail()
    {
        $class = $this->getClass();
        $predefinedMail = new $class;
        return $predefinedMail;
    }




    public function supportsClass($class)
    {
        return $class === $this->getClass();
    }
}