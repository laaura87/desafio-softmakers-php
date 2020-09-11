import axios, { AxiosInstance, AxiosRequestConfig } from 'axios';

export const axiosConfig: AxiosRequestConfig = {
  baseURL: 'http://localhost:8000/',
};

const api: AxiosInstance = axios.create(axiosConfig);

export default api;
