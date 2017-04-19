<?php

namespace spec\Just\MetaData;

use Just\MetaData\CustomMetaData;
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
        $interface->getMetaDataCustomContent()->willReturn([]);

        $this->fromInterface($interface);

        $this->getMetaData()->shouldBeAnInstanceOf(MetaData::class);
    }

    function it_only_accepts_custom_content_as_object(MetaDataInterface $interface)
    {
        $interface->getMetaDataTitle()->willReturn('title');
        $interface->getMetaDataDescription()->willReturn('description');
        $interface->getMetaDataCustomContent()->willReturn([
            new CustomMetaData('og:image', 'imagefile')
        ]);

        $this->fromInterface($interface);

        $this->getMetaData()->getCustomContent()->shouldReturnArrayOfSpecialTypes();


        $interface->getMetaDataTitle()->willReturn('title');
        $interface->getMetaDataDescription()->willReturn('description');
        $interface->getMetaDataCustomContent()->willReturn([
            'blablabla'
        ]);


        $this->shouldThrow(new \InvalidArgumentException("Custom data must be an CustomMetaData object"))->during('fromInterface', array($interface));
    }

    public function getMatchers()
    {
        return array(
            'returnArrayOfSpecialTypes' => function($mySpecialTypes) {
                foreach ($mySpecialTypes as $element) {
                    if (!$element instanceof CustomMetaData) {
                        return false;
                    }
                }
                return true;
            }
        );
    }
}
