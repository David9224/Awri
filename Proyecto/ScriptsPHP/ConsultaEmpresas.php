<?php
	$connect = mysql_connect ('mysql.hostinger.com.ar', 'u798245532_proy', 'practica01') or die ('No se puede conectar: ' . mysql_error());
	mysql_select_db ('u798245532_proy');

	$query="SELECT * FROM empresas;";
	$q= mysql_query($query, $connect) or die ('Error en el insert'); 
?>
<div class="list-group" name="lista">
	<?php
	  	while($row = mysql_fetch_array($q)){
	  		echo '<div style="width: 100%; height: 140px;">';
		  		echo '<div style="text-align: center; float: left; width: 25%; height: 100%; background-color: rgba(245, 245, 245, 1);">';
		  			echo '<br><br>'.'IMAGEN';		  				
		  		echo '</div>';
		  		echo '<div style="text-align: left; float: left; width: 50%; height: 100%;">';
			  		echo '<a class="list-group-item" style="height: 100%;">';
				  		echo '<h4 class="list-group-item-heading">'.$row['Nombre'].'</h4>';
				  		echo '<p class="list-group-item-text">'.$row['NIT'].'</p>';	  	
				  		echo '<p class="list-group-item-text">'.$row['URL'].'</p>';
				  		echo '<p class="list-group-item-text">'.$row['Direccion'].'</p>';
				  		echo '<p class="list-group-item-text">'.$row['Telefono'].'</p>';
			  		echo '</a>';			  		
		  		echo '</div>';
		  		echo '<div style="text-align: center; float: left; width: 25%; height: 100%; background-color: rgba(245, 245, 245, 1);">';
			  		echo '<button type="button" class="btn btn-default" style="width: 50%; height: 100%;" onClick="preEditar('.$row['Nombre'].','.$row['NIT'].','.$row['URL'].','.$row['Direccion'].','.$row['Telefono'].');">';
			  			echo '<span class="glyphicon glyphicon-pencil"></span>';
			  		echo '</button>';
			  		echo '<button type="button" class="btn btn-default" style="width: 50%; height: 100%;" onClick="eliminar('.$row['NIT'].');">';
			  			echo '<span class="glyphicon glyphicon-remove"></span>';
			  		echo '</button>';
			  	echo '</div>';
	  		echo '</div>';
	  		echo '<br>';
	  	}
	?>
</div>

      
    