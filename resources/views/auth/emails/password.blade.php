<!DOCTYPE html>
<html>
<head>
   <title></title>
</head>
<body>
   
   <table border="0" cellspacing="0" cellpadding="0" style="max-width:600px">
   <tbody>
      <tr height="16"></tr>
      <tr>
         <td>
            <table bgcolor="#E6E6E6" width="100%" border="0" cellspacing="0" cellpadding="0" style="min-width:332px;max-width:600px;border:1px solid #e0e0e0;border-bottom:0;border-top-left-radius:3px;border-top-right-radius:3px">
               <tbody>
                  <tr>
                     <td height="72px" colspan="3"></td>
                  </tr>
                  <tr>
                     <td width="32px"></td>
                     <td style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;font-size:24px;color:#000000;line-height:1.25">Solicitud de recuperacion de contraseña</td>
                     <td width="32px"></td>
                  </tr>
                  <tr>
                     <td height="18px" colspan="3"></td>
                  </tr>
               </tbody>
            </table>
         </td>
      </tr>
      <tr>
         <td>
            <table bgcolor="#FAFAFA" width="100%" border="0" cellspacing="0" cellpadding="0" style="min-width:332px;max-width:600px;border:1px solid #f0f0f0;border-bottom:1px solid #c0c0c0;border-top:0;border-bottom-left-radius:3px;border-bottom-right-radius:3px">
               <tbody>
                  <tr height="16px">
                     <td width="32px" rowspan="3"></td>
                     <td></td>
                     <td width="32px" rowspan="3"></td>
                  </tr>
                  <tr>
                     <td>
                        <table style="min-width:300px" border="0" cellspacing="0" cellpadding="0">
                           <tbody>
                              <tr>
                                 <td style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;font-size:13px;color:#202020;line-height:1.5">Hola:</td>
                              </tr>
                              <tr>
                                 <td style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;font-size:13px;color:#202020;line-height:1.5">Recientemente, has solicitado recuperacion de contraseña de la cuenta de Depositos de la Quinta<br><br><b>Para restablecer tu contraseña accede al siguiente link</b><br>
                                {{ url('password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}

                                 </td>
                              </tr>
                              <tr height="32px"></tr>
                              <tr>
                                 <td style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;font-size:13px;color:#202020;line-height:1.5">Atentamente,<br>Deposito de la Quinta</td>
                              </tr>
                              <tr height="16px"></tr>
                              <tr>
                                 <td>
                                    <table style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;font-size:12px;color:#b9b9b9;line-height:1.5">
                                       <tbody>
                                          <tr>
                                             <td>Esta dirección de correo electrónico no responde a correos. </td>
                                          </tr>
                                       </tbody>
                                    </table>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                     </td>
                  </tr>
                  <tr height="32px"></tr>
               </tbody>
            </table>
         </td>
      </tr>
      <tr height="16"></tr>
   </tbody>
</table>
</body>
</html>