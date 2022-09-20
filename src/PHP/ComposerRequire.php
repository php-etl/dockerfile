<?php

declare(strict_types=1);

namespace Kiboko\Component\Dockerfile\PHP;

use Kiboko\Component\Dockerfile\Dockerfile;

final class ComposerRequire implements Dockerfile\LayerInterface
{
    private iterable $packages;

    public function __construct(string ...$packages)
    {
        $this->packages = $packages;
    }

    public function __toString()
    {
        return (string) new Dockerfile\Run(sprintf(<<<RUN
            set -ex \\
                && composer require --prefer-dist --no-progress --prefer-stable --sort-packages --optimize-autoloader --with-dependencies %s
            RUN, implode(' ', $this->packages)));
    }
}
