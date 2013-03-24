<div id="wrap">
    <article id="content">
        <div style="width: 100%;text-align: center;">
            <a href="/images/port-img4.jpeg" style="text-decoration: none;">
                <img src="/system/Users/<?php echo $jeverly['User']['id'] ?>/<?php echo $jeverly['Jeverly']['pic1'] ?>" width="45%" height="auto" style="background-color: #FFF;padding:10px;"/>
            </a>
            <a href="/images/port-img4.jpeg" style="text-decoration: none;">
                <img src="/system/Users/<?php echo $jeverly['User']['id'] ?>/<?php echo $jeverly['Jeverly']['pic2'] ?>" width="45%" height="auto" style="background-color: #FFF;padding:10px;margin-left: 20px;"/>
            </a>
        </div>


        <div class="work_left">
            <header>
                <div>
                    <ul>
                        <li>Цена : $<?php echo $jeverly['Jeverly']['price'] ?></li>
                        <li>Вес : <?php echo $jeverly['Jeverly']['price'] ?>гр</li>
                        <li>Камень : <?php if($jeverly['Jeverly']['stone']){ echo $jeverly['Stone']['title']; }else{ echo 'Без камня';} ?></li>
                        <li>Тип : <?php echo $jeverly['Jeverly']['type'];?></li>
                        <li>Где купить</li>
                        <li>Аддресс : <?php echo $jeverly['User']['address'];?></li>
                        <li>Павилион : <?php echo $jeverly['User']['pavilion'];?></li>
                        <li>Телефон : <?php echo $jeverly['User']['phone'];?></li>                            
                    </ul>
                </div>
            </header>
        </div>
    </article><!-- end content -->
</div>   