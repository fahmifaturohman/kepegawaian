<?php 
class Authorization {
    protected $ci;
    
    function __construct()
    {
        $this->ci = get_instance();
    }

    public function user_author() {
        $this->ci->load->model("LoginModel", "lm");
        $uId = $this->ci->session->userdata(MY_SESSION_DATA)->id;
        if($this->ci->session->userdata(MY_SESSION_BY) == 'etop') $model = $this->ci->lm->row_auth($uId);
        else $model = $this->ci->lm->row_auth_sistemcuti($uId);
        return $model;
    }

    public function user_admin() {
        $model = self::user_author();
        if($model->level != 'Administrator') redirect(base_url('login'));
    }

    public function test() {
        return "test lah";
    }
}
?>