<?php
class Convertir {
  protected $tasa = 35.02;
  
  public function convertirDolar($montoBs) {
    return $montoBs / $this->tasa;
  }
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
  $montoBs = $_POST["monto"];
  
  $conversion = new Convertir();
  $montoDolares = $conversion->convertirDolar($montoBs);
  
  echo "<p id='resultado'>";
  echo "El monto equivalente en dólares es: " . number_format($montoDolares, 2) . " $";
  echo "</p>";
}
?>

<!DOCTYPE html>
<html>
<head>
  <style>
    body {
      font-family: Arial, sans-serif;
      text-align: center;
    }
    h1 {
      color: #333;
    }
    p {
      font-size: 20px;
    }
  </style>
</head>
<body>
  <h1>Tasa de cambio Bolívares - Dólar</h1>
  <div class="container">
    <div class="image">
        <h2>Bolívares</h2>
        <img src="32680.png" alt="Bolívares">
    </div>
    <div class="image">
        <h2>Dólar</h2>
          <img src="1200px-Dollar_Sign.svg.png" alt="Dólar">
    </div>
  </div>
  <p>Introduce la cantidad de bolívares a convertir:</p>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <input type="number" name="monto" placeholder="Monto en bolívares">
    <button type="submit">Calcular</button>
  </form>
</body>
</html>
