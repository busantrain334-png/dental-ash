import React from 'react';

const Home: React.FC = () => {
    return (
        <div className="home">
            <h1>Welcome to the Dental Materials Store</h1>
            <p>Your one-stop shop for all dental materials.</p>
            <p>Explore our range of products and find what you need for your practice.</p>
            <a href="/products">View Products</a>
            <a href="/cart">Go to Cart</a>
        </div>
    );
};

export default Home;