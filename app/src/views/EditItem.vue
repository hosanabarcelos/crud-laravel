<template>
	<div class="mx-auto">
		<router-link class="mb-4" to="/list">Voltar para a lista</router-link>
		<div
			v-if="editSuccess"
			class="alert alert-success"
		>
			Frase editada!
		</div>
		<div
			v-if="deleteSuccess"
			class="alert alert-danger"
		>
			Frase excluída!
		</div>

		<p>Editar ou excluir frase de número <strong>{{ this.$route.params.id }}</strong></p>
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
				<div class="col-12 mt-4">
					<b-button
						variant="outline-success"
						block
						@click="handleUpdatePhrase"
					>
						Editar
					</b-button>
					<div class="space" />
					<b-button
						variant="outline-danger"
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
			editSuccess: false,
			deleteSuccess: false,
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
				this.editSuccess = true;
				setTimeout(() => {
					this.$router.push('/list')
				}, 2000)

		},

		handleDeletePhrase() {
			this.$http.delete(`/delete/${this.$route.params.id}`)
				.then((response) => {
					console.log(response);
				})
				this.deleteSuccess = true;
				setTimeout(() => {
					this.$router.push('/list')
				}, 2000)
		}
	},

	created() {
		this.getPhrase();
	}
}
</script>
<style scoped>
.mx-auto {
	margin-right: auto !important;
	margin-left: auto !important;
	width: 60%;
	display: flex;
	flex-direction: column;
	justify-content: center;
	height: 100vh;
}
.mt-4 {
	margin-top: 1.5rem !important;
	display: flex;
	align-items: center;
	justify-content: center;
}
.space {
	width: 20px;
}
</style>