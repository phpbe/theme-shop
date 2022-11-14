<?php
namespace Be\Theme\Shop\Section\Footer\Item;

/**
 * @BeConfig("关注我们", icon="el-icon-fa fa-heart")
 */
class FollowUs
{

    /**
     * @BeConfigItem("是否启用",
     *     driver = "FormItemSwitch")
     */
    public int $enable = 1;

    /**
     * @BeConfigItem("标题", driver="FormItemInput")
     */
    public string $title = 'Follow Us';

    /**
     * @BeConfigItem("Facebook", description="填写Facebook账号，留空时不显示", driver="FormItemInput")
     */
    public string $facebook = '#';

    /**
     * @BeConfigItem("Instagram", description="填写Instagram账号，留空时不显示", driver="FormItemInput")
     */
    public string $instagram = '#';

    /**
     * @BeConfigItem("Twitter", description="填写Twitter账号，留空时不显示", driver="FormItemInput")
     */
    public string $twitter = '#';

    /**
     * @BeConfigItem("Snapchat", description="填写Snapchat账号，留空时不显示", driver="FormItemInput")
     */
    public string $snapchat = '#';

    /**
     * @BeConfigItem("Ticktok", description="填写Ticktok账号，留空时不显示", driver="FormItemInput")
     */
    public string $ticktok = '#';

    /**
     * @BeConfigItem("Youtube", description="填写Youtube账号，留空时不显示", driver="FormItemInput")
     */
    public string $youtube = '#';

    /**
     * @BeConfigItem("所占列数",
     *     description="底部默认有4列",
     *     values="return [1, 2, 3, 4]",
     *     driver="FormItemSelect")
     */
    public int $cols = 2;

}
