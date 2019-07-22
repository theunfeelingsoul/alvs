<?php use yii\helpers\Html; ?>
<!-- loop through category 1 -->
<?php foreach ($catmodel['cat1'] as $key => $value): ?>
        <li class="dropdown">
            <a href="" class="dropdown-toggle" data-toggle="dropdown"><?=$value->name  ?></a>
                <ul class="mega_dropdown dropdown-menu" style="width: 830px;">
                <!-- loop through category 2 -->
                <?php foreach ($catmodel['cat2'] as $key => $cat2value): ?>
                    <!-- only show the cat2s that are related to cat1s -->
                    <?php if (in_array($value->id, explode(',', $cat2value->cat1_id))) { ?>
                        <li class="block-container col-sm-3">
                            <ul class="block">
                                    <li class="link_container group_header">
                                        <a href="#"><?=$cat2value->name ?></a>
                                    </li>

                                    <?php foreach ($catmodel['data'] as $key => $cat3value): ?>
                                        <li class="link_container">
                                           

                                            <?php if (in_array($cat2value->id, explode(',', $cat3value['cat2_id']))): ?>
                                                
                                           
                                                <?php echo Html::a($cat3value['name'], ['products/category','cat'=>$cat3value['id']], ['class' => '']) ?>
                                            <?php endif ?>
                                        </li>
                                    <?php endforeach ?>
                            </ul>
                        </li>
                    <?php } ?>
                <?php endforeach ?>
              

            </ul>
        </li>
<?php endforeach ?>