import axios from 'axios';

const API_BASE_URL = 'https://api.example.com'; // Replace with your actual API base URL

export const fetchProducts = async () => {
    try {
        const response = await axios.get(`${API_BASE_URL}/products`);
        return response.data;
    } catch (error) {
        console.error('Error fetching products:', error);
        throw error;
    }
};

export const addToCart = async (productId, quantity) => {
    try {
        const response = await axios.post(`${API_BASE_URL}/cart`, {
            productId,
            quantity,
        });
        return response.data;
    } catch (error) {
        console.error('Error adding to cart:', error);
        throw error;
    }
};