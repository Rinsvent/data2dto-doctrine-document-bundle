<?php

namespace Rinsvent\Data2DTODoctrineDocumentBundle\Service;

use Doctrine\ODM\MongoDB\DocumentManager;
use Rinsvent\Transformer\Transformer\Meta;
use Rinsvent\TransformerBundle\Service\AbstractTransformer;

class DocumentTransformer extends AbstractTransformer
{
    public function __construct(
        protected DocumentManager $dm
    ) {
    }

    /**
     * @param $data
     * @param Document $meta
     */
    public function transform(mixed $data, Meta $meta): mixed
    {
        $repository = $this->dm->getRepository($meta->class);
        try {
            return $repository->find($data);
        } catch (\Throwable) {
            return $data;
        }
    }
}
