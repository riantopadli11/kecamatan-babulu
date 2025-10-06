<?php
$this->load->view('template/header');
$this->load->view('template/menu');
?>

<div id="wrap">
    <div class="marketing">
        <?php $this->load->view('template/pathway'); ?>
        <div class="featurette-divider"></div>

        <div class="container">
            <h3 class="p-title">Download File<span style="color:#DC3545;"></span></h3>
            <div class="row">
                <main class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped" id="display">
                            <thead>
                                <tr>
                                    <th style="width: 50px;">No</th>
                                    <th>Files</th>
                                    <th>Tanggal</th>
                                    <th>Oleh</th>
                                    <th class="text-right">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($data->result() as $row):
                                ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= htmlspecialchars($row->judul); ?></td>
                                    <td><?= htmlspecialchars($row->tanggal); ?></td>
                                    <td><?= htmlspecialchars($row->oleh); ?></td>
                                    <td class="text-right">
                                        <a href="<?= site_url('download/get_file/' . $row->id); ?>" class="btn btn-outline-danger">Download</a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </main>
            </div>
        </div>
    </div>
    <br>
</div> <?php $this->load->view('template/footer'); ?>