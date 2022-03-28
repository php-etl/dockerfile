<?php

declare(strict_types=1);

namespace Kiboko\Component\Dockerfile\PHP;

use Kiboko\Component\Dockerfile\Dockerfile;

final class ComposerAddVcsRepository implements Dockerfile\LayerInterface
{
    public function __construct(
        private string $name,
        private string $url
    ) {}

    public function __toString()
    {
        return (string) new Dockerfile\Run(sprintf(<<<RUN
            set -ex \\
                && composer config repositories.%s vcs %s
            RUN, $this->name, $this->url));
    }
}
