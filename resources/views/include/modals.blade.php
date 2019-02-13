<div class="modal fade" id="delete"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModaldelete"><span></span></h4>
            </div>
            <div class="modal-body"><span id="del_modal"></span><br>
                <font color="red">*All related records will also deleted</font> <a href='' id="link"><font color="red">SHOW RELATED RECORDS</font></a>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">
                    CANCEL
                </button>
                <button type="submit" class="btn btn-sm bg-deep-purple" id="btn_delete">
                    YES
                </button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="active"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalactive"><span></span></h4>
            </div>
            <div class="modal-body"><span id="active_header"></span><br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">
                    CANCEL
                </button>
                <button type="submit" class="btn btn-sm bg-deep-purple" id="btn_active">
                    YES
                </button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">IMAGE PREVIEW</h4>
      </div>
      <div class="modal-body">
        <center><img src="" id="imagepreview" style="width: 400px; height: 300px;" ></center>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>