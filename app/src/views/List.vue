<template>
	<div class="container">
		<b-modal
            ref="modal-add"
			id="modal-add"
			title="Nova frase"
            hide-footer
		>
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
                <b-button
                    class="mt-3"
                    variant="outline-success"
                    block
                    @click="handleAddPhrase"
                >
                    Salvar
                </b-button>
			</div>
		</b-modal>


		<table class="table mt-4">
		<thead>
			<tr>
				<th scope="col">
					<b-button
						variant="dark"
						v-b-modal.modal-add
						text-right
					>
						+
					</b-button>
				</th>
				<th scope="col">Categoria</th>
				<th scope="col">Frase</th>
				<th scope="col">Ações</th>
			</tr>
		</thead>
		<tbody>
			<tr
				v-for="item in listing"
				:key="item.id"
			>
				<td>{{ item.id }}</td>
				<td>{{ item.category }}</td>
				<td>{{ item.phrase }}</td>
				<td>
                    <router-link
                    :to="{
                            name: 'edit',
                            params: {id: item.id}
                        }"
                    >
                        <b-button
                            variant="outline-dark"
                        >
                            Gerenciar
                        </b-button>
                    </router-link>
				</td>
			</tr>
		</tbody>
		</table>
	</div>
</template>
<script>
export default {
	data() {
		return {
			listing: [],
            id: '',
			category: '',
			phrase: '',
		}
	},

	methods: {
		handleAddPhrase() {
			const payload = {
                id: this.listing.length + 1,
				category: this.category,
				phrase: this.phrase,
			}

            this.$http.post('/create', payload)
                .then((response) => {
                    console.log(response);
                })

			this.listing.push(payload);
            this.$refs['modal-add'].hide()
			this.resetForm();
		},

        getListing() {
            this.$http.get('/list')
                .then((response) => {
                    this.listing = response.data;
                });
        },

		resetForm() {
            this.id = '';
			this.category = '';
			this.phrase = '';
		}
	},

	created() {
        this.getListing();
	}
}
</script>