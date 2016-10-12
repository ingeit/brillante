<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Venta Nº {{ $venta[0]->idVenta }}</title>
    <link rel="stylesheet" href="assets/css/pdf.css" media="all" />
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
        <h4>Fecha de emision: {{ $fecha }}</h4>
      </div>
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th class="service">CANTIDAD</th>
            <th class="desc">DESCRIPCION</th>
            <th>RETIRA EN</th>
            <th>PRECIO UNIT.</th>
            <th>IMPORTE</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($venta as $v)
          <tr>
            <td class="cant">{{$v->cantidad}}</td>
            <td class="desc">{{$v->nombre}}</td>
            <td class="service">{{$v->lugar}}</td>
            <td class="unit">$ {{$v->precio}}</td>
            <td class="total">$ {{$importe = number_format(($v->cantidad)*($v->precio), 2, '.', '')}}</td>
          </tr>
         @endforeach
          <tr>
            <td colspan="4" class="grand total">TOTAL</td>
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