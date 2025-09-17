{{-- <div class="flex justify-center">
    <h5 class="text-2xl font-bold mb-4">Total Payment: IDR {{ number_format($this->total_price, 0, ',', '.') }}</h2>
        <button id="pay-button" class="px-4 py-2 rounded-md bg-blue-500 text-white">
            Pay Now
        </button>
</div>
<script type="text/javascript">
    // For example trigger on button clicked, or any time you need
    var payButton = document.getElementById('pay-button');
    payButton.addEventListener('click', function() {
        // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
        window.snap.pay('{{ $this->snapToken }}', {
            onSuccess: function(result) {
                /* You may add your own implementation here */
                alert("payment success!");
                console.log(result);
            },
            onPending: function(result) {
                /* You may add your own implementation here */
                alert("wating your payment!");
                console.log(result);
            },
            onError: function(result) {
                /* You may add your own implementation here */
                alert("payment failed!");
                console.log(result);
            },
            onClose: function() {
                /* You may add your own implementation here */
                alert('you closed the popup without finishing the payment');
            }
        })
    });
</script> --}}
