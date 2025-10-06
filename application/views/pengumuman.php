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
                    <h3 class="p-title">Pengumuman <span style="color:#DC3545;"></span></h3>

                    <?php foreach ($data->result() as $row): ?>
                        <article class="single-blog-post post-style-4 d-flex align-items-center">
                            
                            <div class="post-thumbnail">
                                <img src="<?= base_url('assets/images/pengumuman.jpg') ?>" 
                                     alt="<?= htmlspecialchars($row->judul); ?>" 
                                     class="img-fluid gabr w-100">
                            </div>
                            
                            <div class="post-content">
                                <a href="<?= site_url('pengumuman/vw:' . $row->slug); ?>" class="headline">
                                    <h4><?= htmlspecialchars($row->judul); ?></h4>
                                a>
                                <p>
                                    <?= htmlspecialchars(limit_words($row->isi, 15) . '...'); ?>
                                </p>
                                
                                <div class="post-meta">
                                    <p><i class="fa fa-calendar"></i> Posted <?= htmlspecialchars($row->tanggal1); ?></p>
                                </div>
                            </div>
                        </article>
                    <?php endforeach; ?>

                    <?php if (!empty($page)): ?>
                        <nav aria-label="Page navigation" class="mt-4">
                            <?= $page; ?>
                        </nav>
                    <?php endif; ?>

                </main>

                <aside class="col-md-4">
                    <?php $this->load->view('template/widget'); ?>
                </aside>

            </div>
        </div>
    </div>
</div> <?php $this->load->view('template/footer'); ?>