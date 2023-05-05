<?php
/*
 * Copyright 2023 Cloud Creativity Limited
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

declare(strict_types=1);

namespace LaravelJsonApi\Core;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Contracts\Container\Container;
use LaravelJsonApi\Contracts\Routing\Route;
use LaravelJsonApi\Contracts\Server\Repository;
use LaravelJsonApi\Contracts\Server\Server;
use LogicException;

class JsonApiService
{

    /**
     * @var string
     */
    public const JSON_API_VERSION = '1.0';

    /**
     * @var Container
     */
    private Container $container;

    /**
     * JsonApiService constructor.
     *
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    /**
     * @return Route
     */
    public function route(): Route
    {
        try {
            return $this->container->make(Route::class);
        } catch (BindingResolutionException $ex) {
            throw new LogicException(
                'No bound JSON:API route - your application may not be handling an HTTP request.',
                0,
                $ex
            );
        }
    }

    /**
     * Get the active server, or a named server.
     *
     * @param string|null $name
     * @return Server
     */
    public function server(string $name = null): Server
    {
        if (is_string($name)) {
            return $this->servers()->server($name);
        }

        try {
            return $this->container->make(Server::class);
        } catch (BindingResolutionException $ex) {
            throw new LogicException(
                'No bound JSON:API server - your application may not be handling an HTTP request.',
                0,
                $ex
            );
        }
    }

    /**
     * Get the active server, if there is one.
     *
     * @return Server|null
     */
    public function serverIfExists(): ?Server
    {
        if ($this->container->bound(Server::class)) {
            return $this->server();
        }

        return null;
    }

    /**
     * @return Repository
     */
    private function servers(): Repository
    {
        return $this->container->make(Repository::class);
    }
}
