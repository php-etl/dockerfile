<?php

declare(strict_types=1);

namespace Kiboko\Component\Dockerfile;

use Kiboko\Component\Dockerfile\Dockerfile\LayerInterface;
use Kiboko\Contract\Packaging\FileInterface;

/**
 * @implements \IteratorAggregate<int, LayerInterface>
 */
final class Dockerfile implements \IteratorAggregate, \Countable, FileInterface, \Stringable
{
    /** @var array<int, LayerInterface> */
    private array $layers = [];

    public function __construct(?LayerInterface ...$layers)
    {
        $this->layers = array_values(array_filter($layers, static fn (?LayerInterface $l) => $l !== null));
    }

    public function push(LayerInterface ...$layers): void
    {
        array_push($this->layers, ...$layers);
    }

    public function __toString(): string
    {
        return implode(\PHP_EOL, array_map(fn (LayerInterface $layer) => (string) $layer.\PHP_EOL, $this->layers));
    }

    /**
     * @return \ArrayIterator<int, LayerInterface>
     */
    public function getIterator(): \ArrayIterator
    {
        return new \ArrayIterator($this->layers);
    }

    public function count(): int
    {
        return \count($this->layers);
    }

    /** @return resource */
    public function asResource()
    {
        $resource = fopen('php://temp', 'rb+');
        if ($resource === false) {
            throw new \RuntimeException('Failed to open php://temp stream');
        }
        fwrite($resource, (string) $this);
        fseek($resource, 0, \SEEK_SET);

        return $resource;
    }

    public function getPath(): string
    {
        return 'Dockerfile';
    }
}
