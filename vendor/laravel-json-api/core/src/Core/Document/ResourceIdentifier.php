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

namespace LaravelJsonApi\Core\Document;

use InvalidArgumentException;
use LaravelJsonApi\Core\Document\Concerns;

class ResourceIdentifier
{
    use Concerns\HasMeta;

    /**
     * @var string
     */
    private string $type;

    /**
     * @var string
     */
    private string $id;

    /**
     * @param array $value
     * @return static
     */
    public static function fromArray(array $value): self
    {
        if (!isset($value['type']) || !isset($value['id'])) {
            throw new InvalidArgumentException('Expecting an array with a type and id.');
        }

        $identifier = new self($value['type'], $value['id']);

        if (isset($value['meta'])) {
            $identifier->setMeta($value['meta']);
        }

        return $identifier;
    }

    /**
     * Fluent constructor.
     *
     * @param string $type
     * @param string $id
     * @return ResourceIdentifier
     */
    public static function make(string $type, string $id): self
    {
        return new self($type, $id);
    }

    /**
     * Is the provided id empty?
     *
     * @param string|null $id
     * @return bool
     */
    public static function idIsEmpty(?string $id): bool
    {
        if (null === $id) {
            return true;
        }

        return '0' !== $id && empty(trim($id));
    }

    /**
     * ResourceIdentifier constructor.
     *
     * @param string $type
     * @param string $id
     */
    public function __construct(string $type, string $id)
    {
        if (empty(trim($type))) {
            throw new InvalidArgumentException('Expecting a non-empty resource type.');
        }

        if (self::idIsEmpty($id)) {
            throw new InvalidArgumentException('Expecting a non-empty resource id.');
        }

        $this->type = $type;
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function type(): string
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function id(): string
    {
        return $this->id;
    }
}
