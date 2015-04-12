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
              <br><h2 class="block-title judulp text-uppercase">KELAS PROPENSI - DAFTAR MURID</h2><br>
                  <hr class="line"><br>
                    <input class ="checkbox1" type="checkbox" onclick="toggle(this)"><strong>select all</strong></input>
                      <a type="button" class="main-button register3" onclick="validate()" >Deactivate all</a>
                        <br><br>
                                    <table class="table tablep">
<?php
    //var_dump($kelas); exit;
    $this->load->helper('text');
    foreach ($list_partisipan as $partisipan) :
?>
                                        <tr>
                                          <td>
                                            <input class ="checkbox" type="checkbox"></input>
                                          </td>
                                          <td class="nama"><?php echo $partisipan->nama; ?><a href=""><?php echo $partisipan->id; ?></a><br>
                                            
                                            <a class ="matkul"href=""><?php echo $partisipan->email; ?></a>
                                          </td>
                                          <td class="status">
                                            <a href="#" onclick="confirm()" class="approve icon-buttonp"><i class="fa fa-check"></i>Deactivate</a>
                                          </td>
                                        </tr>
                                        <tr>
<?php
    endforeach;
?>
                                      <table class="table tablep">
                                        <tr>
                                          <td>
                                            <input class ="checkbox" type="checkbox"></input>
                                          </td>
                                          <td class="nama">Fransiska Ayu Dewi Kusumaningtyas <a href="">1206238715</a><br>
                                            
                                            <a class ="matkul"href="">retnowatiwahyu@gmail.com</a>
                                          </td>
                                          <td class="status">
                                            <a href="#" onclick="confirm()" class="approve icon-buttonp"><i class="fa fa-check"></i>Deactivate</a>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td>
                                            <input class ="checkbox" type="checkbox"></input>
                                          </td>
                                          <td class="nama">Fransiska Ayu Dewi Kusumaningtyas <a href="">1206238715</a><br>
                                            
                                            <a class ="matkul" href="">retnowatiwahyu@gmail.com</a>
                                          </td>
                                          <td class="status">
                                            <a href="#" onclick="confirm()"class="approve icon-buttonp"><i class="fa fa-check"></i>Deactivate</a>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td>
                                            <input class ="checkbox" type="checkbox"></input>
                                          </td>
                                          <td class="nama">Fransiska Ayu Dewi Kusumaningtyas <a href="">1206238715</a><br>
                                           
                                            <a class ="matkul" href="">retnowatiwahyu@gmail.com</a>
                                          </td>
                                          <td class="status">
                                            <a href="#" onclick="confirm()" class="approve icon-buttonp"><i class="fa fa-check"></i>Deactivate</a>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td>
                                            <input class ="checkbox" type="checkbox"></input>
                                          </td>
                                          <td class="nama">Fransiska Ayu Dewi Kusumaningtyas <a href="">1206238715</a><br>
                                           
                                            <a class ="matkul" href="">retnowatiwahyu@gmail.com</a>
                                          </td>
                                          <td class="status">
                                            <a href="#" onclick="confirm()" class="approve icon-buttonp"><i class="fa fa-check"></i>Deactivate</a>
                                          </td>
                                        </tr>
                                         <tr>
                                          <td>
                                            <input class ="checkbox" type="checkbox"></input>
                                          </td>
                                          <td class="nama">Fransiska Ayu Dewi Kusumaningtyas <a href="">1206238715</a><br>
                                            
                                            <a class ="matkul" href="">retnowatiwahyu@gmail.com</a>
                                          </td>
                                          <td class="status">
                                            <a href="#" onclick="confirm()" class="approve icon-buttonp"><i class="fa fa-check"></i>Deactivate</a>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td>
                                            <input class ="checkbox" type="checkbox"></input>
                                          </td>
                                          <td class="nama">Fransiska Ayu Dewi Kusumaningtyas <a href="">1206238715</a><br>
                                            
                                            <a class ="matkul" href="">retnowatiwahyu@gmail.com</a>
                                          </td>
                                          <td class="status">
                                            <a href="#" onclick="confirm()" class="approve icon-buttonp"><i class="fa fa-check"></i>Deactivate</a>
                                          </td>
                                        </tr>
                                         <tr>
                                          <td>
                                            <input class ="checkbox" type="checkbox"></input>
                                          </td>
                                          <td class="nama">Fransiska Ayu Dewi Kusumaningtyas <a href="">1206238715</a><br>
                                            
                                            <a class ="matkul" href="">retnowatiwahyu@gmail.com</a>
                                          </td>
                                          <td class="status">
                                            <a href="#" onclick="confirm()" class="approve icon-buttonp"><i class="fa fa-check"></i>Deactivate</a>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td>
                                            <input class ="checkbox" type="checkbox"></input>
                                          </td>
                                          <td class="nama">Fransiska Ayu Dewi Kusumaningtyas <a href="">1206238715</a><br>
                                            
                                            <a class ="matkul" href="">retnowatiwahyu@gmail.com</a>
                                          </td>
                                          <td class="status">
                                            <a href="#" onclick="confirm()" class="approve icon-buttonp"><i class="fa fa-check"></i>Deactivate</a>
                                          </td>
                                        </tr>
                                      </table>   
 