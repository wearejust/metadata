<?php

namespace Just\MetaData\Laravel;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Arr;
use Just\MetaData\Exceptions\InstanceMissmatchException;
use Just\MetaData\MetaData;
use Just\MetaData\MetaDataManager;
use Just\MetaData\MetaDataWrapper;

class ViewComposer
{
    /**
     * @var MetaDataWrapper
     */
    private $wrapper;

    /**
     * @param MetaDataWrapper $wrapper
     */
    public function __construct(MetaDataWrapper $wrapper)
    {
        $this->wrapper = $wrapper;
    }

    /**
     * @param View $view
     * @throws InstanceMissmatchException
     */
    public function compose(View $view)
    {
        $data = Arr::get($view->getData(), 'metaData', $this->wrapper->getMetaData());

        if (!$data instanceof MetaData) {
            throw new InstanceMissmatchException(sprintf('Data [%s] is not an instance of [%s]', gettype($data), MetaData::class));
        }

        $view->with('metaData', $data);
    }
}
