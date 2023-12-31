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
namespace TencentCloud\Essbasic\V20210526\Models;
use TencentCloud\Common\AbstractModel;

/**
 * 渠道角色信息
 *
 * @method string getRoleId() 获取角色id
注意：此字段可能返回 null，表示取不到有效值。
 * @method void setRoleId(string $RoleId) 设置角色id
注意：此字段可能返回 null，表示取不到有效值。
 * @method string getRoleName() 获取角色名
注意：此字段可能返回 null，表示取不到有效值。
 * @method void setRoleName(string $RoleName) 设置角色名
注意：此字段可能返回 null，表示取不到有效值。
 * @method integer getRoleStatus() 获取角色状态：1-启用；2-禁用
注意：此字段可能返回 null，表示取不到有效值。
 * @method void setRoleStatus(integer $RoleStatus) 设置角色状态：1-启用；2-禁用
注意：此字段可能返回 null，表示取不到有效值。
 * @method array getPermissionGroups() 获取权限树
注意：此字段可能返回 null，表示取不到有效值。
 * @method void setPermissionGroups(array $PermissionGroups) 设置权限树
注意：此字段可能返回 null，表示取不到有效值。
 */
class ChannelRole extends AbstractModel
{
    /**
     * @var string 角色id
注意：此字段可能返回 null，表示取不到有效值。
     */
    public $RoleId;

    /**
     * @var string 角色名
注意：此字段可能返回 null，表示取不到有效值。
     */
    public $RoleName;

    /**
     * @var integer 角色状态：1-启用；2-禁用
注意：此字段可能返回 null，表示取不到有效值。
     */
    public $RoleStatus;

    /**
     * @var array 权限树
注意：此字段可能返回 null，表示取不到有效值。
     */
    public $PermissionGroups;

    /**
     * @param string $RoleId 角色id
注意：此字段可能返回 null，表示取不到有效值。
     * @param string $RoleName 角色名
注意：此字段可能返回 null，表示取不到有效值。
     * @param integer $RoleStatus 角色状态：1-启用；2-禁用
注意：此字段可能返回 null，表示取不到有效值。
     * @param array $PermissionGroups 权限树
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
        if (array_key_exists("RoleId",$param) and $param["RoleId"] !== null) {
            $this->RoleId = $param["RoleId"];
        }

        if (array_key_exists("RoleName",$param) and $param["RoleName"] !== null) {
            $this->RoleName = $param["RoleName"];
        }

        if (array_key_exists("RoleStatus",$param) and $param["RoleStatus"] !== null) {
            $this->RoleStatus = $param["RoleStatus"];
        }

        if (array_key_exists("PermissionGroups",$param) and $param["PermissionGroups"] !== null) {
            $this->PermissionGroups = [];
            foreach ($param["PermissionGroups"] as $key => $value){
                $obj = new PermissionGroup();
                $obj->deserialize($value);
                array_push($this->PermissionGroups, $obj);
            }
        }
    }
}
