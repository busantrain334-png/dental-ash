import React from 'react';
import { useCart } from '../hooks/useCart';
import CartItem from '../components/CartItem';

const Cart: React.FC = () => {
    const { cartItems, updateQuantity, removeItem } = useCart();

    return (
        <div className="cart">
            <h1>Your Shopping Cart</h1>
            {cartItems.length === 0 ? (
                <p>Your cart is empty.</p>
            ) : (
                <ul>
                    {cartItems.map(item => (
                        <CartItem 
                            key={item.id} 
                            item={item} 
                            updateQuantity={updateQuantity} 
                            removeItem={removeItem} 
                        />
                    ))}
                </ul>
            )}
        </div>
    );
};

export default Cart;