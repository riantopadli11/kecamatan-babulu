<?php
$this->load->view('template/header');
$this->load->view('template/menu');
?>

<div id="wrap">
    <div class="marketing">
        <?php $this->load->view('template/pathway'); ?>
        <div class="featurette-divider"></div>

        <div class="container">
            <div class="row">

                <main class="col-md-8">
                    <h3 class="p-title">Agenda <span style="color:#DC3545;"></span></h3>

                    <div id="calendar"></div>
                </main>

                <aside class="col-md-4">
                    <?php $this->load->view('template/widget'); ?>
                </aside>

            </div>
        </div>
    </div>
</div> <?php $this->load->view('template/footer'); ?>