<?php
$this->load->view('template/header');
$this->load->view('template/menu');
?>

<div id="wrap">

    <?php $this->load->view('template/pathway'); ?>
    <div class="featurette-divider"></div>

    <div class="container">
        <div class="row">

            <main class="col-md-8">
                <article class="agenda-detail">

                    <h1 class="mt-4"><?= htmlspecialchars($nama); ?></h1>

                    <div class="meta mb-4">
                        <span><i class="fa fa-user"></i> <?= htmlspecialchars($author); ?></span>
                        <span class="ml-3"><i class="fa fa-calendar"></i> <?= htmlspecialchars($tanggal); ?></span>
                    </div>

                    <div class="page-content">
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <th scope="row" style="width: 120px;">Tanggal</th>
                                    <td>
                                        <?php
                                        // Menggunakan ternary operator agar lebih ringkas
                                        $display_date = ($startdate == $enddate)
                                            ? htmlspecialchars($startdate)
                                            : htmlspecialchars($startdate) . ' - ' . htmlspecialchars($enddate);
                                        echo $display_date;
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Agenda</th>
                                    <td>
                                        <?= $deskripsi; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Lokasi</th>
                                    <td><?= htmlspecialchars($tempat); ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Keterangan</th>
                                    <td>
                                        <?= $ket; ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="blog-icons mt-4">
                        <div class="blog-share_block">
                            <div class="pull-left"><h5>Bagikan Ke:</h5></div>
                            <div class="sharePopup"></div>
                        </div>
                    </div>

                </article>
            </main>

            <aside class="col-md-4">
                <?php $this->load->view('template/widget'); ?>
            </aside>

        </div>
    </div>

</div> <?php $this->load->view('template/footer'); ?>