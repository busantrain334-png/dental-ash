import React, { useState } from 'react';

const Checkout: React.FC = () => {
    const [userInfo, setUserInfo] = useState({
        name: '',
        email: '',
        address: '',
        paymentMethod: 'creditCard',
    });

    const handleChange = (e: React.ChangeEvent<HTMLInputElement | HTMLSelectElement>) => {
        const { name, value } = e.target;
        setUserInfo({ ...userInfo, [name]: value });
    };

    const handleSubmit = (e: React.FormEvent) => {
        e.preventDefault();
        // Handle the checkout process, e.g., API call to process payment
        console.log('User Info:', userInfo);
    };

    return (
        <div className="checkout">
            <h2>Checkout</h2>
            <form onSubmit={handleSubmit}>
                <div>
                    <label>Name:</label>
                    <input type="text" name="name" value={userInfo.name} onChange={handleChange} required />
                </div>
                <div>
                    <label>Email:</label>
                    <input type="email" name="email" value={userInfo.email} onChange={handleChange} required />
                </div>
                <div>
                    <label>Address:</label>
                    <input type="text" name="address" value={userInfo.address} onChange={handleChange} required />
                </div>
                <div>
                    <label>Payment Method:</label>
                    <select name="paymentMethod" value={userInfo.paymentMethod} onChange={handleChange}>
                        <option value="creditCard">Credit Card</option>
                        <option value="paypal">PayPal</option>
                    </select>
                </div>
                <button type="submit">Complete Purchase</button>
            </form>
        </div>
    );
};

export default Checkout;