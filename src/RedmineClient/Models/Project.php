<?php

namespace RedmineClient\Models;

class Project extends BaseModel
{
    protected $identifier;

    protected $description;

    protected $createdOn;

    protected $updatedOn;

    protected $parent;

    protected $name;

    protected $id;

    public function getIdentifier()
    {
        return $this->identifier;
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

    public function getParent()
    {
        return $this->parent;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getId()
    {
        return $this->id;
    }
}
