<?php

namespace Rinsvent\Data2DTODoctrineDocumentBundle\Service;

use Rinsvent\Data2DTO\Transformer\Meta;

#[\Attribute]
class Document extends Meta
{
    public const TYPE = 'service';

    public function __construct(
        public string $class,
        public string $primaryType = 'id',
    ) {}
}
