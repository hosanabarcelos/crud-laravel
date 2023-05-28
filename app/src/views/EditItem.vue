<template>
	<div>
        <router-link to="/list">Voltar para a lista</router-link>
        <h3>Editar ou excluir frase de número {{ this.$route.params.id }}</h3>
        <div class="row">
            <div class="col-6">
					<b-form-input
						v-model="category"
						placeholder="Categoria"
					/>
				</div>
				<div class="col-6">
					<b-form-input
						v-model="phrase"
						placeholder="Frase"
					/>
			    </div>
            <div class="row mt-4">
				<div class="col-12">
					<b-button
						variant="success"
						block
						@click="handleUpdatePhrase"
					>
						Editar
					</b-button>
                    <b-button
						variant="danger"
						block
						@click="handleDeletePhrase"
					>
						Excluir
					</b-button>
				</div>
			</div>
        </div>
	</div>
</template>
<script>

export default {
	data() {
		return {
			listing: [],
			category: '',
			phrase: '',
		}
	},
	methods: {
        getPhrase() {
            this.$http.get(`/edit/${this.$route.params.id}`)
                .then((response) => {
                    this.category = response.data.category;
                    this.phrase = response.data.phrase;
                });
        },

        handleUpdatePhrase() {
			const payload = {
				category: this.category,
				phrase: this.phrase,
			}

            this.$http.put(`/update/${this.$route.params.id}`, payload)
                .then((response) => {
                    console.log(response);
                })
        },
	},

	created() {
		this.getPhrase();
	}
}
</script>