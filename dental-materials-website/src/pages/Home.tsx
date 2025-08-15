import React from 'react';
import { Header, Footer, ProductCard } from '../components';

const Home: React.FC = () => {
    return (
        <div>
            <Header />
            <main>
                <h1>Welcome to Our Dental Materials Store</h1>
                <section>
                    <h2>Featured Products</h2>
                    <div className="product-list">
                        {/* Example ProductCard usage */}
                        <ProductCard />
                        <ProductCard />
                        <ProductCard />
                    </div>
                </section>
                <section>
                    <h2>Promotions</h2>
                    <p>Check out our latest promotions and discounts!</p>
                </section>
            </main>
            <Footer />
        </div>
    );
};

export default Home;