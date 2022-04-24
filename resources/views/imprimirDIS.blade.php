
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte</title>
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
                
                <th width="70%">
                    <div class="titulo">GOBIERNO AUTONOMO MUNICIPAL DE SUCRE</div>
                    <div class="titulo">DIRECCION MUNICIPAL DE EDUCACION</div>
                    <div class="titulo">REPORTE CUANTITATIVO POR U.E.</div>
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
                <th width="100%">1.- DATOS </th>
            </tr>
        </thead>
    </table>
    <table  border="1" width="100%" cellspacing=2 cellpadding=2 style="font-size: 8px;">
        <thead>
            
            
            <tr>
                <th style="text-align:right" width="20%">FECHA:   </th>
                <th style="text-align:left;" width="80%"><strong> <?php echo date('d-m-y'); ?> </strong></th>
            </tr> <tr>
                <th style="text-align:right" width="20%">DISTRITO:   </th>
                <th style="text-align:left;" width="80%"><strong>  
                 
                @if($data[0]->distrito <> "DIST_1" OR "DIST_2" OR "DIST_3" OR "DIST_4"  OR "DIST_5" )
                {{  $data[0]->distrito}} @else 
                     TODOS
                 
                
                
                @endif</strong></th>
            </tr>

        </thead>
    
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
                <th width="70%">UNIDAD EDUCATIVA</th>
                <th width="10%">FECHA</th>
                <th width="10%">SUBTOTAL</th>
                
            </tr>
        </thead>
        <tbody >
            @php
            $i = 1;
            $sum= 0;
        @endphp
            @foreach($data as $datas)
            <tr>
                <td class="text-center">{{ $i }}</td>
                <td class=" text-align: left;">{{ $datas->ue }}</td>
                <td class="text-center">{{ $datas->distrito }}</td>
                <td class="text-center">{{ $datas->total}}</td>
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
                    TOTAL INVERTIDO Bs. 
                </td>
                <td class="text-center" width="10%">
                    {{ number_format($sum)}}


                </td>
            </tr> 
        </tbody>
    </table>

    <table border="1" width="100%" cellspacing=2 cellpadding=2 style="font-size: 8px;">
        <thead class="fondo">
            <tr>
                <th width="100%">3.- ACLARACION</th>
                
            </tr>
        </thead>
    </table>
    <table id="tabla-rebelde" border="1" width="100%" cellspacing=2 cellpadding=2 style="font-size: 8px;">
        <tbody class="text-left">
            <tr>
                
                <td width="100%">
                    Todo material solicitado sera entera responsabilidad del trabajador debiendo entregar el acta correspondiente
                    en un plazo no mayor a 48hrs.
                </td>
            </tr> 
        </tbody>
    </table>
    
    <footer style="font-size:8px;">
        <strong><p>AREA SISTEMAS-DIRECCION DE EDUCACION 2022</p></strong>
        </footer>
</body>
</html>