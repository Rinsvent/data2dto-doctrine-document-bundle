<?php

namespace Rinsvent\Data2DTODoctrineDocumentBundle\Service;

use Doctrine\ODM\MongoDB\DocumentManager;
use Rinsvent\Data2DTO\Transformer\Meta;
use Rinsvent\Data2DTOBundle\Service\AbstractTransformer;

class DocumentTransformer extends AbstractTransformer
{
    public function __construct(
        protected DocumentManager $dm
    ) {}

    /**
     * @param $data
     * @param Document $meta
     */
    public function transform(&$data, Meta $meta): void
    {
        if ($meta->primaryType === 'id' && !is_int($data)) {
            return;
        }
        if ($meta->primaryType === 'uuid' && !is_string($data)) {
            return;
        }
        $repository = $this->dm->getRepository($meta->class);
        $data = $repository->find($data);
    }
}
