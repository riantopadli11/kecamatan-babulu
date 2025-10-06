<?php 
$this->load->view('template/header');
$this->load->view('template/menu');
?>
<!-- 
================================================================================
KODE FINAL HALAMAN BERANDA - DIDESAIN ULANG UNTUK TAMPILAN MODERN & ANTI-ERROR
================================================================================
Perubahan Utama:
1. Anti-Error: Setiap pemanggilan data dari database (e.g., $statis, $ber_pertama)
   kini dicek dengan `if (!empty(...))` untuk mencegah error "offset on null".
2. Desain Modern: Menggunakan CSS kustom untuk layout kartu, bayangan,
   tipografi yang bersih, dan palet warna yang konsisten.
3. Tata Letak Profesional: Struktur halaman diatur ulang agar lebih seimbang dan
   menarik secara visual.
4. Slider Dinamis: Indikator carousel kini dibuat otomatis sesuai jumlah gambar.
================================================================================
-->
<style>
    :root {
        --primary-color: #DC3545; /* Merah Khas Pemerintah */
        --dark-color: #212529;
        --light-gray: #f8f9fa;
        --border-color: #dee2e6;
        --card-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        --font-sans: 'Inter', 'Poppins', sans-serif; /* Prioritaskan font modern */
    }

    body {
        font-family: var(--font-sans);
        background-color: #FFFFFF;
    }
    .featurette-divider { margin: 4rem 0; }
    .section-title {
        font-weight: 700;
        margin-bottom: 2.5rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: var(--dark-color);
    }
    .section-title span { color: var(--primary-color); }
    
    /* Slider */
    #myCarousel .carousel-item img { filter: brightness(0.6); }
    #myCarousel .carousel-caption { bottom: 20%; text-align: left; }
    #myCarousel .carousel-caption h1, #myCarousel .carousel-caption h2 {
        text-shadow: 2px 2px 8px rgba(0,0,0,0.8);
        font-weight: 700;
    }

    /* Sambutan */
    .featurette-image { border-radius: 12px; box-shadow: var(--card-shadow); }
    .featurette-heading { font-weight: 600; }

    /* Berita & Sidebar */
    .news-card {
        border: none;
        border-radius: 12px;
        box-shadow: var(--card-shadow);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .news-card:hover { transform: translateY(-5px); box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12); }
    .news-card img { border-top-left-radius: 12px; border-top-right-radius: 12px; }
    .news-card .card-title { font-weight: 600; color: var(--dark-color); line-height: 1.4; }

    .sidebar-card {
        background-color: white;
        border-radius: 12px;
        box-shadow: var(--card-shadow);
        padding: 1.5rem;
    }
    .sidebar-tabs .nav-link { color: var(--dark-color); font-weight: 500; border: none; border-bottom: 3px solid transparent; }
    .sidebar-tabs .nav-link.active { color: var(--primary-color); border-bottom-color: var(--primary-color); }
    .list-item-sidebar { transition: background-color 0.2s ease; border-radius: 8px; }
    .list-item-sidebar:hover { background-color: var(--light-gray); }

    /* Potensi Desa */
    .potensi-section { background-color: var(--light-gray); padding: 4rem 0; }
    .potensi-card {
        background: white; border-radius: 12px; overflow: hidden;
        box-shadow: var(--card-shadow);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border: none;
    }
    .potensi-card:hover { transform: translateY(-5px); box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12); }
    .potensi-card .card-body { padding: 1rem; }
    .potensi-card .card-title { font-weight: 600; font-size: 1rem; }

    /* Gallery */
    .gallery-section { background-color: var(--dark-color); padding: 4rem 0; }
    .gallery-item { position: relative; overflow: hidden; border-radius: 8px; }
    .gallery-item img { transition: transform 0.4s ease; }
    .gallery-item:hover img { transform: scale(1.1); }
    .gallery-item .overlay {
        position: absolute; bottom: 0; left: 0; right: 0;
        background: linear-gradient(to top, rgba(0,0,0,0.9), transparent);
        color: white; padding: 1.5rem 1rem 1rem; opacity: 0; transition: opacity 0.4s ease;
    }
    .gallery-item:hover .overlay { opacity: 1; }
    .gallery-item .overlay h2 { font-size: 1rem; font-weight: 600; }
    
    /* Kontak */
    .contact-section { padding: 4rem 0; }
    .contact-box { background: var(--light-gray); padding: 2rem; border-radius: 12px; }
</style>

<main role="main">
    <!-- ============== SLIDER ============== -->
    <?php if (!empty($slider) && $slider->num_rows() > 0): ?>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <?php foreach ($slider->result_array() as $key => $slide): ?>
                <li data-target="#myCarousel" data-slide-to="<?php echo $key; ?>" class="<?php if($key == 0) echo 'active'; ?>"></li>
            <?php endforeach; ?>
        </ol>
        <div class="carousel-inner">
            <?php foreach ($slider->result_array() as $key => $i): ?>
                <div class="carousel-item <?php if ($key == 0) echo 'active'; ?>">
                    <img class="d-block w-100" src="<?php echo base_url('assets/images/slider/' . $i['gambar']); ?>" alt="Slider Image">
                    <div class="container">
                        <div class="carousel-caption">
                            <h1><b>Selamat Datang</b></h1>
                            <h2><b>Website Pemerintah Kecamatan Babulu</b></h2>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev"><span class="carousel-control-prev-icon"></span></a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next"><span class="carousel-control-next-icon"></span></a>
    </div>
    <?php endif; ?>

    <div class="container mt-5">
        <!-- ============== SAMBUTAN CAMAT ============== -->
        <?php if (!empty($statis) && $statis->num_rows() > 0): $r = $statis->row_array(); ?>
        <div class="row featurette align-items-center">
            <div class="col-md-5">
                <img class="featurette-image img-fluid mx-auto" src="<?php echo base_url('assets/images/sambutan/' . $r['gambar']); ?>" alt="Foto Camat Babulu">
            </div>
            <div class="col-md-7">
                <h2 class="featurette-heading mt-4 mt-md-0"><?php echo $r['judul']; ?></h2>
                <p class="lead" style="text-align: justify;"><?php echo limit_words($r['isi'], 40) . '...'; ?></p>
                <p><a href="<?php echo site_url('sambutan'); ?>" class="btn btn-outline-danger">Baca Selengkapnya &raquo;</a></p>
            </div>
        </div>
        <hr class="featurette-divider">
        <?php endif; ?>

        <!-- ============== BERITA & SIDEBAR ============== -->
        <div class="row">
            <!-- Kolom Berita -->
            <div class="col-lg-8">
                <h3 class="section-title">BERITA <span>TERKINI</span></h3>
                <div class="row">
                    <?php 
                    // AMAN: Cek apakah ada berita pertama sebelum menampilkannya
                    if (!empty($ber_pertama) && $ber_pertama->num_rows() > 0): 
                        $b = $ber_pertama->row_array();
                    ?>
                    <div class="col-12 mb-4">
                        <div class="card news-card">
                            <img src="<?php echo base_url('assets/images/' . $b['gambar']); ?>" class="card-img-top" alt="<?php echo $b['judul']; ?>">
                            <div class="card-body">
                                <a href="<?php echo site_url('berita/vw-' . $b['slug']); ?>" class="text-decoration-none">
                                    <h5 class="card-title"><?php echo $b['judul']; ?></h5>
                                </a>
                                <p class="card-text text-muted"><?php echo limit_words($b['isi'], 25) . '...'; ?></p>
                                <p class="card-text"><small class="text-muted"><i class="fa fa-user"></i> <?php echo $b['nama']; ?> &nbsp; <i class="fa fa-calendar"></i> <?php echo $b['tanggal1']; ?></small></p>
                            </div>
                        </div>
                    </div>
                    <?php else: ?>
                    <div class="col-12"><p>Belum ada berita untuk ditampilkan.</p></div>
                    <?php endif; ?>
                    
                    <?php if (!empty($berita)): foreach ($berita->result() as $row): ?>
                    <div class="col-md-6 mb-4">
                        <a href="<?php echo site_url('berita/vw-' . $row->slug); ?>" class="text-decoration-none">
                            <div class="card news-card h-100">
                                 <img src="<?php echo base_url('assets/images/' . $row->gambar); ?>" class="card-img-top" alt="<?php echo $row->judul; ?>" style="height: 180px; object-fit: cover;">
                                 <div class="card-body">
                                    <h5 class="card-title" style="font-size: 1rem;"><?php echo limit_words($row->judul, 10) . '...'; ?></h5>
                                    <p class="card-text mt-auto"><small class="text-muted"><i class="fa fa-calendar"></i> <?php echo $row->tanggal1; ?></small></p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php endforeach; endif; ?>
                </div>
                <div class="text-center mt-3"><a href="<?php echo site_url('berita'); ?>" class="btn btn-danger">Lihat Semua Berita</a></div>
            </div>

            <!-- Kolom Sidebar -->
            <div class="col-lg-4">
                <div class="sticky-top" style="top: 20px;">
                    <div class="sidebar-card sidebar-tabs">
                         <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" data-toggle="tab" href="#nav-pengumuman" role="tab">Pengumuman</a>
                                <a class="nav-item nav-link" data-toggle="tab" href="#nav-agenda" role="tab">Agenda</a>
                            </div>
                        </nav>
                        <div class="tab-content pt-3" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-pengumuman" role="tabpanel">
                                <?php if (!empty($pengumuman) && $pengumuman->num_rows() > 0): foreach ($pengumuman->result() as $row): ?>
                                    <a href="<?php echo site_url('pengumuman/vw:' . $row->slug); ?>" class="text-decoration-none text-dark">
                                        <div class="d-flex align-items-center mb-2 p-2 list-item-sidebar">
                                            <img src="<?php echo base_url('assets/images/pengumuman.jpg'); ?>" alt="Ikon Pengumuman" width="60" class="mr-3 rounded">
                                            <div>
                                                <h6 class="mb-1" style="font-weight: 500; font-size: 0.9rem;"><?php echo $row->judul; ?></h6>
                                                <small class="text-muted"><i class="fa fa-calendar"></i> <?php echo $row->tanggal1; ?></small>
                                            </div>
                                        </div>
                                    </a>
                                <?php endforeach; else: ?><p>Tidak ada pengumuman.</p><?php endif; ?>
                                <a href="<?php echo site_url('pengumuman'); ?>" class="btn btn-outline-danger btn-block mt-3">Semua Pengumuman</a>
                            </div>
                            <div class="tab-pane fade" id="nav-agenda" role="tabpanel">
                                <?php if (!empty($agenda) && $agenda->num_rows() > 0): foreach ($agenda->result() as $row): ?>
                                    <a href="<?php echo site_url('agenda/vw:' . $row->slug); ?>" class="text-decoration-none text-dark">
                                        <div class="d-flex align-items-center mb-2 p-2 list-item-sidebar">
                                            <div class="text-center bg-danger text-white rounded p-2 mr-3">
                                                <div style="font-size: 1.5rem; line-height: 1; font-weight: 600;"><?php echo date("d", strtotime($row->startdate)); ?></div>
                                                <div style="font-size: 0.8rem; line-height: 1;"><?php echo date("M", strtotime($row->startdate)); ?></div>
                                            </div>
                                            <div>
                                                <h6 class="mb-1" style="font-weight: 500; font-size: 0.9rem;"><?php echo $row->nama; ?></h6>
                                                <small class="text-muted"><i class="fa fa-calendar"></i> <?php echo $row->tanggal1; ?></small>
                                            </div>
                                        </div>
                                    </a>
                                <?php endforeach; else: ?><p>Tidak ada agenda.</p><?php endif; ?>
                                <a href="<?php echo site_url('agenda'); ?>" class="btn btn-outline-danger btn-block mt-3">Semua Agenda</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ============== POTENSI DESA ============== -->
    <?php if (!empty($potensi) && $potensi->num_rows() > 0): ?>
    <div class="potensi-section mt-5">
        <div class="container">
            <h3 class="section-title text-center">POTENSI <span>UNGGULAN</span></h3>
            <div class="row">
                <?php foreach ($potensi->result() as $row): ?>
                <div class="col-md-4 col-sm-6 mb-4">
                    <a href="<?php echo site_url('potensi/vw:' . $row->slug); ?>" class="text-decoration-none">
                        <div class="card potensi-card h-100">
                            <img class="card-img-top" src="<?php echo base_url('assets/images/potensi/' . $row->gambar); ?>" alt="<?php echo $row->judul; ?>" style="height: 200px; object-fit: cover;">
                            <div class="card-body">
                                <h6 class="card-title text-dark"><?php echo $row->judul; ?></h6>
                            </div>
                            <div class="card-footer bg-white">
                                <small class="text-muted"><i class="fa fa-calendar"></i> <?php echo $row->tanggal1; ?></small>
                            </div>
                        </div>
                    </a>
                </div>
                <?php endforeach; ?>
            </div>
             <div class="text-center mt-3"><a href="<?php echo site_url('potensi'); ?>" class="btn btn-danger">Lihat Semua Potensi</a></div>
        </div>
    </div>
    <?php endif; ?>

    <!-- ============== GALERI ============== -->
    <?php if (!empty($galeri) && $galeri->num_rows() > 0): ?>
    <div class="gallery-section">
        <div class="container">
            <h3 class="section-title text-center text-white">GALERI <span>KEGIATAN</span></h3>
            <div class="row">
                <?php foreach ($galeri->result() as $row): ?>
                <div class="col-lg-2 col-md-4 col-6 mb-4">
                    <a href="<?php echo site_url('gallery'); ?>" class="gallery-item d-block">
                        <img src="<?php echo base_url('assets/images/' . $row->gambar); ?>" alt="<?php echo $row->judul; ?>" class="img-fluid">
                        <div class="overlay">
                            <h2><?php echo $row->judul; ?></h2>
                        </div>
                    </a>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <!-- ============== KONTAK KAMI ============== -->
    <div class="contact-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="contact-box h-100">
                         <?php if (!empty($identitas) && $identitas->num_rows() > 0): $a = $identitas->row_array(); ?>
                        <h4>KANTOR KECAMATAN BABULU</h4>
                        <p><i class="fa fa-map-marker fa-fw mr-2 text-danger"></i><?php echo $a['alamat']; ?></p>
                        <p><i class="fa fa-phone fa-fw mr-2 text-danger"></i><?php echo $a['telepon']; ?></p>
                        <p><i class="fa fa-envelope fa-fw mr-2 text-danger"></i><?php echo $a['email']; ?></p>
                        <hr>
                        <div>
                            <?php if (!empty($socmed)): foreach ($socmed->result() as $s): ?>
                                <a href="<?php echo $s->url; ?>" class="text-dark h4 mr-3"><i class="<?php echo $s->icon; ?>"></i></a>
                            <?php endforeach; endif; ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-lg-6">
                     <div class="contact-box h-100">
                        <h4>HUBUNGI KAMI</h4>
                        <form action="<?php echo site_url('kontak/kirim_pesan'); ?>" method="post">
                            <div class="form-group"><input type="text" class="form-control" name="xnama" placeholder="Nama Anda" required></div>
                            <div class="form-group"><input type="email" class="form-control" name="xemail" placeholder="Email Anda" required></div>
                            <div class="form-group"><input type="tel" class="form-control" name="xtelp" placeholder="Nomor Telepon" required></div>
                            <div class="form-group"><textarea class="form-control" name="xpesan" rows="4" placeholder="Pesan Anda" required></textarea></div>
                            <button class="btn btn-danger" type="submit">Kirim Pesan</button>
                            <div class="mt-2"><?php echo $this->session->flashdata('msg'); ?></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php $this->load->view('template/footer'); ?>

