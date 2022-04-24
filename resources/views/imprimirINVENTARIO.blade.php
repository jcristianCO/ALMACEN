
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>INVENTARIO</title>
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
                    <div class="titulo">REPORTE INVENTARIO</div>
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
                <th width="100%">INVENTARIO </th>
            </tr>
        </thead>
    </table>
    <table id="tabla-rebelde" border="1" width="100%" cellspacing=2 cellpadding=2 style="font-size: 8px;">
        <thead>
            <tr>
                <th width="10%">N°</th>
                <th width="40%">ITEM</th>
                <th width="10%">PRECIO</th>
                <th width="10%">LOTE</th>
                <th width="10%">ENTRADA</th>
                <th width="10%">SALIDA</th>
                <th width="10%">SALDO</th>
                
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
                <td class=" text-align: left;">{{ $datas->descripcion }}</td>
                <td class="text-center">{{ $datas->precio_ingresos }}</td>
                <td class="text-center">{{ $datas->lote}}</td>
                <td class=" text-center">{{ $datas->entrada }}</td>
                <td class="text-center">{{ $datas->salida }}</td>
                <td class="text-center">{{ $datas->stock}}</td>
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
                <th width="100%">ACLARACION</th>
                
            </tr>
        </thead>
    </table>
    <table id="tabla-rebelde" border="1" width="100%" cellspacing=2 cellpadding=2 style="font-size: 8px;">
        <tbody class="text-left">
            <tr>
                
                <td width="100%">
                    TODOS LOS ITEMS QUE SE MUESTRAN SON RESULTADOS ENVASE A LAS ENTRADAS(INGRESOS) REALIZADOS POR LOS RESPONSABLES
                </td>
            </tr> 
        </tbody>
    </table>
    
    <footer style="font-size:8px;">
        <strong><p>AREA SISTEMAS-DIRECCION DE EDUCACION 2022
            </p></strong>
        </footer>
</body>
</html>