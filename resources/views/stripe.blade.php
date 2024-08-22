<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payment Method</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
        body {
            background: linear-gradient(135deg, #74ebd5 0%, #9face6 100%);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .subscription-container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 2rem;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            backdrop-filter: blur(10px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        h1 {
            font-size: 2.5rem;
            font-weight: bold;
            color: #ffffff;
            margin-bottom: 2rem;
        }
        .card {
            border: none;
            border-radius: 15px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            overflow: hidden;
            color: white;
        }
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }
        .card img {
            height: 200px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }
        .card:hover img {
            transform: scale(1.05);
        }
        .card-title {
            font-size: 1.75rem;
            font-weight: bold;
        }
        .card-text {
            font-size: 1rem;
            margin-bottom: 1.5rem;
        }
        .btn-custom {
            background-color: white;
            color: #007bff;
            border-radius: 50px;
            padding: 0.75rem 2rem;
            text-transform: uppercase;
            font-weight: bold;
            letter-spacing: 1px;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }
        .btn-custom:hover {
            background-color: #f0f0f0;
            transform: translateY(-5px);
        }
        .card.silver {
            background: linear-gradient(135deg, #cfd9df 0%, #e2ebf0 100%);
        }
        .card.gold {
            background: linear-gradient(135deg, #f6d365 0%, #fda085 100%);
        }
        .card.platinum {
            background: linear-gradient(135deg, #e1eec3 0%, #f05053 100%);
        }
    </style>
</head>
<body>
    <div class="subscription-container text-center">
        <h1 class="mb-5">Choose Your Subscription Plan</h1>
        @if (Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
                @php
                    Session::forget('success');
                @endphp
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-4 mb-4">
                <div class="card silver">
                    <img src="/images/silvers.png" alt="Silver Subscription">
                    <div class="card-body">
                        <h5 class="card-title">Silver</h5>
                        <p class="card-text">
                            Get started with our Silver plan. Perfect for individuals who need basic features.
                        </p>
                        <a href="{{ route('stripe.checkout', ['price' => 10, 'product' => 'silver']) }}" class="btn btn-custom">Make Payment - $10</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card gold">
                    <img src="/images/golds.png" alt="Gold Subscription">
                    <div class="card-body">
                        <h5 class="card-title">Gold</h5>
                        <p class="card-text">
                            Upgrade to our Gold plan for more features and premium support.
                        </p>
                        <a href="{{ route('stripe.checkout', ['price' => 500, 'product' => 'Gold']) }}" class="btn btn-custom">Make Payment - $500</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card platinum">
                    <img src="/images/platinums.png" alt="Platinum Subscription">
                    <div class="card-body">
                        <h5 class="card-title">Platinum</h5>
                        <p class="card-text">
                            Experience all features with our Platinum plan, ideal for businesses.
                        </p>
                        <a href="{{ route('stripe.checkout', ['price' => 1000, 'product' => 'Platinum']) }}" class="btn btn-custom">Make Payment - $1000</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
