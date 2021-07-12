<?php

namespace Just\MetaData;

use Illuminate\Support\Str;

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
     * @param array $images
     * @param string $baseUrl
     * @param string $currentUrl
     */
    public function __construct($title, $description, $baseUrl, $currentUrl, $images = [])
    {
        $this->title = $title;
        $this->description = $description;
        $this->images = $images;
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
        return preg_replace('/\s+/', ' ', Str::limit(strip_tags($this->description), 158));
    }

    /**
     * @return array
     */
    public function getImages()
    {
        return $this->images;
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
