<form action="{{route('buscarUsuario')}}"  method="get" id="formBuscar" class="form-inline mx-2">
    {{ csrf_field() }}
    <div class="input-group">
        <select id="select_buscar" name="select_buscar" class="form-control form-control-navbar">
            <option value="" disabled selected>Seleccionar</option>
            <option value="name">Nombre</option>
            <option value="identificacion">Cedula</option>
            <option value="email">Correo</option>
            <option value="telefono">Telefono</option>
          </select>
        <input class="form-control form-control-navbar" id="dataSearch" name="dataSearch" type="search"  placeholder="Buscar Usuario" aria-label="">
        <div class="input-group-append">
            <button class="btn btn-navbar" id="btn-search" onclick="" type="submit">
                <i class="fas fa-search"></i>
            </button>
        </div>
    </div>
</form>


