<?php declare(strict_types=1);

namespace PrinsFrank\MarkDownDom\Node\Inline;

use Override;
use PrinsFrank\MarkDownDom\Contract\InlineNode;

readonly class Bold implements InlineNode {
    /** @var list<InlineNode> */
    private array $children;

    /** @no-named-arguments */
    public function __construct(
        InlineNode... $children,
    ) {
        $this->children = $children;
    }

    #[Override]
    public function __toString(): string {
        return '**' . implode('', $this->children) . '**';
    }
}
