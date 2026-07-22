<?php declare(strict_types=1);

namespace PrinsFrank\MarkDownDom\Node\Inline;

use Override;
use PrinsFrank\MarkDownDom\Contract\InlineNode;

readonly class Link implements InlineNode {
    public function __construct(
        private string $text,
        private string $href,
    ) {}

    #[Override]
    public function __toString(): string {
        return sprintf(
            '[%s](%s)',
            $this->text,
            $this->href,
        );
    }
}
