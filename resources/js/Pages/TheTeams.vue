<script setup>
	import { ref, watch } from 'vue';

	import LayoutRender from '@/Layouts/LayoutRender.vue';
	import { useAxios } from '@/Services/Service.js';

	const { currentData, currentError } = useAxios('/teams');
</script>

<template>
	<h3>Seccion de Equipos</h3>

	<LayoutRender class="row" :data="currentData" :error="currentError" >
		<template #item="{ item:{ id, name, shortName, tla } }">
			<div class="card mb-4">
				<div class="card-header d-flex justify-content-between">
					<span>ID: <b v-text="id"></b></span>
					<span v-text="shortName"></span>
				</div>
			
				<div class="card-body">
					<p>TLA : <span v-text="tla"></span> </p>
					<p>NAME : <span v-text="name"></span> </p>
				</div>
			</div>

		</template>
	</LayoutRender>
	
</template>