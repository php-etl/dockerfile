<?php

declare(strict_types=1);

namespace Kiboko\Component\Dockerfile\PHP;

use Kiboko\Component\Dockerfile\Dockerfile;

final class ComposerMinimumStability implements Dockerfile\LayerInterface
{
    private string $minimumStability;

    public function __construct(string $minimumStability)
    {
        $this->minimumStability = $minimumStability;
    }

    public function __toString()
    {
        return (string) new Dockerfile\Run(sprintf(<<<RUN
            set -ex \\
                && composer config minimum-stability %s
            RUN, $this->minimumStability));
    }
}
