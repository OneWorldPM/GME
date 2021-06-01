<?php

?>
<style>
 #bg {
     position: fixed;
     top: 0;
     left: 0;

     /* Preserve aspet ratio */
     min-width: 100%;
     min-height: 100%;
 }
</style>
<body>
<img src="<?= base_url() ?>front_assets/images/sessions-holding-clearspace-option2.png" id="bg" alt="">
<div class="row" style="margin-top: 2%;">
    <div class="col-md-12 text-center" style="margin-top: 30px;">
        <span id="claim_credit_link" style="cursor: pointer;"><span style="font-size: 30px;color: #EF5D21;font-weight: 600;">Click here to Claim Credits</span></span>
    </div>
    <div class="col-md-12 text-center" style="margin-top: 20px;">
        <div style="padding:35% 0 0 0;position:relative;"><iframe src="https://player.vimeo.com/video/540201057?badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen style="position:absolute;top:0;left:0;width:100%;height:100%;" title="CCO_PRAKASH_CME_CREDIT_V2.mp4"></iframe></div>
        <script src="https://player.vimeo.com/api/player.js"></script>
    </div>
    <div class="col-md-12 text-center" style="margin-top: 20px;">
        <a href="<?= base_url() ?>front_assets/gme/Psych_Update_How_to_Claim_Credit.pdf" target="_blank"><span style="font-size: 28px;color: #EF5D21;">Instructions on How to Claim Credits</span></a>
    </div>
</div>
</body>

<script>
    $(function(){
        var current_user = "<?=$this->session->userdata('cid')?>"
        // console.log(current_user);
        $('#claim_credit_link').on('click', function(){
            toastr.success('Please wait...');
            $.post('<?=base_url()?>ClaimCredit/save_claimCredit_visit',
                {
                    'user_id':current_user
                },
                function(response){
                // console.log(response);
                    if(response == 'true'){
                        window.open("https://www.clinicaloptions.com/event/PsychUpdateNEU2021Webinar","_blank");
                    }else{
                        window.open("https://www.clinicaloptions.com/event/PsychUpdateNEU2021Webinar","_blank");
                    }
                });
        });
    });
</script>


























<script>
    $('#toolbox').hide();
</script>
