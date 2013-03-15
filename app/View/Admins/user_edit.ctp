<?php echo $this->element('admins_menu'); ?>
<script>
$(document).ready(function(){   
    $("#UserUserEditForm").validate();
});
</script>
<div style="margin-left: 500px;margin-top: 100px">

<?php 
    echo $this->Form->create('User');
    echo $this->Form->input(
            'firstName',
            array(
                'type'=>'text',
                'label'=>'First Name',
                'value'=>$users['User']['firstName'],
                'class'=>'required'
                )
            );
    echo $this->Form->input(
            'lastName',
            array(
                'type'=>'text',
                'label'=>'Last Name',
                'value'=>$users['User']['lastName'],
                'class'=>'required'
                )
            );
    echo $this->Form->input(
            'email',
            array(
                'type'=>'text',
                'label'=>'Email',
                'value'=>$users['User']['email'],
                'class'=>'required email'
                )
            );
    echo $this->Form->input(
            'phone',
            array(
                'type'=>'number',
                'label'=>'Phone Number',
                'value'=>$users['User']['phone'],
                'class'=>'required number'
                )
            );
    echo $this->Form->input(
            'address',
            array(
                'type'=>'text',
                'label'=>'Address',
                'value'=>$users['User']['address'],
                'class'=>'required'
                )
            );
    echo $this->Form->input(
            'pavilion',
            array(
                'type'=>'text',
                'label'=>'Pavilion',
                'value'=>$users['User']['pavilion'],
                'class'=>'required'
                )
            );
    echo $this->Form->input(
            'limit',
            array(
                'type'=>'select',
                'id'=>'UserAddForm',
                'label'=>'Limit',
                'value'=>$users['User']['limit'],
                'options'=>array(
                    'select'=>'select',
                    '10'=>'10',
                    '15'=>'15',
                    '20'=>'20',
                    '25'=>'25',
                    '30'=>'30'
                ),
                'class'=>'required'
                )
            );
    echo $this->Form->submit('save',array('class'=>'btn btn-primary'));
    echo $this->Form->end();
?>

</div>