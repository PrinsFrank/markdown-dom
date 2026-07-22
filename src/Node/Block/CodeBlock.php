<?php declare(strict_types=1);

namespace PrinsFrank\MarkDownDom\Node\Block;

use Override;
use PrinsFrank\MarkDownDom\Contract\BlockNode;

readonly class CodeBlock implements BlockNode {
    public function __construct(
        private string $code,
        private ?string $infoString,
    ) {}

    #[Override]
    public function __toString(): string {
        return '```'
            . ($this->infoString ?? '')
            . PHP_EOL
            . $this->code
            . PHP_EOL
            . '```'
            . PHP_EOL;
    }
}
