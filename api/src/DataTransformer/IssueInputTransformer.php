<?php declare(strict_types=1);

namespace App\DataTransformer;

use ApiPlatform\Core\DataTransformer\DataTransformerInterface;
use ApiPlatform\Core\Validator\ValidatorInterface;
use App\Dto\IssueInput;
use App\Entity\Issue;

class IssueInputTransformer implements DataTransformerInterface
{
    /**
     * @var ValidatorInterface $issueInputValidator
     */
    private ValidatorInterface $issueInputValidator;

    public function __construct(ValidatorInterface $issueInputValidator)
    {
        $this->issueInputValidator = $issueInputValidator;
    }

    /**
     * @param object|IssueInput $object
     * @param string $to
     * @param array $context
     * @return Issue|object
     * @throws \Exception
     */
    public function transform($object, string $to, array $context = [])
    {
        $this->issueInputValidator->validate($object);

        $issue = new Issue();
        $object->toIssue($issue);

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