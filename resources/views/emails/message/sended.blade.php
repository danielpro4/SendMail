<html>
<head></head>
<body style="margin: 0">
<div style="box-sizing: border-box">
    <table border="0" width="100%"
           align="center"
           cellpadding="0"
           cellspacing="0"
           align="center"
           style="font-family:'Open Sans', Arial, sans-serif;background: #f1f3f5;">
        <tr>
            <td style="height: 60px"></td>
        </tr>
        <tr>
            <td>
                <table style="background: white; border-radius:4px" align="center">
                    <tr>
                        <td style="height: 60px"></td>
                    </tr>
                    <tr>
                        <td width="600px" align="center">
                            <table style="font-size: 13px; color: #7f8c8d; background: white;"
                                   width="90%"
                                   border="0"
                                   cellspacing="0px" cellpadding="5px">
                                <tr>
                                    <td colspan="2" style="padding-bottom: 25px">
                                        <h3>Mensaje de Contacto</h3>
                                    </td>
                                </tr>
                                @foreach($data as $key => $value)
                                    <tr>
                                        <td width="100px" style="vertical-align: top">{{$key}}</td>
                                        <td>{{$value}}</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="2" style="padding-top: 25px">
                                        <p>Gracias!!</p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="height: 60px"></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td style="height: 160px"></td>
        </tr>
    </table>
</div>
</body>
</html>