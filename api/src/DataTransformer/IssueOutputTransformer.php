<?php declare(strict_types=1);

namespace App\DataTransformer;

use ApiPlatform\Core\DataTransformer\DataTransformerInterface;
use App\Dto\IssueOutput;
use App\Entity\Issue;

class IssueOutputTransformer implements DataTransformerInterface
{
    /**
     * @param Issue $object
     * @param string $to
     * @param array $context
     * @return IssueOutput|object
     */
    public function transform($object, string $to, array $context = [])
    {
        $issueOutput = new IssueOutput();
        $issueOutput->fromIssue($object);

        return $issueOutput;
    }

    /**
     * @param array|object $data
     * @param string $to
     * @param array $context
     * @return bool
     */
    public function supportsTransformation($data, string $to, array $context = []): bool
    {
        return IssueOutput::class === $to && $data instanceof Issue;
    }
}
