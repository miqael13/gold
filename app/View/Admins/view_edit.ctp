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
                
                <?php
                if(isset($jeverly)){
                    echo $this->Form->create('User');
                    echo '<div id="file-uploader" class="btn btn-primary"></div>'.'  ';
                    echo '<br/><img src="/system/Users/'.$id.'/'.$jeverly['Jeverly']['pic1'].'" width="100px">';
                    echo '<img src="/system/Users/'.$id.'/'.$jeverly['Jeverly']['pic2'].'" width="100px">';
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
                                    'value'=>$jeverly['Jeverly']['categoryId']
                                    
                                    ));
                    }
                    echo $this->Form->input(
                            'weight',
                            array(
                                'type'=>'text',
                                'class'=>'required number',
                                'value'=>$jeverly['Jeverly']['weight']
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
                                    'value'=>$jeverly['Jeverly']['stone']
                                    ));
                    }
                    echo $this->Form->input(
                            'karat',
                            array(
                                'type'=>'number',
                                'div'=>false,
                                'value'=>$jeverly['Jeverly']['karat']
                                ));
                    echo $this->Form->input(
                            'price',
                            array(
                                'type'=>'text',
                                'class'=>'required number',
                                'value'=>$jeverly['Jeverly']['price']
                                ));
                    echo $this->Form->input(
                            'type',
                            array(
                                'type'=>'select',
                                'value'=>$jeverly['Jeverly']['type'],
                                'options'=>array(
                                    'BIJOU'=>'BIJOU',
                                    'GOLDEN'=>'GOLDEN',
                                    'WIGHT'=>'WIGHT'
                                )));
                    echo $this->Form->input(
                            'sex',
                            array(
                                'type'=>'select',
                                'value'=>$jeverly['Jeverly']['sex'],
                                'options'=>array(
                                    'MEN'=>'MEN',
                                    'WOMEN'=>'WOMEN'
                                )));
                    echo $this->Form->submit('save',array('class'=>'btn btn-primary'));
                    echo $this->Form->end();
                } ?>
            </div>
        </div>
    </div>
</div>