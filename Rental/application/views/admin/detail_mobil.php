<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail Mobil</h1>
        </div>
        <?php foreach($detail as $dt) : ?>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-7">
                            <img src="<?php echo base_url().'Assets/Upload/'. $dt->gambar ?>">
                        </div>  
                        <div class="col-md-5">
                            <table class="table">
                                <tr>
                                    <td>Type Mobil</td>
                                    <td>
                                    <?php 
                                    if ($dt->kode_type == "SDN"){
                                        echo "Sedan";
                                    }elseif($dt->kode_type == "XN"){
                                        echo"Xenia";
                                    }elseif($dt->kode_type == "HN"){
                                        echo"Honda";
                                    }elseif($dt->kode_type == "TY"){
                                        echo"Toyota";
                                    }elseif($dt->kode_type == "HTB"){
                                        echo"Hatchback";
                                    }elseif($dt->kode_type == "MPV"){
                                        echo "Multi Purpose Vechile";
                                    }else{
                                        echo"<span class='text-danger'>Type mobil belum terdaftar</span>";
                                    } 
                                    ?>
                                        
                                    </td>
                                </tr>
                                <tr>
                                    <td>Merek</td>
                                    <td>
                                        <?php echo $dt->merek ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>No.Plat</td>
                                    <td>
                                        <?php echo $dt->no_plat ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Warna</td>
                                    <td>
                                        <?php echo $dt->warna ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tahun</td>
                                    <td>
                                        <?php echo $dt->tahun ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>
                                        <?php if ($dt->status == "0"){
                                            echo "<span class='badge badge-danger'>Tidak Tersedia</span>";
                                        }else{
                                            echo "<span class = 'badge badge-primary'>Tersedia</span>";
                                        }
                                        ?>
                                    </td>
                                </tr>
                            </table>
                            <a class= "btn btn-primary ml-4" href="<?php echo base_url('admin/data_mobil/update_mobil/'.$dt->id_mobil) ?>">Update</a>
                            <a class= "btn btn-danger " href="<?php echo base_url('admin/data_mobil') ?>">Kembali</a>
                            
                        </div>  
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </section>
</div>