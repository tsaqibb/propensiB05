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
        var masukan = document.getElementsByTagName("input");
        if (masukan.checked){
            var r=confirm("Apakah Anda yakin ingin menyetujui murid tersebut?");
            if (r==true){
                alert("Approval berhasil");
            }
            else{
                alert("Approval Anda telah dibatalkan");
            }
        }
        else{
            alert("Anda belum memilih murid")
        }
    }
</script>
<script type=text/javascript>
(function()){
document.getElementsByTagName('input').onsubmit = function() {
    // get reference to required checkbox
    var terms = this.elements['terms'];
    
    if ( !terms.checked ) { // if it's not checked
        // display error info (generally not an alert these days)
        alert( 'Please signify your agreement with our terms.' );
        return false; // don't submit
    }
    return true; // submit
}
};
</script>
<script type=text/javascript>
    function konfirmasi(){
        var r=confirm("Apakah Anda yakin ingin menyetujui murid tersebut?");
        if (r==true){
            alert("Approval berhasil");
        }
        else{
            alert("Approval Anda telah dibatalkan");
        }
    }
</script>
<h2 class="block-title judul text-uppercase">DAFTAR CALON MURID</h2>
<br>
<hr class="line">
<br>
<input class ="checkbox1" type="checkbox" onclick="toggle(this)">
    <strong>select all</strong>
</input>
<span>
    <a href="#" type="button" class="main-button register2" onclick="function()">Activate all</a>
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
                                    <th class="center">No</th>
                                    <th class="center">Nama</th>
                                    <th class="center">ID Murid</th>
                                    <th class="center">Kelas</th>
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
                                        <input  type="checkbox"></input>
                                    </td>
                                        
                                    <td class ="center">
                                    </td>

                                    <td>
                                        <a href="#"><?php echo $student->nama; ?></a>
                                    </td>

                                    <td class ="center">
                                        <?php echo $Calon->student_id; ?>
                                    </td>
                                    
                                    <td>
                                        <a href="#"><?php echo $course->nama; ?></a>
                                    </td>                                   
                                    
                                    <td class ="center">
                                        <a href="#"><?php echo $student->e_mail; ?></a>
                                    </td>
                                    
                                    <td class ="center">
                                        <a href="#" onclick="konfirmasi()" class="approve icon-button"><i class="fa fa-check"></i>Activate</a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div><!--class table-->
                </div>
            </div>
            <div class="cl">&nbsp;</div>            
        </div><!-- Main -->
    </div>
</div>