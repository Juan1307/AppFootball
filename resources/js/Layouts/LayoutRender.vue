<script setup>
	import { computed, defineProps } from 'vue';

	const props = defineProps({data: Array, error: Number});

	const currErrorState = computed(() => {
		const errorMatch = [
			{ msg: 'Cargando ...',
				alert: 'alert-dark' },
			{ msg: 'Ooops el agotaste el limite de 10 peticiones',
				alert: 'alert-warning' },
			{ msg: 'Ooops conexión perdida.',
				alert: 'alert-danger' }
		];

		return errorMatch[props.error];
	});

</script>

<template>
	<div v-if="data.length">
		<div class="col-6" v-for="(item, index) of data">
			<slot name="item" :item="item" :index="index" />
		</div>		
	</div>

	<div v-else>
		<div :class="`alert text-center ${currErrorState.alert}`" role="alert">
			<span v-text="currErrorState.msg"></span>
		</div>
	</div>
</template>