<?php

namespace spec\Just\MetaData;

use Just\MetaData\MetaDataInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MetaDataSpec extends ObjectBehavior
{
    function it_accepts_a_title_description_and_array_of_images()
    {
        $this->beConstructedWith('title', 'description', []);
        $this->getTitle()->shouldReturn('title');
        $this->getDescription()->shouldReturn('description');
        $this->getImages()->shouldReturn([]);
    }

    function it_can_create_itself_object_by_calling_with_interface(MetaDataInterface $interface)
    {
        $interface->getMetaDataTitle()->willReturn('title');
        $interface->getMetaDataDescription()->willReturn('description');
        $interface->getMetaDataImages()->willReturn([]);

        $this->beConstructedThrough('fromInterface', [$interface]);

        $this->getTitle()->shouldReturn('title');
        $this->getDescription()->shouldReturn('description');
        $this->getImages()->shouldReturn([]);
    }
}