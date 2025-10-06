<?php
// Bagian ini berasal dari header.php
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
                    <h3 class="p-title">BERITA <span style="color:#DC3545;"></span></h3>

                    <?php if ($this->session->flashdata('msg')): ?>
                        <div class="alert alert-info">
                            <?= htmlspecialchars($this->session->flashdata('msg')); ?>
                        </div>
                    <?php endif; ?>

                    <?php foreach ($data->result() as $row): ?>
                        <article class="single-blog-post post-style-4 d-flex align-items-center">
                            
                            <div class="post-thumbnail">
                                <a href="<?= site_url('berita/vw-' . $row->slug); ?>">
                                    <img src="<?= base_url('assets/images/' . $row->gambar); ?>" alt="<?= htmlspecialchars($row->judul); ?>" class="img-fluid gabr">
                                </a>
                            </div>

                            <div class="post-content">
                                <a href="<?= site_url('berita/vw-' . $row->slug); ?>" class="headline">
                                    <h4><?= htmlspecialchars($row->judul); ?></h4>
                                </a>
                                <p>
                                    <?= htmlspecialchars(limit_words($row->isi, 15) . '...'); ?>
                                </p>
                                
                                <div class="post-meta">
                                    <p>
                                        <i class="fa fa-user"></i> <?= htmlspecialchars($row->author); ?> | 
                                        <i class="fa fa-calendar"></i> <?= htmlspecialchars($row->tanggal); ?> | 
                                        <i class="fa fa-tags"></i> <?= htmlspecialchars($row->kategori); ?>
                                    </p>
                                </div>
                            </div>

                        </article>
                    <?php endforeach; ?>

                    <br>

                    <?php if (!empty($page)): ?>
                        <nav aria-label="Page navigation">
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
    </div> <?php
// Bagian ini adalah pemanggilan untuk footer.php
$this->load->view('template/footer');
?>