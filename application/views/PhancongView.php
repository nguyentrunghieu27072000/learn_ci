<div class="row" style="margin-top: 40px;">
    <div class="col" style="height:30px; background: #efefef;font-size: 16px;line-height: 30px;width: 100%">
     <!--  <button class="btn btn-primary float-right">Add payees</button> -->

      <b>Phân công giảng dạy</b>
      <!-- <p><strong>Step 1:</strong> Select from your list of available payees to build a payment list</p>
      <hr> -->
    </div>
  </div>
  <div class="row" style="height:50px;line-height: 50px; ">
    <div class="col">
      <ul style=" margin: 0px; padding:0px; text-align:right; list-style: none;">
        <li style="float: left; ">
          <b>Cán bộ giảng dạy: Trần Văn A - Chuyên ngành: Kinh tế học - Học hàm-học vị:</b>
        </li style="float: left;">
        <li>
          <a href="#" class="btn btn-info btn-small">
            <span class="glyphicon glyphicon-circle-arrow-left"></span>
          </a>
        </li>
      </ul>
    </div>
  </div>
  <div class="row" style="margin-bottom: 40px;">
    <div class="col">
      <form id="demoform" method="post">
        <select size="10" name="monhoc[]" id="duallistbox" title="Chọn môn học" multiple>
        	{foreach $monhoc AS $key=>$val}
              {if isset($mon_canbo[$val['madm_mh']])}
		            <option value="{$val.madm_mh}" selected="selected">{$val.ten_mh}</option>
              {else}
                <option value="{$val.madm_mh}">{$val.ten_mh}</option>
              {/if}
			    {/foreach}
        </select>
        <br>
          <div class="row">
            <div class="col-md-2 offset-md-10">
              <button type="submit" name='capnhat'  value='capnhat' id="submit" class="btn btn-primary w-100">Cập nhật</button>
            </div>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
	  	var demo1 = $('#duallistbox').bootstrapDualListbox({
	    	nonSelectedListLabel: 'Danh mục môn học',
	    	selectedListLabel: 'Danh mục môn học',
	    	// preserveSelectionOnMove: 'moved',
	    	moveOnSelect:false
	  	});
	   // 	$("#demoform").submit(function() {
		  //   console.log($('#duallistbox').val());
	  	// });
  	    // $('#submit').on('click', function() {
  		   //  $('#duallistbox').val();
  	    // })

</script>
<style type="text/css">
	.buttons .btn{
		border: 1px solid #ced4da;
	}
</style>










    	