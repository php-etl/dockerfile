<?php

declare(strict_types=1);

namespace Kiboko\Component\Dockerfile\PHP;

use Kiboko\Component\Dockerfile\Dockerfile;

final class ComposerConfigForceHttps implements Dockerfile\LayerInterface
{
    public function __toString()
    {
        return (string) new Dockerfile\Run(<<<RUN
            set -ex \\
                && composer config preferred-install dist \
                && composer config disable-tls false \
                && composer config secure-http true
            RUN);
    }
}
