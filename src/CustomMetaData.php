<?php

namespace Just\MetaData;

class CustomMetaData
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $content;

    /**
     * @var string
     */
    private $type;

    /**
     * @param string $name
     * @param string $content
     * @param string $type
     */
    public function __construct($name, $content, $type = 'property')
    {
        $this->name = $name;
        $this->content = $content;
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }
}
