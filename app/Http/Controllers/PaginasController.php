<?php

namespace App\Http\Controllers;
use App\Models\Contacto;
use Illuminate\Http\Request;

class PaginasController extends Controller
{
    public function registrarClientes()
    {
        return view('contacto');
    }

    // Método para almacenar los datos del formulario
    public function guardarCliente(Request $request)
    {
        // Validación de los datos
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telefono' => 'required|string|max:15', // Puedes ajustar el tamaño según sea necesario
            'direccion' => 'required|string|max:255',
            'mensaje' => 'required|string',
        ]);

        // Creación de un nuevo contacto
        Contacto::create($request->all());

        // Redirección con un mensaje de éxito
        return redirect()->route('cliente.ver')->with('success', '¡Registrado con éxito!');
    }

    public function listarClientes()
    {
        // Traer todos los contactos de la base de datos
        $contactos = Contacto::all();

        // Retornar la vista y pasar los contactos a la vista
        return view('contactos', compact('contactos'));
    }


     // Mostrar el formulario para editar un contacto
     public function edit($id)
     {
         $contacto = Contacto::findOrFail($id);
         return view('editcliente', compact('contacto'));
     }

     // Actualizar el contacto en la base de datos
     public function update(Request $request, $id)
     {
         // Validar los datos del formulario
         $validatedData = $request->validate([
             'nombre' => 'required|string|max:255',
             'email' => 'required|email|max:255',
             'telefono' => 'required|string|max:15',
             'direccion' => 'required|string|max:255',
             'mensaje' => 'required|string',
         ]);

         // Buscar el contacto por su ID
         $contacto = Contacto::findOrFail($id);

         // Actualizar los datos del contacto
         $contacto->update($validatedData);

         // Redirigir al listado de contactos con un mensaje de éxito
         return redirect()->route('cliente.ver')->with('success', 'Contacto actualizado exitosamente.');
     }

     public function eliminarCliente($id)
     {
        $contacto = Contacto::findOrFail($id);
        $contacto->delete();

         return redirect()->route('cliente.ver')->with('success', 'Contacto eliminado exitosamente.'); // Redirige con mensaje de éxito
     }

}
