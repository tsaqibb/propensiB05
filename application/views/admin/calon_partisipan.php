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
            return confirm("Apakah Anda yakin ingin menyetujui semua murid tersebut?");
        }
        else{
            if(document.getElementById("satu").checked){
                return confirm("Apakah Anda yakin ingin menyetujui murid tersebut?");
            }
            else(alert("Anda belum memilih murid"));
        }
    }
</script>

<script type=text/javascript>
    function konfirmasi(){
        return confirm("Apakah Anda yakin ingin menyetujui murid tersebut?");
    }
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
    <input id = "all" type="submit" value="Activate all"  onclick ="return validasi()" class="main-button register2">
</span>
<div id="container" class="kelas-online">
    <div class="shell">
        <!-- Main -->
        <div id="main">
            <div class="cl">&nbsp;</div>
            <!-- Content -->
            <div id="content">
                <!-- Box -->
                <div class="box murid">
                    <!-- Box Head -->
                    <div class="box-head murid">
                        <h2 class="left ">Calon Murid</h2>
                    </div>
                    <!-- End Box Head -->
                    <div class="table murid">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" >
                            <thead>
                                <tr>
                                    <th class="center">Check</th>
                                    <th class="center">Nama Murid (ID)</th>
                                    <th class="center">Nama Kelas (ID)</th>
                                    <th class="center">Harga Kelas</th>
                                    <th class="center">Email Murid</th>
                                    <th class="center">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach ($list_partisipan as $Calon) :
                                $course = $Calon->course->get();
                                $student = $Calon->student->get();
                                ?>
                                <tr>
                                   <td>
                                        <input id="satu" type="checkbox" value="<?php echo $Calon->student_id; ?>" name="id[]"></input>
                                    </td>
                                    
                                    <td>
                                        <?php echo $student->nama; ?> (<?php echo $Calon->student_id; ?>)
                                    </td>
                                    
                                    <td>
                                        <a href="<?php echo base_url()."kelas/detail/".$Calon->course_id;?>"><?php echo $course->nama; ?> (<?php echo $course->id; ?>)</a>
                                    </td>                                   
                                    
                                     <td>
                                        <?php echo $course->harga; ?>
                                    </td>

                                    <td class ="center">
                                        <?php echo $student->email; ?>
                                    </td>
                                    
                                    <td  class ="center">
                                        <a href="<?php echo base_url()."kelas/setActive/".$Calon->student_id."/".$Calon->course_id; ?>" onclick= "return konfirmasi()" class="approve icon-button" id="satu"><i class="fa fa-check"></i>Activate</a>
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