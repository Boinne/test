<?php
/*
 * Copyright (c) 2017-2018 THL A29 Limited, a Tencent company. All Rights Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *    http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace TencentCloud\Car\V20220110;

use TencentCloud\Common\AbstractClient;
use TencentCloud\Common\Profile\ClientProfile;
use TencentCloud\Common\Credential;
use TencentCloud\Car\V20220110\Models as Models;

/**
 * @method Models\ApplyConcurrentResponse ApplyConcurrent(Models\ApplyConcurrentRequest $req) 本接口用于申请并发。接口超时时间：20秒。
 * @method Models\CreateSessionResponse CreateSession(Models\CreateSessionRequest $req) 本接口用于创建会话。接口超时时间：5秒。
 * @method Models\DestroySessionResponse DestroySession(Models\DestroySessionRequest $req) 销毁会话
 * @method Models\StartPublishStreamResponse StartPublishStream(Models\StartPublishStreamRequest $req) 开始云端推流
 * @method Models\StartPublishStreamWithURLResponse StartPublishStreamWithURL(Models\StartPublishStreamWithURLRequest $req) 开始云端推流到指定URL
 * @method Models\StopPublishStreamResponse StopPublishStream(Models\StopPublishStreamRequest $req) 停止云端推流
 */

class CarClient extends AbstractClient
{
    /**
     * @var string
     */
    protected $endpoint = "car.tencentcloudapi.com";

    /**
     * @var string
     */
    protected $service = "car";

    /**
     * @var string
     */
    protected $version = "2022-01-10";

    /**
     * @param Credential $credential
     * @param string $region
     * @param ClientProfile|null $profile
     * @throws TencentCloudSDKException
     */
    function __construct($credential, $region, $profile=null)
    {
        parent::__construct($this->endpoint, $this->version, $credential, $region, $profile);
    }

    public function returnResponse($action, $response)
    {
        $respClass = "TencentCloud"."\\".ucfirst("car")."\\"."V20220110\\Models"."\\".ucfirst($action)."Response";
        $obj = new $respClass();
        $obj->deserialize($response);
        return $obj;
    }
}
