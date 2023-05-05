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

namespace LaravelJsonApi\Core\Schema\Concerns;

trait ClientIds
{

    /**
     * @var bool
     */
    private bool $clientIds = false;

    /**
     * Mark the ID as accepting client-generated ids.
     *
     * @param bool $bool
     * @return $this
     */
    public function clientIds(bool $bool = true): self
    {
        $this->clientIds = $bool;

        return $this;
    }

    /**
     * Does the resource accept client generated ids?
     *
     * @return bool
     */
    public function acceptsClientIds(): bool
    {
        return $this->clientIds;
    }
}
