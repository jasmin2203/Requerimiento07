<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\productos;

class controllerProductos extends Controller
{



    public function obtenerProductos ($id){

        $producto  = productos::find($id);

        return response()->json($producto);

    }


    public function crearProductos (Request $request) {

        $json = $request->all();

        $producto = new productos;
        $producto->codigo = $json['codigo'];
        $producto->nombre = $json['nombre'];
        $producto->descripcion = $json['descripcion'];
        $producto->fechaIngreso = $json['fechaIngreso'];
        $producto->estado = $json['estado'];
        $producto->afectoIGV = $json['afectoIGV'];
        $producto->precio = $json['precio'];
        $producto->ruc = $json['ruc'];
        $producto->proveedor = $json['proveedor'];
        $producto->categoria = $json['categoria'];
	    $producto->save();

        return $producto->id;
    }

    public function modificarProductos (Request $request, $id){
        
        $producto = productos::find($id);
        
        $json = $request->all();
        $producto->codigo = $json['codigo'];
        $producto->nombre = $json['nombre'];
        $producto->descripcion = $json['descripcion'];
        $producto->fechaIngreso = $json['fechaIngreso'];
        $producto->estado = $json['estado'];
        $producto->afectoIGV = $json['afectoIGV'];
        $producto->precio = $json['precio'];
        $producto->ruc = $json['ruc'];
        $producto->proveedor = $json['proveedor'];
        $producto->categoria = $json['categoria'];   

        $producto->save();

        return "El producto con el id : " . $producto->codigo . " ha sido modificado ";
    


    }

    public function eliminarProductos ($id){


        $producto = productos::find($id);
	    $producto->delete();

        return "Producto eliminado";
    }

}