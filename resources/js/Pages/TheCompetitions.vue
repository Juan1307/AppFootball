<script setup>
	import { ref, watch } from 'vue';

	import LayoutRender from '@/Layouts/LayoutRender.vue';
	import CompetitionInfo from './Require/CompetitionInfo.vue';
	import { useAxios } from '@/Services/Service.js';

	const stateIndex = ref(null);
	const stateData = ref(null);

	const { currentData, currentError } = useAxios('/competitions');
	
	const getInfoCompetition = (idx, sidx) => {
		stateIndex.value = idx;
		stateData.value = currentData.value[sidx]; 
	};

	watch(currentData, (val) => {
		const { id: index} = val[0];
		val.length && (stateIndex.value = index, stateData.value = val[0]);
	});

</script>

<template>
	<h3>Seccion de Ligas</h3>

	<section class="row">
		<article class="col-8">

			<LayoutRender class="row" :data="currentData" :error="currentError" >
				<template #item="{ item:{id, name, type, plan}, index }">

					<div class="card mb-4">
						<div class="card-header d-flex justify-content-between">
							<span>ID: <b v-text="id"></b></span>
							<span v-text="name"></span>
						</div>
					
						<div class="card-body">
							<p>
								Tipo: <span v-text="type"></span>
								Plan: <span v-text="plan"></span>
							</p>
							<button type="button" class="btn btn-block btn-outline-success" 
											@click.prevent="getInfoCompetition(id, index)">Ver mas</button>
						</div>
					</div>
 
				</template>
			</LayoutRender>
			
		</article>

		<aside class="col">
			<div v-if="currentData.length">
				<div>
					<h4 v-text="stateData.name"></h4>
					<p v-text="stateData.type"></p>
					<p v-text="stateData.plan"></p>
				</div>
				<main>
					<CompetitionInfo :index="stateIndex"></CompetitionInfo>
				</main>
			</div>
			<div v-else> Cargando ... </div>
		</aside>
	</section>

</template>