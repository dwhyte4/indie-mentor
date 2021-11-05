@extends('navtemplate.usersidebar')

@section('content')

<link rel="stylesheet" type="text/css" href="css/checkbox.css" media=”screen” />
<div class="container rounded bg-white">
    
    <div class="bg row d-flex justify-content-center pb-5">
        <div class="col-sm-4 col-md-4 ml-1">
            <div class="py-4 pl-6 d-flex flex-row">
                <h5><span class="fa fa-check-square-o"></span><b>ELIGIBLE</b> | </h5><span class="pl-2">Pay</span>
            </div>
            <div class="bg-white p-2 d-flex flex-column" style="border-radius:14px">
                <div class="text-center mt-4"> <img class="img-fluid" src="https://i.imgur.com/kvdO7jw.png" width="200" /> </div>
                <h5>Mastering  Design Feedback</h5>
                <p>premium</p>
                <h4 class="green">$85.00</h4>
                <div class="rating d-flex">
                    <div class="col-10"> <img src="https://akproject.tech/assets/img/icons/ic-star.svg" alt=""> <img src="https://akproject.tech/assets/img/icons/ic-star.svg" alt=""> <img src="https://akproject.tech/assets/img/icons/ic-star.svg" alt=""> <img src="https://akproject.tech/assets/img/icons/ic-star.svg" alt=""> <img src="https://akproject.tech/assets/img/icons/ic-star.svg" alt=""> <span class="green">(71)</span> </div>
                    <div><img src="https://buildwithangga.com/themes/front/images/ic_lv_hard.svg" alt=""></div>
                </div>
            </div>
        </div>
        <div class="col-sm-5 col-md-6 mobile">
            <div class="py-4 d-flex justify-content-end">
                <h6><a href="#">Cancel and return to website</a></h6>
            </div>
            <div class="bg-white p-3 d-flex flex-column" style="border-radius:14px">
                <div class="pt-2">
                    <h5>Main benefits</h5>
                </div>
                <div class="d-flex">
                    <div class="col-8">Access Time</div>
                    <div class="ml-auto"><b>Selamanya</b></div>
                </div>
                <div class="d-flex">
                    <div class="col-8">Bonus Konsultasi & Assets</div>
                    <div class="ml-auto"><b>Tersedia</b></div>
                </div>
                <div class="d-flex">
                    <div class="col-8">Sertifikat kelas</div>
                    <div class="ml-auto"><b>Tersedia</b></div>
                </div>
                <div class="pt-2">
                    <h5>Payment details</h5>
                </div>
                <div class="d-flex">
                    <div class="col-8">Harga normal</div>
                    <div class="ml-auto green">Rp.335,000</div>
                </div>
                <div class="d-flex">
                    <div class="col-8">Harga kelas <span class="green">Discount</span></div>
                    <div class="ml-auto">Rp.125,000</div>
                </div>
                <div class="d-flex">
                    <div class="col-8">Kode unik</div>
                    <div class="ml-auto green">-Rp1,000</div>
                </div>
                <div class="d-flex">
                    <div class="col-8">Total Transfer</div>
                    <div class="ml-auto "><b>Rp.121.747</b></div>
                </div>
                <div class="pt-2">
                    <div class="border-top px-4 mx-8 pt-2"></div>
                    <h5>Transfer pembayaran</h5>
                </div>
                <div class="d-flex flex-row">
                    <h5 class="pl-2"><span class="fa fa-check-square-o"></span><b>ELIGIBLE</b> | </h5><span class="pl-2">Pay</span>
                </div>
                <div class="pl-2">
                    <div>PT AKPROJECET BANGUKAN INDONESIA (ADMINNYA)</div>
                    <div class="pb-2 "><b>8556572356</b></div>
                </div> 
                <!-- <input type="button" value="Konfirmasi pembayaran" class=" btn mt-4 btn-primary btn-block" style="border-radius:100px; background-color:#2447f9;"> -->
                <form action="/payment" method="POST">
                    @csrf
                    <button id="checkout-button" class=" btn mt-4 btn-primary btn-block" style="border-radius:100px; background-color:#2447f9;">Proceed to Checkout</button>
                </form>
                <div class="text-center p-3"> <a class="text-link " target="_blank" href="#">Lihat Jam Operasional</a> </div>
            </div>
            <div class="bg-white mt-4 p-3 d-flex flex-column" style="border-radius:14px">
                <div class="pt-2">
                    <h5>Informasi penting</h5>
                </div>
                <div class="pl-2">
                    <div>Proses konfirmasi pembayaran kelas akan membutuhkan waktu sekitar 20 menit (dari pesan WhatsApp dikirim). Mohon menunggu dengan sabar dan terima kasih.</div>
                </div>
                <div class="pt-2">
                    <h5>Butuh bantuan? hubungi kami</h5>
                </div>
                <div class="d-flex">
                    <div class="col-8">Admin</div>
                    <div class="ml-auto">Gus</div>
                </div>
                <div class="d-flex">
                    <div class="col-8">No. WhatsApp</div>
                    <div class="ml-auto"><b>+62815446747</b></div>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    // Create an instance of the Stripe object with your publishable API key
    var stripe = Stripe('pk_test_******');
    var checkoutButton = document.getElementById('checkout-button');

    checkoutButton.addEventListener('click', function() {
        // Create a new Checkout Session using the server-side endpoint you
        // created in step 3.
        fetch('/payment', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'url': '/payment',
                "X-CSRF-Token": document.querySelector('input[name=_token]').value
            },
        })
        .then(function(response) {
            return response.json();
        })
        .then(function(session) {
            return stripe.redirectToCheckout({ sessionId: session.id });
        })
        .then(function(result) {
            // If `redirectToCheckout` fails due to a browser or network
            // error, you should display the localized error message to your
            // customer using `error.message`.
            if (result.error) {
                alert(result.error.message);
            }
        })
        .catch(function(error) {
            console.error('Error:', error);
        });
    });
</script>

@endsection