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
 * RerunOpsMakePlanInstances请求参数结构体
 *
 * @method string getProjectId() 获取项目ID
 * @method void setProjectId(string $ProjectId) 设置项目ID
 * @method string getPlanId() 获取补录计划ID
 * @method void setPlanId(string $PlanId) 设置补录计划ID
 * @method array getInstanceIdList() 获取补录实例ID集合，为空则重跑整个补录计划失败实例。实例ID格式为"${TASK_ID}_${INSTANCE_DATA_TIME}"，即“任务ID_任务实例数据时间”。
 * @method void setInstanceIdList(array $InstanceIdList) 设置补录实例ID集合，为空则重跑整个补录计划失败实例。实例ID格式为"${TASK_ID}_${INSTANCE_DATA_TIME}"，即“任务ID_任务实例数据时间”。
 */
class RerunOpsMakePlanInstancesRequest extends AbstractModel
{
    /**
     * @var string 项目ID
     */
    public $ProjectId;

    /**
     * @var string 补录计划ID
     */
    public $PlanId;

    /**
     * @var array 补录实例ID集合，为空则重跑整个补录计划失败实例。实例ID格式为"${TASK_ID}_${INSTANCE_DATA_TIME}"，即“任务ID_任务实例数据时间”。
     */
    public $InstanceIdList;

    /**
     * @param string $ProjectId 项目ID
     * @param string $PlanId 补录计划ID
     * @param array $InstanceIdList 补录实例ID集合，为空则重跑整个补录计划失败实例。实例ID格式为"${TASK_ID}_${INSTANCE_DATA_TIME}"，即“任务ID_任务实例数据时间”。
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

        if (array_key_exists("PlanId",$param) and $param["PlanId"] !== null) {
            $this->PlanId = $param["PlanId"];
        }

        if (array_key_exists("InstanceIdList",$param) and $param["InstanceIdList"] !== null) {
            $this->InstanceIdList = $param["InstanceIdList"];
        }
    }
}
