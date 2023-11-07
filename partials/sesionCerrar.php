<div class="cardCerrar" id="cardCerrar">
    <h1>Cerrar Sesión</h1>
    <i> Bienvenido <?php  echo $_SESSION["nombre"];?></i>
    <p>¿Estás seguro de que deseas cerrar la sesión?</p>
    <form action="../database/cerrar_sesion.php" method="post">
        <input type="submit" value="Cerrar Sesión">
    </form>
</div>