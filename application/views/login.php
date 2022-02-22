<?php  $this->load->helper('url'); 
        $this->load->helper('form');
        $this->load->library('form_validation');
?>
<DOCTYPE html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url().'/css/style.css'; ?>">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>
    <body>
    <div class="d-flex justify-content-center align-items-center mt-5">
    <div class="card">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item text-center"> <a class="nav-link active btl" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Login</a> </li>
            <li class="nav-item text-center"> <a class="nav-link btr" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Signup</a> </li>
        </ul>
        <?php echo validation_errors(); ?>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="form px-4 pt-5"> 
                <?php echo form_open('user/login'); ?>
                    <input type="text" name="email" class="form-control" placeholder="Email or Phone"> <input type="text" name="password" class="form-control" placeholder="Password"> <input type="submit" class="btn btn-dark btn-block" value="Login"> </form></div>
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="form px-4"> 
                <?php echo form_open('user/register'); ?><input type="text" name="username" class="form-control" placeholder="Name"> <input type="text" name="email" class="form-control" placeholder="Email">  <input type="text" name="password" class="form-control" placeholder="Password"> <input type="submit" class="btn btn-dark btn-block" value="Register"> </form></div>
            </div>
        </div>
    </div>
    </div>
    </body>
</html>