<?php
if (isset($_GET['testing']))
{
    echo "<pre>";
    print_r($sessions);
    exit("</pre>");
}
?>

<div class="main-content" >
    <div class="wrap-content container" id="container">
        <form name="frm_credit" id="frm_credit" method="POST" action="">
            <div class="container-fluid container-fullw bg-white">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="panel panel-primary" id="panel5">
                            <div class="panel-heading">
                                <h4 class="panel-title text-white">Push Notifications</h4>
                            </div>
                            <div class="panel-body bg-white" style="border: 1px solid #b2b7bb;">
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1">
                                        <div class="form-group">
                                            <label for="visibility">Visibility :</label>
                                            <select class="form-control" id="visibility" name="visibility">

                                                <option id="whole-site" value="null">Whole Site</option>
                                                <option id="select-list" value="home">Lobby Only</option>
                                                <?php
                                                foreach ($sessions as $session)
                                                { ?>
                                                    <option id="select-list" value="<?=$session['sessions_id']?>">Session <?=$session['sessions_id']?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                            <br>
                                            <div class="form-group">
                                            <input type="checkbox" id="presenter" name="chk_presenter" value="presenter">
                                            <label for="presenter">Presenter</label><br>
                                            <input type="checkbox" id="attendee" name="chk_attendee" value="attendee">
                                            <label for="attendee">Attendee</label><br>
                                            </div>
                                            <small style="color: grey;">Note: Sending a session specific push notification will go to both the attend and view pages.</small>
                                        </div>
                                        <div class="form-group">
                                            <label class="text-large" >Message :</label>
                                            <textarea name="message" id="message" rows="3" class="form-control" placeholder="Enter Message..." style="color: #5b5b60"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="text-large" >Redirect Name: <i class="badge badge-success">new</i><small class="text-danger"> If this is unset Session Number will be visible in notification</small></label>
                                            <input type="text" name="redirect_name" id="redirect_name" class="form-control" placeholder="TESTING SESSION ..." style="color: #5b5b60">
                                        </div>

                                        <label for="session_redirect" class="text-large">Session Redirect :</label>
                                        <select class="form-control" id="session_redirect" name="session_redirect">
                                            <option value="null"> Session </option>
                                            <?php
                                            foreach ($sessions as $session)
                                            { ?>
                                                <option value="<?= $session['sessions_id']?>">Session <?=$session['sessions_id']?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>

                                        <h5 class="over-title margin-bottom-15">
                                            <button type="button" id="save_btn" name="save_btn" class="btn btn-green add-row">
                                                Save
                                            </button>
                                            <button type="button" id="update_btn" name="update_btn" class="btn btn-green add-row">
                                                Update
                                            </button>
                                        </h5>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">                     
                    <div class="col-md-12">
                        <div class="panel panel-light-primary" id="panel5">
                            <div class="panel-heading">
                                <h4 class="panel-title text-white">Push Notifications</h4>
                            </div>
                            <div class="panel-body bg-white" style="border: 1px solid #b2b7bb;">
                                <span id="errortxtsendemail" style="color:red;"></span>
                                <h5 class="over-title margin-bottom-15 margin-top-5">Push Notifications<span class="text-bold"></span></h5>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover table-full-width" id="plan_table">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Visibility</th>
                                                <th>Message</th>
                                                <th>Redirect Name</th>
                                                <th>Redirect Session</th>
                                                <th>Viewer</th>
                                                <th>Action</th>                          
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (!empty($push_notifications)) {
                                                foreach ($push_notifications as $val) {
                                                    ?>
                                                    <tr>
                                                        <td><?= date("Y-m-d", strtotime($val->notification_date)) ?></td>
                                                        <td><?= ($val->session_id == null)?'Whole Site':(($val->session_id == 'home')? 'Lobby Only' : 'Session'.$val->session_id)?>
                                                        </td>
                                                        <td><?= $val->message ?></td>
                                                        <td style="word-break: break-word"><?= $val->redirect_name ?></td>
                                                        <td><?= $val->session_redirect ?></td>
<!--                                                        <td>
                                                            <?php if ($val->status == 1) { ?>
                                                                <label class="label label-primary">Sent</label>
                                                            <?php } ?>
                                                        </td>-->
                                                        
                                                        <?php if (isset($val->receiver)){
                                                                if ($val->receiver=="both"){
                                                                  echo '<td> All </td>';
                                                                }else{
                                                                    echo '<td>'.Ucfirst($val->receiver).'</td>';
                                                                }
                                                        }else{
                                                            echo'<td> All </td>';
                                                        }?>
                                                      
                                                      <!--  -->
                                                        <td> 
                                                            <?php if ($val->status == 0) { ?>
                                                                <a class="btn btn-success btn-sm send_notification" data-id="<?= $val->push_notification_id ?>" href="#">
                                                                    <i class="fa fa-send"></i> Send Notification
                                                                </a>
                                                            <?php } ?>
                                                            <a class="btn btn-primary btn-sm edit-notification" href="" data-notification_id="<?=$val->push_notification_id?>" style="margin-top: 4px">
                                                                <i class="fa fa-pencil-square-o"></i> Edit
                                                            </a>
                                                            <br>
                                                            <a class="btn btn-danger btn-sm delete_promo_code" href="<?= base_url() . 'admin/push_notifications/delete_push_notifications/' . $val->push_notification_id ?>"  style="margin-top: 4px">
                                                                <i class="fa fa-trash-o"></i> Delete
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>   
        <!-- end: DYNAMIC TABLE -->
    </div>
</div>

</div>

<?php
$msg = $this->input->get('msg');
switch ($msg) {
    case "S":
        $m = "Message Added Successfully...!!!";
        $t = "success";
        break;
    case "U":
        $m = "Message Updated Successfully...!!!";
        $t = "success";
        break;
    case "D":
        $m = "Message Delete Successfully...!!!";
        $t = "success";
        break;
    case "E":
        $m = "Something went wrong, Please try again!!!";
        $t = "error";
        break;
    default:
        $m = 0;
        break;
}
?>

<script>
    $('#update_btn').hide();
    $(document).ready(function () {
<?php if ($msg): ?>
            alertify.<?= $t ?>("<?= $m ?>");
<?php endif; ?>

        $('#plan_table').dataTable({
            "aaSorting": []
        });

        $('#save_btn').click(function () {
            if ($('#message').val() == '') {
                alertify.error('Please Enter Message');
                return false;
            } else {
                $('#frm_credit').attr('action', '<?= base_url() ?>admin/push_notifications/add_push_notifications');
                $('#frm_credit').submit();
                return true;
            }
        });

        var app_name_main = "<?=getAppName("") ?>";

        $(document).on("click", ".send_notification", function () {
            var send_notification_id = $(this).attr('data-id');
            $(this).hide();
            $(".send_notification").prop('disabled', true);
            $this = $(this);
            if (send_notification_id != '') {
                $.ajax({
                    url: "<?= base_url() ?>admin/push_notifications/send_notification/" + send_notification_id,
                    type: "post",
                    dataType: "json",
                    success: function (response) {
                        cr_data = response;
                        console.log(cr_data);
                        if (cr_data.status == "success")
                        {
                            if (socket){
                                socket.emit('send_push_notification', app_name_main);
                            }else{
                                alertify.error('Socket config not found, notification might not have been sent!');
                            }

                            var delayInMilliseconds = 5000; //1 second
                            setTimeout(function () {
                                socket.emit('close_push_notification', app_name_main);
                                $.ajax({
                                    url: "<?= base_url() ?>admin/push_notifications/close_notification/" + send_notification_id,
                                    type: "post",
                                    dataType: "json",
                                    success: function (response) {
                                        cr_data = response;
                                        console.log(cr_data);
                                        if (cr_data.status == "success")
                                        {
                                            $this.show();
                                            $(".send_notification").prop('disabled', false);
                                        }
                                        $(".send_notification").prop('disabled', false);
                                    }
                                });
                            }, delayInMilliseconds);
                        }
                    }
                });
            } else {
                alertify.error('Something went wrong, Please try again!');
            }
        });

        $('#plan_table').on('click', '.edit-notification', function(e){
            e.preventDefault();
            var id = $(this).attr('data-notification_id');

            $.post("<?= base_url() . 'admin/push_notifications/get_push_notification_byId/'?>",
                {
                    'Id':id
                },function(){

                }
                ).done(function(datas){
                    datas = JSON.parse(datas);
                $.each(datas, function(index, data){
                    if(data.session_id == null) {
                        $("#visibility").val('null');
                    }else{
                        $("#visibility").val(data.session_id);
                    }
                    if(data.receiver == 'presenter'){
                        $('#presenter').prop('checked', true );
                    }else{
                        $('#presenter').prop('checked', false );
                    }
                    if(data.receiver == 'attendee'){
                        $('#attendee').prop('checked', true );
                    }else{
                        $('#attendee').prop('checked', false );
                    }
                    $('#message').val(data.message);
                    $('#redirect_name').val(data.redirect_name);

                    $('#session_redirect').val(data.session_redirect);
                });
            });
            $('#save_btn').hide();
            $('#update_btn').show();
            $('#update_btn').attr('data-notification_id', id);

        })

        $('#update_btn').click(function(){
            var id = $(this).attr('data-notification_id');

            $('#frm_credit').attr('action', '<?= base_url() ?>admin/push_notifications/update_push_notifications/'+id);
            $('#frm_credit').submit();
        });

    });
</script>






