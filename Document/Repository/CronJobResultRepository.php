<?php
namespace ColourStream\Bundle\CronBundle\Document\Repository;
use ColourStream\Bundle\CronBundle\Document\CronJob;
use ColourStream\Bundle\CronBundle\Document\CronJobResult;
use Doctrine\ODM\MongoDB\DocumentRepository;

class CronJobResultRepository extends DocumentRepository
{
    public function deleteOldLogs(CronJob $job = null)
    {
        if($job)
        {
            $jobs = [$job];
        }
        else
        {
            $jobs = $this->getDocumentManager()->getRepository('ColourStreamCronBundle:CronJob')->findAll();
        }
        foreach($jobs as $job)
        {
            $results = $this->createQueryBuilder()
                ->hydrate(false)
                ->select('id')
                ->field('result')->equals(CronJobResult::SUCCEEDED)
                ->field('job')->equals($job->getId())
                ->sort('runAt', 'DESC')
                ->skip(10) // We skip the 10 first results, being the 10 last results
                ->getQuery()
                ->execute();

            $this->createQueryBuilder()
                ->remove()
                ->field('id')->in(array_keys($results->toArray()))
                ->getQuery()
                ->execute();
        }
    }
}
