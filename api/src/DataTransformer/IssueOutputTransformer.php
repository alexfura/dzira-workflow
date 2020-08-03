<?php declare(strict_types=1);

namespace App\DataTransformer;

use ApiPlatform\Core\DataTransformer\DataTransformerInterface;
use App\Dto\IssueOutput;
use App\Entity\Issue;
use App\Repository\StateRepository;

class IssueOutputTransformer implements DataTransformerInterface
{
    private StateRepository $stateRepository;

    public function __construct(StateRepository $stateRepository)
    {
        $this->stateRepository = $stateRepository;
    }

    /**
     * @param Issue $object
     * @param string $to
     * @param array $context
     * @return IssueOutput|object
     */
    public function transform($object, string $to, array $context = [])
    {
        $issueOutput = new IssueOutput();
        $issueOutput->copyDataFromIssue($object);

        return $issueOutput;
    }

    public function supportsTransformation($data, string $to, array $context = []): bool
    {
        return IssueOutput::class === $to && $data instanceof Issue;
    }
}
