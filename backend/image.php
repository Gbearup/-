<div style="height:65vh; border:#D3D3D3 1px solid; width:76.5%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
    <!--正中央-->

    <div style="width:99%; height:100%; margin:auto; overflow:auto;">
        <!-- <p class="t cent botli">花藝商品展示圖片管理</p> -->
        <form method="post" action="./api/edit.php">
            <table width="100%" class='cent'>
                <tbody>
                    <tr class="cent" style="background:#FF85C1">
                        <td width="70%">花藝商品展示照片</td>
                        <td width="10%">顯示</td>
                        <td width="10%">刪除</td>
                        <td></td>
                    </tr>
                    <?php
                    $div = 3;
                    $total = $Image->count();
                    $pages = ceil($total / $div);
                    $now = $_GET['p'] ?? 1;
                    $start = ($now - 1) * $div;

                    $rows = $Image->all(" limit $start,$div");
                    foreach ($rows as $row) {
                    ?>
                        <tr>
                            <td>
                                <img src="./upload/<?= $row['img']; ?>" style="width:145px;height:145px;text-align:center">
                            </td>
                            <td>
                                <input type="checkbox" name="sh[]" value="<?= $row['id']; ?>" <?= ($row['sh'] == 1) ? 'checked' : ''; ?>>
                            </td>
                            <td>
                                <input type="checkbox" name="del[]" value="<?= $row['id']; ?>">
                            </td>
                            <td>
                                <input type="button"
                                    onclick="op('#cover','#cvr','./modal/upload_<?= $do; ?>.php?id=<?= $row['id']; ?>&table=<?= $do; ?>')"
                                    value="更換圖片">
                            </td>
                            <input type="hidden" name="id[]" value="<?= $row['id']; ?>">
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            <div class="cent">
                <?php

                if (($now - 1) > 0) {
                    $prev = $now - 1;
                    echo "<a href='?do=$do&p=$prev'> < </a>";
                }


                for ($i = 1; $i <= $pages; $i++) {
                    $size = ($i == $now) ? "24px" : "16px";
                    echo "<a href='?do=$do&p=$i' style='font-size:$size'> ";
                    echo $i;
                    echo " </a>";
                }

                if (($now + 1) <= $pages) {
                    $next = $now + 1;
                    echo "<a href='?do=$do&p=$next'> > </a>";
                }

                ?>
            </div>
            <table style="margin-top:40px; width:70%;">
                <tbody>
                    <tr>
                        <td width="200px">
                            <input type="button" class="btn btn-custom btn-block"
                                onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;./modal/<?= $do; ?>.php?table=<?= $do; ?>&#39;)"
                                value="新增花藝商品展示圖片">
                        </td>
                        <td class="cent">
                            <input type="hidden" name="table" value="<?= $do; ?>">
                            <input type="submit" value="修改確定" class="btn btn-custom btn-block">
                            <input type="reset" value="重置" class="btn btn-custom btn-block">
                        </td>
                    </tr>
                </tbody>
            </table>

        </form>
    </div>
</div>