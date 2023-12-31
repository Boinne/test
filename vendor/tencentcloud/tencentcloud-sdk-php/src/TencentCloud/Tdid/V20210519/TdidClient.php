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

namespace TencentCloud\Tdid\V20210519;

use TencentCloud\Common\AbstractClient;
use TencentCloud\Common\Profile\ClientProfile;
use TencentCloud\Common\Credential;
use TencentCloud\Tdid\V20210519\Models as Models;

/**
 * @method Models\CheckChainResponse CheckChain(Models\CheckChainRequest $req) 该接口不再使用

检查区块链信息
 * @method Models\CreateCredentialResponse CreateCredential(Models\CreateCredentialRequest $req) 该接口不再使用

创建凭证
 * @method Models\CreateSelectiveCredentialResponse CreateSelectiveCredential(Models\CreateSelectiveCredentialRequest $req) 该接口不再使用

创建选择性批露凭证
 * @method Models\CreateTDidResponse CreateTDid(Models\CreateTDidRequest $req) 该接口不再使用

创建机构DID
 * @method Models\CreateTDidByPrivateKeyResponse CreateTDidByPrivateKey(Models\CreateTDidByPrivateKeyRequest $req) 该接口不再使用

新建DID根据私钥生成Tdid
 * @method Models\CreateTDidByPublicKeyResponse CreateTDidByPublicKey(Models\CreateTDidByPublicKeyRequest $req) 该接口不再使用

 新建DID根据公钥生成Tdid
 * @method Models\GetAuthorityIssuerResponse GetAuthorityIssuer(Models\GetAuthorityIssuerRequest $req) 该接口不再使用

获取权威机构信息
 * @method Models\GetCptInfoResponse GetCptInfo(Models\GetCptInfoRequest $req) 该接口不再使用

凭证模版详情
 * @method Models\GetCredentialStatusResponse GetCredentialStatus(Models\GetCredentialStatusRequest $req) 该接口不再使用

获取凭证链上状态信息
 * @method Models\GetDidDocumentResponse GetDidDocument(Models\GetDidDocumentRequest $req) 该接口不再使用

查看DID文档

 * @method Models\RegisterCptResponse RegisterCpt(Models\RegisterCptRequest $req) 该接口不再使用

凭证模版新建
 * @method Models\SetCredentialStatusResponse SetCredentialStatus(Models\SetCredentialStatusRequest $req) 该接口不再使用

设置凭证链上状态
 * @method Models\VerifyCredentialResponse VerifyCredential(Models\VerifyCredentialRequest $req) 该接口不再使用

验证凭证
 */

class TdidClient extends AbstractClient
{
    /**
     * @var string
     */
    protected $endpoint = "tdid.tencentcloudapi.com";

    /**
     * @var string
     */
    protected $service = "tdid";

    /**
     * @var string
     */
    protected $version = "2021-05-19";

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
        $respClass = "TencentCloud"."\\".ucfirst("tdid")."\\"."V20210519\\Models"."\\".ucfirst($action)."Response";
        $obj = new $respClass();
        $obj->deserialize($response);
        return $obj;
    }
}
