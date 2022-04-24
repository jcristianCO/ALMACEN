
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte Boleta</title>
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
            height: 40px;
            width: 50px;
        }
        .titulo{
            text-align: center;
            font-size: 12px;
        }
        .text-center{
            text-align: center;
        }
        .text-felt{
            text-align: left;
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
                <th width="15%"> 
                    <div class="head-tabla">
                        <div>
                            <img height="800px" width="500px" src="../public/img/logo5.png" alt="img">
                        </div>
                    </div>    
                </th>
                
                <th width="50%">
                    <div class="titulo">GOBIERNO AUTONOMO MUNICIPAL DE SUCRE</div>
                    <div class="titulo">DIRECCION MUNICIPAL DE EDUCACION</div>
                    <div class="titulo">SOLICITUD DE MATERIAL 2022</div>
                </th>
                <th width="30%" style="font-size: 10px; text-align: right;padding-right:2px;">
                    @php
                    $fecha = $boleta[0]->fecha ;
                    $fechahora = explode(' ', $fecha);
                            @endphp
                    <div>FECHA :{{ $fechahora[0] }}  </div>
                    <div>HORA :{{ $fechahora[1] }}  </div>
                    <div>REGISTRADO :  {{ Auth::user()->name }} </div>
                </th>
                <th width="10%" style="text-align: center; font-size=8px;border:1px; margin-left:2px;">
                    <strong style="border:1px;">{{ $boleta[0]->id }}</strong> 
                    
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
                <th style="text-align:right" width="20%">A :   </th>
                <th style="text-align:left" width="80%"> LUIS EDUARDO UGARTE <br> <strong> DIRECTOR MUNICIPAL DE EDUCACION </strong></th>
            
            </tr>
            <tr>
                <th style="text-align:right" width="20%">DE :   </th>
                <th style="text-align:left;" width="80%"><strong> {{ Auth::user()->name}} <br> TECNICO RESP. DE DISTRITO </strong></th>
            </tr>
            <tr>
                <th style="text-align:right" width="20%">UNIDAD EDUCATIVA:   </th>
                <th style="text-align:left;" width="80%"><strong> {{ $boleta[0]->ue  }} </strong></th>
            </tr>
            <tr>
                <th style="text-align:right" width="20%">DISTRITO:   </th>
                <th style="text-align:left;" width="80%"><strong> {{ $boleta[0]->distrito }} </strong></th>
            </tr>
        </thead>
    
    </table>
    <table  border="1" width="100%" cellspacing=2 cellpadding=2 style="font-size: 8px;">
        <thead class="fondo">
            <tr>
                <th width="100%">1.- ANTECEDENTES</th>
              
            </tr>
        </thead>
        <tbody class="text-left">
            <tr>
                <td>De acuerdo a inpseccion tecnica del personal de Direccion de Eduacion en dicha Unidad Educativa
                    ,se solicita para la interverncion inmediata para mantenimiento de la infraestructura fisica, bajo el siguiente detalle:
                </td>
                
            </tr>
        </tbody>
    </table>

    <table border="1" width="100%" cellspacing=2 cellpadding=2 style="font-size: 8px;">
        <thead class="fondo">
            <tr>
                <th width="100%">2.- MATERIAL </th>
            </tr>
        </thead>
    </table>
    <table id="tabla-rebelde" border="1" width="100%" cellspacing=2 cellpadding=2 style="font-size: 8px;">
        <thead>
            <tr>
                <th width="10%">N°</th>
                <th width="70%">ITEM</th>
                <th width="10%">UNIDAD</th>
                <th width="10%">CANTIDAD</th>
                
            </tr>
        </thead>
        <tbody >
            @php
            $i = 1;
        @endphp
            @foreach($data as $datas)
            <tr>
                <td class="text-center">{{ $i }}</td>
                <td class=" text-align: left;">{{ $datas->descripcion }}</td>
                <td class="text-center">{{ $datas->unidad }}</td>
                <td class="text-center">{{ $datas->cantidad_salidas }}</td>
            </tr>
            @php
                $i++;
            @endphp 
           @endforeach
        </tbody>
    </table>
    <table border="1" width="100%" cellspacing=2 cellpadding=2 style="font-size: 8px;">
        <thead class="fondo">
            <tr>
                <th width="50%">3.- OBSERVACION</th>
                <th width="50%">4.- ACLARACION</th>
            </tr>
        </thead>
    </table>
    <table id="tabla-rebelde" border="1" width="100%" cellspacing=2 cellpadding=2 style="font-size: 8px;">
        <tbody class="text-left">
            <tr>
                <td width="50%">
                    Toda la atencion se realiza con materiales de sub-almacen de Direccion de Educacion
                </td>
                <td width="50%">
                    Todo material solicitado sera entera responsabilidad del trabajador debiendo entregar el acta correspondiente
                    en un plazo no mayor a 48hrs.
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
                <th width="25%">TECNICO RESP. INFRA</th>
                <th width="25%">VºBº JEFE GESTION EDU. Y SERV. PEDAGOGICOS</th>
                <th width="25%">ENTREGUE CONFORME RESP. DE ALMACEN</th>
                <th width="25%">RECIBI CONFORME PERSONAL JORNAL</th>
            </tr>
        </thead>
        <tbody class="text-center">
            <tr>
                <td><br><br><br><br><br>
                    <div>Firma <br> <strong>{{ Auth::user()->name }}<br></div>
                </td>
                <td><br><br><br><br><br>
                    <div>Firma <br> <strong>Juan Carlos Duran Davalos<br> </div>
                </td>
                <td><br><br><br><br><br>
                    <div>Firma <br><strong> Federico Perez<<br></div>
                </td>
                <td><br><br><br><br><br>
                    <div>Firma <br>..................................<br>.................................</div>
                </td>
            </tr> 
        </tbody>
    </table>

    <footer style="font-size:8px;">
        <strong><p>Por tanto, las partes suscribientes del presente Acta, manifestamos nuestra conformidad de la entrega correspondiente de los productos mencionados prescedentemente
            <br>
            AREA SISTEMAS-DIRECCION DE EDUCACION 2022</p></strong>
            
        </footer>
</body>
</html>