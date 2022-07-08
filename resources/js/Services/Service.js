import { ref } from 'vue';

async function useAxiosAsync(url) {
	let currentAsyncData = [];
	let currentAsyncError = 0;

	try {
		const { data } = await axios.get(url);
		
		if(data['time_out'] !== undefined) {
			currentAsyncData.length = 0;
			currentAsyncError = 1;
		} else currentAsyncData = data;
		
		return { currentAsyncData , currentAsyncError };
	
	}catch(e){
		currentAsyncError = 2;
	}

	return { currentAsyncData , currentAsyncError };
} 


function useAxios(url) {
	const currentData = ref([]);
	const currentError = ref(0);

	axios.get(url).then( ({data}) => {

		if(data['time_out'] !== undefined) {

			currentData.value.length = 0;
			currentError.value = 1;

		} else currentData.value = data;

	}).catch((err) => (currentError.value = 2));

	return { currentData, currentError };
}

export { useAxios, useAxiosAsync }