<x-frontend-layout>
    <h1 class="text-white">Pembayaran</h1>
    <hr class="mt-3" style="border-bottom:1px solid white; margin-bottom:25px">

    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card">
                <div class="card-body">
                    <button id="pay-button" class="btn btn-primary">Pilih Pembayaran</button>

                    <form action="{{ route('pilih-pembayaran') }}" id="payment-form" method="post">
                        @csrf
                        <input type="hidden" name="result_data" id="result_data" value="">
                    </form>
{{--                    <pre><div id="result-json">JSON result will appear here after payment:<br></div></pre>--}}
                </div>

                <script src="http://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-2r_E40HDd6yVVmBh"></script>
                <script type="text/javascript">
                    document.getElementById('pay-button').onclick = function(){
                        // SnapToken acquired from previous step
                        let hasil = document.querySelector('#result_data');
                        function changeResult(data)
                        {
                            // document.querySelector('#result-type').value = type;
                            document.querySelector('#result_data').value = JSON.stringify(data);
                        }
                        snap.pay('{{ $snap_token }}', {
                            onSuccess: result => {
                                changeResult(result);
                                console.log(result);
                                document.querySelector('#payment-form').submit();
                                // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                            },
                            onPending: result => {
                                changeResult(result);
                                console.log(result);
                                document.querySelector('#payment-form').submit();
                                // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                            },
                            onError: result => {
                                changeResult(result);
                                console.log(result);
                                document.querySelector('#payment-form').submit();
                                // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                            }
                        });
                    };
                </script>
            </div>
        </div>
    </div>

</x-frontend-layout>
