@extends ("layout")
@section("menu")

    <x-layout.menu class="justify-start h-full">
        <!--ADMINISTRADOR todos los roles, accede a todas las vistas    -->
        <!--GESTOR todas las facturas, clientes, personal-->
        <!--COMERCIAL todas las facturas, consultar clientes-->
        {{-- si tiene los roles de administrador o gestor va a rutas (web.php) que después va a EmpleadoController que devuelve una vista --}}
        {{-- los inputs que podrán ver--}}
        @hasanyrole("administrador|gestor")
        <x-form.a_href href="{{route('empleados.index')}}" class="mx-2">Empleados</x-form.a_href>
        @endhasanyrole

        {{--@role("administrador, gestor o comercial")--}}
        @hasanyrole("administrador|gestor|comercial")
        <x-form.a_href href="{{route('clientes.index')}}" class="mx-2">Clientes</x-form.a_href>
        @endhasanyrole

        {{--@role("administrador o comercial")--}}
        @hasanyrole("administrador|gestor|comercial")
        <x-form.a_href href="{{route('facturas.index')}}" class="mx-2">Facturas</x-form.a_href>
        @endhasanyrole

    </x-layout.menu>
@endsection

@section("contenido")
    <div class="max-h-full flex flex-row justify-center bg-gray-300">
        <img src="{{asset("images/uml.png")}}" alt="uml">
    </div>
@endsection







