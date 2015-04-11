<script>
function toggle(source) {
  checkboxes = document.getElementsByTagName('input');
  for(var i=0, n=checkboxes.length;i<n;i++) {
    checkboxes[i].checked = source.checked;
  }
}
</script>
<script type="text/javascript">
  function show_confirm()
  {
    var r=confirm("Apakah Anda yakin akan mengaktifkan murid?");
    if (r==true)
    {
      alert("Approve berhasil");
    }
    else
    {
      alert("Approval Anda telah dibatalkan");
    }
  }
</script>
                <h2 class="block-title judul text-uppercase">DAFTAR CALON MURID</h2><br><hr class="line"><br>
                    <!--<div role="tabpanel" class="tab-pane active" id="partisipan">-->
                        <input class ="checkbox1" type="checkbox" onclick="toggle(this)">select all</input>
                            <a type="button" onclick="show_confirm()" value="Show confirm box" class="main-button register2">Activate all</a>
                                <br><br>
                                    <table class="table">
                                        <tr>
                                          <td>
                                            <input class ="checkbox" type="checkbox"></input>
                                          </td>
                                          <td class="nama">Nama Murid Pertama - <a href=""> 1206238715</a><br>
                                            <a class ="matkul" href="">Nama Mata Kuliah Kuliah Online </a>
                                            <small class="matkul text-muted"><span class="fa fa-clock-o"></span>30 Desember 2015</small>
                                          </td>
                                          <td class="status">
                                            <a href="#" onclick="show_confirm()" value="Show confirm box" class="approve icon-button"><i class="fa fa-check"></i>Activate</a>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td>
                                            <input class ="checkbox" type="checkbox"></input>
                                          </td>
                                          <td class="nama">Nama Murid Kedua - <a href=""> 1206238715</a><br>
                                            <a class ="matkul" href="">Nama Mata Kuliah Kuliah Online</a>
                                            <small class="matkul text-muted"><span class="fa fa-clock-o"></span>30 Desember 2015</small>
                                          </td>
                                          <td class="status">
                                            <a href="#" onclick="show_confirm()" value="Show confirm box" class="approve icon-button"><i class="fa fa-check"></i>Activate</a>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td>
                                            <input class ="checkbox" type="checkbox"></input>
                                          </td>
                                          <td class="nama">Nama Murid Ketiga - <a href=""> 1206238715</a><br>
                                            <a class ="matkul" href="">Nama Mata Kuliah Kuliah Online</a>
                                            <small class="matkul text-muted"><span class="fa fa-clock-o"></span>30 Desember 2015</small>
                                          </td>
                                          <td class="status">
                                            <a href="#" onclick="show_confirm()" value="Show confirm box" class="approve icon-button"><i class="fa fa-check"></i>Activate</a>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td>
                                            <input class ="checkbox" type="checkbox"></input>
                                          </td>
                                          <td class="nama">Nama Murid keempat - <a href=""> 1206238715</a><br>
                                            <a class ="matkul" href="">Nama Mata Kuliah Kuliah Online</a>
                                            <small class="matkul text-muted"><span class="fa fa-clock-o"></span>30 Desember 2015</small>
                                          </td>
                                          <td class="status">
                                            <a href="#" onclick="show_confirm()" value="Show confirm box" class="approve icon-button"><i class="fa fa-check"></i>Activate</a>
                                          </td>
                                        </tr>
                                         <tr>
                                          <td>
                                            <input class ="checkbox" type="checkbox"></input>
                                          </td>
                                          <td class="nama">Nama Murid kelima - <a href=""> 1206238715</a><br>
                                            <a class ="matkul" href="">Nama Mata Kuliah Kuliah Online</a>
                                            <small class="matkul text-muted"><span class="fa fa-clock-o"></span>30 Desember 2015</small>
                                          </td>
                                          <td class="status">
                                            <a href="#" onclick="show_confirm()" value="Show confirm box" class="approve icon-button"><i class="fa fa-check"></i>Activate</a>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td>
                                            <input class ="checkbox" type="checkbox"></input>
                                          </td>
                                          <td class="nama">Nama Murid Keenam - <a href=""> 1206238715</a><br>
                                            <a class ="matkul" href="">Nama Mata Kuliah Kuliah Online</a>
                                            <small class="matkul text-muted"><span class="fa fa-clock-o"></span>30 Desember 2015</small>
                                          </td>
                                          <td class="status">
                                            <a href="#" onclick="show_confirm()" value="Show confirm box" class="approve icon-button"><i class="fa fa-check"></i>Activate</a>
                                          </td>
                                        </tr>
                                         <tr>
                                          <td>
                                            <input class ="checkbox" type="checkbox"></input>
                                          </td>
                                          <td class="nama">Nama Murid Ketujuh - <a href=""> 1206238715</a><br>
                                            <a class ="matkul" href="">Nama Mata Kuliah Kuliah Online</a>
                                            <small class="matkul text-muted"><span class="fa fa-clock-o"></span>30 Desember 2015</small>
                                          </td>
                                          <td class="status">
                                            <a href="#" onclick="show_confirm()" value="Show confirm box" class="approve icon-button"><i class="fa fa-check"></i>Activate</a>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td>
                                            <input class ="checkbox" type="checkbox"></input>
                                          </td>
                                          <td class="nama">Nama Murid Kedelapan - <a href=""> 1206238715</a><br>
                                            <a class ="matkul" href="">Nama Mata Kuliah Kuliah Online </a>
                                            <small class="matkul text-muted"><span class="fa fa-clock-o"></span>30 Desember 2015</small>
                                          </td>
                                          <td class="status">
                                            <a href="#" onclick="show_confirm()" value="Show confirm box" class="approve icon-button"><i class="fa fa-check"></i>Activate</a>
                                          </td>
                                        </tr>
                                      </table><br><br>   
 