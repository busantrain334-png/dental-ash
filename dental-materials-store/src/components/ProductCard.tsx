import React from 'react';

interface ProductCardProps {
    product: {
        id: string;
        name: string;
        price: number;
        imageUrl: string;
    };
    onAddToCart: (productId: string) => void;
}

const ProductCard: React.FC<ProductCardProps> = ({ product, onAddToCart }) => {
    const handleAddToCart = () => {
        onAddToCart(product.id);
    };

    return (
        <div className="product-card">
            <img src={product.imageUrl} alt={product.name} />
            <h3>{product.name}</h3>
            <p>${product.price.toFixed(2)}</p>
            <button onClick={handleAddToCart}>Add to Cart</button>
        </div>
    );
};

export default ProductCard;