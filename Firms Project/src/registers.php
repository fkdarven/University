<?php
    $file = fopen("hist_firm.txt","w");
    
    for ($i=1;$i<1000;$i++){
        $new_firm = array("$i","Nome$i","Razao$i","email@$i.com","1245454$i","$i$i$i$i$i","Rua$i","Cidade$i","Estado$i");
        fputcsv($file,$new_firm);
    }
    fclose($file);