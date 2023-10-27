<?php
class TasaDeCambio {
  // Propiedades de la clase
  private $cantidadBolivares;
  private $tasaBolivarDolar;
  private $cantidadDolares;

  // Constructor de la clase
  public function __construct($cantidadBolivares) {
    $this->cantidadBolivares = $cantidadBolivares;
    $this->tasaBolivarDolar = 1 / 35.02;
  }

  // Funciones de la clase
  public function calcularCantidadDolares() {
    $this->cantidadDolares = $this->cantidadBolivares * $this->tasaBolivarDolar;
  }

  public function mostrarResultado() {
    echo "El monto equivalente en dólares es: " . number_format($this->cantidadDolares, 2) . " $";
  }
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
  $cantidadBolivares = $_POST["cantidad"];
  
  $tasaDeCambio = new TasaDeCambio($cantidadBolivares);
  $tasaDeCambio->calcularCantidadDolares();
  
  echo "<p id='resultado'>";
  $tasaDeCambio->mostrarResultado();
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
    <input type="number" name="cantidad" placeholder="Cantidad de bolívares">
    <button type="submit">Calcular</button>
  </form>
</body>
</html>
