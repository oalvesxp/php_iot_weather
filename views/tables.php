<?php require_once __DIR__ . '/partials/_header.php'; ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Umidade</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item">Tabelas</li>
          <li class="breadcrumb-item active">Histórico</li>
        </ol>
      </nav>
    </div>
    <!-- End Page Title -->

      <section class="section">
        <div class="row">
          <div class="col-lg-12">

            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Histórico de Temperatura & Umidade</h5>
                <p>Exemplo de tabela.</p>

                <!-- Table with stripped rows -->
                <table class="table datatable">
                  <thead>
                    <tr>
                      <th>
                        <b>ID</b>
                      </th>
                      <th>Nome do Sensor</th>
                      <th data-type="date" data-format="YYYY/DD/MM">Data</th>
                      <th>Temperatura</th>
                      <th>Umidade</th>
                    </tr> 
                  </thead>
                  <tbody>
                    <?php foreach($sensors as $row) : ?>
                      <tr>
                        <td><?= $row->id ?></td>
                        <td><?= $row->name ?></td>
                        <td><?= $row->timeConvert() ?></td>
                        <td><?= $row->temperature ?> °C</td>
                        <td><?= $row->humidity ?> %</td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
                <!-- End Table with stripped rows -->

              </div>
            </div>

          </div>
        </div>
      </section>

    </main>
    <!-- End #main -->

<?php require_once __DIR__ . '/partials/_footer.php';
