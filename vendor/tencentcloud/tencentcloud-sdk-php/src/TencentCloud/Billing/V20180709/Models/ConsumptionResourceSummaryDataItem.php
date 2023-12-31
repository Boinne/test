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
namespace TencentCloud\Billing\V20180709\Models;
use TencentCloud\Common\AbstractModel;

/**
 * 消耗按资源汇总详情
 *
 * @method string getResourceId() 获取资源ID
 * @method void setResourceId(string $ResourceId) 设置资源ID
 * @method string getResourceName() 获取资源名称
 * @method void setResourceName(string $ResourceName) 设置资源名称
 * @method string getRealTotalCost() 获取折后总价
 * @method void setRealTotalCost(string $RealTotalCost) 设置折后总价
 * @method string getCashPayAmount() 获取现金花费
 * @method void setCashPayAmount(string $CashPayAmount) 设置现金花费
 * @method string getProjectId() 获取项目ID
 * @method void setProjectId(string $ProjectId) 设置项目ID
 * @method string getProjectName() 获取项目名称
 * @method void setProjectName(string $ProjectName) 设置项目名称
 * @method string getRegionId() 获取地域ID
 * @method void setRegionId(string $RegionId) 设置地域ID
 * @method string getRegionName() 获取地域名称
 * @method void setRegionName(string $RegionName) 设置地域名称
 * @method string getPayMode() 获取付费模式
 * @method void setPayMode(string $PayMode) 设置付费模式
 * @method string getPayModeName() 获取付费模式名称
 * @method void setPayModeName(string $PayModeName) 设置付费模式名称
 * @method string getBusinessCode() 获取产品名称代码
 * @method void setBusinessCode(string $BusinessCode) 设置产品名称代码
 * @method string getBusinessCodeName() 获取产品名称
 * @method void setBusinessCodeName(string $BusinessCodeName) 设置产品名称
 * @method string getConsumptionTypeName() 获取消耗类型
 * @method void setConsumptionTypeName(string $ConsumptionTypeName) 设置消耗类型
 * @method string getRealCost() 获取折前价
注意：此字段可能返回 null，表示取不到有效值。
 * @method void setRealCost(string $RealCost) 设置折前价
注意：此字段可能返回 null，表示取不到有效值。
 * @method string getFeeBeginTime() 获取费用起始时间
注意：此字段可能返回 null，表示取不到有效值。
 * @method void setFeeBeginTime(string $FeeBeginTime) 设置费用起始时间
注意：此字段可能返回 null，表示取不到有效值。
 * @method string getFeeEndTime() 获取费用结束时间
注意：此字段可能返回 null，表示取不到有效值。
 * @method void setFeeEndTime(string $FeeEndTime) 设置费用结束时间
注意：此字段可能返回 null，表示取不到有效值。
 * @method string getDayDiff() 获取天数
注意：此字段可能返回 null，表示取不到有效值。
 * @method void setDayDiff(string $DayDiff) 设置天数
注意：此字段可能返回 null，表示取不到有效值。
 * @method string getDailyTotalCost() 获取每日消耗
注意：此字段可能返回 null，表示取不到有效值。
 * @method void setDailyTotalCost(string $DailyTotalCost) 设置每日消耗
注意：此字段可能返回 null，表示取不到有效值。
 * @method string getOrderId() 获取订单号
注意：此字段可能返回 null，表示取不到有效值。
 * @method void setOrderId(string $OrderId) 设置订单号
注意：此字段可能返回 null，表示取不到有效值。
 * @method string getVoucherPayAmount() 获取代金券
注意：此字段可能返回 null，表示取不到有效值。
 * @method void setVoucherPayAmount(string $VoucherPayAmount) 设置代金券
注意：此字段可能返回 null，表示取不到有效值。
 * @method string getIncentivePayAmount() 获取赠送金
注意：此字段可能返回 null，表示取不到有效值。
 * @method void setIncentivePayAmount(string $IncentivePayAmount) 设置赠送金
注意：此字段可能返回 null，表示取不到有效值。
 * @method string getTransferPayAmount() 获取分成金
注意：此字段可能返回 null，表示取不到有效值。
 * @method void setTransferPayAmount(string $TransferPayAmount) 设置分成金
注意：此字段可能返回 null，表示取不到有效值。
 */
class ConsumptionResourceSummaryDataItem extends AbstractModel
{
    /**
     * @var string 资源ID
     */
    public $ResourceId;

    /**
     * @var string 资源名称
     */
    public $ResourceName;

    /**
     * @var string 折后总价
     */
    public $RealTotalCost;

    /**
     * @var string 现金花费
     */
    public $CashPayAmount;

    /**
     * @var string 项目ID
     */
    public $ProjectId;

    /**
     * @var string 项目名称
     */
    public $ProjectName;

    /**
     * @var string 地域ID
     */
    public $RegionId;

    /**
     * @var string 地域名称
     */
    public $RegionName;

    /**
     * @var string 付费模式
     */
    public $PayMode;

    /**
     * @var string 付费模式名称
     */
    public $PayModeName;

    /**
     * @var string 产品名称代码
     */
    public $BusinessCode;

    /**
     * @var string 产品名称
     */
    public $BusinessCodeName;

    /**
     * @var string 消耗类型
     */
    public $ConsumptionTypeName;

    /**
     * @var string 折前价
注意：此字段可能返回 null，表示取不到有效值。
     */
    public $RealCost;

    /**
     * @var string 费用起始时间
注意：此字段可能返回 null，表示取不到有效值。
     */
    public $FeeBeginTime;

    /**
     * @var string 费用结束时间
注意：此字段可能返回 null，表示取不到有效值。
     */
    public $FeeEndTime;

    /**
     * @var string 天数
注意：此字段可能返回 null，表示取不到有效值。
     */
    public $DayDiff;

    /**
     * @var string 每日消耗
注意：此字段可能返回 null，表示取不到有效值。
     */
    public $DailyTotalCost;

    /**
     * @var string 订单号
注意：此字段可能返回 null，表示取不到有效值。
     */
    public $OrderId;

    /**
     * @var string 代金券
注意：此字段可能返回 null，表示取不到有效值。
     */
    public $VoucherPayAmount;

    /**
     * @var string 赠送金
注意：此字段可能返回 null，表示取不到有效值。
     */
    public $IncentivePayAmount;

    /**
     * @var string 分成金
注意：此字段可能返回 null，表示取不到有效值。
     */
    public $TransferPayAmount;

    /**
     * @param string $ResourceId 资源ID
     * @param string $ResourceName 资源名称
     * @param string $RealTotalCost 折后总价
     * @param string $CashPayAmount 现金花费
     * @param string $ProjectId 项目ID
     * @param string $ProjectName 项目名称
     * @param string $RegionId 地域ID
     * @param string $RegionName 地域名称
     * @param string $PayMode 付费模式
     * @param string $PayModeName 付费模式名称
     * @param string $BusinessCode 产品名称代码
     * @param string $BusinessCodeName 产品名称
     * @param string $ConsumptionTypeName 消耗类型
     * @param string $RealCost 折前价
注意：此字段可能返回 null，表示取不到有效值。
     * @param string $FeeBeginTime 费用起始时间
注意：此字段可能返回 null，表示取不到有效值。
     * @param string $FeeEndTime 费用结束时间
注意：此字段可能返回 null，表示取不到有效值。
     * @param string $DayDiff 天数
注意：此字段可能返回 null，表示取不到有效值。
     * @param string $DailyTotalCost 每日消耗
注意：此字段可能返回 null，表示取不到有效值。
     * @param string $OrderId 订单号
注意：此字段可能返回 null，表示取不到有效值。
     * @param string $VoucherPayAmount 代金券
注意：此字段可能返回 null，表示取不到有效值。
     * @param string $IncentivePayAmount 赠送金
注意：此字段可能返回 null，表示取不到有效值。
     * @param string $TransferPayAmount 分成金
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
        if (array_key_exists("ResourceId",$param) and $param["ResourceId"] !== null) {
            $this->ResourceId = $param["ResourceId"];
        }

        if (array_key_exists("ResourceName",$param) and $param["ResourceName"] !== null) {
            $this->ResourceName = $param["ResourceName"];
        }

        if (array_key_exists("RealTotalCost",$param) and $param["RealTotalCost"] !== null) {
            $this->RealTotalCost = $param["RealTotalCost"];
        }

        if (array_key_exists("CashPayAmount",$param) and $param["CashPayAmount"] !== null) {
            $this->CashPayAmount = $param["CashPayAmount"];
        }

        if (array_key_exists("ProjectId",$param) and $param["ProjectId"] !== null) {
            $this->ProjectId = $param["ProjectId"];
        }

        if (array_key_exists("ProjectName",$param) and $param["ProjectName"] !== null) {
            $this->ProjectName = $param["ProjectName"];
        }

        if (array_key_exists("RegionId",$param) and $param["RegionId"] !== null) {
            $this->RegionId = $param["RegionId"];
        }

        if (array_key_exists("RegionName",$param) and $param["RegionName"] !== null) {
            $this->RegionName = $param["RegionName"];
        }

        if (array_key_exists("PayMode",$param) and $param["PayMode"] !== null) {
            $this->PayMode = $param["PayMode"];
        }

        if (array_key_exists("PayModeName",$param) and $param["PayModeName"] !== null) {
            $this->PayModeName = $param["PayModeName"];
        }

        if (array_key_exists("BusinessCode",$param) and $param["BusinessCode"] !== null) {
            $this->BusinessCode = $param["BusinessCode"];
        }

        if (array_key_exists("BusinessCodeName",$param) and $param["BusinessCodeName"] !== null) {
            $this->BusinessCodeName = $param["BusinessCodeName"];
        }

        if (array_key_exists("ConsumptionTypeName",$param) and $param["ConsumptionTypeName"] !== null) {
            $this->ConsumptionTypeName = $param["ConsumptionTypeName"];
        }

        if (array_key_exists("RealCost",$param) and $param["RealCost"] !== null) {
            $this->RealCost = $param["RealCost"];
        }

        if (array_key_exists("FeeBeginTime",$param) and $param["FeeBeginTime"] !== null) {
            $this->FeeBeginTime = $param["FeeBeginTime"];
        }

        if (array_key_exists("FeeEndTime",$param) and $param["FeeEndTime"] !== null) {
            $this->FeeEndTime = $param["FeeEndTime"];
        }

        if (array_key_exists("DayDiff",$param) and $param["DayDiff"] !== null) {
            $this->DayDiff = $param["DayDiff"];
        }

        if (array_key_exists("DailyTotalCost",$param) and $param["DailyTotalCost"] !== null) {
            $this->DailyTotalCost = $param["DailyTotalCost"];
        }

        if (array_key_exists("OrderId",$param) and $param["OrderId"] !== null) {
            $this->OrderId = $param["OrderId"];
        }

        if (array_key_exists("VoucherPayAmount",$param) and $param["VoucherPayAmount"] !== null) {
            $this->VoucherPayAmount = $param["VoucherPayAmount"];
        }

        if (array_key_exists("IncentivePayAmount",$param) and $param["IncentivePayAmount"] !== null) {
            $this->IncentivePayAmount = $param["IncentivePayAmount"];
        }

        if (array_key_exists("TransferPayAmount",$param) and $param["TransferPayAmount"] !== null) {
            $this->TransferPayAmount = $param["TransferPayAmount"];
        }
    }
}
