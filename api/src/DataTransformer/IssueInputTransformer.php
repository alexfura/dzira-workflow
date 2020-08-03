<?php declare(strict_types=1);

namespace App\DataTransformer;

use ApiPlatform\Core\DataTransformer\DataTransformerInterface;
use App\Dto\IssueInput;
use App\Entity\Issue;
use App\Validator\IssueValidator;

class IssueInputTransformer implements DataTransformerInterface
{
    private IssueValidator $issueValidator;

    public function __construct(IssueValidator $issueValidator)
    {
        $this->issueValidator = $issueValidator;
    }

    /**
     * @param object|IssueInput $object
     * @param string $to
     * @param array $context
     * @return Issue|object
     */
    public function transform($object, string $to, array $context = [])
    {
        $issue = new Issue();
        $object->copyDataToIssue($issue);

        return $issue;
    }

    /**
     * @param array|object $data
     * @param string $to
     * @param array $context
     * @return bool
     */
    public function supportsTransformation($data, string $to, array $context = []): bool
    {
        if($data instanceof Issue) {
            return false;
        }

        return Issue::class === $to && null !== ($context['input']['class'] ?? null);
    }
}