<script setup>
	import { ref, computed, defineAsyncComponent } from 'vue';

	const StackComponents = {
		TheCompetitions: defineAsyncComponent(() => import('@/Pages/TheCompetitions.vue') ),
		TheTeams: defineAsyncComponent(() => import('@/Pages/TheTeams.vue') ),
		ThePlayers: defineAsyncComponent(() => import('@/Pages/ThePlayers.vue') )
	};

	const LinksArray = [ 
		{ comp:'TheCompetitions', text:'Ligas' }, 
		{ comp:'TheTeams',  text:'Equipos' }
	];
	
	const IndexInit = 0;
	const { comp } = LinksArray[IndexInit];  

	const currentState = ref(comp);
	const currentTab = ref(IndexInit);

	const setActiveTab = (idx, curr) => idx === curr && 'active'; 
	const setComponent = (idx) => {
		const { comp } = LinksArray[idx];
	
		currentState.value = comp;
		currentTab.value = idx;
	};

</script>

<template>
	<section class="container">
		<!-- NavBar Static -->
		<nav class="d-flex justify-content-center">
			<ul class="nav nav-pills">
				<li class="nav-item mx-2" v-for="({comp, text}, index) of LinksArray" :key="index">
		    	<a :class="`nav-link cursor-pointer ${setActiveTab(index, currentTab)}`" 
		    			aria-current="page" @click.prevent="setComponent(index)"
		    			v-text="text">
    			</a>
  			</li>
			</ul>
		</nav>
		<!-- Dynamic Component -->
		<main>
			<component :is="StackComponents[currentState]" :key="currentState"></component>	
		</main>
	</section>
</template>