
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
                    <div class="titulo">SUB ALMACEN DE DIRECCION MUNICIPAL DE EDUCACION 2022</div>
                    <div class="titulo">ACTA DE ENTREGA</div>
                </th>
                <th width="15%"> 
                    <div class="head-tabla">
                        <div>
                            <img height="800px" width="500px" src="../public/img/logo6.png" alt="img">
                        </div>
                    </div>    
                </th>
            </tr>
        </thead>
    </table>
    <br>
    <div id="linia"></div>
    <table border="1" width="100%" cellspacing=2 cellpadding=2 style="font-size: 8px;">
        <thead class="fondo">
            <tr>
                <th width="100%">NOTA</th>
            </tr>
        </thead>
    </table>
    <table border="1" width="100%" cellspacing=2 cellpadding=2 style="font-size: 8px;">
        
            <tr>
                <th width="100%">EL GOBIERNO AUTONOMO MUNICIPAL DE SUCRE, A TRAVES DE LA JEFATURA DE GESTION EDUCATIVA 
                    Y SERVICIO ACADEMICOS PROCEDE A LA ENTREGA DE MATERIAL, A TRAVES DE SUB ALMACEN, A LOS REPRESENTANTES
                    DE LA UNIDAD EDUCATIVA: DIRECTOR Y PRESIDENTE DE LA JUNTA ESCOLAR, QUIENES EN CARACTER DE BENEFICIADOS FIRMAN EL PRESENTE
                    ACTA DE ENTREGA Y RECEPCION DE MATERIALES.
                </th>
            </tr>
        </thead>
    </table>
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
                <th style="text-align:right" width="20%">FECHA :   </th>
                @php
                $fecha = $boleta[0]->fecha ;
                $fechahora = explode(' ', $fecha);
                        @endphp
                <th style="text-align:left" width="80%"> {{ $fechahora[0] }} </th>
            
            </tr>
            <tr>
                <th style="text-align:right" width="20%">CORRESPONDE A BOLETA :   </th>
                
                <th style="text-align:left;" width="80%"><strong> {{ $boleta[0]->id }}</th>
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
    

    <table border="1" width="100%" cellspacing=2 cellpadding=2 style="font-size: 8px;">
        <thead class="fondo">
            <tr>
                <th width="100%">MATERIAL </th>
            </tr>
        </thead>
    </table>
    <table id="tabla-rebelde" border="1" width="100%" cellspacing=2 cellpadding=2 style="font-size: 8px;">
        <thead>
            <tr>
                <th width="10%">N°</th>
                <th width="10%">CODIGO</th>
                <th width="40%">ITEM</th>
                <th width="10%">UNIDAD</th>
                <th width="10%">CANTIDAD</th>
                <th width="10%">PRECIO</th>
                <th width="10%">SUB TOTAL</th>
                
            </tr>
        </thead>
        <tbody >
            @php
            $i = 1;
            $sum = 0;
        @endphp
            @foreach($data as $datas)
            <tr>
                <td class="text-center">{{ $i }}</td>
                <td class=" text-center">{{ $datas->codpro }}</td>
                <td class=" text-align: left;">{{ $datas->descripcion }}</td>
                <td class="text-center">{{ $datas->unidad }}</td>
                <td class="text-center">{{ $datas->cantidad_salidas }}</td>
                <td class="text-center">{{ $datas->precio_salidas }}</td>
                <td class="text-center">{{ $datas->total }}</td>
                
            </tr>
            @php
                $i++;
                $sum+=$datas->total;
            @endphp 
           @endforeach
        </tbody>
    </table>
    <table border="1" width="100%" cellspacing=2 cellpadding=2 style="font-size: 8px;">
        <thead class="fondo">
            <tr>
                <th width="100%"> </th>
            </tr>
        </thead>
    </table>
    <table id="tabla-rebelde" border="1" width="100%" cellspacing=2 cellpadding=2 style="font-size: 8px;">
        <tbody >
            <tr>
                <td style="text-align:right" width="90%">
                    TOTAL Bs. 
                </td>
                <td class="text-center" width="10%">
                    {{ number_format($sum,2)}}


                </td>
            </tr> 
        </tbody>
    </table>
    <table id="tabla-rebelde" border="1" width="100%" cellspacing=2 cellpadding=2 style="font-size: 8px;">
        <tbody class="text-left">
            <tr>
                <td width="100%">
                    EN CONSTANCIA FIRMAMOS EL PRESENTE DOCUMENTO
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
                
                <th width="25%">ENTREGUE CONFORME RESP. Y/O AUX. DE ALMACEN</th>
                <th width="25%">RECIBI CONFORME </th>
            </tr>
        </thead>
        <tbody class="text-center">
            <tr>

                <td><br><br><br><br><br>
                    <div>Firma <br><strong> {{ Auth::user()->name}}<br></div>
                </td>
                <td><br><br><br><br><br>
                    <div>Firma <br>..................................<br>.................................</div>
                </td>
            </tr> 
        </tbody>
    </table>

    <footer style="font-size:8px;">
        <table border="1" width="100%" cellspacing=2 cellpadding=2 style="font-size: 8px;">
            <thead class="fondo">
                <tr>
                    <th width="100%"> </th>
                </tr>
            </thead>
        </table><table id="tabla-rebelde" border="1" width="100%" cellspacing=2 cellpadding=2 style="font-size: 8px;">
            <thead>
                <tr>
                    
                    <th width="50%">PERSONAL JORNAL RESPONSABLE ACTA</th>
                    <th width="25%">UNIDAD EDUCATIVA </th>
                    <th width="25%">Nº ACTA </th>
                </tr>
            </thead>
            <tbody class="text-center">
                <tr>
    
                    <td><br><br><br>
                        <div>Firma <br>..................................<br>.................................</div>
                    </td>

                    <td>
{{ $boleta[0]->ue  }}
                    </td>

                    <td>
                        {{     $boleta[0]->id}}
                    </td>
                </tr> 
            </tbody>
            <strong><p>AREA SISTEMAS-DIRECCION DE EDUCACION 2022</p></strong>
        </table>
    
</body>
</html>