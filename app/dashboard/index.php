<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require "../../_vendor/controllers.php";

    session_start(); 
    $mahasiswa = DataMahasiswaController::get($_SESSION["nim"]);    // Urusan Login

    $nim = NULL;
    if(isset($_GET["nim"])){
        $nim = $_GET["nim"];
    }
    $ops = NULL;
    if(isset($_GET["operation"])){
        $ops = $_GET["operation"];
    }

    $op_mhs = NULL;
    if($nim != NULL && $ops != NULL){
        $op_mhs = DataMahasiswaController::get($nim);
    }

    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../_assets/css/bulma.min.css">
    <script type=text/javascript src="../../_assets/script/fontawesome-all.js"></script>
    <title>Document</title>
</head>

<body>
    <?php if($nim != NULL && $ops != NULL && $op_mhs != NULL){ ?>
    <div class="modal is-active" id="edit_modal">
        <div class="modal-background"></div>
        <div class="modal-content">
            <div class="box">
                <?php if($ops == "edit") { ?>
                    <form action="./edit/" method="post">
                        <input type="hidden" value="<?php echo $op_mhs->getNim(); ?>" name="nim_target">
                        <div class="field">
                            <label class="label">NIM</label>
                            <p class="control has-icons-left">
                                <input class="input" type="text" value="<?php echo $op_mhs->getNim(); ?>" name="nim_edit">
                                <span class="icon is-small is-left">
                                    <i class="fas fa-address-card"></i>
                                </span>
                            </p>
                        </div>
                        <div class="field">
                            <label class="label">Nama Lengkap</label>
                            <p class="control has-icons-left">
                                <input class="input" type="text" value="<?php echo $op_mhs->getNama(); ?>" name="nama_edit">
                                <span class="icon is-small is-left">
                                    <i class="fas fa-address-card"></i>
                                </span>
                            </p>
                        </div>
                        <div class="field">
                            <label class="label">Daerah Asal</label>
                            <p class="control has-icons-left">
                                <input class="input" type="text" value="<?php echo $op_mhs->getAsal(); ?>" name="daerah_edit" >
                                <span class="icon is-small is-left">
                                    <i class="fas fa-address-card"></i>
                                </span>
                            </p>
                        </div>
                        <div class="field is-grouped">
                            <div class="control">
                                <input type="submit" class="button is-warning" value="Edit Mahasiswa">
                            </div>
                            <div class="control">
                                <a type="button" href="./" class="button is-link is-light">Cancel</a>
                            </div>
                        </div>
                    </form>
                <?php } else if($ops == "delete") { ?>
                    <h1 class="title">Apakah Anda Yakin Ingin Menghapus Mahasiswa <?php echo $op_mhs->getNim(); ?> ?</h1>
                    <form action="./delete/" method="POST">
                        <input type="hidden" name="nim_delete" value="<?php echo $op_mhs->getNim(); ?>">
                        <div class="field is-grouped">
                            <div class="control">
                                <input type="submit" class="button is-danger" value="Hapus">
                            </div>
                            <div class="control">
                                <a type="button" href="./" class="button is-link is-light">Cancel</a>
                            </div>
                        </div>
                    </form>
                <?php } ?>
            </div>
        </div>
    </div>
    <?php } ?>

    <h1 class="title has-text-success">
        Halo <?php echo $mahasiswa->getNama(); ?>
    </h1>
    <a class="button is-primary" href="../../">Kembali Ke Home</a>
    <a class="button is-primary" href="./logout/">Keluar</a>
    <br>
    <div class="table-container">
        <table class="table is-hoverable is-stripped is-bordered">
            <thead>
                <th>No.</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Asal</th>
                <th>Operasi</th>
            </thead>
            <tbody>
                <?php $x=1; foreach(DataMahasiswaController::get_all() as $m) { ?>

                    <?php if($m->getNim() == $mahasiswa->getNim()){ ?>
                        <tr class="is-selected">
                    <?php } else { ?>
                        <tr>
                    <?php } ?>
                        <td><?php echo $x; ?></td>
                        <td><?php echo $m->getNim(); ?></td>
                        <td><?php echo $m->getNama(); ?></td>
                        <td><?php echo $m->getAsal(); ?></td>
                        <td>
                    <?php if($m->getNim() != $mahasiswa->getNim()){ ?>
                        <div class="field has-addons">
                            <p class="control">
                                <a class="button is-warning" href="./?nim=<?php echo $m->getNim(); ?>&operation=edit">
                                    <span class="icon is-small">
                                        <i class="fas fa-pen"></i>
                                    </span>
                                </a>
                            </p>
                            <p class="control">
                                <a class="button is-danger" href="./?nim=<?php echo $m->getNim(); ?>&operation=delete">
                                    <span class="icon is-small">
                                        <i class="fas fa-trash"></i>
                                    </span>
                                </a>
                            </p>
                        </div>
                    <?php } ?>
                        </td>
                    </tr>
                <?php $x += 1; } ?>
            </tbody>
        </table>
    </div>
</body>

</html>