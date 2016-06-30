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
    private $customContent;

    /**
     * @var string
     */
    private $baseUrl;

    /**
     * @var string
     */
    private $currentUrl;

    /**
     * @param string|null $title
     * @param string|null $description
     * @param array       $customContent
     * @param string      $baseUrl
     * @param string      $currentUrl
     */
    public function __construct($title, $description, $customContent = [], $baseUrl, $currentUrl)
    {
        $this->title = $title;
        $this->description = $description;
        $this->customContent = $customContent;
        $this->baseUrl = $baseUrl;
        $this->currentUrl = $currentUrl;
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
    public function getCustomContent()
    {
        return $this->customContent;
    }

    /**
     * @return string
     */
    public function getBaseUrl()
    {
        return $this->baseUrl;
    }

    /**
     * @return string
     */
    public function getCurrentUrl()
    {
        return $this->currentUrl;
    }
}
