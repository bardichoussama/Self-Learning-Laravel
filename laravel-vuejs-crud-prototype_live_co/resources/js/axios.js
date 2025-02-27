import axios from 'axios';

const apiClient = axios.create({
  baseURL: 'http://127.0.0.1:8000/api', // Ensure this matches your Laravel backend URL
  headers: {
    'Content-Type': 'application/json',
  },
  withCredentials: true,
});

export default apiClient;