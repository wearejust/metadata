<?php

namespace Just\MetaData;

class MetaData
{
    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $description;

    /**
     * @var array
     */
    private $images;

    /**
     * @param string $title
     * @param string $description
     * @param array $images
     */
    public function __construct($title, $description, $images = [])
    {
        $this->title = $title;
        $this->description = $description;
        $this->images = $images;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return array
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * @param MetaDataInterface $interface
     * @return static
     */
    public static function fromInterface(MetaDataInterface $interface)
    {
        return new static(
            $interface->getMetaDataTitle(),
            $interface->getMetaDataDescription(),
            $interface->getMetaDataImages()
        );
    }
}
