<?php declare(strict_types=1);

namespace PrinsFrank\MarkDownDom;

use Override;
use PrinsFrank\MarkDownDom\Contract\BlockNode;
use PrinsFrank\MarkDownDom\Contract\InlineNode;
use Stringable;

readonly class Document implements Stringable {
    /** @var list<BlockNode|InlineNode> */
    private array $nodes;

    /** @no-named-arguments */
    public function __construct(
        BlockNode|InlineNode... $nodes,
    ){
        $this->nodes = $nodes;
    }

    #[Override]
    public function __toString(): string {
        return implode('', $this->nodes);
    }
}
