
@extends ("layout")
@section("menu")
    <fieldset class="p-5"

    <tabla rol="{{Auth::user()->role}}" consulta="idiomas" filas_serializadas='@json($filas)' campos_serializados='@json($campos)' nombre_tabla="Empleados">
    </tabla>
@endsection
