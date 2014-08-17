<?php
namespace ColourStream\Bundle\CronBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document(repositoryClass="ColourStream\Bundle\CronBundle\Document\Repository\CronJobResultRepository")
 */
class CronJobResult
{
    const RESULT_MIN = 0;
    const SUCCEEDED = 0;
    const FAILED = 1;
    const SKIPPED = 2;
    const RESULT_MAX = 2;
    
    /**
     * @MongoDB\Id
     * @var integer $id
     */
    protected $id;
    
    /**
     * @MongoDB\Date
     * @var \DateTime $runAt
     */
    protected $runAt;
    /**
     * @MongoDB\Float
     * @var float $runTime
     */
    protected $runTime;
    
    /**
     * @MongoDB\Int
     * @var integer $result
     */
    protected $result;
    /**
     * @MongoDB\String
     * @var string $output
     */
    protected $output;
    
    /**
     * @MongoDB\ReferenceOne(targetDocument="CronJob", simple=true, inversedBy="results")
     * @var CronJob
     */
    protected $job;

    public function __construct()
    {
        $this->runAt = new \DateTime();
    }
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set runAt
     *
     * @param \DateTime $runAt
     */
    public function setRunAt(\DateTime $runAt)
    {
        $this->runAt = $runAt;
    }

    /**
     * Get runAt
     *
     * @return \DateTime
     */
    public function getRunAt()
    {
        return $this->runAt;
    }

    /**
     * Set runTime
     *
     * @param float $runTime
     */
    public function setRunTime($runTime)
    {
        $this->runTime = $runTime;
    }

    /**
     * Get runTime
     *
     * @return float 
     */
    public function getRunTime()
    {
        return $this->runTime;
    }

    /**
     * Set result
     *
     * @param integer $result
     */
    public function setResult($result)
    {
        $this->result = $result;
    }

    /**
     * Get result
     *
     * @return integer 
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * Set output
     *
     * @param string $output
     */
    public function setOutput($output)
    {
        $this->output = $output;
    }

    /**
     * Get output
     *
     * @return string 
     */
    public function getOutput()
    {
        return $this->output;
    }

    /**
     * Set job
     *
     * @param CronJob $job
     */
    public function setJob(CronJob $job)
    {
        $this->job = $job;
    }

    /**
     * Get job
     *
     * @return CronJob
     */
    public function getJob()
    {
        return $this->job;
    }
}