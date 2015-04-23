<script>
    function toggle(source) {
        checkboxes = document.getElementsByTagName('input');
        for(var i=0, n=checkboxes.length;i<n;i++) {
            checkboxes[i].checked = source.checked;
        }
    }
</script>

<script type=text/javascript>
    function validasi(){
        if (document.getElementById("all").checked){
            var r=confirm("Apakah Anda yakin ingin menyetujui semua murid tersebut?");
            if (r==true){
                alert("Approval berhasil");
            }
            else{
                alert("Approval Anda telah dibatalkan");
            }
        }
        else{
            if(document.getElementById("satu").checked){
                var r=confirm("Apakah Anda yakin ingin menyetujui murid tersebut?");
                if (r==true){
                    alert("Approval berhasil");
                }
                else{
                    alert("Approval Anda telah dibatalkan");
                }
            }
            else(alert("Anda belum memilih murid"));
        }
    }
</script>

</script>
<script type=text/javascript>
    function konfirmasi(){
        var r=confirm("Apakah Anda yakin ingin menyetujui murid tersebut?");
        if (r==true){
            alert("Approval berhasil");
        }
        else{
            alert("Approval Anda telah dibatalkan");
            return false;
        }
    }
    /*$("a").click(function(e){
        if(!confirm("Apakah Anda yakin ingin menyetujui murid tersebut?"))
            e.preventDefault();
    });*/
</script>

<h2 class="block-title judul text-uppercase">DAFTAR CALON MURID</h2>
<br>
<hr class="line">
<br>
<input class="checkbox1" type="checkbox" onclick="toggle(this)">
    <strong>select all</strong>
</input>
<span>
    <form method="POST" action="<?php echo base_url()."kelas/setAllActive";?>" >
    <input type="submit" value="Activate all"  class="main-button register2">
</span>
<div id="container" class="kelas-online">
    <div class="shell">
        <!-- Main -->
        <div id="main">
            <div class="cl">&nbsp;</div>
            <!-- Content -->
            <div id="content">
                <!-- Box -->
                <div class="box">
                    <!-- Box Head -->
                    <div class="box-head">
                        <h2 class="left ">Calon Murid</h2>
                    </div>
                    <!-- End Box Head -->
                    <div class="table">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <thead>
                                <tr>
                                    <th class="center">Check</th>
                                    <th class="center">Nama</th>
                                    <th class="center">Kelas</th>
                                    <th class="center">Harga</th>
                                    <th class="center">Email</th>
                                    <th class="center">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach ($list_partisipan as $Calon) :
                                $course = $Calon->course->get();
                                $student = $Calon->student->get();
                                ?>
                                <tr>
                                   <td class ="center">
                                        <input type="checkbox" value="<?php echo $Calon->student_id; ?>" name="id[]"></input>
                                    </td>
                                    
                                    <td>
                                        <a href="#profile"><?php echo $student->nama; ?> (<?php echo $Calon->student_id; ?>)</a>
                                    </td>
                                    
                                    <td>
                                        <a href="<?php echo base_url()."kelas/detail/".$Calon->course_id;?>"><?php echo $course->nama; ?> (<?php echo $course->id; ?>)</a>
                                    </td>                                   
                                    
                                     <td>
                                        <?php echo $course->harga; ?>
                                    </td>

                                    <td class ="center">
                                        <a href="#gmail"><?php echo $student->email; ?></a>
                                    </td>
                                    
                                    <td class ="center">
                                        <a href="<?php echo base_url()."kelas/setActive/".$Calon->student_id."/".$Calon->course_id; ?>" class="approve icon-button"><i class="fa fa-check"></i>Activate</a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </form>
                            </tbody>
                        </table>
                    </div><!--class table-->
                </div>
            </div>
            <div class="cl">&nbsp;</div>            
        </div><!-- Main -->
    </div>
</div>