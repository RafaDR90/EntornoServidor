<?php
    if(file_exists("Empleados.xml")){
        $xml=simplexml_load_file("Empleados.xml");

        $xml->empleado[0]->addChild("telefono","667766776");
        $xml->empleado[0]->addChild("cp","18220");

        $xml->empleado[1]->addChild("telefono","777777777");
        $xml->empleado[1]->addChild("cp","77777");
        $xml->asXML("Empleados.xml");
    }