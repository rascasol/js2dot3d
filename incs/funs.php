<?php

	define("CARPETA_EXPORT", 'export/');
	define("CARPETA_IMPORT", 'import/');

	function crear_archivo()
	{
		$nombre = time().'.3d';
		$flujo = fopen(CARPETA_EXPORT.$nombre, 'w') or die('no se puede abrir el archivo');
		fclose($flujo);
		return $nombre;
	}

	function montar_cadena($js, $altura = NULL, $grosor = NULL)
	{
		$cadena_archivo = '';

		$array_paredes = $js['paredes'];
		$radiadores = $js['radiadores'];
		$caldera = $js['caldera'];
		$angs_rel = angulos($array_paredes);

		$cadena_archivo = file_get_contents('incs/comunes.php');
		$cadena_radiadores = '';
		$cadena_calderas = '';

		if($altura == NULL)
		{
			$altura = 2400;
		}
		if($grosor == NULL)
		{
			$grosor = 100;
		}

		$gr = $grosor;
		$longs_ext = array();

		for($i=0; $i<count($array_paredes); $i++)
		{
			$id = $i+1;
			if($i==0)
			{
				if($array_paredes[$i]['longitud']!=0)
				{
					/* interior */
					$int_actual_x = $gr*tan(deg2rad((180-$angs_rel[$i])/2));
					$int_actual_y = $gr;
					$int_pos = 'pos('.$int_actual_x.',0,'.$int_actual_y.')';
					$int_ang = 'ang(0,'.$array_paredes[$i]["angulo"].',0)';

					/* exterior */
					$longs_ext[$i] = $array_paredes[$i]['longitud'] + $gr*tan(deg2rad((180-$angs_rel[$i])/2));
					if ($angs_rel[$i+1]>0)
					{
						$longs_ext[$i] += $gr*tan(deg2rad((180-$angs_rel[$i+1])/2));
					}
					else
					{
						$longs_ext[$i] += $gr*tan(deg2rad((180-$angs_rel[$i])/2));
					}
					$ext_actual_x = 0;
					$ext_actual_y = 0;
					$ext_pos = 'pos('.$ext_actual_x.',0,'.$ext_actual_y.')';
					$ext_ang = $int_ang;

					/* superior */
					$sup_actual_x = $int_actual_x;
					$sup_actual_y = $int_actual_y;

					if ($angs_rel[$i+1]!=0) {
						$sup_x3 = $array_paredes[$i]['longitud'] + $gr*tan(deg2rad((180-$angs_rel[$i+1])/2));
					}
					else
					{
						$sup_x3 = $array_paredes[$i]['longitud'] + $gr*tan(deg2rad((180-$angs_rel[$i])/2));
					}
					$sup_y3 = -$gr;
					$sup_x4 = -$gr*tan(deg2rad((180-$angs_rel[$i])/2));
					$sup_y4 = -$gr;
				}
			}
			else
			{
				if($array_paredes[$i]['longitud']!=0)
				{
					/* interior */
					$int_actual_x = $int_actual_x + $array_paredes[$i-1]['longitud']*cos(deg2rad($array_paredes[$i-1]['angulo']));
					$int_actual_y = $int_actual_y - $array_paredes[$i-1]['longitud']*sin(deg2rad($array_paredes[$i-1]['angulo']));
					$int_pos = 'pos('.$int_actual_x.',0,'.$int_actual_y.')';
					$int_ang = 'ang(0,'.$array_paredes[$i]["angulo"].',0)';

					/* exterior */
					$longs_ext[$i] = $array_paredes[$i]['longitud'] + $gr*tan(deg2rad((180-$angs_rel[$i])/2));
					if (!isset($angs_rel[$i+1]))
					{
						$angs_rel[$i+1] = $angs_rel[0];
					}
					if ($angs_rel[$i+1]>0)
					{
						$longs_ext[$i] += $gr*tan(deg2rad((180-$angs_rel[$i+1])/2));
					}
					else
					{
						$longs_ext[$i] += $gr*tan(deg2rad((180-$angs_rel[$i])/2));
					}
					$ext_actual_x = $ext_actual_x + $longs_ext[$i-1]*cos(deg2rad($array_paredes[$i-1]['angulo']));
					if($array_paredes[$i-1]['angulo']<180)
					{
						$ext_actual_y = $ext_actual_y - abs($longs_ext[$i-1]*sin(deg2rad($array_paredes[$i-1]['angulo'])));
					}
					else
					{
						$ext_actual_y = $ext_actual_y + abs($longs_ext[$i-1]*sin(deg2rad($array_paredes[$i-1]['angulo'])));
					}
					$ext_pos = 'pos('.$ext_actual_x.',0,'.$ext_actual_y.')';
					$ext_ang = $int_ang;

					/* superior */
					$sup_actual_x = $int_actual_x;
					$sup_actual_y = $int_actual_y;
					if ($angs_rel[$i+1]!=0) {
						$sup_x3 = $array_paredes[$i]['longitud'] + $gr*tan(deg2rad((180-$angs_rel[$i+1])/2));
					}
					else
					{
						$sup_x3 = $array_paredes[$i]['longitud'] + $gr*tan(deg2rad((180-$angs_rel[$i])/2));
					}
					$sup_y3 = -$gr;
					$sup_x4 = -$gr*tan(deg2rad((180-$angs_rel[$i])/2));
					$sup_y4 = -$gr;
				}
			}

			if (!empty($array_paredes[$i]['puerta']) && empty($array_paredes[$i]['ventana'])) {
				include 'pared_puerta.php';
				$cadena_archivo .= $pared_puerta_cadena;
			}
			elseif (empty($array_paredes[$i]['puerta']) && !empty($array_paredes[$i]['ventana'])) {
				include 'pared_ventana.php';
				$cadena_archivo .= $pared_ventana_cadena;
			}
			else
			{
				include 'pared_sin_huecos.php';
				$cadena_archivo .= $pared_cadena;
			}
		}

		/* radiadores y caldera*/
		$cadena_archivo .= $cadena_radiadores;
		$cadena_archivo .= $cadena_calderas;
		$cadena_archivo .= '}';

		return $cadena_archivo;
	}

	function angulos($array_paredes){
		$num_paredes = count($array_paredes);
		$angs_rel = array();
		for ($i=0; $i < $num_paredes; $i++)
		{
			if ($i==0)
			{
				if ($array_paredes[$i]['angulo']-$array_paredes[$num_paredes-1]['angulo']>0) {
					$a = $array_paredes[$i]['angulo']-$array_paredes[$num_paredes-1]['angulo'] - 180;
				}
				else
				{
					$a = $array_paredes[$i]['angulo']-$array_paredes[$num_paredes-1]['angulo'] + 180;
				}
				if ($a<0) {
					$a+=360;
				}
			}
			else
			{
				if ($array_paredes[$i]['angulo']-$array_paredes[$i-1]['angulo']>0) {
					$a = $array_paredes[$i]['angulo']-$array_paredes[$i-1]['angulo'] - 180;
				}
				else
				{
					$a = $array_paredes[$i]['angulo']-$array_paredes[$i-1]['angulo'] + 180;
				}
				if ($a<0) {
					$a+=360;
				}
			}
			$angs_rel[$i] = $a;
		}
		return $angs_rel;
	}

	function make_json($cocina)
	{
		$nombre = time();
		$js = json_encode($cocina, JSON_FORCE_OBJECT);
		$archivo = CARPETA_IMPORT.$nombre;
		$flujo = fopen($archivo, 'w');
		fwrite($flujo, $js);
		fclose($flujo);
	}

	function getjson($json = NULL)
	{
		if ($json == NULL)
		{
			$json = file_get_contents('import/pentagonal.json');
		}
		$json_deco = json_decode($json, 'assoc');
		return $json_deco;
	}

	function volcar($nombre,$cadena_archivo)
	{
		$archivo = CARPETA_EXPORT.$nombre;
		$flujo = fopen($archivo, 'w');
		fwrite($flujo, $cadena_archivo);
		fclose($flujo);
	}



?>