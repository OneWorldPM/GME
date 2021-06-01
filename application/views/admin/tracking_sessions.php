
<div class="main-content">
    <div class="wrap-content container" id="container">
        <!-- start: PAGE TITLE -->
        <section id="page-title">
            <div class="row">
                <div class="col-sm-8">
                    <h1 class="mainTitle">List Of Tracking</h1><br>
                    <a class="btn btn-info " id="btn-sessions"> Session Tracking</a>
                    <a class="btn btn-success " id="btn-cc"> Claim Credit Tracking</a>
                </div>
            </div>
            
        </section>
        <!-- end: PAGE TITLE -->
        <!-- start: DYNAMIC TABLE -->
        <div class="container-fluid container-fullw">
            <div class="row">
                <div class="panel panel-primary" id="panel5">
                    <div class="panel-heading">
                        <h4 class="panel-title text-white">Sessions Tracking</h4>
                    </div>
                    <div class="panel-body bg-white panel-sessions" id="panel-sessions" style="border: 1px solid #b2b7bb!important;">
                        <div class="row">
                            <div class="col-md-12 table-responsive">
                                <div> <a href="<?=base_url().'admin/tracking/export_all_tracking_csv'?>" class="btn btn-success btn-m">Export All CSV</a></div><br>
                                <table class="table table-bordered table-striped text-center " id="sessions_table">
                                    <thead class="th_center">
                                        <tr>
                                            <th>Date</th>
                                            <th>Photo</th>
                                            <th>Title</th>
                                            <th>Presenter</th>
                                            <th>Title</th>
                                            <th>Time Slot</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (isset($sessions) && !empty($sessions)) {
                                            foreach ($sessions as $val) {
                                                ?>
                                                <tr>
                                                    <td><?= date("Y-m-d", strtotime($val->sessions_date)) ?></td>
                                                    <td>
                                                        <?php if ($val->sessions_photo != "") { ?>
                                                            <img src="<?= base_url() ?>uploads/sessions/<?= $val->sessions_photo ?>" style="height: 40px; width: 40px;">
                                                        <?php } else { ?>
                                                            <img src="<?= base_url() ?>front_assets/images/session_avtar.jpg" style="height: 40px; width: 40px;">
                                                        <?php } ?>    
                                                    </td>
                                                    <td><?= $val->session_title ?></td>
                                                    <td>
                                                        <?php
                                                        if (isset($val->presenter) && !empty($val->presenter)) {
                                                            foreach ($val->presenter as $value) {
                                                                echo $value->presenter_name . " <br>";
                                                            }
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        if (isset($val->presenter) && !empty($val->presenter)) {
                                                            foreach ($val->presenter as $value) {
                                                                echo $value->title . " <br>";
                                                            }
                                                        }
                                                        ?>
                                                    </td>
                                                    <td><?= date("h:i A", strtotime($val->time_slot)) .' - '. date("h:i A", strtotime($val->end_time)) ?></td>
                                                    <td>
                                                        <a href="<?= base_url() ?>admin/tracking/view_poll/<?= $val->sessions_id ?>" class="btn btn-info btn-sm"> Poll Tracking</a>
                                                        <a href="<?= base_url() ?>admin/tracking/view_question_answer/<?= $val->sessions_id ?>" class="btn btn-primary btn-sm">View Q&A Tracking</a>
                                                        <a href="<?= base_url() ?>admin/tracking/view_sessions_history/<?= $val->sessions_id ?>" class="btn btn-success btn-sm">View Sessions History</a>
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
                <div class="panel panel-primary" id="panel6">
                    <div class="panel-heading">
                        <h4 class="panel-title text-white">Claim Credit Tracking</h4>
                    </div>
                    <div class="panel-body bg-white panel-claim-credit" style="border: 1px solid #b2b7bb!important;">
                        <div class="row">
                            <div class="col-md-12 table-responsive">
                                <div> <a id="export-claim-credit" class="btn btn-success btn-m">Export All CSV</a></div><br>
                                <table class="table table-bordered table-striped text-center " id="claim-credit-table">
                                    <thead class="th_center">
                                    <tr>
                                        <th>#</th>
                                        <th>Attendee Name</th>
                                        <th>Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $a=0;
                                    if(isset($claim_credit) && !empty($claim_credit)){
                                        foreach ($claim_credit as $cc){
                                            $a++;
                                            ?>
                                            <tr>
                                                <td><?=$a?></td>
                                                <td><?=$cc->full_name?></td>
                                                <td><?=$cc->date_time?></td>
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
    </div>
</div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('#panel6').hide();

       $('#btn-cc').on('click', function(){
           $('#panel5').hide();
           $('#panel6').show();
       });
        $('#btn-sessions').on('click', function(){
            $('#panel6').hide();
            $('#panel5').show();
        });

        $("#sessions_table").dataTable({
            "ordering": false,
        });


        $("#claim-credit-table").dataTable({
            dom: 'Bfrtip',
            buttons: [
                 'csv'
            ]
        });

        $('#export-claim-credit').click(function(){
            alertify.error('Under Development');
        });
    });
</script>