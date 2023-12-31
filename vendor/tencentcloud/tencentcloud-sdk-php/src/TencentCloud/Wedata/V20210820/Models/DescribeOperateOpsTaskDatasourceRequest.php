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
namespace TencentCloud\Wedata\V20210820\Models;
use TencentCloud\Common\AbstractModel;

/**
 * DescribeOperateOpsTaskDatasource请求参数结构体
 *
 * @method string getProjectId() 获取项目ID
 * @method void setProjectId(string $ProjectId) 设置项目ID
 * @method integer getTaskType() 获取任务类型ID
 * @method void setTaskType(integer $TaskType) 设置任务类型ID
 * @method string getServiceKind() 获取数据源来源/去向
 * @method void setServiceKind(string $ServiceKind) 设置数据源来源/去向
 * @method string getServiceType() 获取数据源类型
 * @method void setServiceType(string $ServiceType) 设置数据源类型
 */
class DescribeOperateOpsTaskDatasourceRequest extends AbstractModel
{
    /**
     * @var string 项目ID
     */
    public $ProjectId;

    /**
     * @var integer 任务类型ID
     */
    public $TaskType;

    /**
     * @var string 数据源来源/去向
     */
    public $ServiceKind;

    /**
     * @var string 数据源类型
     */
    public $ServiceType;

    /**
     * @param string $ProjectId 项目ID
     * @param integer $TaskType 任务类型ID
     * @param string $ServiceKind 数据源来源/去向
     * @param string $ServiceType 数据源类型
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
        if (array_key_exists("ProjectId",$param) and $param["ProjectId"] !== null) {
            $this->ProjectId = $param["ProjectId"];
        }

        if (array_key_exists("TaskType",$param) and $param["TaskType"] !== null) {
            $this->TaskType = $param["TaskType"];
        }

        if (array_key_exists("ServiceKind",$param) and $param["ServiceKind"] !== null) {
            $this->ServiceKind = $param["ServiceKind"];
        }

        if (array_key_exists("ServiceType",$param) and $param["ServiceType"] !== null) {
            $this->ServiceType = $param["ServiceType"];
        }
    }
}
