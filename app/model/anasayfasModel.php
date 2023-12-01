<?php
class anasayfas extends Model{
    public function getAll()
    {
        try {
            return $this->db->query("SELECT * from users")-> fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $th) {
            print_r($th->errorInfo);
            echo "error";
        }
    }
}
//insert
// $ekle = $baglanti->conn->prepare("INSERT INTO tblreferanslar (resim,referansAdi) VALUES (:resim,:unvan)");
//                     $ekle->execute(array(
//                         'resim' => $resimAdi,
//                         'unvan' => $unvan
//                     ));

//update
// $sertificaEkle = $baglanti->conn->prepare("UPDATE urundetay SET urunSertifikaResimleri=CONCAT(urunSertifikaResimleri,:referanslar) where urunid=:urunid");
//             $sertificaEkle->execute(array(
//                 'referanslar' => $referanslar,
//                 'urunid' => $urunId
//             ));

//delete
// $refsil = $baglanti->conn->prepare("DELETE FROM tblreferanslar WHERE id = $id");
//         $refsil->execute();





//update
// $sql = "UPDATE urundetay 
//     SET baslik= (CASE WHEN :edtBaslik!='' then :edtBaslik else baslik end),
//     altBaslik = (CASE WHEN :edtAltBaslik!='' THEN :edtAltBaslik else altbaslik end),
//     urunResim = (CASE WHEN :edtResimAdi!='' THEN :edtResimAdi else urunResim end),
//     urunAciklama = (CASE WHEN :edtAciklama!='' THEN :edtAciklama else urunAciklama end)
//     WHERE urunid=:urunid
//     ";
//     $urunDetayGuncelle = $baglanti->conn->prepare($sql);
//     try {
//         $urunDetayGuncelle->execute(array(
//             'edtBaslik' => $edtBaslik,
//             'edtAltBaslik' => $edtAltBaslik,
//             'edtResimAdi' => $edtResimAdi,
//             'edtAciklama' => $edtAciklama,
//             'urunid' => $urunId
//         ));
//         echo "ok";
//     } catch (PDOException $th) {
//         echo "error " . $th->getMessage();
//     }



// SELECT
// $referanslar = $baglanti->conn->prepare("select * from tblreferanslar order by id desc");
//                 $referanslar->execute();
//                 $referanslarRes = $referanslar->fetchAll();

//                 foreach ($referanslarRes as $key) {

//                     <div class="referanslarCardContainer">
//                         <div class="referanslarCard">
//                             <div class="referanslarCardFront">
//                                 <img src="images/referanslarimiz/<?php echo $key["resim"] " width="100%">
//                             </div>
//                             <div class="referanslarCardBack">
//                                 <h4><?php echo $key["referansAdi"];</h4>

//                             </div>
//                         </div>
//                     </div>

