<?php

declare(strict_types=1);

namespace Kiboko\Component\Dockerfile\PHP;

use Kiboko\Component\Dockerfile\Dockerfile;

final class ComposerInstall implements Dockerfile\LayerInterface
{
    public function __toString()
    {
        return (string) new Dockerfile\Run(
            <<<RUN
            set -ex \\
                && composer install --prefer-dist --no-progress --prefer-stable --sort-packages --optimize-autoloader --no-dev
            RUN
        );
    }
}
