<?php echo $this->element('admins_menu'); ?>
<div id="wrap">
<div class="container-fluid">
<div class="row-fluid">
<div class="span8 fixedHeader navbarDouble">
    <table class="userList table table-bordered table-striped">
        <thead>
            <tr>
                <th style="width: 10%">Home</th>
                <th style="width: 15%">First Name</th>
                <th style="width: 15%">Last Name</th>
                <th style="width: 15%">Email</th>
                <th style="width: 15%">Phone</th>
                <th style="width: 15%">Limit</th>
                <th style="width: 8%">Start</th>
                <th style="width: 40px" class="editTh">Edit</th>
                <th style="width: 40px" class="delTh">Delete</th>
            </tr>
        </thead>
        <tbody> 
            <?php  if(isset($users)){ 
                foreach($users as $value){
            
            ?>
            <tr>                            
                <td class="homeBtn"><a href="/admins/viewUser/<?php echo $value['User']['id'];?>"><img src="/images/home.png"></a></td>
                    <td><?php echo $value['User']['firstName'];?></td>
                    <td><?php echo $value['User']['lastName'];?></td>
                    <td><?php echo $value['User']['email'];?></td>
                    <td><?php echo $value['User']['phone'];?></td>
                    <td><?php echo $value['User']['limit'];?></td>
                    <td><?php if($value['User']['active']){echo 'Yes';}else{ echo 'No';} ?></td>
                
                    <td class="editMain"><a class="editBtn btnIcon" href="/admins/userEdit/<?php echo $value['User']['id']?>"></a></td>
                    <td class="delMain"><a onclick="return confirm('Are you sure?');" class="deleteBtn btnIcon" href="/admins/userDelete/<?php echo $value['User']['id']?>"></a></td>
                
            </tr>
            <?php } }?>
        </tbody>
    </table>
    
</div>
</div></div></div>

<div style="margin-left: 500px">
    <?php echo $this->element('paginate'); ?>
    </div>
