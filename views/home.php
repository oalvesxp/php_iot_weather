<?php require_once __DIR__ . '/partials/_head.php'; ?>
    <meta http-equiv="refresh" content="5">

<?php require_once __DIR__ . '/partials/_header.php'; ?>

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div>
        <!-- End Page Title -->

        <section class="section dashboard">
            <div class="row text-center">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Parâmetros para Eventos</h5>
                            <p>Temperatura <= 16 °C ou >= 30 °C <br>Umidade <= 30 % ou >= 60 %</p>

                        </div>
                    </div>

                </div>

                <?php foreach ($pintura as $p): ?>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Pintura</h5>
                                <p>Monitor em tempo real de Temperatura & Umidade da sala de Pintura:</p>
                            
                                <div class="text-center py-3">
                                    
                                    <div class="row">
                                        <div class="col-lg-6">Temperatura</div>
                                        <div class="col-lg-6">Umidade</div>
                                    </div>

                                    <div class="row mt-4">
                                        <div class="col-lg h3"><b><?= $p->temperature ?> °C</b></div>
                                        <div class="col-lg h3"><b><?= $p->humidity ?> %</b></div>
                                    </div>
                                </div>

                                <!-- Temperature Alerts -->
                                <?php if($p->temperature >= 30.0): ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <i class="bi bi-exclamation-octagon me-1"></i>
                                        A <b>temperatura</b> está acima do limite máximo: <b><?= $p->temperature ?></b> °C >= 30 °C
                                    </div>
                                <?php endif ?>
                                <!-- End Temperature Alert Higher Danger -->
                            
                                <?php if($p->temperature >= 27.0 && $p->temperature <= 29.9): ?>
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <i class="bi bi-exclamation-octagon me-1"></i>
                                        A <b>temperatura</b> está chegando próxima ao limite máximo: <b><?= $p->temperature ?></b> °C >= 30 °C
                                    </div>
                                <?php endif ?>
                                <!-- End Temperature Alert Higher Warning -->
                            
                                <?php if($p->temperature <= 18.0 && $p->temperature >= 16.1): ?>
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <i class="bi bi-exclamation-octagon me-1"></i>
                                        A <b>temperatura</b> está chegando próxima ao limite mínimo: <b><?= $p->temperature ?></b> °C <= 16 °C
                                    </div>
                                <?php endif ?>
                                <!-- End Temperature Alert Lower Warning -->

                                <?php if($p->temperature <= 16.0): ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <i class="bi bi-exclamation-octagon me-1"></i>
                                        A <b>temperatura</b> está abaixo do limite mínimo: <b><?= $p->temperature ?></b> °C <= 16 °C
                                    </div>
                                <?php endif ?>
                                <!-- End Temperature Alert Lower Danger -->
                                <!-- End Temperature Alerts -->

                                <!-- Humidity Alerts -->
                                <?php if($p->humidity >= 60.0): ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <i class="bi bi-exclamation-octagon me-1"></i>
                                        A <b>umidade</b> está acima do limite máximo: <b><?= $p->humidity ?></b> % >= 60 %
                                    </div>
                                <?php endif ?>
                                <!-- End Humidity Alert Higher Danger -->
                            
                                <?php if($p->humidity >= 57.0 && $p->humidity <= 59.9): ?>
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <i class="bi bi-exclamation-octagon me-1"></i>
                                        A <b>umidade</b> está chegando próxima ao limite máximo: <b><?= $p->humidity ?></b> % >= 60 %
                                    </div>
                                <?php endif ?>
                                <!-- End Humidity Alert Higher Warning -->
                            
                                <?php if($p->humidity <= 33.0 && $p->humidity >= 30.1): ?>
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <i class="bi bi-exclamation-octagon me-1"></i>
                                        A <b>umidade</b> está chegando próxima ao limite mínimo: <b><?= $p->humidity ?></b> % <= 30 %
                                    </div>
                                <?php endif ?>
                                <!-- End Humidity Alert Lower Warning -->

                                <?php if($p->humidity <= 30.0): ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <i class="bi bi-exclamation-octagon me-1"></i>
                                        A <b>umidade</b> está abaixo do limite mínimo: <b><?= $p->humidity ?></b> % <= 30 %
                                    </div>
                                <?php endif ?>
                                <!-- End Humidity Alert Lower Danger -->
                                <!-- End Humidity Alerts -->

                            </div>
                        </div>
                    </div>
                <?php endforeach ?>

                <?php foreach ($verniz as $v): ?>
                    <div class="col-lg-6">

                        <div class="card">
                            <div class="card-body">
                            <h5 class="card-title">Verniz</h5>
                                <p>Monitor em tempo real de Temperatura & Umidade da sala de Verniz:</p>
                                
                                <div class="text-center py-3">
                                    <div class="row">
                                        <div class="col-lg-6">Temperatura</div>
                                        <div class="col-lg-6">Umidade</div>
                                    </div>

                                    <div class="row mt-4">
                                        <div class="col-lg h3"><b><?= $v->temperature ?> °C</b></div>
                                        <div class="col-lg h3"><b><?= $v->humidity ?> %</b></div>
                                    </div>
                                </div>

                               
                                <!-- Temperature Alerts -->
                                <?php if($v->temperature >= 30.0): ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <i class="bi bi-exclamation-octagon me-1"></i>
                                        A <b>temperatura</b> está acima do limite máximo: <b><?= $v->temperature ?></b> °C >= 30 °C
                                    </div>
                                <?php endif ?>
                                <!-- End Temperature Alert Higher Danger -->
                            
                                <?php if($v->temperature >= 27.0 && $v->temperature <= 29.9): ?>
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <i class="bi bi-exclamation-octagon me-1"></i>
                                        A <b>temperatura</b> está chegando próxima ao limite máximo: <b><?= $v->temperature ?></b> °C >= 30 °C
                                    </div>
                                <?php endif ?>
                                <!-- End Temperature Alert Higher Warning -->
                            
                                <?php if($v->temperature <= 18.0 && $v->temperature >= 16.1): ?>
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <i class="bi bi-exclamation-octagon me-1"></i>
                                        A <b>temperatura</b> está chegando próxima ao limite mínimo: <b><?= $v->temperature ?></b> °C <= 16 °C
                                    </div>
                                <?php endif ?>
                                <!-- End Temperature Alert Lower Warning -->

                                <?php if($v->temperature <= 16.0): ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <i class="bi bi-exclamation-octagon me-1"></i>
                                        A <b>temperatura</b> está abaixo do limite mínimo: <b><?= $v->temperature ?></b> °C <= 16 °C
                                    </div>
                                <?php endif ?>
                                <!-- End Temperature Alert Lower Danger -->
                                <!-- End Temperature Alerts -->

                                <!-- Humidity Alerts -->
                                <?php if($v->humidity >= 60.0): ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <i class="bi bi-exclamation-octagon me-1"></i>
                                        A <b>umidade</b> está acima do limite máximo: <b><?= $v->humidity ?></b> % >= 60 %
                                    </div>
                                <?php endif ?>
                                <!-- End Humidity Alert Higher Danger -->
                            
                                <?php if($v->humidity >= 57.0 && $v->humidity <= 59.9): ?>
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <i class="bi bi-exclamation-octagon me-1"></i>
                                        A <b>umidade</b> está chegando próxima ao limite máximo: <b><?= $v->humidity ?></b> % >= 60 %
                                    </div>
                                <?php endif ?>
                                <!-- End Humidity Alert Higher Warning -->
                            
                                <?php if($v->humidity <= 33.0 && $v->humidity >= 30.1): ?>
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <i class="bi bi-exclamation-octagon me-1"></i>
                                        A <b>umidade</b> está chegando próxima ao limite mínimo: <b><?= $v->humidity ?></b> % <= 30 %
                                    </div>
                                <?php endif ?>
                                <!-- End Humidity Alert Lower Warning -->

                                <?php if($v->humidity <= 30.0): ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <i class="bi bi-exclamation-octagon me-1"></i>
                                        A <b>umidade</b> está abaixo do limite mínimo: <b><?= $v->humidity ?></b> % <= 30 %
                                    </div>
                                <?php endif ?>
                                <!-- End Humidity Alert Lower Danger -->
                                <!-- End Humidity Alerts -->


                            </div>
                        </div>

                    </div>
                <?php endforeach ?>

            </div>
        </section>

    </main>
    <!-- End Main -->

<?php require_once __DIR__ . '/partials/_footer.php';
