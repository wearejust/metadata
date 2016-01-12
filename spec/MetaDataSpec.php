<?php

namespace spec\Just\MetaData;

use Just\MetaData\MetaDataInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MetaDataSpec extends ObjectBehavior
{
    function it_accepts_a_title_description_and_array_of_images()
    {
        $this->beConstructedWith('title', 'description', [], 'baseurl', 'fullurl');
        $this->getTitle()->shouldReturn('title');
        $this->getDescription()->shouldReturn('description');
        $this->getImages()->shouldReturn([]);
        $this->getBaseUrl()->shouldReturn('baseurl');
        $this->getCurrentUrl()->shouldReturn('fullurl');
    }
}