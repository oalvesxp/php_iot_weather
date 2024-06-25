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
                            <p>Temperatura <= 15 °C ou >= 30 °C <br>Umidade <= 20 % ou >= 60 %</p>

                        </div>
                    </div>

                </div>

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
                                    <div class="col-lg h3">26.7 °C</div>
                                    <div class="col-lg h3">48.5 %</div>
                                </div>
                            </div>

                            <div class="alert alert-info alert-dismissible fade show" role="alert">
                                <h4 class="alert-heading">Sem alertas por aqui</h4>
                                <p>Temperatura e Umidade dentro dos padrões estabelecidos.</p>
                            </div>

                        </div>
                    </div>
                </div>

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
                                    <div class="col-lg h3">26.7 °C</div>
                                    <div class="col-lg h3">48.5 %</div>
                                </div>
                            </div>

                            <div class="alert alert-info alert-dismissible fade show" role="alert">
                                <h4 class="alert-heading">Sem alertas por aqui</h4>
                                <p>Temperatura e Umidade dentro dos padrões estabelecidos.</p>
                            </div>

                        </div>
                    </div>

                </div>

            </div>
        </section>

    </main>
    <!-- End Main -->

<?php require_once __DIR__ . '/partials/_footer.php';
