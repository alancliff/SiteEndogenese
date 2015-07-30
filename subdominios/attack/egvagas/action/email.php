<?php

 $email_site= "egvagas@endogenese.com.br";
 $para="alancliff@gmail.com";
 $assunto = "Confirmação de Cadastro - EGVAGAS";
        
         
         $mensagem = "Teste";
         

         $headers= "MIME-Version: 1.1 \r\n";
         $headers.= "Content-Type: text/html; charset=UTF-8 \r\n";
         $headers.="From: ".$email_site."\r\n";
         $headers .="Return-Path: ".$email_site."\r\n";

            mail($para, $assunto, $mensagem, $headers, $email_site);


?>