<?php

class email_contacto{

  private $mensaje;
  
  function template($nombre1,$nombre2,$apellido1,$apellido2,$email,$ciudad,$asunto,$mensaje){
    $this->mensaje = '
    
    <!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
  <html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml"
    xmlns:o="urn:schemas-microsoft-com:office:office">
  
  <head>
    <!--[if gte mso 9]><xml>
  <o:OfficeDocumentSettings>
  <o:AllowPNG/>
  <o:PixelsPerInch>96</o:PixelsPerInch>
  </o:OfficeDocumentSettings>
  </xml><![endif]-->
    <title>*|MC:SUBJECT|*</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0 " />
    <meta name="format-detection" content="telephone=no" />
    <!--[if !mso]><!-->
  
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i"
      rel="stylesheet" type="text/css" />
    <!--<![endif]-->
    <style type="text/css">
      body {
        margin: 0 !important;
        padding: 0 !important;
        -webkit-text-size-adjust: 100% !important;
        -ms-text-size-adjust: 100% !important;
        -webkit-font-smoothing: antialiased !important;
      }
  
      img {
        border: 0 !important;
        outline: none !important;
      }
  
      p {
        Margin: 0px !important;
        Padding: 0px !important;
      }
  
      table {
        border-collapse: collapse;
        mso-table-lspace: 0px;
        mso-table-rspace: 0px;
      }
  
      td,
      a,
      span {
        border-collapse: collapse;
        mso-line-height-rule: exactly;
      }
  
      .ExternalClass * {
        line-height: 100%;
      }
  
      .em_defaultlink a {
        color: inherit !important;
        text-decoration: none !important;
      }
  
      span.MsoHyperlink {
        mso-style-priority: 99;
        color: inherit;
      }
  
      span.MsoHyperlinkFollowed {
        mso-style-priority: 99;
        color: inherit;
      }
  
      .tpl-content {
        padding: 0px !important;
      }
  
      .em_white a {
        color: #ffffff;
        text-decoration: none;
      }
  
      .em_black a {
        color: #000000;
        text-decoration: none;
      }
  
      .em_gray a {
        color: #969696;
        text-decoration: none;
      }
  
      @media only screen and (min-width:481px) and (max-width:619px) {
        .em_main_table {
          width: 480px !important;
        }
  
        .em_wrapper {
          width: 100% !important;
        }
  
        .em_spacer {
          width: 20px !important;
        }
  
        .em_hide {
          display: none !important;
        }
  
        .em_full_img {
          width: 100% !important;
          height: auto !important;
          max-width: none !important;
        }
  
        .em_center {
          text-align: center !important;
        }
  
        .em_height {
          height: 20px !important;
        }
  
        .em_pad_top {
          padding-top: 20px !important;
        }
  
        .em_aside {
          padding: 0 20px !important;
        }
  
        .em_br {
          display: block !important;
        }
  
        .em_auto {
          height: auto !important;
        }
  
        .em_bg {
          background-color: #ff1061 !important;
          background-image: none !important;
        }
  
        .em_bg1 {
          background-color: #ffffff !important;
        }
      }
  
      @media only screen and (min-width:375px) and (max-width:480px) {
        .em_main_table {
          width: 375px !important;
        }
  
        .em_wrapper {
          width: 100% !important;
        }
  
        .em_spacer {
          width: 15px !important;
        }
  
        .em_hide {
          display: none !important;
        }
  
        .em_full_img {
          width: 100% !important;
          height: auto !important;
          max-width: none !important;
        }
  
        .em_center {
          text-align: center !important;
        }
  
        .em_height {
          height: 20px !important;
        }
  
        .em_pad_top {
          padding-top: 20px !important;
        }
  
        .em_aside {
          padding: 0 15px !important;
        }
  
        u+.em_body .em_full_wrap {
          width: 100% !important;
          width: 100vw !important;
        }
  
        .em_br {
          display: block !important;
        }
  
        .em_auto {
          height: auto !important;
        }
  
        .em_bg {
          background-color: #ff1061 !important;
          background-image: none !important;
        }
  
        .em_bg1 {
          background-color: #ffffff !important;
        }
      }
  
      @media screen and (max-width:374px) {
        .em_main_table {
          width: 320px !important;
        }
  
        .em_wrapper {
          width: 100% !important;
        }
  
        .em_spacer {
          width: 15px !important;
        }
  
        .em_hide {
          display: none !important;
        }
  
        .em_full_img {
          width: 100% !important;
          height: auto !important;
          max-width: none !important;
        }
  
        .em_center {
          text-align: center !important;
        }
  
        .em_height {
          height: 20px !important;
        }
  
        .em_pad_top {
          padding-top: 20px !important;
        }
  
        .em_aside {
          padding: 0 15px !important;
        }
  
        u+.em_body .em_full_wrap {
          width: 100% !important;
          width: 100vw !important;
        }
  
        .em_br {
          display: block !important;
        }
  
        .em_auto {
          height: auto !important;
        }
  
        .em_bg {
          background-color: #ff1061 !important;
          background-image: none !important;
        }
  
        .em_bg1 {
          background-color: #ffffff !important;
        }
  
        .em_line {
          background-image: url(http://localhost/PHPItm/final/PPI620308/img/dot_image.jpg) !important;
          height: 3px !important;
        }
      }
    </style>
  </head>
  
  <body class="em_body" style="margin:0px; padding:0px;" bgcolor="#ffffff">
    <!--*|IF:MC_PREVIEW_TEXT|*-->
    <!--[if !gte mso 9]><!----><span class="mcnPreviewText"
      style="display:none; font-size:0px; line-height:0px; max-height:0px; max-width:0px; opacity:0; overflow:hidden; visibility:hidden; mso-hide:all;">*|MC_PREVIEW_TEXT|*</span>
    <!--<![endif]-->
    <!--*|END:IF|*-->
    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="em_full_wrap" bgcolor="#ffffff">
      <tr>
        <td align="center" valign="top">
          <table align="center" width="620" border="0" cellspacing="0" cellpadding="0" class="em_main_table"
            style="width:620px;">
  
            <!--Header-->
            <tr>
              <td align="center" valign="top">
                <table align="center" width="620" border="0" cellspacing="0" cellpadding="0" class="em_wrapper"
                  style="width:620px;">
                  <tr>
                    <td align="center" valign="top" background="http://localhost/PHPItm/final/PPI620308/img/header_bg.jpg" height="396"
                      style="background-repeat:no-repeat; background-position:center top; background-color:#ff1061;">
                      <!--[if gte mso 9]>
    <v:rect xmlns:v="urn:schemas-microsoft-com:vml" fill="true" stroke="false" style="width:620px;height:396px;">
      <v:fill type="tile" src="https://gallery.mailchimp.com/65cbe904a81509fefbbd39e28/images/ff4dda90-bdcb-4320-997f-d2097900949a.jpg" color="#ff1061" />
      <v:textbox inset="0,0,0,0">
    <![endif]-->
  
                      <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
                        <tr>
                          <td width="90" style="width:90px;" class="em_spacer">&nbsp;</td>
                          <td width="90" style="width:90px;" class="em_spacer">&nbsp;</td>
                        </tr>
                      </table>
  
                      <!--[if gte mso 9]>
      </v:textbox>
    </v:rect>
    <![endif]-->
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
            <!--//Header-->
          </table>
        </td>
      </tr>
      <tr>
        <td align="center" valign="top">
          <table align="center" width="620" border="0" cellspacing="0" cellpadding="0" class="em_main_table"
            style="width:620px;">
  
            <!-- Module 2 -->
            <tr>
              <td align="center" valign="top" class="em_aside" style="padding:0 50px;">
                <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
                  <tr>
                    <td height="55" class="em_height">&nbsp;</td>
                  </tr>
                  <tr>
                    <td align="center" valign="top" class="em_defaultlink" mc:edit="modern"
                      style="font-family:"Open Sans", Arial, sans-serif; font-size:32px; line-height:35px; color:#5b5b5b; font-weight:900; padding-bottom:12px;">
                      Hola, ¿Cómo estas?</td>
                  </tr>
                  <tr>
                    <td align="left" valign="top" class="em_gray" mc:edit="text2"
                      style="font-family:"Open Sans", Arial, sans-serif; font-size:14px; line-height:20px; color:#969696; padding-bottom:15px;">
                      ¡Gracias por ponerte en contacto con nosotros, en lo más pronto posible nos estarémos comunicando para atender tu solicitud!</td>
                  </tr>
                  <tr>
                    <td height="1" class="em_height" style="font-size:1px; line-height:1px;">&nbsp;</td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
              <td align="center" valign="top">
                <table align="center" width="620" border="0" cellspacing="0" cellpadding="0" class="em_wrapper"
                  style="width:620px;">
                  <tr>
                    <td align="center" valign="top" class="em_bg" background="http://localhost/PHPItm/final/PPI620308/img/body_bg.jpg" height="1055"
                      style="background-repeat:no-repeat; background-position:center top;">
                      <!--[if gte mso 9]>
    <v:rect xmlns:v="urn:schemas-microsoft-com:vml" fill="true" stroke="false" style="width:620px;height:1055px;">
      <v:fill type="tile" src="https://gallery.mailchimp.com/65cbe904a81509fefbbd39e28/images/97888ba6-c489-4cde-b054-e667809cf8b2.jpg" color="#ffffff" />
      <v:textbox inset="0,0,0,0">
    <![endif]-->
  
                      <table width="80%" border="0" cellspacing="0" cellpadding="0" align="center">
                        <tr>
                          <td align="right" valign="top" class="em_bg1" style="padding-right:20px;"><a href="#"
                              target="_blank" style="text-decoration:none;"><img mc:edit="img10" class="em_full_img"
                                src="http://localhost/PHPItm/final/PPI620308/img/image_10.png" width="532" height="284" alt="" border="0"
                                style="display:block;font-family:Arial, sans-serif; font-size:20px; line-height:25px; color:#424242; max-width:532px;" /></a>
                          </td>
                        </tr>
                        <tr>
                          <td height="50" style="height:50px;" class="em_height">&nbsp;</td>
                        </tr>
  
  
                        <tr>
                          <td align="center" valign="top" class="em_aside" style="padding:0 50px;">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
  
                              <tr>
                                <td align="center" valign="top" class="em_defaultlink" mc:edit="modern"
                                  style="font-family:"Open Sans", Arial, sans-serif; font-size:32px; line-height:35px; color:#ffffff; font-weight:900; padding-bottom:12px;">
                                  Registro de usuario exitoso</td>
                              </tr>
                              <tr>
                                <td align="left" valign="top" class="em_gray" mc:edit="text2"
                                  style="font-family:"Open Sans", Arial, sans-serif; font-size:14px; line-height:20px; color:#ffffff; padding-bottom:15px;">
                                  <ul style="font-weight: 600">
                                    <li><span style="font-weight: 800">Nombres: </span>' .$nombre1.' '.$nombre2. '</li>
                                    <li><span style="font-weight: 800">Apellidos: </span>'.$apellido1.' '.$apellido2.'</li>
                                    <li><span style="font-weight: 800">email: </span>'.$email.'</li>
                                    <li><span style="font-weight: 800">Ciudad: </span>'.$ciudad.'</li>
                                    <li><span style="font-weight: 800">Asunto: </span>'.$asunto.'</li>
                                    <li><span style="font-weight: 800">Mensaje: </span>'.$mensaje.'</li>
                                  </ul>
                                </td>
                              </tr>
                              <tr>
                                <td align="center" valign="top" class="em_defaultlink" mc:edit="modern"
                                  style="font-family:"Open Sans", Arial, sans-serif; font-size:14px; line-height:25px; color:#ffffff; font-weight:600; padding-bottom:12px;">
                                  Importante:<br> "Puedes estar tranquilo, los datos que hemos recibido de tu parte serán
                                  usados unicamente para uso interno de la compañía"</td>
                              </tr>
                              <tr>
                                <td height="1" class="em_height" style="font-size:1px; line-height:1px;">&nbsp;</td>
                              </tr>
                            </table>
                          </td>
                        </tr>
  
  
                        <!-- <tr style="width: 80%;">
             
  
                      </tr> -->
  
                        <!--[if gte mso 9]>
      </v:textbox>
    </v:rect>
    <![endif]-->
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
            <!-- //Module 2 -->
  
          </table>
        </td>
      </tr>
  
  
  
    </table>
    <div class="em_hide" style="white-space: nowrap; display: none; font-size:0px; line-height:0px;">&nbsp; &nbsp; &nbsp;
      &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
  </body>
  
  </html>';
    
  return $this->mensaje;
  }
  


}

?>
