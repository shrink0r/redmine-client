<?php

namespace RedmineClient\Model;

abstract class BaseModel
{
    public static function create(array $data = array())
    {
        return new static($data);
    }

    public function __construct(array $data = array())
    {
        if (! empty($data))
        {
            $this->hydrate($data);
        }
    }

    protected function hydrate(array $data)
    {
        $refClass = new \ReflectionClass($this);
        foreach ($refClass->getProperties() as $property)
        {
            $propName = $property->getName();
            if (isset($data[$propName]))
            {
                $this->$propName = $data[$propName];
            }
        }
    }
}
