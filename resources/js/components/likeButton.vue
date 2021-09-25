<template>
    <div>
        <span class="like-btn" @click="likeReceta" :class="{'like-active' : this.like}"></span>
        <p>{{ cantidadLikes }} Les gustó esta receta</p>
    </div>
</template>

<script>
export default {
    // CAPTURANDO PROPS
    props: ['recetaId', 'like', 'likes'],
    data: function () {
        return {
            totalLikes: this.likes

        }
    },
    methods: {
        likeReceta() {
            axios.post('/recetas/' + this.recetaId)
                .then(respuesta => {
                    if (respuesta.data.attached.length > 0) {
                        this.$data.totalLikes++;
                    } else {
                        this.$data.totalLikes--;
                    }
                })
                .catch(error => {
                    if (error.response.status == 401) {
                        this.$swal({
                            icon: 'error',
                            iconColor: '#3b080b',
                            title: 'Oopss....',
                            text: 'Aún no eres usuario para dar like!',
                            footer: '<a href="/register">Registraté aquí</a>'
                        })


                    }
                });
        }
    },
    computed: {
        cantidadLikes: function () {
            return this.totalLikes;
        }
    }

}
</script>
