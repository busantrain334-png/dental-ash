import React from 'react';
import { useCart } from '../services/cartService'; // Assuming there's a cart service for managing cart state

const Cart: React.FC = () => {
    const { cartItems, removeItem, updateQuantity } = useCart();

    const handleRemove = (itemId: string) => {
        removeItem(itemId);
    };

    const handleQuantityChange = (itemId: string, quantity: number) => {
        updateQuantity(itemId, quantity);
    };

    return (
        <div className="cart">
            <h1>Your Cart</h1>
            {cartItems.length === 0 ? (
                <p>Your cart is empty.</p>
            ) : (
                <ul>
                    {cartItems.map(item => (
                        <li key={item.id}>
                            <span>{item.name}</span>
                            <input
                                type="number"
                                value={item.quantity}
                                onChange={(e) => handleQuantityChange(item.id, Number(e.target.value))}
                                min="1"
                            />
                            <button onClick={() => handleRemove(item.id)}>Remove</button>
                        </li>
                    ))}
                </ul>
            )}
            <button onClick={() => {/* Navigate to checkout */}}>Proceed to Checkout</button>
        </div>
    );
};

export default Cart;