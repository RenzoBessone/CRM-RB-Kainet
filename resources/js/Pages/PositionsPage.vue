<template>
    <div class="row pt-3 ms-2">
        <div class="col-6">
            <h2 class="">Posiciones</h2>
        </div>
        <div class="col-6 text-end pe-5">
            <button type="button" class="btn btn-success" @click="showModal">
                Cargar Datos de Posición
            </button>
        </div>
    </div>
    <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Empresa</th>
            <th scope="col">Producto</th>
            <th scope="col">Fecha Disp.</th>
            <th scope="col">Precio</th>
            <th scope="col">Moneda</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(position, index) in positions">
            <th scope="row">{{ position.id }}</th>
            <td>{{ position.company.razonSocial }}</td>
            <td>{{ position.product.nombre }}</td>
            <td>{{ position.fechaEntregaInicio }}</td>
            <td>{{ position.precio }}</td>
            <td>{{ position.moneda }}</td>
          </tr>
        </tbody>
    </table>
    <PositionModal @refresh="getPositions" ref="positionModal" />
</template>

<script>

    import axios from "axios";
    import PositionModal from '../Modals/CreatePositionModal.vue';

    export default {
        components: {
            PositionModal
        },
        data() {
            return {
                positions: []
            };
        },
        mounted () {
            this.getPositions();
        },
        methods: {
            async getPositions() {
                const response = await axios.get('/posiciones')
                    .then(response => {
                        this.positions = response.data;
                    })
                    .catch(error => {
                        console.error(error);
                    });
            },
            showModal() {
                this.$refs.positionModal.openModal();
            }
        }
    };



</script>