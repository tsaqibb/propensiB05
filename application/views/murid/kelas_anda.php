<div class="container content kelas vendor">
    <div class="row">
        <div class="col-sm-8 col-md-12">
            <div class="panel panel-default">
                <h2 class="block-title text-uppercase" style="margin-left:0px;">Kelas Anda</h2>    
                <div class="list-kelas">
                    <div class="row center">
                        <?php
                        $i = 1;
                        $list_classes_student = $data_murid->courses_student->get_list_partisipan_active();
                        foreach ($list_classes_student as $class_student) :
                            if($i % 4 == 0) {
                                echo "</div> <div class='row'>";
                            }
                            $class = $class_student->course->get();
                            ?>
                            <div class="col-md-4">
                                <div style="margin-left:0px; margin-top:5px;" class="section-heading">
                                    <a href="<?php echo base_url().'kelas/detail/'.$class->id;?>" class="section-kelas">
                                        <h3><?php echo $class->nama?></h3>
                                    </a>
                                </div>
                            </div>
                        <?php
                        $i++;
                        endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- /container -->
    
   
    

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script>
    jQuery(document).ready(function($){
        $('.icon-circle').tooltip();
    });
    </script>
  </body>
</html>
