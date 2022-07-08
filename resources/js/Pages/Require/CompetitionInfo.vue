<script setup>
	import { ref, watch, defineProps } from 'vue';

	import { useAxiosAsync } from '@/Services/Service.js';
	import LayoutRender from '@/Layouts/LayoutRender.vue';

	const props = defineProps({ index: Number });
	
	const currentData = ref([]);
	const currentError = ref(0);

	watch(() => props.index, async (val) => {
		currentData.value.length = 0; //reset
		currentError.value = 0; //reset

		const { currentAsyncData, currentAsyncError } = await useAxiosAsync('/competitions/'+ val);
		currentData.value = currentAsyncData.teams ?? []; // current teams
		currentError.value = currentAsyncError;

	},{ immediate: true });

</script>

<template>
	<LayoutRender class="row" :data="currentData" :error="currentError">
		<template #item="{ item:{id, name, tla} }">
			<div class="card mb-4">
				<div class="card-header d-flex  flex-column">
					<span>ID: <b v-text="id"></b> </span>
					<small>Nombre: <span v-text="name"></span> </small>
					<span>TLA: <span v-text="tla"></span> </span>
				</div>
			</div>
		</template>
	</LayoutRender>
</template>