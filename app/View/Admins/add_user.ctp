<?php echo $this->element('admins_menu'); ?>
<script>
$(document).ready(function(){   
    $("#UserAddUserForm").validate();
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
                'class'=>'required'
                )
            );
    echo $this->Form->input(
            'lastName',
            array(
                'type'=>'text',
                'label'=>'Last Name',
                'class'=>'required'
                )
            );
    echo $this->Form->input(
            'email',
            array(
                'type'=>'text',
                'label'=>'Email',
                'class'=>'required email'
                )
            );
    echo $this->Form->input(
            'phone',
            array(
                'type'=>'number',
                'label'=>'Phone Number',
                'class'=>'required number'
                )
            );
    echo $this->Form->input(
            'address',
            array(
                'type'=>'text',
                'label'=>'Address',
                'class'=>'required'
                )
            );
    echo $this->Form->input(
            'pavilion',
            array(
                'type'=>'text',
                'label'=>'Pavilion',
                'class'=>'required'
                )
            );
    echo $this->Form->input(
            'limit',
            array(
                'type'=>'select',
                'id'=>'UserAddForm',
                'label'=>'Limit',
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