<?php 

function isLogin() {
    $ci = get_instance();
    if($ci->session->userdata(MY_SESSION_LOGGED) == false) { redirect(base_url('login')); }
}

function isLogut() {
    $ci = get_instance();
    if($ci->session->userdata(MY_SESSION_LOGGED)) { redirect(base_url()); }
}

function isThang() {
    $ci = get_instance();
    if($ci->session->userdata(MY_SESSION_LOGGED)) { return $ci->session->userdata(MY_SESSION_THANG); }
    else return date('Y');
}

function isThangLabel() {
    $ci = get_instance();
    if($ci->session->userdata(MY_SESSION_LOGGED)) { return $ci->session->userdata(MY_SESSION_THANG_LABEL); }
    else return "Tahun ".date('Y');
}

function isAdmin() {
    $ci = get_instance();
}


?>