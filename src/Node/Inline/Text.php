<?php declare(strict_types=1);

namespace PrinsFrank\MarkDownDom\Node\Inline;

use Override;
use PrinsFrank\MarkDownDom\Contract\InlineNode;

readonly class Text implements InlineNode {
    public function __construct(
        private string $content,
    ) {}

    #[Override]
    public function __toString(): string {
        return $this->content;
    }
}
