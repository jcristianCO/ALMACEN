
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte Canasta</title>
    <style>
        body{
            font-family: sans-serif;
        }
        @page {
            margin: 50px 50px 100px 50px;
        }
        .head-tabla{
            display: inline-block;
        }
        .head-tabla img{
            float: left;
            height: 60px;
            width: 80px;
        }
        .titulo{
            text-align: center;
            font-size: 12px;
        }
        .text-center{
            text-align: center;
        }
        .fondo{
            background-color: #9c9c9c;
        }
        .entrega{
            float: right;
        }
        footer{
            width:100%;
            padding: 5px;
            position: absolute;
            bottom: -50px;
            color : black;
        }
    </style>
</head>
<body>
    <table  border="0" width="100%" cellspacing=0 cellpadding=0>
        <thead>
            <tr>
                <th width="10%"> 
                    <div class="head-tabla">
                        <div>
                            <img height="300px" width="300px" src="" alt="img">
                        </div>
                    </div>    
                </th>
                <th width="100%">
                    <div>--------------------------------------------------------------------------</div>
                </th>
                <th width="50%">
                    <div class="titulo"><strong>GOBIERNO AUTONOMO MUNICIPAL DE SUCRE</strong></div>
                    <div class="titulo">SOLICITUD DE MATERIAL 2022</div>
                </th>
                <th width="30%" style="font-size: 6px; text-align: right;padding-right:2px;">
                    <div>Fecha :  </div>
                    <div>Registrado por :   </div>
                </th>
                <th width="10%" style="text-align: center; font-size=8px;border:1px; margin-left:2px;">
                    <strong style="border:1px;"></strong> 
                </th>
            </tr>
        </thead>
    </table>
    <br>
    <div id="linia"></div>
    <table border="1" width="100%" cellspacing=2 cellpadding=2 style="font-size: 8px;">
        <thead class="fondo">
            <tr>
                <th width="100%">DATOS </th>
            </tr>
        </thead>
    </table>
    <table  border="1" width="100%" cellspacing=2 cellpadding=2 style="font-size: 8px;">
        <thead>
            <tr>
                <th width="20%">A</th>
                <th width="20%">DE</th>
                <th width="60%">PARA</th>
                <th width="20%"></th>
            </tr>
        </thead>
        <tbody class="text-center">
            <tr>
                <td> LUIS EDUARDO UGARTE <br> DIRECTOR MUNICIPAL DE EDUCACION </td>
                <td> CRISTIAN CUETO </td>
                <td> UNIDAD EDUCATIVA </td>
                <td>  DSITRITO</td>
            </tr>
        </tbody>
    </table>
    <table  border="1" width="100%" cellspacing=2 cellpadding=2 style="font-size: 8px;">
        <thead>
            <tr>
                <th width="25%">PAIS</th>
                <th width="25%">DEPARTAMENTO</th>
                <th width="25%">PROVINCIA</th>
                <th width="25%">LOCALIDAD</th>
            </tr>
        </thead>
        <tbody class="text-center">
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
    <table  border="1" width="100%" cellspacing=2 cellpadding=2 style="font-size: 8px;">
        <thead>
            <tr>
                <th width="55%">UNIDAD EDUCATIVA</th>
                <th width="15%">AÑO ESCOLAR</th>
                <th width="15%">PARALELO</th>
                <th width="15%">NIVEL</th>
            </tr>
        </thead>
        <tbody class="text-center">
            <tr>
                <td> </td>
                <td> </td>
                <td> </td>
                <td></td>
            </tr>
        </tbody>
    </table>
    <table border="1" width="100%" cellspacing=2 cellpadding=2 style="font-size: 8px;">
        <thead class="fondo">
            <tr>
                <th width="100%">DATOS DE PADRE/MADRE O TUTOR </th>
            </tr>
        </thead>
    </table>
    <table  border="1" width="100%" cellspacing=2 cellpadding=2 style="font-size: 8px;">
        <thead>
            <tr>
                <th width="40%">NOMBRE COMPLETO</th>
                <th width="30%">CARNET</th>
                <th width="30%">FECHA NACIMIENTO</th>
            </tr>
        </thead>
        <tbody class="text-center">
            <tr>
                <td><p></p></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
    <table  border="1" width="100%" cellspacing=2 cellpadding=2 style="font-size: 8px;">
        <thead>
            <tr>
                <th width="70%">DIRECIÓN DEL DOMICILIO</th>
                <th width="10%">CELULAR</th>
                <th width="20%">GRADO PARENTESCO</th>
            </tr>
        </thead>
        <tbody class="text-center">
            <tr>
                <td></td>
                <td></td>
                <td>  </td>>
            </tr>
        </tbody>
    </table>
    <table border="1" width="100%" cellspacing=2 cellpadding=2 style="font-size: 8px;">
        <thead class="fondo">
            <tr>
                <th width="100%">DETALLE CANASTA ESTUDIANTIL</th>
            </tr>
        </thead>
    </table>
    <table id="tabla-rebelde" border="1" width="100%" cellspacing=2 cellpadding=2 style="font-size: 8px;">
        <thead>
            <tr>
                <th width="5%">N°</th>
                <th width="20%">PRODUCTO</th>
                <th width="60%">DESCRIPCION</th>
                <th width="10%">UNIDAD</th>
                <th width="10%">CANTIDAD</th>
            </tr>
        </thead>
        <tbody >
      
            <tr>
                <td class="text-center"></td>
                <td class=" text-align: left;"></td>
                <td class=" text-align: left;"></td>
                <td class="text-align:center"></td>
                <td class="text-center"></td>
            </tr> 
           
        </tbody>
    </table>
    <table border="1" width="100%" cellspacing=2 cellpadding=2 style="font-size: 8px;">
        <thead class="fondo">
            <tr>
                <th width="100%">OBSERVACIONES</th>
            </tr>
        </thead>
    </table>
    <table id="tabla-rebelde" border="1" width="100%" cellspacing=2 cellpadding=2 style="font-size: 8px;">
        <tbody class="text-left">
            <tr>
           
                </td>
            </tr> 
        </tbody>
    </table>
    <table border="1" width="100%" cellspacing=2 cellpadding=2 style="font-size: 8px;">
        <thead class="fondo">
            <tr>
                <th width="100%">FIRMAS</th>
            </tr>
        </thead>
    </table>
    <table id="tabla-rebelde" border="1" width="100%" cellspacing=2 cellpadding=2 style="font-size: 8px;">
        <thead>
            <tr>
                <th width="50%">ENTREGUE CONFORME</th>
                <th width="50%">RECIBI CONFORME</th>
            </tr>
        </thead>
        <tbody class="text-center">
            <tr>
                <td><br><br><br><br><br><br>
                    <div>Firma</div>
                </td>
                <td><br><br><br><br><br><br>
                    <div>Firma</div>
                    <div>Nombre Completo: .......................................................</div>
                    <div>C.I. ..................................................</div>
                </td>
            </tr> 
        </tbody>
    </table>


   
    <footer style="font-size:8px;">
        <strong><p>Por tanto, las partes suscribientes del presente Acta, manifestamos nuestra conformidad de la entrega correspondiente de los productos mencionados prescedentemente
            </p></strong>
        </footer>
</body>
</html>