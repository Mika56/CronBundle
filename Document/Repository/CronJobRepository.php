<?php
namespace ColourStream\Bundle\CronBundle\Document\Repository;
use Doctrine\ODM\MongoDB\DocumentRepository;

class CronJobRepository extends DocumentRepository
{
    public function getKnownJobs()
    {
        $data = $this->createQueryBuilder()
            ->hydrate(false)
            ->getQuery()
            ->execute();
        $toRet = array();
        foreach($data as $datum)
        {
            $toRet[] = $datum['command'];
        }
        return $toRet;
    }
    
    public function findDueTasks()
    {
        return $this->createQueryBuilder()
            ->field('nextRun')->lte(new \DateTime())
            ->field('enabled')->equals(true)
            ->getQuery()
            ->execute();
    }
}
