<?php //Cargamos la página de inicializar que está en la carpeta privada
include_once ('controller/AdminController.php');
?>
<nav>
    <?php
    //mostramos el botón de página anterior, pero no si
    //estamos en la primera página

    if($pagina < 1) echo '<a href="?pagina=' . ($pagina - 1) . '">&lt;</a>';
    echo "Página $pagina";
    if (!$pagina == $numPaginas) echo '<a href="?pagina=' . ($pagina + 1) . '">&gt;</a>';
    ?>
</nav>
<div id="contenedor">
    <div id="tabla">
        <table>
            <?php
            $inicio=($pagina-1)*PAGINADO+1;
            $fin=$inicio+PAGINADO-1;
            //primera fila
            echo "<tr>";
            for($i=1;$i<=NUMCOLUMNAS;$i++){
                echo "<th>Administrador</th>";
                echo "<th></th>";
                echo "<th></th>";
            }
            echo "</tr>";
            //resto de filas
            echo "<tr>";
            for($i=$inicio;$i<=$fin && $i<=sizeof($adminsList);$i++){
                foreach ($adminsList as $admin)
                echo "<td class='codigo'>$admin->username</td>";
                if($i%NUMCOLUMNAS==0) echo "</tr>";
            }
            echo "</tr>";
            ?>
        </table>
    </div>