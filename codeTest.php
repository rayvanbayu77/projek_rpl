<?php
            error_reporting(E_ALL ^ E_WARNING);
            if(['waktu_pernyataan'] == null){
              echo "nilai kosong";
            }
            else {
              echo $row['waktu_pernyataan'];
            }

            if(['isi_pernyataan'] == null){
              echo "nilai kosong";
            }
            else {
              echo $row['isi_pernyataan'];
            }
            ?>