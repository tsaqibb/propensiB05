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
                      <a type="button" class="main-button register2" onclick="validate()" >Activate all</a>
                        <br><br>
                                    <table class="table" name="table">
                                        <tr>
                                          <td>
                                            <input class ="checkbox" type="checkbox"></input>
                                          </td>
                                          <td class="nama">Fransiska Ayu Dewi Kusumaningtyas <a href="">1206238715</a><br>
                                            <a class ="matkul" href="">Nama Mata Kuliah Kuliah Online </a>
                                            <a class ="matkul"href="">retnowatiwahyu@gmail.com</a>
                                          </td>
                                          <td class="status">
                                            <a href="#" onclick="confirm()" class="approve icon-button"><i class="fa fa-check"></i>Activate</a>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td>
                                            <input class ="checkbox" type="checkbox"></input>
                                          </td>
                                          <td class="nama">Fransiska Ayu Dewi Kusumaningtyas <a href="">1206238715</a><br>
                                            <a class ="matkul" href="">Nama Mata Kuliah Kuliah Online</a>
                                            <a class ="matkul" href="">retnowatiwahyu@gmail.com</a>
                                          </td>
                                          <td class="status">
                                            <a href="#" onclick="confirm()"class="approve icon-button"><i class="fa fa-check"></i>Activate</a>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td>
                                            <input class ="checkbox" type="checkbox"></input>
                                          </td>
                                          <td class="nama">Fransiska Ayu Dewi Kusumaningtyas <a href="">1206238715</a><br>
                                            <a class ="matkul" href="">Nama Mata Kuliah Kuliah Online </a>
                                            <a class ="matkul" href="">retnowatiwahyu@gmail.com</a>
                                          </td>
                                          <td class="status">
                                            <a href="#" onclick="confirm()" class="approve icon-button"><i class="fa fa-check"></i>Activate</a>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td>
                                            <input class ="checkbox" type="checkbox"></input>
                                          </td>
                                          <td class="nama">Fransiska Ayu Dewi Kusumaningtyas <a href="">1206238715</a><br>
                                            <a class ="matkul" href="">Nama Mata Kuliah Kuliah Online </a>
                                            <a class ="matkul" href="">retnowatiwahyu@gmail.com</a>
                                          </td>
                                          <td class="status">
                                            <a href="#" onclick="confirm()" class="approve icon-button"><i class="fa fa-check"></i>Activate</a>
                                          </td>
                                        </tr>
                                         <tr>
                                          <td>
                                            <input class ="checkbox" type="checkbox"></input>
                                          </td>
                                          <td class="nama">Fransiska Ayu Dewi Kusumaningtyas <a href="">1206238715</a><br>
                                            <a class ="matkul" href="">Nama Mata Kuliah Kuliah Online </a>
                                            <a class ="matkul" href="">retnowatiwahyu@gmail.com</a>
                                          </td>
                                          <td class="status">
                                            <a href="#" onclick="confirm()" class="approve icon-button"><i class="fa fa-check"></i>Activate</a>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td>
                                            <input class ="checkbox" type="checkbox"></input>
                                          </td>
                                          <td class="nama">Fransiska Ayu Dewi Kusumaningtyas <a href="">1206238715</a><br>
                                            <a class ="matkul" href="">Nama Mata Kuliah Kuliah Online </a>
                                            <a class ="matkul" href="">retnowatiwahyu@gmail.com</a>
                                          </td>
                                          <td class="status">
                                            <a href="#" onclick="confirm()" class="approve icon-button"><i class="fa fa-check"></i>Activate</a>
                                          </td>
                                        </tr>
                                         <tr>
                                          <td>
                                            <input class ="checkbox" type="checkbox"></input>
                                          </td>
                                          <td class="nama">Fransiska Ayu Dewi Kusumaningtyas <a href="">1206238715</a><br>
                                            <a class ="matkul" href="">Nama Mata Kuliah Kuliah Online </a>
                                            <a class ="matkul" href="">retnowatiwahyu@gmail.com</a>
                                          </td>
                                          <td class="status">
                                            <a href="#" onclick="confirm()" class="approve icon-button"><i class="fa fa-check"></i>Activate</a>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td>
                                            <input class ="checkbox" type="checkbox"></input>
                                          </td>
                                          <td class="nama">Fransiska Ayu Dewi Kusumaningtyas <a href="">1206238715</a><br>
                                            <a class ="matkul" href="">Nama Mata Kuliah Kuliah Online </a>
                                            <a class ="matkul" href="">retnowatiwahyu@gmail.com</a>
                                          </td>
                                          <td class="status">
                                            <a href="#" onclick="confirm()" class="approve icon-button"><i class="fa fa-check"></i>Activate</a>
                                          </td>
                                        </tr>
                                      </table>   
 