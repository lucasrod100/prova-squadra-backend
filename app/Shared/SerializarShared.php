<?php


namespace App\Shared;


class SerializarShared
{
    public static function json($data)
    {
        $serializer = \JMS\Serializer\SerializerBuilder::create()->build();
        $jsonContent = $serializer->serialize($data, 'json');
        return $jsonContent;
    }

    public static function xml($data)
    {
        $serializer = \JMS\Serializer\SerializerBuilder::create()->build();
        $xmlContent = $serializer->serialize($data, 'xml');
        return $xmlContent;
    }
}
