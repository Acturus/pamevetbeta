<tr style="border-collapse:collapse">
    <td align="left" style="Margin:0;padding-top:5px;padding-bottom:10px;padding-left:20px;padding-right:20px">
        <!--[if mso]><table style="width:560px" cellpadding="0" cellspacing="0"><tr><td style="width:178px" valign="top"><![endif]-->
        <table class="es-left" cellspacing="0" cellpadding="0" align="left" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left">
            <tr style="border-collapse:collapse">
                <td class="es-m-p0r es-m-p20b" valign="top" align="center" style="padding:0;Margin:0;width:178px">
                    <table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                        <tr style="border-collapse:collapse">
                            <td align="center" style="padding:0;Margin:0;font-size:0">
                                <span style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:underline;color:#D48344;font-size:14px">
                                    <img
                                        src="http://pamevetbeta.test/prodservimg.php?prod=1&id={{ $prod['id'] }}"
                                        alt="Producto" class="adapt-img" width="125" height="106"
                                        style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic">
                                </span>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <!--[if mso]></td><td style="width:20px"></td><td style="width:362px" valign="top"><![endif]-->
        <table cellspacing="0" cellpadding="0" align="right" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
            <tr style="border-collapse:collapse">
                <td align="left" style="padding:0;Margin:0;width:362px">
                    <table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                        <tr style="border-collapse:collapse">
                            <td align="left" style="padding:0;Margin:0">
                                <table style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;width:100%" class="cke_show_border" cellspacing="1" cellpadding="1" border="0" role="presentation">
                                    <tr style="border-collapse:collapse">
                                        <td style="padding:0;Margin:0">
                                            {{ $prod['nombre'] }}
                                        </td>
                                        <td style="padding:0;Margin:0;width:60px;text-align:center">
                                            {{ $prod['cantidad'] }}
                                        </td>
                                        <td style="padding:0;Margin:0;width:100px;text-align:center">
                                            {{ $prod['subtotal'] }}
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <!--[if mso]></td></tr></table><![endif]-->
    </td>
</tr>
@include('mail.layouts.compraProdSpacer')
