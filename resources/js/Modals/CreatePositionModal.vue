<template>
  <div class="modal fade" ref="positionModal" tabindex="-1" aria-labelledby="positionModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="positionModalLabel">Cargar Datos de Posición</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form @submit.prevent="savePosition">
            <!-- Formulario aquí -->
            <div class="mb-3">
              <label for="idEmpresa" class="form-label">ID de Empresa</label>
              <input type="text" class="form-control" id="idEmpresa" v-model="position.idEmpresa" required>
            </div>
            <div class="mb-3">
              <label for="idProducto" class="form-label">ID de Producto</label>
              <input type="text" class="form-control" id="idProducto" v-model="position.idProducto" required>
            </div>
            <div class="mb-3">
              <label for="fechaEntregaInicio" class="form-label">Fecha de Entrega Inicio</label>
              <input
                type="date"
                class="form-control"
                id="fechaEntregaInicio"
                v-model="position.fechaEntregaInicio"
                :min="minDate"
                required
              >
            </div>
            <div class="mb-3">
              <label for="moneda" class="form-label">Moneda</label>
              <select class="form-select" id="moneda" v-model="position.moneda" required>
                <option value="Pesos">Pesos</option>
                <option value="USD">USD</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="precio" class="form-label">Precio</label>
              <input type="number" class="form-control" id="precio" v-model="position.precio" required>
            </div>
            <button type="submit" class="btn btn-success">Guardar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>

  import axios from "axios";

  export default {
    name: 'PositionModal',
    data() {
      return {
        position: {
          idEmpresa: '',
          idProducto: '',
          fechaEntregaInicio: '',
          moneda: 'Pesos',
          precio: ''
        },
        minDate: ''
      };
    },
    created() {
      const today = new Date();
      const year = today.getFullYear();
      const month = String(today.getMonth() + 1).padStart(2, '0'); // Los meses en JavaScript son 0-indexados
      const day = String(today.getDate()).padStart(2, '0');
      this.minDate = `${year}-${month}-${day}`;
    },
    methods: {
      async savePosition() {
        try {
          const response = await axios.post('/posiciones', this.position);
          console.log('Response:', response.data);
          this.$emit('refresh');
        } catch (error) {
          console.error('Error:', error.response ? error.response.data : error.message);
        }
        const modalElement = this.$refs.positionModal;
        const modal = bootstrap.Modal.getInstance(modalElement);
        if (modal) {
          modal.hide();
        }
      },
      openModal() {
        const modalElement = this.$refs.positionModal;
        const modal = new bootstrap.Modal(modalElement);
        modal.show();
      }
    }
  }
</script>
