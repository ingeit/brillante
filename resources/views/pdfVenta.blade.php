<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Venta Nº {{ $venta[0]->idVenta }}</title>
    <link rel="stylesheet" href="css/pdf.css" media="all" />
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="assets/imagenes/logo.jpg">
      </div>
      <h1>BRILLANTE</h1>
      <div id="company" class="clearfix">
        <div>Brillante</div>
        <div>Av. Belgrano 4200<br /> CP 4000 S. M. de Tucuman<br /> Tucuman, Argentina</div>
        <div>(0381) 4123 465</div>
        <div><a href="mailto:brillante@gmail.com">brillante@gmail.com</a></div>
      </div>
      <div id="project">
        <h2>COMPROBANTE DE VENTA</h2>
        <h3>Fecha de emision: {{ $fecha }}</h3>
      </div>
      <div >
            <div >
                SEÑOR/ES: <span style='margin-left: 21px'>{{ $nombre }}</span>
            </div>
            <div >
                DOMICILIO: <span style='margin-left: 14px'>{{ $domicilio }}</span>
            </div>
            <div >
                LOCALIDAD: <span style='margin-left: 8px'>{{ $localidad }}</span>
            </div>
            <div >
                CUIL/CUIT: <span style='margin-left: 18px'>{{ $cuil }}</span>
            </div>
      </div>
    </header>
    <main>
      <table>
        <thead class="cabecera">
          <tr>
            <th class="cant">CANTIDAD</th>
            <th class="desc">DESCRIPCION</th>
            <th width="200px" text-align="left">RETIRA EN</th>
            <th>PRECIO UNIT.</th>
            <th>IMPORTE</th>
          </tr>
        </thead>
        <tbody class="cuerpo">
        @foreach ($venta as $v)
          <tr>
            <td class="cant">{{$v->cantidad}}</td>
            <td class="desc">{{$v->nombre}}</td>
            @if ($v->lugar == 'deposito')
                <td class="service" width="200px">{{"(".$deposito[($v->idDeposito)-1]->nombre.")"." ".$deposito[($v->idDeposito)-1]->direccion}}</td>
            @else
                <td class="service" width="200px">{{"(".$deposito[2]->nombre.")"." ".$deposito[2]->direccion}}</td>
            @endif
            <td class="unit">$ {{$v->precio}}</td>
            <td class="total">$ {{$importe = number_format(($v->cantidad)*($v->precio), 2, '.', '')}}</td>
          </tr>
         @endforeach
          <tr>
            <td colspan="4"  font-size="55px">TOTAL</td>
            <td class="grand total">$ {{$v->monto}}</td>
          </tr>
        </tbody>
      </table>
      <div id="notices">
        <div>NOTAS:</div>
        <div class="notice">La factura es valida hasta ......</div>
      </div>
    </main>
    <footer>
      El comprobante fue creado desde una computadora y es valido sin la firma ni el sello
    </footer>
  </body>
</html>