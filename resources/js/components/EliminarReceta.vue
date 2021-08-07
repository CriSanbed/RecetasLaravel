<template>
    <input type="submit" class="btn btn-danger d-block w-100 mt-1" value="Eliminar" v-on:click="eliminarReceta">

</template>

<script>
export default {
    props: ['recetaId'],

    methods: {
        eliminarReceta() {
            this.$swal({
                title: 'Desea eliminar la receta?',
                text: "Une vez eliminada, no se puede recuperar!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, borralo!',
                cancelButtonText: 'No'
            }).then((result) => {
                if (result.isConfirmed) {
                    // para recibir la peticion
                    const params = {
                        id: this.recetaId
                    }
                    axios.post(`/recetas/${this.recetaId}`, {params, _method: 'delete'})
                        .then(respuesta => {
                            this.$swal(
                                'Receta eliminada!',
                                'Tu receta ha sido eliminada',
                                'success'
                            )
                            // con la siguiente linea salgo a cada componente padre para remover a su hijo
                            this.$el.parentElement.parentElement.parentElement.removeChild(this.$el.parentElement.parentElement);

                        })
                        .catch(error => {
                            console.log(error);
                        })
                }
            })
        }
    }
}
</script>

<style scoped>

</style>
