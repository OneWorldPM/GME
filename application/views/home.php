<!-- SECTION -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&display=swap" rel="stylesheet">
<style>
    .icon-home {
        font-size: 1.5em;
        font-weight: 700;
        vertical-align: middle;
        color:#FFFFFF !important;
    }

    a:hover {
        background-color: #FFFFFF !important;
        color:#FFFFFF !important;
    }

    @media (min-width: 768px) and (max-width: 1000px)  {
        #home_first_section{
            height: 550px;
        }
    }

    @media (min-width: 1000px) and (max-width: 1400px)  {
        #home_first_section{
            height: 590px;
        }
    }

    @media (min-width: 1400px) and (max-width: 1600px)  {
        #home_first_section{
            height: 700px;
        }
    }

    @media (min-width: 1600px) and (max-width: 1800px)  {
        #home_first_section{
            height: 800px;
        }
    }

    @media (min-width: 1800px) and (max-width: 2200px)  {
        #home_first_section{
            height: 900px;
        }
    }

    @media (min-width: 2200px) and (max-width: 2800px)  {
        #home_first_section{
            height: 1100px;
        }
    }
    @media (min-width: 2800px) and (max-width: 3200px)  {
        #home_first_section{
            height: 1450px;
        }
    }

    @media (min-width: 3200px) and (max-width: 4200px)  {
        #home_first_section{
            height: 1950px;
        }
    }

    @media (min-width: 4200px) and (max-width: 6000px)  {
        #home_first_section{
            height: 2550px;
        }
    }
    .parallax{
        background-attachment:fixed !important;
        background-size: 110% auto !important;
    }

    .container-fullscreen{
        top: 70px;
    }

    .sections .section img{
        font-size: 250px;
        width: 1em;
        height: 1.2em;
    }

    .sections .left,.sections .right{
        margin-top: 50px;
    }

    .sections .left{
        float: left;
        margin-left: 150px;
    }

    .sections .right{
        float: right;
        margin-right: 150px;
    }

    .middle-video{
        position: absolute;
        width: 540px;
        max-width: 100%;
        top: 25px;
        left: 0;
        right: 0;
        margin: auto;
    }

    .middle-video >.pscy_update{
        width: 108%;
        position: relative;
        left: -4%;
    }


    .middle-video >div img{
        width: 100%;
    }

    .circle-icons .circle-icon{
        width: 30.99%;
        display: inline-block;
        text-align: center;
    }

    .circle-icons .circle-icon img{
        font-size: 150px;
        height: 1em;
        width: 1.06em;
    }

    @media screen and (max-width: 1400px) {
        .sections .left{
            margin-left: 0;
        }

        .sections .right{
            margin-right: 0;
        }

        .sections .middle{
            width: 430px;
        }

    }

    @media screen and (max-width: 1060px) {
        .sections .section img{
            font-size: 210px;
        }
    }

    @media screen and (max-width: 991px) {
        #header{
            padding-bottom: 0 !important;
        }
    }

    @media screen and (max-width: 980px) {

        .middle-video{
            height: auto;
            position: unset;
        }

        .sections .left{
            text-align: right;
        }
        .sections .left,.sections .right{
            margin-top: 15px;
            width: 50%;
        }
        .sections .left{
            text-align: left;
            padding-left: 20px;
        }
        .sections .right{
            text-align: right;
            padding-right: 20px;
        }
        .container-fullscreen{
            top: 20px;
        }
        .circle-icons{
            width: max-content;
            margin-left: auto;
            margin-right: auto;
        }

        .circle-icons .circle-icon img{
            font-size: 100px;
            max-width: 100%;
        }

    }

    @media screen and (max-width: 557px) {
        .sections .section img{
            font-size: 200px;
        }
    }

    @media screen and (max-width: 450px) {
        .parallax{
            padding-top: 0;
        }
        .sections .section img{
            max-width: 100%;
            height: auto;
        }

        .middle-video{
            height: max-content;
            margin-bottom: 10px;
        }



        #home_first_section{
            padding: 0;
        }
    }




</style>

<section class="parallax" style="background-image: url('<?= base_url() ?>front_assets/images/cco-gme-gravity_lobby-clearspace.png');background-size: cover !important; height:200%">
    <div class="middle-video">
        <iframe src="https://player.vimeo.com/video/540201151" width="640" height="360" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
        <div class="pscy_update"><img id="kiosk-sponsor" src="<?= base_url() ?>front_assets/images/pscy_update.png?v=1" alt="welcome" class=""></div>
    </div>
    <div class="sections">
        <div class="section left">
            <img id="kiosk-sponsor" src="<?= base_url() ?>front_assets/images/left_area.png?v=1" alt="welcome" class="">
        </div>
        <div class="section right">
            <img id="kiosk-welcome" src="<?= base_url() ?>front_assets/images/right_area.png?v=1" alt="welcome" class="">
        </div>
    </div>
    <div class="container container-fullscreen" id="home_first_section">
        <div class="circle-icons">

            <div class="circle-icon">
                <a class="icon-home" href="<?=base_url().'sessions/product_theaters'?>">
                    <img src="<?= base_url() ?>front_assets/images/button_product-theaters-175.png?v=2" alt="welcome">
                </a>
            </div>

            <div class="circle-icon">
                <a class="icon-home" href="<?= base_url() ?>sessions">
                    <img src="<?= base_url() ?>front_assets/images/button_sessions-175.png" alt="welcome">
                </a>
            </div>

            <div class="circle-icon">
                <a class="icon-home" href="<?= base_url().'claimCredit'?>">
                    <img src="<?= base_url() ?>front_assets/images/button_claim-credit-175.png" alt="welcome">
                </a>
            </div>

        </div>
    </div>
</section>

<script type="text/javascript">
    $(document).ready(function () {
        var page_link = $(location).attr('href');
        var user_id = <?= $this->session->userdata("cid") ?>;
        var page_name = "User Dashboard";
        $.ajax({
            url: "<?= base_url() ?>home/add_user_activity",
            type: "post",
            data: {'user_id': user_id, 'page_name': page_name, 'page_link': page_link},
            dataType: "json",
            success: function (data) {
            }
        });

        $('#toolbox').hide();
    });

    $(document).ready(function(){
        var msg = "<?= $this->session->flashdata('msgsuccess')?>";
        var msgerr ="<?= $this->session->flashdata('msgerr')?>";
        if(msg){
            alertify.success(msg);
        }
        if(msgerr){
            alertify.error(msgerr);
        }
    });
</script>
