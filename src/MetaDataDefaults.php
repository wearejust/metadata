<?php

namespace Just\MetaData;

class MetaDataDefaults
{
    /**
     * @var string
     */
    private $siteName;

    /**
     * @var string
     */
    private $defaultDescription;

    /**
     * @var string
     */
    private $baseUrl;

    /**
     * @var string
     */
    private $fullUrl;

    /**
     * @var string
     */
    private $payoff;

    /**
     * @param string $siteName
     * @param string $payoff
     * @param string $defaultDescription
     * @param string $baseUrl
     * @param string $fullUrl
     */
    public function __construct($siteName, $payoff, $defaultDescription, $baseUrl, $fullUrl)
    {
        $this->siteName = $siteName;
        $this->defaultDescription = $defaultDescription;
        $this->baseUrl = $baseUrl;
        $this->fullUrl = $fullUrl;
        $this->payoff = $payoff;
    }

    /**
     * @return string
     */
    public function getSiteName()
    {
        return $this->siteName;
    }

    /**
     * @return string
     */
    public function getDefaultDescription()
    {
        return $this->defaultDescription;
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
        return $this->fullUrl;
    }

    /**
     * @return string
     */
    public function getPayoff()
    {
        return $this->payoff;
    }
}
