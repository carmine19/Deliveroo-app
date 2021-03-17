@if ($restaurant)

    <section id="stats">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h1 class="mb-2 text-center">Statistiche ristorante: <strong
                            class="text-capitalize">{{Auth::user()->restaurants->name}}</strong></h1>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-lg-6">
                    <canvas id="doughnut-chart" width="100%"></canvas>
                </div>
                <div class="col-lg-6">
                    <canvas id="mixed-chart" width="100%" ></canvas>
                </div>
            </div>
        </div>
    </section>

@endif


<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
<script>
    new Chart(document.getElementById("doughnut-chart"), {
        type: 'doughnut',
        data: {
            labels: ["Gen", "Feb", "Mar", "Apr", "Mag", "Giu", "Lug", "Ago", "Set", "Ott", "Nov", "Dic"],
            datasets: [
                {
                    label: "Ordni Mensili",
                    backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f", "#e8c3b9", "#c45850", "#ff0000",
                        "#ffa500", "#ffff00", "#add8e6", "#008000", "#800080", "#00008b"],
                    data: [30, 50, 80, 100, 130, 170, 200, 250, 270, 300, 320, 400]
                }
            ]
        },
        options: {
            title: {
                display: true,
                text: 'Ordini mensili anno 2021'
            }
        }
    });

    new Chart(document.getElementById("mixed-chart"), {
    type: 'bar',
    data: {
      labels: [2018, 2019, 2020, 2021],
      datasets: [
        {
          label: "",
          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9"],
          data: [247,300,190,280]
        }
      ]
    },
    options: {
      title: {
        display: true,
        text: 'Vendite totali annuali'
      }
    }
});

</script>
