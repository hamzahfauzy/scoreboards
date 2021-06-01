<div class="scoreboards">
    <h2>Menunggu...</h2>
</div>

<script>
var countdown, scoreboardInterval
async function getScoreboard()
{
    var request = await fetch('index.php?realtime-request=true')
    var response = await request.text()

    if(response)
    {
        clearInterval(scoreboardInterval)
        response = JSON.parse(response)
        var timer = 5
        document.querySelector('.scoreboards').innerHTML = '<h2>'+timer+'</h2>'
        countdown = setInterval(e=>{
            timer--
            if(timer == 0)
            {
                clearInterval(countdown)
                document.querySelector('.scoreboards').innerHTML = '<h2>'+response.name+' ('+response.total_score+')</h2>'
                setTimeout(e => {
                    document.querySelector('.scoreboards').innerHTML = '<h2>Menunggu...</h2>'
                    scoreboardInterval = setInterval(getScoreboard,1000)
                }, 10000)
            }
            else
                document.querySelector('.scoreboards').innerHTML = '<h2>'+timer+'</h2>'
        },1000)
    }
}

getScoreboard()
scoreboardInterval = setInterval(getScoreboard,1000)
</script>