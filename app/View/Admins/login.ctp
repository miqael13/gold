<div id="wrap">
    <div  class="container-fluid">
        <div class="row-fluid">
            <div class="span9">
                <?php echo $this->Form->create('Admin', array(
                    'action' => 'login',
                    'class' => 'form',
                    'id' => 'loginHere',
                    'inputDefaults' => array(
                    'label' => false,
                    'div' => false
                ))); ?>
                <fieldset>
                    <div class="span5"> 
                        <div class="control-group">
                            <label class="control-label"><?php echo __(' E-mail');?><font class="req">*</font></label>
                                <div class="controls">
                                <?php echo $this->Form->input('email', array(
                                    'label' => false,
                                    'error' => array('class' => 'error-message'),
                                    'placeholder' => 'your e-mail',
                                    'type' => 'text',
                                    'id' => "user_email",
                                    'class' => 'input-xlarge'
                                ));?>
                                </div>
                        </div>
                        <div class="control-group">
                            <label for="pwd" class="control-label"><?php echo __(' Password');?><font class="req">*</font></label>
                                <div class="controls">
                                    <?php echo $this->Form->input('password', array(
                                            'id' => 'p1',
                                            'placeholder' => 'your password',
                                            'label' => false,
                                            'error' => array('class' => 'error-message'),
                                            'type' => 'password',
                                            'class' => 'input-xlarge'
                                        )); 
                                    ?>
                                </div>
                        </div>
                        <div class="control-group">
                            <label for="pwd" class="control-label"><?php echo __('Type');?><font class="req">*</font></label>
                                <div class="controls">
                                    <?php $options =  array('Admin' => 'Admin','User' => 'User' );
                                        echo $this->Form->input('type', array(
                                            'id' => 'type',
                                            'options' => $options,
                                            'label' => false,
                                           // 'selected' => 'Contributor'
                                            
                                    )); 
                                    ?>
                                </div>
                        </div>
                        <div style="margin-top:2em" class="button_div">
                            <?php echo $this->Form->submit('Login',array('type'=>'submit','class'=>'btn btn-primary','label'=>false,'div'=>false));?>  
                        </div>
                        
                        <div class="clear"></div>
                    </div>
            </fieldset>
            <?php echo $this->Form->end(); ?>
                <div id="weather"></div>
            </div><!--/span-->
        </div><!--/row-->
    </div><!--/.fluid-container-->
    <div id="push"></div>
</div> 

        
