<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Venta Nº {{ $ingreso[0]->idIngreso }}</title>
  </head>
  <body>
    <header class="clearfix">
      <h1>BRILLANTE</h1>
      <div id="company" class="clearfix">
        <div>Brillante</div>
        <div>Av. Belgrano 4200<br /> CP 4000 S. M. de Tucuman<br /> Tucuman, Argentina</div>
        <div>(0381) 4123 465</div>
        <div><a href="mailto:brillante@gmail.com">brillante@gmail.com</a></div>
      </div>
      <div id="project">
        <h2>INGRESO A LOCAL</h2>
        <h4>Fecha de emision: {{ $fecha }}</h4>
      </div>
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th class="service" text-align="left">CANTIDAD</th>
            <th class="desc" text-align="left">DESCRIPCION</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($ingreso as $i)
          <tr>
            <td class="service" text-align="left">{{$i->cantidad}}</td>
            <td class="desc" text-align="left">{{$i->nombre}}</td>
          </tr>
         @endforeach
        </tbody>
      </table>
    </main>
  </body>
</html>