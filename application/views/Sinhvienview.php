
<h2>FORM SINH VIÊN</h2>
  <form action="" method='post'> 
    <div class="form-group">
      <label for="masv">Mã sinh viên:</label>

      <input type="text" id="masv" { (isset($sv)) ? 'disabled' :''} class="form-control" id="masv" placeholder="Mã sinh viên" name="masv" value="{(isset($sv))? $sv['ma_sv'] :null }">
      </div>
    <div class="form-group">
      <label for="tensv">Tên sinh viên:</label>
      <input  type="text"id="tensv" class= "form-control" id="tensv" placeholder="Nhập tên sinh viên" name="tensv" value="{(isset($sv))? $sv['ten_sv']:null }" size='50'>
    </div>
    <div class="form-group">
      <label >Giới tính:</label>
      <div class="radio">
        <label class="radio-inline">
          <input type="radio" id="gtsv" name="gtsv" value="Nam" {((isset($sv)) && $sv['gioitinh_sv']=='Nam') ? 'checked' :null }>Nam
        </label>
        <label class="radio-inline">
          <input type="radio" id="gtsv" name="gtsv" value="Nữ" {((isset($sv)) && $sv['gioitinh_sv']=='Nữ') ?'checked' :null }>Nữ
        </label>
        <label class="radio-inline">
          <input type="radio" id="gtsv" name="gtsv" value="GT khác" {((isset($sv)) && $sv['gioitinh_sv']=='GT khác') ?'checked' :null }>Giới tính khác
        </label>
      </div>
    </div>
    <div class="form-group" khác
      <label for="nssv">Năm sinh :</label>
      <input type="text" id="nssv" class="form-control" id="nssv" placeholder="Nhập năm sinh" name="nssv" value="{(isset($sv))? $sv['namsinh_sv'] :null }">
    </div>
    <div class="form-group">
      <label for="qqsv">Quê quán:</label>
      <input type="text" id="qqsv" class="form-control" id="qqsv" placeholder="Nhập quê quán" name="qqsv" value="{(isset($sv))? $sv['quequan_sv'] :null }">
    </div>
      {if isset($sv)}
          <button type="submit" class="btn btn-primary" name="update" value=" {$sv['ma_sv'] }">Cập nhật</button>{else}
          <button type="submit" id="them" class="btn btn-primary" name="them" value="them">Thêm</button>
      {/if}
    
    <script type="text/javascript">
       var them= document.getElementById('them');
            them.onclick = function (){
                var masv = document.getElementById('masv').value;
                var tensv= document.getElementById('tensv').value;
                var gtsv= document.getElementById('gtsv').value;
                var nssv= document.getElementById('nssv').value;
                var qqsv= document.getElementById('qqsv').value;
                if(masv==0){
                    alert("Mã sinh viên không để trống");
                    return false;
                }
                if(tensv==0){
                    alert("Tên sinh viên không để trống");
                    return false;
                }
                if(gtsv==0){
                    alert("Giới tính sinh vien khong de trong");
                    return false;
                }
                if(nssv==0){
                    alert("Năm sinh sinh viên không để trống");
                    return false;
                }
                if(qqsv==0){
                    alert("Quê quán sinh viên không để trống");
                    return false;
                }
            }
    </script>
  <br>
  <br>
      <table class="table table-striped">
        <thead>
            <tr>
              <th>STT</th>
              <th>Mã sinh viên</th>
              <th>Tên sinh viên</th>
            <th>Giới tinh</th>
            <th>Năm sinh</th>
            <th>Quê quán</th>
            <th>Tác vụ</th>
          </tr>
        </thead>
        <tbody>
              {foreach $sinhvien AS $key=>$val }
          
          <tr>
            <td>{$key+1 }</td>
            <td>{$val.ma_sv}</td>
            <td>{$val.ten_sv}</td>
            <td>{$val.gioitinh_sv}</td>
            <td>{$val.namsinh_sv}</td>
            <td>{$val.quequan_sv}</td>
            <td> <a href="sinhvien?ma_sv={$val.ma_sv}"class="btn btn-primary">Sửa</a>
            <button type="submit" name="xoa" value="{$val.ma_sv}" onclick="return confirm('Do you delete?')" class="btn btn-danger">Xóa</button></td>
          </tr>
          {/foreach}
        </tbody>
      </table>
    </form>
  
