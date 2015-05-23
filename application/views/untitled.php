<script type=text/javascript>
    $(function() {   
           $("buttonS.").click(function() {  
           // validate and process form here
           var radio_button_value;

           if ($("input[name='rating-input-1']:checked").length > 0){
               radio_button_value = $('input:radio[name=rating-input-1]:checked').val();
           }
           else{
               alert("Belum ada rating yang diberikan!");
               return false;
           }
           $.ajax({
               type: "POST", 
               url: "base_url();?>kelas/detail/add_review/<?php echo $data_kelas->id; ?>",  
               data: {"rating-input-1":radio_button_value},  
               success: function() { 
                    alert("Rating yang disimpan: "+ radio_button_value);
               }
            });
            return false;
         });
});
</script>

<script>
$(document).ready(function()
{
    var star_value;
    if ($("input[name='rating-input-1']:checked").length > 0){
      star_value = $('input:radio[name=rating-input-1]:checked').val();
      return confirm("Berikan rating " + star_value +"?");
    }
    $.ajax ({
       type: "POST",
       url: "localhost/propensib05/kelas/add_review/",
       data: {"postID" : $postID },
       success: function() { 
                    alert("Rating yang anda berikan: "+ radio_button_value);
               }
    });
});
</script>

<?php if ($class_rating > 0.0 && $class_rating < 0.3) : ?>
                        <i class="fa fa-star-o fa-2x"></i>
                        <i class="fa fa-star-o fa-2x"></i>
                        <i class="fa fa-star-o fa-2x"></i>
                        <i class="fa fa-star-o fa-2x"></i>
                        <i class="fa fa-star-o fa-2x"></i>
                        <?php endif ?>
<?php if ($class_rating > 0.2 && $class_rating < 1.5) : ?>
                        <i class="fa fa-star fa-2x"></i>
                        <i class="fa fa-star-o fa-2x"></i>
                        <i class="fa fa-star-o fa-2x"></i>
                        <i class="fa fa-star-o fa-2x"></i>
                        <i class="fa fa-star-o fa-2x"></i>
                        <?php endif ?>
                        <?php if($class_rating > 1.5 && $class_rating < 2.6) : ?>
                        <i class="fa fa-star fa-2x"></i>
                        <i class="fa fa-star fa-2x"></i>
                        <i class="fa fa-star-o fa-2x"></i>
                        <i class="fa fa-star-o fa-2x"></i>
                        <i class="fa fa-star-o fa-2x"></i>
                        <?php endif ?>
                        <?php if($class_rating > 2.5 && $class_rating < 3.6) : ?>
                        <i class="fa fa-star fa-2x"></i>
                        <i class="fa fa-star fa-2x"></i>
                        <i class="fa fa-star fa-2x"></i>
                        <i class="fa fa-star-o fa-2x"></i>
                        <i class="fa fa-star-o fa-2x"></i>
                        <?php endif ?>
                        <?php if($class_rating > 3.5 && $class_rating < 4.6) : ?>
                        <i class="fa fa-star fa-2x"></i>
                        <i class="fa fa-star fa-2x"></i>
                        <i class="fa fa-star fa-2x"></i>
                        <i class="fa fa-star fa-2x"></i>
                        <i class="fa fa-star-o fa-2x"></i>
                        <?php endif ?>
                        <?php if($class_rating > 3.9 && $class_rating < 4.6) : ?>
                        <i class="fa fa-star fa-2x"></i>
                        <i class="fa fa-star fa-2x"></i>
                        <i class="fa fa-star fa-2x"></i>
                        <i class="fa fa-star fa-2x"></i>
                        <i class="fa fa-star fa-2x"></i>
                        <?php endif ?>
                        <?php if($class_rating > 4.5) : ?>
                        <i class="fa fa-star fa-2x"></i>
                        <i class="fa fa-star fa-2x"></i>
                        <i class="fa fa-star fa-2x"></i>
                        <i class="fa fa-star-o fa-2x"></i>
                        <i class="fa fa-star-o fa-2x"></i>
                        <?php endif ?>