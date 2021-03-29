<template>
    <div class="row">
        <form action=""  method="get" id="formBuscar" class="form-inline mx-2">
            <div class="input-group">
                <select id="select_buscar" name="select_buscar" class="form-control form-control-navbar">
                    <option value="" disabled selected>Seleccionar</option>
                    <option value="asunto">Asunto</option>
                    <option value="destinatario">Destinatario</option>
                    <option value="remitente">Remitente</option>
                </select>
                <input class="form-control form-control-navbar" id="dataSearch" name="dataSearch" type="search"  placeholder="Buscar Usuario" aria-label="">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" id="btn-search" onclick="" type="submit">
                        <i class="fas fa-search">Buscar</i>
                    </button>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                todos:null
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
