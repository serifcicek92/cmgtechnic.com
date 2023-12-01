<div class="row">

    <div class="col-md-12 mb-2">

        <h3>Kategori Detayları</h3>

    </div>

</div>

<div class="row">

    <div class="col-md-6 grid-margin stretch-card">

        <div class="card">

        <div class="card-body">

            <h4 class="card-title">Detay Ekleme</h4>

            <p class="card-description">

            Detay Ekleme Formu

            </p>

            <form class="forms-sample" method="POST" action="" id="addform" data-post="ekle" enctype="multipart/form-data">

           

                <div class="form-group invisible">

                        <input type="number" name="detayid" class="form-control" id="detayid">

                </div>

                <div class="form-group">

                <label for="menuref">Kategori Seçiniz</label>

                <?php 

                    $menuler = array_filter(Application::$app->menuler->getMenuler(null),function($val){if ($val["USTID"]!=0) {return $val;}});

                    $menuler = array_values($menuler);

                    // var_dump($menuler);

                    // exit;

                    ?>

                <select class="form-control form-control-sm" name="menuref" id="menuref">

                    <?php foreach ($menuler as $menu):?>

                    <option value="<?php echo $menu["ID"] ?>"><?php echo$menu["ADI"] ?></option>

                    <?php endforeach;?>

                </select>

                </div>

                <div class="form-group">

                <label for="kategoritip">Kategori Tipi Seçiniz</label>

                <select class="form-control form-control-sm" id="kategoritip" name="kategoritip">

                    <?php $kdi = Application::$app->komboDegerleri->getKomboDegerlerByAdi('KATEGORITIPI');
                    
                    foreach ($kdi as $val) {

                        echo '<option value="'.$val["id"].'">'.$val["degeri"].'</option>';

                    }

                    ?>

                </select>

                </div>
                <div class="form-group">

                    <label for="baslik">Detay Başlık</label>

                    <input type="text" name="baslik" class="form-control" id="baslik" placeholder="Başlık">

                </div>

                <div class="form-group">

                    <label for="detayaltbaslik">Detay Alt Başlık</label>

                    <input type="text" class="form-control" id="detayaltbaslik" name="detayaltbaslik" placeholder="Detay Alt Başlık">

                </div>

                <div class="form-group">

                    <label for="detayaciklama">Detay Açıklama</label>

                    <textarea name="detayaciklama" class="form-control" id="detayaciklama" rows="4"></textarea>

                </div>

                <div class="form-group">

                    <label>File upload</label>

                    <input type="file" name="img[]" class="file-upload-default">

                    <div class="input-group col-xs-12">

                    <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">

                    <span class="input-group-append">

                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>

                    </span>

                    </div>

                </div>

                <div class="alert alert-success" role="alert" style="display: none;" id="addAlert">

                    kayıt ekleme başarılı

                </div>

                <button type="submit" class="btn btn-primary me-2">Ekle</button>

            </form>

        </div>

        </div>

    </div>

</div>

<div class="row">

    <div class="col-lg-12 grid-margin stretch-card">

        <div class="card">

        <div class="card-body">

            <div class="mb-3">

                <div class="col-md-3">

                      <div class="dropdown">

                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton8" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">

                          Kategori Seç

                        </button>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton8">

                          <h6 class="dropdown-header">Kategoriler</h6>

                          <?php foreach ($menuler as $menu):?>

                            <a class="dropdown-item kategorisec" data-kategori="<?php echo $menu["ID"] ?>" href=""><?php echo$menu["ADI"] ?></a>

                          <?php endforeach;?>

                        </div>

                      </div>

                    </div>

            </div>

            <div class="alert alert-success" role="alert" style="display: none;" id="dellAlert">

                    kayıt silme başarılı

                </div>

            <div class="table-content">

            <?php foreach ($menuler as $menu):?>

            <div class="table-responsive table-view d-none" id="kategoridetaytablo" data-kategori="<?php echo $menu["ID"]?>">

                <h4 class="card-title"><?php echo $menu["ADI"]?> DETAYI</h4>

                <table class="table table-striped" >

                    <thead>

                    <tr>

                        <th>Resim</th>

                        <th>Başlık</th>

                        <th>Alt Başlık</th>

                        <th>Detay</th>

                        <th>Kategori</th>

                        <th>Kategori Tipi</th>

                        <th>İşlem</th>

                    </tr>

                    </thead>

                    <tbody>

                        <!-- burada detaylarda seçilen menüye göre dön varsayılan ilk olsun-->

                        <?php $kategoriDetaylari = Application::$app->kategoriDetay->getKategoriDetaylariByMenuId($menu["ID"]);

                        foreach($kategoriDetaylari as $kategoriDetay):

                        ?>

                        <tr>

                            <td class="d-none"><?php echo $kategoriDetay["id"]?></td>

                            <td class="py-1"><img src="assets/images/<?php echo $menu["link"]."/".$kategoriDetay["resimlink"]?>" alt="image"></td>

                            <td><?php echo $kategoriDetay["baslik"]?></td>

                            <td><?php echo $kategoriDetay["altbaslik"]?></td>

                            <td><?php echo $kategoriDetay["detay"]?></td>

                            <td data-menuref=<?php echo $kategoriDetay["menuid"]?>><?php echo $kategoriDetay["MENUADI"]?></td>

                            <td data-kattipi=<?php echo $kategoriDetay["kategoritipi"]?>><?php echo $kategoriDetay["KATTIPI"]?></td>

                            <td >

                                <a class="mdi mdi-pencil editbuttons text-success" href="" data-editbuttons="edit"></a>

                                <a class="mdi mdi-delete-forever editbuttons text-danger" href="admin/kategoridetay/<?php echo $kategoriDetay["id"]?>" data-editbuttons="delete"></a>

                            </td>

                        </tr>

                        <?php endforeach;?>

                    </tbody>

                </table>

            </div>

            <?php endforeach;?>

            </div>

        </div>

        </div>

    </div>

</div>























<div id="dialog-form" title="Düzenle">

  <p class="validateTips"></p>

 

  <form class="forms-sample" method="POST" action="" id="editform" data-post="ekle" enctype="multipart/form-data">

        <div class="form-group">

                <input type="number" name="detayid" class="form-control invisible" id="detayid">

        </div>

        <div class="form-group">

        <label for="menuref">Kategori Seçiniz</label>

        <?php 

            $menuler = array_filter(Application::$app->menuler->getMenuler(null),function($val){if ($val["USTID"]!=0) {return $val;}});

            $menuler = array_values($menuler);

            // var_dump($menuler);

            // exit;

            ?>

        <select class="form-control form-control-sm" name="menuref" id="menuref">

            <?php foreach ($menuler as $menu):?>

            <option value="<?php echo $menu["ID"] ?>"><?php echo$menu["ADI"] ?></option>

            <?php endforeach;?>

        </select>

        </div>

        <div class="form-group">

        <label for="kategoritip">Kategori Tipi Seçiniz</label>

        <select class="form-control form-control-sm" id="kategoritip" name="kategoritip">

            <?php $kdi = Application::$app->komboDegerleri->getKomboDegerlerByAdi('KATEGORITIPI');

            foreach ($kdi as $val) {

                echo '<option value="'.$val["val1"].'">'.$val["degeri"].'</option>';

            }

            ?>

        </select>

        </div>

        <div class="form-group">

            <label for="baslik">Detay Başlık</label>

            <input type="text" name="baslik" class="form-control" id="baslik" placeholder="Başlık">

        </div>

        <div class="form-group">

            <label for="detayaltbaslik">Detay Alt Başlık</label>

            <input type="text" class="form-control" id="detayaltbaslik" name="detayaltbaslik" placeholder="Detay Alt Başlık">

        </div>

        <div class="form-group">

            <label for="detayaciklama">Detay Açıklama</label>

            <textarea name="detayaciklama" class="form-control" id="detayaciklama" rows="4"></textarea>

        </div>

        <div class="form-group">

            <label>File upload</label>

            <input type="file" name="img[]" class="file-upload-default" id="fileimg">

            <div class="input-group col-xs-12">

            <span class="input-group-append">

                <img src="" height="50" class="file-upload-browse" id="editImg"/>

            </span>

            </div>

        </div>

        <div class="alert alert-success d-none" role="alert" id="EditAlert">

            Kaydetme başarılı

        </div>

        <button type="submit" class="btn btn-primary me-2">Kaydet</button>

        <button type="button" class="btn btn-danger me-2" id="vazgec">Vazgeç</button>

    </form>

</div>

















