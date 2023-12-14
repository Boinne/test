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
namespace TencentCloud\Monitor\V20180724\Models;
use TencentCloud\Common\AbstractModel;

/**
 * DescribePrometheusRegions请求参数结构体
 *
 * @method integer getPayMode() 获取1-预付费，2-后付费，3-全地域（不填默认全地域）
 * @method void setPayMode(integer $PayMode) 设置1-预付费，2-后付费，3-全地域（不填默认全地域）
 */
class DescribePrometheusRegionsRequest extends AbstractModel
{
    /**
     * @var integer 1-预付费，2-后付费，3-全地域（不填默认全地域）
     */
    public $PayMode;

    /**
     * @param integer $PayMode 1-预付费，2-后付费，3-全地域（不填默认全地域）
     */
    function __construct()
    {

    }

    /**
     * For internal only. DO NOT USE IT.
     */
    public function deserialize($param)
    {
        if ($param === null) {
            return;
        }
        if (array_key_exists("PayMode",$param) and $param["PayMode"] !== null) {
            $this->PayMode = $param["PayMode"];
        }
    }
}
