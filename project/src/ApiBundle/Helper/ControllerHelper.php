<?php
namespace ApiBundle\Helper;

use JMS\Serializer\DeserializationContext;
use Symfony\Component\HttpFoundation\Response;
use JMS\Serializer\SerializationContext;

trait ControllerHelper
{
    /**
     * Set base HTTP headers.
     *
     * @param Response $response
     *
     * @return Response
     */
    private function setBaseHeaders(Response $response)
    {
        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');

        return $response;
    }

    /**
     * Data serializing via JMS serializer.
     *
     * @param mixed $data
     *
     * @return string JSON string
     */
    public function serialize($data)
    {
        $context = new SerializationContext();
        $context->setSerializeNull(true);

        return $this->get('jms_serializer')
            ->serialize($data, 'json', $context);
    }

    /**
     * Data deserializing via JMS serializer.
     *
     */
    public function deserialize($data, $type)
    {
        $context = new DeserializationContext();
        $context->setSerializeNull(true);

        return $this->get('jms_serializer')
            ->deserialize($data, $type,'json', $context);
    }


}