<?php

interface Observer
{
    public function update(Observable $subject);
}


abstract class Widget implements Observer
{

    protected $internalData = array();

    abstract public function draw();

    public function update(Observable $subject)
    {
        $this->internalData = $subject->getData();
    }
}


class MenuWidget extends Widget
{

    function __construct()
    {
    }

    public function draw()
    {
        $html = "<div><dl class='dropdown'>
        <dt>
        <a href='#'>
          <span class='hida'>Select</span>    
          <p class='multiSel'></p>  
        </a>
        </dt>
        <dd>
            <div class='mutliSelect'>
                <ul>";
        $riders = $this->internalData[0];
        foreach ($riders as $rider) {
            $html .= "<li><input type='checkbox' value=$rider />$rider</li>";
        }
        $html .= "</ul>
                </div>
            </dd>
          <button>Filter</button>
        </dl></div>";
        echo $html;
        echo "<script src='main.js'></script>";
    }
}


class LinearWidget extends Widget
{

    function __construct()
    {
    }

    public function draw()
    {
        $html = "<div><canvas id='chart'></canvas></div>";
        echo $html;

        $circuitsJson = json_encode($this->internalData[2]);
        $ridersJson = json_encode($this->internalData[0]);
        $pointsJson = json_encode($this->internalData[1]);

        $scriptHtml = "<script>
        const chartDiv = document.getElementById('chart');
        const labels = $circuitsJson;
        const riders = $ridersJson;
        const points = $pointsJson;
		

		console.log(labels)
		console.log(riders)
		console.log(points)

        const datasets = riders.map((rider, index) => ({
            label: rider,
            data: points[index]
        }));
		console.log(datasets)
        const chartConfig = {
            type: 'line',
            data: {
                labels: labels,
                datasets: datasets
            },
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: 'Puntuacion Pilotos MotoGp por carrera'
                    }
                },
                scales: {
                    y: {
                        suggestedMin: 0,
                        suggestedMax: 25,
                    }
                }
            }
        };

        new Chart(chartDiv, chartConfig);
    </script>";
        echo $scriptHtml;
    }

}

?>
