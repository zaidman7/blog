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

namespace LaravelJsonApi\Contracts\Server;

use LaravelJsonApi\Contracts\Encoder\Encoder;
use LaravelJsonApi\Contracts\Resources\Container as ResourceContainer;
use LaravelJsonApi\Contracts\Schema\Container as SchemaContainer;
use LaravelJsonApi\Contracts\Store\Store;
use LaravelJsonApi\Core\Document\JsonApi;

interface Server
{

    /**
     * Get the server's name.
     *
     * @return string
     */
    public function name(): string;

    /**
     * Get the server's JSON:API object.
     *
     * @return JsonApi
     */
    public function jsonApi(): JsonApi;

    /**
     * Get the server's schemas.
     *
     * @return SchemaContainer
     */
    public function schemas(): SchemaContainer;

    /**
     * Get the server's resources.
     *
     * @return ResourceContainer
     */
    public function resources(): ResourceContainer;

    /**
     * Get the server's store.
     *
     * @return Store
     */
    public function store(): Store;

    /**
     * Get the server's encoder.
     *
     * @return Encoder
     */
    public function encoder(): Encoder;

    /**
     * Determine if the server is authorizable.
     *
     * @return bool
     */
    public function authorizable(): bool;

    /**
     * Get a URL for the server.
     *
     * @param mixed|array $extra
     * @param bool|null $secure
     * @return string
     */
    public function url($extra = [], bool $secure = null): string;
}
