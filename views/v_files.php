<h2><p style="text-align:center;color: #e9633b;margin-top: 10px;font-family: Arial;">Bộ sưu tập của bạn </p></h2>
<hr><div class="container">
<div class="row">
    <div class="content col-md-12">
        <p class="col-md-4">
            <?php if (isset($dataCategory)): ?>
                <?php foreach ($dataCategory as $row): ?>
                    <a href="../controller/c_files.php?category=<?=$row["id"]?>" class="btn btn-primary"><?=$row['name']?></a>
                <?php endforeach;?>
            <?php endif;?>
        </p>
        <?php if (isset($data)): ?>
            <?php foreach ($data as $row): ?>
                <div class="col-md-4 float-left">
                    <div class="product">
                        <img src="<?=$row["address"]?>" alt="">
                        <div class="info-product">
                            <p class="cost-product"><?=round((int) $row["size"] / 1024, 2, PHP_ROUND_HALF_UP)?> KB</p>
                            <p class="name-product"> Tên tệp: <?=$row["name"]?></p>
                            <a href="../controller/c_download.php?file=<?=$row["name"]?>" target="_blank">
                                <button type="button" class="btn btn-success" style="margin-left: 195px;">Tải về</button>
                            </a>
                            <a href="../controller/c_unlink.php?file=<?=$row["name"]?>&id=<?=$row["id"]?>">
                                <button type="button" class="btn btn-danger">Xóa</button>
                            </a>

                        </div>
                    </div>
                </div>
            <?php endforeach;?>
        <?php endif;?>
        <div class="clearfix"></div>
    </div>
</div></div>
<hr>


<!--
<hr>
<div class="row"> <dir class="container">
    <div class="content">
        <?php if (isset($data)): ?>
            <?php foreach ($data as $row): ?>
                <div class="col-md-3 float-left">
                    <div class="product">
                        <img src="<?=$row["address"]?>" alt="">
                        <div class="info-product">
                            <p class="cost-product"><?=round((int) $row["size"] / 1024, 2, PHP_ROUND_HALF_UP)?> KB</p>
                            <a href="../controller/c_download.php?file=<?=$row["name"]?>" target="_blank">
                                <button type="button" class="btn btn-success">↓</button>
                            </a>
                            <a href="../controller/c_unlink.php?file=<?=$row["name"]?>&id=<?=$row["id"]?>">
                                <button type="button" class="btn btn-danger">X</button>
                            </a>
                            <p class="name-product"><?=$row["name"]?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach;?>
        <?php endif;?>
        <div class="clearfix"></div>
    </div>
</div></dir>
<hr>
-->