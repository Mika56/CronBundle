<?php
namespace ColourStream\Bundle\CronBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @MongoDB\Document(repositoryClass="ColourStream\Bundle\CronBundle\Document\Repository\CronJobRepository")
 */
class CronJob
{
    /**
     * @MongoDB\Id
     * @var integer $id
     */
    protected $id;
    
    /**
     * @var string $command
     * @MongoDB\String
     */
    protected $command;
    /**
     * @var string $description
     * @MongoDB\String
     */
    protected $description;
    
    /**
     * @var string $interval
     * @MongoDB\String
     */
    protected $interval;
    /**
     * @MongoDB\Date
     * @var \DateTime $nextRun
     */
    protected $nextRun;
    /**
     * @MongoDB\Boolean
     * @var boolean $enabled
     */
    protected $enabled;
    
    /**
     * @MongoDB\ReferenceMany(targetDocument="CronJobResult", mappedBy="job", simple=true, cascade={"remove"})
     * @var ArrayCollection
     */
    protected $results;
    /**
     * @MongoDB\ReferenceOne(targetDocument="CronJobResult", simple=true)
     * @var CronJobResult
     */
    protected $mostRecentRun;
    public function __construct()
    {
        $this->results = new ArrayCollection();
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
     * Set command
     *
     * @param string $command
     */
    public function setCommand($command)
    {
        $this->command = $command;
    }

    /**
     * Get command
     *
     * @return string 
     */
    public function getCommand()
    {
        return $this->command;
    }

    /**
     * Set description
     *
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set interval
     *
     * @param string $interval
     */
    public function setInterval($interval)
    {
        $this->interval = $interval;
    }

    /**
     * Get interval
     *
     * @return string 
     */
    public function getInterval()
    {
        return $this->interval;
    }

    /**
     * Set nextRun
     *
     * @param \DateTime $nextRun
     */
    public function setNextRun(\DateTime $nextRun)
    {
        $this->nextRun = $nextRun;
    }

    /**
     * Get nextRun
     *
     * @return \DateTime
     */
    public function getNextRun()
    {
        return $this->nextRun;
    }

    /**
     * Add results
     *
     * @param CronJobResult $results
     */
    public function addCronJobResult(CronJobResult $results)
    {
        $this->results[] = $results;
    }

    /**
     * Get results
     *
     * @return Collection
     */
    public function getResults()
    {
        return $this->results;
    }

    /**
     * Set mostRecentRun
     *
     * @param CronJobResult $mostRecentRun
     */
    public function setMostRecentRun(CronJobResult $mostRecentRun)
    {
        $this->mostRecentRun = $mostRecentRun;
    }

    /**
     * Get mostRecentRun
     *
     * @return CronJobResult
     */
    public function getMostRecentRun()
    {
        return $this->mostRecentRun;
    }

    /**
     * Set enabled
     *
     * @param boolean $enabled
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;
    }

    /**
     * Get enabled
     *
     * @return boolean 
     */
    public function getEnabled()
    {
        return $this->enabled;
    }
}