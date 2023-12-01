<div class="row">
    <div class="col-md-12 mb-2">
        <h3>Kullanıcılar</h3>
    </div>
</div> 
<?php 
$menuler = array_filter(Application::$app->menuler->getMenuler(null),function($val){if ($val["USTID"]!=0) {return $val;}});
$menuler = array_values($menuler);
// var_dump($menuler);
// exit;
?>

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
            <div class="table-content">
                <div class="table-responsive table-view">
                    <h4 class="card-title">Kullanıcı Listesi</h4>
                    <div class="alert alert-success" role="alert" style="display: none;" id="addAlert">
                                Güncelleme başarılı...
                    </div>
                    <div class="alert alert-danger" role="alert" style="display: none;" id="addError">
                                Hata!! Lütfen sistem yöneticinize başvurunuz.
                    </div>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Referans No</th>
                            <th>Email</th>
                            <th>Adı Soyadı</th>
                            <th>Durumu</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                            <!-- burada detaylarda seçilen menüye göre dön varsayılan ilk olsun-->
                            <?php 
                            // var_dump($data);
                            // exit;
                            foreach($data as $user):
                            ?>
                            <tr>
                                <td><?php echo $user["id"]?></td>
                                <td><?php echo $user["email"]?></td>
                                <td><?php echo $user["firstname"]." ".$user["lastname"]?></td>
                                <td class="<?php echo ($user["status"] == '0' ? "text-danger" : ($user["status"]=='1' ? "text-secondary" : (($user["status"]=='2' ? "text-warning" : "text-success"))))?>">
                                    <?php echo ($user["status"] == '0' ? "Deaktif" : ($user["status"]=='1' ? "Mail Onay Bekliyor" : (($user["status"]=='2' ? "Mail Onaylandı" : "Aktif"))))?></td>
                                <td>
                                    <?php if($user["status"]=='2'):?>
                                    <a title="Onayla" class="mdi mdi-check statusx" href="" data-statusx="3"></a>
                                    <?php elseif($user["status"] == '0'):?>
                                    <a title="Aktif Et" class="mdi mdi-thumb-up statusx text-success" href="" data-statusx="3"></a>
                                    <?php elseif($user["status"] == '3'): ?>
                                    <a title="Deaktif Et" class="mdi mdi-thumb-down statusx text-danger" href="" data-statusx="0"></a>
                                    <?php endif;?>
                                </td>
                            </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>

