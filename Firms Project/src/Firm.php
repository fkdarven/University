<?php
    
    class Firm
    {
        public function __construct() {
        }
        public function new_Register($new_firm){
            $file = fopen('src/hist_firm.txt','a');
            fputcsv($file,$new_firm);
            fclose($file);
        }public function edit_Register($new_firm,$updated_new_firm){
            $new_line = implode(',',$updated_new_firm);
            $content = file_get_contents('src/hist_firm.txt');
            $new_content = str_replace($new_firm,"$new_line\r\n",$content);
            $file = fopen('src/hist_firm.txt','w');
            fwrite($file,$new_content);
            fclose($file);
        }
        public function delete_Register($new_firm){
            $line = implode(',',$new_firm); //TRANSFORMA O ARRAY GRAVADO PARA STRING
            $new_line = "";//STRING EM BRANCO PARA 'DELETAR' O ARRAY DESEJADO
            $content = file_get_contents('src/hist_firm.txt');//CATA TD DO TXT
            $new_content = str_replace($line,$new_line,$content);//SUBSTITUI A STRING PASSADA PELA EM BRANCO
            $file = fopen('src/hist_firm.txt','w');//W PARA ABRIR O TXT EM BRANCO
            fwrite($file,$new_content);//GRAVA TD SEM A STRING DELETADA (REGISTRO)
            fclose($file);            
        }
        public static function show_History(){
           $content = file_get_contents('src/hist_firm.txt');
           echo $content;
            
        }
    }
    


?>