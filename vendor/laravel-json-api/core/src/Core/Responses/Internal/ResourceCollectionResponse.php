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

namespace LaravelJsonApi\Core\Responses\Internal;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use LaravelJsonApi\Core\Document\Links;
use LaravelJsonApi\Core\Json\Hash;
use LaravelJsonApi\Core\Resources\ResourceCollection;
use LaravelJsonApi\Core\Responses\Concerns\HasEncodingParameters;
use LaravelJsonApi\Core\Responses\Concerns\IsResponsable;

class ResourceCollectionResponse implements Responsable
{

    use HasEncodingParameters;
    use IsResponsable;

    /**
     * @var ResourceCollection
     */
    private ResourceCollection $resources;

    /**
     * ResourceCollectionResponse constructor.
     *
     * @param ResourceCollection $resources
     */
    public function __construct(ResourceCollection $resources)
    {
        $this->resources = $resources;
    }

    /**
     * @return Links
     */
    public function links(): Links
    {
        return $this->resources->links()->merge(
            $this->links ?: new Links()
        );
    }

    /**
     * @return Hash
     */
    public function meta(): Hash
    {
        return Hash::cast($this->resources->meta())->merge(
            $this->meta ?: []
        );
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function toResponse($request)
    {
        $encoder = $this->server()->encoder();

        $document = $encoder
            ->withRequest($request)
            ->withIncludePaths($this->includePaths($request))
            ->withFieldSets($this->sparseFieldSets($request))
            ->withResources($this->resources)
            ->withJsonApi($this->jsonApi())
            ->withMeta($this->meta())
            ->withLinks($this->links())
            ->toJson($this->encodeOptions);

        return new Response(
            $document,
            Response::HTTP_OK,
            $this->headers()
        );
    }

}
