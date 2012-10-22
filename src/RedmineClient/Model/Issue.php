<?php

namespace RedmineClient\Model;

class Issue extends BaseModel
{
    protected $doneRatio;

    protected $status;

    protected $description;

    protected $createdOn;

    protected $updatedOn;

    protected $subject;
    
    protected $author;

    protected $startDate;

    protected $assignedTo;

    protected $tracker;

    protected $project;

    protected $id;

    protected $priority;

    public function getDoneRatio()
    {
        return $this->doneRatio;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getCreatedOn()
    {
        return $this->createdOn;
    }

    public function getUpdatedOn()
    {
        return $this->updatedOn;
    }

    public function getSubject()
    {
        return $this->subject;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function getStartDate()
    {
        return $this->startDate;
    }

    public function getAssignedTo()
    {
        return $this->assignedTo;
    }

    public function getTracker()
    {
        return $this->tracker;
    }

    public function getProject()
    {
        return $this->project;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getPriority()
    {
        return $this->priority;
    }
}
