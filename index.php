<table border="1" style=" margin: 0 auto;" cellspacing="0" cellpadding="0">
    <tr>
        <th>创建图片库</th>
        <td>
            <form action="handle.php" method="post" enctype="multipart/form-data" target="_blank">
                <table border="1" align="center" width="600">
                    <tr>
                        <th>参数</th>
                        <th>值</th>
                        <th>参数解释</th>
                    </tr>
                    <tr>
                        <td>Region</td>
                        <td>
                            <input type="radio" name="region" value="ap-beijing" required>北京
                            <input type="radio" name="region" value="ap-guangzhou">广州
                            <input type="radio" name="region" value="ap-shanghai">上海
                        </td>
                        <td>地域参数。</td>
                    </tr>

                    <tr>
                        <td>GroupId</td>
                        <td>
                            <input type="text" name="group_id" required>
                        </td>
                        <td>图库ID，不可重复，仅支持字母、数字和下划线。</td>
                    </tr>
                    <tr>
                        <td>GroupName</td>
                        <td>
                            <input type="text" name="group_name" required>
                        </td>
                        <td>图库名称描述。</td>
                    </tr>
                    <tr>
                        <td>MaxCapacity</td>
                        <td>
                            <input type="number" name="max_capacity" required>
                        </td>
                        <td>该库的容量限制。</td>
                    </tr>

                    <tr>
                        <td>Brief</td>
                        <td>
                            <input type="text" name="brief">
                        </td>
                        <td>简介。</td>
                    </tr>

                    <tr>
                        <td>MaxQps</td>
                        <td>
                            <input type="number" name="max_qps">
                        </td>
                        <td>该库的访问限频 ，默认10。</td>
                    </tr>

                    <tr>
                        <td>GroupType</td>
                        <td>
                            <input type="number" name="group_type">
                        </td>
                        <td>图库类型， 默认为通用。 类型： 1: 通用图库，以用户输入图提取特征。 2: 灰度图库，输入图和搜索图均转为灰度图提取特征。 3: 针对电商（通用品类）和logo优化。</td>
                    </tr>

                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="createGroup" value="提交" >
                            <input type="reset" name="reset" value="重置" >
                        </td>
                        <td></td>
                    </tr>
                </table>
            </form>
        </td>
    </tr>
    <tr>
        <td colspan="3">&nbsp;</td>
    </tr>
    <tr>
        <th>查询图片库</th>
        <td>
            <form action="handle.php" method="post" enctype="multipart/form-data" target="_blank">
                <table border="1" align="center" width="600">
                    <tr>
                        <th>参数</th>
                        <th>值</th>
                        <th>参数解释</th>
                    </tr>
                    <tr>
                        <td>Region</td>
                        <td>
                            <input type="radio" name="region" value="ap-beijing" required>北京
                            <input type="radio" name="region" value="ap-guangzhou">广州
                            <input type="radio" name="region" value="ap-shanghai">上海
                        </td>
                        <td>地域参数。</td>
                    </tr>
                    <tr>
                        <td>Offset</td>
                        <td>
                            <input type="number" name="offset" value="0" required>
                        </td>
                        <td>起始序号，默认值为0。</td>
                    </tr>
                    <tr>
                        <td>Limit</td>
                        <td>
                            <input type="number" name="limit" value="10" required>
                        </td>
                        <td>返回数量，默认值为10，最大值为100。</td>
                    </tr>
                    <tr>
                        <td>GroupId</td>
                        <td>
                            <input type="text" name="group_id" required>
                        </td>
                        <td>图库ID，如果不为空，则返回指定库信息。</td>
                    </tr>

                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="describeGroups" value="提交" >
                            <input type="reset" name="reset" value="重置" >
                        </td>
                        <td></td>
                    </tr>
                </table>
            </form>
        </td>
    </tr>
    <tr>
        <td colspan="3">&nbsp;</td>
    </tr>
    <tr>
        <th>创建图片</th>
        <td>
            <form action="handle.php" method="post" enctype="multipart/form-data" target="_blank">
                <table border="1" align="center" width="600">
                    <tr>
                        <th>参数</th>
                        <th>值</th>
                        <th>参数解释</th>
                    </tr>
                    <tr>
                        <td>图像</td>
                        <td>
                            <input type="file" name="file" >
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Region</td>
                        <td>
                            <input type="radio" name="region" value="ap-beijing" required>北京
                            <input type="radio" name="region" value="ap-guangzhou">广州
                            <input type="radio" name="region" value="ap-shanghai">上海
                        </td>
                        <td>地域参数。</td>
                    </tr>
                    <tr>
                        <td>GroupId</td>
                        <td>
                            <input type="text" name="group_id" required>
                        </td>
                        <td>图库ID。</td>
                    </tr>
                    <tr>
                        <td>EntityId</td>
                        <td>
                            <input type="text" name="entity_id" required>
                        </td>
                        <td>物品ID，最多支持64个字符。 若EntityId已存在，则对其追加图片。</td>
                    </tr>
                    <tr>
                        <td>PicName</td>
                        <td>
                            <input type="text" name="pic_name" required>
                        </td>
                        <td>图片名称，最多支持64个字符， 同一个EntityId，最大支持5张图。如果图片名称已存在，则会更新库中的图片。</td>
                    </tr>
                    <tr>
                        <td>CustomContent</td>
                        <td>
                            <input type="text" name="custom_content" value="0" required>
                        </td>
                        <td>用户自定义的内容，最多支持4096个字符，查询时原样带回。</td>
                    </tr>
                    <tr>
                        <td>Tags</td>
                        <td>
                            <input type="text" name="tags" required>
                        </td>
                        <td>图片自定义标签，最多不超过10个【格式为英文逗号隔开的字符串】。</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="createImage" value="提交" >
                            <input type="reset" name="reset" value="重置" >
                        </td>
                        <td></td>
                    </tr>
                </table>
            </form>
        </td>
    </tr>
    <tr>
        <td colspan="3">&nbsp;</td>
    </tr>
    <tr>
        <th>检索图片</th>
        <td>
            <form action="handle.php" method="post" enctype="multipart/form-data" target="_blank">
                <table border="1" align="center" width="600">
                    <tr>
                        <th>参数</th>
                        <th>值</th>
                        <th>参数解释</th>
                    </tr>
                    <tr>
                        <td>图像</td>
                        <td>
                            <input type="file" name="file" >
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Region</td>
                        <td>
                            <input type="radio" name="region" value="ap-beijing" required>北京
                            <input type="radio" name="region" value="ap-guangzhou">广州
                            <input type="radio" name="region" value="ap-shanghai">上海
                        </td>
                        <td>地域参数。</td>
                    </tr>
                    <tr>
                        <td>GroupId</td>
                        <td>
                            <input type="text" name="group_id" required>
                        </td>
                        <td>图库ID。</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="searchImage" value="提交" >
                            <input type="reset" name="reset" value="重置" >
                        </td>
                        <td></td>
                    </tr>
                </table>
            </form>
        </td>
    </tr>
</table>
