<style>
    .myPage ul li {
        visibility:hidden;
    }
    .myPage ul li span{
        visibility:visible;
    }
</style>
<div class="pagination myPage">
    <ul>
    <?php
    if(!isset($limit)){
        $limit = "10";
    }
    
     $count = $this->Paginator->counter(array('format' => '%count%'));

   //var_dump($this->Paginator->numbers(array('class'=>'pageID')));die;
     if($count > $limit) { ?>
       <li><?php echo $this->Paginator->prev('Prev', array(), null, array('class' => 'prev unactivePrev')); ?></li>
       <li> <?php echo $this->Paginator->numbers(array('class'=>'pageID')); ?></li>
       <li><?php echo $this->Paginator->next('Next', array(), null, array('class' => 'next unactiveNext')); ?></li>
    <?php } ?>
    </ul>
</div>   