<?php declare(strict_types=1);

namespace PrinsFrank\MarkDownDom\Node\Block;

use Override;
use PrinsFrank\MarkDownDom\Contract\BlockNode;

readonly class ThematicBreak implements BlockNode {
    #[Override]
    public function __toString(): string {
        return '---' . PHP_EOL;
    }
}
