<div class="dash-grid-container">
    <div class="grid-item-1 item">
        <h1>Today</h1>
        <div id="bar">
            <div id="work-progress"></div>
        </div>
    </div>
    <div class="grid-item-2 item">
        <h1>Revenue</h1>
        <canvas id="revenue-chart" width="500" height="400"></canvas>
    </div>
    <div class="grid-item-3 item">
        <h1>Appointments</h1>
        <div id="bar">
            <div id="app-progress"></div>
        </div>
    </div>
</div>

<script>

    const lineData = [100, 200, 150, 300, 250, 350, 180]
    
    const canvas = document.getElementById("revenue-chart")
    const context = canvas.getContext("2d")

    const canvasWidth = canvas.width
    const canvasHeight = canvas.height
    const chartHeight = canvasHeight - 50
    const maxDataValue = Math.max(...lineData)
    const barWidth = 50;
    const barGap = 20;
    const scaleFactor = chartHeight / maxDataValue

    function drawLineChart() {
        context.clearRect(0, 0, canvasWidth, canvasHeight)
        context.beginPath()
        context.moveTo(50, canvasHeight - lineData[0] * scaleFactor - 30)

        lineData.forEach((value, index) => {
            const x = index * (barWidth + barGap) + 50
            const y = canvasHeight - value * scaleFactor - 30
            context.lineTo(x, y)
        })

        context.strokeStyle = "green"
        context.lineWidth = 2
        context.stroke()
    }

    function drawProgressBar(id, available, finished) {
        const percentage = (finished / available) * 100
        console.log(percentage)
        const progress = document.getElementById(id)
        progress.style.height = percentage + "%" 
    }

    drawLineChart()
    drawProgressBar("work-progress", 10, 5)
    drawProgressBar("app-progress", 10, 3)
</script>