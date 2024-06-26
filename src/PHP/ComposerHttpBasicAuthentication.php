<?php

declare(strict_types=1);

namespace Kiboko\Component\Dockerfile\PHP;

use Kiboko\Component\Dockerfile\Dockerfile;

final readonly class ComposerHttpBasicAuthentication implements Dockerfile\LayerInterface, \Stringable
{
    public function __construct(
        private string $url,
        private string $username,
        private string $password,
    ) {
    }

    public function __toString(): string
    {
        return (string) new Dockerfile\Run(sprintf(<<<'RUN'
            set -ex \
                && composer config --auth http-basic.%s %s %s
            RUN, $this->url, $this->username, $this->password));
    }
}
