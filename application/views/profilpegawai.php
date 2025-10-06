<?php
$this->load->view('template/header');
$this->load->view('template/menu');

// Ambil data di awal agar kode lebih terstruktur
$row = $statis->row_array();
?>

<div id="wrap">
    
    <?php $this->load->view('template/pathway'); ?>
    <div class="featurette-divider"></div>

    <div class="container">
        <div class="row">

            <main class="col-md-8">
                <article>
                    <h3 class="p-title">
                        <?= htmlspecialchars($row['judul']) ?> 
                        <span style="color:#DC3545;"></span>
                    </h3>
                    
                    <div class="page-content">
                        <?= $row['isi'] ?>
                    </div>
                </article>
                <hr>
            </main>

            <aside class="col-md-4">
                <?php $this->load->view('template/widget'); ?>
            </aside>

        </div> </div> </div> <?php $this->load->view('template/footer'); ?>