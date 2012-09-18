<?php

	$pared =  $caldera['pared'];
	$ang = 'ang(0,'.$array_paredes[$pared]['angulo'].',0)';

	$pos_x = $int_actual_x + $caldera['posicion_x']*cos(deg2rad($array_paredes[$pared]['angulo']));
	$pos_y = $int_actual_y - $caldera['posicion_x']*sin(deg2rad($array_paredes[$pared]['angulo']));

	$pos_z = $caldera['posicion_z'];

	$cadena_caldera = 'obj"CALDERA"
	{
		IDCatalogo"179"
		familia"ME"
		ud 1.00
		objeti"ATZ"
		accel3D
		FactorOrig(1.000000)
		pos('.$pos_x.','.$pos_z.','.$pos_y.')
		'.$ang.'
		local L  =950
		local H  =2100
		local P  =100
		idEscena(6)
		idClaveUnica(100)
		use L  =950
		use H  =2100
		use P  =100
		local L=450
		local H=850
		local P=360
		local L2=0
		local P2=0
		local Ang=0
		local R=0
		local Ang2=0
		local H2=0
		local L3=0
		local H3=0
		local P3=0
		local R2=0
		local R3=0

		mat"" color(0.85,0.85,0.85) transp(1) 		extrude(L,H-70,P-5)(0,0,0)(0,780,0)(0,0,0)(450,0,0)(450,780,0)(0,780,0)

		obj"FOTO"
		{
			ud 1.00
			novalorar
			idClaveUnica(103)
			virtual(0,0,P-5)(L,H-70,5)

			eti"" mat"caldera" color(1,1,1) transp(1) 			extrude(L,H,P)(0,0,0)(0,780,0)(0,0,0)(450,0,0)(450,780,0)(0,780,0)

		}

		mat"" color(0.85,0.85,0.85) transp(1) 		revol(60,30,60)(L/2,H-70,P/2)	alfa(360)(0,0,0)(60,1.2,0)(60,30,0)(0,30,0)(0,0,0)suavizado

		mat"" color(0.85,0.85,0.85) 		revol(30,40,30)(L/2,H-40,P/2)	alfa(360)(0,0,0)(30,1.6,0)(30,40,0)(0,40,0)(0,0,0)suavizado

	}

	';

?>