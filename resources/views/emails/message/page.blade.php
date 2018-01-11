<html>
<head></head>
<body style="margin: 0">
<div style="box-sizing: border-box">
    <table style="font-family: Arial, sans-serif;line-height: 100%; margin: 0 auto; max-width: 520px; width: 100%;">
        <tr>
            <td>
                <table cellpadding="10" style="    background-color: #fff; border-bottom: 2px solid rgb(12, 172, 222); width: 100%;">
                    <tr>
                        <td><img style="width: 110px;" src="http://idiomasvw.com.mx/fragment/themes/idiomasvw/design/imgs/iconos/logo_centro_de_idiomas.png"/></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <table cellpadding="20" style="background-color: #fff; font-size: 12px; line-height: 135%; width: 100%;">
                    <tr>
                        <td>
                            @foreach($data as $key => $value)
                                <div><b>{{$key}}</b>: {{$value}}</div>
                            @endforeach
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <table cellpadding="10" style="    background-color: #FF3300; font-size: 12px; width: 100%;">
                    <tr>
                        <td style="color: #fff; text-align: center;">
                            <a href="www.idiomasvw.com.mx" style="color: #fff; text-decoration: none;" target="_blank">www.idiomasvw.com.mx</a>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</div>
</body>
</html>