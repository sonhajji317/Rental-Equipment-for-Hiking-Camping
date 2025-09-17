# TODO: Implement Cart List Feature with Rental Duration

## Steps to Complete:
- [x] Update app/Livewire/Cart/CartList.php to load cart data from session and fetch product details
- [x] Update resources/views/livewire/cart/cart-list.blade.php to display cart items with details (name, quantity, price, total)
- [x] Update app/Livewire/Product/Details.php addToCart method to use start_date and end_date instead of quantity
- [x] Update app/Livewire/Cart/CartList.php to handle start_date, end_date, and real-time total price calculation
- [x] Update resources/views/livewire/cart/cart-list.blade.php to show date inputs for start_date and end_date, and display recalculated total
- [x] Test the cart list display with rental duration
