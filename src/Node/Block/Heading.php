<?php declare(strict_types=1);

namespace PrinsFrank\MarkDownDom\Node\Block;

use Override;
use PrinsFrank\MarkDownDom\Contract\BlockNode;
use PrinsFrank\MarkDownDom\Contract\InlineNode;
use PrinsFrank\MarkDownDom\Enum\HeadingLevel;

readonly class Heading implements BlockNode {
    /** @var list<InlineNode|BlockNode> */
    private array $children;

    /** @no-named-arguments */
    public function __construct(
        private HeadingLevel $level,
        InlineNode|BlockNode... $children,
    ) {
        $this->children = $children;
    }

    #[Override]
    public function __toString(): string {
        return str_repeat('#', $this->level->value)
            . ' '
            . implode('', $this->children);
    }
}
