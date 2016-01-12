<?php

namespace spec\Just\MetaData;

use Just\MetaData\MetaData;
use Just\MetaData\MetaDataDefaults;
use Just\MetaData\MetaDataInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MetaDataWrapperSpec extends ObjectBehavior
{
    function let(MetaDataDefaults $default, MetaData $md)
    {
        $this->beConstructedWith($default, $md);
    }

    function it_can_create_itself_by_options()
    {
        $this->fromData('title2', 'description2', []);

        $this->getMetaData()->shouldBeAnInstanceOf(MetaData::class);
    }

    function it_can_create_itself_object_by_calling_with_interface(MetaDataInterface $interface)
    {
        $interface->getMetaDataTitle()->willReturn('title');
        $interface->getMetaDataDescription()->willReturn('description');
        $interface->getMetaDataImages()->willReturn([]);

        $this->fromInterface($interface);

        $this->getMetaData()->shouldBeAnInstanceOf(MetaData::class);
    }
}
