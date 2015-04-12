<script>
  function toggle(source) 
  {
  checkboxes = document.getElementsByTagName('input');
    for(var i=0, n=checkboxes.length;i<n;i++) 
    {
      checkboxes[i].checked = source.checked;
    }
  }
</script>

<script type=text/javascript>
    function validate()
    {
      var masukan = document.getElementsByTagName("input");
        if (masukan.checked)
        {
            var r=confirm("Apakah Anda yakin ingin menyetujui murid tersebut?");
            if (r==true)
            {
                alert("Approval berhasil");
            }
            else
            {
                alert("Approval Anda telah dibatalkan");
            }
        }
        else
        {
            alert("Anda belum memilih murid")
        }
    }
</script>
<script type=text/javascript>
function confirm()
    {
            var r=confirm("Apakah Anda yakin ingin menyetujui murid tersebut?");
            if (r==true)
            {
                alert("Approval berhasil");
            }
            else
            {
                alert("Approval Anda telah dibatalkan");
            }
    }
</script>
<br><h2 class="block-title judul text-uppercase">DAFTAR CALON MURID</h2><br>
                  <hr class="line"><br>
                    <input class ="checkbox1" type="checkbox" onclick="toggle(this)"><strong>select all</strong></input>
                      <span><a type="button" class="main-button register2" onclick="validate()" >Activate all</a></span>
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
                                    <th>Check</th>
                                    <th>No</th>
                                    <th>Nama</th>
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
                                //var_dump($course); continue;
                                ?>
                                <tr class ="center">
                                    <td>
                                        <input  type="checkbox"></input>
                                    </td>
                                        
                                    <td>
                                    </td>

                                    <td>
                                        <a href="#"><?php echo $student->nama; ?></a>
                                    </td>

                                    <td>
                                        <a href="#"><?php echo $Calon->student_id; ?></a>
                                    </td>
                                    
                                    <td>
                                        <a href="#"><?php echo $course->nama; ?></a>
                                    </td>                                   
                                    
                                    <td>
                                        <a><?php echo $student->e_mail; ?></a>
                                    </td>
                                     <td>
                                        <span><a href="#" onclick="confirm()" class="approve icon-button"><i class="fa fa-check"></i>Activate</a></span>
                                    </td>

                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div><!--class table-->

                </div>
                </div>
                <div class="cl">&nbsp;</div>            
            </div>
        </div>
        <!-- Main -->
    </div>
</div>