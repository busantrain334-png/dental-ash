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

export const fetchProductById = async (id) => {
    try {
        const response = await axios.get(`${API_BASE_URL}/products/${id}`);
        return response.data;
    } catch (error) {
        console.error(`Error fetching product with id ${id}:`, error);
        throw error;
    }
};

export const addToCart = async (productId, quantity) => {
    try {
        const response = await axios.post(`${API_BASE_URL}/cart`, { productId, quantity });
        return response.data;
    } catch (error) {
        console.error('Error adding to cart:', error);
        throw error;
    }
};

export const removeFromCart = async (productId) => {
    try {
        const response = await axios.delete(`${API_BASE_URL}/cart/${productId}`);
        return response.data;
    } catch (error) {
        console.error('Error removing from cart:', error);
        throw error;
    }
};

export const checkout = async (cartItems, userInfo) => {
    try {
        const response = await axios.post(`${API_BASE_URL}/checkout`, { cartItems, userInfo });
        return response.data;
    } catch (error) {
        console.error('Error during checkout:', error);
        throw error;
    }
};