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
namespace TencentCloud\Cls\V20201016\Models;
use TencentCloud\Common\AbstractModel;

/**
 * 动态更新索引配置

注意：该功能尚处于内测阶段，如需使用请联系技术支持
 *
 * @method boolean getStatus() 获取动态索引配置开关
注意：此字段可能返回 null，表示取不到有效值。
 * @method void setStatus(boolean $Status) 设置动态索引配置开关
注意：此字段可能返回 null，表示取不到有效值。
 */
class DynamicIndex extends AbstractModel
{
    /**
     * @var boolean 动态索引配置开关
注意：此字段可能返回 null，表示取不到有效值。
     */
    public $Status;

    /**
     * @param boolean $Status 动态索引配置开关
注意：此字段可能返回 null，表示取不到有效值。
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
        if (array_key_exists("Status",$param) and $param["Status"] !== null) {
            $this->Status = $param["Status"];
        }
    }
}
