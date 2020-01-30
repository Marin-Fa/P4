<?php $title = 'Login'; ?>

<?php ob_start(); ?>
<div class="hero-wrap js-fullheight" style="background-image: url('public/images/alaska-4.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
            <div class="col-md-12 ftco-animate">
                <?php if ($this->msg) : ?>
                    <h1 id="contact_header" class="mb-4 mb-md-0"><?= $this->msg ?></h1>
                <?php endif ?>
                <div class="row">
                    <div class="col-md-7">
                        <div class="text">
                            <div class="mouse">
                                <a href="#" class="mouse-icon">
                                    <div class="mouse-wheel"><span class="ion-ios-arrow-round-down"></span></div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section contact-section">
    <div class="container col-md-4">
        <p>Please fill in your credentials to login.</p>
        <form action="index.php?action=welcome" method="post" class="bg-light p-4 p-md-5 contact-form">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="">
                <span class="help-block"></span>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" value="">
                <span class="help-block"></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary py-3 px-5" value="Login">
            </div>
            <p>Don't have an account? <a href="index.php?action=showRegisterPage">Sign up now</a>.</p>
        </form>
    </div>
</section>

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>