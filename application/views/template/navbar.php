<!-- Top Bar Start -->
<div class="topbar">

    <!-- LOGO -->
    <div class="topbar-left">
        <a href="<?=base_url()?>" class="logo">
            <!-- <i class="zmdi zmdi-mail-send icon-c-logo"></i> -->
            <img src="<?=dirImage("app-logo1.png")?>" alt="pta bandar lampung" width="42">
            <span style="color:purple">KEPEGWAIAN</span></a>           
    </div>

    <nav class="navbar-custom" style="background-image: linear-gradient(to right, #0d0255, #270157, #380158, #460359, #53075a);">

        <ul class="list-inline float-right mb-0">
           
            <li class="list-inline-item dropdown notification-list">
                <form action="#">
                    <select name="thang" id="input-thang" class="form-control form-thang">
                        <?php
                            $thang_selected = $this->session->userdata(MY_SESSION_THANG);
                            $thangs = date("Y");for ($i = $thangs; $i > $thangs-4; $i--) { 
                        ?>
                        <option value="<?=$i?>" <?= ($i == $thang_selected) ? 'selected':''; ?>><?=$i;?></option>
                        <?php } ?>
                        <option value="Semua" <?=($thang_selected == "") ? 'selected':'';?>>Semua</option>
                    </select>
                </form>
            </li>

            <li class="list-inline-item dropdown notification-list">
                <a class="nav-link waves-effect waves-light right-bar-toggle" href="javascript:void(0);">
                    <i class="zmdi zmdi-format-subject noti-icon"></i>
                </a>
            </li>           

            <li class="list-inline-item dropdown notification-list">
                <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
                aria-haspopup="false" aria-expanded="false">
                    <?php $gambar_account = ($this->session->userdata(MY_SESSION_DATA)->gambar == NULL) ? dirTemplate().'images/users/avatar-1.jpg':LINK_GAMBAR.$this->session->userdata(MY_SESSION_DATA)->gambar?>
                    <img src="<?=$gambar_account?>" alt="user" class="rounded-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown " aria-labelledby="Preview">
                    <!-- item-->
                    <div class="dropdown-item noti-title">
                        <h5 class="text-overflow"><small><?=$this->session->userdata(MY_SESSION_DATA)->username;?></small> </h5>
                    </div>

                    
                    <!-- item-->
                    <a href="<?=base_url('login/out')?>" class="dropdown-item notify-item">
                        <i class="zmdi zmdi-power"></i> <span>Logout</span>
                    </a>

                </div>
            </li>

        </ul>

        <ul class="list-inline menu-left mb-0">
            <li class="float-left">
                <button class="button-menu-mobile open-left waves-light waves-effect">
                    <i class="zmdi zmdi-menu"></i>
                </button>
            </li>
            <!-- <li class="hidden-mobile app-search">
                <form role="search" class="">
                    <input type="text" placeholder="Search..." class="form-control">
                    <a href=""><i class="fa fa-search"></i></a>
                </form>
            </li> -->
        </ul>

    </nav>

</div>
<!-- Top Bar End -->

<script type="text/javascript">
    $(document).ready(function() {
        $('#input-thang').change(function() {
            var val = $(this).val()
            loading()
            $.ajax({
                    type: "POST",
                    url: baseUrl+'login/thang',
                    data: { 'thang':val, 'username' : 'none','password' : 'none'},
                    dataType: "json",
                    success: function (res) {			
                        if(res['success'] == true) {                        
                            toastNotify(res['msg'])
                            history.go(0)
                        }
                        else toastNotify(res['msg'],0)
                        loadingClose()
                    },
                    error: function (res) {
                        console.log(res['responseJSON'])
                    },
                    failure: function (res) {
                        console.log("failure")
                    }
            }) 
        })
    })
</script>