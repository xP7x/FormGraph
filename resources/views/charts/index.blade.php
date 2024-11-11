<head>
    <title>Gráficos de Respostas</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <h1>Gráficos de Respostas</h1>

    @foreach($data as $formId => $responses)
        <canvas id="chart-{{ $formId }}" width="400" height="200"></canvas>
        <script>
            const ctx = document.getElementById('chart-{{ $formId }}').getContext('2d');

            // Supondo que $responses seja um array associativo com as respostas
            const labels = Object.keys($responses);
            const values = Object.values($responses);

            const chart = new Chart(ctx, {
                type: 'bar', // Escolha o tipo de gráfico desejado
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Respostas',
                        data: values,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>
    @endforeach
</body>