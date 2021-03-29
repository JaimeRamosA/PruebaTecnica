<template>
    <div class="card">
    <div class="card-body">
        <table class="min-w-full divide-y divide-gray-200">
            <thead>
                <tr>
                <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Remitente
                  </th>
                  <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Destinatario
                  </th>
                  <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Asunto
                  </th>
                  <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Mensaje
                  </th>
                  <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    created_at
                  </th>
                  <th scope="col" class="px-6 py-3 bg-gray-50">
                    <span class="sr-only">Edit</span>
                  </th>
                </tr>
              </thead>
              <tbody  class="bg-white divide-y divide-gray-200">
                <tr v-for="todo in todos" :key=""todo.id>
                    <td  class="px-6 py-4 whitespace-nowrap">{{todo.id_user}}</td>
                    <td  class="px-6 py-4 whitespace-nowrap">{{todo.destinatario}}</td>
                    <td  class="px-6 py-4 whitespace-nowrap">{{todo.asunto}}</td>
                    <td  class="px-6 py-4 whitespace-nowrap">{{todo.mensaje}}</td>
                    <td  class="px-6 py-4 whitespace-nowrap">{{todo.created_at}}</td>
                </tr>
              </tbody>
              <tfoot>
                <tr>
                    <td colspan="5" class="bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"> </td>
                </tr>
            </tfoot>


        </table>
        <nav class="pagination" role="navegation" arial-label="pagination">
            <a style="margin-right: 0.75rem;" class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150" v-on:click="changePage(page - 1)">Anterior</a>
            <a class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 hover:text-gray-500 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">{{page}}</a>
            <a style="margin-right: 0.75rem;"class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150"" v-on:click="changePage(page + 1)">Siguiente</a>
        </nav>
    </div>
</div>
</template>

<script>
import axios from 'axios'
    export default {
        data(){
            return{
                todos:null,
                page:1,
                pages:1
            }
        },
        mounted() {
            console.log('Component mounted.')
            this.getTodos();
        },
        methods:{
            getTodos(){

                const  params = "page="+this.page

                console.log('http://prueba_tecnica.test/api/listar-email?'+params)
                axios.get('http://prueba_tecnica.test/api/listar-email?'+params).then(response =>{
                    console.log(response.data.data)
                    this.todos = response.data.data.data
                    this.pages = response.data.data.last_page
                    console.log(this.pages)
                }).catch(e => console.log(e))
            },
            changePage(page){
                this.page = (page <= 0 || page > this.pages) ? this.page : page;
                this.getTodos();
            }
        }
    }
</script>