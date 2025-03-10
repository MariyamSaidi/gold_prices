<head>
    <style>
        tbody td {
        /* 1. Animate the background-color
        from transparent to white on hover */
        background-color: rgba(255,255,255,0);
        transition: all 0.2s linear; 
        transition-delay: 0.3s, 0s;
        /* 2. Animate the opacity on hover */
        opacity: 0.6;
        }
        tbody tr:hover td {
            background-color: rgba(255,255,255,1);
            transition-delay: 0s, 0s;
            opacity: 1;
            font-size: 2em;
        }

        td {
            /* 3. Scale the text using transform on hover */
            transform-origin: center left;
            transition-property: transform;
            transition-duration: 0.4s;
            transition-timing-function: ease-in-out;
        }
        tr:hover td {
            transform: scale(1.1);
        }
        /* Codepen styling */
        * { box-sizing: border-box }

        table {
        width: 90%;
        margin: 0 5%;
        text-align: left;
        }
        th, td {
        padding: 0.5em;
        }
        body {
        display: flex;
        height: 100vh;
        background: hsl(232, 22%, 90%);
        color: rgba(95, 17, 232, 1);
        }
        body > *  {
        margin: auto;
        }

    </style>
</head>
<div class="container">
    <h1>Prix de l'Or en Temps Réel</h1>
    <form action="{{ route('gold-prices.store') }}" method="POST">
    @csrf
    <button type="submit">Fetch Gold Price</button>
    </form>
    <table class="table">
        <thead>
            <tr>
                <th>Date</th>
                <th>Prix (USD)</th>
            </tr>
        </thead>
        <tbody>
            @if($goldPrices->isEmpty())
                <tr>
                    <td colspan="2">Aucun prix disponible.</td>
                </tr>
            @else
                @foreach($goldPrices as $price)
                    <tr id="gold-prices-body">
                        <td>{{ $price->date }}</td>
                        <td>{{ $price->prix }} {{ $price->devise }}</td>
                    </tr>
                @endforeach
            @endif
        </tbody>

    </table>

</div>
<script>
   
</script>

