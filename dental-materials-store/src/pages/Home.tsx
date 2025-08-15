import React from 'react';

const Home: React.FC = () => {
    return (
        <div className="home">
            <h1>Welcome to Dr Ashwin Surana Dental</h1>
            <p>Your trusted dental practice providing quality care and materials.</p>
            <p>Located at 43 A RV Desai Road, Vadodara 390004</p>
            <p>Contact us: +919486835905 | ashwinsurana73@gmail.com</p>
            <p>Explore our range of products and find what you need for your practice.</p>
            <a href="/products">View Products</a>
            <a href="/cart">Go to Cart</a>
        </div>
    );
};

export default Home;