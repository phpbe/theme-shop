<?php
namespace Be\Theme\Shop\Section\Footer\Item;

/**
 * @BeConfig("支付渠道图标", icon="el-icon-fa fa-dollar")
 */
class Payments
{

    /**
     * @BeConfigItem("是否启用",
     *     driver = "FormItemSwitch")
     */
    public int $enable = 1;

    /**
     * @BeConfigItem("Paypal", driver="FormItemCheckbox", ui="return ['form-item'=> ['label' => '']]")
     */
    public int $paypal = 1;

    /**
     * @BeConfigItem("Visa", driver="FormItemCheckbox", ui="return ['form-item'=> ['label' => '']]")
     */
    public int $visa = 1;

    /**
     * @BeConfigItem("Master Card", driver="FormItemCheckbox", ui="return ['form-item'=> ['label' => '']]")
     */
    public int $master_card = 1;

    /**
     * @BeConfigItem("Maestro", driver="FormItemCheckbox", ui="return ['form-item'=> ['label' => '']]")
     */
    public int $maestro = 1;

    /**
     * @BeConfigItem("JCB", driver="FormItemCheckbox", ui="return ['form-item'=> ['label' => '']]")
     */
    public int $jcb = 1;

    /**
     * @BeConfigItem("American Express", driver="FormItemCheckbox", ui="return ['form-item'=> ['label' => '']]")
     */
    public int $american_express = 1;

    /**
     * @BeConfigItem("Diners Club", driver="FormItemCheckbox", ui="return ['form-item'=> ['label' => '']]")
     */
    public int $diners_club = 1;

    /**
     * @BeConfigItem("Discover", driver="FormItemCheckbox", ui="return ['form-item'=> ['label' => '']]")
     */
    public int $discover = 1;

    /**
     * @BeConfigItem("银联", driver="FormItemCheckbox", ui="return ['form-item'=> ['label' => '']]")
     */
    public int $unionpay = 1;

    /**
     * @BeConfigItem("对齐方式",
     *     driver="FormItemSelect",
     *     keyValues="return ['left' => '居左', 'center' => '居中', 'right' => '居右']"
     * )
     */
    public string $align = 'center';

    /**
     * @BeConfigItem("所占列数",
     *     description="底部默认有4列",
     *     values="return [1, 2, 3, 4]",
     *     driver="FormItemSelect")
     */
    public int $cols = 1;

}
