<?php

namespace Just\MetaData;

interface MetaDataInterface
{
    /**
     * @return string
     */
    public function getMetaDataTitle();

    /**
     * @return string
     */
    public function getMetaDataDescription();

    /**
     * @return array|CustomMetaData[]
     */
    public function getMetaDataCustomContent();
}
