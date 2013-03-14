<?php 
if(isset($note)){
    ?>
    <script type="text/javascript" >
        $(document).ready(function($){
            $.jGrowl("<?php echo $note ?>",{theme:'<?php echo $theme ?>'});
        })
    </script>    
<?php
}