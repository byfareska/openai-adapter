<?php

declare(strict_types=1);

/*
 * This file is part of the Modelflow AI package.
 *
 * (c) Johannes Wachter <johannes@sulu.io>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ModelflowAi\OpenaiAdapter;

use ModelflowAi\Embeddings\Adapter\EmbeddingAdapterInterface;
use ModelflowAi\Embeddings\Adapter\EmbeddingsAdapterFactoryInterface;
use ModelflowAi\OpenaiAdapter\Embeddings\OpenaiEmbeddingAdapter;
use OpenAI\Contracts\ClientContract;

final readonly class OpenaiEmbeddingsAdapterFactory implements EmbeddingsAdapterFactoryInterface
{
    public function __construct(
        private ClientContract $client,
    ) {
    }

    public function createEmbeddingAdapter(array $options): EmbeddingAdapterInterface
    {
        $model = \str_replace('gpt', 'gpt-', $options['model']);

        return new OpenaiEmbeddingAdapter(
            $this->client,
            $model,
        );
    }
}
