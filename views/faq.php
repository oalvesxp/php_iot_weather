<?php require_once __DIR__ . '/partials/_head.php'; ?>
<?php require_once __DIR__ . '/partials/_header.php'; ?>

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dúvidas Frequentes</h1>
            <nav>
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Páginas</li>
                <li class="breadcrumb-item active">F.A.Q</li>
                </ol>
            </nav>
        </div>
        <!-- End Page Title -->

        <section class="section faq">
            <div class="row">
                <div class="col-lg">
                    
                <!-- F.A.Q Group 1 -->
                <div class="card">
                    <div class="card-body">
                    <h5 class="card-title">F.A.Q.</h5>

                    <div class="accordion accordion-flush" id="faq-group-1">

                        <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" data-bs-target="#faqsOne-1" type="button" data-bs-toggle="collapse">
                                De quanto em quanto tempo o sensor coleta informações?
                            </button>
                        </h2>
                        <div id="faqsOne-1" class="accordion-collapse collapse" data-bs-parent="#faq-group-1">
                            <div class="accordion-body">
                                Cada sensor está programado para coletar informações de temperatura e umidade a cada minuto. Caso seja necessário ajustar este tempo, contate o time de T.I.
                            </div>
                        </div>
                        </div>

                        <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" data-bs-target="#faqsOne-2" type="button" data-bs-toggle="collapse">
                                Onde posso obter um histórico de temperatura detalhado?
                            </button>
                        </h2>
                        <div id="faqsOne-2" class="accordion-collapse collapse" data-bs-parent="#faq-group-1">
                            <div class="accordion-body">
                                No menu a esquerda há uma sessão de tabelas, onde pode ser encontrada páginas com os últimos 30 registros ou o histórico completo de temperatura e/ou umidade.
                            </div>
                        </div>
                        </div>

                        <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" data-bs-target="#faqsOne-3" type="button" data-bs-toggle="collapse">
                                A plataforma apresenta problemas, como posso resolver?
                            </button>
                        </h2>
                        <div id="faqsOne-3" class="accordion-collapse collapse" data-bs-parent="#faq-group-1">
                            <div class="accordion-body">
                                Entre em contrato com o time de T.I. através da plataforma de Tickets: <a href="https://signus.freshservice.com/support/tickets/new" target="_blank">Clique Aqui!</a>
                            </div>
                        </div>
                        </div>

                    </div>

                    </div>
                </div>
                <!-- End F.A.Q Group 1 -->

                </div>
            </div>
        </section>

    </main>
    <!-- End Main -->

<?php require_once __DIR__ . '/partials/_footer.php';
