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
                <?php
                // Mengambil data sekali saja di awal
                $first_row = $jp->row_array();
                $all_data = $jp->result_array();
                ?>

                <h3 class="p-title"><?= htmlspecialchars($first_row['judul']) ?> <span style="color:#DC3545;"></span></h3>

                <?php
                // Menyiapkan HTML untuk tombol dan konten dalam satu kali loop
                $tab_buttons = '';
                $tab_contents = '';

                foreach ($all_data as $key => $row) {
                    // Membuat Tombol Tab
                    $is_default = ($key == 0) ? 'id="defaultOpen"' : '';
                    $button_id = htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8');
                    $button_title = htmlspecialchars($row['judul']);
                    
                    $tab_buttons .= "<button class='tablinks' onclick=\"openCity(event, '{$button_id}')\" {$is_default}>{$button_title}</button>";

                    // Membuat Konten Tab
                    $content_id = htmlspecialchars($row['id']);
                    $content_title = htmlspecialchars($row['judul']);
                    
                    // ⚠️ PERINGATAN: $row['isi'] mungkin berisi HTML, lihat penjelasan keamanan di bawah.
                    $content_isi = $row['isi']; 
                    
                    $tab_contents .= "<div id='{$content_id}' class='tabcontent'>
                                        <h3>{$content_title}</h3>
                                        <p>{$content_isi}</p>
                                      </div>";
                }
                ?>

                <div class="tab">
                    <?= $tab_buttons; ?>
                </div>

                <?= $tab_contents; ?>
                
                <hr>
            </main>

            <aside class="col-md-4">
                <?php $this->load->view('template/widget'); ?>
            </aside>

        </div>
    </div>

</div> <?php $this->load->view('template/footer'); ?>