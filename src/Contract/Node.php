<?php declare(strict_types=1);

namespace PrinsFrank\MarkDownDom\Contract;

use Override;
use Stringable;

interface Node extends Stringable {
    #[Override]
    public function __toString(): string;
}
