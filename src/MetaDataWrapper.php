<?php

namespace Just\MetaData;

class MetaDataWrapper
{
    /**
     * @var MetaDataDefaults
     */
    private $defaults;

    /**
     * @var MetaData
     */
    private $metaData;

    /**
     * @param MetaDataDefaults $defaults
     */
    public function __construct(MetaDataDefaults $defaults)
    {
        $this->defaults = $defaults;
    }

    /**
     * @param MetaDataInterface $interface
     * @return $this
     */
    public function fromInterface(MetaDataInterface $interface)
    {
        return $this->fromData($interface->getMetaDataTitle(), $interface->getMetaDataDescription(), $interface->getMetaDataCustomContent());
    }

    /**
     * @param string $title
     * @param string $description
     * @param array  $customMetaData
     *
     * @return $this
     */
    public function fromData($title, $description, array $customMetaData = [])
    {
        foreach($customMetaData as $md) {
            if (! $md instanceof CustomMetaData) {
                throw new \InvalidArgumentException('Custom data must be an CustomMetaData object');
            }
        }
        
        $this->metaData = new MetaData(
            $this->formatTitle($title),
            $this->formatDescription($description),
            $customMetaData,
            $this->defaults->getBaseUrl(),
            $this->defaults->getCurrentUrl()
        );

        return $this;
    }

    /**
     * @return MetaData
     */
    public function getMetaData()
    {
        return $this->metaData ?: (new MetaData(
            $this->defaults->getSiteName() . ' — ' . $this->defaults->getPayoff(),
            $this->defaults->getDefaultDescription(),
            [],
            $this->defaults->getBaseUrl(),
            $this->defaults->getCurrentUrl())
        );
    }

    /**
     * @param $title
     * @return string
     */
    private function formatTitle($title)
    {
        if ($name = $this->defaults->getSiteName()) {
            if ($title) {
                $title .= ' — ';
            }

            $title .= $this->defaults->getSiteName();
        }

        return $title;
    }

    /**
     * @param $description
     * @return string
     */
    private function formatDescription($description)
    {
        return $description ?: $this->defaults->getDefaultDescription();
    }
}
