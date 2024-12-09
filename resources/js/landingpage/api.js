
// untuk menghubungkan dan mendapatkan data dari API
export async function fetchDataFromAPI(endpoint) {
    try {
      const response = await fetch(endpoint);
      if (!response.ok) {
        throw new Error(`Error fetching data: ${response.statusText}`);
      }
      return await response.json();
    } catch (error) {
      console.error('Gagal mengambil data:', error);
    }
  }
  