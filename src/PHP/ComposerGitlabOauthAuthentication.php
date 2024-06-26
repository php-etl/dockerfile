<?php

declare(strict_types=1);

namespace Kiboko\Component\Dockerfile\PHP;

use Kiboko\Component\Dockerfile\Dockerfile;

final readonly class ComposerGitlabOauthAuthentication implements Dockerfile\LayerInterface, \Stringable
{
    public function __construct(
        private string $token,
        private string $instance = 'gitlab.com',
    ) {
    }

    public function __toString(): string
    {
        return (string) new Dockerfile\Run(sprintf(<<<'RUN'
            set -ex \
                && composer config --auth gitlab-oauth.%s %s
            RUN, $this->instance, $this->token));
    }
}
