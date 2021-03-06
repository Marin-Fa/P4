<?php $title = 'Single ticket for Alaska'; ?>

<?php ob_start(); ?>
    <div class="hero-wrap js-fullheight" style="background-image: url('public/images/alaska-1.jpg');"
         data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start"
                 data-scrollax-parent="true">
                <div class="col-md-12 ftco-animate">
                    <?php if ($this->msg) : ?>
                        <h1 id="contact_header" class="mb-4 mb-md-0"><?= $this->msg ?></h1>
                    <?php endif ?>
                    <div class="row">
                        <div class="col-md-7">
                            <div class="text">
                                <?php if ($this->p) : ?>
                                    <p><?= $this->p ?></p>
                                <?php endif ?>
                                <div class="mouse">
                                    <div class="mouse-wheel"><span class="ion-ios-arrow-round-down"></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php
while ($data = $posts->fetch()) {
    ?>
    <section class="ftco-section scroll-to">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="case">
                        <div class="row">
                            <div class="col-md-6 col-lg-6 col-xl-8 d-flex">
                                <a href="index.php?action=post&amp;id=<?= $data['id'] ?>" class="img w-100 mb-3 mb-md-0"
                                   style="background-image: url(public/images/alaska-3.jpg);"></a>
                            </div>
                            <div class="col-md-6 col-lg-6 col-xl-4 d-flex">
                                <div class="text w-100 pl-md-3">
                                    <h2>
                                        <a href="index.php?action=post&amp;id=<?= $data['id'] ?>"><?= htmlspecialchars($data['title']) ?></a>
                                    </h2>
                                    <p>
                                        <?= substr(nl2br($data['content']), 0, 150) ?>
                                        <br/>
                                        <em><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Comments</a></em>
                                    </p>
                                    <ul class="media-social list-unstyled">
                                        <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                                        <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a>
                                        </li>
                                        <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a>
                                        </li>
                                    </ul>
                                    <div class="meta">
                                        <p class="mb-0"><a href="#"><em>le <?= $data['creation_date_fr'] ?></em></a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
}
$posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>