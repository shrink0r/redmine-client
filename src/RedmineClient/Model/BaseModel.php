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
            $altName = strtolower(preg_replace('/([a-z])([A-Z])/', '$1_$2', $propName));

            if (isset($data[$propName]))
            {
                // default camelcase fields
                $this->$propName = $data[$propName];
            }
            elseif (isset($data[$altName]))
            {
                // also allow underscore fieldname spelling
                $this->$propName = $data[$altName];
            }
        }
    }
}
