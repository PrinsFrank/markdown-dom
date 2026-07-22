<?php declare(strict_types=1);

namespace PrinsFrank\MarkDownDom\Node\Block;

use Override;
use PrinsFrank\MarkDownDom\Contract\BlockNode;

readonly class Quote implements BlockNode {
    public function __construct(
        private string $quote,
    ) {}

    #[Override]
    public function __toString(): string {
        return '> ' . str_replace("\n", "> \n", $this->quote) . PHP_EOL;
    }
}
