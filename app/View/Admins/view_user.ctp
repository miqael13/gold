<script src="/js/fileuploader.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#UserViewUserForm").validate();
        var count=1;
        var url = '<?php echo $id?>';
        var uploader = new qq.FileUploader({ 
            element: document.getElementById('file-uploader'),
            'action': '/admins/uploadManulFile/'+url,
            'debug': false,
            multiple: false,
            sizeLimit: 0, // max size   
            minSizeLimit: 0, // min size
            onSubmit: function(id, fileName){
                //$('#load').html('<img src="/img/loading.gif" style="margin-left:109px;margin-top:-34px;position:absolute;"/>')
            },
            onProgress: function(id, fileName, responseJSON){
            },
            onComplete: function(id, fileName, responseJSON){
//                count = count + 1;
                if(responseJSON.success ==true){
//                    $('#cont').append('<div id="img'+count+'"></div>');
//                    $('#saveDiv').html('<a href="#" class="saveP btn btnGrey">Save Pictures</a>');
//                    //$('#load').html('<img src="/img/correct.png" style="margin-left:109px;margin-top:-32px;position:absolute;"/>');
//                    $('#img'+count).html('<div class="forCropArea" style="display:block; margin-left:40px;"><div class="forCropPlugin" id="crop_container'+count+'"></div><div id="crop'+count+'" class="cropSave btn btnGrey">Crop</div><input type="hidden" name="pic[picture'+count+']" value="'+responseJSON.fileName+'" /></div>');
//                    $('#file-uploader').hide();
//                    check == 0;
//                    console.log(responseJSON);

                    $('#file-uploader').append('<img src="/system/Users/'+url+'/'+responseJSON.fileName+'" width="100px" hight="100px" style="padding: 5px"><input type="hidden" name="data[User][pic'+count+']" value="'+responseJSON.fileName+'">');
//                    $('#blah'+count).attr('src', '/system/'+responseJSON.fileName);
                    $('#ManualEntryManualFile').val(responseJSON.fileName);
                    $('.qq-upload-list').remove();
                    if($('#2').length !== 0 && $('#3').length !== 0){
                        $('#file-uploader3').removeClass('hid');
                    }
                    count++;
//                    if(count == 4){
//                        $('#file-uploader').hide();
//                    }
                        
                }else{
                    alert('Please upload images, with PNG, JPG or GIF extensions and max size of less than 2MB!');
                    $('#load').empty();
                }
            },
            onCancel: function(id, fileName){$('.qq-upload-button').removeClass('.qq-upload-button-visited')},
            messages: {
                // error messages, see qq.FileUploaderBasic for content            
            },
            showMessage: function(message){alert(message);} 
        });
    });
</script>

<?php echo $this->element('admins_menu'); ?>
<div id="wrap">
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span8 fixedHeader navbarDouble">
                <?php if(count($jeverly) < ($userID['User']['limit'])){ ?>
                <div class="add">
                <?php 
                    echo $this->Form->create('User');
                    echo '<div id="file-uploader" class="btn btn-primary"></div>';
                    echo $this->Form->input(
                            'userId',
                            array(
                                'type'=>'hidden',
                                'value'=>$id
                                ));
                    if(isset($category)){
                        $options = array() ;
                        foreach($category as $value){
                            $oprions[$value['Category']['id']] = $value['Category']['title'] ;
                        }
                        echo $this->Form->input(
                                'categoryId',
                                array(
                                    'type'=>'select',
                                    'label'=>'Category',
                                    'options'=>$oprions,
                                    'class'=>'required',
                                    
                                    ));
                    }
                    echo $this->Form->input(
                            'weight',
                            array(
                                'type'=>'text',
                                'class'=>'required number',
                                ));
                    if(isset($stone)){
                        foreach($stone as $value){
                            $option[$value['Stone']['id']] = $value['Stone']['title'] ;
                        }
                        echo $this->Form->input(
                                'stone',
                                array(
                                    'type'=>'select',
                                    'options'=>$option,
                                    ));
                    }
                    echo $this->Form->input(
                            'karat',
                            array(
                                'type'=>'number',
                                'div'=>false
                                ));
                    echo $this->Form->input(
                            'price',
                            array(
                                'type'=>'text',
                                'class'=>'required number',
                                ));
                    echo $this->Form->input(
                            'type',
                            array(
                                'type'=>'select',
                                'options'=>array(
                                    'BIJOU'=>'BIJOU',
                                    'GOLDEN'=>'GOLDEN',
                                    'WIGHT'=>'WIGHT'
                                )));
                    echo $this->Form->input(
                            'sex',
                            array(
                                'type'=>'select',
                                'options'=>array(
                                    'MEN'=>'MEN',
                                    'WOMEN'=>'WOMEN'
                                )));
                    echo $this->Form->submit('save',array('class'=>'btn btn-primary'));
                    echo $this->Form->end();
                    ?>
                </div>
                <?php }  elseif($userID['User']['active'] == 0) { ?>
                    
               
                <div class="start">
                    <?php 
                        echo $this->Form->create(
                                'Admins',
                                array(
                                    'action' => 'start',
                                    ));
                        echo $this->Form->input(
                                'endDate'
                                ,array(
                                    'type'=>'select',
                                    'options'=>array(
                                        '1'=>'1',
                                        '2'=>'2',
                                        '3'=>'3',
                                        '4'=>'4',
                                        '5'=>'5',
                                        '6'=>'6',
                                        '7'=>'7',
                                        '8'=>'8',
                                        '9'=>'9',
                                        '10'=>'10',
                                        '11'=>'11',
                                        '12'=>'12',
                                        
                                    )
                                    ));
                        echo $this->Form->input(
                            'id',
                            array(
                                'type'=>'hidden',
                                'value'=>$id
                                ));
                        echo $this->Form->submit('Start',array('class'=>'btn'));
                        echo $this->Form->end();
                    ?>
                </div>
                <?php }else{ 
                    echo $this->Form->create(
                                'Admins',
                                array(
                                    'action' => 'stop',
                                    ));
                    echo "До конца показа осталось: ".$days." дней";
                    echo $this->Form->input(
                            'id',
                            array(
                                'type'=>'hidden',
                                'value'=>$id
                                ));
                        echo $this->Form->submit('Stop',array('class'=>'btn'));
                        echo $this->Form->end();
                }
                
                ?>
                <table class="userList table table-bordered table-striped">
        <thead>
            <tr>
                <th style="width: 10%"># Id</th>
                <th style="width: 10%">Pic 1</th>
                <th style="width: 15%">Pic 2</th>
                <th style="width: 15%">Category</th>
                <th style="width: 15%">Weight</th>
                <th style="width: 15%">Stone</th>
                <th style="width: 15%">Karat</th>
                <th style="width: 8%">Price</th>
                <th style="width: 8%">Type</th>
                <th style="width: 8%">Sex</th>
                <th style="width: 40px" class="editTh">Edit</th>
                <th style="width: 40px" class="delTh">Delete</th>
            </tr>
        </thead>
        <tbody> 
            <?php 
            if(isset($jeverly)){ 
                foreach($jeverly as $value){
            ?>
            <tr>                            
                <td><?php echo $value['Jeverly']['id'];?></td>
                <td><img src="/system/Users/<?php echo $id;?>/<?php echo $value['Jeverly']['pic1'];?>"></td>
                <td><img src="/system/Users/<?php echo $id;?>/<?php echo $value['Jeverly']['pic2'];?>"></td>
                <td><?php echo $value['Category']['title'];?></td>
                <td><?php echo $value['Jeverly']['weight'];?></td>
                <td><?php echo $value['Jeverly']['stone'];?></td>
                <td><?php echo $value['Jeverly']['karat'];?></td>
                <td><?php echo '$'.$value['Jeverly']['price'];?></td>
                <td><?php echo $value['Jeverly']['type'];?></td>
                <td><?php echo $value['Jeverly']['sex'];?></td>
                <td class="editMain"><a class="editBtn btnIcon" href="/admins/viewEdit/<?php echo $value['Jeverly']['id']?>"></a></td>
                <td class="delMain"><a onclick="return confirm('Are you sure?');" class="deleteBtn btnIcon" href="/admins/viewDelete/<?php echo $value['Jeverly']['id']?>"></a></td>
                
            </tr>
            <?php 
            } }?>
        </tbody>
    </table>
            </div>
        </div>
    </div>
</div>
<div style="margin-left: 500px">
    <?php echo $this->element('paginate'); ?>
    </div>